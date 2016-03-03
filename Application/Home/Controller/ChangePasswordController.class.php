<?php
namespace Home\Controller;

use ChangePassword\Logic\ChangePasswordLogic;

class ChangePasswordController extends HomeController
{
    //用户列表显示
    public function indexAction()
    {
        $this -> display();
    }
}