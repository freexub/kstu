<?php

use yii\db\Migration;

class m211008_041928_create_table_language extends Migration
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
                'code' => $this->string(2)->notNull(),
                'name' => $this->string(20)->notNull(),
            ],
            $tableOptions
        );
    }

    public function down()
    {
        $this->dropTable('{{%language}}');
    }
}
