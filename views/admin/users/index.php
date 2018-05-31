<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Users;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh sách tài khoản';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-title">
                <h4><?= Html::encode($this->title) ?></h4>
                <p>
                    <?= Html::a('Thêm tài khoản', ['create'], ['class' => 'btn btn-success']) ?>
                </p>
            </div>
            <div class="card-body">

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        //'id',
                        //'username',
                        //'password',
                        'name',
                        'dob',
                        'phone',
                        //'role',
                        'address',
                        //'email:email',
                        //'status',
                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                    ]); ?>
            </div>
        </div>
    </div>
</div>

