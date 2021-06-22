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
 * @property \Keli\OpenSDK\Vehicle\Vehicle $vehicle
 */
class Dispatch extends Foundation
{
    public $inner = false;
    public $mch_id = null;
    protected $providers = [
        Token\ServiceProvider::class, //Token公共服务 已完成
        Member\ServiceProvider::class, //会员服务 已完成
        Card\ServiceProvider::class, //卡券服务 已完成
        Pay\ServiceProvider::class, //支付服务
        Wechat\ServiceProvider::class, //微信服务
        Vehicle\ServiceProvider::class //车主服务
    ];

    public function createAuthorizer($authToken)
    {
        $this->access_token->setAuthToken($authToken);
        return $this;
    }

    /**
     * 修改当前对象的mch_id
     * @param $mch_id
     * @return $this
     */
    public function setMchId($mch_id){
        $this->mch_id = $mch_id;
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