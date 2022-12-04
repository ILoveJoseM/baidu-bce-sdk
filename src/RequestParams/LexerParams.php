<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2022-12-03
 * Time: 12:34
 */

namespace JoseChan\BaiduBceSdk\RequestParams;


use JoseChan\Entity\ValidateEntity;

/**
 * Class LexerParams
 * @package JoseChan\BaiduBceSdk\RequestParams
 * @property string $text
 */
class LexerParams extends ValidateEntity implements RequestParamsInterface
{
    /**
     * @return array
     */
    protected function rules()
    {
        return [
            "text" => "required"
        ];
    }

    /**
     * @return array
     */
    public function getParams()
    {
        return $this->toArray();
    }
}
