<?php

namespace api\modules\v1\controllers;

use Yii;
use yii\web\Controller; 
use yii\web\NotFoundHttpException;
/**
 * Default controller for the `v1` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        throw new NotFoundHttpException("Unsuported action request", 100);
    }
}
