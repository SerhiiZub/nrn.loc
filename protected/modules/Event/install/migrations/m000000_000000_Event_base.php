<?php
/**
 * Event install migration
 * Класс миграций для модуля Event:
 *
 * @category YupeMigration
 * @package  yupe.modules.Event.install.migrations
 * @author   YupeTeam <team@yupe.ru>
 * @license  BSD https://raw.github.com/yupe/yupe/master/LICENSE
 * @link     http://yupe.ru
 **/
class m000000_000000_Event_base extends yupe\components\DbMigration
{
    /**
     * Функция настройки и создания таблицы:
     *
     * @return null
     **/
    public function safeUp()
    {
        $this->createTable(
            '{{event}}',
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
        $this->createIndex("ix_{{Event}}_create_user", '{{Event}}', "create_user_id", false);
        $this->createIndex("ix_{{Event}}_update_user", '{{Event}}', "update_user_id", false);
        $this->createIndex("ix_{{Event}}_create_time", '{{Event}}', "create_time", false);
        $this->createIndex("ix_{{Event}}_update_time", '{{Event}}', "update_time", false);

    }

    /**
     * Функция удаления таблицы:
     *
     * @return null
     **/
    public function safeDown()
    {
        $this->dropTableWithForeignKeys('{{Event}}');
    }
}
