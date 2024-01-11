<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%districts}}`.
 */
class m240110_025639_create_districts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%districts}}', [
            'id' => $this->primaryKey()->unsigned()->notNull()->comment('編號'),
            'district_name' => $this->string(50)->notNull()->comment('區域名稱'),
            'city_id' => $this->integer()->unsigned()->notNull()->comment('城市編號'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%districts}}');
    }
}
