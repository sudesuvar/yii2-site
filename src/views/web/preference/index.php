<?php

use portalium\site\models\Preference;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var portalium\site\models\PreferenceSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Preferences';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="preference-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Preference', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_preference',
            'id_user',
            'id_setting',
            'id_workspace',
            'value:ntext',
            //'date_create',
            //'date_update',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Preference $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_preference' => $model->id_preference]);
                 }
            ],
        ],
    ]); ?>


</div>
