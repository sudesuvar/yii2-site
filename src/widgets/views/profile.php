<?php

use portalium\site\bundles\ProfileAsset;

ProfileAsset::register($this);

$user = Yii::$app->user->getIdentity();
$username = $user->username;
$last_name = $user->last_name;
$first_name = $user->first_name;


?>

<li class="dropdown nav-item">
    <div class="dropdown text-end ">
        <a href="#" id="avatar" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="mdo" width="24" height="24" class="rounded-circle">
        </a>
        <ul class="dropdown-menu text-small" style="">
         

            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">EDIT ACCOUNT</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="nav-link" href="/site/auth/logout">LOGOUT</a></li>
        </ul>
    </div>
</li>