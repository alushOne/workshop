<?php

use app\components\grid\ActionColumn;
use app\components\grid\LinkColumn;
use app\components\grid\SetColumn;
use app\modules\admin\components\UserStatusColumn;
use app\modules\admin\models\User;
use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app/admin', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app/admin', 'Create User'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            [
                'filter' =>
                    Html::tag(
                        'div',
                        Html::tag('div', Html::activeTextInput($searchModel, 'date_from', ['class' => 'form-control']), ['class' => 'col-xs-6']) .
                        Html::tag('div', Html::activeTextInput($searchModel, 'date_to', ['class' => 'form-control']), ['class' => 'col-xs-6']),
                        ['class' => 'row']
                    ),
                'attribute' => 'created_at',
                'format' => 'datetime',
            ],
            [
                'class' => LinkColumn::className(),
                'attribute' => 'username',
            ],
            'email:email',
            [
                'class' => SetColumn::className(),
                'filter' => User::getStatusesArray(),
                'attribute' => 'status',
                'name' => 'statusName',
                'cssCLasses' => [
                    User::STATUS_ACTIVE => 'success',
                    User::STATUS_WAIT => 'warning',
                    User::STATUS_BLOCKED => 'default',
                ],
            ],

            ['class' => ActionColumn::className()],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>