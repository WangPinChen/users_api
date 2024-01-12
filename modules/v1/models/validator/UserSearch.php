<?php
namespace v1\models\validator;
/**
 * User search model which supports search with keyword
 * 
 * @OA\Schema(
 *  schema="UserSearch",
 *  oneOf={
 *      @OA\Schema(ref="#/components/schemas/ApiSearchModel")
 *  }
 * )
 */
class UserSearch extends ApiSearchModel
{
    /**
     * @var string | null Query related models, using comma(,)be seperator
     * @OA\Property(enum={"creator","updater"},default=null)
     */
    public $expand;

    /**
     * @var null|string filter username by keyword
     * @OA\Property(default=null)
     */
    public $keyword;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules[]=[['keyword','expand'],'string'];

        return $rules;
    }
}