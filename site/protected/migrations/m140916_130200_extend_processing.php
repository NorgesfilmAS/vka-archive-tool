<?php

class m140916_130200_extend_processing extends CDbMigration
{
	public function up()
	{
		$this->addColumn('processing_job', 'is_hidden', 'integer default 0');
	}

	public function down()
	{
		$this->dropColumn('processing_job', 'is_hidden');
	}

}
