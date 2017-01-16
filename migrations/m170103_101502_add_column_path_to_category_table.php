<?php

use yii\db\Migration;

class m170103_101502_add_column_path_to_category_table extends Migration
{
    public function up()
    {
         $this->addColumn("category", "image_path", "string");
        
    }

    public function down()
    {
        echo "m170103_101502_add_column_path_to_category_table cannot be reverted.\n";

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
