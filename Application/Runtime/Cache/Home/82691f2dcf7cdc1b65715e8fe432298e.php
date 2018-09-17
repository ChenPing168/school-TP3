<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>管理员操作界面</title>
    <script type="text/javascript" src="/Public/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" src="/Public/ueditor/ueditor.all.min.js"></script>
    <script type="text/javascript" src="/Public/ueditor/lang/zh-cn/zh-cn.js"></script>
    <link rel="stylesheet" href="/Public/css/bootstrap.min.css">
    <style>
        * {
            margin:0;
            padding:0;
            box-sizing:border-box;
            -webkit-box-sizing:border-box;
            -moz-box-sizing:border-box;
            -webkit-font-smoothing:antialiased;
            -moz-font-smoothing:antialiased;
            -o-font-smoothing:antialiased;
            font-smoothing:antialiased;
            text-rendering:optimizeLegibility;
        }

        body {
            font-family:"Open Sans", Helvetica, Arial, sans-serif;
            font-weight:300;
            font-size: 12px;
            line-height:30px;
            color:#777;
            background:#0CF;
        }

        .four {
            max-width:400px;
            width:100%;
            margin:0 auto;
            position:relative;
        }

        #contact input[type="text"], #contact input[type="date"], #contact textarea, #contact button[type="submit"] { font:400 12px/16px "Open Sans", Helvetica, Arial, sans-serif; }

        #contact {
            background:lightskyblue;
            padding:25px;
            margin:5px 0;
        }

        #contact h3 {
            color: #F96;
            display: block;
            font-size: 30px;
            font-weight: 400;
        }


        fieldset {
            border: medium none !important;
            margin: 0 0 10px;
            min-width: 100%;
            padding: 0;
            width: 100%;
        }

        #contact input[type="text"], #contact input[type="date"] {
            width:100%;
            border:1px solid #CCC;
            background:#FFF;
            margin:0 0 5px;
            padding:10px;
        }


        #contact button[type="submit"] {
            cursor:pointer;
            width:100%;
            border:none;
            background:#0CF;
            color:#FFF;
            margin:0 0 5px;
            padding:10px;
            font-size:15px;
        }

        #contact button[type="submit"]:hover {
            background:#09C;
            -webkit-transition:background 0.3s ease-in-out;
            -moz-transition:background 0.3s ease-in-out;
            transition:background-color 0.3s ease-in-out;
        }
        #paword input[type="text"],#paword textarea,#paword select{
            width:100%;
            border:1px solid #CCC;
            background:#FFF;
            margin:0 0 5px;
            padding:10px;
        }
        #paword textarea{
            height: 100px;
        }

        #paword button[type="submit"]{
            cursor:pointer;
            width:100%;
            border:none;
            background:#0CF;
            color:#FFF;
            /*margin:0 0 5px;*/
            padding:10px;
            font-size:15px;
        }
        #paword button[type="submit"]:hover {
            background:#09C;
            -webkit-transition:background 0.3s ease-in-out;
            -moz-transition:background 0.3s ease-in-out;
            transition:background-color 0.3s ease-in-out;
        }
        .six{
            max-width:400px;
            width:100%;
            margin:0 auto;
            position:relative;
        }
        #paword input[type="text"],#paword textarea,#paword select{
            font:400 12px/16px "Open Sans", Helvetica, Arial, sans-serif;
        }
        #paword{
            background:lightskyblue;
            padding:23px;
            margin:5px 0;
        }
        #paword h3{
            color: #F96;
            display: block;
            font-size: 30px;
            font-weight: 400;
        }



        .tone{
            width: 500px;
            height: 85px;
        }
        .three{
            background-color:#0099FF;
        }
        body {

            margin: 0;
            font-size: 1.2em;
            font-family: Helvetica Neue,Helvetica,PingFang SC,Hiragino Sans GB,Microsoft YaHei,Noto Sans CJK SC,WenQuanYi Micro Hei,Arial,sans-serif;
            -webkit-font-smoothing: antialiased;
            background: #f6f6f6;
            color: #333;
        }
        .one{
            height: 100px;
        }
        #rounded-corner
        {
            margin:0px;
            width:700px;
            text-align: left;
            border-collapse: collapse;
        }
        #rounded
        {
            margin:0px;
            width:700px;
            text-align: left;
            border-collapse: collapse;
        }
        table{
            text-align: center;
        }

        #rounded-corner th
        {
            padding: 8px;
            font-weight: normal;
            font-size: 13px;
            color: #039;
            background: #60c8f2;
        }
        #rounded th
        {
            padding: 8px;
            font-weight: normal;
            font-size: 13px;
            color: #039;
            background: #60c8f2;
        }
        #rounded-corner td
        {
            padding: 8px;
            background: #ecf8fd;
            border-top: 1px solid #fff;
            color: #669;
        }
        #rounded td
        {
            font-size: 13px;
            padding: 8px;
            background: #ecf8fd;
            border-top: 1px solid #fff;
            color: #669;
        }
        #rounded-corner tbody tr:hover td
        {
            background: #d2e7f0;
        }
        #rounded tbody tr:hover td
        {
            background: #d2e7f0;
        }
        #glzsd
        {
            margin:0px;
            width:625px;
            text-align: left;
            border-collapse: collapse;
        }
        #glzsd th
        {
            padding: 8px;
            font-weight: normal;
            font-size: 13px;
            color: #039;
            background: #60c8f2;
        }
        #glzsd td
        {
            padding: 8px;
            background: #ecf8fd;
            border-top: 1px solid #fff;
            color: #669;
        }

        #glzsd tbody tr:hover td
        {
            background: #d2e7f0;
        }
        .pages a, .pages span {
            display: inline-block;
            padding: 2px 5px;
            margin: 0 1px;
            border: 1px solid #f0f0f0;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
        }

        .pages a, .pages li {
            display: inline-block;
            list-style: none;
            text-decoration: none;
            color: #58A0D3;
        }

        .pages a.first, .pages a.prev, .pages a.next, .pages a.end {
            margin: 0;
        }

        .pages a:hover {
            border-color: #50A8E6;
        }

        .pages span.current {
            background: #50A8E6;
            color: #FFF;
            font-weight: 700;
            border-color: #50A8E6;
        }
        #szsd
        {
            margin:0px;
            width:625px;
            text-align: left;
            border-collapse: collapse;
        }
        #szsd th
        {
            padding: 8px;
            font-weight: normal;
            font-size: 13px;
            color: #039;
            background: #60c8f2;
        }
        #szsd td
        {
            padding: 8px;
            background: #ecf8fd;
            border-top: 1px solid #fff;
            color: #669;
        }

        #szsd tbody tr:hover td
        {
            background: #d2e7f0;
        }
        #blist
        {
            margin:0px;
            width:625px;
            text-align: left;
            border-collapse: collapse;
        }
        #blist th
        {
            padding: 8px;
            font-weight: normal;
            font-size: 13px;
            color: #039;
            background: #60c8f2;
        }
        #blist td
        {
            padding: 8px;
            background: #ecf8fd;
            border-top: 1px solid #fff;
            color: #669;
        }

        #blist tbody tr:hover td
        {
            background: #d2e7f0;
        }
        #wtcss
        {
            margin:0px;
            width:625px;
            text-align: left;
            border-collapse: collapse;
        }
        #wtcss th
        {
            padding: 8px;
            font-weight: normal;
            font-size: 13px;
            color: #039;
            background: #60c8f2;
        }
        #wtcss td
        {
            padding: 8px;
            background: #ecf8fd;
            border-top: 1px solid #fff;
            color: #669;
        }

        #wtcss tbody tr:hover td
        {
            background: #d2e7f0;
        }
    </style>
