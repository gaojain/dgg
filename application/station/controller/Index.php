<?php
namespace app\station\controller;
use think\Controller; 
use think\Config;
class Index extends Base
{
    public function index()
    {
    	
        return $this -> fetch();
    }
}
