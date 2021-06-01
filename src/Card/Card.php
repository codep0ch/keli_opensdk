<?php
namespace Keli\OpenSDK\Card;

use Keli\OpenSDK\Core\Api;

class Card extends Api
{
    /**
     * 卡券code
     * @param Int $receive_id
     * @return mixed
     */
    public function card_code(Int $receive_id){
        return $this->request('/card/card/code',[
            'receive_id' => $receive_id
        ]);
    }

    /**
     * 核销卡券
     * @param Int $code
     * @param String $openid
     * @param Int $sub_mch_id
     * @return mixed
     */
    public function card_consume(Int $code, String $openid, Int $sub_mch_id){
        return $this->request('/card/card/consume',[
            'code' => $code,
            'openid' => $openid,
            'sub_mch_id' => $sub_mch_id,
        ]);
    }

    /**
     * 卡券详情
     * @param Int $card_id
     * @return mixed
     */
    public function card_detail(Int $card_id){
        return $this->request('/card/card/detail',[
            'card_id' => $card_id
        ]);
    }

    /**
     * 订单详情
     * @param Int $order_id
     * @return mixed
     */
    public function card_order(Int $order_id){
        return $this->request('/card/card/order',[
            'order_id' => $order_id
        ]);
    }

    /**
     * 领取卡券
     * @param Int $card_id
     * @param String $type
     * @return mixed
     */
    public function card_receive(Int $card_id, String $type){
        return $this->request('/card/card/receive',[
            'card_id' => $card_id,
            'type' => $type
        ]);
    }


    /**
     * 使用卡券
     * @param Int $card_id
     * @param String $type
     * @return mixed
     */
    public function card_use(Int $card_id, String $type){
        return $this->request('/card/card/use',[
            'card_id' => $card_id,
            'type' => $type
        ]);
    }

    /**
     * 我的券包
     * @param String $openid
     * @return mixed
     */
    public function card_my(String $openid){
        return $this->request('/card/card/my',[
            'openid' => $openid
        ]);
    }

    /**
     * 商家券创建
     * @param String $stock_name
     * @param String $date_info
     * @param String $goods_name
     * @param String $card_type
     * @param String $least_cost
     * @param Int $quantity
     * @param Int $get_limit
     * @return mixed
     */
    public function wechat_create(String $stock_name, String $date_info, String $goods_name, String $card_type, String $least_cost, Int $quantity, Int $get_limit){
        return $this->request('/card/wechat/create',[
            'stock_name' => $stock_name,
            'date_info' => $date_info,
            'goods_name' => $goods_name,
            'card_type' => $card_type,
            'least_cost' => $least_cost,
            'quantity' => $quantity,
            'get_limit' => $get_limit
        ]);
    }

    /**
     * 商家券详情
     * @param Int $stock_id
     * @return mixed
     */
    public function wechat_detail(String $stock_id){
        return $this->request('/card/wechat/detail',[
            'stock_id' => $stock_id
        ]);
    }


    /**
     * 商家券核销
     * @param String $coupon_code
     * @param String $stock_id
     * @param String $openid
     * @return mixed
     */
    public function wechat_consume(String $coupon_code, String $stock_id, String $openid){
        return $this->request('/card/wechat/consume',[
            'coupon_code' => $coupon_code,
            'stock_id' => $stock_id,
            'openid' => $openid
        ]);
    }

    /**
     * 商家券使券失效
     * @param String $coupon_code
     * @param $stock_id
     * @param $deactivate_request_no
     * @param $deactivate_reason
     * @return mixed
     */
    public function wechat_deactivate(String $coupon_code,String $stock_id,String $deactivate_request_no,String $deactivate_reason){
        return $this->request('/card/wechat/deactivate',[
            'coupon_code' => $coupon_code,
            'stock_id' => $stock_id,
            'deactivate_request_no' => $deactivate_request_no,
            'deactivate_reason' => $deactivate_reason
        ]);
    }


    /**
     * 商家券小程序发券
     * @param array $coupon_data
     * @return mixed
     */
    public function wechat_receive_mini(Array $coupon_data){
        return $this->request('/card/wechat/receive/mini',[
            'coupon_data' => $coupon_data
        ]);
    }


    /**
     * 商家券查询用户的券
     * @param String $openid
     * @param String $stock_id
     * @param String $coupon_state
     * @return mixed
     */
    public function wechat_search(String $openid, String $stock_id, String $coupon_state){
        return $this->request('/card/wechat/search',[
            'openid' => $openid,
            'stock_id' => $stock_id,
            'coupon_state' => $coupon_state
        ]);
    }


    /**
     * 商家券查看状态
     * @param String $coupon_code
     * @return mixed
     */
    public function wechat_status(String $coupon_code){
        return $this->request('/card/wechat/status',[
            'coupon_code' => $coupon_code
        ]);
    }

    /**
     * 商家券h5发券
     * @param String $stock_id
     * @param String $openid
     * @return mixed
     */
    public function wechat_receive_coupon(String $stock_id, String $openid){
        return $this->request('/card/wechat/receive/coupon',[
            'stock_id' => $stock_id,
            'openid' => $openid
        ]);
    }

}