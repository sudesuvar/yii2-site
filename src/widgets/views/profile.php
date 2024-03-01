<?php

use portalium\site\bundles\ProfileAsset;

ProfileAsset::register($this);

$iconSize =( isset($style['iconSize'])&& $style['iconSize']!='') ? $style['iconSize'] : 24;
?>

<li class="nav-item dropdown me-lg-0 ">
    <a href="#" id="avatar" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"  aria-expanded="false">
        <?php if ($model !== null) : ?>
            <img src="<?= $filePath ?>" alt="<?= $title ?>" width="<?= $iconSize ?>" height="<?= $iconSize ?>" class="rounded-circle me-2" >
        <?php else : ?>
            <span class="profile-picture initials"><?= $usernameInitial ?></span>
        <?php endif; ?>
    </a>
    <ul class="dropdown-menu">
        <li>
            <div class="d-flex flex-column text-center p-3">
                <?php if ($model !== null) : ?>
                    <img src="<?= $filePath ?>" alt="<?= $title ?>" width="80" height="80" class="rounded-circle mx-auto mb-3">
                <?php else : ?>
                    <span class="profile-picture initials rounded-circle mx-auto mb-3"><?= $usernameInitial ?></span>
                <?php endif; ?>
                <span><?= $username ?></span>
                <?php if ($first_name !== null || $last_name !== null) : ?>
                    <div class="small"><?= $first_name . " " . $last_name ?></div>
                <?php endif; ?>
            </div>
        </li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li ><a class="dropdown-item" href="/site/profile/edit" style="text-align: center; border:none !important">Edit Account</a></li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li  ><a class="dropdown-item " href="/site/auth/logout" style="text-align: center;border:none !important">Logout</a></li>
    </ul>
</li>