<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%sys_engineperson}}".
 *
 * @property int $id
 * @property string $dname 机手姓名
 * @property int $tools_id 机具id
 * @property int $tel 联系方式
 * @property int $amount 工作数量
 * @property int $count 质量统计
 * @property int $created_at 创建时间
 * @property int $updated_at 更新时间
 */
class SysEngineperson extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sys_engineperson}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tools_id', 'tel', 'amount', 'count', 'created_at', 'updated_at'], 'integer'],
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
            'dname' => '机手姓名',
            'tools_id' => '机具id',
            'tel' => '联系方式',
            'amount' => '工作数量',
            'count' => '质量统计',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }
}
