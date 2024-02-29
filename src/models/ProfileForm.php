<?php

namespace portalium\site\models;

use portalium\base\Event;
use yii\base\Model;
use portalium\site\Module;
use Yii;
use portalium\user\models\User;

class ProfileForm extends Model
{
    public $username;
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $id_avatar;
    public $old_password;

    public function rules()
    {
        $rules = [
            ['username', 'trim'],
            //kullanıcının kendi usernami dışındakiler için unique kontrolü yapıyorum
            ['username', 'unique', 'targetClass' => '\portalium\user\models\User', 'filter' => function ($query) {
                $query->andWhere(['not', ['id_user' => Yii::$app->user->identity->id_user]]);
            }, 'message' => Module::t('This username has already been taken.')],            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'trim'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\portalium\user\models\User', 'filter' => function ($query) {
                $query->andWhere(['not', ['id_user' => Yii::$app->user->identity->id_user]]);
            }, 'message' => Module::t('This email address has already been taken.')],            ['password', 'string', 'min' => 6],
            ['first_name', 'safe'],
            ['last_name', 'safe'],
            ['id_avatar', 'safe'],
            ['old_password', 'string', 'min' => 6],
        ];

        return $rules;
    }


    public function attributeLabels()
    {
        return [
            'first_name' => Module::t('First Name'),
            'last_name' => Module::t('Last Name'),
            'username' => Module::t('Username'),
            'email' => Module::t('Email'),
            'password' => Module::t('Password')
            // 'id_avatar' =>Module::t('Id Avatar'),
        ];
    }

    public function updateUser()
    {

        if (!$this->validate()) {
            return null;
        }
        $user = User::findOne(Yii::$app->user->identity->id_user);

        if ($user) {

            //kullanıcı şifresini değiştirmeyecek  
            if ($this->password == null) {
                $user->first_name = $this->first_name;
                $user->last_name = $this->last_name;
                $user->username = $this->username;
                $user->email = $this->email;
                $user->id_avatar = $this->id_avatar;
                $user->access_token = \Yii::$app->security->generateRandomString();
                $user->generateAuthKey();
                $user->generateEmailVerificationToken();
                $user->status = Yii::$app->setting->getValue('site::userStatus');
                $user->save();
                return 1;
            }
            //kullanıcı şifresini değiştirecek
            else {
                if ($user->validatePassword($this->old_password)) {
                   
                    $user->first_name = $this->first_name;
                    $user->last_name = $this->last_name;
                    $user->username = $this->username;
                    $user->email = $this->email;
                    $user->id_avatar = $this->id_avatar;
                    $user->access_token = \Yii::$app->security->generateRandomString();
                    $user->generateAuthKey();
                    $user->generateEmailVerificationToken();
                    $user->setPassword($this->password);
                    $user->status = Yii::$app->setting->getValue('site::userStatus');
                    $user->save();
                    return 1;
                } else {
                    return -1;
                }
            }
        }
    }
}
