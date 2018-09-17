<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>笔记</title>
    <link rel="stylesheet" href="/Public/dist/css/bootstrap.min.css"/>
    <script src="/Public/dist/js/jquery.min.js"></script>
    <script src="/Public/dist/js/bootstrap.min.js"></script>
    <script src="/Public/dist/js/holder.min.js"></script>
    <script src="/Public/dist/js/application.js"></script>
    
    <style>
        body {
            margin: 0;
            font-size: 1.2em;
            font-family: Helvetica Neue,Helvetica,PingFang SC,Hiragino Sans GB,Microsoft YaHei,Noto Sans CJK SC,WenQuanYi Micro Hei,Arial,sans-serif;
            -webkit-font-smoothing: antialiased;
            background: #f6f6f6;
            color: #333;
        }
        a:hover{
            text-decoration: none;
            color: #2f2fe6;
        }
        .jcc{
            background-color: #f9f9f9;
        }
        h1{
            font-family: 'Source Sans Pro','微软雅黑', sans-serif;
            font-size: 50px;
            font-weight: bold;
        }
        .ss{
            max-width: 500px;
        }
        .t1{
            width: 500px;
            height: 85px;
            float: left;
        }
        .t2{
            width: 500px;
            float: right;
            margin-top: 26px;
        }
        .dhl{
            width: 100%;
            height: 35px;
            background-color: #42c1f3;
        }
        .dhl a{
            color: white;
        }
        ul{
            list-style: none;
            padding: 0;
        }
        .dhl ul li{
            line-height: 35px;
            margin-right: 20px;
            float: left;
        }
        .d{
            padding: 0;
        }
        a:hover{
            text-decoration: none;
            color: #2f2fe6;
        }
        .l li{
            width: 198px;
            height: 50px;
            line-height: 50px;
            text-align: center;
            border: 1px solid #f6f6f6;
            background-color: #fbfbfb;
        }
        .l li:nth-child(odd){
            background-color: #f9f9f9;
        }
        .jc{
            margin-bottom: 5px;
            background: repeating-linear-gradient(#eeeeee 0%,white 5%, #eeeeee 95%,white 96%,#eeeeee 100%);
        }
        .l{
            width: 200px;
            border-radius: 5px;
            border: 1px solid white;
        }
        .l li:hover{
            background-color: #ebf9f9;
        }
        img{
            height: 200px;
            width: 300px;
            border: 1px solid red;
        }
        /*页脚*/
        .dibu{
            color: #000000;
            margin-left:200px;
            line-height :40px;

        }
        .dibu1{
            margin-left:400px;
            margin-top: -289px;
            line-height :40px;
        }
        .dibu2{
            margin-left: 630px;
            margin-top: -200px;
            line-height :40px;
        }
        .dibu3{
            margin-left:850px;
            margin-top: -200px;
            line-height :40px;
        }
        .dibu4{
            margin-top:80px;
            margin-left: 380px
        }
        .fixed-btn{
            right: 3%;
            bottom: 6%;
            width: 50px;
            border: 1px solid #eee;
            background-color: white;
            font-size: 24px;
            text-decoration: none;
            margin-left: 1310px;
        }
        footer a{
            color: rgba(12, 12, 12, 0.93);
        }
        footer a:hover{
            text-decoration: none;
            color: #6e4fe6;
        }

    </style>
</head>
<body>
<!--<div class="container">-->
    <!--<div class="headertop" style="overflow: hidden;">-->
        <!--&lt;!&ndash; 用户信息 &ndash;&gt;-->
        <!--<?php if($_SESSION['uname']=== NUll): ?>-->
            <!--<div class="pull-left" style="margin: 0 0 0 20px;">-->
                <!--欢迎您<a href="login.html">登陆</a>-->
            <!--</div>-->
            <!--<?php else: ?>-->
            <!--<div class="pull-left" style="margin: 10px 0 0 50px;">-->
                <!--欢迎您，<a href="<?php echo U('userinfo');?>">[<?php echo (session('uname')); ?>]</a>-->
                <!--<a href="<?php echo U('User/logout');?>">安全退出</a>-->
            <!--</div>-->
        <!--<?php endif; ?>-->
    <!--</div>-->
<!--</div>-->
<div class="container">
    <div class="row t1 headertop">
        <div class="col logo">
            <h1><a href="<?php echo U('index');?>" style="color: black">BTP.<span style="color: #3a9dcb">COM</span></a></h1>
        </div>
    </div>
    <div class="row t2">
        <div class="col ss">
            <form action="">
                <input type="text" class="form-control" name="cname" id="cname" placeholder="搜索...">
            </form>
        </div>
    </div>
</div>
<div class="dhl">
    <div class="container d">
        <ul>
            <li><a href="index.html" class="current">首页</a></li>
            <li> <a href="<?php echo U('Btp/cainiao_note');?>">菜鸟笔记</a></li>
            <!--<li><a href="">菜鸟工具</a></li>-->
            <!--<li><a href="">参考手册</a></li>-->
            <li><a href="<?php echo U('ceyan');?>">测验/考试</a></li>
            <div class="headertop pull-right" style="overflow: hidden;line-height: 35px">
                <!-- 用户信息 -->
                <?php if($_SESSION['uname']=== NUll): ?><div class="pull-left" style="margin: 0 0 0 20px;">
                        <a href="login.html">登陆</a> | <a href="<?php echo U('User/Userregister');?>">注册</a>
                    </div>
                    <?php else: ?>
                    <div class="pull-left" style="margin: 10px 0 0 50px;">
                        欢迎您，<a href="<?php echo U('user/xinxi');?>">[<?php echo (session('uname')); ?>]</a>
                        <a href="<?php echo U('User/logout');?>">安全退出</a>
                    </div><?php endif; ?>
            </div>
        </ul>
    </div>
</div>
<!-- 页面内容部分 -->
<div class="container" style="margin-top: 30px;">
    <?php if(is_array($note)): foreach($note as $key=>$data): ?><div class="col-sm-12" style="background-color: #f9f9f9;min-height: 500px;">
            <article>
                <h2 style="text-align: center;"><?php echo ($data['zbiaoti']); ?></h2>
                <h5 style="text-align: center;">
                    <a href="#"><?php echo ($data['uname']); ?></a>
                </h5>
                <hr>
                <p style="text-indent: 2em;">
                    <?php echo ($data['zcontent']); ?>
                </p>
                <p style="text-indent: 2em; " class="pull-right">
                    <?php echo ($data['zregtime']); ?>
                </p>
            </article>
            <!-- 评论信息列表 -->
            <article>
                <hr>
                <h4>笔记(<?php echo ($num); ?>)：</h4>
                <div class="pllist">

                    <div class="pl">
                        <?php echo htmlspecialchars_decode($data['bcontent']);?>
                        <p align="right">
                            <a href="#"><?php echo (session('uname')); ?></a><?php echo ($data["btime"]); ?>
                        </p>
                    </div>
                    <button class="btn btn-default btn-lg" style="background-color: #42c1f3;"><a
                            href="javascript:history.go(-1)" style="color: white">返回上一页</a></button>
                </div>
            </article>
        </div><?php endforeach; endif; ?>
</div>
</div>
<!-- 页面底部 -->
<hr>
<footer>
    <div class="row about">
        <ul class="dibu">
            <h4 >在线实例</h4>
            <li><a href="<?php echo U('login');?>">BootStrap 实例</a></li>
            <li><a href="<?php echo U('login');?>">Thinkphp实例</a></li>
            <li><a href="<?php echo U('login');?>">HTML 实例</a></li>
            <li><a href="<?php echo U('login');?>">CSS 实例</a></li>
            <li><a href="<?php echo U('login');?>">HTML 实例</a></li>
            <li><a href="<?php echo U('login');?>">CSS 实例</a></li>
        </ul>
    </div>
    <div>
        <ul class="dibu1">
            <h4 style="">字符集&工具</h4>
            <li><a href="#">HTML 字符集设置</a></li>
            <li><a href="#">HTML ASCII 字符集</a></li>
            <li><a href="#">HTML 实体符号</a></li>
            <li><a href="#">BootStrap 字符集</a></li>
        </ul>
    </div>
    <div>
        <ul class="dibu2">
            <h4>最新更新</h4>
            <li><a href="#" >Redis PEXPIRE 命令</a></li>
            <li><a href="#" >JavaScript Arra...</a></li>
            <li><a href="#" >CSS3 rotation-p...</a></li>
            <li><a href="#" > Python中单线程....</a></li>
        </ul>
    </div>
    <div>
        <ul class="dibu3">
            <h4>站点信息</h4>
            <li><a href="#" >意见反馈</a></li>
            <li><a href="#" >免责声明</a></li>
            <li><a href="#" > 关于我们</a></li>
            <li><a href="#" > 文章归档</a></li>
        </ul>
    </div>
    <h4 style="margin-left:1030px;margin-top: -200px">关注QQ</h4>
    <img src="/Public/1.png" alt="" style="width:200px;height:200px;margin-left:1000px"/>
    <div class="dibu4">
        <strong> Copyright ? 2013-2017<a href="" target="_blank">第五小组</a></strong>&nbsp;
        <strong>
            <a href="" target="_blank" >BTP.com</a></strong> All Rights Reserved. 备案号：闽ICP备15012807号-1
    </div>
    <div class="fixed-btn">
        <a  href="javascript:void(0)" title="返回顶部"> <i class="glyphicon glyphicon-arrow-up"></i></a>
        <a  href="javascript:void(0)" title="关注我们"><i class="glyphicon glyphicon-qrcode"></i></a>
        <a  href="javascript:void(0)" title="邮箱"><i class="glyphicon glyphicon-envelope"></i></a>
    </div>
</footer>
</body>
</html>