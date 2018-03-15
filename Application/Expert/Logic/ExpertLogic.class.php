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

	/**
	 * 更新专家评阅状态为 已评阅
	 * @param int $id 专家ID
	 */
	public function setIsReviewedById($id)
	{
		$id = (int)$id;
		$map = array();
		$map['id'] = $id;

		$data = array();
		$data['is_reviewed'] = "1";

		try 
		{
			$this->where($map)->save($data);
		} 
		catch (\Think\Exception $e) 
		{
			$this->setError("ExpertL error:" . $e->getMessage());
			return false;
		} 
		return true;
	}

	/**
	 * 更新专家信息
	 * 传入原密码，则检验，更新原密码
	 * 未传入原密码，则只更新基本信息
	 * @param  array $list 专家信息
	 * @return bool       
	 */
	public function updateList($list)
	{
		try
		{
			$data = array();

			//判断是否传入了原密码
			if ($list['password'] !== "" && $list['password'] !== null)
			{
				$data['userpassword'] = trim($list['newpassword']);
			}

			//更新其它信息
			$data['id'] 			= $list['id'];
			$data['name'] 			= $list['name'];
			$data['job_title'] 		= $list['job_title'];
			$data['tutor_class'] 	= $list['tutor_class'];
			$data['is_normal'] 		= "1";
			$data['email']			= $list['email'];
			$data['phone']			= $list['phone'];
			$data['specialty']		= $list['specialty'];
			$data['subject']    	= $list['subject'];
			$data['school']    		= $list['school'];
			$data['address']    	= $list['address'];
			
			if ($this->create($data))
			{
				$this->save();
			}
			else
			{
				$this->setError("Data create error." . $this->getLastSql());
				return false;
			}
			return true;
		}
		catch(\Think\Exception $e)
		{
			$this->setError("Database Error:" . $e->getMessage());
			return false;
		}
	}
}

