<?php

use yii\db\Migration;
use portalium\site\rbac\OwnRule;


class m211115_010203_preference_rbac extends Migration
{
    public function up()
    {
        $auth = \Yii::$app->authManager;

        $rule = new OwnRule();
        $auth->add($rule);
        $role = \Yii::$app->setting->getValue('site::admin_role');
        $admin = (isset($role) && $role != '') ? $auth->getRole($role) : $auth->getRole('admin');

        $siteWebPreferenceIndex = $auth->createPermission('siteWebPreferenceIndex');
        $siteWebPreferenceIndex->description = 'Site Web Preference Index';
        $auth->add($siteWebPreferenceIndex);
        $auth->addChild($admin, $siteWebPreferenceIndex);

        $siteWebPreferenceView = $auth->createPermission('siteWebPreferenceView');
        $siteWebPreferenceView->description = 'Site Web Preference View';
        $auth->add($siteWebPreferenceView);
        $auth->addChild($admin, $siteWebPreferenceView);

        $siteWebPreferenceCreate = $auth->createPermission('siteWebPreferenceCreate');
        $siteWebPreferenceCreate->description = 'Site Web Preference Create';
        $auth->add($siteWebPreferenceCreate);
        $auth->addChild($admin, $siteWebPreferenceCreate);

        $siteWebPreferenceUpdate = $auth->createPermission('siteWebPreferenceUpdate');
        $siteWebPreferenceUpdate->description = 'Site Web Preference Update';
        $auth->add($siteWebPreferenceUpdate);
        $auth->addChild($admin, $siteWebPreferenceUpdate);

        $siteWebPreferenceDelete = $auth->createPermission('siteWebPreferenceDelete');
        $siteWebPreferenceDelete->description = 'Site Web Preference Delete';
        $auth->add($siteWebPreferenceDelete);
        $auth->addChild($admin, $siteWebPreferenceDelete);


        $siteApiPreferenceIndex = $auth->createPermission('siteApiPreferenceIndex');
        $siteApiPreferenceIndex->description = 'Site Api Preference Index';
        $auth->add($siteApiPreferenceIndex);
        $auth->addChild($admin, $siteApiPreferenceIndex);

        $siteApiPreferenceView = $auth->createPermission('siteApiPreferenceView');
        $siteApiPreferenceView->description = 'Site Api Preference View';
        $auth->add($siteApiPreferenceView);
        $auth->addChild($admin, $siteApiPreferenceView);

        $siteApiPreferenceCreate = $auth->createPermission('siteApiPreferenceCreate');
        $siteApiPreferenceCreate->description = 'Site Api Preference Create';
        $auth->add($siteApiPreferenceCreate);
        $auth->addChild($admin, $siteApiPreferenceCreate);

        $siteApiPreferenceUpdate = $auth->createPermission('siteApiPreferenceUpdate');
        $siteApiPreferenceUpdate->description = 'Site Api Preference Update';
        $auth->add($siteApiPreferenceUpdate);
        $auth->addChild($admin, $siteApiPreferenceUpdate);

        $siteApiPreferenceDelete = $auth->createPermission('siteApiPreferenceDelete');
        $siteApiPreferenceDelete->description = 'Site Api Preference Delete';
        $auth->add($siteApiPreferenceDelete);
        $auth->addChild($admin, $siteApiPreferenceDelete);

        $siteWebPreferenceIndexOwn = $auth->createPermission('siteWebPreferenceIndexOwn');
        $siteWebPreferenceIndexOwn->description = 'Site Web PreferenceIndexOwn';
        $siteWebPreferenceIndexOwn->ruleName = $rule->name;
        $auth->add($siteWebPreferenceIndexOwn);
        $auth->addChild($admin, $siteWebPreferenceIndexOwn);
        $siteWebPreferenceIndex = $auth->getPermission('siteWebPreferenceIndex');
        $auth->addChild($siteWebPreferenceIndexOwn, $siteWebPreferenceIndex);

        $siteWebPreferenceViewOwn = $auth->createPermission('siteWebPreferenceViewOwn');
        $siteWebPreferenceViewOwn->description = 'Site Web PreferenceViewOwn';
        $siteWebPreferenceViewOwn->ruleName = $rule->name;
        $auth->add($siteWebPreferenceViewOwn);
        $auth->addChild($admin, $siteWebPreferenceViewOwn);
        $siteWebPreferenceView = $auth->getPermission('siteWebPreferenceView');
        $auth->addChild($siteWebPreferenceViewOwn, $siteWebPreferenceView);

        $siteWebPreferenceCreateOwn = $auth->createPermission('siteWebPreferenceCreateOwn');
        $siteWebPreferenceCreateOwn->description = 'Site Web PreferenceCreateOwn';
        $siteWebPreferenceCreateOwn->ruleName = $rule->name;
        $auth->add($siteWebPreferenceCreateOwn);
        $auth->addChild($admin, $siteWebPreferenceCreateOwn);
        $siteWebPreferenceCreate = $auth->getPermission('siteWebPreferenceCreate');
        $auth->addChild($siteWebPreferenceCreateOwn, $siteWebPreferenceCreate);

        $siteWebPreferenceUpdateOwn = $auth->createPermission('siteWebPreferenceUpdateOwn');
        $siteWebPreferenceUpdateOwn->description = 'Site Web PreferenceUpdateOwn';
        $siteWebPreferenceUpdateOwn->ruleName = $rule->name;
        $auth->add($siteWebPreferenceUpdateOwn);
        $auth->addChild($admin, $siteWebPreferenceUpdateOwn);
        $siteWebPreferenceUpdate = $auth->getPermission('siteWebPreferenceUpdate');
        $auth->addChild($siteWebPreferenceUpdateOwn, $siteWebPreferenceUpdate);

        $siteWebPreferenceDeleteOwn = $auth->createPermission('siteWebPreferenceDeleteOwn');
        $siteWebPreferenceDeleteOwn->description = 'Site Web PreferenceDeleteOwn';
        $siteWebPreferenceDeleteOwn->ruleName = $rule->name;
        $auth->add($siteWebPreferenceDeleteOwn);
        $auth->addChild($admin, $siteWebPreferenceDeleteOwn);
        $siteWebPreferenceDelete = $auth->getPermission('siteWebPreferenceDelete');
        $auth->addChild($siteWebPreferenceDeleteOwn, $siteWebPreferenceDelete);

        $siteApiPreferenceViewOwn = $auth->createPermission('siteApiPreferenceViewOwn');
        $siteApiPreferenceViewOwn->description = 'Site Api PreferenceViewOwn';
        $siteApiPreferenceViewOwn->ruleName = $rule->name;
        $auth->add($siteApiPreferenceViewOwn);
        $auth->addChild($admin, $siteApiPreferenceViewOwn);
        $siteApiPreferenceView = $auth->getPermission('siteApiPreferenceView');
        $auth->addChild($siteApiPreferenceViewOwn, $siteApiPreferenceView);

        $siteApiPreferenceCreateOwn = $auth->createPermission('siteApiPreferenceCreateOwn');
        $siteApiPreferenceCreateOwn->description = 'Site Api PreferenceCreateOwn';
        $siteApiPreferenceCreateOwn->ruleName = $rule->name;
        $auth->add($siteApiPreferenceCreateOwn);
        $auth->addChild($admin, $siteApiPreferenceCreateOwn);
        $siteApiPreferenceCreate = $auth->getPermission('siteApiPreferenceCreate');
        $auth->addChild($siteApiPreferenceCreateOwn, $siteApiPreferenceCreate);

        $siteApiPreferenceUpdateOwn = $auth->createPermission('siteApiPreferenceUpdateOwn');
        $siteApiPreferenceUpdateOwn->description = 'Site Api PreferenceUpdateOwn';
        $siteApiPreferenceUpdateOwn->ruleName = $rule->name;
        $auth->add($siteApiPreferenceUpdateOwn);
        $auth->addChild($admin, $siteApiPreferenceUpdateOwn);
        $siteApiPreferenceUpdate = $auth->getPermission('siteApiPreferenceUpdate');
        $auth->addChild($siteApiPreferenceUpdateOwn, $siteApiPreferenceUpdate);

        $siteApiPreferenceDeleteOwn = $auth->createPermission('siteApiPreferenceDeleteOwn');
        $siteApiPreferenceDeleteOwn->description = 'Site Api PreferenceDeleteOwn';
        $siteApiPreferenceDeleteOwn->ruleName = $rule->name;
        $auth->add($siteApiPreferenceDeleteOwn);
        $auth->addChild($admin, $siteApiPreferenceDeleteOwn);
        $siteApiPreferenceDelete = $auth->getPermission('siteApiPreferenceDelete');
        $auth->addChild($siteApiPreferenceDeleteOwn, $siteApiPreferenceDelete);


        $siteApiPreferenceIndexOwn = $auth->createPermission('siteApiPreferenceIndexOwn');
        $siteApiPreferenceIndexOwn->description = 'Site Api PreferenceIndexOwn';
        $auth->add($siteApiPreferenceIndexOwn);
        $auth->addChild($admin, $siteApiPreferenceIndexOwn);


    }
    public function down()
    {
        $auth->remove($auth->getPermission('siteWebPreferenceIndex'));
        $auth->remove($auth->getPermission('siteWebPreferenceView'));
        $auth->remove($auth->getPermission('siteWebPreferenceCreate'));
        $auth->remove($auth->getPermission('siteWebPreferenceUpdate'));
        $auth->remove($auth->getPermission('siteWebPreferenceDelete'));

        $auth->remove($auth->getPermission('siteApiPreferenceIndex'));
        $auth->remove($auth->getPermission('siteApiPreferenceView'));
        $auth->remove($auth->getPermission('siteApiPreferenceCreate'));
        $auth->remove($auth->getPermission('siteApiPreferenceUpdate'));
        $auth->remove($auth->getPermission('siteApiPreferenceDelete'));

        $auth->remove($auth->getPermission('siteOwnWebPreferenceIndex'));
        $auth->remove($auth->getPermission('siteOwnWebPreferenceView'));
        $auth->remove($auth->getPermission('siteOwnWebPreferenceCreate'));
        $auth->remove($auth->getPermission('siteOwnWebPreferenceUpdate'));
        $auth->remove($auth->getPermission('siteOwnWebPreferenceDelete'));

        $auth->remove($auth->getPermission('siteOwnApiPreferenceIndex'));
        $auth->remove($auth->getPermission('siteOwnApiPreferenceView'));
        $auth->remove($auth->getPermission('siteOwnApiPreferenceCreate'));
        $auth->remove($auth->getPermission('siteOwnApiPreferenceUpdate'));
        $auth->remove($auth->getPermission('siteOwnApiPreferenceDelete'));
    }
}