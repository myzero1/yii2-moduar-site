<?php

namespace myzero1\moduarsite;

use Yii;
use yii\base\BootstrapInterface;
use yii\web\ForbiddenHttpException;
use yii\base\View;
use yii\base\Controller;
use yii\base\Application;

/**
 * This is the main module class for the z1rbacp module.
 *
 *
 * @author myzero1 <myzero1@sina.com>
 * @since 2.0
 */
class Module extends \yii\base\Module implements BootstrapInterface
{
    /**
     * @var string  if it equal to 'myzero1', main.php will add autoload and alias
     */
    public static $z1layout = '@vendor/myzero1/yii2-theme-adminlteiframe/src/views/layouts/main';  //blank
    /**
     * @var string  if it equal to 'myzero1', main.php will add autoload and alias
     */

    /**
     * @var array dependClass 
     *
        [
            'clssName' => 'Class ',
            'DefaultController' => '\z1demo\controllers\DefaultController',
        ]
     * 
     */
    public $dependClass;

    /**
     * @var array bootstrap []
     *
     */
    public $bootstrap = [];

    /**
     * @var array bootstrap []
     *
     */
    public $moduarConfig = [];

    public $menu;

    /**
     * @var array appKeyValueConfig 
     *
        [
            'auditProcess' => [
                'apply' => [
                    1 => '新开申请',
                    2 => '装机停业申请',
                    4 => '未装机停业申请',
                ],
                'deal' => [
                    1 => '审核通过',
                    2 => '审核不通过',
                    3 => '审核中',
                ],
            ],
        ]
     * 
     */
    public $appKeyValueConfig;

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'myzero1\moduarsite\controllers';

    /**
     * @var array the params will merger to module
     */
    public $params = [];

    /**
     * @inheritdoc
     */
    public function bootstrap($app)
    {
        $this->addConfig($app);
    }

    private function addConfig($app){
        $config = require __DIR__ . '/config/moduarConfig.php';

        $config = \yii\helpers\ArrayHelper::merge($config, $this->moduarConfig);

        // set modules as the children of moduarsite.
        \Yii::configure($this, $config);

        //run the bootstrap of the config file
        $this->setBootstrap($app, $this->bootstrap);

        //merger the components of modular config file.
        \Yii::$app->components = \yii\helpers\ArrayHelper::merge(\Yii::$app->components, $this->components);

        // merger the params of modular config file.
        \Yii::$app->params = \yii\helpers\ArrayHelper::merge(\Yii::$app->params, $this->params);


        // for golbal set
        $this->defaultRoute = 'site';
        $app->getUrlManager()->addRules([
            "<controller:\w+>/<action:\w+>" => '/' . $this->id . "/<controller>/<action>",
        ], false);
        \Yii::$app->defaultRoute  = $this->id;

    }

    private function setBootstrap($app, $bootstrap){

       foreach ($bootstrap as $class) {
           $component = null;
           if (is_string($class)) {
               if ($this->has($class)) {
                   $component = $this->get($class);
               } elseif ($this->hasModule($class)) {
                   $component = $this->getModule($class);
               } elseif (strpos($class, '\\') === false) {
                   throw new InvalidConfigException("Unknown bootstrapping component ID: $class");
               }
           }
           if (!isset($component)) {
               $component = Yii::createObject($class);
           }

           if ($component instanceof BootstrapInterface) {
               Yii::trace('Bootstrap with ' . get_class($component) . '::bootstrap()', __METHOD__);
               $component->bootstrap($this);
           } else {
               Yii::trace('Bootstrap with ' . get_class($component), __METHOD__);
           }
       }
    }


    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        // var_dump($_SESSION);exit;

        \Yii::configure($this, require __DIR__ . '/config/main.php');
        \Yii::$app->view->theme = $this->view->theme;
    }
}