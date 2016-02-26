<?php
namespace Home\Controller;

use Expert\Logic\ExpertLogic;

class ExpertController extends HomeController
{
    //用户列表显示
    public function indexAction()
    {
        $this -> display();
    }
}