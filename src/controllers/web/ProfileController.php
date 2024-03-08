<?php

namespace portalium\site\controllers\web;

use portalium\site\models\ProfileForm;
use portalium\site\models\ProfilePasswordForm;
use portalium\user\models\User;
use portalium\web\Controller as WebController;
use portalium\site\Module;
use Yii;

class ProfileController extends WebController
{
    public function actionEdit()
    {
        $modelprofile = new ProfileForm();
        $modelpassword = new ProfilePasswordForm();

        $user = User::findOne(Yii::$app->user->identity->id_user);
        $modelprofile->username = $user->username;
        $modelprofile->first_name = $user->first_name;
        $modelprofile->last_name = $user->last_name;
        $modelprofile->email = $user->email;

      
        if ($modelprofile->load(Yii::$app->request->post())) {
            if ($modelprofile->updateUser() ) {
                Yii::$app->session->addFlash('success',Module::t('Your profile has been successfully updated!') );
            }
        }
        return $this->render('edit', [
            'modelprofile' =>$modelprofile, 
            'modelpassword'=>$modelpassword,   
        ]);
    }
    
    public function actionEditPassword()
    {
        $modelpassword = new  ProfilePasswordForm();
        $modelprofile = new ProfileForm();
        if ($modelpassword->load(Yii::$app->request->post())) {
            if ($modelpassword->updatePassword()) {
                Yii::$app->session->addFlash('success',Module::t('Your password has been successfully updated') );
            } else {
                Yii::$app->session->addFlash('error', Module::t('Your old Password information is incorrect!'));
            }
        }

        return $this->render('edit', [
            'modelpassword'=>$modelpassword, 
            'modelprofile'=>$modelprofile,  
        ]);
    }
}
