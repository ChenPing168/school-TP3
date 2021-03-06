<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BootStrap测验</title>
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
        .l{
            float: left;
            width: 200px;
            height: 500px;
            background-color: white;
            border-radius: 5px;
            border: 1px solid white;
        }
        .l li{
            width: 198px;
            height: 50px;
            line-height: 50px;
            text-align: center;
            border: 1px solid #f6f6f6;
            background-color: #fbfbfb;
        }
        .l li:first-child{
            font-size: 18px;
            margin-bottom: 5px;
            background: repeating-linear-gradient(#eeeeee 0%,white 5%, #eeeeee 95%,white 96%,#eeeeee 100%);
        }
        .l li:hover{
            background-color: #f9f9f9;
        }
        .y{
            float: right;
            width: 950px;
            height: 500px;
            background-color: white;
            border-radius: 5px;
        }
        .bt{
            width: 100%;
            height: 50px;
            line-height: 50px;
            padding-left: 20px;
            font-size: 20px;
            border: 2px solid #e0e7f1;
            background-color:#fbfbfb;
            font-weight: bold;
        }
        .tm{
            width: 100%;
            height: 458px;
            padding-left: 20px;
            padding-top: 40px;
            padding-right: 20px;
        }
        .tm div{
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<div>
    <div class="container t">
        <div class="row t1">
            <div class="col logo">
                <h1><a href="index.html" style="color: black">BTP.<span style="color: #3a9dcb">COM</span></a></h1>
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
</div>
<div class="dhl">
    <div class="container d">
        <ul>
            <li><a href="index.html" class="current">首页</a></li>
            <li><a href="">菜鸟笔记</a></li>
            <li><a href="">菜鸟工具</a></li>
            <li><a href="">参考手册</a></li>
            <li><a href="">测验/考试</a></li>
            <div class="headertop pull-right" style="overflow: hidden;line-height: 35px">
                <!-- 用户信息 -->
                <?php if($_SESSION['uname']=== NUll): ?><div class="pull-left" style="margin: 0 0 0 20px;">
                        <a href="login.html">登陆</a>
                    </div>
                    <?php else: ?>
                    <div class="pull-left" style="margin: 10px 0 0 50px;">
                        欢迎您，<a href="<?php echo U('userinfo');?>">[<?php echo (session('uname')); ?>]</a>
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
            <li style="background-color: #f4f4f4;">
                全部测验
            </li>
            <?php if(is_array($bclasslist)): foreach($bclasslist as $key=>$vo): ?><li>
                    <a href="<?php echo U('ceyan');?>?bid=<?php echo ($vo["bid"]); ?>" style="color:black;"><?php echo ($vo["bname"]); ?></a>
                </li><?php endforeach; endif; ?>
        </ul>
    </div>
    <div class="y">
        <div class="bt">
            <?php echo ($bname[0][bname]); ?> <span style="color: #3a9dcb">测验</span>
        </div>
        <?php if($num <= 20): ?><div class="tm">
                <form action="<?php echo U('ceyan');?>">
                    <div style="width: 100%;height: 250px;">
                        <div style="font-size: 14px;margin-bottom: 30px">
                            <?php echo ($num); ?>.
                            <input type="hidden" class="num" id="num" name="num" value="<?php echo ($num); ?>">
                            <strong class="wt">
                                <?php echo ($st[0]['wenti']); ?>
                            </strong>
                            <input type="hidden" class="bid" id="bid" name="bid" value="<?php echo ($st[0]['bid']); ?>">
                            <!--<input type="hidden" class="score" id="score" name="score" value="">-->
                        </div>
                        <div>
                            <input type="radio" name="xuanxiang" value="A"> <span> <?php echo ($st[0][tone]); ?></span>
                        </div>
                        <div>
                            <input type="radio" name="xuanxiang" value="B"> <span> <?php echo ($st[0][ttwo]); ?></span>
                        </div>
                        <div>
                            <input type="radio" name="xuanxiang" value="C"> <span> <?php echo ($st[0][tthree]); ?></span>
                        </div>
                        <div>
                            <input type="radio" name="xuanxiang" value="D"> <span> <?php echo ($st[0][tfour]); ?></span>
                        </div>
                    </div>
                    <div style="width: 100%;height: 100px;">
                        <div style="width:100%;">

                            <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" id="m" onclick="d()">
                                确认
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">本题测验结果</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div id="jh">回答正确，正确答案：</div>
                                            <div id="jk"></div><br>
                                        </div>
                                        <div class="modal-footer">
                                            <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                                            <input type="submit" class="btn-primary" style="min-width: 100px" value="下一题">
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        </div>
                    </div>
                </form>
                <div style="font-size: 14px;float: left">
                    <strong>
                        当前<span><?php echo ($num); ?></span>/20 题
                    </strong>
                </div>
                <!--<div style="font-size: 14px;float: right">-->
                    <!--当前得分-->
                    <!--<strong id="fs">-->
                        <!--<?php echo ($score); ?>-->
                    <!--</strong>-->
                <!--</div>-->
            </div>
            <?php else: ?>
                <a href="<?php echo U('ceyan');?>?num=0&bid=<?php echo ($st[0]['bid']); ?>" style="color: black">重新做题</a><?php endif; ?>
    </div>
</div>
<script>
    function d(){
        var zq= '<?php echo ($st[0][tdaan]); ?>';
        var val=$('input:radio[name="xuanxiang"]:checked').val();
        if(zq === val){
//            var fs=document.getElementById('fs').innerHTML;
//            fs=fs+5;
//            document.getElementById('score').value=fs;

            document.getElementById('jh').innerHTML="回答正确，正确答案：";
            document.getElementById('jk').innerHTML=zq;
//            document.getElementById('fs').innerHTML='';
        }else{
//            var fs=document.getElementById('fs').innerHTML;
//            document.getElementById('score').value=fs;
            document.getElementById('jh').innerHTML='回答错误，正确答案：';
            document.getElementById('jk').innerHTML=zq;
//            document.getElementById('fs').innerHTML='';
        }

    }


</script>
</body>
</html>