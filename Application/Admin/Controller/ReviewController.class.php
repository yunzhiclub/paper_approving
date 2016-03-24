<?php
namespace Admin\Controller;

require_once VENDOR_PATH . '/autoload.php';
Vendor('PHPExcel.PHPExcel');
Vendor('PHPExcel.PHPExcel.IOFactory');

use Review\Logic\ReviewLogic;
use ExpertView\Logic\ExpertViewLogic;                   //专家视图信息
use Expert\Logic\ExpertLogic;                           //专家
use ReviewDetailView\Logic\ReviewDetailViewLogic;       //评阅详情
use ReviewDetailOther\Logic\ReviewDetailOtherLogic;     //评阅详情其它信息
use ReviewDetail\Logic\ReviewDetailLogic;               //评阅设置
use PhpOffice\PhpWord\Settings;                         //phpword设置
use PhpOffice\PhpWord\TemplateProcessor;                //phpword模板
use Cycle\Logic\CycleLogic;                             //周期
use Yunzhi\Logic\ZipLogic;                              //ZIP
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

    /**
     * 下载评阅表
     * @param  int $expertId 专家ID
     * @return word文档
     * panjie
     * 2016.02
     */
    public function downLoadTableAction()
    {
        $expertId = (int)I("get.expert_id");

        //生成word文档,成功则返回文件相对于 文件的绝对地址
        $ReviewL = new ReviewLogic();
        $saveInfo = $ReviewL->makeWordByExpertId($expertId);
        
        if ($saveInfo === false)
        {
            die($ReviewL->getError());
        }

        $saveFile = $saveInfo['saveFile'];
        $fileName = $saveInfo['fileName'] . '.doc';


        //指引用户下载
        if(file_exists($saveFile)) {
            header('Content-type: application/msword'); 
            header('Content-Disposition: attachment; filename="' . $fileName  . '"'); 
            ob_clean(); //清空缓冲区
            flush();    //刷新缓冲
            readfile($saveFile);      
        }

        return;
    }

    /**
     * 打包下载评阅表
     * @return  zip file
     * panjie
     * 2016.02
     */
    public function downLoadZipAction()
    {
        //取出当前周期信息
        $CycleL = new CycleLogic();
        $currentCycle = $CycleL->getCurrentList();
        if ($currentCycle === false)
        {
            die($CycleL->getError());
        }

        //取出所有的当前周期下专家信息
        $ExpertViewL = new ExpertViewLogic();
        $experts = $ExpertViewL->getReviewdListsByCycleId($currentCycle['id']);
        if ($experts === false)
        {
            die($ExpertViewL->getError());
        }

        //删除原文件夹
        $saveDir = I('server.DOCUMENT_ROOT') . __ROOT__ . '/download/review/' . $currentCycle['id'];
        if (is_dir($saveDir) && $this->delTree($saveDir) === false)
        {
            echo $saveDir . "Can't be removed.";
            die();
        }

        $zipFileName = $saveDir . '.zip';
        if (is_file($zipFileName) && unlink($zipFileName) === false)
        {
            echo $zipFileName . "Can't be removed.";
            die();
        }
        //依次生成 评阅表
        $ReviewL = new ReviewLogic();
        foreach ($experts as $expert)
        {
            $ReviewL->makeWordByExpertId($expert['id']);
        }

        //打包
        $ZipL = new ZipLogic();
        

        $saveZip = $saveDir . '.zip';

        if( $ZipL->zip($saveDir, $saveZip) === false)
        {
            die($ZipL->getError());
        }

        $downLoadUrl = __ROOT__ . '/download/review/' . $currentCycle['id'] . '.zip';
        echo '<a href="' . $downLoadUrl . '">download</a>';

        //改变HEADER后，下载的ZIP文件出现文件损坏，弃用。
        // header($_SERVER['SERVER_PROTOCOL'].' 200 OK');
        // header("Content-Type: application/zip");
        // header("Content-Transfer-Encoding: Binary");
        // header("Content-Length: " . filesize($saveZip));
        // header("Content-Disposition: attachment; filename=\"".basename($saveZip)."\"");
        // readfile($saveZip);
    }

    /**
     * 下载当前周期评阅统计表
     * @return excel file
     * panjie
     * 2016.03
     */
    public function downloadExcelAction()
    {
        //取出当前周期信息
        $CycleL = new CycleLogic();
        $currentCycle = $CycleL->getCurrentList();
        if ($currentCycle === false)
        {
            die($CycleL->getError());
        }

        //生成数据
        $ReviewL = new ReviewLogic();
        $datas = $ReviewL->createExcelDatas($currentCycle['id']);

        //实例化对像，注意，在NEW之前，在确定已经在文件头部进行了 Vendor('PHPExcel.PHPExcel');
        //实例化时，要在类前加一个 \
        $objPHPExcel = new \PHPExcel();

        // 使用内类的方法，从A1开始，将数组中的数据今次添加至工作表
        $objPHPExcel->getActiveSheet()->fromArray($datas, null, 'A1');

        //设置宽度为auto
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);

        //重新命名工作表
        $objPHPExcel->getActiveSheet()->setTitle($currentCycle['name']);
        $fileName = $currentCycle['name'] . "-评阅统计" . date("Ymdhis") . '.xls';

        //excel 2003 content-type
        // Redirect output to a client’s web browser (Excel5)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $fileName . '"');
        header('Cache-Control: max-age=0');

        //以下为存为2003及以前的格式
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        
        // 引导用户下载
        $objWriter->save('php://output');

    }

    public static function delTree($dir) { 
        $files = array_diff(scandir($dir), array('.','..')); 
        foreach ($files as $file) { 
            (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file"); 
        } 
        return rmdir($dir); 
    } 
}