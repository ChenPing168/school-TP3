<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/public/css/bootstrap.min.css"/>
    <script src="/public/js/jquery-1.12.2.min.js"></script>
    <script src="/public/js/bootstrap.min.js"></script>
    <script src="/public/js/holder.min.js"></script>
    <script src="/public/js/application.js"></script>
    <title>用户登录</title>
</head>
<style>
    form p{
        font-size: 25px;
        color: #3c3c3c;
    }
    a:hover{
        text-decoration: none;
    }
</style>
<body>
<header>
    <div class="container" style="margin-left: 110px;">
        <div class="headertop" style="overflow: hidden;">
            <div class="col logo">
                <h1><a href="<?php echo U('btp/index');?>" style="color: black"><img src="/Public/logo" alt="无法加载"/> BTP.<span style="color: #3a9dcb">COM</span></a></h1>
            </div>
        </div>
    </div>
</header>
<div class="container" style="margin-top: 30px;">
    <div style="min-height: 500px;">
        <div  class="col-sm-5" style="">
            <img src="/public/image/87030.jpg" alt="图片logo" style="width: 100%;height: 400px;">
        </div>
        <div class="col-sm-6 " id="qiehuan">
            <ul class="nav nav-tabs" style="font-size: 130%;font-weight: bold;">
                <li class="active"><a href="#Userlogin" data-toggle="tab">用户登陆</a></li>
                <li><a href="#Adminlogin" data-toggle="tab">管理员登录</a></li>
            </ul>
            <div class="tab-content">
                <div style="margin-top: 10px;">
                    <a href="<?php echo U('Btp/index');?>">返回首页&gt;&gt;&gt;</a>
                </div>
                <div class="tab-pane active" id="Userlogin" style="padding: 10px 0 0 20px;">
                    <form action="<?php echo U('User/Userlogin_yanzheng');?>" method="post" onsubmit="return Userchk(this)">
                        <p>
                            <span style="letter-spacing: 1em;">姓</span>名:<input type="text" name="uname" style="width: 60%;" class="input-lg" placeholder="请输入用户名">
                        </p>
                        <p>
                            <span style="letter-spacing: 1em;">密</span>码:<input type="password" name="upwd" style="width:60%;margin-top: 10px;" class="input-lg" placeholder="请输入密码">
                        </p>
                        <p>
                            验证码:<input type="test" id="Useryanzhengma" name="Useryanzhengma" style="width:60%;margin-top: 10px;" class="input-lg" placeholder="请输入验证码">
                        </p>
                        <p>
                            <img src="<?php echo U('User/yanzhengma');?>" alt="无法加载" onclick="User()" id="Userlujing" style="margin: 10px 0 0 70px;"/>
                        </p>
                        <input type="submit" value="登录" class="btn btn-primary btn-lg" style="width: 20%;margin-left: 60px;">
                        <a href="<?php echo U('User/Userregister');?>" class="btn btn-primary btn-lg" style="width: 20%;margin-left: 60px;">立即注册</a>
                        <p id="Usererrinfo" style="color: red;font-size: 15px;">
                        </p>
                    </form>
                </div>
                <div class="tab-pane" id="Adminlogin" style="padding: 10px 0 0 20px;">
                    <form action="<?php echo U('user/Adminlogin_yanzheng');?>" method="post" onsubmit="return Adminchk(this)">
                        <p>
                            <span style="letter-spacing: 1em;">姓</span>名:<input type="text" name="aname" style="width: 60%;" class="input-lg" placeholder="请输入用户名">
                        </p>
                        <p>
                            <span style="letter-spacing: 1em;">密</span>码:<input type="password" name="apwd" style="width:60%;margin-top: 10px;" class="input-lg" placeholder="请输入密码">
                        </p>
                        <p>
                            验证码:<input type="test" id="Adminyanzhengma" name="Adminyanzhengma" style="width:60%;margin-top: 10px;" class="input-lg" placeholder="请输入验证码">
                        </p>
                        <p>
                            <img src="<?php echo U('User/yanzhengma');?>" alt="无法加载" onclick="Admin()" id="Adminlujing" style="margin: 10px 0 0 70px;"/>
                        </p>
                        <input type="submit" value="登录" class="btn btn-primary btn-lg" style="width: 20%;margin-left: 60px;">
                        <a href="<?php echo u('Admin/Adminregister');?>" class="btn btn-primary btn-lg" style="width: 20%;margin-left: 60px;">立即注册</a>
                        <p id="Adminerrinfo" style="color: red;font-size: 12px;">
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function Userchk(frm) {
        if(frm.uname.value=="" && frm.upwd.value==""){
            document.getElementById('Usererrinfo').innerHTML="亲，您还没有填写任何信息";
        }else if(frm.uname.value==""){
            document.getElementById('Usererrinfo').innerHTML="用户名不能为空";
        }else if(frm.upwd.value==""){
            document.getElementById('Usererrinfo').innerHTML="密码不能为空";
        }else if(frm.Useryanzhengma.value==""){
            document.getElementById('Usererrinfo').innerHTML="验证不能为空";
        }else{
            return true;
        }
        return false
    }
    function Adminchk(frm) {
        if(frm.uname.value=="" && frm.upwd.value==""){
            document.getElementById('Adminerrinfo').innerHTML="亲，您还没有填写任何信息";
        }else if(frm.uname.value==""){
            document.getElementById('Adminerrinfo').innerHTML="用户名不能为空";
        }else if(frm.upwd.value==""){
            document.getElementById('Adminerrinfo').innerHTML="密码不能为空";
        }else if(frm.Useryanzhengma.value==""){
            document.getElementById('Adminerrinfo').innerHTML="验证不能为空";
        }else{
            return true;
        }
        return false
    }
    function User(){
        document.getElementById('Userlujing').src="<?php echo U('User/yanzhengma');?>";
    }
    function Admin(){
        document.getElementById('Adminlujing').src="<?php echo U('User/yanzhengma');?>";
    }
</script>

</body>
</html>