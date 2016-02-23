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
		$expert['userpassword'] = C(DEFAULT_PASSWORD);						//重置对应专家密码

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

	public function resetSomePasswordByIds($ids)
	{
		$out=array();
		$i=0;
		foreach ($ids as $key => $value) {
			# code...
			if(!in_array($value,$out))
			{
				$out[$i]=$value;
				$i++;
			}
		}
		$length=count($out);
		print_r($length);

		for($i=0;$i<$length;$i++)
		{
			$map['id']=$out[$i];
			$ExpertL=new ExpertLogic();
			$expert=$ExpertL->where($map)->find();
			dump($expert);
			$expert['userpassword']=C(DEFAULT_PASSWORD);
			$ExpertL->save($expert);
		}
		return true;
	}


}