</head>
<body>
    <div class="container">
    <div class="row one" style="">
        <div class="row tone">

            <h1 class="pull-left" style="color: #2aabd2">
                <a href="<?php echo U('user/login');?>" style="text-decoration: none"> BTP</a>
            </h1>
        </div>
    </div>
</div>
<div class="row three" style="background-color: #2aabd2">
    <ul class="nav nav-pills" style="margin-left: 20%">
        <!--<li><a href="<?php echo U('xinxi',array('caozuo'=>0));?>">首页</a></li>-->
        <li><a href="<?php echo U('guanliyuan',array('gly'=>0));?>">用户管理</a></li>
        <li><a href="<?php echo U('guanliyuan',array('gly'=>1));?>">修改个人资料</a></li>
        <li><a href="<?php echo U('guanliyuan',array('gly'=>2));?>">添加知识点</a></li>
        <li><a href="<?php echo U('guanliyuan',array('gly'=>3));?>">知识点管理</a></li>
        <li><a href="<?php echo U('guanliyuan',array('gly'=>4));?>">题库管理</a></li>
<?php if($j == 0 || $j == 7): ?><li class="pull-center">
                <form class="navbar-form navbar-left" action="<?php echo U('project/guanliyuan',array('gly'=>7,'yid'=>$gly));?>">
                    <div class="form-group">
                        <input type="text" name="sousuo" id="sousuo2" placeholder="请输入搜索关键词..." class="form-control"/>
                    </div>
                    <input type="submit" value="搜索" class="btn btn-info"/>
                </form>
            </li>
    <?php elseif($j == 3 || $j == 8): ?>
    <li class="pull-center">
        <form class="navbar-form navbar-left" action="<?php echo U('project/guanliyuan',array('gly'=>8,'yid'=>$gly));?>">
            <div class="form-group">
                <input type="text" name="sousuo" id="sousuo" placeholder="请输入搜索关键词..." class="form-control"/>
            </div>
            <input type="submit" value="搜索" class="btn btn-info"/>
        </form>
    </li>
    <?php elseif($j == 4 || $j == 9): ?>
    <li class="pull-center">
        <form class="navbar-form navbar-left" action="<?php echo U('project/guanliyuan',array('gly'=>9,'yid'=>$gly));?>">
            <div class="form-group">
                <input type="text" name="sousuo"  placeholder="请输入搜索关键词..." class="form-control"/>
            </div>
            <input type="submit" value="搜索" class="btn btn-info"/>
        </form>
    </li><?php endif; ?>

    </ul>
