<?php
namespace Keli\OpenSDK\Vehicle;


use Keli\OpenSDK\Core\Api;

class Vehicle extends Api
{
    /**
     * 发送入场通知
     * @param String $trade_scene
     * @param String $scene_info
     * @return mixed
     */
    public function notification(String $trade_scene, Array $scene_info){
        return $this->request('vehicle/api/notification', [
            'trade_scene' => $trade_scene,
            'scene_info' => $scene_info
        ]);
    }

    /**
     * 离场扣费接口
     * @param String $body
     * @param String $out_trade_no
     * @param String $total_fee
     * @param String $notify_url
     * @param String $trade_type
     * @param String $trade_scene
     * @param array $scene_info
     * @param String|null $detail
     * @param String|null $attach
     * @param String|null $fee_type
     * @param null $spbill_create_ip
     * @param null $openid
     * @param String|null $profit_sharing
     * @return mixed
     */
    public function editUser(String $body, String $out_trade_no , String $total_fee, String $notify_url, String $trade_type, String $trade_scene,Array $scene_info,
                                 String $detail = null, String $attach = null, String $fee_type = null, $spbill_create_ip = null, $openid = null, String $profit_sharing = null){
        return $this->request('vehicle/api/payApply', [
            'body'  => $body,
            'detail' => $detail,
            'attach' => $attach,
            'out_trade_no' => $out_trade_no,
            'total_fee' => $total_fee,
            'fee_type' => $fee_type,
            'spbill_create_ip' => $spbill_create_ip,
            'notify_url' => $notify_url,
            'trade_type' => $trade_type,
            'trade_scene' => $trade_scene,
            'openid' => $openid,
            'profit_sharing' => $profit_sharing,
            'scene_info' => $scene_info
        ]);
    }

    /**
     * 下载交易账单
     * @param String $trade_scene
     * @param String $scene_info
     * @return mixed
     */
    public function downloadBill(String $bill_date, String $bill_type = null, String $tar_type = null){
        return $this->request('vehicle/api/downloadBill', [
            'bill_date'  => $bill_date,
            'bill_type'  => $bill_type,
            'tar_type'   => $tar_type,
        ]);
    }

    /**
     * 退款
     * @param String $out_refund_no
     * @param String $total_fee
     * @param String $refund_fee
     * @param String|null $transaction_id
     * @param String|null $out_trade_no
     * @param String|null $refund_fee_type
     * @param String|null $refund_desc
     * @param String|null $refund_account
     * @param String|null $notify_url
     * @return mixed
     */
    public function refund(String $out_refund_no, String $total_fee, String $refund_fee, String $transaction_id = null, String $out_trade_no = null,
                                 String $refund_fee_type = null, String $refund_desc = null, String $refund_account = null, String $notify_url = null){
        return $this->request('vehicle/api/refund', [
            'transaction_id'  => $transaction_id,
            'out_trade_no' => $out_trade_no,
            'out_refund_no' => $out_refund_no,
            'total_fee' => $total_fee,
            'refund_fee' => $refund_fee,
            'refund_fee_type' => $refund_fee_type,
            'refund_desc' => $refund_desc,
            'refund_account' => $refund_account,
            'notify_url' => $notify_url
        ]);
    }

    /**
     * 查询退款信息
     * @param String|null $transaction_id
     * @param String|null $out_trade_no
     * @param String|null $out_refund_no
     * @param String|null $refund_id
     * @param String|null $offset
     * @return mixed
     */
    public function refundQuery(String $transaction_id = null, String $out_trade_no = null, String $out_refund_no = null,
                           String $refund_id = null, String $offset = null)
    {
        return $this->request('vehicle/api/refundQuery', [
            'transaction_id'  => $transaction_id,
            'out_trade_no' => $out_trade_no,
            'out_refund_no' => $out_refund_no,
            'refund_id' => $refund_id,
            'offset' => $offset,
        ]);
    }

    /**
     * 查询退款信息
     * @param String|null $transaction_id
     * @param String|null $out_trade_no
     * @return mixed
     */
    public function queryOrder(String $transaction_id = null, String $out_trade_no = null)
    {
        return $this->request('vehicle/api/queryOrder', [
            'transaction_id'  => $transaction_id,
            'out_trade_no' => $out_trade_no,
        ]);
    }

    /**
     * 订单查询
     * @param String $trade_scene
     * @param String|null $jump_scene
     * @param String|null $openid
     * @param String|null $sub_openid
     * @param String|null $plate_number
     * @return mixed
     */
    public function queryState(String $trade_scene, String $jump_scene = null, String $openid = null, String $sub_openid = null, String $plate_number = null)
    {
        return $this->request('vehicle/api/queryState', [
            'trade_scene'  => $trade_scene,
            'jump_scene' => $jump_scene,
            'openid' => $openid,
            'sub_openid' => $sub_openid,
            'plate_number' => $plate_number,
        ]);
    }
}