<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "{{%sys_user}}".
 *
 * @property string $id 主键id
 * @property string $username 用户名
 * @property string $nickname 昵称
 * @property string $password 密码
 * @property string $password_hash 密码
 * @property string $password_reset_token 密码token
 * @property string $email 邮箱
 * @property string $auth_key
 * @property int $status 状态
 * @property int $level 层级
 * @property string $loginip 登陆ip
 * @property int $bid 部门id
 * @property int $created_at 创建时间
 * @property int $updated_at 更新时间
 * @property string $province
 * @property string $city
 * @property string $district
 * @property int $role
 */
class SysUser extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%sys_user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username','required','message'=>'管理员账号不能为空','on'=>'create'],
            ['password_hash','required','message'=>'密码不能为空','on'=>'create'],
            ['email','required','message'=>'邮箱不能为空','on'=>'create'],
            ['email','unique','message'=>'电子邮箱已被注册','on'=>'create'],
            ['username','unique','message'=>'管理员账号已被注册','on'=>'create'],
            ['username','required','message'=>'管理员账号不能为空','on'=>'create'],
            ['email','email','message'=>'邮箱格式不正确','on'=>'create'],
            [['status', 'level', 'bid',], 'integer'],
            [['username', 'password'], 'string', 'max' => 50],
            [['password_reset_token', 'email', 'auth_key'], 'string', 'max' => 60],
            [['username','email'], 'unique'],
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],

            [['nickname', 'province', 'city', 'district'], 'required'],
            [['status', 'level', 'loginip', 'bid', 'created_at', 'updated_at', 'role'], 'integer'],
            [['nickname'], 'string', 'max' => 128],
            [['password_hash'], 'string', 'max' => 80],
            [['province', 'city', 'district'], 'string', 'max' => 255],
            [['username', 'password_hash'], 'unique', 'targetAttribute' => ['username', 'password_hash']],
            [['username', 'email'], 'unique', 'targetAttribute' => ['username', 'email']],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '主键id',
            'username' => '用户名',
            'nickname' => '昵称',
            'password' => '密码',
            'password_hash' => '密码',
            'password_reset_token' => '密码token',
            'email' => '邮箱',
            'auth_key' => 'Auth Key',
            'status' => '状态',
            'level' => '层级',
            'loginip' => '登陆ip',
            'bid' => '部门id',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'province' => '省',
            'city' => '市',
            'district' => '区/县',
            'role' => 'Role',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

}
