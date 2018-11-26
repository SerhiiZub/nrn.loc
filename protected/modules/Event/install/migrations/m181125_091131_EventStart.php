<?php

/**
 * m130503_091124_BlogPostImage
 *
 * Blog install migration
 * Класс миграций для модуля Blog:
 *
 * @category YupeMigration
 * @package  yupe.modules.blog.install.migrations
 * @author   YupeTeam <team@yupe.ru>
 * @license  BSD https://raw.github.com/yupe/yupe/master/LICENSE
 * @link     http://yupe.ru
 **/
class m181125_091131_EventStart extends yupe\components\DbMigration
{

    public function safeUp()
    {
        $this->addColumn('{{event}}', 'city',  "varchar(250) NOT NULL DEFAULT ''");
        $this->addColumn('{{event}}', 'address',  "varchar(250) NOT NULL DEFAULT ''");
        $this->addColumn('{{event}}', 'sellerId',  'varchar(36)');
        $this->addColumn('{{event}}', 'dateTimeStart', 'datetime NOT NULL');
        $this->addColumn('{{event}}', 'dateTimeEndRegistration', 'datetime NOT NULL');
    }

    public function safeDown()
    {
        $this->dropColumn('{{event}}', 'city');
        $this->dropColumn('{{event}}', 'address');
        $this->dropColumn('{{event}}', 'sellerId');
        $this->dropColumn('{{event}}', 'dateTimeStart');
        $this->dropColumn('{{event}}', 'dateTimeEndRegistration');
    }
}
