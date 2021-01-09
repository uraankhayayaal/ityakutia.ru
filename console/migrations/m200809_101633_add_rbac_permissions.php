<?php

use yii\db\Migration;

/**
 * Class m200809_101633_add_rbac_permissions
 */
class m200809_101633_add_rbac_permissions extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%auth}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'source' => $this->string()->notNull(),
            'source_id' => $this->string()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('fk-auth-user_id-user-id','auth','user_id','user','id','CASCADE','CASCADE');

        $auth = Yii::$app->authManager;

        $auth->removeAll(); //На всякий случай удаляем старые данные из БД...

        // Создадим роли админа и редактора
        $admin = $auth->createRole('admin');
        $admin->description = "Администратор";
        $user = $auth->createRole('user');
        $user->description  = "Оператор";

        // запишем их в БД
        $auth->add($admin);
        $auth->add($user);

        $organization = $auth->createPermission('organization');
        $organization->description = 'Управление организациями';
        
        $gallery = $auth->createPermission('gallery');
        $gallery->description = 'Управление галереями';

        $news = $auth->createPermission('news');
        $news->description = 'Управление новостями';

        $news_category = $auth->createPermission('news_category');
        $news_category->description = 'Управление категориями новостей';

        $page = $auth->createPermission('page');
        $page->description = 'Управление страницами';

        $page_menu = $auth->createPermission('page_menu');
        $page_menu->description = 'Управление меню страниц';

        $navigation = $auth->createPermission('navigation');
        $navigation->description = 'Управление навигацией';

        $area = $auth->createPermission('area');
        $area->description = 'Управление районами';

        $application = $auth->createPermission('application');
        $application->description = 'Управление заявками';

        // 

        $rbac_permissions = $auth->createPermission('rbac_permissions');
        $rbac_permissions->description = 'Управление правами';

        $rbac_roles = $auth->createPermission('rbac_roles');
        $rbac_roles->description = 'Управление ролями';

        $rbac_users = $auth->createPermission('rbac_users');
        $rbac_users->description = 'Управление пользователями';

        $settings = $auth->createPermission('settings');
        $settings->description = 'Управление параметрами';

        // 

        // запись разрешений
        $auth->add($organization);
        $auth->add($gallery);
        $auth->add($news);
        $auth->add($news_category);
        $auth->add($page);
        $auth->add($navigation);
        $auth->add($area);
        $auth->add($application);

        $auth->add($rbac_permissions);
        $auth->add($rbac_roles);
        $auth->add($rbac_users);
        $auth->add($settings);

        // добавление наследование от user

        $auth->addChild($user, $organization);
        $auth->addChild($user, $gallery);
        $auth->addChild($user, $news);
        $auth->addChild($user, $news_category);
        $auth->addChild($user, $page);
        $auth->addChild($user, $navigation);
        $auth->addChild($user, $area);
        $auth->addChild($user, $application);

        $auth->addChild($user, $settings);

        $auth->addChild($admin, $rbac_users);
        $auth->addChild($admin, $rbac_permissions);
        $auth->addChild($admin, $rbac_roles);

        // админ наследует роль редактора новостей. Он же админ, должен уметь всё! :D
        $auth->addChild($admin, $user);

        // Назначаем роль admin пользователю с ID 1
        $auth->assign($admin, 1);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();

        $this->dropForeignKey('fk-auth-user_id-user-id','auth');

        $this->dropTable('{{%auth}}');
    }
}
