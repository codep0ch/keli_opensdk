<?php
namespace Keli\OpenSDK\Token;


use Doctrine\Common\Cache\FilesystemCache;
use Hanson\Foundation\AbstractAccessToken;
use http\Exception\RuntimeException;
use Keli\OpenSDK\Core\Api;


class AccessToken extends AbstractAccessToken
{
    protected static $client;

    protected $mch_id;

    protected $appId;

    protected $secret;

    protected $authToken;

    protected $inner;

    protected $tokenJsonKey = 'access_token';

    public function __construct($mch_id, $appId, $appSecret, $inner)
    {
        $this->mch_id = $mch_id;
        $this->appId = $appId;
        $this->secret = $appSecret;
        $this->inner = $inner;
        self::$client =  new \GuzzleHttp\Client();
    }

    public function setAuthToken($authToken)
    {
        $this->authToken = $authToken;
    }

    public function getAuthToken()
    {
        return $this->authToken;
    }

    /**
     * Get token from remote server.
     *
     * @return mixed
     */
    public function getTokenFromServer()
    {
        //Implement getTokenFromServer() method.
        $api = "http://123.57.15.217:82/cgi-bin/token?appId={$this->appId}&appSecret={$this->secret}";
        $x_auth_token = $this->cache->fetch("x-access-token-{$this->mch_id}");
        if(empty($x_auth_token)){
            //初始化
            $result = self::$client->request('get', $api)->getBody()->getContents();
            var_dump($result);
            $resultArray = json_decode($result, true);
            if($resultArray['code'] == 400){
                throw new \Exception($resultArray['msg']);
            }
            $x_auth_token = $resultArray['result']['access_token'];
            $this->cache->save("x-access-token-{$this->mch_id}", $x_auth_token,7000);
        }
        return ['access_token' => $x_auth_token];
    }

    /**
     * Throw exception if token is invalid.
     *
     * @param $result
     * @return mixed
     */
    public function checkTokenResponse($result)
    {
        //Implement checkTokenResponse() method.
        if (empty($result)){
            throw new \Exception('token error');
        }
    }
}