<?php
namespace Home\Controller;

use Think\Controller;
use Cycle\Logic\CycleLogic;     //周期
class IndexController extends Controller
{
    public function indexAction()
    {
        //判断系统是否开放,获取当前周期信息
        $CycleL = new CycleLogic();
        $isOpen = $CycleL->validateTime();
        $currentCycle = $CycleL->getCurrentList();
        
        $this->assign("isOpen", $isOpen);
        $this->assign("currentCycle", $currentCycle);

        $this->display();
    }
}