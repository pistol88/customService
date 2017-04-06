<?php
namespace backend\widgets\customService;

use backend\widgets\customService\models\Custom;
use yii;
use yii\helpers\Url;

class CustomService extends \yii\base\Widget
{
    public $addToCart = null;
    
    public function init()
    {
        if(empty($this->addToCart)) {
            $this->addToCart = Url::toRoute(['/cart/element/add']);
        }
        
        return parent::init();
    }

    public function run()
    {
        $customServiceModel = new Custom;
        
        return $this->render('customServiceForm', [
            'customServiceModel' => $customServiceModel,
            'addToCart' => $this->addToCart,
        ]);
    }
}
