<?php

namespace app\modules\user\forms;

use app\modules\user\models\User;
use app\modules\user\Module;
use yii\base\Model;
use Yii;


/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $icon = '<i class="fas fa-user-plus"></i>';

    public $verifyCode;

    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'match', 'pattern' => '#^[\w_-]+$#i'],
            [
                'username',
                'unique',
                'targetClass' => User::className(),
                'message' => 'This username has already been taken.'
            ],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            [
                'email',
                'unique',
                'targetClass' => User::className(),
                'message' => 'This email address has already been taken.'
            ],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['verifyCode', 'captcha', 'captchaAction' => '/user/default/captcha'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->status = User::STATUS_WAIT;
            $user->generateAuthKey();
            $user->generateEmailConfirmToken();

            if ($user->save()) {
                Yii::$app->mailer->compose(
                    '@app/modules/user/mails/emailConfirm',
                    ['user' => $user]
                )
                    ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name])
                    ->setTo($this->email)
                    ->setSubject('Email confirmation for ' . Yii::$app->name)
                    ->send();
                return $user;
            }
        }

        return null;
    }

    public function attributeLabels()
    {
        return [
            'username' => Module::t('module', 'Username'),
            'email' => Module::t('module', 'Email'),
            'password' => Module::t('module', 'Password'),
            'rememberMe' => Module::t('module', 'Remember Me'),
            'verifyCode' => Module::t('module', 'Verify Code')
        ];
    }
}