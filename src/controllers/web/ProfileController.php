<?php

namespace portalium\site\controllers\web;

use portalium\site\models\ProfileForm;
use portalium\user\models\User;
use portalium\web\Controller as WebController;
use Yii;

class ProfileController extends WebController
{
    public function actionEdit()
    {
        $model =new ProfileForm();
        $user = User::findOne(Yii::$app->user->identity->id_user);
        $model->username=$user->username;
        $model->first_name=$user->first_name;
        $model->last_name=$user->last_name;
        $model->email=$user->email;
        if ($model->load(Yii::$app->request->post())) {
           
            if($model->updateUser()==1)
            {
              
                Yii::$app->session->addFlash('success', 'Profiliniz başarıyla güncellendi!');
               $this->render('@vendor/portalium/yii2-site/src/widgets/Profile',[
                ]);
               
            }
            else if($model->updateUser()==-1){
              
                Yii::$app->session->addFlash('error', ' Eski Password bilginiz hatalı!');
            }
            else
            {
                Yii::$app->session->addFlash('error', 'Lütfen eski Password bilginiz giriniz!');
            }
           
        }

        return $this->render('edit', [
            'model' => $model,
        ]);
    }



}

