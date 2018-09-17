<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2017/12/5
 * Time: 16:43
 */


namespace Home\Controller;
use Think\Controller;
use Think\Model;

class BtpController extends Controller
{
    //打开用户登录后index
    public function index(){
        $bclass = M('bclass','');
        $sclass = M('sclass','');
        $bclasslist = $bclass->select();
        $sclasslist = $sclass->query('SELECT * FROM bclass b,sclass s WHERE b.`bid`=s.`bid` ORDER BY  b.`bid`');
        $this->assign('bclasslist',$bclasslist);// 赋值数据集
        $this->assign('sclasslist',$sclasslist);// 赋值数据集

        $this->display('index');
    }
    public function Cainiao_note(){
        $user=M("user");
        $uid = $_SESSION['uid'];
        $note = $user->table('biji bj,user u,zhishi zs,bclass bc,sclass sc ')
            ->where("u.uid=bj.uid and bj.zid=zs.zid and zs.sid=sc.sid and sc.bid=bc.bid")
//            ->field('distinct bc.bname, bj.bcontent,bj.btime')
            ->order('btime desc')->select();
        $this->assign('note', $note);
        $this->display();
    }
    public function Xiangqing_note(){
        $user=M("user");
        $uid = $_SESSION['uid'];
        $zbiaoti = I("get.zbiaoti");
        $note = $user->table('biji bj,user u,zhishi zs,bclass bc,sclass sc ')
            ->where("u.uid=bj.uid and bj.zid=zs.zid and zs.sid=sc.sid and sc.bid=bc.bid and u.uid='$uid' and zs.zbiaoti='$zbiaoti' ")
            ->order('btime desc')->select();
        $this->assign('note', $note);
        $this->display();
    }
    public function szlist(){
        $bid = $_GET['bid'];
        $sclass = M('sclass','');
        $zhishi = M('zhishi','');
        $sclasslist = $sclass->query('select * from sclass where bid='.$bid);
        $zhishilist = $zhishi->query('SELECT * FROM zhishi z,sclass s WHERE z.`sid`=s.`sid` ORDER BY  s.`sid`');
        $this->assign('sclasslist',$sclasslist);// 赋值数据集
        $this->assign('zhishilist',$zhishilist);// 赋值数据集
        $this->display('szlist');
    }
    public function zs(){
        $zid = $_GET['zid'];
        $sid = $_GET['sid'];
        $zs = $_GET['zs'];
        $zhishi = M('zhishi','');
        if($sid){
            $zhishilist = $zhishi->query('select * from zhishi where sid='.$sid);
            $zhishicon = $zhishi->query('select * from zhishi where zid='.$zid);
        }
        if($zs){
            $zhishilist = $zhishi->query("SELECT * FROM zhishi WHERE zbiaoti LIKE '%".$zs."%' OR zcontent LIKE '%".$zs."%'");
            $zhishicon = $zhishi->query('select * from zhishi where zid='.$zid);
        }
        $this->assign('zhishilist',$zhishilist);// 赋值数据集
        $this->assign('zhishicon',$zhishicon);// 赋值数据集
        $this->assign('zid',$zid);// 赋值数据集
        $this->assign('sid',$sid);// 赋值数据集
        $this->assign('zs',$zs);// 赋值数据集
        $this->display('zs');
    }
    public function sousuo(){
        $zs=$_GET['zs'];

        if($zs){
            $zhishilist = M('')->query("SELECT * FROM zhishi WHERE zbiaoti LIKE '%".$zs."%' OR zcontent LIKE '%".$zs."%'");
        }
        $this->assign('zhishilist',$zhishilist);// 赋值数据集
        $this->assign('zs',$zs);// 赋值数据集
        $this->display('sousuo');
    }


    public function ceyan(){
//        $score=$_GET['score'];
        $bid = $_GET['bid'];
        $num = $_GET['num'];
        $bclass = M('bclass','');
        $lianxiti = M('lianxiti','');
        $bclasslist = $bclass->select();
        $bname = $bclass->query('select * from bclass WHERE bid='.$bid);
        if($bid==2){
            $tid=rand(1,20);
            $GLOBALS = $lianxiti->query("SELECT * FROM lianxiti WHERE bid=".$bid ." AND tid=".$tid);
        }
        if($bid==1){
            $tid=rand(21,39);
            $GLOBALS = $lianxiti->query("SELECT * FROM lianxiti WHERE bid=".$bid ." AND tid=".$tid);

        }
        if($num==NULL){
            $num=1;
        }else{
            $num++;
        }
//        if($score==NULL){
//            $score=0;
//        }
//        $bname = M('')->query('SELECT * FROM bclass WHERE bid='.$bid);
        $this->assign('bclasslist',$bclasslist);// 赋值数据集
        $this->assign('st',$GLOBALS);// 赋值数据集
        $this->assign('bname',$bname);// 赋值数据集
        $this->assign('num',$num);// 赋值数据集
//        $this->assign('score',$score);// 赋值数据集
        $this->display('ceyan');
    }
    //发表阅读笔记
    public function yuedu_note()
    {

        $biji= M('biji');
        $data['zid'] = I('zid');
        $data['uid'] = $_SESSION['uid'];
        $data['bcontent'] = I('post.neirong');
        $data['btime'] = date('Y-m-d H:i:s', time());
        $data['blastupdatetime'] = date('Y-m-d H:i:s', time());
        if($data['uid']==null){
            $this->error('评论失败,登陆后再来，谢谢', '', 3);
        }else if($biji->add($data)) {
            redirect('cainiao_note');
        }
    }
}