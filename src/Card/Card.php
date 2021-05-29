<?php
namespace Keli\OpenSDK\Card;


use Keli\OpenSDK\Core\Api;

class Card extends Api
{
    /**
     * @param array $params
     * @return mixed
     * @describe 卡券code
     */
    public function code(array $params){
        return $this->request('/card/code',$params);
    }
}