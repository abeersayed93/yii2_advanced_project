<?php
namespace frontend\controllers;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\UserInfo ;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UserController extends controller
{
    public static $resettoken ;
    public  static $usermail ;
    //register
    public function actionSignup()
    {
        $registermodel = new UserInfo();
        $registermodel->token = bin2hex(openssl_random_pseudo_bytes(16));
        if ($registermodel->load(Yii::$app->request->post()))
            if($registermodel->save())
            {
                Yii::$app->mailer->compose('@common/mail/template', ['token' => $registermodel->token])
                ->setFrom('abeer.s.m.93@gmail.com')
                ->setTo($registermodel->email)
                ->setSubject('Verification')
                ->send();   
            print_r("Please Activate your Account from Mail") ;
            } 
        
        
        return $this->render('register', [
            'model' => $registermodel,
            ]);
        
    }
    // send mail
    public function SendMail ($email , $token)
    { 
            Yii::$app->mailer->compose('@common/mail/template', ['token' => $token])
            ->setFrom('abeer.s.m.93@gmail.com')
            ->setTo($email)
            ->setSubject('Verification')
            ->send();                    
    }
    //activateMail
    public function actionActivate($token)
    {
        $usermodel = UserInfo::find()->where(['token'=>$token])->one();
        if($usermodel)
        {
            $usermodel->is_active =1;
            $usermodel->save();
            print_r("Your Acount has been Activated Successfully") ;
        }
        else
        {
            print_r("Error Activation") ;
        }
        
        }
    // Login
    public function actionLogin()
    {
         
        $loginmodel = new UserInfo();
         if ($loginmodel->load(Yii::$app->request->post()))
             {
                $user = UserInfo::find()->where(['email'=>$loginmodel->email])->one();
                if($user&&$user->password==$loginmodel->password)
                {
                    $session = Yii::$app->session;
                    $session->set('id', $user->id) ;
                return $this->redirect(['userhome']);
                }
                else
                {
                    return $this->render('login',['model'=>$loginmodel ,'error'=>'inValid Mail or Password']);
                            
                }
            }
         else 
             return $this->render('login', [
            'model' => $loginmodel,
        ]);
        
    }
    public function actionUserhome()
    {
        $homemodel = new UserInfo() ;
        $session = Yii::$app->session ;
        $session->get('id');
        return $this->render('userhome', [
            'model' => $homemodel,'id'=>$homemodel->id
        ]);      
    }
    public function actionForgetpassword()
            
    {
        $model = new UserInfo() ;
        if($model->load(Yii::$app->request->post()))
            {
            $user = UserInfo::find()->where(['email'=>$model->email])->one() ;
            if($user)
                {
                UserController::$resettoken = bin2hex(openssl_random_pseudo_bytes(16));
                $session = Yii::$app->session ;
                $session->set('email', $model->email) ;
                    Yii::$app->mailer->compose()->setTextBody(UserController::$resettoken)
                    ->setFrom('abeer.s.m.93@gmail.com')
                    ->setTo($user->email)
                    ->setSubject('resetPassword')
                    ->send();
                    $this->redirect(['reset']) ;
                }
            else
                 {
                    print_r("Not Valid Mail");  
                 }
                 }
           
        return $this->render('forgetpassword', [
            'model' => $model,
        ]); 
    }
    public function actionReset()
    {
        $model = new UserInfo() ;
        if($model->load(Yii::$app->request->post()))
                {
           
                 if($model->token==UserController::$resettoken)
                  {
                   $this->redirect(['login']);
                  }
                  else  $this->redirect(['password']);
                }
         else       
        return $this->render('reset', [
            'model' => $model,
        ]); 
        
        
    }
    public function actionPassword()
            {
        $model = new UserInfo();
        if($model->load(Yii::$app->request->post()))
        {
            $session = Yii::$app->session ;
            $mail = $session->get('email') ;
            $user = UserInfo::find()->where(['email'=>$mail])->one();
            
            
            $user->password = $model->password ;
            $user->save() ;
            $this->redirect(['login']);
        }
         return $this->render('password', [
            'model' => $model,]); 
            }
    
}

