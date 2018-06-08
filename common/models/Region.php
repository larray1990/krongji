<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%region}}".
 *
 * @property string $id
 * @property string $name
 * @property int $parent_id
 * @property int $level
 */
class Region extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%region}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'parent_id', 'level'], 'required'],
            [['id', 'parent_id', 'level'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['id'], 'unique'],
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
            'parent_id' => 'Parent ID',
            'level' => 'Level',
        ];
    }

    /**
     * @param int $parentId
     * @return mixed
     */
    public static function getRegion($parentId=0)
    {
        $result = static::find()->where(['parent_id'=>$parentId])->asArray()->all();
        return ArrayHelper::map($result, 'id', 'name');
    }

    /**
     * @param $id
     * @return array|null|\yii\db\ActiveRecord
     */
    public static function getName($id)
    {
        $result = static::find()->select('name')->where(['id'=>$id])->scalar();
        return $result;
    }
}
