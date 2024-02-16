<?php

use portalium\site\bundles\ProfileAsset;

ProfileAsset::register($this);

$user = Yii::$app->user->getIdentity();
$username = $user->username;
$last_name = $user->last_name;
$first_name = $user->first_name;
$id_avatar=$user->id_avatar;

?>

<li class="nav-item dropdown">
    <a href="#" id="avatar" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="mdo" width="24" height="24" class="rounded-circle me-2">
    </a>
    <ul class="dropdown-menu">
        <li>
            <div class="d-flex flex-column text-center p-3">
                <img src="https://github.com/mdo.png" alt="mdo" width="80" height="80" class="rounded-circle mx-auto mb-3">
                <span class="fw-bold"><?= $username ?></span>
                <?php if ($first_name !== null || $last_name !== null): ?>
                <div class="small"><?= $first_name . " " . $last_name ?></div>
                <?php endif; ?>
            </div>
        </li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li><a class="dropdown-item" href="/site/profile/edit" style="text-align: center; font-weight: bold;">EDIT ACCOUNT</a></li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li><a class="dropdown-item" href="/site/auth/logout" style="text-align: center; font-weight: bold;">LOGOUT</a></li>
    </ul>
</li>