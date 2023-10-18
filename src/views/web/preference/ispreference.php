<?php

use portalium\site\models\Preference;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var portalium\site\models\PreferenceSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'isPreference';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="preference-ispreference">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'module',
            'name',
            'label',
            'value',
            'type',
            'config',
            'is_preference'
        ],
    ]) ?>


</div>
