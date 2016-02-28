<?php
/**
 * 评阅前台传入模型
 */
namespace Home\Model\ReviewDetail;

class indexModel
{
    private $reviews = array();

    public function setReviews($reviews)
    {
        $this->reviews = $reviews;
    }
    
    public function getReviewsJson()
    {
        
    }
}