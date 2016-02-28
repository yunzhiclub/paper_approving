<?php
namespace Home\Controller;

use Think\Controller;

class HomeController extends Controller
{
    protected $yunzhiExpert;
    public function __construct()
    {
        //判断用户是否登陆
        if (session('expert') === null)
        {
            $this->redirect('Index/index',0);
            return;
        }
        else
        {
            session('expert', session('expert'));
        }
        parent::__construct();
        $this->assign("expert", session('expert'));
    }

	public function indexAction()
    {
        $this->display();
    }
}