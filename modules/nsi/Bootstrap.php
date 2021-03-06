<?php

namespace app\modules\nsi;

use Yii;
use yii\base\BootstrapInterface;

class Bootstrap implements BootstrapInterface
{

    public function bootstrap($app)
    {
        $app->i18n->translations['modules/nsi/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'forceTranslation' => true,
            'basePath' => '@app/modules/nsi/messages',
            'fileMap' => [
                'modules/nsi/module' => 'module.php',
                'modules/nsi/color' => 'color.php',
            ],
        ];
    }
}