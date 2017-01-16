<?php

use yii\db\Migration;
use yii\db\Schema;

class m161229_111237_add_junction_category__tag_table extends Migration
{
    public function up()
    {
        
         $this->createTable("category_tag",[
            'category_id'=>$this->integer()->notNull(),
            'tag_id'=>$this->integer()->notNull(),
           
        ]);
        
        
         $this->addForeignKey(
            'fk-category_tag-category_id',
            'category_tag',
            'category_id',
            'category',
            'id',
            'CASCADE'
        );
         
           $this->addForeignKey(
            'fk-category_tag-tag_id',
            'category_tag',
            'tag_id',
            'tags',
            'id',
            'CASCADE'
        );

    }

    public function down()
    {
        echo "m161229_111237_add_junction_category__tag_table cannot be reverted.\n";

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
