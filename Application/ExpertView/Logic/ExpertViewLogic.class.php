<?php
/**
 * 专家视图 LOGIC
 */
namespace ExpertView\Logic;

use ExpertView\Model\ExpertViewModel;
use Cycle\Logic\CycleLogic;             //周期

class ExpertViewLogic extends ExpertViewModel
{
    /**
     * 验证专家用户名密码是否正确
     * @param  string $username     用户名
     * @param  string $userpassword 密码
     * @param  bool $isSeesionList 是否seeion专家数据
     * @return 成功返回true 失败返回false
     * panjie
     * 2016.02
     */
    public function validate($username, $userpassword, $isSessionList = false)
    {
        //取当前周期信息
        $CycleL = new CycleLogic();
        $currentCycle = $CycleL->getCurrentList();
        if ($currentCycle === false)
        {
            $this->setError("ExpertL validate error: do not get current cycle" . $CycleL->getError());
            return false;
        }
        
        //查库判断
        $map['username']        = $username;
        $map['userpassword']    = $userpassword;
        $map['cycle_id']        = $currentCycle['id'];
        
        $expert = $this->where($map)->find();
        if ($expert !== null)
        {
            if ($isSessionList === true)
            {
                session("expert", $expert);
            }
            return true;
        }
        else
        {
            $this->setError("ExpertL validate error: username or password incorcet");
            return false;
        }
    }

    /**
     * 获取所有当前周期下已评阅完毕的数据
     * @param  int $cycleId 周期id
     * @return 二维数组          lists
     * panjie
     * 2016.02
     */
    public function getReviewdListsByCycleId($cycleId)
    {
        $map = array();
        $map['cycle_id'] = (int)$cycleId;
        $map['is_reviewed'] = '1';

        try
        {
            return $this->where($map)->select();
        }
        catch(\Think\Exception $e)
        {
            $this->setError("Database error" . $e->getMessage());
            return false;
        }
    }
}