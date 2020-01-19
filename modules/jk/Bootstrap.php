<?php

namespace app\modules\jk;

use yii\base\BootstrapInterface;
use Yii;

class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app)
    {
        $app->i18n->translations['modules/jk/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'forceTranslation' => true,
            'basePath' => '@app/modules/jk/messages',
            'fileMap' => [
                'modules/jk/module' => 'module.php',
            ],
        ];
    }
}