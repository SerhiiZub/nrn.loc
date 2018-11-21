<?php
/**
 * Admin install migration
 * Класс миграций для модуля Admin:
 *
 * @category YupeMigration
 * @package  yupe.modules.admin.install.migrations
 * @author   YupeTeam <team@yupe.ru>
 * @license  BSD https://raw.github.com/yupe/yupe/master/LICENSE
 * @link     http://yupe.ru
 **/
class m000000_000000_admin_base extends yupe\components\DbMigration
{
    /**
     * Функция настройки и создания таблицы:
     *
     * @return null
     **/
    public function safeUp()
    {
        $this->createTable(
            '{{admin}}',
            [
                'id'             => 'pk',
                //для удобства добавлены некоторые базовые поля, которые могут пригодиться.
                'create_user_id' => "integer NOT NULL",
                'update_user_id' => "integer NOT NULL",
                'create_time'    => 'datetime NOT NULL',
                'update_time'    => 'datetime NOT NULL',
            ],
            $this->getOptions()
        );

        //ix
        $this->createIndex("ix_{{admin}}_create_user", '{{admin}}', "create_user_id", false);
        $this->createIndex("ix_{{admin}}_update_user", '{{admin}}', "update_user_id", false);
        $this->createIndex("ix_{{admin}}_create_time", '{{admin}}', "create_time", false);
        $this->createIndex("ix_{{admin}}_update_time", '{{admin}}', "update_time", false);

    }

    /**
     * Функция удаления таблицы:
     *
     * @return null
     **/
    public function safeDown()
    {
        $this->dropTableWithForeignKeys('{{admin}}');
    }
}
