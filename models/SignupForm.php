<?php

namespace app\models;

use mdm\admin\models\form\Signup;
use Yii;

class SignupForm extends Signup
{
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'fullName_ru' => Yii::t('app', 'ФИО на русском языке'),
            'fullName_kk' => Yii::t('app', 'ФИО на казахском языке'),
            'fullName_en' => Yii::t('app', 'ФИО на английском языке'),
            'username' => Yii::t('app', 'Логин'),
            'email' => Yii::t('app', 'Email'),
            'password' => Yii::t('app', 'Пароль'),
            'retypePassword' => Yii::t('app', 'Подтверждение пароля'),
        ];
    }

}
