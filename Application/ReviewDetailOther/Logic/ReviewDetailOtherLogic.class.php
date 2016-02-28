<?php
/**
 * 评阅详情 其它信息
 */
namespace ReviewDetailOther\Logic;

use ReviewDetailOther\Model\ReviewDetailOtherModel;

class ReviewDetailOtherLogic extends ReviewDetailOtherModel
{
    /**
     * 获取 某位专家的其它评阅详情信息
     * @param  int $expertId 专家ID
     * @return 一组数组          
     * panjie
     * 2016.02
     */
    public function getListByExpertId($expertId)
    {
        $map = array();
        $map['expert_id'] = (int)$expertId;
        try 
        {
            return $this->where($map)->find();
        }
        catch(\Think\Exception $e)
        {
            $this->setError("ReviewDetailOtherLogic getListByExpertId error: " . $e->getMessage());
            return false;
        }
    }
}