<?php
namespace Keli\OpenSDK;

use Hanson\Foundation\Foundation;


/**
 * Class Dispatch
 * @package opensdk
 * @property \Keli\OpenSDK\Token\AccessToken    $access_token
 * @property \Keli\OpenSDK\Member\Member    $member
 */
class Dispatch extends Foundation
{

    protected $providers = [
        Token\ServiceProvider::class, //Token公共服务 已完成
        Member\ServiceProvider::class, //TODO 会员服务 待测试
        Card\ServiceProvider::class, //TODO 卡券服务
        Pay\ServiceProvider::class //TODO 支付服务
    ];

    public function createAuthorizer($authToken)
    {
        $this->access_token->setAuthToken($authToken);
        return $this;
    }
}