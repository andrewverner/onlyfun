<?php

class m161123_115056_add_characterID_column_to_app_table extends CDbMigration
{
	public function up()
	{
	    $this->addColumn('application', 'characterID', 'int not null');
	}

	public function down()
	{
		echo "m161123_115056_add_characterID_column_to_app_table does not support migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}
