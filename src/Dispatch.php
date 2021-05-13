<?php
namespace Keli\OpenSDK;

use Hanson\Foundation\Foundation;
use Keli\OpenSDK\AccessToken\AccessToken;
use Keli\OpenSDK\AccessToken\ServiceProvider;


/**
 * Class Dispatch
 * @package opensdk
 * @property AccessToken    $access_token
 */
class Dispatch extends Foundation
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