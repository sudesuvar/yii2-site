<?php

use yii\helpers\Html;
use portalium\content\Module;
use kartik\editors\Summernote;
use portalium\theme\widgets\Panel;
use portalium\content\models\Content;
use portalium\content\models\Category;
use portalium\theme\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model portalium\content\models\Content */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="content-form">

<?php $form = ActiveForm::begin(); ?>

<?php Panel::begin([
    'title' => Html::encode($this->title),
    'actions' => [
        'header' => [
        ],
        'footer' => [
            Html::submitButton(Module::t( 'Save'), ['class' => 'btn btn-success']),
        ]
    ],
]) ?>

<?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, "id_avatar")->widget("\portalium\storage\widgets\FilePicker", [
    'multiple' => 0,
    'attributes' => ['id_storage'],
    'name' => 'app::logo_wide',
    'isPicker' => true,
    'isJson' => false
])?>




<?php Panel::end() ?>

<?php ActiveForm::end(); ?>
</div>

