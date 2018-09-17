<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller
{
    public function ueditup(){
        header("Content-Type: text/html; charset=utf-8");
        $editconfig = json_decode(preg_replace("/\/\*[\s\S]+?\*\//", "", file_get_contents(COMMON_PATH."Conf/ueditconfig.json")), true);
        //dump($editconfig);
        $action = I('get.action');
        //echo $action;
        switch ($action) {
            case 'config':
                $result =  json_encode($editconfig);
                break;

            /* 上传图片 */
            case 'uploadimage':
                $result = $this->editup('img');
                break;
            /* 上传涂鸦 */
            case 'uploadscrawl':
                $result = $this->editup('img');
                break;
            case 'uploadvideo':
                $result = $this->editup('video');
                break;
            case 'uploadfile':
                $result = $this->editup('file');
                //$result = include("action_upload.php");
                break;

            /* 列出图片 */
            case 'listimage':
                $result = $this->editlist('listimg');
                break;
            /* 列出文件 */
            case 'listfile':
                $result = $this->editlist('listfile');
                break;

            /* 抓取远程文件 */
            case 'catchimage':
                //$result = include("action_crawler.php");
                break;

            default:
                $result = json_encode(array(
                    'state'=> '请求地址出错'
                ));
                break;
        }

        /* 输出结果 */
        if (isset($_GET["callback"])) {
            if (preg_match("/^[\w_]+$/", $_GET["callback"])) {
                echo htmlspecialchars($_GET["callback"]) . '(' . $result . ')';
            } else {
                echo json_encode(array(
                    'state'=> 'callback参数不合法'
                ));
            }
        } else {
            echo $result;
        }

    }


    public function editup($uptype){
        if($this->islogin==false){
            $_re_data['state'] = '请登陆';
            return json_encode($_re_data);
        }
        $editconfig = json_decode(preg_replace("/\/\*[\s\S]+?\*\//", "", file_get_contents(COMMON_PATH."Conf/ueditconfig.json")), true);
        switch ($uptype) {
            case 'img':
                $upload = new \Think\Upload();// 实例化上传类
                $upload->rootPath  =     '.';
                $upload->maxSize   =     $editconfig['imageMaxSize'];
                $upload->exts      =     explode('.', trim(join('',$editconfig['imageAllowFiles']),'.'));
                $upload->savePath  =     $editconfig['imagePathFormat'];
                $upload->saveName  =     time().rand(100000,999999);
                $info   =   $upload->uploadOne($_FILES[$editconfig['imageFieldName']]);
                break;
            case 'file':
                $upload = new \Think\Upload();// 实例化上传类
                $upload->rootPath  =     '.';
                $upload->maxSize   =     $editconfig['fileMaxSize'];
                $upload->exts      =     explode('.', trim(join('',$editconfig['fileAllowFiles']),'.'));
                $upload->savePath  =     $editconfig['filePathFormat'];
                $upload->saveName  =     time().rand(100000,999999);
                $info   =   $upload->uploadOne($_FILES[$editconfig['fileFieldName']]);
                break;
            case 'video':
                $upload = new \Think\Upload();// 实例化上传类
                $upload->rootPath  =     '.';
                $upload->maxSize   =     $editconfig['videoMaxSize'];
                $upload->exts      =     explode('.', trim(join('',$editconfig['videoAllowFiles']),'.'));
                $upload->savePath  =     $editconfig['videoPathFormat'];
                $upload->saveName  =     time().rand(100000,999999);
                $info   =   $upload->uploadOne($_FILES[$editconfig['videoFieldName']]);
                break;
            default:
                return false;
                break;
        }

        if(!$info) {// 上传错误提示错误信息
            $_re_data['state'] = $upload->getError();
            $_re_data['url'] = '';
            $_re_data['title'] = '';
            $_re_data['original'] = '';
            $_re_data['type'] = '';
            $_re_data['size'] = '';
        }else{// 上传成功 获取上传文件信息
            $_re_data['state'] = 'SUCCESS';
            $_re_data['url'] = $info['savepath'].$info['savename'];
            $_re_data['title'] = $info['savename'];
            $_re_data['original'] = $info['name'];
            $_re_data['type'] = '.'.$info['ext'];
            $_re_data['size'] = $info['size'];
        }

        return json_encode($_re_data);

    }

    public function editlist($listtype){
        $editconfig = json_decode(preg_replace("/\/\*[\s\S]+?\*\//", "", file_get_contents(COMMON_PATH."Conf/ueditconfig.json")), true);
        switch ($listtype) {
            case 'listimg':
                $allowFiles = $editconfig['imageManagerAllowFiles'];
                $listSize = $editconfig['imageManagerListSize'];
                $path = $editconfig['imageManagerListPath'];
                break;

            case 'listfile':
                $allowFiles = $editconfig['fileManagerAllowFiles'];
                $listSize = $editconfig['fileManagerListSize'];
                $path = $editconfig['fileManagerListPath'];
                break;

            default:
                return false;
                break;
        }
        /* 获取参数 */
        $size = isset($_GET['size']) ? htmlspecialchars($_GET['size']) : $listSize;
        $start = isset($_GET['start']) ? htmlspecialchars($_GET['start']) : 0;
        $end = $start + $size;

        /* 获取文件列表 */
        $path = $_SERVER['DOCUMENT_ROOT'] . (substr($path, 0, 1) == "/" ? "":"/") . $path;

        $files = $this->getfiles($path, $allowFiles);

        if (!count($files)) {
            return json_encode(array(
                "state" => "no match file",
                "list" => array(),
                "start" => $start,
                "total" => count($files)
            ));
        }

        /* 获取指定范围的列表 */
        $len = count($files);
        for ($i = min($end, $len) - 1, $list = array(); $i < $len && $i >= 0 && $i >= $start; $i--){
            $list[] = $files[$i];
        }
        //倒序
        //for ($i = $end, $list = array(); $i < $len && $i < $end; $i++){
        //    $list[] = $files[$i];
        //}

        /* 返回数据 */
        $result = json_encode(array(
            "state" => "SUCCESS",
            "list" => $list,
            "start" => $start,
            "total" => count($files)
        ));

        return $result;

    }
    /**
     * 遍历获取目录下的指定类型的文件
     * @param $path
     * @param array $files
     * @return array
     */
    public function getfiles($path, $allowFiles, &$files = array())
    {
        if (!is_dir($path)) return null;

        if(substr($path, strlen($path) - 1) != '/') $path .= '/';
        $handle = opendir($path);

        while (false !== ($file = readdir($handle))) {
            if ($file != '.' && $file != '..') {
                $path2 = $path . $file;
                if (is_dir($path2)) {
                    $this->getfiles($path2, $allowFiles, $files);
                } else {
                    if(in_array('.'.pathinfo($file, PATHINFO_EXTENSION), $allowFiles)){

                        $files[] = array(
                            'url'=> substr($path2, strlen($_SERVER['DOCUMENT_ROOT'])),
                            'mtime'=> filemtime($path2)
                        );
                    }
                }
            }
        }
        return $files;
    }
    //////////
    ///////////
/////////////////////
    public function index()
    {
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover,{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>', 'utf-8');
//        echo  "哈哈<br>";
//        echo U("test");   //   /Home/Index/test.html
//        echo U("test?name=张三");  //   /Home/Index/test/name/%E5%BC%A0%E4%B8%89.html
//        echo U("User/test");   //   /Home/User/test.html
//        echo U("Lovo/User/test");   //  /Lovo/User/test.html
    }

    /**
     * 不管哪一种写法，都是使用index.php作为入口文件（单入口）
     * 默认的路径格式写法
     * http://域名或机器名或IP地址/index.php/模块名称/控制器名称/动作（函数）名称
     * http://www.testtp.cn/index.php/Home/Index/test
     * 普通模式写法，类似于GET请求的写法
     * http://域名或机器名或IP地址/index.php?m=Home(模块)&c=Index(控制器)&a=test(动作/函数)
     * http://www.testtp.cn/index.php?m=Home&c=Index&a=test
     * //  默认的值都可以省略（m默认为Home， c默认为Index， a默认为index）
     * http://www.testtp.cn/index.php?a=test
     *
     * ReWrite写法，需要在index.php同一个目录 下有.htaccess[针对Apache服务器]配置文件
     *
     */
    public function test()
    {
//        echo '测试test函数！';
        // 默认情况下放置在View视图目录下的都是模板文件，默认后缀.html
        // 使用父类(Think/Controller)中的display函数可以去调用访问该文件
        // TP默认使用的模板为Think
        $this->display("mytest");
    }
    // 检测输入的验证码是否正确，$code为用户输入的验证码字符串
    function check_verify($code, $id = ''){
        $verify = new \Think\Verify();
        return $verify->check($code, $id);
    }
    public function login()
    {
        //  在TP中接收请求参数，请使用I函数
//        $uname = I("uname");//$_POST['uname'];
//        $uname = I("post.uname");
//        $upwd = I("post.upwd");
//
//        if(empty($uname) || empty($upwd)){
//            $this->error("登录失败！",'', 113);
//        }elseif($upwd !== "123456"){
//            $this->error("密码错误！",'', 113);
//        }
//
//        session('username',$uname);
//
//        $this->success("登录成功！",U('userinfo'), 112);
        $user = D('user');
//        $data=I('post.');
        $uname = I("post.uname");
        $upwd = I("post.upwd");
        $yanzhengma = I("post.yanzhengma");

//       $Verify = new \Think\Verify();
        $istrue=$this->check_verify($yanzhengma);

//        session('yanzhengma', $yanzhengma);
//        $condition['uname'] = $uname;
//        $condition['uisvalid'] =1;


// 把查询条件传入查询方法
        $info = $user->where("uname='$uname'and uisvalid='1' ")->find();
        //如果在数据库中找到有效的用户名则进行下列的密码判断
//        dump($info);
        session('uid', $info['uid']);
        if (count($info) > 0) {
//          echo $upwd."<br>";
//          dump(password_hash('123456', PASSWORD_BCRYPT));
//          dump(password_verify($upwd,$info['upwd']));
            if (password_verify($upwd, $info['upwd']) && $istrue) {

                $this->success("登录成功！", U('userinfo'), 5);
            } else {
                $this->error("密码错误或验证码错误！", U('test'), 115);
            }
        }
    }

    public function userinfo()
    {
        $user = M('user', 'tp_');
        $uid = $_SESSION['uid'];
//       echo $_SESSION['uid'];
        $i = $user->where("uid=$uid")->select();
        $this->assign('name', $i[0]['uname']);
        $this->assign('uphoto', $i[0]['uphoto']);

        $this->display();
    }

    //显示注册界面
    public function zhuce()
    {
        $this->display();
    }
    public function regUser()
    {
        $user = M('user', 'tp_');


        $data = I('post.');
//        var_dump($data);
        $data['upwd'] = password_hash('123456', PASSWORD_BCRYPT);
        $data['uregtime'] = date('Y-m-d H:i:s', time());
        $data['ulastupdatetime'] = date('Y-m-d H:i:s', time());
        var_dump($data);
        $info = $user->add($data);
        var_dump($info);
    }


    //注册个人信息
    public function yaya()
    {
        $user = D('user');
        if ($user->create()) {
            $user->add();
            $this->success("注册成功！", U('userinfo'), 5);
        } else {
            $this->error("注册失败", "zhuce", 5);
        }


//        $data=I('post.');
////        D('user')->rg($data);
//        $user=D('user')->add($data);
//        dump($user);
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
//        dump($user);
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
//        $info= $User->find();
//        $this->assign('name',$info['name']);
//        $this->assign('sex',$info['sex']);
//        $this->assign('mobile',$info['mobile']);
//        $this->assign('email',$info['email']);
//        $this->assign('gongsi',$info['gongsi']);
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

    //验证码
    public function yanzhengma()
    {
        $Verify = new \Think\Verify();
        $Verify->fontttf='msyhl.ttc';
        $Verify->useZh = true;
        $Verify->entry();
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