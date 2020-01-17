<?php

namespace app\modules\main\controllers;
use app\modules\main\models\ContactForm;
use app\modules\user\models\User;
use Yii;
use yii\web\Controller;

/**
 * Default controller for the `main` module
 */
class DefaultController extends Controller
{

    public $title;

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionContacts()
    {
        $model = new ContactForm();
        $post = false;

        if (Yii::$app->request->post()){
            $model->load(Yii::$app->request->post());
            $user =  $user = User::findOne(Yii::$app->user->identity->getId());
            $model->name = $user->username;
            $model->email=$user->email;
            $post = true;
        }

        if ($post && $model->contact(Yii::$app->params['supportEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');
            return $this->refresh();
        } else {
            return $this->render('contacts', [
                'model' => $model,
            ]);
        }
    }
}