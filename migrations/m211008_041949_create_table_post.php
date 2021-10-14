<?php

use yii\db\Migration;

class m211008_041949_create_table_post extends Migration
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
                'status_id' => $this->integer()->notNull()->comment('Статус'),
                'author_id' => $this->integer()->notNull()->comment('Автор'),
            ],
            $tableOptions
        );

        $this->addForeignKey(
            'post_ibfk_1',
            '{{%post}}',
            ['author_id'],
            '{{%user}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'post_ibfk_2',
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
