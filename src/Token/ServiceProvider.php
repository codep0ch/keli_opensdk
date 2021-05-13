<?php
namespace Keli\OpenSDK\Token;


use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    /**
     * Registers services on the given container.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Container $pimple A container instance
     */
    public function register(Container $pimple)
    {
        $pimple['access_token'] = function ($pimple) {
            $config = $pimple->getConfig();
            return new AccessToken($config['mch_id'], $config['appId'], $config['appSecret'], $config['Inner']);
        };
    }
}