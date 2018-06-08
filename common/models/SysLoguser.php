<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%sys_loguser}}".
 *
 * @property int $id
 * @property string $username
 * @property int $level 层级
 * @property string $logdata
 * @property string $logip
 * @property string $errortext
 * @property int $uid
 */
class SysLoguser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sys_loguser}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['level', 'uid'], 'integer'],
            [['username', 'logdata', 'logip', 'errortext'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'level' => '层级',
            'logdata' => 'Logdata',
            'logip' => 'Logip',
            'errortext' => 'Errortext',
            'uid' => 'Uid',
        ];
    }
}
