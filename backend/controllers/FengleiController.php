<?php
/**
 * 商城分类控制器
 * User: 卢猛
 * Date: 2015/1/29
 * Time: 16:11
 */

namespace app\controllers;
use Yii;
use yii\web\session;
use yii\web\Controller;
use app\models\User;
use app\models\UserForm;
use yii\web\NotFoundHttpException;


class FengleiController extends Controller{

    public function  actionIndex(){
		//
    }
	
	//增加test方法
	public function  actionTest(){
		echo 'text action';
	}

    /**
     * @验证码独立操作
     */

    public function actions(){
        return [

            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            'error'=>[
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }


    public function actionLogin()
    {
        $model = new UserForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                //验证通过，执行用户登录
                if($model->login()){
                    return $this->redirect(['admin/index/index',array('#1/2')]);
                }else{
                    return $this->render('login',['model'=>$model]);
                }

            }
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

} 