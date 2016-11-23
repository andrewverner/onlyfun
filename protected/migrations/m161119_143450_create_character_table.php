<?php

class m161119_143450_create_character_table extends CDbMigration
{
	public function up()
	{
	    $this->createTable('character', [
	        'id'            => 'pk',
            'userID'        => 'int not null',
            'characterName' => 'varchar(45) not null',
            'characterID'   => 'int not null',
            'keyID'         => 'int not null',
            'vCode'         => 'varchar(64) not null'
        ], 'charset=utf8');
	}

	public function down()
	{
		echo "m161119_143450_create_character_table does not support migration down.\n";
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
