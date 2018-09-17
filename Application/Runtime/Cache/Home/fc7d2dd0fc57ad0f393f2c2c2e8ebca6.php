<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BTP</title>
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
        }
        .dhl a:hover{
            color: #6262e6;
        }
        a{
            color: black;
        }

        h1{
            font-family: 'Source Sans Pro','微软雅黑', sans-serif;
            font-size: 50px;
            font-weight: bold;
        }
        .ss{
            max-width: 500px;
        }
        .t{
            padding: 10px;
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
            position: relative;
            padding: 0;
        }
        .wall{
            height: 50px;
        }
        .l{
            float: left;
            width: 200px;
            background-color: white;
            border-radius: 5px;
            border: 1px solid white;
            /*position: fixed;*/
            /*!*top:20%;*!*/
            /*left: 19%;*/
        }
        .y{
            float: right;
            width: 950px;
            padding-left: 20px;
            padding-right: 20px;
            background-color: white;
            border-radius: 5px;
        }
        .l li{
            width: 198px;
            height: 50px;
            line-height: 50px;
            text-align: center;
            border: 1px solid #f6f6f6;
            background-color: #fbfbfb;
        }
        .l li:hover{
            background-color: #f9f9f9;
        }
        .jc{
            margin-bottom: 5px;
            background: repeating-linear-gradient(#eeeeee 0%,white 5%, #eeeeee 95%,white 96%,#eeeeee 100%);
        }
        .jcc{
            background-color: #f9f9f9;
        }
        html {
            display: block;
        }
        .zs{
            padding: 5px;
            background-color:#f4f4f4;
            width: 280px;
            height: 150px;
            float:left;
            margin-right: 20px;
            margin-bottom: 20px;
        }
        .yl{
            float:left;
        }
        .zs:hover{
            background-color: #fbfbfb;
        }
        .hh2{
            width: 910px;
            height: 50px;
            border-bottom: 1px solid #f4f4f4;
            padding-bottom: 3px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body data-spy="scroll"  data-target="#navbar">
<div>
    <div class="container t">
        <div class="row t1">
            <div class="col logo">
                <h1><a href="<?php echo U('index');?>" style="color: black"><img src="/Public/logo" alt="无法加载"/> BTP.<span style="color: #3a9dcb">COM</span></a></h1>
            </div>
        </div>
        <div class="row t2">
            <div class="col ss">
                <form action="">
                    <input type="text" class="form-control" name="zs" id="zs" placeholder="搜索...">
                </form>
            </div>
        </div>
    </div>
</div>
<div class="dhl">
    <div class="container d">
        <ul>
            <li><a href="index.html" class="current">首页</a></li>
            <li><a href="<?php echo U('cainiao_note');?>">BTP笔记</a></li>
            <!--<li><a href="">BTP工具</a></li>-->
            <!--<li><a href="">参考手册</a></li>-->
            <li><a href="<?php echo U('ceyan');?>">测验/考试</a></li>
            <div class="headertop pull-right" style="overflow: hidden;line-height: 35px">
                <!-- 用户信息 -->
                <?php if($_SESSION['uname']=== NUll): ?><div class="pull-left" style="margin: 0 0 0 20px;">
                        <a href="<?php echo U('User/login');?>">登陆BTP</a> | <a href="<?php echo U('User/Userregister');?>">注册BTP</a>
                    </div>
                    <?php else: ?>
                    <div class="pull-left" style="margin: 10px 0 0 50px;">
                        欢迎您，<a href="<?php echo U('User/xinxi');?>">[<?php echo (session('uname')); ?>]</a>
                        <a href="<?php echo U('User/logout');?>">安全退出</a>
                    </div><?php endif; ?>
            </div>

        </ul>
    </div>
</div>
<div class="container d">
    <div class="wall"></div>
    <div class="l">
        <ul>
            <li class="jc">
                全部教程
            </li>
            <?php if(is_array($sclasslist)): foreach($sclasslist as $key=>$vo): ?><a href="#<?php echo ($vo["sname"]); ?>"><li class="jcc"><?php echo ($vo["sname"]); ?></li></a><?php endforeach; endif; ?>
        </ul>
    </div>
    <div class="y">
        <?php if(is_array($sclasslist)): foreach($sclasslist as $key=>$vo): ?><div class="yl" id="<?php echo ($vo["sname"]); ?>">
                <div class="hh2">
                    <h2 class="sm">
                    <span class="glyphicon glyphicon-list">
                    </span>
                        <strong>
                            <?php echo ($vo["sname"]); ?>
                        </strong>
                    </h2>
                </div>
                <?php if(is_array($zhishilist)): foreach($zhishilist as $key=>$zvo): if($vo["sid"] === $zvo["sid"] ): ?><a href="<?php echo U('zs');?>?zid=<?php echo ($zvo["zid"]); ?>&sid=<?php echo ($zvo["sid"]); ?>" style="color: black" class="wzlj">
                            <div class="zs">
                                <h4 style="color:#3bb2e1 "><?php echo ($zvo["zbiaoti"]); ?></h4>
                                <img height="45" width="45" src="/Public/jinhu20171115213017.jpg" data-src="holder.js/36*36">
                                <strong> <?php echo mb_substr(htmlspecialchars_decode($zvo['zcontent']),0,70);?>...</strong>
                            </div>
                        </a>
                        <?php else: endif; endforeach; endif; ?>
            </div><?php endforeach; endif; ?>
    </div>
</div>
</body>
</html>