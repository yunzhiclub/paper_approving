<?php
namespace Admin\Controller;

use Cycle\Logic\CycleLogic;                 //周期
use StudentView\Logic\StudentViewLogic; //学生视图
use Student\Logic\StudentLogic;         //学生
use Expert\Logic\ExpertLogic;           //专家信息
use Admin\Model\Paper\indexModel;       //index模型

//phpexcel
Vendor('PHPExcel.PHPExcel.IOFactory');
Vendor('PHPExcel.PHPExcel.Cell');
Vendor('PHPExcel.PHPExcel');

class PaperController extends AdminController
{
    private $count = 2; //一篇论文对应的生成专家用户名数

    /**
     * 取出学生信息，并自动匹配学生论文情况
     * @return html 
     * panjie 
     * 2016.02
     */
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
        
        //引入模型
        $M = new indexModel();

        $this->assign("M", $M);
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
        if ($StudentL->updateAttachmentId($studentNo, $currentCycle['id'], $attachmentId) === false)
        {
            $return["message"] = "Update Student Info error:" . $StudentL->getError();
            echo json_encode($return);
            return;
        }

        $return['status'] = "SUCCESS";
        echo json_encode($return);
        return;
    }

    /**
     * 批量生成用户名, 并提供execl表格下载
     * @return [type] [description]
     * panjie
     * 2016.02
     */
    public function createUserNameAction()
    {
        //取出当前周期
        $CycleL = new CycleLogic();
        $currentCycle = $CycleL->getCurrentList();
        if ($currentCycle === false)
        {
            $this->error("当前周期未设置", U("index"));
            return;
        }

        //取当前周期下所有学生信息
        $StudentL = new StudentLogic();
        $students = $StudentL->getAllListsByCycleId($currentCycle['id']);
        if ($students === false)
        {
            $this->error("学生信息取出错误:" . $StudentL->getError(), U("index"));
            return;
        }

        //依次取出学生信息，判断是否生成了用户名
        $ExpertL = new ExpertLogic();
        $sum = 0;
        foreach ($students as $key => $student)
        {
            $expert = $ExpertL->getListsByStudentId($student['id']);
            $count = count($expert);

            //未生成用户名，或生成的用户名个数不够.
            //则按规则补充生成用户名，并存库
            while ($count < $this->count)
            {
                $data = array();
                $data['username'] = get_rand_str(6, false);
                $data['userpassword'] = get_rand_str(4);
                $data['student_id'] = $student['id'];
                if ($ExpertL->saveList($data) === false)
                {
                    $this->error("保存专家信息错误", U('index'));
                    return;
                }
                $count++;
                $sum++;
            }
        }

        $this->success('成功生成' . $sum . '个专家信息', U('index'));    
    }

    /**
     * 导出用户名至excel
     * @return  execl 包括有论文、专家用户名密码等基本信息的excel文件
     * panjie 
     * 2016.02
     */
    public function exportUserNameAction()
    {
        //初始化excel表头
        $data = array();
        $data[0] = array("学号","姓名","论文名称","研究方向","专家1用户名", "专家一密码", "专家2用户名", "专家2密码");

        //取出当前周期
        $CycleL = new CycleLogic();
        $currentCycle = $CycleL->getCurrentList();
        if ($currentCycle === false)
        {
            $this->error("当前周期未设置", U("index"));
            return;
        }
        
        //取论文信息
        $StudentL = new StudentLogic();
        $students = $StudentL->getAllListsByCycleId($currentCycle['id']);
        if ($students === false)
        {
            $this->error("论文信息取出错误", U('index'));
            return;
        }

        //取论文对应的专家信息
        $ExpertL = new ExpertLogic();
        foreach($students as $key => $student)
        {
            $data[$key+1] = array($student['student_no'], $student['name'], $student['title'], $student['research_direction']);
            $experts = $ExpertL->getListsByStudentId($student['id']);
            {
                if ($experts !== false)
                {
                    foreach($experts as $expert)
                    {
                        $data[$key+1][] = $expert['username'];
                        $data[$key+1][] = $expert['userpassword'];
                     }
                }
            }
        }

        //将数据输出至excel并指导用户下载
        $objPHPExcel = new \PHPExcel();
        $objPHPExcel->getActiveSheet()->fromArray($data, null, 'A1');
        $objPHPExcel->getActiveSheet()->setTitle('用户名');
        $fileName = '云智-专家用户名密码信息' . date("Ymdhis") . '.xls';
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $fileName . '"');
        header('Cache-Control: max-age=0');
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
    }
}
