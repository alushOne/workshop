<?php

use app\modules\jk\Module;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\jk\models\OrderStop */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'ЖК', 'url' => ['/jk']];
$this->params['breadcrumbs'][] = ['label' => 'Админка', 'url' => ['/jk/admin']];
$this->params['breadcrumbs'][] = ['label' => Module::t('stop', 'Stops'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-body">
                <p>
                    <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                            'method' => 'post',
                        ],
                    ]) ?>
                </p>
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        'created_at:datetime',
                        [
                            'label' => 'Кем создано',
                            'format' => 'raw',
                            'value' => $model->getCreatedUserLink(),
                        ],
                        'title',
                        'description',
                        [
                                'label'=>'Статус заявки',
                            'value'=>$model->orderStatus->title
                        ],

                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>