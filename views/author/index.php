<?php

use yii\helpers\Html;

$this->title = 'Authors';
$this->params['breadcrumbs'][] = $this->title;
 //echo $authors->name;
 echo "  ";
 //echo $authors->email;
 
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        
       
        Author page
        list of Authors will be displayed below;
    </p>

    <code><?= __FILE__ ?></code>
</div>
