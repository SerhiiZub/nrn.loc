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
class m181124_091131_EventDescription extends yupe\components\DbMigration
{

    public function safeUp()
    {
        $this->addColumn('{{event}}', 'name', 'varchar(250) NOT NULL');
        $this->addColumn('{{event}}', 'description', 'text');
        $this->addColumn('{{event}}', 'icon',  "varchar(250) NOT NULL DEFAULT ''");
        $this->addColumn('{{event}}', 'slug', 'varchar(150) NOT NULL');
        $this->addColumn('{{event}}', 'status', "integer NOT NULL DEFAULT '0'");
    }

    public function safeDown()
    {
        $this->dropColumn('{{event}}', 'name');
        $this->dropColumn('{{event}}', 'description');
        $this->dropColumn('{{event}}', 'icon');
        $this->dropColumn('{{event}}', 'slug');
        $this->dropColumn('{{event}}', 'status');
    }
}
