<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "user_info".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property integer $gender
 * @property string $created_at
 * @property string $updated_at
 * @property string $token
 * @property integer $is_active
 */
class UserInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    
    public $repassword ;
    public $message ;
    public static function tableName()
    {
        return 'user_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'password','gender'], 'required'],
            [['gender','is_active'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'email','token'], 'string', 'max' => 255],
            [['password'], 'string', 'max' => 50],
            [['email'], 'unique'],
            [['id'], 'unique'],
            [['repassword'], 'compare', 'compareAttribute' => 'password', 'message' =>('password don\'t match')],
            [['name'], 'match', 'pattern' => '/^[0-9]*[a-zA-Z_]+[a-zA-Z0-9_]*$/', 'message' =>('name must be only letters')],
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
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'token' => 'Token',
            'is_active'=>'is_active',

        ];
    }
}
