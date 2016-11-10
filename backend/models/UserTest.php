<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "userTest".
 *
 * @property integer $id
 * @property string $name
 * @property string $mail
 */
class UserTest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'userTest';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'mail'], 'required'],
            [['id'], 'integer'],
            [['name', 'mail'], 'string', 'max' => 25],
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
            'mail' => 'Mail',
        ];
    }
}
