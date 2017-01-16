<?php
use yii\db\Schema;
use yii\db\Migration;

class m161228_142726_add_author_role_table extends Migration
{
    public function up()
    {

        $this->createTable("author_role",[
            'author_id'=>$this->integer(),
            'role_id'=>$this->integer(),
           
        ]);
        
        
         $this->addForeignKey(
            'fk-author_role-author_id',
            'author_role',
            'author_id',
            'authors',
            'id',
            'CASCADE'
        );
         
           $this->addForeignKey(
            'fk-author_role-role_id',
            'author_role',
            'role_id',
            'roles',
            'id',
            'CASCADE'
        );


    }

    public function down()
    {
        echo "m161228_142726_add_author_role_table cannot be reverted.\n";

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
