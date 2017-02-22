<?php

namespace api\modules\v1\controllers;

use yii\filters\Cors;
use yii\helpers\ArrayHelper; 
use yii\rest\ActiveController;
use yii\web\Response;
 
class CountryController extends ActiveController
{
    public $modelClass = 'api\modules\v1\models\Country';
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
  ];
   public function behaviors()
   {
       $behaviors = parent::behaviors();
       $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;
       
        return ArrayHelper::merge([
        [
            'class' => Cors::className(),
            'cors' => [
                'Origin' => ['http://localhost:8100'],
                'Access-Control-Request-Method' => ['GET', 'HEAD', 'OPTIONS'],
            ],
            'actions' => [
                'index' => [
                    'Access-Control-Allow-Credentials' => true,
                ]
            ]
        ],
    ], $behaviors);
      
  }
  
}
