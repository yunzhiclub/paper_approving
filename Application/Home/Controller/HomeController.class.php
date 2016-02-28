<?php
namespace Home\Controller;

use Think\Controller;
use Cycle\Logic\CycleLogic; //周期

class HomeController extends Controller
{
    protected $yunzhiExpert;
    public function __construct()
    {
        //判断系统是否开放
        $CycleL = new CycleLogic();
        if ($CycleL->validateTime() === false)
        {
            session('expert', null);
            $this->redirect('Index/index',0);
            return;
        }

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
        $this->assign("yunzhi_expert", session('expert'));
    }

	public function indexAction()
    {
        $this->display();
    }
}