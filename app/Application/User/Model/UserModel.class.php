<?php

namespace User\Model;

use Yunzhi\Model\YunzhiModel;

class UserModel extends YunzhiModel
{
    protected $orderBys     = array("username"=>"asc"); //排序字段方式
    protected $keywords     = "I('get.keywords')"; //查询关键字
    protected $field        = "name"; //查询字段
    protected $_validate = array(
        array("phonenumber","/^0?(13[0-9]|15[012356789]|18[0236789]|14[57]|17[7])[0-9]{8}$/","the phonenumber length is not 11",1,'regex'),//验证手机号码
        );

    

}