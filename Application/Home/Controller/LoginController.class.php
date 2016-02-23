<?php
namespace Home\Controller;

use Login\Logic\LoginLogic;

class LoginController extends HomeController
{
    //用户列表显示
    public function indexAction()
    {
        $this -> display();
    }
}