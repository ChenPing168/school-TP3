<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>管理员注册</title>
    <link rel="stylesheet" href="/public/css/bootstrap.min.css"/>
    <script src="/public/js/jquery.min.js"></script>
    <style>
        form p{
            font-size: 25px;
            color: #3c3c3c;
        }
        a:hover{
            text-decoration:none;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 style="text-align: center;margin: 0 0 50px 0 ;">管理员注册</h1>
    <div  class="col-sm-5" style="">
        <img src="/public/image/87030.jpg" alt="图片logo" style="width: 100%;height: 525px;margin: 0 0 0 10px;">
    </div>
    <div class="tab-pane active" id="login" style="">
        <form action="<?php echo U('Admin/Adminregister_zhuce');?>" method="post" onsubmit="return chk(this)">
            <p>
                <span style="letter-spacing: 1em;">姓</span>名:<input type="text" name="aname" id="aname" style="width: 30%;" class="input-lg" placeholder="请输入用户名">
            </p>
            <p>
                <span style="letter-spacing: 1em;">密</span>码:<input type="password" name="apwd" id="apwd" style="width:30%;margin-top: 10px;" class="input-lg" placeholder="请输入密码">
            </p>
            <p>
                <span style="letter-spacing: 1em;">生</span>日:<input type="date" name="abirthday" id="abirthday" style="width:30%;margin-top: 10px;" class="input-lg" placeholder="请输入生日">
            </p>
            <p>
                <span style="letter-spacing: 1em;">性</span>别：
                <input type="radio" name="asex" value="男" id="male" checked><label for="male" style="padding-right: 50px;">男</label>
                <input type="radio" name="asex" value="女" id="female"><label for="female">女</label>
            </p>
            <p>
                <span style="letter-spacing: 1em;">电</span>话:<input type="text" name="amobile" id="amobile" style="width:30%;margin-top: 10px;" class="input-lg" placeholder="请输入电话">
            </p>
            <p>
                <span style="letter-spacing: 1em;">Q</span> Q:<input type="text" name="aqq" id="aqq" style="width:30%;margin-top: 10px;" class="input-lg" placeholder="请输入QQ">
            </p>
            <p>
                <span style="letter-spacing: 1em;">邮</span>箱:<input type="text" name="aemail" id="aemail" style="width:30%;margin-top: 10px;" class="input-lg" placeholder="请输入邮箱">
            </p>
            <p>
                <button type="submit" class="btn btn-default btn-lg btn-warning" style="margin:20px 0 0 60px;">确认注册</button>
                <a href="<?php echo U('User/login');?>" class="btn btn-default btn-lg btn-warning" style="margin:20px 0 0 60px;">取消注册</a>
            </p>
            <p id="errinfo" style="color: red;font-size: 14px;"></p>
        </form>
    </div>
</div>
<script>
    function chk(frm) {
        var aname=document.getElementById('aname');
        var apwd=document.getElementById('apwd');
        var abirthday=document.getElementById('abirthday');
        var amobile=document.getElementById('amobile');
        var aqq=document.getElementById('aqq');
        var aemail=document.getElementById('aemail');

        if($("#anamev").value==''&& $("#apwd").value==''&& $("#abirthday").value==''&& $("#amobile").value==''&& $("#aqq").value==''&& $("#aemail").value=='') {
            $("#errinfo").html('请填写完整信息');
        } else if($("#aname").val()==""){
            $("#errinfo").html('请输入用户名');
        }else if($("#apwd").val==""){
            $("#errinfo").html('请输入密码');
        }else if($("#abirthday").val==""){
            $("#errinfo").html('请输入生日');
        }else if($("#amobile").val==""){
            $("#errinfo").html('请输入电话');
        } else if($("#aqq").val==""){
            $("#errinfo").html('请输入QQ');
        } else if($("#aemail").val==""){
            $("#errinfo").html('请输入邮箱');
        } else{
            return true;
        }
        return false
    }
</script>
</body>
</html>