<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BTP首页</title>
    <link rel="stylesheet" href="/Public/dist/css/bootstrap.min.css"/>
    <script src="/Public/dist/js/jquery.min.js"></script>
    <script src="/Public/dist/js/bootstrap.min.js"></script>
    <script src="/Public/dist/js/holder.min.js"></script>
    <script src="/Public/dist/js/application.js"></script>
    <style>
        body {
            width: 100%;
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
            color: #d9dce6;
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
            position: relative;
            padding: 10px;
        }
        .t1{
            width: 500px;
            height: 85px;
            float: left;
        }
        .t2{
            position: absolute;
            top: 20px;
            left: 700px;
            width: 500px;
            float: right;
            margin-top: 26px;
        }
        nav{
            width: 100%;
            height: 35px;
            min-width: 1024px;
            background-color: #42c1f3;
        }
        nav a{
            color: white;
        }
        ul{
            list-style: none;
            padding: 0;
        }
        nav ul{
            display: block;
            margin: 0 auto;
            line-height: 35px;
        }
        nav li{
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
            width: 200px;
            background-color: white;
            border-radius: 5px;
            border: 1px solid white;
        }
        .y{
            position: absolute;
            top: 50px;
            left: 230px;
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
            height: 100px;
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
<body data-spy="scroll" data-toggle="collapse" data-target="#navbar #in">
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
                    <input type="text" class="form-control" name="zs" id="zs" placeholder="搜索...例如‘BTP’">
                </form>
            </div>
        </div>
    </div>
</div>
<nav class="in" id="in">
    <div class="container d">
        <ul>
            <li><a href="index.html" class="current">首页</a></li>
            <li><a href="<?php echo U('cainiao_note');?>">BTP笔记</a></li>
            <!--<li><a href="">BTP工具</a></li>-->
            <!--<li><a href="">参考手册</a></li>-->
            <li><a href="<?php echo U('ceyan');?>?bid=1">测验/考试</a></li>
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
</nav>

<div class="container d">
    <div class="wall"></div>
    <div class="l">
        <ul>
            <li class="jc">
                BTP全部教程
            </li>
            <?php if(is_array($bclasslist)): foreach($bclasslist as $key=>$vo): ?><a href="#<?php echo ($vo["bname"]); ?>"><li class="jcc"><?php echo ($vo["bname"]); ?></li></a><?php endforeach; endif; ?>
        </ul>
    </div>
    <div class="y">
        <?php if(is_array($bclasslist)): foreach($bclasslist as $key=>$vo): ?><div class="yl" id="<?php echo ($vo["bname"]); ?>">
                <div class="hh2">
                    <h2 class="sm">
                    <span class="glyphicon glyphicon-list">
                    </span>
                        <strong>
                            <?php echo ($vo["bname"]); ?>
                        </strong>
                    </h2>
                </div>
                <?php if(is_array($sclasslist)): foreach($sclasslist as $key=>$svo): if($vo["bid"] === $svo["bid"] ): ?><a href="<?php echo U('szlist');?>?bid=<?php echo ($svo["bid"]); ?>" style="color: black" class="wzlj">
                            <div class="zs">

                                <h4 style="color:#3bb2e1 "><?php echo ($svo["sname"]); ?></h4>
                                <img height="40" width="40" src="\Public\jinhu20171114184721.jpg">
                                <strong>深入了解Bootstrap底层结构的关键部分，包括我们让web开发变得更好、更快...</strong>
                            </div>
                        </a>
                        <?php else: endif; endforeach; endif; ?>
                <?php if($vo["bid"] > 2): ?><a href="" style="color: black" class="wzlj">
                        <div class="zs">
                            <h4 style="color:#3bb2e1 ">空白填充数据</h4>
                            <img height="40" width="40" src="\Public\jinhu20171114184721.jpg">
                            <strong>深入了解Bootstrap底层结构的关键部分，包括我们让web开发变得更好、更快...</strong>
                        </div>
                    </a>
                    <a href="" style="color: black" class="wzlj">
                        <div class="zs">

                            <h4 style="color:#3bb2e1 ">空白填充数据</h4>
                            <img height="40" width="40" src="\Public\jinhu20171114184721.jpg">
                            <strong>深入了解Bootstrap底层结构的关键部分，包括我们让web开发变得更好、更快...</strong>
                        </div>
                    </a>
                    <a href="" style="color: black" class="wzlj">
                        <div class="zs">

                            <h4 style="color:#3bb2e1 ">空白填充数据</h4>
                            <img height="40" width="40" src="\Public\jinhu20171114184721.jpg">
                            <strong>深入了解Bootstrap底层结构的关键部分，包括我们让web开发变得更好、更快...</strong>
                        </div>
                    </a>
                    <a href="" style="color: black" class="wzlj">
                        <div class="zs">

                            <h4 style="color:#3bb2e1 ">空白填充数据</h4>
                            <img height="40" width="40" src="\Public\jinhu20171114184721.jpg">
                            <strong>深入了解Bootstrap底层结构的关键部分，包括我们让web开发变得更好、更快...</strong>
                        </div>
                    </a>
                    <a href="" style="color: black" class="wzlj">
                        <div class="zs">

                            <h4 style="color:#3bb2e1 ">空白填充数据</h4>
                            <img height="40" width="40" src="\Public\jinhu20171114184721.jpg">
                            <strong>深入了解Bootstrap底层结构的关键部分，包括我们让web开发变得更好、更快...</strong>
                        </div>
                    </a>
                    <a href="" style="color: black" class="wzlj">
                        <div class="zs">

                            <h4 style="color:#3bb2e1 ">空白填充数据</h4>
                            <img height="40" width="40" src="\Public\jinhu20171114184721.jpg">
                            <strong>深入了解Bootstrap底层结构的关键部分，包括我们让web开发变得更好、更快...</strong>
                        </div>
                    </a><?php endif; ?>
            </div><?php endforeach; endif; ?>
    </div>
</div>
</body>
</html>