<?php

namespace portalium\site\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;

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
            return $this->render('./profile');
          }
    }

}