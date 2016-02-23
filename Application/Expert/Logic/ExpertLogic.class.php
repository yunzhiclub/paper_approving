<?php
namespace Expert\Logic;

use Expert\Model\ExpertModel;

class ExpertLogic extends ExpertModel
{
	protected $errors = array();   			//错误信息

	public function addList($list)			//添加信息
	{
		try{
			if($this->create($list))
			{
				$id=$this->save();
				return $id; 
			}
			else
			{
				$this->errors[]=$this->getError();
				return false;
			}
		}
		catch(\Think\Exception $e)
		{
			$this->errors[]=$e->getMessage();
			return false;
		}
	}
}

