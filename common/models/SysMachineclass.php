<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%sys_machineclass}}".
 *
 * @property int $id 设备分类id
 * @property string $mc_num 农机编号
 * @property string $dname 设备名称
 * @property int $parent_id 父id
 * @property string $parent_id_path 家族图谱
 * @property string $version 型号
 * @property string $householder 户主
 * @property string $year 年限
 * @property string $status 工作状态  正常，维修
 * @property string $fault 故障信息
 * @property int $level 等级
 * @property string $info 类型简介
 * @property int $sort_order 顺序排序
 * @property int $cat_group 分类分组默认0
 * @property int $created_at 创建时间
 * @property int $updated_at 更新时间
 */
class SysMachineclass extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sys_machineclass}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mc_num'], 'required'],
            [['parent_id', 'created_at', 'updated_at'], 'integer'],
            [['fault'], 'string'],
            [['mc_num', 'version', 'householder', 'year', 'status'], 'string', 'max' => 50],
            [['dname'], 'string', 'max' => 90],
            [['parent_id_path'], 'string', 'max' => 128],
            [['level', 'sort_order', 'cat_group'], 'string', 'max' => 1],
            [['info'], 'string', 'max' => 999],
            [['version'], 'unique'],
            [['householder'], 'unique'],
            [['year'], 'unique'],
            [['status'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '设备分类id',
            'mc_num' => '农机编号',
            'dname' => '设备名称',
            'parent_id' => '父id',
            'parent_id_path' => '家族图谱',
            'version' => '型号',
            'householder' => '户主',
            'year' => '年限',
            'status' => '工作状态  正常，维修',
            'fault' => '故障信息',
            'level' => '等级',
            'info' => '类型简介',
            'sort_order' => '顺序排序',
            'cat_group' => '分类分组默认0',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }
}
