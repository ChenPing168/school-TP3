<?php
/**
 * Created by PhpStorm.
 * User: fu
 * Date: 2017/11/20
 * Time: 10:27
 * version: 1.0.0.1
 */

namespace Home\Controller;
use Think\Controller;
use Think\Model;

class UserController extends Controller
{
    //打开登录页面
    public function login()
    {
        $this->display("BTP/login");
    }
    // 检测输入的验证码是否正确，$code为用户输入的验证码字符串
    function check_verify($code, $id = ''){
        $verify = new \Think\Verify();
        return $verify->check($code, $id);
    }
    //用户登录判定
    public function Userlogin_yanzheng()
    {
        $user = D('user');
        $uname = I("post.uname");
        $upwd = I("post.upwd");
        $Useryanzhengma = I("post.Useryanzhengma");
//判断验证码是否正确
        $istrue = $this->check_verify($Useryanzhengma);
// 把查询条件传入查询方法
        $info = $user->where("uname='$uname' and uisvalid='1'")->find();
//如果在数据库中找到有效的用户名则进行下列的密码判断
//        $this->data = $info;
        session('uid', $info['uid']);
        session('uname', $info['uname']);
        if (count($info) > 0) {
            if (password_verify($upwd, $info['upwd']) && $istrue) {
                redirect(U('Btp/Index'));
//                $this->success("登录成功！", U('Btp/Index'), 115);
            } else {
                $this->error("密码错误或验证码错误！", U('user/login'), 115);
            }
        }
    }
     //管理员登录判定
    public function Adminlogin_yanzheng()
    {
        $admin = D('admin');
        $aname = I("post.aname");
        $apwd = I("post.apwd");
        $Adminyanzhengma = I("post.Adminyanzhengma");
//判断验证码是否正确
        $istrue = $this->check_verify($Adminyanzhengma);
// 把查询条件传入查询方法
        $info = $admin->where("aname='$aname' and aisvalid='1'")->find();

//如果在数据库中找到有效的用户名则进行下列的密码判断
        session('aid', $info['aid']);
        if (count($info) > 0) {
            if (password_verify($apwd, $info['apwd']) && $istrue) {
                redirect(U('project/guanliyuan'));
//                $this->success("登录成功！", U('project/guanliyuan'), 115);
            } else {
                $this->error("密码错误或验证码错误！", U('user/login'), 115);
            }
        }
    }
    //验证码
    public function yanzhengma()
    {
        $Verify = new \Think\Verify();
        $Verify->fontttf='msyhl.ttc';
        $Verify->length = 4;
        $Verify->useZh = true;
        $Verify->entry();

//        $Verify = new \Think\Verify();
//        $Verify->fontttf='msyhl.ttc';
//        $Verify->useZh = true;
//        $Verify->entry();
    }
    //打开User注册页面
    public function Userregister()
    {
        $this->display("User/Userregister");
    }
    //注册User个人信息
    public function Userregister_zhuce()
    {
        $user = D('user');
        $date=I('post.');
        if ($user->create()) {
            $user->add();
            $this->success("注册成功！", U('User/login'), 115);
        } else {
            $this->error($user->getError(),'','115');
        }
    }
//    用户信息+操作
    public function xinxi(){
        //接收get传过来的值
        $i = I('get.cao');
        //判断该执行什么操作
        if ($i == 0) {   //显示个人信息
            $user = M('user');
            $uid = session('uid');
            $date = $user->where("uid='$uid'")->find();
            $this->assign('date',$date);

        } elseif ($i == 1) {   //显示需要修改的个人信息
            $user = M ('user');
            $uid = session('uid');
            $date = $user->where("uid='$uid'")->find();
            $this->assign('date',$date);
        } elseif ($i == 2) {   //显示个人笔记
            $user = M('user');
            $biji = M('biji');
            $uid = session('uid');
            $date = $user->where("uid='$uid'")->find();
            $data = $biji ->table('biji bj,user u,zhishi zs,sclass sc,bclass bc')-> where("bj.uid=u.uid and bj.zid=zs.zid and zs.sid=sc.sid and sc.bid=bc.bid and bisvalid=1 and zisvalid=1 and bj.uid='$uid'")->select();

//            dump($data);
            if(strlen($uid)>0){
                $bjnum = M('biji')->where("uid=$uid")->count();
            }else{
                $bjnum = M('biji')->where("uid=$uid")->count();
            }
            $this->bjnum = $bjnum;
            $this->assign('data', $data);// 赋值数据集
            $this->assign('date', $date);// 赋值数据集
        } elseif ($i == 3) {  //显示所有的笔记
            $user = M('user');
            $biji = M('biji');
            $zhishi = M('zhishi');
            $uid = session('uid');
            $date = $user->where("uid='$uid'")->find();
            $data = $biji ->table('biji b,user u,zhishi zs')-> where("b.uid=u.uid and b.zid=zs.zid and bisvalid=1 and zisvalid=1 and b.uid='$uid'")->select();
            $info = $zhishi->table('biji b,user u,zhishi zs')->where("b.uid=u.uid and b.zid=zs.zid and bisvalid=1 and zisvalid=1 and b.uid='$uid'")->select();

            $count = $biji->where("bisvalid=1")->count();//查询满足要求的总记录数  449
            $Page = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数
            $p=1;
            if(isset($_GET['p'])) $p=$_GET['p'];
            $show = $Page->show();// 分页显示输出
            $list = $biji->table('biji b,user u,zhishi zs')->
            where("b.uid=u.uid and b.zid=zs.zid  and bisvalid=1 and zisvalid=1 and b.uid='$uid'")->
            order('bid')->page($p.',5')->select();
            $this->assign('list', $list);// 赋值数据集
            $this->assign('page', $show);// 赋值分页输出

            if(strlen($uid)>0){
                $bjnum = M('biji')->where("uid=$uid")->count();
            }else{
                $bjnum = M('biji')->where("uid=$uid")->count();
            }
            $this->bjnum = $bjnum;
            $this->assign('data', $data);// 赋值数据集
            $this->assign('date', $date);// 赋值数据集
            $this->assign('info', $info);// 赋值数据集

        }elseif ($i == 4) {
            $user = M('user');
            $biji = M('biji');
            $zhishi = M('zhishi');
            $uid = session('uid');
            $date = $user->where("uid='$uid'")->find();
            $data = $biji ->table('biji b,user u,zhishi zs')-> where("b.uid=u.uid and b.zid=zs.zid and bisvalid=1 and zisvalid=1 and b.uid='$uid'")->select();
            $info = $zhishi->table('biji b,user u,zhishi zs')->where("b.uid=u.uid and b.zid=zs.zid and bisvalid=1 and zisvalid=1 and b.uid='$uid'")->select();

            $count = $biji->where("bisvalid=1")->count();//查询满足要求的总记录数  449
            $Page = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数
            $p=1;
            if(isset($_GET['p'])) $p=$_GET['p'];
            $show = $Page->show();// 分页显示输出
            $list = $biji->table('biji b,user u,zhishi zs')->
            where("b.uid=u.uid and b.zid=zs.zid  and bisvalid=1 and zisvalid=1 and b.uid='$uid'")->
            order('bid')->page($p.',5')->select();
            $this->assign('list', $list);// 赋值数据集
            $this->assign('page', $show);// 赋值分页输出

            if(strlen($uid)>0){
                $bjnum = M('biji')->where("uid=$uid")->count();
            }else{
                $bjnum = M('biji')->where("uid=$uid")->count();
            }
            $this->bjnum = $bjnum;
            $this->assign('data', $data);// 赋值数据集
            $this->assign('date', $date);// 赋值数据集
            $this->assign('info', $info);// 赋值数据集
        }elseif ($i == 5) {
            $user = M ('user');
            $uid = session('uid');
            $date = $user->where("uid='$uid'")->find();
            $this->assign('date',$date);
        }
        $this->assign('cao',$i);
        $this->display();
    }

//删除笔记
    public function shanchu(){
        $bid=I('bid');
        dump($bid);
        $bj=M('biji');
        $sc=$bj->where("bid='$bid'")->delete();
        if ($sc){
//            redirect(U('BTP/xinxi'));
            $this->success('删除成功','',30);
        }
        else{
            $this->error('失败','',30);
        }
    }

