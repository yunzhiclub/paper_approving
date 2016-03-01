<?php
namespace Home\Controller;

use Expert\Logic\ExpertLogic;

class ExpertController extends HomeController
{
    //用户列表显示
    public function indexAction()
    {
    	$expertId = I('get.id');

        //取用户信息getListById()
        $ExpertL = new ExpertLogic();
        $expert = $ExpertL->getListById($expertId);

        //传给前台
        $this -> assign('expert',$expert);
        dump($expert);

        $this -> display();
    }

    //保存专家的信息
    public function saveAction()
    {
    	dump(I('post.'));
    	//exit();
    	//取用户信息
        $expert = I('post.');
        
        $ExpertL = new ExpertLogic();
        $ExpertL -> saveList($expert);

        //判断异常
        if(count($errors = $ExpertL->getErrors())!==0)
        {
            //数组变字符串
            $error = implode('<br/>',$errors);

            //显示错误
            $this -> error("添加失败，原因：".$error,U('Home/Expert/index?p ='.I('get.p')));
        }
        else
        {
            $this -> success("操作成功",U('Home/Expert/index?p ='.I('get.p')));
        }
    }
}