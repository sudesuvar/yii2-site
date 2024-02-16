<?php

namespace portalium\site\controllers\web;

use portalium\user\models\User;
use portalium\web\Controller as WebController;
use Yii;

class ProfileController extends WebController
{
    public function actionEdit()
    {
        $model = User::findOne(Yii::$app->user->id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Profiliniz başarıyla güncellendi!');
            return $this->refresh();
        }

        return $this->render('edit', [
            'model' => $model,
        ]);
    }

    public function actionUpdate()
    {
        $model = User::find(Yii::$app->user->id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Profiliniz başarıyla güncellendi!');
            return $this->redirect(['profile/edit']);
        }

        return $this->render('edit', [
            'model' => $model,
        ]);
    }
}

