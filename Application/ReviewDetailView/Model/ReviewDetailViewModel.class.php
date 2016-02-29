<?php
/**
 * 评阅详情视图
 */
namespace ReviewDetailView\Model;

use Yunzhi\Model\YunzhiModel;

class ReviewDetailViewModel extends YunzhiModel
{
    protected $orderBys     = array("review__id"=>"asc");  //排序字段方式
}