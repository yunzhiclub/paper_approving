<?php
namespace Admin\Controller;

use Student\Logic\StudentLogic;
use Cycle\Logic\CycleLogic;

class StudentController extends AdminController
{
    //用户列表显示
    public function indexAction()
    {
        //获取列表
        $StudentL = new StudentLogic();
        $students = $StudentL->getLists();

        //传入列表
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
        dump($student);

        $CycleL=new CycleLogic();
        $cycleName=$CycleL->getListById($student['cyle_id']);
        dump($cycleName);
        //传给前台
        $this -> assign('student',$student);
        $this->assign('cycleName',$cycleName);

        //显示display('add')
        $this -> display();
    }

    public function saveAction()
    {
        //取用户信息
        $student = I('post.');

        //添加add()
        $StudentL = new StudentLogic();
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
            $this -> success("删除成功",U('Admin/Student/index?p='.I('get.p')));
        }
        else
        {
            $this -> error("删除失败",U('Admin/Student/index?p='.I('get.p')));
        }
    }

    public function detailAction()
    {
        $studentId= I('get.id');
        $StudentL = new StudentLogic();
        $student = $StudentL->getListById($studentId);
        $CycleL=new CycleLogic();
        $cycleName=$CycleL->getListById($student['cyle_id']);
        dump($cycleName);
        $this -> assign('student',$student);
         $this->assign('cycleName',$cycleName);
        $this->display();

    }
}

