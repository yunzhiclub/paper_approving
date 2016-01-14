<?php
/**
 * @author denghaoyang
 */

namespace Admin\Controller;

use Admin\Controller\AdminController;
use SystemSettings\Logic\SystemSettingsLogic;

class PaperDistributionController extends AdminController {
	public function editAction(){
		//取系统设置
		$name = "PAPER_DISTRIBUTION";
		$SettingL = new SystemSettingsLogic;
		$SettingL->setSettingName($name);
		$value = $SettingL->getValue();

		//传值
		$this->assign("value",$value);
		$this->display();
	}

	public function saveAction(){
		//取系统设置
		$name = "PAPER_DISTRIBUTION";
		$SettingL = new SystemSettingsLogic;

		$value = I("post.value");
		$SettingL->setSettingName($name);
		$result = $SettingL->saveValue($value);

		if(count($errors = $SettingL->getErrors())!==0)
        {
            //数组变字符串
            $error = implode('<br/>',$errors);

            //显示错误
            $this -> error("更新失败失败，原因：".$error,U('edit'));
        }
        else
        {
            $this -> success("操作成功",U('edit'));
        }
	}
}
    