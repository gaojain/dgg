<?php
/**
 * Created by PhpStorm.
 * User: dgg
 * Date: 2018/8/28
 * Time: 12:31
 */
namespace app\common\model;

use think\Controller;
use think\Model;
use think\Db;
use think\Session;

class Admin extends Model{
    /**
     * @param $id
     * @return false|string
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * 根据电话获取管理员详细信息
     */
    public function getInfo($id){
        if (intval($id) <= 0){
            return json_encode(['code' => 210 , 'msg' => '参数不合法' , 'data' => array()]);
        }
        $info = $this -> where('admin_tel = '. $id) -> field('id,admin_name,admin_pass,admin_status') -> find();
        if ($info){

            return json_encode(['code' => 200 , 'msg' => '请求成功' , 'data' => $info]);
        }else{

            return json_encode(['code' => 200 , 'msg' => '请求成功' , 'data' => array()]);
        }
    }
    /**
     * @param $id
     * @return false|string
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * 根据id获取管理员详细信息
     */
    public function getInfoById($id){
        if (intval($id) <= 0){
            return json_encode(['code' => 210 , 'msg' => '参数不合法' , 'data' => array()]);
        }
        $info = $this -> where('id = '. $id) -> field('id,username,password,status,email,phone') -> find();
        return $info ? $info->toArray() : array();
    }
    /**
     * @return array|false|\PDOStatement|string|\think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * 获取管理员列表
     */
    public function getAdminList(){
        $list = $this -> where('status != 2') -> field('id,username,phone,join_time,status,email') -> select();
        
        return $list ? $list : array();
    }
}