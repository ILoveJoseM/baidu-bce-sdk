<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2022-12-03
 * Time: 12:36
 */

namespace JoseChan\BaiduBceSdk\Entity;


use Illuminate\Support\Collection;
use JoseChan\Entity\ValidateEntity;

/**
 * Class Lexer
 * @package JoseChan\BaiduBceSdk\Entity
 * @property string $text
 * @property LexerItem[]|Collection $items
 * @property int $log_id
 */
class Lexer extends ValidateEntity
{
    /** @var array $arrayAttributeEntity */
    protected $arrayAttributeEntity = [
        "items" => LexerItem::class
    ];

    /**
     * @return array
     */
    protected function rules()
    {
        return [
            "text" => "required",
            "items" => "required",
        ];
    }

    /**
     * @return array
     */
    protected function messages()
    {
        return [
            "text.required" => "text不能为空",
            "items.required" => "items不能为空"
        ];
    }
}
