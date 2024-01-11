<?php

namespace app\components\user;

use AtelliTech\Yii2\Utils\AbstractRepository;
use app\models\Users;

/**
 * This is a repository class for accessing Users.
 */
class UserRepo extends AbstractRepository
{
    /**
     * @var string $modelClass the model class name. This property must be set.
     */
    protected string $modelClass = Users::class;
}