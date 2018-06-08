<?php
namespace common\models;

use Yii;
use yii\base\Model;
use common\models\SysUser;
use yii\captcha\Captcha;


/**
 * Password reset request form
 */
class PasswordResetRequestForm extends Model
{
    public $email;
    public $verifyCode;
    

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['email', 'trim'],
            ['email', 'required','message'=>"请输入你的邮箱地址！"],
            ['email', 'email'],
            ['email', 'exist',
                'targetClass' => '\common\models\SysUser',
                'filter' => ['status' => SysUser::STATUS_ACTIVE],
                'message' => '没有找到找个邮箱！'
            ],
            ['verifyCode', 'captcha','message'=>"请输入正确验证码！"],
        ];
    }

    /**
     * Sends an email with a link, for resetting the password.
     *
     * @return bool whether the email was send
     */
    public function sendEmail()
    {
        /* @var $SysUser SysUser */
        $user = SysUser::findOne([
            'status' => SysUser::STATUS_ACTIVE,
            'email' => $this->email,
        ]);

        if (!$user) {
            return false;
        }
        
        if (!SysUser::isPasswordResetTokenValid($user->password_reset_token)) {
            $user->generatePasswordResetToken();
            if (!$user->save()) {
                return false;
            }
        }

         $mailer=Yii::$app->mailer->compose(
                ['html' => 'passwordResetToken-html', 'text' => 'passwordResetToken-text'],
                ['user' => $user,'time'=>time()]
            );
        $mailer->setFrom([Yii::$app->params['supportEmail'] => 'K183农机监管平台-信息录入']);
        $mailer->setTo($this->email);
        $mailer->setSubject('重置密码 K183农机监管平台-信息录入');
        if($mailer->send()){
            return true;
        }
        return false;
    }
    
    public function attributeLabels()
    {
        return [
            'email' => '邮箱账户',
            'verifyCode' => '',
        ];
    }
}
