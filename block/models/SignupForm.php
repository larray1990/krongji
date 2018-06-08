<?php
namespace block\models;

use yii\base\Model;
use common\models\Adminuser;
use common\models\SysUser;
use yii\helpers\VarDumper;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $nickname;
    public $email;
    public $password_hash;
    public $password_reset_token;
    public $level;
    public $province;
    public $city;
    public $district;
//    public $profile;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\SysUser', 'message' => '用户名已经存在.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\SysUser', 'message' => '邮件地址已经存在.'],

            ['password_hash', 'required'],
            ['password_hash', 'string', 'min' => 6],
            ['password_reset_token', 'required'],
        	['password_reset_token','compare','compareAttribute'=>'password_hash','message'=>'两次输入的密码不一致！'],
        		
        	['nickname','required'],
        	['nickname','string','max'=>128],
            [['province','city','district','level'],'required'],
            [['province','city','district','level'],'string'],
//            ['profile','string'],
        ];
    }

    public function attributeLabels()
    {
    	return [
    			'username' => '用户名',
    			'nickname' => '昵称',
    			'password_hash' => '密码',
    			'password_reset_token'=>'重输密码',
    			'email' => '邮箱',
    			'province' => '省',
    			'city' => '市',
    			'district' => '区',
    			'level' => '等级',
//    			'profile' => '简介',
    	];
    }
    
    
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        $user = new SysUser();
        $user->username = $this->username;
        $user->nickname = $this->nickname;
        $user->email = $this->email;
        $user->created_at = time();
        $user->updated_at = time();
        $user->level = $this->level;
        $user->province = $this->province;
        $user->city = $this->city;
        $user->district = $this->district;

        $user->setPassword($this->password_hash);
        $user->generatePasswordResetToken();
        $user->generateAuthKey();
        $user->password = $this->password_hash;
//   $user->save(); VarDumper::dump($user->errors);exit(0);
        return $user->save() ? $user : null;
    }
}
