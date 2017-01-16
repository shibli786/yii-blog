<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
/**

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $name
 * @property string $discription
 * @property string $created_at
 * @property string $updated_at
 *
 * @property CategoryTag[] $categoryTags
 */
class Category extends \yii\db\ActiveRecord
{





public function behaviors()
{
    return [
        [
            'class' => TimestampBehavior::className(),
            'createdAtAttribute' => 'created_at',
            'updatedAtAttribute' => 'updated_at',
            'value' => new Expression('NOW()'),
        ],
    ];
}

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['discription'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'discription' => 'Discription',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    
    public function  getTags(){
        return $this->hasMany(Tag::className(),[
            'id'=>'tag_id'
        ]);
        
    }
    
        
    public function  getPosts(){
        return $this->hasMany(Post::className(),[
            'category_id'=>'id'
        ]);
        
    }


   
}
