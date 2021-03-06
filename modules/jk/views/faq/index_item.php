<?php

use yii\helpers\Html;

?>
<div class="card card-primary">
    <div class="card-header">
        <h4 class="card-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#faq-<?=$model->id?>"
               class="collapsed" aria-expanded="false">
                <i class='fas fa-question'></i> <?= Html::encode($model->question) ?>
            </a>
        </h4>
    </div>
    <div id="faq-<?=$model->id?>" class="panel-collapse collapse">
        <div class="card-body">
            <?= $model->answer ?>
        </div>
    </div>
</div>