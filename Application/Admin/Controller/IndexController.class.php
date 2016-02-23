<?php
namespace Admin\Controller;
use Admin\Controller;
use Yunzhi\Logic\PHPExcelLogic;
class IndexController extends AdminController {
    
    public function indexAction(){
        
        // $this->display();
        // //读取execl文件，并将结果做为数组返回
        // $filePath = "/Applications/XAMPP/htdocs/paper_approving/Application/Test/yunzhi.xlsx";
        $ReadL = new PHPExcelLogic;
        // if (!$data = $ReadL->ReadFile($filePath))
        // {
        //     dump($ReadL->getError());
        // }
        // else
        // {
        //     dump($data);
        // }

        // 将数组中的值写入EXCEL，供用户下载
        $ReadL->arrayToExcel();

    }

    public function saveAction(){
    	dump(I('post.'));
    }
}
