<?php
namespace keli\opensdk;


use keli\opensdk\Lib\AccessToken\AccessToken;

/**
 * Class Dispatch
 * @package opensdk
 * @property AccessToken    $access_token
 */
class Dispatch extends \Hanson\Foundation\Foundation
{

    protected $providers = [
       Lib\AccessToken\ServiceProvider::class
    ];

    public function createAuthorizer($authToken)
    {
        $this->access_token->setAuthToken($authToken);
        return $this;
    }
}