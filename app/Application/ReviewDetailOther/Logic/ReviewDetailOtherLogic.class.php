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

    /**
     * 获取评阅带有选项的字段设置
     * @return lists 
     * panjie
     * 2016.02
     */
    public function getFileds()
    {
        return array(
            "defense"   => array("是否同意答辩", array("同意答辩", "同意经过小的修改后答辩（可不再送审)", "需要进行较大的修改后答辩（修改后送原专家送审）", "未达到学位论文要求，不同意答辩")),
            "excellent" => array("是否推荐评选优秀论文", array("省级", "校级", "不推荐")),
            "familiar"  => array("对论文内容的熟悉程度", array("很熟悉", "熟悉", "一般了解"))
            );
    }

    /**
     * 通过 专家ID存数据
     * @param  一维数据 $list 包含有expert_id字段的数组
     * @return true or false       
     * panjie
     * 2016.03
     */
    public function updateList($list)
    {
        $map = array();
        $map['expert_id'] = $list['expert_id'];
        try
        {
            $data = $this->where($map)->find();
            if ($data === null)
            {
                if ($this->create($list))
                {
                    $this->add();
                    return true;
                }
                else
                {
                    $this->setError("Data Create Error " . $this->getLastSql());
                    return false;
                }
            }
            else
            {
                $list['id'] = $data['id'];
                if ($this->create($list))
                {
                    $this->save();
                }
                else
                {
                    $this->setError("Data Create Error " . $this->getLastSql());
                    return false;
                }
            }
        }
        catch(\Think\Exception $e)
        {
            $this->setError("Database Error:" . $e->getMessage());
            return false;
        }
    }
}