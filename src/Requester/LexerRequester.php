<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2022-12-03
 * Time: 12:30
 */

namespace JoseChan\BaiduBceSdk\Requester;


use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Utils;
use Illuminate\Contracts\Foundation\Application;
use JoseChan\BaiduBceSdk\Entity\Lexer;
use JoseChan\BaiduBceSdk\RequestParams\LexerParams;
use JoseChan\BaiduBceSdk\AccessTokenProvider;

class LexerRequester extends BaseRequester
{
    private const URI = '/rpc/2.0/nlp/v1/lexer';

    /** @var AccessTokenProvider $accessTokenProvider */
    private $accessTokenProvider;

    /**
     * LexerRequester constructor.
     * @param AccessTokenProvider $accessTokenProvider
     * @param Client $client
     * @param Application $application
     */
    public function __construct(AccessTokenProvider $accessTokenProvider, Application $application)
    {
        $this->accessTokenProvider = $accessTokenProvider;
        parent::__construct($application);
    }


    /**
     * @param LexerParams $lexerParams
     * @return \JoseChan\Entity\Entity|mixed
     * @throws \Exception
     */
    public function request(LexerParams $lexerParams)
    {
        $accessToken = $this->accessTokenProvider->getAccessToken();

        $uri = Utils::uriFor(self::URI);

        $uri = $uri->withQuery("access_token={$accessToken}");

        $response = $this->client->post($uri, [
            "json" => $lexerParams->getParams()
        ]);

        $body = $response->getBody();
        $array = json_decode($body, true);
        if (empty($array)) {
            throw new \Exception("请求接口失败：" . $array['error_description'] ?? "");
        }

        return $this->app->make(Lexer::class, ["data" => $array]);
    }

    /**
     * @return string
     */
    protected function getParamsClass()
    {
        return LexerParams::class;
    }


}
