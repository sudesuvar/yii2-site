<?php

namespace portalium\site\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use portalium\storage\models\Storage;

class Profile extends Widget
{

  //işlemleri başlatan fonksiyon
    public function init()
    { 
   // yapıcı method
    }

    //işlemlerin sonucunu oluşturan fonksiyon
    public function run()
    {
           //yetki kontrolü
          // widgets altındaki viewse render et

          if(Yii::$app->user->isGuest == true)
          {
            return false;
          }
          else{
            $user = Yii::$app->user->getIdentity();
            $username = $user->username;
            $last_name = $user->last_name;
            $first_name = $user->first_name;
            $id_avatar = $user->id_avatar;
        
            $storage = new Storage();
            $model = $storage->find()->andWhere(['id_storage' => $id_avatar])->one();
            $title = "";
            $usernameInitial = '';
            $filePath = '';
        
            if ($model !== null) {
                $filename = $model->name;
                
                if ($filename !== null && $filename !== '') {
                    $filePath = Yii::getAlias('@web/data/' . $filename);
                    $title = $model->title;
                }
            } else {
                $usernameInitial = mb_substr($username, 0, 1, 'UTF-8');
                $title = $username;
            }
        
            return $this->render('./profile', [
                'username' => $username,
                'last_name' => $last_name,
                'first_name' => $first_name,
                'id_avatar' => $id_avatar,
                'model' => $model,
                'title' => $title,
                'usernameInitial' => $usernameInitial,
                'filePath' => $filePath,
            ]);
          }
    }

}