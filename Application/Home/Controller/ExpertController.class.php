<?php
namespace Home\Controller;

use Expert\Logic\ExpertLogic;
use ExpertView\Logic\ExpertViewLogic;

class ExpertController extends HomeController
{
    //用户列表显示
    public function indexAction()
    {
        $this -> display();
    }

    //保存专家的信息
    public function saveAction()
    {
        //判断获取的数据，是否为当前专家ID
        $expert = I("post.");
        $sessionExpert = session('expert');
        if ($expert['id'] !== $sessionExpert['id'])
        {
            $this->error("系统错误，请稍后重试。刚错误，可能是您同时登陆了两个用户造成的", U('index'));
            return;
        }

        //更新数据
        $ExpertL = new ExpertLogic();
        if ($ExpertL->updateList($expert) === false)
        {
            $this->error("更新专家信息发生错误：updateList" . $ExpertL->getError(), U('index'));
            return;
        }

        //重新获取专家视图数据，并session
        $ExpertViewL = new ExpertViewLogic();
        if ($ExpertViewL->updateSessionExpertById($expert['id']) === false)
        {
            $this->error("更新专家信息发生错误：updateSessionExpertById" . $ExpertL->getError(), U('index'));
            return;
        }
        
        $this -> success("操作成功",U('index'));
    }
}