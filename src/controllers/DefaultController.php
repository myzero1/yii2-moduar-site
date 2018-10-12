<?php

namespace myzero1\moduarsite\controllers;

use yii\web\Controller;

/**
 * Default controller for the `csite` module
 */
class DefaultController extends Controller
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
     * Renders the index view for the module
     * @return string
     */
    public function actionSub1()
    {
        // $this->layout = 'main';
        return $this->render('index');
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionSub2()
    {
    	// $this->layout = 'main';
        return $this->render('index');
    }
}
