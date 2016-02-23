<?php
namespace Admin\Controller;


use Review\Logic\ReviewLogic;

/**
* 
*/
class ReviewController extends AdminController
{
	
public function indexAction()				//初始页面
	{
		$ReviewL=new ReviewLogic();				
		$reviews=$ReviewL->getlists();			//取评阅信息
		$this->assign('reviews',$reviews);		//向V层赋值
		$this->display();
		
	}
	public function editAction()
    {
        //获取用户ID
        $reviewId = I('get.id');

        //取用户信息getListById()
        $ReviewL = new ReviewLogic();
        $review = $ReviewL->getListById($reviewId);

        //传给前台
        $this -> assign('review',$review);

        //显示display('add')
        $this -> display('add');
    }

    public function saveAction()
    {
        
        //取用户信息
        $review = I('post.');

        //保存
        $ReviewL = new ReviewLogic();
        $ReviewL -> saveList($review);
        //echo $this->getlastsql();

        //判断异常
        if(count($errors = $ReviewL->getErrors())!==0)
        {
            
            //数组变字符串
            $error = implode('<br/>',$errors);

            //显示错误
            $this -> error("添加失败，原因：".$error,U('Admin/ReviewSetting/index?p='.I('get.p')));
        }
        else
        {
            $this -> success("操作成功",U('Admin/ReviewSetting/index?p='.I('get.p')));
        }
    }

    public function deleteAction()
    {
        //取id
        $reviewId= I('get.id');

        //删除
        $ReviewL = new ReviewLogic();
        $status = $ReviewL->deleteList($reviewId);

        //判断是否删除成功
        if($status!==false)
        {
            $this -> success("删除成功",U('Admin/ReviewSetting/index?p='.I('get.p')));
        }
        else
        {
            $this -> error("删除失败",U('Admin/ReviewSetting/index?p='.I('get.p')));
        }
    }

}