<?php

use portalium\site\bundles\AppAsset;
use yii\helpers\Html;
use portalium\theme\widgets\ActiveForm;
use portalium\theme\widgets\Panel;
use portalium\site\Module;

/* @var $this yii\web\View */
/* @var $model portalium\content\models\Content */
/* @var $form yii\widgets\ActiveForm */

$this->title = Module::t('Edit Profile');
AppAsset::register($this);


$js = <<< JS
    // Password alanını kontrol etmek için
    $('#profileform-password').on('input', function() {
        var passwordValue = $(this).val();

        // Eğer password alanı dolu ise
        if (passwordValue.trim() !== '') {
            // Old password alanını zorunlu hale getir
            $('#profileform-old_password').prop('required', true);
        } else {
            // Old password alanını zorunlu olmaktan çıkar
            $('#profileform-old_password').prop('required', false);
        }
    });
JS;

$this->registerJs($js);
?>


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
    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'old_password')->passwordInput(['class' => 'form-control form-control-lg']) ?>

    <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control form-control-lg']) ?>
    <?= $form->field($model, "id_avatar")->label("Profile")->widget("\portalium\storage\widgets\FilePicker", [
    'multiple' => 0,
    'attributes' => ['id_storage'],
    'name' => 'app::logo_wide',
    'isPicker' => true,
    'isJson' => false
])?>
    
<?php Panel::end() ?>
<?php ActiveForm::end(); ?>
