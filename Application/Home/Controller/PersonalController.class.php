<?php
namespace Home\Controller;

use Personal\Logic\PersonalLogic;

class PersonalController extends HomeController
{
    //用户列表显示
    public function indexAction()
    {
        $this -> display();
    }
}