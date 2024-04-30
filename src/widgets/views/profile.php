<?php

use portalium\site\bundles\ProfileAsset;
use portalium\site\Module;

ProfileAsset::register($this);

$iconSize =( isset($style['iconSize'])&& $style['iconSize']!='') ? $style['iconSize'] : 20;
?>

<li class="nav-item dropdown">
    <a href="#"class="nav-link dropdown-toggle profile flex-column" data-bs-toggle="dropdown"  aria-expanded="false"style="padding-bottom:7px !important; margin-bottom:0px; padding-top:3px !important;">
        <?php if ($model !== null) : ?>
            <img src="<?= $filePath ?>" alt="<?= $title ?>" width="<?= $iconSize ?>" height="<?= $iconSize ?>" class="rounded-circle me-2 flex-column"style="margin-top:5px; margin-left: -5px;" >
            <span class="photo-label flex-column"style="vertical-align: middle;margin-left: 10px;"><?= $label ?></span>
        <?php else : ?>
            <span class="profile-picture initials"><?= $usernameInitial ?></span>
            <span class="photo-label"style="vertical-align: middle;margin-left: 12.4px;"><?= $label ?></span>
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
        <li ><a class="dropdown-item" href="/site/profile/edit" style="text-align: center; border:none !important"><?php echo Module::t('Edit Account')?></a></li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li  ><a class="dropdown-item " href="/site/auth/logout" style="text-align: center;border:none !important"><?php echo Module::t('Logout')?></a></li>
    </ul>
</li>