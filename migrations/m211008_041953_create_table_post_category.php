<?php

use yii\db\Migration;

class m211008_041953_create_table_post_category extends Migration
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
                'id' => $this->primaryKey(),
                'post_id' => $this->integer()->notNull(),
                'category_id' => $this->integer()->notNull(),
            ],
            $tableOptions
        );

        $this->createIndex('category_id', '{{%post_category}}', ['category_id']);
        $this->createIndex('post_id', '{{%post_category}}', ['post_id']);

        $this->addForeignKey(
            'post_category_ibfk_1',
            '{{%post_category}}',
            ['post_id'],
            '{{%post}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'post_category_ibfk_2',
            '{{%post_category}}',
            ['category_id'],
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
