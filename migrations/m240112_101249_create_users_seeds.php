<?php

use yii\db\Migration;

/**
 * Class m240112_101249_create_users_seeds
 */
class m240112_101249_create_users_seeds extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        for($i = 1 ; $i<=50 ; $i++){
            $serialNumber = $i;
            if($serialNumber<10){
                $serialNumber = '00'.$serialNumber;
            }else if($serialNumber<100){
                $serialNumber = '0'.$serialNumber;
            }

            $this->insert('users',[
                'email'=>'user'.$serialNumber.'@example.com',
                'password'=>'user'.$serialNumber,
                'frist_name'=>$serialNumber,
                'last_name'=>'user',
                'gender_id'=>mt_rand(1,3),
                'country_id'=>1,
                'city_id'=>1,
                'district_id'=>1,
                'address'=>'sample address',
                'birthdate'=>'1990-01-01',
                
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240112_101249_create_users_seeds cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240112_101249_create_users_seeds cannot be reverted.\n";

        return false;
    }
    */
}
