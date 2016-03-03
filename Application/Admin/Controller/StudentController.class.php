<?php
namespace Admin\Controller;

use Student\Logic\StudentLogic;
use Yunzhi\Logic\PHPExcelLogic;  //phpexcel
use Cycle\Logic\CycleLogic;         //周期信息

class StudentController extends AdminController
{
    //用户列表显示
    public function indexAction()
    {
        //取当前周期
        $CycleL = new CycleLogic();
        $currentCycle = $CycleL->getCurrentList();

        //判断系统是否处理准备阶段
        $unStart = 1;
        $beginTime = strtotime($currentCycle['starttime']);
        if ($beginTime < time())
        {
            $unStart = 0;
        }

        //获取列表
        $StudentL = new StudentLogic();
        $students=$StudentL->getLists(array(),array("cycle_id" => $currentCycle['id']));

        //传入列表
        $this->assign('unStart', $unStart);
        $this -> assign('students',$students);

        //调用v层
        $this -> display();
    }

    public function editAction()
    {
        //获取用户ID
        $studentId = I('get.id');

        //取用户信息getListById()
        $StudentL = new StudentLogic();
        $student = $StudentL->getListById($studentId);
 
        //传给前台
        $this -> assign('student',$student);

        //显示display('add')
        $this -> display();
    }

    public function addAction()
    {
         $this -> display('edit');
    }
    public function saveAction()
    {
        //取用户信息
        $student = I('post.');

        //添加add()
        $StudentL = new StudentLogic();
        $Cycle= new CycleLogic();
        $cycle=$Cycle->getCurrentList();
        $student['cycle_id']=$cycle['id'];
        $StudentL -> saveList($student);
        //echo $this->getlastsql();

        //判断异常
        if(count($errors = $StudentL->getErrors())!==0)
        {
            //dump($errors);
            //exit();
            //数组变字符串
            $error = implode('<br/>',$errors);

            //显示错误
            $this -> error("添加失败，原因：".$error,U('Admin/Student/index?p ='.I('get.p')));
        }
        else
        {
            $this -> success("操作成功",U('Admin/Student/index?p ='.I('get.p')));
        }
    }

    

    public function deleteAction()
    {
        //取id
        $studentId= I('get.id');

        //删除deleteInfo($Id)
        $StudentL = new StudentLogic();
        $status = $StudentL->deleteInfo($studentId);

        //判断是否删除成功
        if($status!==false)
        {
            $this -> success("删除成功",U('Admin/Student/index?id=', I('get.')));
        }
        else
        {
            $this -> error("删除失败",U('Admin/Student/index?id=', I('get')));
        }
    }

    public function detailAction()
    {
        $studentId=I('get.id');

        $StudentL = new StudentLogic();
        $student=$StudentL->getListById($studentId);

        $CycleL= new CycleLogic();
        $cycle=$CycleL->getListById($student['cycle_id']);

        $this->assign('student',$student);
        $this->assign('cycle',$cycle);

        $this->display();
    }

    /**
     * 读取excel并将学生信息存入数据库
     * @param $url 文件相对于站点根目录的位置
     * @return json 成功：status = "SUCCESS" , 失败： status="ERROR" message="错误信息"
     * panjie
     * 2016.02
     */
    public function readExcelAjaxAction()
    {
        //定义返回值
        $return = array("status"=>"ERROR");

        //接收路径并接拼为实际的路径
        $url = I('get.url');
        $filePath = I('server.DOCUMENT_ROOT') . $url;

        //读取EXCEL数据
        $PHPExcel = new PHPExcelLogic();
        $students = $PHPExcel -> ReadFile($filePath);
        if ($students === false)
        {
            $return['message'] = "读取Excel文件发生错误，信息:" . $PHPExcel->getError();
            echo json_encode($return);
            return;
        }
        
        //读取当前周期
        $CycleL = new CycleLogic();
        $currentCycle = $CycleL->getCurrentList();
        if ($currentCycle === null)
        {
            $return['message'] = "未获取到当前周期信息";
            echo json_encode($return);
            return;
        }

        //清空当前周期原有学生数据
        $StudentL = new StudentLogic();
        $return['data']['deleteCount'] = $StudentL->deleteListsByCycleId($currentCycle['id']);

        //添加新学生数据
        $saveReturn = $StudentL->saveListsByCycleId($students, $currentCycle['id']);
        if ( $saveReturn === false)
        {
            dump($StudentL->getError());
            $return['message'] = "数据添加错误:" . $StudentL->getError();
            echo json_encode($return);
            return;
        }

        $return['data']['successCount'] = $saveReturn['successCount'];
        $return['data']['repeatCount'] = $saveReturn['repeatCount'];
        $return['status'] = "success";
        echo json_encode($return);
        return;
    }
}

