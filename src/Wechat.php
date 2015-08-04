<?php

namespace yadjet\wechat;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\base\InvalidValueException;

/**
 * Wechat service
 * 
 * ```php
 * 'components' => [
 *     ......
 *     'wechat' => [
 *         'class' => '\yadjet\wechat\Wechat',
 *         'config' => [
 *             'appId' => 'youAppId',
 *             'appSecret' => 'youAppSecret',
 *         ],
 *    ],
 * ],
 * ```
 * 
 * ```php
 * $userService = \Yii::$app->wechat->getService('user');
 * $userService = $userService->get($openId);
 * echo $userService->nickname;
 * ```
 * 
 * @author hiscaler <hiscaler@gmail.com>
 */
class Wechat extends Component
{

    /**
     * Wechat app id
     * @var string
     */
    private $_appId;

    /**
     * Wechat app ssecret
     */
    private $_appSecret;

    /**
     * Wechat app auth configs
     * @var array
     */
    public $config = [];

    public function init()
    {
        if (!isset($this->config['appId'], $this->config['appSecret'])) {
            throw new InvalidConfigException('Wechat needs appId and token configured.');
        }

        $this->_appId = $this->config['appId'];
        $this->_appSecret = $this->config['appSecret'];
    }

    /**
     * Get wechat service.
     * @param string $name
     * @return mixed
     * @throws InvalidValueException
     */
    public function getService($name)
    {
        $name = strtolower($name);
        $classMap = [
            'auth' => 'Overtrue\\Wechat\\Auth',
            'card' => 'Overtrue\\Wechat\\Card',
            'exception' => 'Overtrue\\Wechat\\Exception',
            'group' => 'Overtrue\\Wechat\\Group',
            'image' => 'Overtrue\\Wechat\\Image',
            'js' => 'Overtrue\\Wechat\\Js',
            'media' => 'Overtrue\\Wechat\\Media',
            'menu' => 'Overtrue\\Wechat\\Menu',
            'menuItem' => 'Overtrue\\Wechat\\MenuItem',
            'message' => 'Overtrue\\Wechat\\Message',
            'qrcode' => 'Overtrue\\Wechat\\QRCode',
            'server' => 'Overtrue\\Wechat\\Server',
            'staff' => 'Overtrue\\Wechat\\Staff',
            'store' => 'Overtrue\\Wechat\\Store',
            'url' => 'Overtrue\\Wechat\\Url',
            'user' => 'Overtrue\\Wechat\\User',
            'notice' => 'Overtrue\\Wechat\\Notice',
            'stats' => 'Overtrue\\Wechat\\Stats',
            'semantic' => 'Overtrue\\Wechat\\Semantic',
            'color' => 'Overtrue\\Wechat\\Color',
        ];
        if (isset($classMap[$name])) {
            return Yii::createObject($classMap[$name], [$this->_appId, $this->_appSecret]);
        } else {
            throw new InvalidValueException('Please provide a valid service name');
        }
    }

}
