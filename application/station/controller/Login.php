<?php
/**
 * Created by PhpStorm.
 * User: dgg
 * Date: 2018/8/28
 * Time: 12:39
 */
namespace app\station\controller;

use think\Controller;
use app\common\model\Admin;
// use app\admin\controller\Base;
use think\Session;
use think\Config;
// use think\Url;
class Login extends Controller{
    public function index(){
        var_dump(md5('123456cf'));
//        http://www.dtls.net/gddj-m/captcha.html??
        # url::root('/gddj-m/');
        if (request() ->isPost()){
            $username = input('username' , '0');
            $model = new Admin;
            // halt(request() -> post());
            if(!captcha_check(input('code'))){
                return $this -> error('验证码错误');
            };
            $info = $model -> getInfo($username);
            $info = json_decode($info , true);
//            if ($info['status'] == 0 || $info['status'] == 2){
//                return $this -> error('您已被禁止登陆，请联系管理员');
//            }
//            halt($info);
            switch ($info['code']){
                case 210:
                    return $this -> error('您输入的不合法');
                    break;
                case 200:
                    if (empty($info['data'])){
                        return $this -> error('用户不存在');
                    }else{

                        $password = md5(input('password').Config::get('login.prefix'));
                        if ($password == $info['data']['admin_pass']){
                            Session::set('login_info' , array('id' => $info['data']['id'], 'username' => $info['data']['admin_name']));
                            Session::set('logintime' , time());
                            $this->redirect('index/index');
                        }else{
                            return $this -> error('账号或密码错误');
                        }
                    }
                    break;
            }
        }else{
            return $this -> fetch();
        }


    }
}