<?php
namespace v1\models\validator;

use yii\base\Model;

/**
 * base search model
 * @OA\Schema()
 */

class ApiSearchModel extends Model
{
    /**
     * @OA\Property(property="page",type="integer",title="Current page",description="Current page",defalult=1,minimun=1)
     * @var int
     */
    public $page;
    /**
     * @OA\Property(propety="pageSize",type="integer",description="Page size",minimun=1,maximun=50,default=20)
     * @var int
     */
    public $pageSize;
    /**
     * @OA\Property(property="fields",type="string",description="Select specific fields,using comma be a seperator",default=null)
     * @var string $fields
     */
    public $fields;
    /**
     * @return arr<int,mixed>
     */
    public function rules()
    {
        return [
            [['page','pageSize'],'integer','min'=>1],
            [['sort','fields'],'string']
        ];
    }
}