<?php

class m150726_054323_fix_accepted_terms extends CDbMigration
{
	public function up()
	{
    $this->addColumn('user_profile', 'accepted_terms', 'tinyint default 0 not null');
    $this->addColumn('user_profile', 'newsletter_key' , 'string');
    return true;
	}

	public function down()
	{
    $this->dropColumn('user_profile', 'newsletter_key');
    $this->dropColumn('user_profile', 'accepted_terms');
	}
}
