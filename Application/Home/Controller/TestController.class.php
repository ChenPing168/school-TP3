<?php
/**
 * Created by PhpStorm.
 * User: fu
 * Date: 2017/11/7
 * Time: 10:57
 */
// 这里是控制器统一默认的命名空间
namespace Home\Controller;
// 这里是加载指定命名空间下的操作类（控制器的统一父类Controller）
use Think\Controller;
//  控制器名称标准：   在名称后面必须加上Controller，成为对应定义的控制器类的类名
class TestController extends Controller{
    /**
     * 首页显示
     */
    public function index(){
        if(file_exists(HTML_PATH.'realindex.html')){//file_exists检查文件是否存在
            if(time()-filemtime(HTML_PATH.'realindex.html')<=600)//filemtime() 函数返回文件内容上次的修改时间。
                $this->display(HTML_PATH."realindex.html");
            else
                $this->createIndex();//调用(将首页生成为一个静态页面)的函数
        }else{
            $this->createIndex();
        }
    }
    /**
     * 将首页生成为一个静态页面
     */
    private function createIndex(){
        $user = M('user');
        $uid = $_SESSION['uid'];
        $blog = M('blog');
        $fenlei = M('blogclass');
        $i = $user->where("uid=$uid")->find();
        $datas = $blog->table('blog b,user u')->where("b.uid=u.uid and bisvalid=1")
            ->limit(0, 10)->select();
        $data = $fenlei->select();
        //统计阅读量
        $yueduliang = $blog->table('blog b,userblog ub')->where("b.bid=ub.bid and ub.isvalid=1")
            ->field('b.bid,b.bbiaoti,count(ub.bid) ubnum')->group('b.bid')->order('ubnum desc')->select();
        //统计评论量
        $pinglunliang = $blog->table('pinglun p,blog b')->where("p.bid=b.bid and p.pstatus=1 and p.pisvalid=1 ")
            ->field('b.bid,b.bbiaoti,count(p.pid) pnum')->group('b.bid')->order('pnum desc')->select();
        $this->assign('name', $i['uloginname']);
        $this->assign('data', $datas);
        $this->assign('fenlei', $data);
        $this->assign('yueduliang', $yueduliang);
        $this->assign('pinglunliang', $pinglunliang);
        $this->buildHtml("realindex.html", '', 'blogs/index');
        $this->display('blogs/index');
    }
    /**
     *  http://www.testtp.cn/index.php/Home/Test/test
     */
//打开登录注册页面
    public function loginAndReg()
    {
        $this->display('blogs/loginAndReg');
    }

