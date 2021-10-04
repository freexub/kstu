<?php

use yii\db\Migration;

class m211004_034433_create_table_post extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%post}}',
            [
                'id' => $this->primaryKey(),
                'category_id' => $this->integer()->notNull()->comment('Категория'),
                'status_id' => $this->integer()->notNull()->comment('Статус'),
                'author_id' => $this->integer()->notNull()->comment('Автор'),
            ],
            $tableOptions
        );

        $this->createIndex('author_id', '{{%post}}', ['author_id']);
        $this->createIndex('category_id', '{{%post}}', ['category_id']);
        $this->createIndex('status_id', '{{%post}}', ['status_id']);

        $this->addForeignKey(
            'post_ibfk_1',
            '{{%post}}',
            ['category_id'],
            '{{%category}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'post_ibfk_2',
            '{{%post}}',
            ['author_id'],
            '{{%user}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'post_ibfk_3',
            '{{%post}}',
            ['status_id'],
            '{{%status}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function down()
    {
        $this->dropTable('{{%post}}');
    }
}
