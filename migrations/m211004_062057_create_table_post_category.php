<?php

use yii\db\Migration;

class m211004_062057_create_table_post_category extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%post_category}}',
            [
                'id_post' => $this->integer()->notNull(),
                'id_category' => $this->integer()->notNull(),
            ],
            $tableOptions
        );

        $this->createIndex('id_post', '{{%post_category}}', ['id_post']);
        $this->createIndex('id_category', '{{%post_category}}', ['id_category']);

        $this->addForeignKey(
            'post_category_ibfk_1',
            '{{%post_category}}',
            ['id_post'],
            '{{%post}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'post_category_ibfk_2',
            '{{%post_category}}',
            ['id_category'],
            '{{%category}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function down()
    {
        $this->dropTable('{{%post_category}}');
    }
}
