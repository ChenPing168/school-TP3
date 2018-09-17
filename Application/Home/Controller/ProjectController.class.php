<?php
/**
 * Created by PhpStorm.
 * User: huchuanyun
 * Date: 2017/12/1
 * Time: 10:55
 */

namespace Home\Controller;


use Think\Controller;

class ProjectController extends Controller
{
    public function guanliyuan()
    {
        $i = I('get.gly');
        $j=I('gly');
//        dump($j);
        if ($i == 0) {
            $user = M('user');
            $count = $user->count();
            $Page = new\Think\Page($count, 5);
            $select = $user->limit($Page->firstRow . ',' . $Page->listRows)->order('ulastupdatetime desc')->select();
            $Page->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;当前为第<b>%NOW_PAGE%</b>页,共<b>%TOTAL_PAGE%</b>页</li>');
            $Page->setConfig('first', '首页');
            $Page->setConfig('prev', '上一页');
            $Page->setConfig('next', '下一页');
            $Page->setConfig('last', '末页');
            $Page->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
            $Page->lastSuffix = false;//最后一页不显示为总页数
            $show = $Page->show();
            $this->assign('page', $show);// 赋值分页输出
            $this->assign('select', $select);
        } elseif ($i == 1) {
            $aid=session('aid');
            $admin=M('admin');
            $chaxun=$admin->where("aid='$aid'")->select();
            $this->assign('chaxun',$chaxun);
        } elseif ($i == 2) {
            $bc = M('bclass');
            $bselect = $bc->select();
            $this->assign('bselect', $bselect);

        } elseif ($i == 3) {

            $count = M()->table(array('sclass' => 's', 'zhishi' => 'z'))->where("s.sid=z.sid ")->count();
            $Page = new\Think\Page($count, 6);
            $select = M()->table(array('sclass' => 's', 'zhishi' => 'z'))->where("s.sid=z.sid ")->order('zlastupdatetime desc')->limit($Page->firstRow . ',' . $Page->listRows)->select();
            $Page->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;当前为第<b>%NOW_PAGE%</b>页,共<b>%TOTAL_PAGE%</b>页</li>');
            $Page->setConfig('first', '首页');
            $Page->setConfig('prev', '上一页');
            $Page->setConfig('next', '下一页');
            $Page->setConfig('last', '末页');
            $Page->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
            $Page->lastSuffix = false;//最后一页不显示为总页数
            $show = $Page->show();
            $this->assign('page', $show);// 赋值分页输出
            $this->assign('zse', $select);
        } elseif ($i == 4) {
            $lianxiti = M('lianxiti');
//$lxtse=$lianxiti->select();
            $count = M()->table(array('bclass'=>'b','lianxiti'=>'l'))->where("b.bid=l.bid")->count();
            $Page = new\Think\Page($count, 6);
            $lxtse = M()->table(array('bclass'=>'b','lianxiti'=>'l'))->where("b.bid=l.bid")->order('tlastupdatetime desc')->limit($Page->firstRow . ',' . $Page->listRows)->select();

            $Page->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;当前为第<b>%NOW_PAGE%</b>页,共<b>%TOTAL_PAGE%</b>页</li>');
            $Page->setConfig('first', '首页');
            $Page->setConfig('prev', '上一页');
            $Page->setConfig('next', '下一页');
            $Page->setConfig('last', '末页');
            $Page->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
            $Page->lastSuffix = false;//最后一页不显示为总页数
            $show = $Page->show();
            $this->assign('page', $show);// 赋值分页输出
//dump($lxtse);
            $this->assign('lxtse', $lxtse);
        }
        elseif ($i == 5) {
            $zid = I('zid');
            session('zid', $zid);
            $select = M()->table(array('zhishi' => 'z', 'sclass' => 's'))->where("z.sid=s.sid and z.zid='$zid'")->select();
            $sclass = M('sclass');
            $scla = $sclass->select();
//           $fid=$zhishi->where("zid='$zid'")->find();
//            $fsid=$fid['sid'];
//            dump($fsid);
            $this->assign('scla', $scla);
            $this->assign('select', $select);
        } elseif ($i == 6) {
            $tid = I('tid');
            session('tid', $tid);
            $lxt = M('lianxiti');
            $lcx = $lxt->where("tid='$tid'")->select();
//            dump($lcx);
            $this->assign('lcx', $lcx);
        }
        //用户搜索
        elseif ($i==7){
            $sousuo=I('sousuo');
            $yid=I('yid');
            $user=M('user');
            if (!empty($sousuo)){
                if ($yid==0 || 7){
                    session('sousuo',$sousuo);
                    session('yid',$yid);
                    $data['uname']=array("LIKE",'%'.$sousuo.'%');
                    $usousuo=$user->where($data)->order('ulastupdatetime desc')->select();
                    $this->assign('uss',$usousuo);
                }
            }
            else{
                redirect(U('guanliyuan',array('gly'=>$yid)));
            }


        }
        //知识点搜索
        elseif ($i==8){
            $sousuo=I('sousuo');
            $yid=I('yid');

            if (!empty($sousuo)){

                if ($yid==3 || $yid==8){
                    session('sz',$sousuo);
                    session('zd',$yid);
                    $szsd=M()->query("SELECT * FROM sclass s, zhishi z  WHERE s.`sid`=z.`sid` AND z.`zbiaoti` LIKE '%".$sousuo."%' ORDER BY  zlastupdatetime desc");
                    $this->assign('szsd',$szsd);
                }
            }
            else{
                redirect(U('guanliyuan',array('gly'=>$yid)));
            }
        }
        elseif ($i==9){
            $sousuowt=I('sousuo');
//            dump($sousuowt);
            $wtid=I('yid');
//            dump($wtid);
            if (!empty($sousuowt)){

                if ($wtid==4 || $wtid==9){
                    session('st',$sousuowt);
                    session('wd',$wtid);
                    $sswt=M()->query("SELECT * FROM lianxiti l,bclass b WHERE l.bid=b.bid and  l.wenti  LIKE '%$sousuowt%' ");

//                    dump($sswt);
                    $this->assign('sswt',$sswt);
                }
            }
            else{
//                redirect(U('guanliyuan',array('gly'=>$wtid)));
            }
        }
        $this->assign('j',$j);
        $this->assign('gly', $i);
        $this->display();
    }
//修改用户状态
    public function zhuangtai()
    {
        $uid = I('uid');
//        dump($uid);
        $user = M('user');
        $ud = $user->where("uid='$uid'")->find();
        $vid = $ud['uisvalid'];
//        dump($vid);
        if ($vid == 1) {
            $data['uisvalid'] = 0;
            $data['ulastupdatetime'] = date("Y-m-d H:i:s", time());
            $uvid = $user->where("uid='$uid'")->save($data);
            if ($uvid) {
//                $this->success('成功',U('guanliyuan'),5);
                redirect(U('guanliyuan'));
            }
        } else {
            $data['uisvalid'] = 1;
            $uvid = $user->where("uid='$uid'")->save($data);
            if ($uvid) {
//                $this->success('成功',U('guanliyuan'),5);
                redirect(U('guanliyuan'));
            }
        }
    }
//分类
    public function classa()
    { //一级分类联动二级分类
        //var_dump($_POST['data']);
        //echo $_POST['data'];
        $classa_id = $_POST['data'];  //接收模板文件jquery $(load)传来参数。data
//        dump($classa_id);
        $m = M('sclass');
        $where['bid'] = $classa_id;
        $query = $m->where($where)->select();   //在二级分类表classb里找出字段class_id=$class_id

//        session('sid',$sid);
//        var_dump($query[0]['sname']);
        $sn = $query[0]['sname'];
        $sd = $query[0]['sid'];
        if ($query) {  //判断如果有数据就显示  二级分类   如果无数据就显示 无分类
            $temp = "<option selected='selected' id='$sd' value='$sd'>$sn</option>";
        } else {
            $temp = "<option selected='selected'>无分类</option>";
        }
        //循环数组
        foreach ($query as $key => $value) {
            $temp .= "<option id='" . $query[$key]['sid'] . "' value='" . $query[$key]['sid'] . "'>" . $query[$key]['sname'] . "</option>";

        }

        //var_dump($query);
        //echo $m->getLastSql();
        echo $temp;
        $this->assign('temp', $temp);
    }
//添加知识点
    public function xgzsd()
    {
        $title = I('title');
        $classa = I('classa');
        $classb = I('classb');
        $editor1 = I('editor1');

//        dump($title);
//        dump($editor1);
//        dump($classa);
//        dump($classb);
        $zs = M('zhishi');
        if (!empty($title)) {
            if (!empty($classb)) {
                if (!empty($editor1)) {
                    $date = date("Y-m-d H:i:s", time());
                    $datew = date("Y-m-d H:i:s", time());
                    $nr = array('zid' => null, 'sid' => $classb, 'zbiaoti' => $title, 'zcontent' => $editor1, 'zregtime' => $date,'zlastupdatetime'=>$datew, 'zisvalid' => 1);
                    $tianjia = $zs->add($nr);
                    if ($tianjia) {
                        $this->success('成功', '', 30);
                    } else {
                        $this->error('失败', '', 30);
                    }
                } else {
                    $this->error('内容不能为空', '', '30');
                }
            } else {
                $this->error('下级分类不能为空', '', '30');
            }
        } else {
            $this->error('标题不能为空', '', '30');
        }
    }
//修改知识点
    public function xiugaizsd()
    {
        $title = I('title');
        $neibie = I('neibie');
        $editor1 = I('editor2');
        $zid = session('zid');
//          dump($zid);
//          dump($title);
//          dump($neibie);
//          dump($editor1);
        $date = date("Y-m-d H:i:s", time());


        if (!empty($title)) {
            $data = array('sid' => $neibie, 'zbiaoti' => $title, 'zcontent' => $editor1, 'zlastupdatetime' => $date);
            if (!empty($editor1)) {
                $zsxg = M('zhishi');
                $xiugai = $zsxg->where("zid='$zid'")->save($data);
                if ($xiugai) {
                    $this->success('成功', U('project/guanliyuan', array('gly' => 3)), 30);
                } else {
                    $this->error('失败', '', 30);
                }
            } else {
                $this->error('内容不能为空', '', 30);
            }
        } else {
            $this->error('标题不能为空', '', 30);
        }
    }


//修改问题
    public function xiugaiwt()
    {
        $wenti = I('wenti');
        $one = I('one');
        $two = I('two');
        $three = I('three');
        $four = I('four');
        $daan = I('daan');
        $tid = session('tid');
        if (!empty($wenti)) {
            if (!empty($one && $two && $three && $four)) {
                if (!empty($daan)) {
                    $data = array('wenti' => $wenti, 'tone' => $one, 'ttwo' => $two, 'tthree' => $three, 'tfour' => $four, 'tdaan' => $daan);
                    $lxt = M('lianxiti');
                    $xiugai = $lxt->where("tid='$tid'")->save($data);

                        $this->success('OK', U('project/guanliyuan', array('gly' => 4)), 30);

                } else {
                    $this->error('答案不能为空', '', 30);
                }
            } else {
                $this->error('任一选项不能为空', '', 30);
            }

        } else {
            $this->error('问题不能为空', '', 30);
        }
    }
//搜索用户后的状态修改
    public function sousuo(){
        $yid=session('yid');
        $ss=session('sousuo');
//        dump($yid);
//        dump($ss);
        $uid = I('uid');

//        dump($uid);
        $user = M('user');
        $ud = $user->where("uid='$uid'")->find();
        $vid = $ud['uisvalid'];
//        dump($vid);
        if ($vid == 1) {
            $data['uisvalid'] = 0;
            $data['ulastupdatetime']=date("Y-m-d H:i:s", time());
            $uvid = $user->where("uid='$uid'")->save($data);
            if ($uvid) {
//                $this->success('成功',U('guanliyuan',array('gly'=>7,'yid'=>$yid,'sousuo'=>$ss)),5);
                redirect(U('guanliyuan',array('gly'=>7,'yid'=>$yid,'sousuo'=>$ss)));
            }
        } else {
            $data['uisvalid'] = 1;
            $uvid = $user->where("uid='$uid'")->save($data);
            if ($uvid) {
//                $this->success('成功',U('guanliyuan',array('gly'=>7,'yid'=>$yid,'sousuo'=>$ss)),5);
                redirect(U('guanliyuan',array('gly'=>7,'yid'=>$yid,'sousuo'=>$ss)));
            }
        }



    }
    //搜索知识点
    public function ztzsd()
    {
        $zid = I('zid');
//        dump($zid);
        $zhishi = M('zhishi');
        $zd = $zhishi->where("zid='$zid'")->find();
        $zsid = $zd['zisvalid'];
//        dump($zsid);
        if ($zsid==1) {
            $data['zisvalid'] = 0;
            $data['zlastupdatetime'] = date("Y-m-d H:i:s", time());
//            dump($data);
            $uzid = $zhishi->where("zid='$zid'")->save($data);
//            dump($uzid);
            if ($uzid) {
//                $this->success('成功1',U('guanliyuan',array('gly'=>3)),5);
                redirect(U('guanliyuan',array('gly'=>3)));
            }
        } else {
            $data['zisvalid'] = 1;
            $data['zlastupdatetime'] = date("Y-m-d H:i:s", time());
            $uvid = $zhishi->where("zid='$zid'")->save($data);
//            dump($uvid);
            if ($uvid) {
//                $this->success('成功2',U('guanliyuan',array('gly'=>3)),5);
                redirect(U('guanliyuan',array('gly'=>3)));
            }
        }
    }
    //搜索知识点后的状态修改

