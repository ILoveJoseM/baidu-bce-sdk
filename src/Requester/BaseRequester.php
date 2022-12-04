<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2022-12-03
 * Time: 12:11
 */

namespace JoseChan\BaiduBceSdk\Requester;


use GuzzleHttp\Client;
use Illuminate\Contracts\Foundation\Application;
use JoseChan\BaiduBceSdk\RequestParams\RequestParamsInterface;
use JoseChan\Entity\Entity;

/**
 * Class BaseRequester
 * @package JoseChan\BaiduBceSdk\Requester
 * @method Entity request(RequestParamsInterface $params);
 */
abstract class BaseRequester
{
    /** @var Client $client */
    protected $client;

    /** @var Application */
    protected $app;

    /**
     * BaseRequester constructor.
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->client = $this->app->make("baidu-bce-client");
    }


    /**
     * @param $params
     * @return mixed
     */
    public function resolveParams($params)
    {
        return $this->app->make($this->getParamsClass(), ["data" => $params[0] ?? []]);
    }

    /**
     * @return string
     */
    abstract protected function getParamsClass();
}
