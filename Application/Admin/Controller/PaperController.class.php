<?php
/**
 * 论文管理
 * todo:前台生成评阅信息后。
 * 点击是否评阅 是 下载单个专家的评阅表
 * 批量下载评阅表
 * 下载评阅统计表
 * panjie
 * 2016.02
 */
namespace Admin\Controller;

use Cycle\Logic\CycleLogic;             //周期
use Org\Util\String;
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
     * @return String
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
        $StudentViewL->addMaps(array("cycle_id"=>$currentCycle['id']));

        //根据查看数据类型定制查询条件
        $type = I("get.type");
        if ( !($type === "" || $type === "all") )
        {
            if ($type === "uploaded")
            {
                $StudentViewL->addMaps(array('attachment_id'=>array('neq', '0')));
            }
            else if ( $type === "toupload" )
            {
                $StudentViewL->addMaps(array("attachment_id"=>"0"));
            }
        }

        //按是否评阅进行筛选
        if ($type === "reviewed" || $type === "reviewing")
        {
            //取出全部当前周期及关键字数据
            $students = $StudentViewL->getAllLists();
            $revieweds   = array();    //已评阅
            $reviewings  = array();   //未评阅

            //查看是否已评阅
            //两个专家有任一专家未评阅，设置论文为 评阅中
            $ExpertL     = new ExpertLogic();
            foreach($students as $student)
            {
                $experts = $ExpertL->getListsByStudentId($student['id']);
                if ($experts === false)
                {
                    array_push($reviewing, $student);
                    continue;
                }
                else
                {
                    //是否全部评阅
                    $isReviewed = true;
                    foreach ($experts as $expert)
                    {
                        if ($expert['is_reviewed'] === "1")
                        {
                            $isReviewed = true && $isReviewed;
                        }
                        else
                        {
                            $isReviewed = false && $isReviewed;
                        }
                    }

                    //按是否评阅进行分组
                    if ($isReviewed === true)
                    {
                        array_push($revieweds, $student);
                    }
                    else
                    {
                        array_push($reviewings, $student);
                    }
                }
            }

            //依据用户的筛选内容，设定返回值
            if ($type === "reviewed")
            {
                $papers = $revieweds;
            }
            else
            {
                $papers = $reviewings;
            }

            //显示当前页数据
            $totalCount = count($papers);
            $page = ((int)I('get.p') > 0) ? (int)I('get.p') : 1;
            $papers = array_slice($papers, ($page - 1) * C('YUNZHI_PAGE_SIZE'), C('YUNZHI_PAGE_SIZE'));
        }
        else
        {
            //查询记录
            $papers = $StudentViewL->getLists();
            $totalCount = $StudentViewL->getTotalCount();
        }
        
        
        //引入模型
        $M = new indexModel();


        //传入列表
        $this->assign("totalCount", $totalCount);
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
        $studentNo = $this->_matchStudentNo($name);
        if ($studentNo === false)
        {
            $return["message"] = "上传附件名:" . $name ."不符合规则,示例:10080_郭朝辉_080503_201321803004_LW";
            echo json_encode($return);
            return;
        }
    
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
                $data['cycle_id'] = $currentCycle['id'];
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
        $header = array("学号","姓名","论文名称","研究方向","专家用户名", "专家密码");

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
        $datas = array();
        $ExpertL = new ExpertLogic();
        foreach($students as $key => $student)
        {    
            $experts = $ExpertL->getListsByStudentId($student['id']);
            {
                if ($experts !== false)
                {
                    //按专家数量，将信息加入待输出数组
                    foreach($experts as $keyj => $expert)
                    {
                        //如果为首次输出，则首先添加头信息
                        if ($key == 0)
                        {
                            $datas[$keyj][0] = $header;
                        }

                        //添加其它数据
                        $datas[$keyj][$key+1] = array($student['student_no'], $student['name'], $student['title'], $student['research_direction']);

                        //添加专家用户名，密码
                        $datas[$keyj][$key+1][] = $expert['username'];
                        $datas[$keyj][$key+1][] = $expert['userpassword'];
                    }
                }
            }
        }

        //将数据输出至excel并指导用户下载
        $objPHPExcel = new \PHPExcel();

        //按生成的专家用户密码数据生成sheet
        foreach($datas as $key => $data)
        {
            $objPHPExcel->createSheet();
            $objPHPExcel->setActiveSheetIndex($key);
            $objPHPExcel->getActiveSheet()->fromArray($data, null, 'A1');
            $objPHPExcel->getActiveSheet()->setTitle('用户名密码' . ($key + 1));

        }
        
        $fileName = '专家用户名密码信息' . date("Ymdhis") . '.xls';
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $fileName . '"');
        header('Cache-Control: max-age=0');
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
    }

    /**
     * 在字符串出匹配出学号，并返回
     * @param  string $string 示例：10080_郭朝辉_080503_201321803004_LW
     * @return string         学号
     * panjie
     * 2016.03
     */
    private function _matchStudentNo($string)
    {
        $pattern = "/^10080_[\s\S]*_\d{6}_(\d{12})_/i";
        if (preg_match_all( $pattern, $string, $matches ) === false)
        {
            return false;
        }
        return $matches[1][0];
    }

    // public function testAction()
    // {
    //     return dump($this->_matchStudentNo("10080_郭朝辉_080503_201321803004_LW"));
    // }
}