    //修改资料
    public function xiugaiziliao(){
        $user = D('user');
        $uid = $_SESSION['uid'];
        $date = I('post.');
        $date['ulastupdatetime'] = date("Y-m-d H:i:s", time());
//        $date = date("Y-m-d H:i:s,", time());
        $in = $user->where("uid=$uid")->save($date);
        if ($in == 1) {
            $this->success("修改成功！", U('xinxi'), 5);
        } else {
            $this->error('写入错误！');
        }
    }
//修改密码
    public function xiugaimima(){
        $user = D('user');
        $uid = $_SESSION['uid'];
        $upwd = I('post.upwd');
        $date = I('post.');
        $date['ulastupdatetime'] = date("Y-m-d H:i:s", time());
//        $date = date("Y-m-d H:i:s,", time());
        $date['upwd'] = password_hash($upwd, PASSWORD_BCRYPT);
        $in = $user->where("uid=$uid")->save($date);
        if ($in == 1) {
            $this->success("修改成功！", U('login'), 5);
        }else {
            $this->error('写入错误！');
        }
    }
    public function Userregister_zhuce1()
    {
        $user = D('user');
        $date=I('post.');
        if ($user->create()) {
            $user->add();
            $this->success("注册成功！", U('User/login'), 115);
        } else {
            $this->error($user->getError(),'','115');
        }
    }


//    修改笔记
    public function xiugaibiji(){
        $user = D('biji');
        $bid=I('post.bid');
        $date=I('post.');
        $date['blastupdatetime'] = date("Y-m-d H:i:s", time());
        $in = $user->where("bid=$bid")->save($date);
        if ($in == 1) {
            $this->success("修改成功！", U('xinxi'), 5);
        } else {
            $this->error('写入错误！');
        }

    }



//退出
    public function logout()
    {
        $_SESSION = array(); //清除SESSION值.
        $this->display('BTP/login');
    }








