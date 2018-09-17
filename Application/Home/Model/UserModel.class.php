<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2017/11/9
 * Time: 10:11
 */

namespace Home\Model;

use Think\Model;
class UserModel extends model{
    //设置真正的表单名称
//    protected $trueTableName   =   'tp_user';
//项目需要
    protected $trueTableName   =   'user';

    //定义一个reg的方法实现数据在数据库中的添加操作
//     public function reg($data){
//         $user=M('user','tp_');
//         $user->add($data);
//     }

    //隐藏数据库字段名，实现映射
//    protected $_map=array(
//        'username'=>'uloginname',//把表单中username映射到数据表的unama字段
//        'userpwd'=>'ulgongpwd',//把表单中username映射到数据表的unama字段
//        'usersex'=>'usex',//把表单中username映射到数据表的unama字段
//    ) ;

    //    array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间]),
    protected $_validate = array(
        array('uname','require','用户名必须拥有！'), //默认情况下用正则进行验证
        array('uname','','帐号名称已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
        //最后的3位默认值，可以不写（self::MODEL_BOTH或者3全部情况下验证（默认））
        array('upwd','6,30','密码不正确，长度应为6-30！',1,'length',3), //默认情况下用正则进行验证
        array('ubirthday','/^\d{4}\-\d{1,2}-\d{1,2}$/','出生年月格式错误！'),
        array('usex',array('男','女'),'性别不符合标准！',1,'in'), // 当值不为空的时候判断是否在一个范围内
        array('umobile','cheakPhone','电话格式不正确',1,'callback'), // 自定义函数验证电话号码格式
        array('uemail','email','Email格式错误！',2), // 如果输入则验证Email格式是否正确
    );
        //自定义一个验证电话号码的函数
        function cheakPhone($info){
            $i="/^1[3456789][0-9]{9}$/";
            if(preg_match($i,$info)){
                return true;
            }else{
                return false;
            }
        }
        //定义自动完成字段值
    protected $_auto=array(
        array('upwd','password',3,'callback'),
        array('uregtime','time',1,'callback'),
        array('ulastupdatetime','time',3,'callback'),

    );
    //密码的自动加密
    public function password($upwd){
        return password_hash($upwd, PASSWORD_BCRYPT);
    }
    public function time($time){
        return $time=date('Y-m-d H:i:s',time());
    }

} 