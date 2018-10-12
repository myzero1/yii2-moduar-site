<?php

namespace myzero1\moduarsite;

/**
 * csite module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @var string  if it equal to 'myzero1', main.php will add autoload and alias
     */
    public $from;

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
     * @var array menu 
     *
        [
            "z1demo" => [
                'label' => Yii::t('app', '平台首页'),
                // 'url' => Yii::$app->homeUrl,
                'url' => ['/site/index'],
                'icon' => 'fa-dashboard',
                'active' => Yii::$app->request->url === Yii::$app->homeUrl || Yii::$app->request->url=='/site/index',
                'items' => [
                ]
            ],
        ];
     * 
     */
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
    // public $controllerNamespace = 'backend\modules\common\modules\csite\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {
        if (!parent::beforeAction($action)) {
            return false;
        }

        \Yii::$app->params['dependClass'] = \Yii::$app->controller->module->dependClass;
        
        return true;
    }
}
