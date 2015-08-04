# 关于
Yii2 微信接口整合，基于 [overtrue/wechat](https://github.com/overtrue/wechat) 扩展

# 安装
使用 composer，在命令行下使用以下命令：

```php
composer require "yadjet/yii2-wechat:dev-master" 
```

#使用
* 在您的应用配置文件中包含以下设置：
```php
'wechat' => [
    'class' => '\yadjet\wechat\Wechat',
    'config' => [
        'appId' => 'youAppId',
        'appSecret' => 'youAppSecret',
    ]
],
```

* 示例代码
class TestController extends \yii\web\Controller
{
    $userService = Yii::$app->wechat->getService('user');
    $users = $userService->get();
    var_dump($users);
}

wechat SDK 详细的使用方法请参考 [overtrue/wechat 使用手册](https://github.com/overtrue/wechat/wiki)
