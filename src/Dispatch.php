<?php
namespace keli\opensdk;


use keli\opensdk\AccessToken\AccessToken;

/**
 * Class Dispatch
 * @package opensdk
 * @property AccessToken    $access_token
 */
class Dispatch extends \Hanson\Foundation\Foundation
{

    protected $providers = [
        \keli\opensdk\AccessToken\ServiceProvider::class
    ];

    public function createAuthorizer($authToken)
    {
        $this->access_token->setAuthToken($authToken);
        return $this;
    }
}