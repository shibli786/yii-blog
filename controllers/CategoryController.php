<?php

namespace app\controllers;
use app\models\Category;

class CategoryController extends \yii\web\Controller
{
    public function actionIndex()
    {
        
        $category=Category::find()->all();
        
        
        return $this->render('index',[
            'categories'=>$category
            
        ]);
    }
    
    
    
    public function actionName($id)
    {
      $categories=  Category::findOne($id);
      $posts=$categories->posts;
      
     return $this->render('posts',[
            'posts'=>$posts
            
        ]);
    }

}
