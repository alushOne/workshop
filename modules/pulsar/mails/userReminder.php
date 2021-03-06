<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $user app\modules\user\models\User */
?>
<p>
    <strong>Уважаемый, <?= $user->fio ?>!</strong>
<p>
<p>
    Напоминаем вам, что вы сегодня ещё не проставили отметку о состоянии вашего здоровья в
    <?= Html::a('Пульсаре на HR-портале', 'http:/workshop/pulsar/pulsar/create') ?>.
    Убедительно просим вас: сообщить о вашем самочувствии. Отчёт по вашему подразделению будет сформирован автоматически сегодня в 15:00 МСК и направлен
    на имя руководителя вашего подразделения.
</p>
<p>
    Письмо сформировано автоматически и не требует ответа. По всем возникающим вопросам и пожеланиям по работе с системой
    пишите администрации портала по адресу <?= Html::a('workshop@rt.ru', 'mailto:workshop@rt.ru') ?>.
    Крепкого вам здоровья и хорошего настроения.<br/>
</p>
<p>
    <strong>С уважением Администрация HR-портала</strong>
</p>