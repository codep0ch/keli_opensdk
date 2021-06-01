> 目前没有稳定版本,开发测试均使用 composer require keli/opensdk:dev-master

### 外网调用配置

| 参数    | 必填 | 示例 |
| --------- | ---- | ---- |
| appId     | 是  | / |
| appSecret | 是  | / |
| debug     | 否  | true |

### 内网调用配置
| 参数    | 必填 | 示例 |
| --------- | ---- | ---- |
| mch_id    | 是  | 1 |
| debug     | 否  | true |

### 大纲
```php
$dispatch->card; //卡券服务
$dispatch->pay; //支付服务
$dispatch->member; //会员服务
$dispatch->wechat; //微信服务
```

### 内网调用示例
```php
$configs = [
    'mch_id' => 31
];
$dispatch = new \Keli\OpenSDK\Dispatch($configs);
/**
 * 会员模块，查找用户信息示例
 */
$userData = $dispatch->Inner(true)->member->getMember('18591751341');
if($userData['code'] == 200){
    echo '找到会员';
}
```