</div>
<div class="container">


<?php if($gly == 0): ?><h2 style="text-align: center">用户管理</h2>
    <div class="yhgl container " >

        <table id="rounded-corner" style="margin-left:20% " >
            <thead>
            <tr>
                <th scope="col" class="rounded">姓名</th>
                <th scope="col" class="rounded">性别</th>
                <th scope="col" class="rounded">生日</th>
                <th scope="col" class="rounded">电话</th>
                <th scope="col" class="rounded">邮箱</th>
                <th scope="col" class="rounded">QQ</th>
                <th scope="col" class="rounded">最后修改时间</th>
                <th scope="col" class="rounded-q4">状态</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($select)): foreach($select as $key=>$se): ?><tr>
                <td><?php echo ($se["uname"]); ?></td>
                <td><?php echo ($se["usex"]); ?></td>
                <td><?php echo ($se["ubirthday"]); ?></td>
                <td><?php echo ($se["umobile"]); ?></td>
                 <td><?php echo ($se["uemail"]); ?></td>
                    <td><?php echo ($se["uqq"]); ?></td>
                <td><?php echo ($se["ulastupdatetime"]); ?></td>
                    <td>
                        <?php if($se["uisvalid"] == 0): ?><a href="<?php echo U('zhuangtai',array('uid'=>$se['uid']));?>">不可用</a>
                            <?php elseif($se["uisvalid"] == 1): ?>
                            <a href="<?php echo U('zhuangtai',array('uid'=>$se['uid']));?>">可用</a><?php endif; ?>

                    </td>

            </tr><?php endforeach; endif; ?>
            </tbody>
        </table>

        <hr>
        <div class="content" style="text-align: center;">
            <div class="pages"><?php echo ($page); ?></div>
        </div>
    </div>

    <?php elseif($gly == 1): ?>

    <div class="container four">
        <form id="contact" action="<?php echo U('project/xiugaiuser');?>" method="post">
            <h3 style="text-align: center">个人资料修改</h3>
            <?php if(is_array($chaxun)): foreach($chaxun as $key=>$ch): ?><fieldset>
                    姓名<input  type="text" name="aname" id="aname" value="<?php echo ($ch["aname"]); ?>" tabindex="1" required autofocus>
                </fieldset>
                <fieldset>
                    <p>生日</p>
                    <input  type="date" name="abirthday" id="abirthday" value="<?php echo ($ch["abirthday"]); ?>" tabindex="2" required>
                </fieldset>
                <fieldset>
                    电话<input  type="text" id="amobile" name="amobile" value="<?php echo ($ch["amobile"]); ?>" tabindex="3" required>
                </fieldset>
                <fieldset>
                    邮件<input type="text" id="aemail" name="aemail" value="<?php echo ($ch["aemail"]); ?>" tabindex="4" required>
                </fieldset>
                <fieldset>
                    QQ<input type="text" name="aqq" id="aqq" value="<?php echo ($ch["aqq"]); ?>" tabindex="5" required>
                </fieldset>
                <fieldset>
                    <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">修改</button>
                </fieldset><?php endforeach; endif; ?>
        </form>

    </div>
    <?php elseif($gly == 2): ?>
