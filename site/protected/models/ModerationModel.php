<?php
/**
 * the basis for moderation process
 * it can select changes by users and groups
 * 
 */

class ModerationModel extends CFormModel
{
	public $id = false;	// fake but needed???
	
	public $caption = '';
	/**
	 * the id of the user we are watching, if groupId == false
	 * 
	 * @var boolean / integer
	 */
	public $userId = false;
	/**
	 * the id of the group with all users we are watching
	 * 
	 * @var boolean / integer
	 */
	public $groupId = false;
	
	// private shortcut filters
	private $_transactionDates = false;
	private $_listOnDate = false;
	private $_listTransactions = false;
	
	public function getUsername()
	{
		if ($this->isUserFilter) {
			$m = User::model()->findByPk($this->userId);
			if ($m) {
				return $m->username;
			} else {
				return Yii::t('app', 'There is no user active');
			}
		} else {
			$m = Usergroup::model()->findByPk($this->groupId);
			if ($m) {
				return $m->name;
			} else {
				return Yii::t('app', 'There is no group active');
			}			
		}
	}
	
	/**
	 * return true if we are selecting by user
	 * @return boolean
	 */
	public function getIsGroupFilter()
	{
		return $this->groupId > 0;
	}
	/**
	 * returns true if we are selecting by user. Otherwise it's unlimited!
	 * @return boolean
	 */
	public function getIsUserFilter()
	{
		return ($this->isGroupFilter == false) && ($this->userId > 0);
	}
	
	/**
	 * returns the dates a user / group did change something in the system
	 * 
	 * @return array of date
	 */
	public function getTransactionDates()
	{
		if ($this->_transactionDates === false ) {
			
			$this->_transactionDates = array();
			$cmd = Yii::app()->db->createCommand();
			if ($this->isGroupFilter) {
				$cmd->selectDistinct('t.user_id, date(t.creation_date) as working_date, u.usergroup');
			} else {
				$cmd->selectDistinct('t.user_id, date(t.creation_date) as working_date');
			}						
			$cmd->from('undo_transaction t');
			if ($this->isUserFilter) {		// only of we are not looking for all users
				$cmd->group('user_id, working_date')
						->having('user_id = :user_id', array(':user_id' => $this->userId));
			} elseif ($this->isGroupFilter) {
				$cmd->leftJoin('user u', 't.user_id = u.ref')
						->group('usergroup, working_date')
						->having('usergroup = :group_id', array(':group_id' => $this->groupId));		
			}	
			$dates = $cmd->order('working_date desc')
					->queryAll();		
			// $sql = $cmd->pdoStatement; 
			if ($dates) {
				$d = null;
				foreach ($dates as $date) {
					if ($date['working_date'] != $d) {			// make them unique without the userid
						$this->_transactionDates[] = $date['working_date'];
						$d = $date['working_date'];
					}	
				}
			}
		}
		return $this->_transactionDates;
	}
	
	/**
	 * list the resources changed on this date by this user
	 * uses: config->fixedValues[agentId] and config->fixedValues[artId]
	 * 
	 * @param string $d yyyy-mm-dd format date
	 * @return array of id, caption, type
	 * 
	 */
	public function listChangesOnDate($d)
	{
		if ($this->_listOnDate === false) {
			$this->_listOnDate = array();
			$cmd = Yii::app()->db->createCommand()
				->select('ut.resource_id as id, r.resource_type as type_id, date(ut.creation_date) as working_date, '.
								'ut.user_id, '.
								'IF(art.value is null, agent.value, art.value) as caption, '.
								'IF(art.value is null, "Agent", "Art") as type'.
								($this->isGroupFilter ? ', u.usergroup' : '')
								)
				->from('undo_transaction ut')
				->leftJoin('resource r', 'ut.resource_id = r.ref')			
				->leftJoin('resource_data art', 'ut.resource_id = art.resource AND art.resource_type_field=:artId', array(
						':artId' => Yii::app()->config->fixedValues['artId']
				))			
				->leftJoin('resource_data agent', 'ut.resource_id = agent.resource AND agent.resource_type_field=:agentId',array(
						':agentId' => Yii::app()->config->fixedValues['agentId']						
				))										
				->group('user_id, working_date, resource_id');
			if ($this->isUserFilter) {
				$cmd->having('user_id=:user_id AND date(working_date) = :date', array(
						':user_id' => $this->userId,
						':date' => $d
				));
			} elseif ($this->isGroupFilter) {
				$cmd->leftJoin('user u', 'ut.user_id=u.ref')
						->having('u.usergroup=:group_id AND date(working_date) = :date', array(
							':group_id' => $this->groupId,
							':date' => $d
				));
								
			} else {	
				$resources = $cmd->having('date(working_date) = :date', array(
						':date' => $d
				));				
			}	
			$text = $cmd->text;
			
			$resources = $cmd->order('caption')			
				 ->queryAll();
			if ($resources) {
				$i = null;
				foreach ($resources as $resource) {
					if ($i != $resource['id']) {
						$this->_listOnDate[] = array(
								'id' => $resource['id'],
								'caption' => $resource['caption'],
								'type' => $resource['type']
						);
						$i = $resource['id'];
					}	
				}
			}
							
		}
		return $this->_listOnDate;
	}
	
	/**
	 * list all transaction by the user on a specific resource
	 * it generates an array of:
	 *   transaction date / time - path
	 *			-- field changes
	 * 
	 * @param string $d yyyy-mm-dd
	 * @param integer $resourceId 
	 */
	public function listTransactionsOnDate($d, $resourceId)
	{
		if ($this->_listTransactions === false) {
			$this->_listTransactions = array();
			
			$transactions = Yii::app()->db->createCommand()
					->select('id,resource_id,path, is_rollback')
					->from('undo_transaction')
					->where('date(creation_date) = :date AND resource_id=:resource_id', array(
						':date' => $d,
						':resource_id' => $resourceId	
					 ))
					->order('creation_date desc')
					->queryAll();		
			if ($transactions) {
				foreach ($transactions as $transaction) {
					$steps = UndoStep::model()->findAll(array(
							'condition' => 'transaction_id = :transaction_id',
							'params' => array(
								':transaction_id' => $transaction['id']	
							)));
					if ($steps) {	// if no step there is nothing to undo
						$previousValues = array();
						foreach ($steps as $step) {
							$previousValues[] = array(
								'value' => $step->displayValue,
								'fieldname' => $step->field->fieldname,	
							);
						}
						$this->_listTransactions[] = array(
							'id' => $transaction['resource_id'],
							'path' => $transaction['path'],
							'isRollback' => $transaction['is_rollback'],
							'items' => $previousValues,	
						);
					}
				}	
			}
		}
		return $this->_listTransactions;
	}
	
	
}
