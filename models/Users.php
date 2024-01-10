<?php

namespace app\models;

use yii\behaviors\AttributeTypecastBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\ActiveQuery;

/**
 * @OA\Schema(
 *   schema="Users",
 *   title="Users Model",
 *   description="This model is used to access users data",
 *   required={"id", "email", "password", "frist_name", "last_name", "gender_id", "country_id", "city_id", "district_id", "address", "birthday", "created_at", "updated_at"},
 *   @OA\Property(property="id", type="integer", description="編號 #autoIncrement #pk", maxLength=10),
 *   @OA\Property(property="email", type="string", description="電子郵件", maxLength=100),
 *   @OA\Property(property="password", type="string", description="密碼", maxLength=255),
 *   @OA\Property(property="frist_name", type="string", description="名字", maxLength=25),
 *   @OA\Property(property="last_name", type="string", description="姓氏", maxLength=50),
 *   @OA\Property(property="gender_id", type="integer", description="性別", maxLength=11),
 *   @OA\Property(property="self_introduction", type="string", description="自我介紹"),
 *   @OA\Property(property="country_id", type="integer", description="國家", maxLength=11),
 *   @OA\Property(property="city_id", type="integer", description="城市", maxLength=11),
 *   @OA\Property(property="district_id", type="integer", description="區域", maxLength=11),
 *   @OA\Property(property="address", type="string", description="地址", maxLength=255),
 *   @OA\Property(property="birthday", type="string", description="生日"),
 *   @OA\Property(property="created_at", type="string", description="建立時間", default="CURRENT_TIMESTAMP"),
 *   @OA\Property(property="updated_at", type="string", description="更新時間", default="CURRENT_TIMESTAMP")
 * )
 *
 * @version 1.0.0
 */
class Users extends ActiveRecord
{
    /**
     * Return table name of users.
     *
     * @return string
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * Use timestamp to store time of login, update and create
     *
     * @return array<int, mixed>
     */
    public function behaviors()
    {
        return [
            [
                'class' => AttributeTypecastBehavior::class,
                'typecastAfterValidate' => true,
                'typecastBeforeSave' => true,
                'typecastAfterFind' => true,
            ],
            TimestampBehavior::class
        ];
    }

    /**
     * rules
     *
     * @return array<int, mixed>
     */
    public function rules()
    {
        return [
            [['email', 'password', 'frist_name', 'last_name', 'self_introduction', 'address', 'birthday', 'created_at', 'updated_at'], 'trim'],
            [['id', 'gender_id', 'country_id', 'city_id', 'district_id'], 'integer'],
            [['email', 'password', 'frist_name', 'last_name', 'self_introduction', 'address', 'birthday', 'created_at', 'updated_at'], 'string'],
            [['created_at'], 'default', 'value'=>'CURRENT_TIMESTAMP'],
            [['updated_at'], 'default', 'value'=>'CURRENT_TIMESTAMP']
        ];
    }


    /**
     * return extra fields
     *
     * @return string[]
     */
    public function extraFields()
    {
        return ['gender', 'country', 'city', 'district'];
    }
}
