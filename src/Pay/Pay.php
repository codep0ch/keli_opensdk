<?php
namespace Keli\OpenSDK\Pay;


use Keli\OpenSDK\Core\Api;

class Pay extends Api
{
    public function createMember(array $params){
        return $this->request('member/user/addUser',$params);
    }

    /**
     * 微信支付关闭订单
     * @param String $out_trade_no
     * @param String $sub_mch_id
     * @return mixed
     */
    public function wechat_order_close(String $out_trade_no, String $sub_mch_id){
        return $this->request('pay/wechatPay/order/close',[
            'out_trade_no' => $out_trade_no,
            'sub_mch_id' => $sub_mch_id
        ]);
    }

    /**
     * 微信支付查询订单
     * @param String $out_trade_no
     * @param String $sub_mch_id
     * @return mixed
     */
    public function wechat_order_order_find(String $out_trade_no, String $sub_mch_id){
        return $this->request('pay/wechatPay/order/order_find',[
            'out_trade_no' => $out_trade_no,
            'sub_mch_id' => $sub_mch_id
        ]);
    }

    /**
     * 微信App支付
     * @param String $out_trade_no
     * @param String $wechat_sub_mch_id
     * @param String $body
     * @param String $product_id
     * @param String $nonce_str
     * @return mixed
     */
    public function wechat_pay_wap(String $out_trade_no, String $wechat_sub_mch_id, String $body, String $product_id, String $nonce_str){
        return $this->request('pay/wechatPay/pay/wap',[
            'out_trade_no' => $out_trade_no,
            'wechat_sub_mch_id' => $wechat_sub_mch_id,
            'body' => $body,
            'product_id' => $product_id,
            'nonce_str' => $nonce_str
        ]);
    }

    /**
     * 微信小程序支付
     * @param String $out_trade_no
     * @param String $wechat_sub_mch_id
     * @param String $body
     * @param Int $total_fee
     * @param String $notify_url
     * @param String $attach
     * @param String $time_expire
     */
    public function wechat_pay_miniProgram(String $out_trade_no, String $wechat_sub_mch_id, String $body, Int $total_fee, String $notify_url, String $attach, String $time_expire)
    {
        return $this->request('pay/wechatPay/pay/miniProgram',[
            'out_trade_no' => $out_trade_no,
            'wechat_sub_mch_id' => $wechat_sub_mch_id,
            'body' => $body,
            'total_fee' => $total_fee,
            'notify_url' => $notify_url,
            'attach' => $attach,
            'time_expire' => $time_expire
        ]);
    }

    /**
     * 微信公众号支付
     * @param String $out_trade_no
     * @param String $wechat_sub_mch_id
     * @param String $body
     * @param String $openid
     * @param String $attach
     * @return mixed
     */
    public function wechat_pay_official_account(String $out_trade_no, String $wechat_sub_mch_id, String $body, String $openid, String $attach){
        return $this->request('pay/wechatPay/pay/official_account',[
            'out_trade_no' => $out_trade_no,
            'wechat_sub_mch_id' => $wechat_sub_mch_id,
            'body' => $body,
            'openid' => $openid,
            'attach' => $attach
        ]);
    }

    /**
     * 微信Native支付
     * @param String $out_trade_no
     * @param String $wechat_sub_mch_id
     * @param String $body
     * @param String $product_id
     * @param String $nonce_str
     * @param String $attach
     * @return mixed
     */
    public function wechat_pay_sacen(String $out_trade_no, String $wechat_sub_mch_id, String $body, String $product_id, String $nonce_str, String $attach){
        return $this->request('pay/wechatPay/pay/sacen',[
            'out_trade_no' => $out_trade_no,
            'wechat_sub_mch_id' => $wechat_sub_mch_id,
            'body' => $body,
            'product_id' => $product_id,
            'nonce_str' => $nonce_str,
            'attach' => $attach
        ]);
    }

    //TODO 文档中按顺序此处还有个WAP支付,但是接口和微信App支付相同,暂时预留

    /**
     * 微信支付申请退款
     * @param String $out_trade_no
     * @return mixed
     */
    public function wechat_refund_refund(String $out_trade_no){
        return $this->request('pay/wechatPay/refund/refund',[
            'out_trade_no' => $out_trade_no
        ]);
    }

    /**
     * 微信支付退款查询
     * @param String $out_trade_no
     * @param String $sub_mch_id
     * @param String $body
     * @param String $openid
     * @return mixed
     */
    public function wechat_refund_refund_find(String $out_trade_no, String $sub_mch_id, String $body, String $openid){
        return $this->request('pay/wechatPay/refund/refund_find',[
            'out_trade_no' => $out_trade_no,
            'sub_mch_id' => $sub_mch_id,
            'body' => $body,
            'openid' => $openid
        ]);
    }

    /**
     * 支付宝小程序支付
     * @param String $out_trade_no
     * @param String $sub_mch_id
     * @param String $subject
     * @param String $openid
     * @return mixed
     */
    public function alipay_pay_miniProgram(String $out_trade_no, String $sub_mch_id, String $subject, String $openid){
        return $this->request('pay/aliPay/pay/miniProgram',[
            'out_trade_no' => $out_trade_no,
            'sub_mch_id' => $sub_mch_id,
            'subject' => $subject,
            'openid' => $openid
        ]);
    }

    /**
     * 支付宝面对面扫码支付
     * @param String $out_trade_no
     * @param String $sub_mch_id
     * @param String $subject
     * @return mixed
     */
    public function alipay_pay_scan(String $out_trade_no, String $sub_mch_id, String $subject){
        return $this->request('pay/aliPay/pay/scan',[
            'out_trade_no' => $out_trade_no,
            'sub_mch_id' => $sub_mch_id,
            'subject' => $subject
        ]);
    }
}