<?php
namespace Home\Controller;

use ExpertView\Logic\ExpertViewLogic;   //专家视图
use Think\Controller;

class LoginController extends Controller
{
    //对用户名密码进行判断
    public function loginAction()
    {
        $username = I('post.username');
        $password = I('post.password');

        //验证用户名密码
    	$ExpertViewL = new ExpertViewLogic;
        if ($ExpertViewL->validate($username, $password, true))
        {
            redirect_url(U('Home/index'));
        }
        else
        {
            redirect_url(U('Index/index/', array("error"=>"用户名或密码错误")));
        }  
    }

    //注销功能
    public function logoutAction()
    {
        session('expert',null);
        $this->success('注销成功', U('Index/index'));
    }

    public function checkAjaxAction()
    {

        $return = array();
        $UserL = new UserModel();
        $username = trim(I('post.username'));
        $password = trim(I('post.password'));
        switch ($UserL->checkUser($username,$password)) 
        {
            case '1':
                //根据post的用户名取出用户信息，再将id与name存入session
                $list = $UserL->getUserInfoByName($username);
                session('user_id',$list['id']);
                session('user_name',$list['username']);

                //登录成功后跳转
                $return['state'] = "success";
                $this->ajaxReturn($return);
                break;

            case '0':
                $return['state'] = "error";
                $return['msg'] = "用户名密码错误" ;
                $this->ajaxReturn($return);
                break;

            case '2':
                $return['state'] = "error";
                $return['msg'] = "无此用户名" ;
                $this->ajaxReturn($return);
                break;
        }
    }
}