<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>搜索 | BTP</title>
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
            color: #d9dce6;
        }
        a{
            color: white;
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
        .wall{
            height: 50px;
        }
        .y{
            float: right;
            width: 100%;
            min-height: 800px;
            padding-left: 20px;
            padding-right: 20px;
            background-color: white;
            border-radius: 5px;
        }
        .y h2{
            text-align: center;
        }
        .zs{
            padding: 5px;
            background-color:#f4f4f4;
            width: 280px;
            height: 100px;
            float:left;
            margin-left: 40px;
            margin-bottom: 20px;
        }
        .zs:hover{
            background-color: #fbfbfb;
        }
        .ssk{
            width:100%;
            padding-left: 85px;
            padding-right: 85px;
        }
    </style>
</head>
<body>
<div>
    <div class="container t">
        <div class="row t1">
            <div class="col logo">
                <h1><a href="<?php echo U('index');?>" style="color: black"><img src="/Public/logo" alt="无法加载"/> BTP.<span style="color: #3a9dcb">COM</span></a></h1>
            </div>
        </div>
        <div class="row t2">
            <div class="col ss">
                <form action="<?php echo U('sousuo');?>">
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
    <div class="y">
            <h2 style="border-bottom: 3px solid #f4f4f4;" class="sm">
                <span class="glyphicon glyphicon-list">

                </span>
                <strong>
                    搜索

                </strong>
                <small>关键字：<?php echo ($zs); ?></small>
            </h2>
        <div class="ssk">
            <?php if(is_array($zhishilist)): foreach($zhishilist as $key=>$zvo): ?><a href="<?php echo U('zs');?>?zs=<?php echo ($zs); ?>&zid=<?php echo ($zvo["zid"]); ?>" style="color: black">
                    <div class="zs">
                        <h4 style="color:#3bb2e1 "><?php echo ($zvo["zbiaoti"]); ?></h4>
                        <img height="36" width="36" src="\Public\jinhu20171114184721.jpg" data-src="holder.js/36*36">
                        <strong>深入了解Bootstrap底层结构的关键部分，包括我们让web开发变得更好、更快...</strong>
                    </div>
                </a><?php endforeach; endif; ?>
        </div>

    </div>
</div>
</body>
</html>