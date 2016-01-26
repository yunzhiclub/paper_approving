<?php
namespace Review\logic;

use Review\Model\ReviewModel;
use Expert\Logic\ExpertLogic;

class ReviewLogic extends ReviewModel
{
	protected $errors = array();   							//错误信息

	public function resetPasswordByExpert_id($id)
	{
		$ExpertL = new ExpertLogic();
		$expert = $ExpertL->getListById($id);					//取对应专家信息
		dump($this->create($expert));
		$expert['userpassword'] = 123456;						//重置对应专家密码
		//存储
		try
		{
			if($ExpertL->create($expert))
			{
				$id = $ExpertL->save();
				return $id; 
			}
			else
			{
				$this->errors[] = $this->getError();
				return false;
			}
		}
		catch(\Think\Exception $e)
		{
			$this->errors[] = $e->getMessage();
			return false;
		}
	}
}
