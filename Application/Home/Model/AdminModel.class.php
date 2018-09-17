<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2017/12/3
 * Time: 14:55
 */

namespace Home\Model;

use Think\Model;
class AdminModel extends model
{
    //设置真正的表单名称
    protected $trueTableName   =   'Admin';
    protected $_validate = array(
        array('aname','require','用户名必须拥有！'), //默认情况下用正则进行验证
        array('aname','','帐号名称已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
        //最后的3位默认值，可以不写（self::MODEL_BOTH或者3全部情况下验证（默认））
        array('apwd','6,30','密码不正确，长度应为6-30！',1,'length',3), //默认情况下用正则进行验证
        array('abirthday','/^\d{4}\-\d{1,2}-\d{1,2}$/','出生年月格式错误！'),
        array('asex',array('男','女'),'性别不符合标准！',1,'in'), // 当值不为空的时候判断是否在一个范围内
        array('amobile','cheakPhone','电话格式不正确',1,'callback'), // 自定义函数验证电话号码格式
        array('aemail','email','Email格式错误！',2), // 如果输入则验证Email格式是否正确
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
        array('apwd','password',3,'callback'),
        array('aregtime','time',1,'callback'),
        array('alastupdatetime','time',3,'callback'),

    );
    //密码的自动加密
    public function password($upwd){
        return password_hash($upwd, PASSWORD_BCRYPT);
    }
    public function time($time){
        return $time=date('Y-m-d H:i:s',time());
    }

}