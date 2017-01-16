<?php

use yii\db\Migration;

class m161229_140901_add_column_to_tag_table extends Migration
{
    public function up()
    {
        $this->addColumn("tags", "category_id", "integer");
        
        
        $this->addForeignKey("fk-tags-category_key", 
                "tags", 
                "category_id", 
                "category",
                "id",
                "CASCADE");
    }

    public function down()
    {
        echo "m161229_140901_add_column_to_tag_table cannot be reverted.\n";

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
