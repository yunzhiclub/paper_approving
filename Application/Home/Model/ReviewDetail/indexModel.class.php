<?php
/**
 * 评阅前台传入模型
 */
namespace Home\Model\ReviewDetail;

use ReviewDetailView\Logic\ReviewDetailViewLogic;
use ReviewDetailOther\Logic\ReviewDetailOtherLogic;

class indexModel
{
    private $reviews = array(); //评阅信息
    private $expert = array();  //专家信息

    public function setReviews($reviews)
    {
        $this->reviews = $reviews;
    }

    public function setExpert($expert)
    {
        $this->expert = $expert;
    }

    public function getReviewsJson()
    {
        $ReviewDetailViewL = new ReviewDetailViewLogic();
        $reviewDetails = $ReviewDetailViewL->getListsByExpertId($this->expert['id']);
        change_key($reviewDetails, 'review__id');

        foreach($this->reviews as $key => $review)
        {
            $this->reviews[$key]['score'] = isset($reviewDetails[$review['id']]) ? (int)$reviewDetails[$review['id']]['score'] : 0;
        }

        $reviewsJson = json_encode($this->reviews);
        return $reviewsJson;
    }

    /**
     * 获取详阅详情其它信息
     * @return list 一维数组
     */
    public function getReviewsDetailOther()
    {
        $ReviewDetailOtherL = new ReviewDetailOtherLogic();
        $reviewDetailOther = $ReviewDetailOtherL->getListByExpertId($this->expert['id']);
        return $reviewDetailOther;
    }
}