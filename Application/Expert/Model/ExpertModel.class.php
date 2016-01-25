<?php
namespace Expert\Model;

use Yunzhi\Model\YunzhiModel;

class ExpertModel extends YunzhiModel
{
	protected $_validate = array(
     array('userpassword','require','密码必填',1),
     array('repassword','userpassword','两次密码输入不一致',0,'confirm'), // 验证确认密码是否和密码一致
   );
}