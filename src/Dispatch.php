<?php
namespace opensdk;

use opensdk\Lib\Member;

/**
 * Class Dispatch
 * @package opensdk
 * @method array getToken($params)
 */
class Dispatch extends \Hanson\Foundation\Foundation
{

    private $member;

    public function __construct($config)
    {
        parent::__construct($config);
        $this->member = new Member($config['mch_id'], $config['appId'], $config['appSecret']);
    }

    public function __call($name, $arguments){
        return $this->member->{$name}(...$arguments);
    }
}