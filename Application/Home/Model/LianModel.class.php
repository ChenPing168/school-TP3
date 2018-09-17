<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2017/11/12
 * Time: 20:17
 */

namespace Home\Model;


use Think\Model;

class LianModel extends Model{
    protected $trueTableName   =   'tp_lianxi';

    //定义一个reg的方法实现数据在数据库中的添加操作
//     public function reg($data){
//         $user=M('user','tp_');
//         $user->add($data);
//     }


    //    array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间]),
    protected $_validate = array(
        array('name','require','用户名必须拥有！'), //默认情况下用正则进行验证
        array('name','','帐号名称已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
        //最后的3位默认值，可以不写（self::MODEL_BOTH或者3全部情况下验证（默认））
//        array('upwd','6,30','密码不正确，长度应为6-30！',1,'length',3), //默认情况下用正则进行验证
        array('sex',array('男','女'),'性别不符合标准！',1,'in'), // 当值不为空的时候判断是否在一个范围内
        array('mobile','cheakPhone','电话格式不正确',1,'callback'), // 自定义函数验证电话号码格式
    );
    //自定义一个验证电话号码的函数
    function cheakPhone($info){
        $i="/^1[34578][0-9]{9}$/";
        if(preg_match($i,$info)){
            return true;
        }else{
            return false;
        }

    }

}