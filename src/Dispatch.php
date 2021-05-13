<?php
namespace Keli\OpenSDK;

use Hanson\Foundation\Foundation;


/**
 * Class Dispatch
 * @package opensdk
 * @property \Keli\OpenSDK\AccessToken\AccessToken    $access_token
 * @property \Keli\OpenSDK\Member\Member    $member
 */
class Dispatch extends Foundation
{

    protected $providers = [
        Member\Member::class,
        AccessToken\ServiceProvider::class
    ];

    public function createAuthorizer($authToken)
    {
        $this->access_token->setAuthToken($authToken);
        return $this;
    }
}