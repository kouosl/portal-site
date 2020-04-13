<?php

namespace portalium\site\models;

use Yii;
use yii\base\Model;
use portalium\site\Module;
use portalium\user\models\User;

class PasswordResetRequestForm extends Model
{
    public $email;

    public function rules()
    {
        return [
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'exist',
                'targetClass' => '\portalium\user\models\User',
                'filter' => ['status' => User::STATUS_ACTIVE],
                'message' => Module::t('There is no user with this email address.')
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'email' => Module::t('Email'),
        ];
    }

    public function sendEmail()
    {
        $user = User::findOne([
            'status' => User::STATUS_ACTIVE,
            'email' => $this->email,
        ]);

        if (!$user) {
            return false;
        }
        
        if (!User::isPasswordResetTokenValid($user->password_reset_token)) {
            $user->generatePasswordResetToken();
            if (!$user->save()) {
                return false;
            }
        }

        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'passwordResetToken-html', 'text' => 'passwordResetToken-text'],
                ['user' => $user]
            )
            ->setFrom([Setting::findOne(['key' => 'email_address'])->value => Setting::findOne(['key' => 'email_display_name'])->value])
            ->setTo($this->email)
            ->setSubject(Module::t('Password reset for {email_display_name}!',['email_display_name' => Setting::findOne(['key' => 'email_display_name'])->value]))
            ->send();
    }
}
