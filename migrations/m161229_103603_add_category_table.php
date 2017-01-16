<?php
use yii\db\Schema;

use yii\db\Migration;

class m161229_103603_add_category_table extends Migration
{
    public function up()
    {
            $this->createTable("category", [
            "id" => Schema::TYPE_PK,
            "name" => Schema::TYPE_STRING,
            "discription" => Schema::TYPE_TEXT,
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
         ]);

      

    }

    public function down()
    {
        echo "m161229_103603_add_category_table cannot be reverted.\n";

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
