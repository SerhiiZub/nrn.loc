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
class m181124_091130_EventDescription extends yupe\components\DbMigration
{

    public function safeUp()
    {
        $this->addColumn('{{Event}}', 'name', 'varchar(250) NOT NULL');
        $this->addColumn('{{Event}}', 'description', 'text');
        $this->addColumn('{{Event}}', 'icon',  "varchar(250) NOT NULL DEFAULT ''");
        $this->addColumn('{{Event}}', 'slug', 'varchar(150) NOT NULL');
        $this->addColumn('{{Event}}', 'status', "integer NOT NULL DEFAULT '0'");
    }

    public function safeDown()
    {
        $this->dropColumn('{{Event}}', 'name');
        $this->dropColumn('{{Event}}', 'description');
        $this->dropColumn('{{Event}}', 'icon');
        $this->dropColumn('{{Event}}', 'slug');
        $this->dropColumn('{{Event}}', 'status');
    }
}
