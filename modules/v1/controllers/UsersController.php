<?php

namespace v1\controllers;

use Throwable;
use v1\components\ActiveApiController;
use yii\data\ActiveDataProvider;
use yii\web\HttpException;

/**
 * @OA\Tag(
 *     name="Users",
 *     description="Everything about your Users",
 * )
 *
 * @OA\Get(
 *     path="/users",
 *     summary="List",
 *     description="List all Users",
 *     operationId="listUsers",
 *     tags={"Users"},
 *     @OA\Parameter(
 *         name="page",
 *         in="query",
 *         @OA\Schema(ref="#/components/schemas/StandardParams/properties/page")
 *     ),
 *     @OA\Parameter(
 *         name="pageSize",
 *         in="query",
 *         @OA\Schema(ref="#/components/schemas/StandardParams/properties/pageSize")
 *     ),
 *     @OA\Parameter(
 *         name="sort",
 *         in="query",
 *         @OA\Schema(ref="#/components/schemas/StandardParams/properties/sort")
 *     ),
 *     @OA\Parameter(
 *         name="fields",
 *         in="query",
 *         @OA\Schema(ref="#/components/schemas/StandardParams/properties/fields")
 *     ),
 *     @OA\Parameter(
 *         name="expand",
 *         in="query",
 *         @OA\Schema(type="string", enum={"xxxx"}, description="Query related models, using comma(,) be seperator")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *              @OA\Property(property="_data", type="array", @OA\Items(ref="#/components/schemas/Users")),
 *              @OA\Property(property="_meta", type="object", ref="#/components/schemas/Pagination")
 *             )
 *         )
 *     )
 * )
 *
 * @OA\Get(
 *     path="/users/{id}",
 *     summary="Get",
 *     description="Get Users by particular id",
 *     operationId="getUsers",
 *     tags={"Users"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="Users id",
 *         required=true,
 *         @OA\Schema(ref="#/components/schemas/Users/properties/id")
 *     ),
 *     @OA\Parameter(
 *         name="fields",
 *         in="query",
 *         @OA\Schema(ref="#/components/schemas/StandardParams/properties/fields")
 *     ),
 *     @OA\Parameter(
 *         name="expand",
 *         in="query",
 *         @OA\Schema(type="string", enum={"xxxx"}, description="Query related models, using comma(,) be seperator")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\JsonContent(type="object", ref="#/components/schemas/Users")
 *     )
 * )
 *
 * @OA\Post(
 *     path="/users",
 *     summary="Create",
 *     description="Create a record of Users",
 *     operationId="createUsers",
 *     tags={"Users"},
 *     @OA\RequestBody(
 *         description="Users object that needs to be added",
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                  @OA\Property(property="id", ref="#/components/schemas/Users/properties/id"),
 *                  @OA\Property(property="email", ref="#/components/schemas/Users/properties/email"),
 *                  @OA\Property(property="password", ref="#/components/schemas/Users/properties/password"),
 *                  @OA\Property(property="frist_name", ref="#/components/schemas/Users/properties/frist_name"),
 *                  @OA\Property(property="last_name", ref="#/components/schemas/Users/properties/last_name"),
 *                  @OA\Property(property="gender_id", ref="#/components/schemas/Users/properties/gender_id"),
 *                  @OA\Property(property="self_introduction", ref="#/components/schemas/Users/properties/self_introduction"),
 *                  @OA\Property(property="country_id", ref="#/components/schemas/Users/properties/country_id"),
 *                  @OA\Property(property="city_id", ref="#/components/schemas/Users/properties/city_id"),
 *                  @OA\Property(property="district_id", ref="#/components/schemas/Users/properties/district_id"),
 *                  @OA\Property(property="address", ref="#/components/schemas/Users/properties/address"),
 *                  @OA\Property(property="birthdate", ref="#/components/schemas/Users/properties/birthdate"),
 *                  @OA\Property(property="created_at", ref="#/components/schemas/Users/properties/created_at"),
 *                  @OA\Property(property="updated_at", ref="#/components/schemas/Users/properties/updated_at")
 *             )
 *         ),
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\JsonContent(type="object", ref="#/components/schemas/Users")
 *     )
 * )
 *
 * @OA\Patch(
 *     path="/users/{id}",
 *     summary="Update",
 *     description="Update a record of Users",
 *     operationId="updateUsers",
 *     tags={"Users"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="Users id",
 *         required=true,
 *         @OA\Schema(ref="#/components/schemas/Users/properties/id")
 *     ),
 *     @OA\RequestBody(
 *         description="Users object that needs to be updated",
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                  @OA\Property(property="id", ref="#/components/schemas/Users/properties/id"),
 *                  @OA\Property(property="email", ref="#/components/schemas/Users/properties/email"),
 *                  @OA\Property(property="password", ref="#/components/schemas/Users/properties/password"),
 *                  @OA\Property(property="frist_name", ref="#/components/schemas/Users/properties/frist_name"),
 *                  @OA\Property(property="last_name", ref="#/components/schemas/Users/properties/last_name"),
 *                  @OA\Property(property="gender_id", ref="#/components/schemas/Users/properties/gender_id"),
 *                  @OA\Property(property="self_introduction", ref="#/components/schemas/Users/properties/self_introduction"),
 *                  @OA\Property(property="country_id", ref="#/components/schemas/Users/properties/country_id"),
 *                  @OA\Property(property="city_id", ref="#/components/schemas/Users/properties/city_id"),
 *                  @OA\Property(property="district_id", ref="#/components/schemas/Users/properties/district_id"),
 *                  @OA\Property(property="address", ref="#/components/schemas/Users/properties/address"),
 *                  @OA\Property(property="birthdate", ref="#/components/schemas/Users/properties/birthdate"),
 *                  @OA\Property(property="created_at", ref="#/components/schemas/Users/properties/created_at"),
 *                  @OA\Property(property="updated_at", ref="#/components/schemas/Users/properties/updated_at")
 *             )
 *         ),
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\JsonContent(type="object", ref="#/components/schemas/Users")
 *     )
 * )
 *
 * @OA\Delete(
 *     path="/users/{id}",
 *     summary="Delete",
 *     description="Delete a record of Users",
 *     operationId="deleteUsers",
 *     tags={"Users"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="Users id",
 *         required=true,
 *         @OA\Schema(ref="#/components/schemas/Users/properties/id")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation"
 *     )
 * )
 *
 * @version 1.0.0
 */
