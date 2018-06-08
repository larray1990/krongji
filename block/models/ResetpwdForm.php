<?php
namespace block\models;

use yii\base\Model;
use common\models\Adminuser;
use common\models\SysUser;
use yii\helpers\VarDumper;

/**
 * Signup form
 */
class ResetpwdForm extends Model
{
    public $nickname;
    public $id;
    public $password_hash;
    public $password_reset_token;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['password_hash', 'required'],
            ['password_hash', 'string', 'min' => 6],
            ['password_reset_token', 'required'],
        	['password_reset_token','compare','compareAttribute'=>'password_hash','message'=>'两次输入的密码不一致！'],
        ];
    }

    public function attributeLabels()
    {
    	return [
    			'password_hash' => '密码',
    			'password_reset_token'=>'重输密码',
    	];
    }
    
    
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function resetPassword($id)
    {
        if (!$this->validate()) {
            return null;
        }
//        $admuser = Adminuser::findOne($id);
        $admuser = SysUser::findOne($id);
        $admuser->setPassword($this->password_hash);
        $admuser->generatePasswordResetToken($this->password_reset_token);

        return $admuser->save() ? true : false;
    }
}
