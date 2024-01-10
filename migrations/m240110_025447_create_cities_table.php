<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%cities}}`.
 */
class m240110_025447_create_cities_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cities}}', [
            'id' => $this->primaryKey()->unsigned()->notNull()->comment('編號'),
            'city_name' => $this->string(50)->notNull()->comment('城市名稱'),
            'country_id' => $this->integer()->unsigned()->notNull()->comment('國家編號'),
        ]);

        $this->addForeignKey(
            'fk-cities-country_id',
            'cities',
            'country_id',
            'countries',
            'id',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%cities}}');
    }
}
