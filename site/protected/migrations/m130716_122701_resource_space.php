<?php

class m130716_122701_resource_space extends CDbMigration
{
	public function up()
	{
		$this->addColumn('resource_data', 'id', 'pk');
		$this->addColumn('resource_related', 'id', 'pk');
		$this->addColumn('resource_keyword', 'id', 'pk');
	}

	public function down()
	{
		$this->dropColumn('resource_data', 'id');
		$this->dropColumn('resource_related', 'id');
		$this->dropColumn('resource_keyword', 'id');

	}

}
