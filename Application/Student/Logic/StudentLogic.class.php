<?php

namespace Student\Logic;

use Student\Model\StudentModel;

class StudentLogic extends StudentModel
{
	protected  $errors = array();

    //标准的上传学生表格数据
    private $headers = array(
        "name"                  =>  "姓名",
        "student_no"            =>  "学号",
        "admission_date"        =>  "入学年月",
        "subject_major"         =>  "专业",
        "secret"                =>  "论文密级",
        "research_direction"    =>  "研究方向",
        "title"                 =>  "论文题目",
        "innovation_point"      =>  "创新点",
        "type"                  =>  "类型"
    );

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
        //TODO：删除专家表中，该学生对应的专家信息.
        //注意：由于专家表与评阅详情表，评阅详请其它数据表，也有关联。删除时应该考虑一并删除.
        // $ExpertL = new ExpertLogic();
        // if ($ExpertL->deleteListsByStudentId($id) === false)
        // {
        //     $this->error("删除学生对应的专家信息发生错误", U("index?id=", I("get.")));
        //     return;
        // }
        
		$map['id'] = $id;
		$datas=$this->where($map)->delete();
		return $datas;
	}

    /**
     * 保存传入的包括excel表头的数据
     * @param  list $lists 包括表头的数据
     * @return 成功 true 失败：false
     */
    public function saveListsByCycleId($lists, $cycleId)
    {   

        //取表头信息进行匹配
        $headers = $lists[0];
        $keys = array();
        foreach($headers as $header )
        {
            $keys[] = array_search($header, $this->headers);
        }

        //将EXCEL中的信息对应好数据库的字段
        $length = count($lists);
        $data = array();
        for($i = 1; $i < $length; $i++)//跳过表头，开始读取行信息
        {
            $student = $lists[$i];//取出当前学生信息
            $j = 0;
            $data[$i-1]['cycle_id'] = $cycleId;
            foreach($student as $key => $value)
            {
                //如果表头信息为可识别信息，则传值。否则，跳过
                if ($keys[$j] !== false)
                {
                    $data[$i-1][$keys[$j]] = $value;
                }
                $j++;
            }
        }

        //去除重复的数据项
        change_key($data, "student_no");
        $datas = array();
        foreach($data as $value)
        {
            $datas[] = $value;
        }
        $return['successCount'] = count($data);
        $return['repeatCount'] = $length - 1 - $return['successCount'];

        try
        {  
            $this->addAll($datas);
        }
        catch(\Think\Exception $e)
        {
            $this->setError("StudentL error:" . $e->getMessage);
            return false;
        }

        return $return;
    }

    /**
     * 删除 某周期ID 下的所有数据
     * @param $cycleId 周期ID
     * 最后删除的记录ID
     * panjie
     * 2016.02
     */
    public function DeleteListsByCycleId($cycleId)
    {
        $map = array();
        $map['cycle_id'] = (int)$cycleId;
        return $this->where($map)->delete();
    }

    /**
     * 更新论文信息
     * @param  int $studentNo    学号
     * @param  int $cycleId      周期ID
     * @param  int $attachmentId 附件ID
     * @return 失败 false
     * panjie
     * 2016.02
     */
    public function updateAttachmentId($studentNo, $cycleId, $attachmentId)
    {
        $map['student_no'] = $studentNo;
        $map['cycle_id'] = $cycleId;
        $data['attachment_id'] = $attachmentId;
        try
        {
            $this->where($map)->save($data);
        }
        catch(\Think\Exception $e)
        {
            $this->setError($e->getMessage());
            return false;
        }
    }

    /**
     * 获取某个周期ID下的所有数据
     * @param  int $cycleId 周期ID
     * @return 二维数组          
     * panjie
     * 2016.02
     */
    public function getAllListsByCycleId($cycleId)
    {
        $map = array();
        $map['cycle_id'] = (int)$cycleId;
        try
        {
            return $this->where($map)->select();
        }
        catch(\Think\Exception $e)
        {
            $this->setError("StudentL getAllListsByCycleId error: " . $e->getMessage());
            return false;
        }
    }

}