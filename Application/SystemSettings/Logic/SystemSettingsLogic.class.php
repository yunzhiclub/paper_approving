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
	protected  $errors = array();

    public function getErrors()
	{
		return $this->errors;
	}

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
		try{
			$map = array();
			$map['name'] = $this->name;

			$data = array();
			$data['value'] = $value;

			$return = $this->where($map)->save($data);
			if ($return === false) {
    			$this->errors[] = $this->getError();
    			return false;
			}else{
				return $return;
			}
		}
		catch(\Think\Exception $e)
    	{
    		$this->errors[] = $e->getMessage();
    		return false;
    	}
	}
}