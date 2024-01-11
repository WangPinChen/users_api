<?php

namespace app\models;

use yii\behaviors\AttributeTypecastBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\ActiveQuery;

/**
 * @OA\Schema(
 *   schema="Genders",
 *   title="Genders Model",
 *   description="This model is used to access genders data",
 *   required={"id", "gender"},
 *   @OA\Property(property="id", type="integer", description="編號 #autoIncrement #pk", maxLength=10),
 *   @OA\Property(property="gender", type="string", description="性別名稱", maxLength=10)
 * )
 *
 * @version 1.0.0
 */
class Genders extends ActiveRecord
{
    /**
     * Return table name of genders.
     *
     * @return string
     */
    public static function tableName()
    {
        return 'genders';
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
            [['gender'], 'trim'],
            [['id'], 'integer'],
            [['gender'], 'string']
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

    public function getUsers(){
        return $this->hasMany(Users::class, ['gender_id' => 'id']);
    }
}
