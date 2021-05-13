<?php
namespace Keli\OpenSDK\Member;


use Keli\OpenSDK\Core\Api;

class Member extends Api
{
    public function __construct($mch_id, $appId, $appSecret, $inner = false)
    {
        parent::__construct($mch_id, $appId, $appSecret, $inner);
    }

    public function getMember(array $params){
        return 'Hi';
    }

}