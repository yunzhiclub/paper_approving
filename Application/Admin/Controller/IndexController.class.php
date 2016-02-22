<?php
namespace Admin\Controller;
use Admin\Controller;
use Yunzhi\Logic\PHPExcelLogic;
class IndexController extends AdminController {
    
    public function indexAction(){
        
        $this->display();
        $filePath = "/Applications/XAMPP/htdocs/paper_approving/Public/uploads/test/yunzhi.xls";
        $ReadL = new PHPExcelLogic;
        if (!$data = $ReadL->ReadFile($filePath))
        {
            dump($ReadL->getError());
        }
        else
        {
            dump($data);
        }
    }

    public function saveAction(){
    	dump(I('post.'));
    }
}