    /**
     * 用户登陆验证
     */
    public function panduanlog()
    {
        $user = M('user');
        $uname = I('POST.username');
        $userpwd = I('POST.userpwd');
        $info = $user->where("uloginname='$uname'and uisvalid='1' ")->find();
        if (count($info) > 0) {
            if (password_verify($userpwd, $info['ulgongpwd'])) {
                session('uname', $uname);
                session('uid', $info['uid']);
                $this->success("登录成功！", U('index'), 5);
            } else {
                $this->error("密码错误或验证码错误！", U('loginAndReg'), 1);
            }
        }
    }

//打开首页
//    public function index()
//    {
//        $user = M('user');
//        $uid = $_SESSION['uid'];
//        $blog = M('blog');
//        $fenlei = M('blogclass');
//        $i = $user->where("uid=$uid")->find();
//        $datas = $blog->table('blog b,user u')->where("b.uid=u.uid and bisvalid=1")->limit(0, 10)->select();
//        $data = $fenlei->select();
//        //统计阅读量
//        $yueduliang = $blog->table('blog b,userblog ub')->where("b.bid=ub.bid and ub.isvalid=1")
//            ->field('b.bid,b.bbiaoti,count(ub.bid) ubnum')->group('b.bid')->order('ubnum desc')->select();
//        //统计评论量
//        $pinglunliang = $blog->table('pinglun p,blog b')->where("p.bid=b.bid and p.pstatus=1 and p.pisvalid=1 ")
//            ->field('b.bid,b.bbiaoti,count(p.pid) pnum')->group('b.bid')->order('pnum desc')->select();
//        $this->assign('name', $i['uloginname']);
//        $this->assign('data', $datas);
//        $this->assign('fenlei', $data);
//        $this->assign('yueduliang', $yueduliang);
//        $this->assign('pinglunliang', $pinglunliang);
//
//        $this->buildHtml("realindex.html", '', 'test');
//        $this->display('blogs/index');
//
//    }


//判断注册
    public function panduanreg()
    {
        $user = D('user');
        if ($user->create()) {
            $user->add();
            $this->success("注册成功！", U('loginAndReg'), 5);
        } else {
            $this->error("注册失败");
        }
    }

//搜索
    public function sousuo()
    {
        $user = M('user');
        $blog = M('blog');
        $add = I('post.sousuo');
        $uid = $_SESSION['uid'];
        //个人信息
        $re = $user->where("uid='$uid' and uisvalid='1'")->find();
        $sousuocontent = $blog->table('blog b,user u')
            ->where("b.`uid`=u.uid AND b.`bbiaoti` LIKE '%$add%' OR u.uname LIKE '%$add%'")
            ->field('*')->select();
        $this->assign('sousuocontent', $sousuocontent);
        $this->assign('re', $re);
        $this->display('blogs/sousuo');
    }

//用户信息
    public function userinfo()
    {
        if (I('caozuo') == '') {
            $user = M('user');
            $data = $user->where("uisvalid='1' AND uid={$_SESSION['uid']}")->find();
            $this->assign('caozuo', 0);
            $this->data = $data;
        } //得到个人信息
        elseif (I('caozuo') == 1) {
            $user = M('user');
            $data = $user->where("uisvalid='1' AND uid={$_SESSION['uid']}")->find();
            $this->assign('caozuo', 1);
            $this->data = $data;
        } //修改密码
        elseif (I('caozuo') == 2) {
            $user = M('user');
            $data = $user->where("uisvalid='1' AND uid={$_SESSION['uid']}")->find();
            $this->assign('caozuo', 2);
            $this->data = $data;
        } //我的博客
        elseif (I('caozuo') == 3) {
            $blog = M('blog');
            $data = $blog->where("bisvalid='1' AND bstatus='1' 
        AND uid={$_SESSION['uid']}")->select();
            $this->assign('caozuo', 3);
            $this->data = $data;
        } //    我的评论
        elseif (I('caozuo') == 4) {
            $i = $_SESSION['uid'];
            $user = M('pinglun');
            $data = $user->table('user u,pinglun p,blog b')->
            where(" b.bid=p.bid AND b.uid=u.uid AND p.uid='$i'
        AND p.pstatus='1' AND p.pisvalid='1'")->
            field("b.bbiaoti,u.uname,p.ptime,p.pcontent,b.bneirong,b.bid")
                ->select();
            $this->assign('caozuo', 4);
            $this->data = $data;
        } //我的浏览
        elseif (I('caozuo') == 5) {
            $i = $_SESSION['uid'];
            $user = M('pinglun');
            $data = $user->table('blog b,userblog us')->
            where(" b.bid=us.bid AND us.uid='$i' AND us.isvalid='1'")->
            order('us.readtime desc')
                ->field("b.bid,b.bbiaoti,b.bneirong,us.readtime,b.bid")
                ->select();
            $this->assign('caozuo', 5);
            $this->data = $data;
        } //发表博客
        elseif (I('caozuo') == 6) {
            $blogclass = M('blogclass');
            $select = $blogclass->select();
            $this->assign('select', $select);
            $this->assign('caozuo', 6);

        }
        $this->display('blogs/userinfo');
    }

//    修改资料
    public function xiugaiziliao()
    {
        $user = D('user');
        $uid = $_SESSION['uid'];
        $date = I('post.');
        $date['ulastupdatetimt'] = date("Y-m-d H:i:s,", time());
        $in = $user->where("uid=$uid")->save($date);
        if ($in == 1) {
            $this->success("修改成功！", U('loginAndReg'), 5);
        } else {
            $this->error('写入错误！');
        }
    }
//修改密码
    public function updatemima()
    {
        $user = M('user');
        $jiu = I('post.jiumima');
        $uid = $_SESSION['uid'];
        $re = $user->where("uisvalid='1' and uid=$uid")->find();
        $date['ulgongpwd'] = password_hash(I('post.ulgongpwd'), PASSWORD_BCRYPT);
        dump($date['ulgongpwd']);
        if (password_verify($jiu, $re['ulgongpwd'])) {
            $user->where("uid=$uid")->save($date);
            $this->success("修改成功", 'loginAndReg', 200);
        } else {
            $this->error('旧密码不正确', "", 2);
        }
    }

//我的博客
    public function blog()
    {
        $user = M('blog');
        $pinglun = M('pinglun');
        $bid = I('GET.bid');
        //浏览量
        $this->liulanliang($bid);
        //计算评论量
        $num = $pinglun->where("bid=$bid and pisvalid=1")->count();
        //连表查询输出博客
        $data = $user->table('blog b,user u')->where("b.uid=u.uid and bisvalid=1 and bid=$bid")->find();
        //连表查询输出博客的评论内容
        $ping = $pinglun->table('pinglun p,user u')->where("p.uid=u.uid and pisvalid=1 and p.bid=$bid")->select();

        $this->assign('uname', $_SESSION['uname']);
        $this->assign('pinglun', $ping);
        $this->assign('num', $num);
        $this->assign('data', $data);
        $this->display('blogs/blog');
    }

    /**
     * 写入浏览量数据的函数方法
     * @param $bid    对应浏览的博客序号
     */
    private function liulanliang($bid)
    {

        $userid = session('uid');

        $userblog = M('userblog');
        $data = array(
            'bid' => $bid,
            'ip' => $_SERVER['REMOTE_ADDR']  // 浏览当前页面的用户的 IP 地址
        );
        // 写入对应的浏览数据
        if (isset($userid)) { // 有登录信息则记录登录用户的浏览记录
            $data['uid'] = $userid;

            // 查询看当前用户是否已经浏览过了本篇博客
            $info = $userblog->where("bid=$bid and uid=$userid")->find();
            if ($info) {  // 有值说明以前已经浏览过了，所以只记录而不作为新的浏览量数据
                $data['isvalid'] = 0;
            } else {
                $data['isvalid'] = 1;
            }

        } else { // 没有登录的浏览记录
            $data['uid'] = -1;  //  uid为-1代表是未登录的用户
            // 查看当前IP地址的前24小时内是否有过有效的浏览记录
            $info = $userblog
                ->where("bid=$bid and uid=-1 and ip='{$data['ip']}' and isvalid=1 and readtime>=DATE_ADD(NOW(), INTERVAL -1 DAY)")
                ->find();
            if ($info) {  // 有值说明有有效浏览记录，所以只记录而不作为新的浏览量数据
                $data['isvalid'] = 0;
            } else {
                $data['isvalid'] = 1;
            }
        }
        $data['readtime'] = date('Y-m-d H:i:s');
//        写入浏览数据
        $userblog->add($data);
    }

// 博客列表
    public function blogsList()
    {
        $blog = M('blog');
        $this->assign('uname', $_SESSION['uname']);//把$_SESSION里面的值传到blogsList页面
        $bcid = I('get.bcid');//shou导航条数据值
        if ($bcid) {
            $count = $blog->where("bcid='$bcid'")->count();
            $page = new \Think\Page($count, 1);
            $page->setConfig('prev', '上一页');
            $page->setConfig('next', '下一页');
            $page->setConfig('header', '');
            $show = $page->show();
            $data = $blog->where("bcid='$bcid'")->limit($page->firstRow . ',' . $page->listRows)->select();
            $this->assign('page', $show);
            $this->totalRows = $page->totalRows;
            $this->assign("data", $data);
            $this->assign('bcid', 1);
            $this->display('blogs/blogsList');
        }
    }

    //评论
    public function pinglun()
    {

        $pinglun = M('pinglun');
        $data['uid'] = $_SESSION['uid'];
        $data['bid'] = I('bid');
        $data['pcontent'] = I('post.neirong');;
        $data['ptime'] = date('Y-m-d H:i:s', time());
        dump($data);
        if ($pinglun->add($data)) {

            $this->success("评论成功！", '', 500);
        } else {
            $this->error('评论失败', '', 3);
        }

    }

    //发表博客
    public function fabuboke()
    {
        $bg = M('blog');
        $data['bcid'] = I('post.blogclass');
        $data['uid'] = $_SESSION['uid'];
        $data['bbiaoti'] = I('post.bittle');
        $data['bneirong'] = I('post.pcontent');
        $data['bchuangjian'] = date('Y-m-d H:i:s', time());
        $data['btime'] = date('Y-m-d H:i:s', time());
        $data['blastupdatetime'] = date('Y-m-d H:i:s', time());
        $data['bstatus'] = I('post.zhuangtai');
        if ($bg->add($data)) {
            redirect(U("userinfo?caozuo=3"));
        } else {
            $this->error("发布失败", '', 1);
        }
    }

    //删除博客
    public function shanchuboke(){
        $user = M('blog');
        $bid = I('get.bid');
       $date['bisvalid']='0';
       $bokecontent=$user->where("bid='$bid' and bisvalid='1'")->save($date);
       if($bokecontent){
           redirect(U("userinfo?caozuo=3"));
       }else{
           $this->error("删除失败", '', 44);
       }
    }

    //修改博客_显示
    public function xiugaiboke_XS(){
        $blog= D('blog');
        $blogclass = M('blogclass');
        $select = $blogclass->select();
        $bid=I('bid');
        $data = $blog->where("bisvalid='1' AND bstatus='1' and bid='$bid'
        AND uid={$_SESSION['uid']}" )->select();
        $this->assign('select', $select);
        $this->assign("data", $data);
        $this->display('blogs/xiugaiblog');
    }

    //修改博客_确认
    public function xiugaiboke_QR(){
        $blog = M('blog');
        $bid= I('get.bid');
        $data['uid'] = $_SESSION['uid'];
        $data['bcid'] = I('post.blogclass');
        $data['bbiaoti'] = I('post.bittle');
        $data['bneirong'] = I('post.pcontent');
        $data['btime'] = date('Y-m-d H:i:s', time());
        $data['blastupdatetime'] = date('Y-m-d H:i:s', time());
        $data['bstatus'] = I('post.zhuangtai');
        $a=$blog->where("bid=$bid")->save($data);
        if ($a) {
            redirect(U("userinfo?caozuo=3"));
        } else {
            $this->error("修改失败", '', 1222);
        }
    }
    //阅读更多
    public function yuedugengduo(){

        }

//退出
    public function logout()
    {
        $_SESSION = array(); //清除SESSION值.
        $this->display('blogs/loginAndReg');
    }
}