<?php
namespace Keli\OpenSDK\Pay;


use Keli\OpenSDK\Core\Api;

class Pay extends Api
{
    public function createMember(array $params){
        return $this->request('member/user/addUser',$params);
    }
}