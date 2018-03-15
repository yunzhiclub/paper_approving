<?php
namespace Admin\Controller;

use Cycle\Logic\CycleLogic;

/**
 * Class CycleController
 * @package Admin\Controller
 * 周期管理
 */

class CycleController extends AdminController
{
    //用户列表显示
    public function indexAction()
    {
        //获取列表
        $CycleL = new CycleLogic();
        $cycles = $CycleL->getLists();

        //传入列表
        $this -> assign('cycles',$cycles);

        //调用v层
        $this -> display();
    }


    public function saveAction()
    {
        //取用户信息
        $cycle = I('post.');

        //添加add()
        $CycleL = new CycleLogic();
        $CycleL -> saveList($cycle);
        //echo $this->getlastsql();

        //判断异常
        if(count($errors = $CycleL->getErrors())!==0)
        {
            //dump($errors);
            //exit();
            //数组变字符串
            $error = implode('<br/>',$errors);

            //显示错误
            $this -> error("添加失败，原因：".$error,U('Admin/Cycle/index?p ='.I('get.p')));
        }
        else
        {
            $this -> success("操作成功",U('Admin/Cycle/index?p ='.I('get.p')));
        }
    }

    public function editAction()
    {
        //获取用户ID
        $cycleId = I('get.id');

        //取用户信息getListById()
        $CycleL = new CycleLogic();
        $cycle = $CycleL->getListById($cycleId);

        //传给前台
        $this -> assign('cycle',$cycle);

        //显示display('add')
        $this -> display('add');
    }

    public function deleteAction()
    {
        //取id
        $cycleId= (int)I('get.id');
        
        $CycleL = new CycleLogic();
        //判断当前周期是否有学生
        if ($CycleL->checkIsUsed($cycleId) === true)
        {
            $this->error("该周期已添加学生，请先删除学生信息后，再行删除");
        }
        
        //删除deleteInfo($Id)
        $status = $CycleL->deleteInfo($cycleId);

        //判断是否删除成功
        if($status!==false)
        {
            $this -> success("删除成功",U('Admin/Cycle/index?p='.I('get.p')));
        }
        else
        {
            $this -> error("删除失败",U('Admin/Cycle/index?p='.I('get.p')));
        }
    }

    public function setCurrentAction()
    {
        $cycleId=I('get.id');

        $CycleL=new CycleLogic();
        $CycleL->deleteCurrent();
        $cycle=$CycleL->getListById($cycleId);

        $cycle['is_current']=1;

        $CycleL->saveList($cycle);

        if(count($errors = $CycleL->getErrors())!==0)
        {
            //数组变字符串
            $error = implode('<br/>',$errors);

            //显示错误
            $this -> error("添加失败，原因：".$error,U('Admin/Cycle/index?p ='.I('get.p')));
        }
        else
        {
            $this -> success("操作成功",U('Admin/Cycle/index?p ='.I('get.p')));
        }
    }

}

