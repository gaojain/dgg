<?php

namespace app\station\controller;

use think\Controller;
use think\Config;
use think\Session;

class Base extends Controller
{
    public function _initialize()
    {
        if (time() - Session::get('logintime') > Config::get("session.expire")) {
            $http = $_SERVER['HTTP_HOST'] . '/station/login';
            echo "<script>top.location.href=" . $http . "</script>";
        }
        $admin_nav = Config::get('admin_nav');
        $this->assign('admin_nav', $admin_nav);
        parent::_initialize();
    }
}
