<?php
namespace Home\Controller;

use Reviews\Logic\ReviewsLogic;

class ReviewsController extends HomeController
{
    //用户列表显示
    public function indexAction()
    {
        $expert = session('expert');
        if ($expert['is_normal'] !== '1')
        {
            $this->error("请完善个人信息", U('Expert/index'));
            return;
        }
        $this -> display();
    }
}