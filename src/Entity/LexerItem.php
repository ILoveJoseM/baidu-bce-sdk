<?php
/**
 * Created by PhpStorm.
 * User=>  chenyu
 * Date=>  2022-12-03
 * Time=>  12:37
 */

namespace JoseChan\BaiduBceSdk\Entity;


use Illuminate\Support\Collection;
use JoseChan\Entity\ValidateEntity;

/**
 * Class LexerItem
 * @package JoseChan\BaiduBceSdk\Entity
 * @property int $byte_length
 * @property int $byte_offset
 * @property string $formal
 * @property string $item
 * @property string $ne
 * @property string $pos
 * @property string $uri
 * @property LocDetail[]|Collection $loc_details
 * @property array|Collection $basic_words
 */
class LexerItem extends ValidateEntity
{
    /** @var array $arrayAttributeEntity */
    protected $arrayAttributeEntity = [
        "loc_details" => LocDetail::class
    ];

    /**
     * @return array
     */
    protected function rules()
    {
        return [
            "byte_length" => "required",
            "byte_offset" => "required",
            "item" => "required",
            "basic_words" => "required"
        ];
    }

    /**
     * @return array
     */
    protected function messages()
    {
        return [
            "byte_length.required" => "byte_length不能为空",
            "byte_offset.required" => "byte_offset不能为空",
            "item.required" => "item不能为空",
            "basic_words.required" => "basic_words不能为空",
        ];
    }

}
