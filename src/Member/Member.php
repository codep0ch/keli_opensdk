<?php
namespace Keli\OpenSDK\Member;


use Keli\OpenSDK\Core\Api;

class Member extends Api
{
    public function createMember(array $userdata){
        return $this->request('member/user/addUser',$userdata);
    }

    public function getMember(string $telephone){
        return $this->request('member/user/findUser',['user_telephone'=>$telephone],'GET');
    }
}