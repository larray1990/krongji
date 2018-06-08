<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%sys_dbname}}".
 *
 * @property int $id
 * @property string $dname 库名
 * @property int $created_at 创建时间
 */
class SysDbname extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sys_dbname}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at'], 'integer'],
            [['dname'], 'string', 'max' => 50],
            [['dname'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dname' => '库名',
            'created_at' => '创建时间',
        ];
    }
}
