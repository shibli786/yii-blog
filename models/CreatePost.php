<?php
namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class CreatePost extends Model
{
    public $title;
    public $body;
    public $category;
    public $tags;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['title', 'body','category','tags'], 'required'],
        ];
    }


   
}




?>