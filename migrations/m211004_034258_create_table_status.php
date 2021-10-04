<?php

use yii\db\Migration;

class m211004_034258_create_table_status extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%status}}',
            [
                'id' => $this->primaryKey(),
                'name' => $this->string(20)->notNull(),
            ],
            $tableOptions
        );
    }

    public function down()
    {
        $this->dropTable('{{%status}}');
    }
}
