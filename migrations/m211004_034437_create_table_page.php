<?php

use yii\db\Migration;

class m211004_034437_create_table_page extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%page}}',
            [
                'id' => $this->primaryKey(),
                'title' => $this->string(100)->notNull()->comment('Название'),
                'content' => $this->text()->notNull(),
                'create_date' => $this->timestamp()->notNull()->comment('Дата создания'),
                'update_date' => $this->timestamp()->notNull()->comment('Дата обновления'),
                'language_id' => $this->integer(1)->notNull()->comment('Язык'),
                'post_id' => $this->integer()->notNull(),
            ],
            $tableOptions
        );

        $this->createIndex('language_id', '{{%page}}', ['language_id']);
        $this->createIndex('post_id', '{{%page}}', ['post_id']);

        $this->addForeignKey(
            'page_ibfk_1',
            '{{%page}}',
            ['post_id'],
            '{{%post}}',
            ['id'],
            'CASCADE',
            'RESTRICT'
        );
        $this->addForeignKey(
            'page_ibfk_2',
            '{{%page}}',
            ['language_id'],
            '{{%language}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function down()
    {
        $this->dropTable('{{%page}}');
    }
}
