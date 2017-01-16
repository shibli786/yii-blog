<?php

namespace app\controllers;

use Yii;

use app\models\Author;
use app\models\Post;
use app\models\Tag;


class AuthorController extends \yii\web\Controller
{
  
    public function actionIndex()
    {
        $authors=Author::findOne(2);
              //print_r($authors->posts);
              
              /*$post= new Post;
              $post->author_id=1;
              $post->title="Call back Interface in java";
              $post->body="call back interface is a design pattern widely used"
                      . "in java";
              $post->category_id=1;
                $post->save(); 
              echo "[post created succsessfully";
            
              $tag1=Tag::findOne(1);
              $tag2=Tag::findOne(11);
              
               echo "[tag created succsessfully";
                 
                 
              $post->link('tags',$tag1);
              $post->link('tags',$tag2);
     
              echo "junction table is filled succsessfully";
              
              */
        
            $user=  Yii::$app->user->identity;
            
          
               $post=Post::findOne(6);
        
        
                print_r($user->posts);
        
              
              

        
     // print_r($authors->posts());
        die();
      
        return $this->render('index', [
            'authors' => $authors]);
        
        
        /*
        foreach ($tag_to_add as $value) {
        $tag = Tag::findOne($value);
        $this->link('tags', $tag);
      }         */
    }

}
