<?php
use yii\helpers\Url;

foreach($categories as $category){
?>


<div class="col-md-3 img-categpry">
        
        <a href="<?php echo Url::to(['category/name','id'=>$category->id]);?>">
                 
            <img class="img-hover" src="<?php echo Yii::getAlias('@web').'/img/'.$category->image_path ?>" width="100%" height=" 200px">
           <div class="img-categpry-txt"> <span><?php echo $category->name;?></span></div>


        </a>
        
 </div>



    

<?php } ?>
