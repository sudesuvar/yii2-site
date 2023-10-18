<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var portalium\site\models\PreferenceSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="preference-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_preference') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'id_setting') ?>

    <?= $form->field($model, 'id_workspace') ?>

    <?= $form->field($model, 'value') ?>

    <?php // echo $form->field($model, 'date_create') ?>

    <?php // echo $form->field($model, 'date_update') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