<div class="contianer five">


    <div class="tab-content" style="text-align: center">
        <h2>发表知识点</h2>
        <form action="<?php echo U('project/xgzsd');?>" method="post" style="text-align: center">
            <div align="left" style="font-size: 20px">
               <button class="btn btn-primary btn-lg">标题</button>
                <input type="text" id="title" name="title" style="width: 25%" class="input-lg">

                <select id="classa" name="classa" style="width: 15%;" class="input-lg">
                    <?php if(is_array($bselect)): foreach($bselect as $key=>$val): ?><option value="<?php echo ($val["bid"]); ?>" id="<?php echo ($val["bid"]); ?>"><?php echo ($val["bname"]); ?></option><?php endforeach; endif; ?>
                </select>
                <select name="classb" id="classb" style="width: 15%;" class="input-lg">

                </select>

            <div style="margin-top: 20px">
                <script id="editor1" name="editor1" type="text/plain"></script>
            </div>

            <p style="text-align: center">
                <input type="submit" value=" 添加 " class="btn btn-primary btn-lg">
            </p>
            </div>
        </form>

    </div>
</div>


    <?php elseif($gly == 3): ?>
    <h2 style="text-align: center">知识点管理</h2>
    <div class="yhgl container " >
        <table id="glzsd" style="margin-left:20% " >
            <thead>
            <tr>
                <th scope="col" class="rounded">标题</th>
                <th scope="col" class="rounded">类别</th>
                <th scope="col" class="rounded">修改时间</th>
                <th scope="col" class="rounded">状态</th>
                <th scope="col" class="rounded-q4">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($zse)): foreach($zse as $key=>$z): ?><tr>

                    <td><?php echo ($z["zbiaoti"]); ?></td>
                    <td><?php echo ($z["sname"]); ?></td>
                    <td><?php echo ($z["zlastupdatetime"]); ?></td>
                <td>
                    <?php if($z["zisvalid"] == 0): ?><a href="<?php echo U('ztzsd',array('zid'=>$z['zid']));?>">不可用</a>
                        <?php elseif($z["zisvalid"] == 1): ?>
                        <a href="<?php echo U('ztzsd',array('zid'=>$z['zid']));?>">可用</a><?php endif; ?>

                </td>
                    <td><a href="<?php echo U('guanliyuan',array('gly'=>5,'zid'=>$z['zid']));?>" class="ask" style="text-decoration: none">修改</a>

                    </td>
            </tr><?php endforeach; endif; ?>
            </tbody>
        </table>
        <hr>
        <div class="content" style="text-align: center;">
            <div class="pages"><?php echo ($page); ?></div>
        </div>
    </div>


    <?php elseif($gly == 4): ?>
    <h2 style="text-align: center">题库管理</h2>
    <div class="yhgl container" >
            <table id="blist"  style="margin-left:20% ">
                <thead>
                <tr>
                    <th scope="col" class="rounded">标题</th>
                    <th scope="col" class="rounded">最后修改时间</th>
                    <th scope="col" class="rounded">类别</th>
                    <th scope="col" class="rounded">状态</th>
                    <th scope="col" class="rounded">操作</th>
                </tr>
                </thead>
               <tbody>
               <?php if(is_array($lxtse)): foreach($lxtse as $key=>$lx): ?><tr>
                   <td>
                       <a href="<?php echo U('guanliyuan',array('gly'=>6,'tid'=>$lx['tid']));?>"  style="text-decoration: none">
                           <?php echo mb_substr($lx[wenti],0,10);?>...
                       </a>
                   </td>
                   <td><?php echo ($lx["tlastupdatetime"]); ?></td>
                   <td><?php echo ($lx["bname"]); ?></td>
                   <td>   <?php if($lx["tisvalid"] == 0): ?><a href="<?php echo U('swt',array('tid'=>$lx['tid']));?>">不可用</a>
                       <?php elseif($lx["tisvalid"] == 1): ?>
                       <a href="<?php echo U('swt',array('tid'=>$lx['tid']));?>">可用</a><?php endif; ?>
                   </td>
                   <td> <a href="<?php echo U('guanliyuan',array('gly'=>6,'tid'=>$lx['tid']));?>" id="<?php echo ($lx["tid"]); ?>" style="text-decoration: none">
                      修改
                   </a></td>
               </tr><?php endforeach; endif; ?>
               </tbody>

           </table>



    </div>
        <div class="content" style="text-align: center;">
            <div class="pages"><?php echo ($page); ?></div>
        </div>
    <?php elseif($gly == 5): ?>
    <div class="contianer ceshi">
        <div class="tab-content" style="text-align: center">
            <h2>修改知识点</h2>
            <form action="<?php echo U('project/xiugaizsd');?>" method="post" style="text-align: center">

                <div align="left" style="font-size: 20px">
                    <button class="btn btn-primary btn-lg">标题</button>
                    <?php if(is_array($select)): foreach($select as $key=>$se): ?><input type="text" id="titlei" value="<?php echo ($se["zbiaoti"]); ?>" name="title" style="width: 25%" class="input-lg"><?php endforeach; endif; ?>

                    <select name="neibie" id="neibie" style="width: 15%;" class="input-lg">
                        <?php if(is_array($scla)): foreach($scla as $key=>$sc): ?><option value="<?php echo ($sc["sid"]); ?>" id="<?php echo ($sc["sid"]); ?>"><?php echo ($sc["sname"]); ?></option><?php endforeach; endif; ?>
                    </select>

                </div>
                <?php if(is_array($select)): foreach($select as $key=>$se): ?><!--<?php echo htmlspecialchars_decode($se[zcontent]);?>-->


             <div style="margin-top: 20px">
                    <script id="editor2"  name="editor2" type="text/plain">
    <?php echo htmlspecialchars_decode($se['zcontent']);;?>
                    </script>
                </div><?php endforeach; endif; ?>
                <p style="">
                    <input type="submit" value=" 确认修改 " class="btn btn-primary btn-lg">
                </p>

            </form>

        </div>
    </div>
    <?php elseif($gly == 6): ?>
    <div class="container six">
        <form id="paword" action="<?php echo U('project/xiugaiwt');?>" method="post">
            <h3 style="text-align: center">问题修改</h3>
            <?php if(is_array($lcx)): foreach($lcx as $key=>$lc): ?><fieldset>
                <!--问题<input  type="text" value="<?php echo ($lc["wenti"]); ?>" tabindex="1" required autofocus>-->
 <p> 问题</p>
                <textarea name="wenti"   id="wenti" cols="30" rows="10"><?php echo ($lc["wenti"]); ?></textarea>
            </fieldset>
            <fieldset>
                选项 A<input  type="text" name="one" id="one" value="<?php echo ($lc["tone"]); ?>" tabindex="2" required>
            </fieldset>
            <fieldset>
                选项 B<input  type="text"  name="two" id="two"  value="<?php echo ($lc["ttwo"]); ?>" tabindex="3" required>
            </fieldset>
            <fieldset>
                选项 C<input type="text" id="three" name="three" value="<?php echo ($lc["tthree"]); ?>" tabindex="4" required>
            </fieldset>
                选项 D<fieldset><input type="text" id="four" name="four" value="<?php echo ($lc["tfour"]); ?>" tabindex="4" required></fieldset>
            <fieldset>
                正确答案
                <select name="daan" id="daan">
                    <option value="<?php echo ($lc["tdaan"]); ?>"><?php echo ($lc["tdaan"]); ?></option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                </select>
            </fieldset><?php endforeach; endif; ?>
            <fieldset>
                <button name="submit" type="submit" id="powersubmit" data-submit="...Sending">修改</button>
            </fieldset>
        </form>
    </div>
    <?php elseif($gly == 7): ?>
    <h2 style="text-align: center">用户管理</h2>
    <div class="yhgl container " >

        <table id="rounded" style="margin-left:20% " >
            <thead>
            <tr>
                <th scope="col" class="rounded">姓名</th>
                <th scope="col" class="rounded">性别</th>
                <th scope="col" class="rounded">生日</th>
                <th scope="col" class="rounded">电话</th>
                <th scope="col" class="rounded">邮箱</th>
                <th scope="col" class="rounded">QQ</th>
                <th scope="col" class="rounded">最后修改时间</th>
                <th scope="col" class="rounded-q4">状态</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($uss)): foreach($uss as $key=>$us): ?><tr>
                    <td><?php echo ($us["uname"]); ?></td>
                    <td><?php echo ($us["usex"]); ?></td>
                    <td><?php echo ($us["ubirthday"]); ?></td>
                    <td><?php echo ($us["umobile"]); ?></td>
                    <td><?php echo ($us["uemail"]); ?></td>
                    <td><?php echo ($us["uqq"]); ?></td>
                    <td><?php echo ($us["ulastupdatetime"]); ?></td>
                    <td>
                        <?php if($us["uisvalid"] == 0): ?><a href="<?php echo U('sousuo',array('uid'=>$us['uid']));?>">不可用</a>
                            <?php elseif($us["uisvalid"] == 1): ?>
                            <a href="<?php echo U('sousuo',array('uid'=>$us['uid']));?>">可用</a><?php endif; ?>

                    </td>
                </tr><?php endforeach; endif; ?>
            </tbody>
        </table>

        <hr>
        <!--<div class="content" style="text-align: center;">-->
            <!--<div class="pages"><?php echo ($page); ?></div>-->
        <!--</div>-->
    </div>
    <?php elseif($gly == 8): ?>
    <h2 style="text-align: center">知识点管理</h2>
    <div class="yhgl container " >

        <table id="szsd" style="margin-left:20% " >
            <thead>
            <tr>
                <th scope="col" class="rounded">标题</th>
                <th scope="col" class="rounded">类别</th>
                <th scope="col" class="rounded">修改时间</th>
                <th scope="col" class="rounded">状态</th>
                <th scope="col" class="rounded-q4">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($szsd)): foreach($szsd as $key=>$sz): ?><tr>

                    <td><?php echo ($sz["zbiaoti"]); ?></td>
                    <td><?php echo ($sz["sname"]); ?></td>
                    <td><?php echo ($sz["zlastupdatetime"]); ?></td>
                    <td><?php if($sz["zisvalid"] == 0): ?><a href="<?php echo U('sozsd',array('zid'=>$sz['zid']));?>">不可用</a>
                        <?php elseif($sz["zisvalid"] == 1): ?>
                        <a href="<?php echo U('sozsd',array('zid'=>$sz['zid']));?>">可用</a><?php endif; ?></td>
                    <td><a href="<?php echo U('guanliyuan',array('gly'=>5,'zid'=>$sz['zid']));?>" class="ask" style="text-decoration: none">修改</a>
                    </td>
                </tr><?php endforeach; endif; ?>
            </tbody>
        </table>
        <hr>
        <div class="content" style="text-align: center;">
            <div class="pages"><?php echo ($page); ?></div>
        </div>
    </div>
    <?php elseif($gly == 9): ?>
    <h2 style="text-align: center">题库管理</h2>
    <div class="yhgl container" >
        <table id="wtcss"  style="margin-left:20% ">
            <thead>
            <tr>
                <th scope="col" class="rounded">标题</th>
                <th scope="col" class="rounded">最后修改时间</th>
                <th scope="col" class="rounded">类别</th>
                <th scope="col" class="rounded">状态</th>
                <th scope="col" class="rounded">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($sswt)): foreach($sswt as $key=>$st): ?><tr>
                    <td>
                        <a href="<?php echo U('guanliyuan',array('gly'=>6,'tid'=>$st['tid']));?>"  style="text-decoration: none">
                            <?php echo mb_substr($st[wenti],0,10);?>...
                        </a>
                    </td>
                    <td><?php echo ($st["tlastupdatetime"]); ?></td>
                    <td><?php echo ($st["bname"]); ?></td>
                    <td>   <?php if($st["tisvalid"] == 0): ?><a href="<?php echo U('souwt',array('tid'=>$st['tid']));?>">不可用</a>
                        <?php elseif($st["tisvalid"] == 1): ?>
                        <a href="<?php echo U('souwt',array('tid'=>$st['tid']));?>">可用</a><?php endif; ?>
                    <td> <a href="<?php echo U('guanliyuan',array('gly'=>6,'tid'=>$st['tid']));?>" style="text-decoration: none">
                        修改
                    </a></td>
                </tr><?php endforeach; endif; ?>
            </tbody>

        </table>



    </div><?php endif; ?>



</div>






<script src="/Public/js/jquery-1.12.2.min.js"></script>
<script src="/Public/js/bootstrap.min.js"></script>
    <script>
        var ue1 = UE.getEditor('editor1');
        var uek = UE.getEditor('editor2');
        ue1.ready(function () {

        });

        $(document).ready(function(){
            //一级分类联动二级分类
            $("#classa").change(function(){
                var val=$(this).val();
//                alert(val);
                $("#classb").load("/Home/Project/classa",{data:val});
            }) });

    </script>
</body>
</html>