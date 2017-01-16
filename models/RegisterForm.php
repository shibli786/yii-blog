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
class RegisterForm extends Model
{
    public $name;
    public $email;
    public $gender;
    public $password;
    public $confirm_password;


  /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['name', 'password','confirm_password','email','gender'], 'required'],
            ['confirm_password', 'compare', 'compareAttribute'=>'password', 'message'=>"Passwords don't match" ],

            // rememberMe must be a boolean value
           // ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            //['password', 'validatePassword'],
        ];
    }

     public function login($author)
    {

                       return Yii::$app->user->login($author, false ? 3600*24*30 : 0);
        }
   
   
}



?>