<?php

use yii\db\Migration;

class m211004_034326_create_table_language extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%language}}',
            [
                'id' => $this->primaryKey(),
                'name' => $this->string(10)->notNull(),
            ],
            $tableOptions
        );
    }

    public function down()
    {
        $this->dropTable('{{%language}}');
    }
}