    public function sozsd(){
        $zd=session('zd');
//        dump($zd);
        $sz=session('sz');
//        dump($sz);
        $zid = I('zid');
        $user = M('zhishi');
        $ud = $user->where("zid='$zid'")->find();
        $vid = $ud['zisvalid'];
//        dump($vid);
        if ($vid == 1) {
            $data['zisvalid'] = 0;
            $data['zlastupdatetime'] = date("Y-m-d H:i:s", time());
            $uvid = $user->where("zid='$zid'")->save($data);
            if ($uvid) {
//                $this->success('成功',U('guanliyuan',array('gly'=>7,'yid'=>$yid,'sousuo'=>$ss)),5);
                redirect(U('guanliyuan',array('gly'=>8,'yid'=>$zd,'sousuo'=>$sz)));
            }
        } else {
            $data['zisvalid'] = 1;
            $data['zlastupdatetime'] = date("Y-m-d H:i:s", time());
            $uvid = $user->where("zid='$zid'")->save($data);
            if ($uvid) {
//                $this->success('成功',U('guanliyuan',array('gly'=>7,'yid'=>$yid,'sousuo'=>$ss)),5);
                redirect(U('guanliyuan',array('gly'=>8,'yid'=>$zd,'sousuo'=>$sz)));
            }
        }



    }
    //修改问题装台
    public function swt()
{
    $tid = I('tid');
//    dump($tid);
    $lxt = M('lianxiti');
    $td = $lxt->where("tid='$tid'")->find();
    $vid = $td['tisvalid'];
//    dump($vid);
    if ($vid == 1) {
        $data['tisvalid'] = 0;
        $data['tlastupdatetime'] = date("Y-m-d H:i:s", time());
        $uvid = $lxt->where("tid='$tid'")->save($data);
        if ($uvid) {

            redirect(U('guanliyuan',array('gly'=>4)));
        }
    } else {
        $data['tisvalid'] = 1;
        $uvid = $lxt->where("tid='$tid'")->save($data);
        if ($uvid) {

            redirect(U('guanliyuan',array('gly'=>4)));
        }
    }
}

