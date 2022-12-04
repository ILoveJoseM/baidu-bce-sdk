<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2022-12-03
 * Time: 11:46
 */

namespace JoseChan\BaiduBceSdk\RequestParams;


use JoseChan\Entity\ValidateEntity;

class AccessTokenParams extends ValidateEntity implements RequestParamsInterface
{
    const GRANT_TYPE = 'client_credentials';

    /**
     * @return array
     */
    protected function rules()
    {
        return [
            "client_id" => "required",
            "client_secret" => "required"
        ];
    }

    /**
     * @return array
     */
    public function getParams()
    {
        $params = $this->toArray();

        $params['grant_type'] = self::GRANT_TYPE;

        return $params;
    }

}
