<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserTestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Tests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-test-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User Test', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'mail',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
