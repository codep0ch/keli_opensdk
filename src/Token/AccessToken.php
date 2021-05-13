<?php
namespace Keli\OpenSDK\Token;


use Doctrine\Common\Cache\FilesystemCache;
use Hanson\Foundation\AbstractAccessToken;
use http\Exception\RuntimeException;
use Keli\OpenSDK\Core\Api;


class AccessToken extends AbstractAccessToken
{

    protected $mch_id;

    protected $appId;

    protected $secret;

    protected $authToken;

    protected $inner;

    public function __construct($mch_id, $appId, $appSecret, $inner)
    {
        $this->mch_id = $mch_id;
        $this->appId = $appId;
        $this->secret = $appSecret;
        $this->inner = $inner;
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
        if(is_null($x_auth_token)){
            //初始化
            $ch = curl_init();
            //设置选项，包括URL
            curl_setopt($ch, CURLOPT_URL, $api);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            //执行并获取HTML文档内容
            $output = curl_exec($ch);
            //释放curl句柄
            curl_close($ch);

            $result = json_decode($output, true);
            $x_auth_token = $result->result->access_token;
            $this->cache->save("x-access-token-{$this->mch_id}", $x_auth_token,7000);
        }
        return $x_auth_token;
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
        throw new RuntimeException('token error');
    }
}