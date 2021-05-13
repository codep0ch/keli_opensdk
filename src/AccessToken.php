<?php


namespace keli\opensdk;


use Hanson\Foundation\AbstractAccessToken;

class AccessToken extends AbstractAccessToken
{

    public function getTokenFromServer()
    {
        $api = "http://123.57.15.217:82/cgi-bin/token?appId={$this->appId}&appSecret={$this->secret}";
        echo 123;
    }

    public function checkTokenResponse($result)
    {
        // TODO: Implement checkTokenResponse() method.
    }
}