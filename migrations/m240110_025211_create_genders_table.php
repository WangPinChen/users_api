<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%genders}}`.
 */
class m240110_025211_create_genders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%genders}}', [
            'id' => $this->primaryKey()->unsigned()->notNull()->comment('編號'),
            'gender' => $this->string(10)->notNull()->comment('性別名稱'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%genders}}');
    }
}
