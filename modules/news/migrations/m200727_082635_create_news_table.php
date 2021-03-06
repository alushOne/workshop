<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news}}`.
 */
class m200727_082635_create_news_table extends Migration
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

        $this->createTable(
            '{{%news}}',
            [
                'id' => $this->primaryKey(),
                'created_at' => $this->integer()->notNull(),
                'created_by' => $this->integer()->notNull(),
                'updated_at' => $this->integer(),
                'updated_by' => $this->integer(),
                'deleted_at' => $this->integer(),
                'deleted_by' => $this->integer(),

                'title' => $this->string()->notNull(),
                'img' => $this->string()->notNull(),
                'description' => $this->text()->notNull(),
                'annotation' => $this->text()->notNull(),
                'text' => $this->text()->notNull(),
            ],
            $tableOptions
        );

        $this->execute(file_get_contents(__DIR__ . '/../sql/news.sql'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%news}}');
    }
}
