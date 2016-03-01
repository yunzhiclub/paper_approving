<?php

namespace ReviewDetail\Logic;

use ReviewDetail\Model\ReviewDetailModel;
use Review\Logic\ReviewLogic;           //评阅设置

class ReviewDetailLogic extends ReviewDetailModel
{
	protected  $errors = array();

    public function getErrors()
	{
		return $this->errors;
	}

    /**
     * 逐条保存信息
     * 将数组中的分数与评阅设置表相对应，依次入库
     * @param  一维数组 $lists 例：
     * array (size=7)
     * 0 => string '80' (length=2)
     * 1 => string '90' (length=2)
     * 2 => string '70' (length=1)
     * 3 => string '60' (length=1)
     * 4 => string '50' (length=1)
     * 5 => string '60' (length=1)
     * 6 => string '70' (length=1)
     * @return [type]        [description]
     */
    public function saveListsByExpertId($lists, $expertId)
    {
        //判断专家ID是否INT
        $expertId = (int)$expertId;
        if ($expertId === 0)
        {
            $this->setError("ReviewDetailL Error:expertId not int.专家ID非INT类型");
            return false;
        }

        //取出评阅设置
        $ReviewL = new ReviewLogic();
        $reviews = $ReviewL->getAllLists();
        if ($reviews === false)
        {
            $this->setError = $ReviewL->getError();
            return false;
        }

        //判断评阅设置条数与传入数组个数是否一致
        if (count($reviews) !== count($lists))
        {
            $this->error("ReviewDetailL Error, input datas count is not match reviewset count.传入的分值个数与评阅设置不一致");
            return false;
        }

        //删除原有数据后重新添加拼接后的数据
        $map = array();
        $map['expert_id'] = $expertId;
        try
        {
            $this->where($map)->delete();
            foreach($reviews as $key => $review)
            {
                $data = array();
                $data['expert_id']  = $expertId;
                $data['review_id']  = $review['id'];
                $data['score']      = $lists[$key];
                if ($this->create($data))
                {
                    $this->add();
                }
                else
                {
                    $this->error("ReviewDetailL Error:data create error" . $this->getError());
                    return false;
                }
            }
        }
        catch(\Think\Exception $e)
        {
            $this->setError("ReviewDetailL Error:" . $e->getMessage());
            return false;
        }
    }
}