<?php

class m161120_184020_add_corpID_column_to_application_table extends CDbMigration
{
	public function up()
	{
        $this->addColumn('application', 'corporationID', 'int not null');
	}

	public function down()
	{
		echo "m161120_184020_add_corpID_column_to_application_table does not support migration down.\n";
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
