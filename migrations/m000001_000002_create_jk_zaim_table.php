<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `{{%jk_zaim}}`.
 */
class m000001_000002_create_jk_zaim_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions
                = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%jk_zaim}}', [
            'id' => Schema::TYPE_PK,

            'created_at' => Schema::TYPE_DATETIME . ' NOT NULL',
            'created_by' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_DATETIME,
            'updated_by' => Schema::TYPE_INTEGER,


            'family_count'=> Schema::TYPE_INTEGER . ' NOT NULL',
            'family_income'=> Schema::TYPE_INTEGER . ' NOT NULL',

            'area_total'=> Schema::TYPE_INTEGER . ' NOT NULL',
            'area_buy'=> Schema::TYPE_INTEGER . ' NOT NULL',

            'cost_total'=> Schema::TYPE_INTEGER . ' NOT NULL',
            'cost_user' => Schema::TYPE_INTEGER . ' NOT NULL',
            'bank_credit' => Schema::TYPE_INTEGER . ' NOT NULL',

            'rf_area'=> Schema::TYPE_INTEGER . ' NOT NULL',

            'compensation_result'=> Schema::TYPE_BOOLEAN,
            'compensation_count'=> Schema::TYPE_INTEGER,
            'compensation_years'=> Schema::TYPE_INTEGER

        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%jk_zaim}}');
    }
}
