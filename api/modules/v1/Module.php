<?php

namespace api\modules\v1;

use Yii;
 
use yii\helpers\ArrayHelper;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
 
/**
 * v1 module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'api\modules\v1\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
        \Yii::$app->user->enableSession = false;
    }
    // public function behaviors()
    // {
    //     return ArrayHelper::merge(parent::behaviors(), [
    //         'authenticator' => [
    //             'class' => CompositeAuth::className(),
    //             'authMethods' => [
    //                 HttpBasicAuth::className(),
    //                 HttpBearerAuth::className(),
    //                 QueryParamAuth::className(),
    //             ],
    //         ],
    //     ]);
    // }
}
