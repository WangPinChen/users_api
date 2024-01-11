<?php

namespace v1\controllers;

use Throwable;
use v1\components\ActiveApiController;
use yii\data\ActiveDataProvider;
use yii\web\HttpException;

/**
 * @OA\Tag(
 *     name="Genders",
 *     description="Everything about your Genders",
 * )
 *
 * @OA\Get(
 *     path="/genders",
 *     summary="List",
 *     description="List all Genders",
 *     operationId="listGenders",
 *     tags={"Genders"},
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
 *              @OA\Property(property="_data", type="array", @OA\Items(ref="#/components/schemas/Genders")),
 *              @OA\Property(property="_meta", type="object", ref="#/components/schemas/Pagination")
 *             )
 *         )
 *     )
 * )
 *
 * @OA\Get(
 *     path="/genders/{id}",
 *     summary="Get",
 *     description="Get Genders by particular id",
 *     operationId="getGenders",
 *     tags={"Genders"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="Genders id",
 *         required=true,
 *         @OA\Schema(ref="#/components/schemas/Genders/properties/id")
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
 *         @OA\JsonContent(type="object", ref="#/components/schemas/Genders")
 *     )
 * )
 *
 * @OA\Post(
 *     path="/genders",
 *     summary="Create",
 *     description="Create a record of Genders",
 *     operationId="createGenders",
 *     tags={"Genders"},
 *     @OA\RequestBody(
 *         description="Genders object that needs to be added",
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                  @OA\Property(property="id", ref="#/components/schemas/Genders/properties/id"),
 *                  @OA\Property(property="gender", ref="#/components/schemas/Genders/properties/gender")
 *             )
 *         ),
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\JsonContent(type="object", ref="#/components/schemas/Genders")
 *     )
 * )
 *
 * @OA\Patch(
 *     path="/genders/{id}",
 *     summary="Update",
 *     description="Update a record of Genders",
 *     operationId="updateGenders",
 *     tags={"Genders"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="Genders id",
 *         required=true,
 *         @OA\Schema(ref="#/components/schemas/Genders/properties/id")
 *     ),
 *     @OA\RequestBody(
 *         description="Genders object that needs to be updated",
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                  @OA\Property(property="id", ref="#/components/schemas/Genders/properties/id"),
 *                  @OA\Property(property="gender", ref="#/components/schemas/Genders/properties/gender")
 *             )
 *         ),
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\JsonContent(type="object", ref="#/components/schemas/Genders")
 *     )
 * )
 *
 * @OA\Delete(
 *     path="/genders/{id}",
 *     summary="Delete",
 *     description="Delete a record of Genders",
 *     operationId="deleteGenders",
 *     tags={"Genders"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="Genders id",
 *         required=true,
 *         @OA\Schema(ref="#/components/schemas/Genders/properties/id")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation"
 *     )
 * )
 *
 * @version 1.0.0
 */
class GendersController extends ActiveApiController
{
    /**
     * @var string $modelClass
     */
    public $modelClass = 'app\models\Genders';

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
