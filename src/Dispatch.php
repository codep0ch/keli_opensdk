<?php
namespace keli\opensdk;


use keli\opensdk\AccessToken\AccessToken;
use keli\opensdk\AccessToken\ServiceProvider;

/**
 * Class Dispatch
 * @package opensdk
 * @property AccessToken    $access_token
 */
class Dispatch extends \Hanson\Foundation\Foundation
{

    protected $providers = [
        ServiceProvider::class
    ];

    public function createAuthorizer($authToken)
    {
        $this->access_token->setAuthToken($authToken);
        return $this;
    }
}