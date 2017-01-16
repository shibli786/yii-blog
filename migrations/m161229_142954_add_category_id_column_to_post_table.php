<?php

use yii\db\Migration;

/**
 * Handles adding category_id to table `post`.
 */
class m161229_142954_add_category_id_column_to_post_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        
        $this->addColumn("posts", "category_id", "integer");
        
        
        $this->addForeignKey("fk-posts-category_id", 
                "posts", 
                "category_id", 
                "category",
                "id",
                "CASCADE");
    }
    

    /**
     * @inheritdoc
     */
    public function down()
    {
    }
}
