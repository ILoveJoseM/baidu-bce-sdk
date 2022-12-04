<?php
/**
 * Created by PhpStorm.
 * User: chenyu
 * Date: 2022-12-03
 * Time: 11:40
 */

namespace JoseChan\BaiduBceSdk\Entity;


use JoseChan\Entity\ValidateEntity;

/**
 * Class AccessToken
 * @package JoseChan\BaiduBceSdk\Entity
 * @property string $refresh_token
 * @property int $expires_in
 * @property string $scope
 * @property string $session_key
 * @property string $access_token
 * @property string $session_secret
 */
class AccessToken extends ValidateEntity
{
    /**
     * @return array
     */
    protected function rules()
    {
        return [
            "access_token" => "required",
            "expires_in" => "required"
        ];
    }

}
