<?php
namespace Keli\OpenSDK\Member;


use Keli\OpenSDK\Core\Api;

class Member extends Api
{
    public function createMember(array $params){
        return $this->request('member/user/addUser',$params);
    }

    public function getMember(string $telephone){
        return $this->request('member/user/findUser',['user_telephone'=>$telephone]);
    }
    public function addTag(array $params){
        return $this->request('member/tag/addTag',$params);
    }

    public function getTag(array $params){
        return $this->request('member/tag/getTag',$params);
    }

    public function delTag(array $params){
        return $this->request('member/tag/delTag',$params);
    }
    public function getChannel(array $params){
        return $this->request('member/channel/getChannel',$params);
    }
    public function addChannel(array $params){
        return $this->request('member/channel/addChannel',$params);
    }
    public function delChannel(array $params){
        return $this->request('member/channel/delChannel',$params);
    }
}