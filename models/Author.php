<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
/**

/**
 * This is the model class for table "authors".
 *
 * @property integer $id
 * @property string $name
 * @property string $gender
 * @property string $email
 * @property string $password
 * @property string $created_at
 * @property string $updated_at
 *
 * @property AuthorRole[] $authorRoles
 * @property Roles[] $roles
 * @property Comments[] $comments
 * @property Posts[] $posts
 */
class Author extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    
    public static function tableName()
    {
        return 'authors';
    }

    /**
     * @inheritdoc
     */
    
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'gender', 'email', 'password'], 'string', 'max' => 255],
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
            'gender' => 'Gender',
            'email' => 'Email',
            'password' => 'Password',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            
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
     * @return \yii\db\ActiveQuery
     */
    public function getRoles()
    {
        return $this->hasMany(Role::className(), ['id' => 'role_id'])->viaTable('author_role', ['author_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['author_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['author_id' => 'id']);
    }

    public function getAuthKey() {
        
     //   return $this->auth_key;
        
    }

    public function getId() {
     return $this->id;

        
    }

    public function validateAuthKey($authKey) {
       // return $this->getAuthKey() === $authKey;
        
    }

    public static function findIdentity($id) {
        
        return static::findOne($id);
        
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        return static::findOne(['access_token' => $token]);
    }
    
    
//    public function beforeSave($insert)
//    {
//        if (parent::beforeSave($insert)) {
//            if ($this->isNewRecord) {
//                $this->auth_key = \Yii::$app->security->generateRandomString();
//            }
//            return true;
//        }
//        return false;
//    }
//    
    
    public function findByUsername($email){
        
        return Author::find()->where(['email'=>$email])->one();
        
  
    }

     public function validatePassword($user)
      {
          return Author::find()->where(['email'=>$user->username,'password'=>$user->password])->one();
      }
      

}
