<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2022-12-03
 * Time: 11:47
 */

namespace JoseChan\BaiduBceSdk;


use Illuminate\Cache\CacheManager;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Carbon;
use JoseChan\BaiduBceSdk\RequestParams\AccessTokenParams;
use JoseChan\BaiduBceSdk\Entity\AccessToken;
use JoseChan\BaiduBceSdk\Requester\AccessTokenRequester;

class AccessTokenProvider
{
    /** @var AccessTokenRequester $requester */
    private $requester;

    /** @var CacheManager $cache */
    private $cache;

    /** @var array $config  */
    private $config;

    /** @var Application $app */
    private $app;


    const CACHE_KEY = "baidu_bce:token";

    /**
     * AccessTokenProvider constructor.
     * @param AccessTokenRequester $requester
     * @param CacheManager $cache
     * @param Application $app
     * @param array $config
     */
    public function __construct(AccessTokenRequester $requester, CacheManager $cache, Application $app, $config)
    {
        $this->requester = $requester;
        $this->cache = $cache;
        $this->config = $config;
        $this->app = $app;
    }

    /**
     * @return mixed|string
     * @throws \Exception
     */
    public function getAccessToken()
    {
        /** @var AccessToken|null $accessToken */
        $accessToken = $this->cache->store()->get(self::CACHE_KEY);

        if (!is_null($accessToken)) {
            return $accessToken['access_token'] ?? "";
        }

        $accessToken = $this->requester->request($this->app->make(AccessTokenParams::class, [
            "data" => [
                "client_id" => $this->config['api_key'] ?? "",
                "client_secret" => $this->config['api_secret'] ?? ""
            ]
        ]));

        $ttl = Carbon::now()->addSeconds($accessToken->expires_in);
        $this->cache->store()->put(self::CACHE_KEY, $accessToken->toArray(), $ttl);
        return $accessToken->access_token;
    }
}
