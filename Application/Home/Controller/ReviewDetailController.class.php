<?php
namespace Home\Controller;

use Review\Logic\ReviewLogic;
use ReviewDetail\Logic\ReviewDetailLogic;

class ReviewDetailController extends HomeController
{
    //用户列表显示
    public function indexAction()
    {
        $ReviewL = new ReviewLogic();
        $reviews = $ReviewL->getAllLists();

        //调用v层
        $this->assign("reviews", $reviews);
        $this -> display();
    }
}