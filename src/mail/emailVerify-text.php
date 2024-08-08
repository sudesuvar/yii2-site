<?php

use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var common\models\User $user */


$verifyLink = Yii::$app->urlManager->createAbsoluteUrl(['site/auth/verify-email', 'token' => $user->verification_token]);
?>
    Hello <?= $user->username ?>,

    Follow the link below to verify your email:
       
<?= $verifyLink ?>