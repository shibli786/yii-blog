<?php

use yii\db\Schema;


use yii\db\Migration;

class m161229_104235_add_junction_author_tag_table extends Migration
{
    public function up()
    {
        
        
        
        $this->createTable("author_tag",[
            'author_id'=>$this->integer()->notNull(),
            'tag_id'=>$this->integer()->notNull(),
           
        ]);
        
        
         $this->addForeignKey(
            'fk-author_tag-author_id',
            'author_tag',
            'author_id',
            'authors',
            'id',
            'CASCADE'
        );
         
           $this->addForeignKey(
            'fk-author_tag-tag_id',
            'author_tag',
            'tag_id',
            'tags',
            'id',
            'CASCADE'
        );

    }

    public function down()
    {
        echo "m161229_104235_add_junction_author_tag_table cannot be reverted.\n";

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
