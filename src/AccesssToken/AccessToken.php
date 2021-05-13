<?php
namespace Keli\OpenSDK\AccessToken;


use Hanson\Foundation\AbstractAccessToken;


class AccessToken extends AbstractAccessToken
{

    protected $mch_id;

    protected $appId;

    protected $secret;

    protected $authToken;

    public function __construct($mch_id, $appId, $secret)
    {
        $this->mch_id = $mch_id;
        $this->appId = $appId;
        $this->secret = $secret;
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
        return 12399999;
    }

    /**
     * Throw exception if token is invalid.
     *
     * @param $result
     * @return mixed
     */
    public function checkTokenResponse($result)
    {
        // TODO: Implement checkTokenResponse() method.
    }
}