<?php
namespace v1\components\user;

use app\components\user\UserRepo;

/**
 * User search service class
 * 
 * @author Noah Wang <noah.wang@atelli.ai>
 */

class UserSearchService
{
    /**
     * construct
     * 
     * @param UserRepo $userRepo
     */
    public function __construct(UserRepo $userRepo) 
    {
        $this->userRepo = $userRepo;
    }

    public function createSearchQuery($params)
    {
        $query = $this->userRepo->find();
        $query->andFilterWhere(['like', 'last_name', $params['last_name']]);
        $query->andFilterWhere(['like', 'frist_name', $params['frist_name']]);
        return $query;
    }
}