<?php
namespace Keli\OpenSDK\Wechat;


use Keli\OpenSDK\Core\Api;

class Wechat extends Api
{
    /**
     * 获取小程序URLScheme码
     * @param String $path
     * @param String|null $query
     * @param String|null $is_expire
     * @param String|null $expire_time
     * @return mixed
     */
    public function URLScheme_get(String $path, String $query = null, String $is_expire = null, String $expire_time = null){
        return $this->request('wechat/miniProgram/URLScheme/get',[
            'path' => $path,
            'query' => $query,
            'is_expire' => $is_expire,
            'expire_time' => $expire_time
        ]);
    }

    /**
     * 获取小程序码(方式1)
     * @param String $path
     * @param array|null $optional
     * @return mixed
     */
    public function appCode_get(String $path, Array $optional = null){
        return $this->request('wechat/miniProgram/appCode/get',[
            'path' => $path,
            'optional' => $optional
        ]);
    }

    /**
     * 获取小程序码(方式2)
     * @param String $path
     * @param array|null $optional
     * @return mixed
     */
    public function appCode_getUnLimit(String $path, Array $optional = null){
        return $this->request('wechat/miniProgram/appCode/getUnLimit',[
            'path' => $path,
            'optional' => $optional
        ]);
    }

    /**
     * 获取小程序二维码
     * @param String $path
     * @param String|null $width
     * @return mixed
     */
    public function appCode_getQrcode(String $path, String $width = null){
        return $this->request('wechat/miniProgram/appCode/getQrcode',[
            'path' => $path,
            'width' => $width
        ]);
    }

    /**
     * 微信小程序授权
     * @param String $code
     * @param String|null $wechatAppId
     * @return mixed
     */
    public function auth_session(String $code, String $wechatAppId = null){
        return $this->request('wechat/miniProgram/auth/session',[
            'code' => $code,
            'wechatAppId' => $wechatAppId
        ]);
    }

    /**
     * 微信小程序消息解密
     * @param String $session
     * @param String $iv
     * @param String $encryptedData
     * @return mixed
     */
    public function encryptor_decryptData(String $session, String $iv, String $encryptedData){
        return $this->request('wechat/miniProgram/encryptor/decryptData',[
            'session' => $session,
            'iv' => $iv,
            'encryptedData' => $encryptedData
        ]);
    }

    /**
     * 发送模板消息
     * @param String $path
     * @param array|null $optional
     * @return mixed
     */
    public function templateMessage_send(String $path, Array $optional = null){
        return $this->request('wechat/miniProgram/templateMessage/send',[
            'path' => $path,
            'optional' => $optional
        ]);
    }

    //TODO 发送一次性订阅消息 文档错误
}