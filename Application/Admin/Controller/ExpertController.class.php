<?php
namespace Admin\Controller;

use Admin\Controller\AdminController;
use Review\Logic\ReviewLogic;

class ExpertController extends AdminController
{

	public function indexAction(){

		$ReviewL=new ReviewLogic();

		$reviews=$ReviewL->getlists();

		$this->assign('reviews',$reviews);

		$this->display();
		
	}

	public function resetAction()
	{
		$ReviewL=new ExpertLogic();

		$id=I('get.expert_id')

		$review=$ReviewL->resetPasswordByExpert_id($id);
	}
}