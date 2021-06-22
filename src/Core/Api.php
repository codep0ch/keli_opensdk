<?php
namespace Keli\OpenSDK\Core;

use Hanson\Foundation\AbstractAPI;
use Keli\OpenSDK\Token\AccessToken;

class Api extends AbstractAPI
{
    /**
     * @var AccessToken
     */
    private static $client;
    private $mch_id;
    private $appId;
    private $appSecret;
    private $inner;
    public $pimple;
    private $debug;
    const API = 'http://api.kelimx.com/cgi-bin/';
    const INNER_API = 'http://inner.api.kelimx.com/cgi-bin/';
    public function __construct($pimple)
    {
        $this->pimple = $pimple;
        $config = $pimple->getConfig();

        if(!is_null($pimple->mch_id)){
            $config['mch_id'] = $pimple->mch_id;
        }

        $this->debug = $config['debug'];
        $this->mch_id = empty($config['mch_id']) ? null : $config['mch_id'];
        $this->appId = empty($config['appId']) ? null : $config['appId'];
        $this->appSecret = empty($config['appSecret']) ? null : $config['appSecret'];
        $this->inner = $pimple->inner;
        if($pimple->inner && empty($this->mch_id)){
            throw new \Exception('mch_id cannot be empty in Intranet mode');
        }
        self::$client =  new \GuzzleHttp\Client();
    }
    function request($url,$data = array(),$method='post'){
        $headers = [];
        if($this->inner){
            $url = self::INNER_API.$url;
            $data['mch_id'] = $this->mch_id;
        }else{
            $accessToken = new AccessToken($this->mch_id, $this->appId,$this->appSecret, $this->inner);
            $url = self::API.$url;
            $headers['x-access-token'] = $accessToken->getToken();
        }
        $headers['Content-Type'] = 'application/json; charset=utf-8';
        if(strtolower($method) == 'GET'){
            $url .= "?".http_build_query($data);
        }
        try {
            $result = self::$client->request($method, $url, [
                'headers' => $headers,
                'json'    => $data
            ]);
            return $this->debug ? $result : $result->getBody()->getContents();
        }catch (\Exception $e){
            return $e->getMessage();
        }

    }

}