    public function souwt()
    {
        $st=session('st');
        $wd=session('wd');
        $tid = I('tid');
//        dump($tid);
        $lxt = M('lianxiti');
        $td = $lxt->where("tid='$tid'")->find();
        $vid = $td['tisvalid'];
//        dump($vid);
        if ($vid == 1) {
            $data['tisvalid'] = 0;
            $data['tlastupdatetime'] = date("Y-m-d H:i:s", time());
            $uvid = $lxt->where("tid='$tid'")->save($data);
            if ($uvid) {

                redirect(U('guanliyuan',array('gly'=>4)));
            }
        } else {
            $data['tisvalid'] = 1;
            $uvid = $lxt->where("tid='$tid'")->save($data);
            if ($uvid) {

                redirect(U('guanliyuan',array('gly'=>4)));
            }
        }
    }
    public function xiugaiuser(){
        $aid=session('aid');
        $aname=I('aname');
        $abirthday=I('abirthday');
        $amobile=I('amobile');
        $aemail=I('aemail');
        $aqq=I('aqq');
        dump($amobile);
        $date = date("Y-m-d H:i:s", time());
        $data=array('aname'=>$aname,'abirthday'=>$abirthday,'amobile'=>$amobile,
            'aemail'=>$aemail,'aqq'=>$aqq,'alastupdatetime'=>$date);
        $admin=M('admin');
        $xiugai=$admin->where("aid='$aid'")->save($data);
        if ($xiugai){
            $this->success('OK',U('project/guanliyuan'),30);
        }
        else{
            $this->error('失败','',30);
        }
    }
}