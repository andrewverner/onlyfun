<?php

class m161120_171949_create_application_table extends CDbMigration
{
	public function up()
	{
        $this->createTable('application', [
            'id' => 'pk',
            'keyID' => 'int not null',
            'vCode' => 'varchar(64) not null',
            'datetime' => 'datetime not null',
            'status' => 'int default 0'
        ], 'charset=utf8');
	}

	public function down()
	{
		echo "m161120_171949_create_application_table does not support migration down.\n";
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