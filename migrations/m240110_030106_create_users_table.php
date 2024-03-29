<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m240110_030106_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey()->unsigned()->notNull()->comment('編號'),
            'email'=> $this->string(100)->notNull()->comment('電子郵件'),
            'password'=> $this->string(255)->notNull()->comment('密碼'),
            'frist_name'=> $this->string(25)->notNull()->comment('名字'),
            'last_name'=> $this->string(50)->notNull()->comment('姓氏'),
            'gender_id'=> $this->integer()->unsigned()->notNull()->comment('性別'),
            'self_introduction'=> $this->text()->comment('自我介紹'),
            'country_id'=> $this->integer()->unsigned()->notNull()->comment('國家'),
            'city_id'=> $this->integer()->unsigned()->notNull()->comment('城市'),
            'district_id'=> $this->integer()->unsigned()->notNull()->comment('區域'),
            'address'=> $this->string(255)->notNull()->comment('地址'),
            'birthdate'=> $this->date()->notNull()->comment('生日'),
            'created_at'=> $this->timestamp()->notNull()->comment('建立時間'),
            'updated_at'=> $this->timestamp()->notNull()->comment('更新時間'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}