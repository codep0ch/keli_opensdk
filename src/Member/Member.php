<?php
namespace Keli\OpenSDK\Member;


use Keli\OpenSDK\Core\Api;

class Member extends Api
{
    /**
     * 创建会员
     * @param String $user_name
     * @param Int $user_gender
     * @param String $user_telephone
     * @param String $user_agent
     * @param String $user_address
     * @param Int $tag_id
     * @param Int $user_level
     * @param Int $channel_id
     * @return mixed
     */
    public function createMember(String $user_name, Int $user_gender, String $user_telephone, String $user_agent, String $user_address,Int $tag_id,
    Int $user_level,Int $channel_id){
        return $this->request('member/user/addUser', [
            'user_name' => $user_name,
            'user_gender' => $user_gender,
            'user_telephone' => $user_telephone,
            'user_agent' => $user_agent,
            'user_address' => $user_address,
            'tag_id' => $tag_id,
            'user_level' => $user_level,
            'channel_id' => $channel_id
        ]);
    }

    /**
     * 编辑用户
     * @param String $user_name
     * @param String $card_no
     * @param Int $user_gender
     * @param String $user_telephone
     * @param String $user_agent
     * @param String $user_address
     * @param Int $tag_id
     * @param Int $user_level
     * @param Int $channel_id
     * @return mixed
     */
    public function editUser(String $user_name, String $card_no, Int $user_gender, String $user_telephone, String $user_agent, String $user_address,Int $tag_id,
                                 Int $user_level, Int $channel_id){
        return $this->request('member/user/editUser', [
            'user_name' => $user_name,
            'card_no' => $card_no,
            'user_gender' => $user_gender,
            'user_telephone' => $user_telephone,
            'user_agent' => $user_agent,
            'user_address' => $user_address,
            'tag_id' => $tag_id,
            'user_level' => $user_level,
            'channel_id' => $channel_id
        ]);
    }

    /**
     * 查询会员信息
     * @param String|null $user_telephone
     * @param String|null $user_agent
     * @param String|null $card_no
     * @return mixed
     */
    public function getMember( String $user_telephone = null, String $user_agent = null, String $card_no = null){
        return $this->request('member/user/findUser',[
            'user_telephone' => $user_telephone,
            'user_agent' => $user_agent,
            'card_no' => $card_no
        ]);
    }

    /**
     * 会员绑定标签
     * @param String $card_no
     * @param Int $tag_id
     * @return mixed
     */
    public function bindTag(String $card_no, Int $tag_id){
        return $this->request('member/user/bindTag',[
            'card_no' => $card_no,
            'tag_id' => $tag_id
        ]);
    }

    /**
     * 会员删除标签
     * @param String $card_no
     * @param Int $tag_id
     * @return mixed
     */
    public function delUserTag(String $card_no,Int $tag_id){
        return $this->request('member/user/delUserTag',[
            'card_no' => $card_no,
            'tag_id' => $tag_id
        ]);
    }

    /**
     * 查询积分
     * @param String $card_no
     * @return mixed
     */
    public function checkScore(String $card_no){
        return $this->request('member/score/checkScore',[
            'card_no' => $card_no
        ]);
    }

    /**
     * 增加积分
     * @param String $card_no
     * @param Int $score
     * @return mixed
     */
    public function increaseScore(String $card_no, Int $score){
        return $this->request('member/score/increaseScore',[
            'card_no' => $card_no,
            'score' => $score
        ]);
    }

    /**
     * 减少积分
     * @param String $card_no
     * @param Int $score
     * @return mixed
     */
    public function deductionScore(String $card_no, Int $score){
        return $this->request('member/score/deductionScore',[
            'card_no' => $card_no,
            'score' => $score
        ]);
    }

    /**
     * 撤销积分操作
     * @param String $operate_hash
     * @return mixed
     */
    public function cancelScoreOperate(String $operate_hash){
        return $this->request('member/score/cancelScoreOperate',[
            'operate_hash' => $operate_hash
        ]);
    }

    /**
     * 查询标签列表
     * @return mixed
     */
    public function getTag(){
        return $this->request('member/tag/getTag',[]);
    }

    /**
     * 添加标签
     * @return mixed
     */
    public function addTag(String $tag_name){
        return $this->request('member/tag/addTag',[
            'tag_name' => $tag_name
        ]);
    }

    /**
     * 删除标签
     * @param Int $tag_id
     * @return mixed
     */
    public function delTag(Int $tag_id){
        return $this->request('member/tag/delTag',[
            'tag_id' => $tag_id
        ]);
    }

    /**
     * 查询渠道列表
     * @return mixed
     */
    public function getChannel(){
        return $this->request('member/channel/getChannel',[]);
    }

    /**
     * 添加渠道
     * @param String $channel_name
     * @return mixed
     */
    public function addChannel(String $channel_name){
        return $this->request('member/channel/addChannel',[
            'channel_name' => $channel_name
        ]);
    }

    /**
     * 删除渠道
     * @param Int $channel_id
     * @return mixed
     */
    public function delChannel(Int $channel_id){
        return $this->request('member/channel/delChannel',[
            'channel_id' => $channel_id
        ]);
    }
}