    //显示用户修改个人资料界面
    public function update()
    {
        $user = M('user', 'tp_');
        $uid = $_SESSION['uid'];

        $i = $user->where("uid=$uid")->select();

        $this->assign('name', $i[0]['uname']);
        $this->assign('mobile', $i[0]['umobile']);
        $this->assign('nichen', $i[0]['unichen']);
        $this->assign('gender', $i[0]['usex']);
        $this->display('update');
    }

    public function xiugai()
    {
        $user = M('user', 'tp_'); // 实例化User对象
        // 要修改的数据对象属性赋值\
        $data['uid'] = $_SESSION['uid'];
        $data['uname'] = I("post.uname");
        $data['unichen'] = I("post.unichen");
        $data['umobile'] = I("post.umobile");
        $data['usex'] = I("post.ugender");
        $user->save($data); // 根据条件更新记录
        if (count($user) > 0) {
            $this->success("修改成功！", U('userinfo'), 5);
        } else {
            $this->error("修改错误！", U('update'), 115);
        }
    }

    public function lianxiren()
    {
        $User = M('lianxi', 'tp_');
// 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
        $list = $User->order('id')->page($_GET['p'] . ',2')->select();
//    dump($User);
        $this->assign('list', $list);// 赋值数据集
        $count = $User->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count, 2);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show();// 分页显示输出

        $this->assign('page', $show);// 赋值分页输出

