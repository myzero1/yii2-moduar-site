<?php

namespace myzero1\moduarsite\controllers;

use yii\web\Controller;

/**
 * Default controller for the `csite` module
 */
class SiteController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        // $this->layout = 'main';
        return $this->render('index');
    }

    /**
     * Placeholdon layout.
     *
     * @return string
     */
    public function actionLayout()
    {
        // var_dump('expression');exit;
        $this->layout = '@vendor/myzero1/yii2-theme-adminlteiframe/src/views/adminlteiframe/layouts/layout';
        return $this->render('@vendor/myzero1/yii2-theme-adminlteiframe/src/views/adminlteiframe/site/default');
    }
}
