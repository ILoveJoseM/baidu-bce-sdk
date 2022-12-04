<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2022-12-03
 * Time: 11:37
 */

namespace JoseChan\BaiduBceSdk\Requester;


use JoseChan\BaiduBceSdk\RequestParams\AccessTokenParams;
use JoseChan\BaiduBceSdk\Entity\AccessToken;

class AccessTokenRequester extends BaseRequester
{
    private const URI = '/oauth/2.0/token';

    /**
     * @param AccessTokenParams $params
     * @return \Illuminate\Foundation\Application|AccessToken
     * @throws \Exception
     */
    public function request(AccessTokenParams $params)
    {
        $response = $this->client->post(self::URI, [
            "form_params" => $params->getParams()
        ]);

        $body = $response->getBody();
        $array = json_decode($body, true);
        if (empty($array) || empty($array['access_token'])) {
            throw new \Exception("请求接口失败：" . $array['error_description'] ?? "");
        }

        return $this->app->make(AccessToken::class, ["data" => $array]);
    }

    /**
     * @return string
     */
    protected function getParamsClass()
    {
        return AccessTokenParams::class;
    }

}
