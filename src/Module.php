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
        // var_dump('111');exit;
        // var_dump($this->components);exit;
        // $this->setControllerMap($app);
        // $this->addBehaviors($app);
        // $this->rewriteLibs($app);

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
    }

    /**
     * @inheritdoc
     */
    // public function beforeAction($action)
    // {
    //     if (!parent::beforeAction($action)) {
    //         return false;
    //     }

    //     \Yii::$app->params['dependClass'] = \Yii::$app->controller->module->dependClass;

    //     return true;
    // }

    private function rewriteLibs($app){
        \Yii::$classMap['yii\db\Command'] = '@vendor/myzero1/yii2-log/src/components/libs/Command.php';
    }

    private function addBehaviors($app){
        $app->on(Controller::EVENT_BEFORE_ACTION,['\myzero1\log\Module','z1logBeforeAction']);
        $app->view->on(View::EVENT_BEFORE_RENDER,['\myzero1\log\Module','z1logBeforeRender']);
        $app->on(Application::EVENT_AFTER_REQUEST,['\myzero1\log\Module','z1logAfterRequest']);
    }

    /**
     * Set method to get,bodyParams to array().
     *
     * @author myzero1
     * @since 2.0.13
     */
    public static function z1logBeforeAction($event)
    {
        if (isset($_SESSION['z1logSaved'])) {
            $_POST['_method'] = 'get';
            $_SERVER['REQUEST_METHOD'] = 'get';

            \Yii::$app->request->bodyParams = array();
        }
    }

    /**
     * Rend view by renderAjax.
     * 
     * @param  array $event
     * 
     * @author myzero1
     * @since 2.0.13
     */
    public static function z1logBeforeRender($event)
    {
        if (isset(\Yii::$app->params['z1log']['params']['z1logToRending'])) {
            unset(\Yii::$app->params['z1log']['params']['z1logToRending']);

            $layout = \Yii::$app->layout;
            if (!is_null(\Yii::$app->controller->module->layout)) {
                $layout = \Yii::$app->controller->module->layout;
            }
            if (!is_null(\Yii::$app->controller->layout)) {
                $layout = \Yii::$app->controller->layout;
            }

            // if (!isset(\Yii::$app->params['z1logRended'])) {
            //     \Yii::$app->params['z1logRended'] = true;
            //     // \Yii::$app->layout = '//blank';
            //     \Yii::$app->layout = self::$z1layout;
            // }

        }


        // var_dump($layout);exit;

        // if (!isset(\Yii::$app->params['z1logRended'])) {
        //     \Yii::$app->params['z1logRended'] = true;

        //     // $pathinfo = pathinfo($event->viewFile);
        //     // $sHtml = \Yii::$app->view->renderAjax($pathinfo['filename'],$event->params);
        


        //     // \Yii::$app->view->context->layout = '//blank';
        //     \Yii::$app->layout = '//blank';
        // }
    }

    /**
     * unset the z1logSaved session.
     * 
     * @param  array $event
     * 
     * @author myzero1
     * @since 2.0.13
     */
    public static function z1logAfterRequest($event)
    {
        if (isset($_SESSION['z1logSaved'])) {
            unset($_SESSION['z1logSaved']);
        }
    }


    private function setControllerMap($app){
        // var_dump('asdf');exit;
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

    private function setUrlManager($app, $config){
        $rules = isset($config['components']['urlManager']['rules']) ? $config['components']['urlManager']['rules'] : [];
        // var_dump($rules);exit;
        $app->getUrlManager()->addRules($rules, false);

       // if ($app instanceof \yii\web\Application) {
       //     $app->getUrlManager()->addRules([
       //         $this->id => $this->id . '/default/index',
       //         $this->id . '/<id:\w+>' => $this->id . '/default/view',
       //         $this->id . '/<controller:[\w\-]+>/<action:[\w\-]+>' => $this->id . '/<controller>/<action>',
       //     ], false);
       // } elseif ($app instanceof \yii\console\Application) {
       //     $app->controllerMap[$this->id] = [
       //         'class' => 'yii\gii\console\GenerateController',
       //         'generators' => array_merge($this->coreGenerators(), $this->generators),
       //         'module' => $this,
       //     ];
       // }
        // array_merge($app->urlManager->rules, $this->urlManager->rules);
        // var_dump($app->urlManager);
        // var_dump($this->urlManager);
        // exit;
    }
}