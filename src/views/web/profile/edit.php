<?php

use portalium\site\bundles\AppAsset;
use portalium\site\controllers\web\ProfileController;
use yii\helpers\Html;
use portalium\theme\widgets\ActiveForm;
use portalium\theme\widgets\Panel;
use portalium\site\Module;

/* @var $this yii\web\View */
/* @var $model portalium\content\models\Content */
/* @var $form yii\widgets\ActiveForm */

$this->title = Module::t('Edit Profile');
AppAsset::register($this);

?>

<?php $form = ActiveForm::begin([ 'method' => 'post','action' =>['profile/edit']]); ?>
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
    <?= $form->field($modelprofile, 'first_name')->label(Module::t('First Name'))->textInput(['maxlength' => true]) ?>
    <?= $form->field($modelprofile, 'last_name')->label(Module::t('Last Name'))->textInput(['maxlength' => true]) ?>
    <?= $form->field($modelprofile, 'username')->textInput(['maxlength' => true]) ?>
    <?= $form->field($modelprofile, 'email')->textInput(['maxlength' => true]) ?>
    <?= $form->field($modelprofile, "id_avatar")->label(Module::t('Profile'))->widget("\portalium\storage\widgets\FilePicker", [
    'multiple' => 0,
    'attributes' => ['id_storage'],
    'name' => 'app::logo_wide',
    'isPicker' => true,
    'isJson' => false
])?>
    
<?php Panel::end() ?>
<?php ActiveForm::end(); ?>

<?php

$this->title = Module::t('Edit Password');
AppAsset::register($this);

?>

<?php $form2 = ActiveForm::begin([ 'method' => 'post','action' =>['profile/edit-password']]); ?>
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
       
    
    <?= $form2->field($modelpassword, 'old_password')->label(Module::t('Old Password'))->passwordInput(['class' => 'form-control form-control-lg']) ?>
    <?= $form2->field($modelpassword, 'password')->passwordInput(['class' => 'form-control form-control-lg']) ?>
    
<?php Panel::end() ?>
<?php ActiveForm::end(); ?>

