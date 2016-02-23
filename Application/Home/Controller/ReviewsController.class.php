<?php
namespace Home\Controller;

use Reviews\Logic\ReviewsLogic;

class ReviewsController extends HomeController
{
    //用户列表显示
    public function indexAction()
    {
        $this -> display();
    }
}