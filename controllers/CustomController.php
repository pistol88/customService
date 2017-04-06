<?php
namespace backend\widgets\customService\controllers;

use Yii;

use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\widgets\customService\models\Custom;

class CustomController extends Controller
{
    public function behaviors()
    {
       return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'buy' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['superadmin', 'admin', 'administrator', 'seller', 'client', 'staffer'],
                    ]
                ]
            ]
        ];
    }
    
    public function actionBuy()
    {
        $customServiceModel = new Custom;
        
        if ($customServiceModel->load(Yii::$app->request->post()) && $customServiceModel->save()) {
            yii::$app->cart->put($customServiceModel);
            if(yii::$app->request->post('ajax')) {
                return json_encode(['result' => 'success', 'id' => $customServiceModel->id, 'price' => $customServiceModel]);
            } else {
                \Yii::$app->session->setFlash('customServiceBuy', 'В корзине!');
            }
        }
    }
}