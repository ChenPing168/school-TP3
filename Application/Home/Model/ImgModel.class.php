<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2017/11/14
 * Time: 14:29
 */

namespace Home\Model;


use Think\Model;

class ImgModel extends Model{
    protected $trueTableName   =   'tp_img';
    protected $_validate = array(
        array('uname','require','用户名必须拥有！'), //默认情况下用正则进行验证

    );
} 