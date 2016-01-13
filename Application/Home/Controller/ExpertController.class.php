<?php
namespace Home\Controller;

use Think\Controller;
use Expert\Logic\ExpertLogic;

class ExpertController extends Controller
{
	public function editAction()
	{
		//实例化对象调信息
		$ExpertL = new ExpertLogic();
		$expert=$ExpertL->getlists();
		//向V层赋值
		$this->assign('expert',$expert[0]);
		$this->display();
	}
	public function saveAction()
	{
		//获取专家个人信息
		$expert=I('post.');

		//保存专家个人信息
		$ExpertL = new ExpertLogic();
		$ExpertL->addList($expert);
		//判断
		if(count($errors=$ExpertL->getErrors())!==0)
        {
            //数组变字符串
            $error =implode('<br/>', $errors);
            
            
            //显示错误
             $this->error("添加失败，原因：".$error,U('Home/Expert/edit?p='.I('get.p')));
            
        }
        $this->success("操作成功" , U('Home/Expert/edit?p='.I('get.p'))); 
	}
	
}