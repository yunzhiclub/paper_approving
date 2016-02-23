<?php
namespace Home\Controller;

use Powered\Logic\PoweredLogic;

class poweredController extends HomeController
{
    //用户列表显示
    public function indexAction()
    {
        $this -> display();
    }
}