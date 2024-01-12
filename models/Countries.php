<?php

namespace app\models;

use yii\behaviors\AttributeTypecastBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\ActiveQuery;

/**
 * @OA\Schema(
 *   schema="Coutries",
 *   title="Coutries Model",
 *   description="This model is used to access coutries data",
 *   required={"id", "country_name"},
 *   @OA\Property(property="id", type="integer", description="編號 #autoIncrement #pk", maxLength=10),
 *   @OA\Property(property="country_name", type="string", description="國家名稱", maxLength=50)
 * )
 *
 * @version 1.0.0
 */
class Countries extends ActiveRecord
{
    /**
     * Return table name of coutries.
     *
     * @return string
     */
    public static function tableName()
    {
        return 'countries';
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
            [['country_name'], 'trim'],
            [['id'], 'integer'],
            [['country_name'], 'string']
        ];
    }


    /**
     * return extra fields
     *
     * @return string[]
     */
    public function extraFields()
    {
        return [];
    }
}
