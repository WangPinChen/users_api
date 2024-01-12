<?php
namespace v1\components\user;

use app\components\user\UserRepo;

/**
 * This is a service class for accessing Users.
 */

class UserIndexService
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
    public function index()
    {
        return $this->userRepo->find()->all();
    }
}