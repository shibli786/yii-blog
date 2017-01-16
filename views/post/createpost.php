<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\helpers\Html; 
use yii\widgets\ActiveForm;

use Url;

?>
<dir class="row">
	<h1>Create New Article !</h1>



<?php





$form = ActiveForm::begin([
    'id' => 'login-form',
    'action' => ['post/save'],
    'options' => ['class' => 'form-horizontal',
    'method'=>'post'],
]) ?>
      <?= $form->field($model, 'category')->dropDownList($categories, ['prompt'=>'Select Category']); ?>

    <?= $form->field($model, 'title') ?>
    <?= $form->field($model, 'body')->textArea() ?>
        <?= $form->field($model, 'tags')->checkBoxList($tags)?>


    <div class="form-group">
        <div >
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>
