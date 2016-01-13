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
		echo $SettingL->saveValue($value);
	}
}
    