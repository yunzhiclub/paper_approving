<?php
/**
 * 系统设置模块
 * 邓浩洋
 */
namespace SystemSettings\Logic;

use SystemSettings\Model\SystemSettingsModel;

class SystemSettingsLogic extends SystemSettingsModel
{
	protected $name = null;

	//设置系统设置名称
	public function setSettingName($name){
		$this->name = $name;
	}

	/**
	 * @return int 论文分配数目
	 */
	public function getValue(){
		$map = array();
		$map['name'] = $this->name;

		return $this->where($map)->find()['value'];
	}


	/**
	 * @return array array($status,$msg)
	 */
	public function saveValue($value){
		$map = array();
		$map['name'] = $this->name;

		$data = array();
		$data['value'] = $value;

		return $this->where($map)->save($data);
	}
}