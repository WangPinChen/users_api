<?php

namespace app\models;

use yii\behaviors\AttributeTypecastBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\ActiveQuery;

/**
 * @OA\Schema(
 *   schema="Cities",
 *   title="Cities Model",
 *   description="This model is used to access cities data",
 *   required={"id", "city_name", "country_id"},
 *   @OA\Property(property="id", type="integer", description="編號 #autoIncrement #pk", maxLength=10),
 *   @OA\Property(property="city_name", type="string", description="城市名稱", maxLength=50),
 *   @OA\Property(property="country_id", type="integer", description="國家編號", maxLength=11)
 * )
 *
 * @version 1.0.0
 */
class Cities extends ActiveRecord
{
    /**
     * Return table name of cities.
     *
     * @return string
     */
    public static function tableName()
    {
        return 'cities';
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
            [['city_name'], 'trim'],
            [['id', 'country_id'], 'integer'],
            [['city_name'], 'string']
        ];
    }


    /**
     * return extra fields
     *
     * @return string[]
     */
    public function extraFields()
    {
        return ['country'];
    }
}
