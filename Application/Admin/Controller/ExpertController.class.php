<?php
namespace Admin\Controller;

use Admin\Controller\AdminController;
use Expert\Logic\ExpertLogic;

class ExpertController extends AdminController
{

	public function indexAction()				//初始页面
	{
		$ExpertL=new ExpertLogic();				
		$experts=$ExpertL->getlists();			//取评阅信息
		$this->assign('experts',$experts);		//向V层赋值
		$this->display();
		
	}

	public function resetAction()				//重置密码
	{
		$ExpertL=new ExpertLogic();
		$id=I('get.id');
		dump($id);					//取对应专家id
		$expert=$ExpertL->resetPasswordById($id);	//重置该专家密码
		if(count($errors=$ExpertL->getErrors())!==0)
		{
            //数组变字符串
			$error =implode('<br/>', $errors);

            //显示错误
			$this->error("重置密码失败，原因：".$error,U('index?id=', I('get')));

			return false;

		}
		$this->success("重置密码成功" , U('index?id=', I('get')));
	}

   public function resetSomeAction()
    {
        $expertId=array();
        $expertId=I('post.sub');
        dump($expertId);
        //传入id数组重置密码
        $ExpertL=new ExpertLogic();
        $ExpertL->resetSomePasswordByIds($expertId);
        $this->success("重置密码成功", U('Expert/Index/index?',I('get.p')));
        
    }
}
