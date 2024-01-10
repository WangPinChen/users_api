<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%coutries}}`.
 */
class m240110_025356_create_coutries_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%coutries}}', [
            'id' => $this->primaryKey()->unsigned()->notNull()->comment('編號'),
            'country_name' => $this->string(50)->notNull()->comment('國家名稱')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%coutries}}');
    }
}