class UsersController extends ActiveApiController
{
    /**
     * @var string $modelClass
     */
    public $modelClass = 'app\models\Users';

    /**
     * {@inherit}
     *
     * @return array<string, mixed>
     */
    public function actions()
    {
        $actions = parent::actions();

        // customize the data provider preparation with the "prepareDataProvider()" method
        $actions['index']['dataFilter'] = [
            'class' => 'yii\data\ActiveDataFilter',
            'searchModel' => $this->modelClass
        ];

        $actions['index']['pagination'] = [
            'class' => 'v1\components\Pagination'
        ];

        unset($actions['index']);

        return $actions;
    }

    /**
     * @OA\Post(
     *     path="/users/search",
     *     summary="Search",
     *     description="Search Users by particular params",
     *     operationId="searchUsers",
     *     tags={"Users"},
     *     @OA\RequestBody(
     *         description="search Users",
     *         required=false,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(ref="#/components/schemas/xxxxxSearchModel")
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *              @OA\Property(property="_data", type="array", @OA\Items(ref="#/components/schemas/Users")),
     *              @OA\Property(property="_meta", type="object", ref="#/components/schemas/Pagination")
     *             )
     *         )
     *     )
     * )
     *
     * Search Users
     *
     * @param xxxxxService $service
     * @return ActiveDataProvider
     */
    public function actionSearch(xxxxxService $service): ActiveDataProvider
    {
        try {
            $params = $this->getRequestParams();
            $query = $service->createSearchQuery($params);

            return new ActiveDataProvider([
                'query' => &$query,
                'pagination' => [
                    'class' => 'v1\components\Pagination',
                    'params' => $params
                ],
                'sort' => [
                    'enableMultiSort' => true,
                    'params' => $params
                ]
            ]);
        } catch (Throwable $e) {
            throw $e;
        }
    }
}
