<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%sys_engine}}".
 *
 * @property int $id
 * @property string $dname 类型
 * @property string $tool_num 机具编号
 * @property string $format 机具规格
 * @property string $factor 机具厂家
 * @property string $housemaster 机具户主
 * @property string $ability 作业能力
 * @property int $created_at 创建时间
 * @property int $updated_at 更新时间
 */
class SysEngine extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sys_engine}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tool_num', 'format', 'factor', 'housemaster', 'ability'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['dname', 'tool_num', 'format', 'factor', 'housemaster', 'ability'], 'string', 'max' => 50],
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
            'dname' => '类型',
            'tool_num' => '机具编号',
            'format' => '机具规格',
            'factor' => '机具厂家',
            'housemaster' => '机具户主',
            'ability' => '作业能力',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }
}
