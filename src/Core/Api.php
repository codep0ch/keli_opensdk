<?php
namespace Keli\OpenSDK\Core;

use Hanson\Foundation\AbstractAPI;
use Keli\OpenSDK\Token\AccessToken;

class Api extends  AbstractAPI
{
    /**
     * @var AccessToken
     */
    private $mch_id;
    private $appId;
    private $appSecret;
    private $inner;
    public $pimple;
    const API = 'http://api.kelimx.com/cgi-bin/';
    const INNER_API = 'http://inner.api.kelimx.com/cgi-bin/';
    public function __construct($pimple)
    {
        $this->pimple = $pimple;
        $config = $pimple->getConfig();

        if(!is_null($this->mch_id)){
            $config['mch_id'] = $this->mch_id;
        }

        $this->mch_id = empty($config['mch_id']) ? null : $config['mch_id'];
        $this->appId = empty($config['appId']) ? null : $config['appId'];
        $this->appSecret = empty($config['appSecret']) ? null : $config['appSecret'];
        $this->inner = $pimple->inner;
        if($pimple->inner && empty($this->mch_id)){
            throw new \Exception('mch_id cannot be empty in Intranet mode');
        }
    }
    function request($url,$data = array(),$method='post'){
        $header = [];
        if($this->inner){
            $url = self::INNER_API.$url;
            $data['mch_id'] = $this->mch_id;
        }else{
            $accessToken = new AccessToken($this->mch_id, $this->appId,$this->appSecret, $this->inner);
            $url = self::API.$url;
            $header = [
                'x-access-token:'.$accessToken->getToken()
            ];
        }
        if($method=='post'){
            $header[] = 'Content-Type: application/json; charset=utf-8';
            return $this->curl_post($url, $data, $header);
        }else{
            return $this->curl_get($url, $data, $header);
        }
    }

    private function curl_post($url, $data = array(), $header = [])
    {
        //初始化
        $curl = curl_init();
        //设置抓取的url
        curl_setopt($curl, CURLOPT_URL, $url);
        //设置头文件的信息作为数据流输出
        curl_setopt($curl, CURLOPT_HEADER, 0);
        //设置获取的信息以文件流的形式返回，而不是直接输出。
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        //设置post方式提交
        curl_setopt($curl, CURLOPT_POST, 1);
        //设置post数据
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); //不验证证书下同
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        //执行命令
        $json = curl_exec($curl);
        //关闭URL请求
        curl_close($curl);
        $result = json_decode($json, true);
        return $result;
    }

    private function curl_get($url, $data = array(), $header = [])
    {
        //初始化
        $ch = curl_init();
        //设置选项，包括URL
        $query = http_build_query($data);
        $url = $url . '?' . $query;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        //执行并获取HTML文档内容
        $output = curl_exec($ch);
        //释放curl句柄
        curl_close($ch);

        $result = json_decode($output, true);
        return $result;
    }

}