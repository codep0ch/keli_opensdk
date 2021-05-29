<?php
namespace Keli\OpenSDK\Pay;

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
        $pimple['Pay'] = function ($pimple) {
            $config = $pimple->getConfig();
            if(empty($config['Inner']) || !$config['Inner']){
                $config['mch_id'] = '';
            }
            if($config['Inner']){
                $config['appId'] = '';
                $config['appSecret'] = '';
            }
            return new Pay($config['mch_id'], $config['appId'], $config['appSecret'], $config['Inner']);
        };
    }
}