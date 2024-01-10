<?php

namespace app\models;

use yii\behaviors\AttributeTypecastBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\ActiveQuery;

/**
 * @OA\Schema(
 *   schema="Districts",
 *   title="Districts Model",
 *   description="This model is used to access districts data",
 *   required={"id", "district_name", "city_id"},
 *   @OA\Property(property="id", type="integer", description="編號 #autoIncrement #pk", maxLength=10),
 *   @OA\Property(property="district_name", type="string", description="區域名稱", maxLength=50),
 *   @OA\Property(property="city_id", type="integer", description="城市編號", maxLength=11)
 * )
 *
 * @version 1.0.0
 */
class Districts extends ActiveRecord
{
    /**
     * Return table name of districts.
     *
     * @return string
     */
    public static function tableName()
    {
        return 'districts';
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
            [['district_name'], 'trim'],
            [['id', 'city_id'], 'integer'],
            [['district_name'], 'string']
        ];
    }


    /**
     * return extra fields
     *
     * @return string[]
     */
    public function extraFields()
    {
        return ['city'];
    }
}
