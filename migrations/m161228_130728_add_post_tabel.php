<?php
use yii\db\Schema;
use yii\db\Migration;

class m161228_130728_add_post_tabel extends Migration
{
    public function up()
    {
        
        $this->createTable("posts",[
            "id"=>Schema::TYPE_PK,
            "body"=>$this->text(),
            "author_id"=>$this->integer()->notNull(),
            "title"=>$this->string(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),

            
        ]);
        
         $this->addForeignKey(
            'fk-posts-author_id',
            'posts',
            'author_id',
            'authors',
            'id',
            'CASCADE'
        );

    }

    public function down()
    {
        echo "m161228_130728_add_post_tabel cannot be reverted.\n";

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
