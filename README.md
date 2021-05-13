```php
//外网调用配置
$configs = [
    'appId' => 'kelikeji',
    'appSecret' => 'kelikeji',
    'debug' => true
];
//内网调用配置
$configs = [
    'mch_id' => 31,
    'Inner' => true,
    'debug' => true
];
$dispatch = new \Keli\OpenSDK\Dispatch($configs);
/**
 * 会员模块，查找用户信息示例
 */
$userData = $dispatch->member->getMember('18591751341');
if($userData['code'] == 200){
    echo '找到会员';
}

/**
 * Token模块，取出来token 
 */
$dispatch->access_token->getToken();
```