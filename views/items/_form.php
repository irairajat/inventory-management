<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Categories;

/** @var yii\web\View $this */
/** @var app\models\Items $model */
/** @var yii\widgets\ActiveForm $form */

$categories = Categories::find()->where(['status' => '1'])->all();
$category = array_column($categories, 'name', 'id');
?>

<div class="items-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category_id')->dropDownList($category, ['prompt' => 'Select Category']) ?>

    <?php if($model->id){ echo $form->field($model, 'status')->dropDownList([ '0' => 'Inactive', '1' => 'Active']); } ?>

    <div class="form-group">
        <?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
