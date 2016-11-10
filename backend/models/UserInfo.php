<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user_info".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $gender
 * @property integer $is_active 
 * @property string $token
 */
class UserInfo extends \yii\db\ActiveRecord
{
    public $repassword ;
    public $message ;
    public $is_active;
    public $token;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_info';
    }
    
    public function rules()
    {
        return [
            [['name', 'email', 'password', 'gender'], 'required'],
            [['id','gender','is_active'], 'integer'],
            [['name', 'email', 'password','token'], 'string', 'max' => 50],
            [['id'], 'unique'],
            [['email'], 'unique'],
           
           
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
            'gender' => 'Gender',
            'is_active' => 'is_active',
            'token' => 'Token',
            
        ];
    }

}
