<?php
namespace Admin\Controller;
use Admin\Controller;
use Yunzhi\Logic\PHPExcelLogic;
use Yunzhi\Logic\ZipLogic;

class IndexController extends AdminController {
    
    public function indexAction(){
        
        $this->display();
    }
}
