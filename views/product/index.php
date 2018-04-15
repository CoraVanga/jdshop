<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchProduct */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<!--     <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'price',
            'created_date',
            'status',
            //'code',
            //'size',
            //'amount',
            //'info',
            //'id_type',
            //'created_uid',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?> -->

    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'price',

            ['class' => 'yii\grid\ActionColumn'],
        ],
        ]); ?>
        <?php Pjax::end(); ?>

        <div id="post-detail">
            <?php echo $this->render('_view', ['model' => $post]); ?>
        </div>
    <?php
    $ajax_url = yii\helpers\Url::to(['ajax-view']); // #1
    $csrf_param = Yii::$app->request->csrfParam;  // #2
    $csrf_token = Yii::$app->request->csrfToken;

    $this->registerJs("
        $('div.product-index').on('click', 'tr', function() { // #3
            var id = $(this).data('key'); // #4
            $.ajax({
                'type' : 'GET',
                'url' : '$ajax_url',
                'dataType' : 'html',
                'data' : {
                    '$csrf_param' : '$csrf_token', // #2
                    'id' : id
                },
                'success' : function(data){ // #5
                    $('#post-detail').html(data);
                }
            });
        });
        ");
        ?>
</div>
