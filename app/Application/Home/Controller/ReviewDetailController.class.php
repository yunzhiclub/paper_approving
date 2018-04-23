<?php
namespace Home\Controller;

use Review\Logic\ReviewLogic;
use ReviewDetail\Logic\ReviewDetailLogic;           //评阅详情
use ReviewDetailOther\Logic\ReviewDetailOtherLogic; //评阅详情其它
use Expert\Logic\ExpertLogic;                       //专家
use Home\Model\ReviewDetail\indexModel;     
use ExpertView\Logic\ExpertViewLogic;

class ReviewDetailController extends HomeController
{
    public function indexAction()
    {
        //权限判断
        $expert = session('expert');
        if ($expert['is_normal'] !== '1')
        {
            $this->error("请完善个人信息", U('Expert/index'));
            return;
        }

        $ReviewL = new ReviewLogic();
        $reviews = $ReviewL->getAllLists();

        $M = new indexModel();
        $M->setReviews($reviews);
        $M->setExpert(session('expert'));

        $this->assign("M", $M);

        $M->getReviewsJson();
        //调用v层
        $this->assign("reviews", $reviews);
        $this -> display();
    }

    /**
     * 保存评阅信息
     * @return void panjie * panjie
     * 2016.02
     */
    public function saveAction()
    {
        $data = I('post.');
        $expert = session('expert');
        
        //更新评阅详情信息
        $reviewDetails = $data['score'];
        $ReviewDetailL = new ReviewDetailLogic();
        if ($ReviewDetailL->saveListsByExpertId($reviewDetails, $expert['id']) === false)
        {
            $this->error("评阅信息存入错误:" . $ReviewDetailL->getError(),U('index'));
            return;
        }

        //更新评阅详情其它信息
        unset($data['score']);
        $ReviewDetailOtherL = new ReviewDetailOtherLogic();
        if ($ReviewDetailOtherL->updateList($data) === false)
        {
            $this->error("评阅信息存入错误" . $ReviewDetailOtherL->getError(), U('index'));
            return;
        }

        //更新专家表为已评阅
        $ExpertL = new ExpertLogic();
        if ($ExpertL->setIsReviewedById($expert['id']) === false)
        {
            $this->error("更新专家评阅状态出错" . $ExpertL->getError(), U("index"));
            return;
        }

        //重新获取专家视图数据，并session
        $ExpertViewL = new ExpertViewLogic();
        if ($ExpertViewL->updateSessionExpertById($expert['id']) === false)
        {
            $this->error("更新专家信息发生错误：updateSessionExpertById" . $ExpertL->getError(), U('index'));
            return;
        }
        $this->success("操作成功", U("index"));
    }
}