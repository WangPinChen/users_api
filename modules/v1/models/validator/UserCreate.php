<?php

namespace v1\models\validator;

use yii\base\Model;

/**
 * User create model
 * 
 * @OA\Schema(
 *  schema="UserCreate",
 * )
 * 
 * @author Noah Wang <noah.wang@atelli.ai>
 */

class UserCreate extends Model
{
    /**
    * @var string 
    * @OA\Property(property="email" , ref="#/components/schemas/User/properties/email")
    */
    public $email;

    /**
    * @var string
    * @OA\Property(property="password" , ref="#components/schemas/Users/properties/password")
    */
    public $password;

    /**
    * @var string
    * @OA\Property(property="frist_name" , ref="#components/schemas/Users/properties/frist_name")
    */
    public $frist_name;

    /**
    * @var string
    * @OA\Property(property="last_name" , ref="#components/schemas/Users/properties/last_name")
    */
    public $last_name;

    /**
    * @var integer
    * @OA\Property(property="gender_id" , ref="#components/schemas/Users/properties/gender_id")
    */
    public $gender_id;

    /**
    * @var string
    * @OA\Property(property="self_introduction" , ref="#components/schemas/Users/properties/self_introduction")
    */
    public $self_introduction;

    /**
    * @var integer
    * @OA\Property(property="country_id" , ref="#components/schemas/Users/properties/country_id")
    */
    public $country_id; 

    /**
    * @var integer
    * @OA\Property(property="city_id" , ref="#components/schemas/Users/properties/city_id")
    */
    public $city_id;

    /**
    * @var integer
    * @OA\Property(property="district_id" , ref="#components/schemas/Users/properties/district_id")
    */
    public $district_id;

    /**
    * @var string
    * @OA\Property(property="address" , ref="#components/schemas/Users/properties/address")
    */
    public $address;

    /**
    * @var string
    * @OA\Property(property="birthdate" , ref="#components/schemas/Users/properties/birthdate")
    */
    public $birthdate;


    /**
    * @inheritdoc
    *
    * @return array<int, mixed> $rules
    */

     public function rules()
     {
        $rules = parent::rules();
        $rules[] = [['email', 'password', 'frist_name' ,'last_name', 'address', 'birthdate'], 'required'];
        $rules[] = [['email'],'email'];
        return $rules;
     }
}