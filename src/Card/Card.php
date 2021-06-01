<?php
namespace Keli\OpenSDK\Card;


use Keli\OpenSDK\Core\Api;

class Card extends Api
{
    /**
     * @param Int $reserve_id
     * @return mixed
     * @describe 卡券code
     */
    public function code(Int $reserve_id){
        //TODO 东蔚确认下这个字断,文档写的是card_id
        return $this->request('/card/code',[
            'reserve_id' => $reserve_id
        ]);
    }


}