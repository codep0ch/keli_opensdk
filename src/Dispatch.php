<?php
namespace Keli\OpenSDK;

use Hanson\Foundation\Foundation;


/**
 * Class Dispatch
 * @package opensdk
 * @property \Keli\OpenSDK\Token\AccessToken    $access_token
 * @property \Keli\OpenSDK\Member\Member    $member
 * @property \Keli\OpenSDK\Card\Card $card
 * @property \Keli\OpenSDK\Pay\Pay $pay
 * @property \Keli\OpenSDK\Wechat\Wechat $wechat
 */
class Dispatch extends Foundation
{
    public $inner = false;
    protected $providers = [
        Token\ServiceProvider::class, //Token公共服务 已完成
        Member\ServiceProvider::class, //会员服务 已完成
        Card\ServiceProvider::class, //卡券服务 已完成
        Pay\ServiceProvider::class, //支付服务
        Wechat\ServiceProvider::class //微信服务
    ];

    public function createAuthorizer($authToken)
    {
        $this->access_token->setAuthToken($authToken);
        return $this;
    }

    /**
     * 判断当前调用方式是否属于内网
     * @return bool
     */
    public function getInner(){
        return $this->inner;
    }
}