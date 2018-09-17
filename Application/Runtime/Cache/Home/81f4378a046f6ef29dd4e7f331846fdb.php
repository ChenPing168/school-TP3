<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户信息</title>
    
    <link rel="stylesheet" href="/Public/dist/css/bootstrap.min.css"/>
    <script src="/Public/dist/js/jquery.min.js"></script>
    <script src="/Public/dist/js/bootstrap.min.js"></script>
    <script src="/Public/dist/js/holder.min.js"></script>
    <script src="/Public/dist/js/application.js"></script>
    <style>
        th{
            border: none;
           color: #00CCFF;
        }
        td{

        }
        #login{
            font-size: 20px;
        }
        body {
            margin: 0;
            font-size: 1.2em;
            font-family: Helvetica Neue,Helvetica,PingFang SC,Hiragino Sans GB,Microsoft YaHei,Noto Sans CJK SC,WenQuanYi Micro Hei,Arial,sans-serif;
            -webkit-font-smoothing: antialiased;
            background: #f6f6f6;
            color: #333;

        }
        .dhl{
            font-size: 20px;
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
        a:hover{
            text-decoration: none;
            color: #6e4fe6;
        }
        a{
            color: #101010;
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
            position: fixed;
            right: 2%;
            bottom: 20%;
            /*width: 50px;*/
            /*border: 1px solid;*/
            background-color: white;
            font-size: 20px;
            text-decoration: none;
            margin-left:100%;
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
<header>
    <div class="container">
        <div class="pull-left" style="font-size: 30px;color: #2aabd2">
            <h1>
                <a href="<?php echo U('Btp/index');?>" style="color: black"><img src="/Public/logo" alt="无法加载"/> BTP.<span style="color: #3a9dcb">COM</span></a>
                <!--<a href="<?php echo U('Btp/index');?>" style="text-decoration: none; color: #101010">BTP.<span style="color: #3a9dcb">COM</span></a>-->
            </h1>
        </div>
        <div class="pull-right" style="margin: 20px 30px 0 0; font-size: 15px;color: #003399">
            欢迎您，<?php echo ($date['uname']); ?>
            <a href="<?php echo U('Btp/index');?>" style=" color: #101010">返回首页</a>
        </div>
        <div class="col-md-12 text-center dhl" style="background-color: #42c1f3;">
            <ul>
                <li><a href="<?php echo U('xinxi',array('cao'=>0));?>">个人信息</a></li>
                <li><a href="<?php echo U('xinxi',array('cao'=>1));?>">信息修改</a></li>
                <li><a href="<?php echo U('xinxi',array('cao'=>2));?>">个人笔记</a></li>
                <li><a href="<?php echo U('xinxi',array('cao'=>3));?>">笔记管理</a></li>
            </ul>
        </div>
    </div>
</header>
<!--页面内容-->
<div class="container" style="margin-top: 30px;">

    <?php if($cao == 0): ?><div class="col-md-9 col-md-offset-1 text-center">
            <h2>个人资料显示</h2>

            <table class="table table-hover table-condensed table-striped" style="font-size: 20px; ">
                <tr>
                    <td class="">姓名:</td>
                    <td class=""><?php echo ($date['uname']); ?></td>
                </tr>
                <tr>
                    <td class="">性别:</td>
                    <td  class=""><?php echo ($date['usex']); ?></td>
                </tr>
                <tr>
                    <td class="">生日:</td>
                    <td  class=""><?php echo ($date['ubirthday']); ?></td>
                </tr>
                <tr>
                    <td class="">email:</td>
                    <td  class=""><?php echo ($date['uemail']); ?></td>
                </tr>
                <tr>
                    <td class="">QQ:</td>
                    <td  class=""><?php echo ($date['uqq']); ?></td>
                </tr>
                <tr>
                    <td class="">电话:</td>
                    <td class=""><?php echo ($date['umobile']); ?></td>
                </tr>
                <tr>
                    <td class="">注册时间:</td>
                    <td class=""><?php echo ($date['uregtime']); ?></td>
                </tr>
                <tr>
                    <td class="">上一次修改时间:</td>
                    <td class=""><?php echo ($date['ulastupdatetime']); ?></td>
                </tr>
            </table>
        </div>
        <hr color="red" width="1" size="100%">
        <?php elseif($cao == 1): ?>
        <div class="tab-content text-center">
            <h2>信息修改</h2>
            <div class="col-md-9 col-md-offset-1" >
                <form action="<?php echo U('xiugaiziliao');?>" method="post">
                    <table class="table  table-hover table-condensed table-striped" id="login">
                        <tr>
                            <th>姓名：</th>
                            <td>
                                <input type="text" name="uloginname" id="uloginname" value="<?php echo ($date["uname"]); ?>"
                                       style="width: 35%" class="input-sm" placeholder="请输入姓名">
                            </td>
                        </tr>
                        <tr>
                            <th>性别：</th>
                            <td>
                                <input type="radio" name="usex" value="<?php echo ($date["usex"]); ?>" id="male" checked><label
                                    for="male" style="padding-right: 35px;">男</label>
                                <input type="radio" name="usex" value="<?php echo ($date["usex"]); ?>zx" id="female"><label
                                    for="female">女</label>
                            </td>
                        </tr>
                        <tr>
                            <th>生日：</th>
                            <td>
                                <input type="date" value="<?php echo ($date["ubirthday"]); ?>" id="ubirthdayy" name="ubirthday"
                                       style="width: 35%;" class="input-sm">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                电话：
                            </th>
                            <td>
                                <input type="text" id="umobile" name="umobile" value="<?php echo ($date["umobile"]); ?>"
                                       style="width: 35%;" class="input-sm" placeholder="请输入电话">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Email：
                            </th>
                            <td>
                                <input type="text" id="uemail" value="<?php echo ($date["uemail"]); ?>" name="uemail"
                                       style="width: 35%;" class="input-sm" placeholder="请输入email">
                            </td>
                        </tr>
                        <tr>
                            <th> QQ：</th>
                            <td>
                                <input type="text" id="uqq " name="uqq" value="<?php echo ($date["uqq"]); ?>" style="width: 35%;"
                                       class="input-sm" placeholder="请输入qq">
                            </td>
                        </tr>
                    </table>
                    <p>
                        <a href="<?php echo U('xinxi',array('cao'=>5,'uid'=>$date['uid']));?>" class="btn btn-primary btn-lg" >修改密码</a>
                        <input type="submit" class="btn btn-primary btn-lg" value="确认修改 ">
                    </p>
                </form>
            </div>
        </div>
        <?php elseif($cao == 2): ?>
        <div class="container" style="background-color: #f9f9f9;min-height: 500px;" id="mybiji">
            <!--<if condition="$uid==$uid">-->
            <p style="font-size: 20px">笔记数量：<?php echo ($bjnum); ?></p>
            <?php if(is_array($data)): foreach($data as $key=>$vo): ?><h2>知识点标题：<?php echo ($vo['zbiaoti']); ?></h2>
                        <h3>知识点内容：<?php echo ($vo['zcontent']); ?></h3>

                        <h3 style="color:red;">笔记内容：<?php echo htmlspecialchars_decode($vo['bcontent']);?></h3>
                        <!--<?php echo ($vo['bcontent']); ?>-->

                <div class="pull-right">
                    上一次修改时间：<span><?php echo ($vo['blastupdatetime']); ?></span>
                </div>
                <hr>
                <p style="text-align: center;">
                    <!--<?php echo ($page); ?>-->
                </p><?php endforeach; endif; ?>

            <!--<p>对不起，你没有笔记</p>-->
        </div>

        <?php elseif($cao == 3): ?>

        <h2 style="text-align: center">笔记管理</h2>
        <div class="container text-center" >

            <table id="" class="table table-hover table-condensed table-striped text-center" style="font-size: 20px">
                <thead>
                <tr style="color: #00CCFF;font-size: 20px;">
                    <td scope="col" class="rounded">标题</td>
                    <td scope="col" class="rounded">笔记内容</td>
                    <td scope="col" class="rounded">修改时间</td>
                    <td scope="col" class="rounded-q4">操作</td>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($list)): foreach($list as $key=>$b): ?><tr>
                        <td><?php echo ($b["zbiaoti"]); ?></td>
                        <!--<td><?php echo ($b["bcontent"]); ?></td>-->
                        <td><?php echo htmlspecialchars_decode($b['bcontent']);?></td>
                        <td><?php echo ($b["blastupdatetime"]); ?></td>
                        <td><a href="<?php echo U('xinxi',array('cao'=>4,'bid'=>$b['bid']));?>" class="ask" style="text-decoration: none"><img src="" alt="" title="" border="0" />修改</a>
                            <a href="<?php echo U('user/shanchu',array('bid'=>$b['bid']));?>" class="aka" style="text-decoration: none">删除</a>
                        </td>
                    </tr><?php endforeach; endif; ?>
                </tbody>
            </table>
            <hr>
            <div class="content" style="text-align: center;">
                <!--<div class="pages"><?php echo ($page); ?></div>-->
            </div>
        </div>

        <?php elseif($cao == 4): ?>

        <div class="col-sm-12" style="background-color: #f9f9f9;min-height: 500px;" id="myxgbiji">
            <!--<if condition="$uid==$uid">-->
            <p style="font-size: 20px">笔记数量：<?php echo ($bjnum); ?></p>
            <?php if(is_array($list)): foreach($list as $key=>$vo): ?><h3>
                    <form action="<?php echo U('xiugaibiji');?>" method="post">
                        <p>知识点标题：<span><?php echo ($vo['zbiaoti']); ?></span> </p>
                        <input type="hidden" name="bid" value="<?php echo ($vo['bid']); ?>"/>
                        笔记内容： <input type="text" id="bcontent" name="bcontent" value="<?php echo htmlspecialchars_decode($vo['bcontent']);?>" style="width: 35%;" class="input-sm" placeholder="请输入修改内容">
                        <input type="submit" value="确认修改"/>
                    </form>
                </h3>
                <hr><?php endforeach; endif; ?>
            <!--<p style="text-align: center;">-->
                <!--<?php echo ($page); ?>-->
            <!--</p>-->
        </div>

        <?php elseif($cao == 5): ?>
<div class="container">
        <form action="<?php echo U('xiugaimima');?>" method="post">
            <h3 class="text-center">修改密码</h3>
            <table class="table  table-hover table-condensed table-striped text-center" id="login1">
                <tr>
                    <td>姓名：</td>
                    <td>
                        <input type="text" name="uname" id="uname" value="<?php echo ($date["uname"]); ?>"
                               style="width: 35%" class="input-sm" disabled="disabled" placeholder="请输入姓名">
                    </td>
                </tr>
                <tr>
                    <td>密码：</td>
                    <td>
                        <input type="password" name="upwd" id="upwd" value=""
                               style="width: 35%" class="input-sm" placeholder="请输入密码">
                    </td>
                </tr>
            </table>
            <p>
                <input type="submit" class="btn btn-primary btn-lg pull-right" style="width: 10%;" value="确认修改 ">
            </p>
        </form>
</div><?php endif; ?>
</div>

<!--页脚-->
<div class="container">


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
    <img src="/Public/1.png" alt="" style="width:180px;height:180px;margin-left:85%"/>
    <div class="dibu4">
        <strong> Copyright ? 2013-2017<a href="" target="_blank">第五小组</a></strong>&nbsp;
        <strong>
            <a href="" target="_blank" >BTP.com</a></strong> All Rights Reserved. 备案号：闽ICP备15012807号-1
    </div>

</footer>
</div>
<!--<div class="fixed-btn">-->
    <!--<a  href="javascript:void(0)" title="返回顶部"> <i class="glyphicon glyphicon-arrow-up"></i></a>-->
    <!--<a  href="javascript:void(0)" title="关注我们"><i class="glyphicon glyphicon-qrcode"></i></a>-->
    <!--<a  href="javascript:void(0)" title="邮箱"><i class="glyphicon glyphicon-envelope"></i></a>-->
<!--</div>-->

</body>
</html>