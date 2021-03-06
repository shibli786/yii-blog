<?php

use yii\db\Migration;

class m161228_130746_add_author_table extends Migration
{
    public function up()
    {
        
            $this->createTable("author",[
            "id"=>Schema::TYPE_PK,
            "name"=>$this->string(),
            "gender"=>$this->string(),
            "email"=>$this->string(),
            "password"=>$this->string(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),

        ]);

    }

    public function down()
    {
        echo "m161228_130746_add_author_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
