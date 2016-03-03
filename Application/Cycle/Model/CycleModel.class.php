<?php

namespace Cycle\Model;

use Yunzhi\Model\YunzhiModel;

class CycleModel extends YunzhiModel
{
    protected $orderBys     = array("name"=>"asc"); //排序字段方式
    protected $_auto        = array();
    protected $_validate    = array(
        array('name','require','the name file is required')
        );
}