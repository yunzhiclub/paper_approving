<?php

namespace Student\Model;

use Yunzhi\Model\YunzhiModel;

class StudentModel extends YunzhiModel
{
    protected $orderBys     = array("student_no"=>"asc"); //排序字段方式
    protected $field        = "student_no"; //查询字段
}