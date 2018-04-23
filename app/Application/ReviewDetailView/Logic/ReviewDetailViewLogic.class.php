<?php
/**
 * 评阅详情视图
 */
namespace ReviewDetailView\Logic;

use ReviewDetailView\Model\ReviewDetailViewModel;

class ReviewDetailViewLogic extends ReviewDetailViewModel
{
    /**
     * 返回某个专家的所有评阅评情信息
     * @param  int $expertId 专家id
     * @return lists           
     */
    public function getListsByExpertId($expertId)
    {
        $map = array();
        $map['expert_id'] = (int)$expertId;
        try
        {
            return $this->where($map)->order($this->orderBys)->select();
        }
        catch(\Think\Exception $e)
        {
            $this->setError("ReviewDetailViewL error: " . $e->getMessage());
            return false;
        }
    }
}