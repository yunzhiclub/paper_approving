<?php
/**
 * 评阅详情其它信息
 */
namespace ReviewDetailOther\Model;

use Yunzhi\Model\YunzhiModel;

class ReviewDetailOtherModel extends YunzhiModel
{
   protected $_auto = array(
		array("time", "time", 3, "function"),
		);
}