<?php
namespace v1\components\user;

use app\components\user\UserRepo;
use v1\models\validator\UserCreate;
use yii\base\Exception;

/**
 * This is a service class for accessing Users.
 */

class UserCreateService
{
    /**
     * @var UserRepo $userRepo
     */
    private UserRepo $userRepo;

    /**
     * @param UserRepo $userRepo
     */
    public function __construct(UserRepo $userRepo) 
    {
        $this->userRepo = $userRepo;
    }

    /**
     * @param array $params
     * @return array
     */
    public function Create($params)
    {   
        $model = new UserCreate($params);

        if(!$model->validate()){
            throw new Exception(implode('',$model->getErrorSummary(true)));
        }

        $model->password = \Yii::$app->security->generatePasswordHash($model->password);

        return $this->userRepo->create($model->toArray());
    }
}