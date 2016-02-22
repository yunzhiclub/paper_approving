<?php
namespace Home\Controller;

use ReviewDetail\Logic\ReviewDetailLogic;

class ReviewDetailController extends HomeController
{
    //用户列表显示
    public function indexAction()
    {
        // //获取列表
        // $ReviewDetailL = new ReviewDetailLogic();
        // $ReviewDetails = $ReviewDetailL->getLists();

        // //传入列表
        // $this -> assign('ReviewDetails',$ReviewDetails);

        // //调用v层ss
        $this -> display();
    }
}