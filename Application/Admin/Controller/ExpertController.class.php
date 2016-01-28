<?php
namespace Admin\Controller;

use Admin\Controller\AdminController;
use Review\Logic\ReviewLogic;

class ExpertController extends AdminController
{

	public function indexAction()				//初始页面
	{

		$ReviewL=new ReviewLogic();				

		$reviews=$ReviewL->getlists();			//取评阅信息

		$this->assign('reviews',$reviews);		//向V层赋值

		$this->display();
		
	}

	public function resetAction()				//重置密码
	{
		$ReviewL=new ReviewLogic();

		$id=I('get.expert_id');					//取对应专家id

		$review=$ReviewL->resetPasswordByExpert_id($id);	//重置该专家密码

		if(count($errors=$ReviewL->getErrors())!==0)
		{
            //数组变字符串
			$error =implode('<br/>', $errors);

            //显示错误
			$this->error("重置密码失败，原因：".$error,U('index?id=', I('get')));

			return false;

		}
		$this->success("重置密码成功" , U('index?id=', I('get')));
	}

	public function downloadAction()			//下载附件
	{
		
	}
}
