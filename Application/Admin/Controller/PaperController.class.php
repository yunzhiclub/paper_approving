<?php
namespace Admin\Controller;

use Cycle\Logic\CycleLogic;                 //周期
use StudentView\Logic\StudentViewLogic; //学生视图
use Student\Logic\StudentLogic;         //学生

class PaperController extends AdminController
{
	public function indexAction()
    {
        //取出当前周期
        $CycleL = new CycleLogic();
        $currentCycle = $CycleL->getCurrentList();
        if ($currentCycle === false)
        {
            $this->error("当前周期未设置",U("Index/index"));
            return;
        }

        //取当前周期学生信息
        $StudentViewL = new StudentViewLogic();
        $StudentViewL->setMaps(array("cycle_id"=>$currentCycle['id']));
        $papers = $StudentViewL->getLists();
        
        $this->assign("papers", $papers);
        $this -> display();
    }

    /**
     * 根据学号自动匹配论文至相关学生
     * @param id 附件id
     * @param name 上传附件名
     * @return [type] [description]
     * panjie
     * 2016.02
     */
    public function matchAjaxAction()
    {
        $attachmentId = (int)I('get.id');
        $name = trim(I('get.name'));
        $return = array("status"=>"ERROR");

        //取出当前周期
        $CycleL = new CycleLogic();
        $currentCycle = $CycleL->getCurrentList();
        if ($currentCycle === false)
        {
            $return["message"] = "未设置当前周期";
            echo json_encode($return);
            return;
        }
        
        //截取学号信息
        $index = strpos($name, "-");
        if ($index === false)
        {
            $return["message"] = "上传附件名:" . $name ."不符合规则";
            echo json_encode($return);
            return;
        }
        $studentNo = substr($name, 0, $index);
    
        //将附件信息更新至学生表
        $StudentL = new StudentLogic();
        $StudentL->updateAttachmentId($studentNo, $currentCycle['id'], $attachmentId);

    }
}
