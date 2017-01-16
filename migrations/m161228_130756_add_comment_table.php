<?php
use yii\db\Schema;
use yii\db\Migration;

class m161228_130756_add_comment_table extends Migration
{
    public function up()
    {
        $this->createTable("comments", [
            "id" => Schema::TYPE_PK,
            "body" => Schema::TYPE_TEXT,
            "post_id"=>$this->integer()->notNull(),
            "author_id"=>$this->integer()->notNull(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
            
            
         ]);
        
         $this->addForeignKey(
            'fk-comments-author_id',
            'comments',
            'author_id',
            'authors',
            'id',
            'CASCADE'
        );
         
            $this->addForeignKey(
            'fk-comments-post_id',
            'comments',
            'post_id',
            'posts',
            'id',
            'CASCADE'
        );


    }

    public function down()
    {
        echo "m161228_130756_add_comment_table cannot be reverted.\n";

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
