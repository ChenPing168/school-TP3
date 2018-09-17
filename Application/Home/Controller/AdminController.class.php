<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2017/12/2
 * Time: 17:23
 */

namespace Home\Controller;
use Think\Controller;

class AdminController extends Controller
{
    //打开管理员注册页面
    public function Adminregister()
    {
        $this->display("Admin/Adminregister");
    }

    //注册Admin个人信息
    public function Adminregister_zhuce()
    {
        $admin = D('admin');
        $date=I('post.');
        dump($date);

        if ($admin->create()) {
            $admin->add();
            $this->success("注册成功！", U('User/login'), 115);
        } else {
            $this->error($admin->getError(),'','115');
        }
    }
}