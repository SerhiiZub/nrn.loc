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
class m000000_000001_Event_base extends yupe\components\DbMigration
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
        $this->createIndex("ix_{{event}}_create_user", '{{event}}', "create_user_id", false);
        $this->createIndex("ix_{{event}}_update_user", '{{event}}', "update_user_id", false);
        $this->createIndex("ix_{{event}}_create_time", '{{event}}', "create_time", false);
        $this->createIndex("ix_{{event}}_update_time", '{{event}}', "update_time", false);

    }

    /**
     * Функция удаления таблицы:
     *
     * @return null
     **/
    public function safeDown()
    {
        $this->dropTableWithForeignKeys('{{event}}');
    }
}
