<?php
use yii\db\Schema;
use yii\db\Migration;

class m161228_142709_add_tag_post_table extends Migration
{
    public function up()
    {
        
        
   

            $this->createTable("tag_post",[
                "tag_id"=>$this->integer()->notNull(),
                "post_id"=>$this->integer()->notNull(),
                'created_at' => $this->dateTime(),
                'updated_at' => $this->dateTime(),
               
            ]);
            
            
             
         $this->addForeignKey(
            'fk-tag_post-tag_id',
            'tag_post',
            'tag_id',
            'tags',
            'id',
            'CASCADE'
        );
         
         $this->addForeignKey(
            'fk-tag_post-post_id',
            'tag_post',
            'post_id',
            'posts',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
           echo "m161228_142709_add_tag_post_table cannot be reverted.\n";

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
