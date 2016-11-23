<?php

class m161120_183133_add_email_column_to_application_table extends CDbMigration
{
	public function up()
	{
        $this->addColumn('application', 'email', 'varchar(45) not null');
	}

	public function down()
	{
		echo "m161120_183133_add_email_column_to_application_table does not support migration down.\n";
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