        $this->display('lianxiren'); // 输出模板

    }

    public function uplook()
    {
        $this->display('uplook');
    }

    //增加联系人信息
    public function add()
    {
        $user = D('Lian');
        if ($user->create()) {
            $user->add();
            $this->success("增加成功！", U('userinfo'), 5);
        } else {
            $this->error($user->getError(), "userinfo", 6);
        }

    }

    //提取要修改的联系人信息
    public function gai()
    {
        $user = M('lianxi', 'tp_');
        $id = I('GET.id');
        session('id', $id);
        $info = $user->where("id=$id")->find();
//        dump($info);
        $this->assign('name', $info['name']);
        $this->assign('sex', $info['sex']);
        $this->assign('mobile', $info['mobile']);
        $this->assign('email', $info['email']);
        $this->assign('gongsi', $info['gongsi']);
        $this->display('gai');
    }

    //修改联系人信息
    public function gai2()
    {
        $user = M('lianxi', 'tp_'); // 实例化User对象
        // 要修改的数据对象属性赋值\

        $id = $_SESSION['id'];

        $data['name'] = I("post.name");

        $data['sex'] = I("post.sex");

        $data['mobile'] = I("post.mobile");

        $data['email'] = I("post.email");

        $data['gongsi'] = I("post.gongsi");

        $user->where("id=$id")->save($data); // 根据条件更新记录
//        dump($user);
        if (count($user) > 0) {
            $this->success("修改成功！", U('userinfo'), 5);
        } else {
            $this->error("修改错误！", U('update'), 115);
        }
    }

    //修改用户头像信息
    public function upphoto()
    {
//        echo $_SESSION['uid'];
        $this->display('upphoto');

    }
    //文件上传
    public function upload(){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 3145728 ;// 设置附件上传大小
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath = './Public/image/'; // 设置附件上传根目录
        $upload->savePath = ''; // 设置附件上传（子）目录
        // 上传文件
        $info = $upload->upload();
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else{// 上传成功
            foreach($info as $file){

                session('lujing','/Public/image/'.$file['savepath'].$file['savename']) ;
            }
            $user=M('user','tp_');
            $id = $_SESSION['uid'];
            $data['uphoto']=$_SESSION['lujing'];
//            echo $data['uphoto']=$_SESSION['lujing'];
            $user->where("uid=$id")->save($data); // 根据条件更新记录
            $this->success('上传成功！', U('userinfo'), 5);
        }
    }
    //
    public function tupian(){
        $this->display('tupian');
    }
    //批量上传多个文件
    public function ceishi(){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 3145728 ;// 设置附件上传大小
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath = './Public/image/'; // 设置附件上传根目录
        $upload->savePath = ''; // 设置附件上传（子）目录
        // 上传文件
        $info = $upload->upload();

        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else{// 上传成功
            foreach($info as $file){
//               $i= round(0-10000);
                $i=date('YmdHis',time());
                $user = M('img','tp_');
                session('lujing','/Public/image/'.$file['savepath'].$file['savename']) ;
                $data['lujing']=$_SESSION['lujing'];
                //实例化图片类
                $image = new \Think\Image();
                $image->open('.'.$data['lujing']);
//     缩略图片并进行水印
                $image->thumb(320, 240)->text('lovo',LIB_PATH.'/Think/Verify/ttfs/2.ttf',22,'#000000'
                    ,\Think\Image::IMAGE_WATER_SOUTHEAST)->save(' /public/jinhu'.$i.'.jpg');
                $user->add($data);
            }
            $this->success('上传成功！', U('userinfo'), 5);
        }
    }

    //显示showUserByAjax网页页面
    public function showUserByAjax(){
        $user=M('user','tp_');
        //第一条查询语句
        $data=$user->where('uisvalid=1')->limit(0,4)->select();
        //总的数量
        $count=$user->where('uisvalid=1')->count();
        $i=$count-4;
        //第二条查询语句
        $data1=$user->where('uisvalid=1')->limit(4,$i)->select();
        $this->assign('data',$data);
        $this->assign('data1',$data1);
//            dump( $this->assign('data',$data));
        if(isset($_GET['id'])) {
            $id=$_GET['id'];
            $datas = $user->where("uid=$id")->find();

//                dump($datas);
            $this->assign('datas', $datas);
        }
        $this->display();
    }

    public function panduanlog(){
        echo 'dsabdkjask';
    }
}