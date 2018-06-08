<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%sys_department}}".
 *
 * @property int $id
 * @property string $dname 部门名称
 * @property int $level 部门层级
 * @property string $info 部门简介
 * @property string $map_key 用于google maps key使用
 * @property int $created_at 创建时间
 * @property int $updated_at 更新时间
 * @property int $cid
 * @property int $did
 * @property int $eid
 * @property string $province 省
 * @property string $city 市
 * @property string $district 区
 */
class SysDepartment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sys_department}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dname','info','level','province','city','district'],'required'],
            [['level', 'created_at', 'updated_at', 'cid', 'did', 'eid'], 'integer'],
            [['dname', 'province', 'city', 'district'], 'string', 'max' => 50],
            [['info'], 'string', 'max' => 999],
            [['map_key'], 'string', 'max' => 60],
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
            'dname' => '部门名称',
            'level' => '部门层级',
            'info' => '部门简介',
            'map_key' => '用于google maps key使用',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'cid' => '上级分类',
            'did' => 'Did',
            'eid' => 'Eid',
            'province' => '省',
            'city' => '市',
            'district' => '区',
        ];
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        $data = $this->getData();
        $tree = $this->getTree($data);
        $tree = $this->setPrefix($tree);
        $options = ['添加顶级分类'];
        foreach($tree as $cate) {
            $options[$cate['id']] = $cate['dname'];
        }
        return $options;
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getData()
    {
        $cates = self::find()->all();
        $cates = ArrayHelper::toArray($cates);
        return $cates;
    }

    /**
     * @param $cates
     * @param int $pid
     * @return array
     */
    public function getTree($cates, $cid = 0)
    {
        $tree = [];
        foreach($cates as $cate) {
            if ($cate['cid'] == $cid) {
                $tree[] = $cate;
                $tree = array_merge($tree, $this->getTree($cates, $cate['id']));
            }
        }
        return $tree;
    }

    /**
     * @param $data
     * @param string $p
     * @return array
     */
    public function setPrefix($data, $p = "|-----")
    {
        $tree = [];
        $num = 1;
        $prefix = [0 => 1];
        while($val = current($data)) {
            $key = key($data);
            if ($key > 0) {
                if ($data[$key - 1]['cid'] != $val['cid']) {
                    $num ++;
                }
            }
            if (array_key_exists($val['cid'], $prefix)) {
                $num = $prefix[$val['cid']];
            }
            $val['dname'] = str_repeat($p, $num).$val['dname'];
            $prefix[$val['cid']] = $num;
            $tree[] = $val;
            next($data);
        }
        return $tree;
    }

    /**
     * @return array
     */
    public function getTreeList()
    {
        $data = $this->getData();
        $tree = $this->getTree($data);
        return $tree = $this->setPrefix($tree);
    }

    /**
     * @param $cid
     * @return bool|false|null|string
     */
    public function getName($cid){
        $result = self::find()->select('id')->where(['id'=>$cid])->scalar();
        $model = new SysDepartment();
        $list = $model->getOptions();
        return $cid==0?'顶级分类':$list[$result];
    }

    /**
     * @param $dname
     * @return bool|false|null|string
     */
    public function getId($dname){
        $id=self::find()->select('id')->where(['dname'=>$dname])->scalar();
        $model = new SysDepartment();
        $list = $model->getOptions();
        return $list[$id];
    }

}
