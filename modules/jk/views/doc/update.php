<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\jk\models\Doc */

$this->title = Yii::t(
    'app',
    'Update Doc: {name}',
    [
        'name' => $model->title,
    ]
);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Docs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>

<?= $this->render(
    '_form',
    [
        'model' => $model,
    ]
) ?>

