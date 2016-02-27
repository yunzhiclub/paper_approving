<?php

namespace Cycle\Logic;

use Cycle\Model\CycleModel;

class CycleLogic extends CycleModel
{
	protected  $errors = array();

    public function getErrors()
	{
		return $this->errors;
	}

    public function saveList($list)
    {
    	try
    	{
    		if ($this->create($list))
    		{
    			if(isset($this->data['id']) && $this->data['id'] !== "")
    			{
    				$id = $this->save();
    			}
    			else
    			{
    				$id = $this->add();
    			}
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

    public function deleteInfo($id)
	{
		$map['id'] = $id;
		$datas=$this->where($map)->delete();
		return $datas;
	}

    public function deleteCurrent()
    {
        $map = array();
        $map['is_current'] = 1;
        $data = array();
        $data['is_current'] = 0;
        $this->where($map)->save($data);
        return;
    }

    /**
     * 获取当前周期信息
     * @return 正常 list 一组数组  无数据，返回null
     * panjie
     * 2016.02
     */
    public function getCurrentList()
    {
        $map = array();
        $map['is_current'] = 1;
        return $this->where($map)->find();
    }
}