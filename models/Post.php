<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
/**
 * This is the model class for table "posts".
 *
 * @property integer $id
 * @property string $body
 * @property integer $author_id
 * @property string $title
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Comments[] $comments
 * @property Authors $author
 * @property TagPost[] $tagPosts
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['body'], 'string'],
            [['author_id'], 'required'],
            [['author_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => Author::className(), 'targetAttribute' => ['author_id' => 'id']],
        ];
    }



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
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'body' => 'Body',
            'author_id' => 'Author ID',
            'title' => 'Title',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['post_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Author::className(), ['id' => 'author_id']);
    }
    

    /* fetching record via pivot tabel
 * 
 * tag_post is a pivot table
 * 
 * relationship many to many=> 
 * one tag can have multiple post and one post can have multiple tag
 *
 * this method will return all tags associated with one post
 * id of post is plugged in tag_table as post_id and fetched all record
 * from above record we will get all tag_id we will then take this tag_id
 *  and plug it into tag table as id via tag_id 

 * 
 *  */    
     public function getTags()
    {
       
         return $this->hasMany(Tag::className(), ['id' => 'tag_id'])->viaTable('tag_post', ['post_id'=>'id']);   
    }
    
    
 
}
