<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var portalium\site\models\Preference $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="preference-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_setting')->textInput() ?>

    <?= $form->field($model, 'value')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
