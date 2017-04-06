<?php
namespace backend\widgets\customService\models;

use yii;

class Custom extends \yii\db\ActiveRecord implements \pistol88\cart\interfaces\CartElement, \pistol88\order\interfaces\Product
{
    public static function tableName()
    {
        return '{{%service_custom}}';
    }
    
    public function rules()
    {
        return [
            [['name', 'price'], 'required'],
            [['id'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'date' => 'Дата',
            'price' => 'Цена',
        ];
    }
    
    public function getCartId()
    {
        return $this->id;
    }
    
    public function getCartName()
    {
        return $this->name;
    }
    
    public function getShortName()
    {
        return $this->name;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function getCartPrice()
    {
        return $this->price;
    }
    
    public function getCartOptions()
    {
        return [];
    }
    
    public function minusAmount($count)
    {
        return true;
    }
    
    public function plusAmount($count)
    {
        return true;
    }
    
    function getCode()
    {
        return $this->id;
    }
    
    function getPrice()
    {
        return $this->price;
    }
    
    function getAmount()
    {
        return 1;
    }
    
    function getSellModel()
    {
        return $this;
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function beforeSave($insert)
    {
        if(empty($this->date)) {
            $this->date = date('Y-m-d H:i:s');
        }
        
        return parent::beforeSave($insert);
    }
}