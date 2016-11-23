<?php

class m161119_143148_create_user_table extends CDbMigration
{
	public function up()
	{
	    $this->createTable('user', [
            'id'        => 'pk',
            'username'  => 'varchar(45) not null',
            'password'  => 'varchar(32) not null',
            'email'     => 'varchar(255) not null'
        ], 'charset=utf8');
	}

	public function down()
	{
		echo "m161119_143148_create_user_table does not support migration down.\n";
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
