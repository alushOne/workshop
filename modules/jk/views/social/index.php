<?php

use app\components\grid\ActionColumn;
use app\components\grid\LinkColumn;
use app\modules\jk\Module;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\jk\models\SocialSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Module::t('social', 'Socials');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="social-index">


    <p>
        <?= Html::a(Module::t('social', 'Create Social'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'class' => LinkColumn::className(),
                'attribute' => 'id',
            ],
            //'created_at',
            //'created_by',
            //'updated_at',
            //'updated_by',
            //'deleted_at',
            //'deleted_by',
            [
                'class' => LinkColumn::className(),
                'attribute' => 'title',
            ],
            'description:ntext',

            [
                'class' => ActionColumn::className(),
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>