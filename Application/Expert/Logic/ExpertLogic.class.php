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

	public function resetPasswordById($id)
	{
		
		$expert = $this->getListById($id);					//取对应专家信息
		$expert['userpassword'] = C(DEFAULT_PASSWORD);						//重置对应专家密码

		//存储
		try
		{
			if($this->create($expert))
			{
				$id = $this->save();
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
			
			$expert=$this->where($map)->find();
			
			$expert['userpassword']=C(DEFAULT_PASSWORD);
			$this->save($expert);
		}
		return true;
	}

	/**
	 * 获取某学生ID的所有记录
	 * @param  int $studentId 学生id
	 * @return lists            二维数据 
	 * panjie
	 * 2016.02
	 */
	public function getListsByStudentId($studentId)
	{
		$map = array();
		$map['student_id'] = (int)$studentId;
		try
		{
			return $this->where($map)->select();
		}
		catch(\Think\Exception $e)
		{
			$this->setError("ExpertL error: data select error . " . $e->getMessage());
			return false;
		}
	}	
}

