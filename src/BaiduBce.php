<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2022-12-04
 * Time: 12:15
 */

namespace JoseChan\BaiduBceSdk;


use Illuminate\Support\Facades\Facade;
use JoseChan\BaiduBceSdk\Entity\Lexer;

/**
 * Class BaiduBce
 * @package JoseChan\BaiduBceSdk
 * @method static Lexer lexer($params)
 */
class BaiduBce extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'baidu-bce';
    }
}
