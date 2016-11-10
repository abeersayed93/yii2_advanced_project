<?php
namespace backend\models ;
use Yii;
use yii\base\Model;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class loginformtest extends Model
{
     public $email;
    public $password;
 //   public $rememberMe = true;

    private $_user;


    /**
     * @inheritdoc
     */
    
    public function rules()
    {
        return [
            // username and password are both required
            [['email'], 'required'],
           
        ];
    }

}

