<?php
namespace Admin\Controller;


use Review\Logic\ReviewLogic;

/**
* 
*/
class ReviewSettingController extends AdminController
{
	
public function indexAction()				//初始页面
	{
		$ReviewL=new ReviewLogic();				
		$reviews=$ReviewL->getlists();			//取评阅信息
		$this->assign('reviews',$reviews);		//向V层赋值
		$this->display();
		
	}
}