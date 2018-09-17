<?php
/**
 * Created by PhpStorm.
 * User: fu
 * Date: 2017/11/27
 * Time: 9:25
 */

namespace Home\Controller;
use Think\Controller;

class BlogajaxController extends Controller
{
    public function bloginfo(){
        if(empty(I('bid')))
            $this->ajaxReturn(M('blog'));
        $bloginfo = M('blog')->find(I('bid'));

        // 获取了博客详情后需要将内容部分做一个转换处理
        $bloginfo['bneirong'] = html_entity_decode($bloginfo['bneirong']);

        // ajax返回格式不写，根据默认配置值设置，默认为json格式
        $this->ajaxReturn($bloginfo);
    }

    public function ajaxBlog(){
        $bloglist = M('')->query(
            " SELECT b.bid, bc.bcname, u.uid, u.uname, b.bbiaoti,b.bstatus, b.bisvalid
          FROM blog b JOIN USER u ON b.uid=u.uid
           JOIN blogclass bc ON b.bcid=bc.bcid
          ORDER BY b.bchuangjian DESC ");
//            = M('blog')->select();

        $this->bloglist = $bloglist;
//        dump($bloglist);
        $this->display('Blogs/ajaxBlog');
    }
}