<?php
namespace Admin\Controller;


class AttachmentController extends AdminController
{
	public function indexAction()
    {
        // $AttachmentL = new AttachmentLogic();
        // $Attachments = $AttachmentL->getLists();
        // //dump($users);

        // //传入列表
        // $this -> assign('Attachments',$Attachments);

        // //调用v层
        $this -> display();
    }

}
