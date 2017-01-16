<?php
/* @var $this yii\web\View */
?>

<div class="posts" >
    
    <?php

    foreach($user->posts as $post){
    
    ?>


    <div class="post">
        <div class="title">
            <h1><?php echo $post->title?></h1>
            
            
        </div>
        <div class="author-info">
            <p> posted by <?php echo $user->name  ?> <span>   <?php echo $post->created_at?></span></p>
        </div>
        <div class="content">
            <?php echo $post->body?>
            
            
        </div>
        
        <div class="options">
            <span class="like"><a href="">50 Like</a></span class="comment"> |<span><a href=""> 120 Comment</a></span> |<span><a href=""> 60 Share</a></span>
            
            
        </div>
        <div class="tags">
            <?php foreach($post->tags as $tag) {?>    
            
            <button class="btn btn-primary"><?php echo $tag->name?></button>
    <?php } ?>
        </div>
        
        
        
    </div>  
    <?php } ?>
    
</div>