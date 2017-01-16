<?php
namespace app\controllers;
use Yii;
use app\models\Author;
use app\models\Post;
use app\models\Tag;
use app\models\Category;
use app\models\CreatePost;


class PostController extends \yii\web\Controller
{
    public function actionIndex()
    {
        
        $user=  Yii::$app->user->identity;

        return $this->render('index', [
            'user' => $user,
        ]);
    }
    
    
    public function actionCreatepost()
    {
        
        $user=  Yii::$app->user->identity;
        $tags=Tag::find()->select(['name','id'])->indexBy('id')->column();
       // $categories=Category::find()->all();
        $categories = Category::find()
        ->select(['name', 'id'])
        ->indexBy('id')
        ->column();

        //print_r($categorys);
        return $this->render('createpost', [
            'user' => $user,
            'tags'=>$tags,
            'categories'=>$categories,
            'model'=> new CreatePost
        ]);
    }





   
public function actionSave()
{


$model = new CreatePost;



if ($model->load(Yii::$app->request->post()) && $model->validate()) {
// valid data received in $model

  //print_r($model->tags);

    $post= new Post;
    $post->title=$model->title;
    $post->body=$model->body;


    $post->author_id=Yii::$app->user->identity->id;
    //$post->created_at=
    //$post->updated_at=
    $post->category_id=$model->category;
    $post->save();
   // print_r($post);

    foreach ($model->tags as $key => $value) {
       $tags=Tag::findOne($value);
     //  print_r($tags);
     //  
        //echo " key".$key."  ";
        //echo "val ".$value;
       $post->link('tags', $tags);

  
        $user=  Yii::$app->user->identity;

        return $this->render('index', [
            'user' => $user,
        ]);
    }

  //  print_r($post);


// do something meaningful here about $model ...

echo "hello";
//return $this->render('entry-confirm', ['model' => $model]);
}
 else {
// either the page is initially displayed or there is some validation error
return $this->render('entry', ['model' => $model]);
}

    

   
}
}