<?php
namespace Review\logic;

use Review\Model\ReviewModel;
use Expert\Logic\ExpertLogic;

class ReviewLogic extends ReviewModel
{
	protected $errors = array();   							//错误信息

	public function resetPasswordByExpert_id($id)
	{
		$ExpertL = new ExpertLogic();
		$expert = $ExpertL->getListById($id);					//取对应专家信息
		$expert['userpassword'] = C(DEFAULT_PASSWORD);						//重置对应专家密码

		//存储
		try
		{
			if($ExpertL->create($expert))
			{
				$id = $ExpertL->save();
				return $id; 
			}
			else
			{
				$this->errors[] = $this->getError();
				return false;
			}
		}
		catch(\Think\Exception $e)
		{
			$this->errors[] = $e->getMessage();
			return false;
		}
	}

	public function resetSomePasswordByIds($ids)
	{
		$out=array();
		foreach ($ids as $key => $value) {
			# code...
			if(!in_array($value,$out))
			{
				$out[$key]=$value;
			}
		}
		$length=count($out);
		dump($length);

		for($i=0;$i<$length;$i++)
		{
			$map['id']=$ids[$i];
			$user=$this->where($map)->find();
			dump($user);
			$user['password']=C(DEFAULT_PASSWORD);
			$this->save($user);
		}
		return true;
	}

	/**
 * 下载文件
 * @param string $file
 *               被下载文件的路径
 * @param string $name
 *               用户看到的文件名
 */
	function download($file,$name=''){
		$fileName = $name ? $name : pathinfo($file,PATHINFO_FILENAME);
		$filePath = realpath($file);
		
		$fp = fopen($filePath,'rb');
		
		if(!$filePath || !$fp){
			header('HTTP/1.1 404 Not Found');
			echo "Error: 404 Not Found.(server file path error)<!-- Padding --><!-- Padding --><!-- Padding --><!-- Padding --><!-- Padding --><!-- Padding --><!-- Padding --><!-- Padding --><!-- Padding --><!-- Padding --><!-- Padding --><!-- Padding --><!-- Padding --><!-- Padding -->";
			exit;
		}
		
		$fileName = $fileName .'.'. pathinfo($filePath,PATHINFO_EXTENSION);
		$encoded_filename = urlencode($fileName);
		$encoded_filename = str_replace("+", "%20", $encoded_filename);
		
		header('HTTP/1.1 200 OK');
		header( "Pragma: public" );
		header( "Expires: 0" );
		header("Content-type: application/octet-stream");
		header("Content-Length: ".filesize($filePath));
		header("Accept-Ranges: bytes");
		header("Accept-Length: ".filesize($filePath));
		
		$ua = $_SERVER["HTTP_USER_AGENT"];
		if (preg_match("/MSIE/", $ua)) {
			header('Content-Disposition: attachment; filename="' . $encoded_filename . '"');
		} else if (preg_match("/Firefox/", $ua)) {
			header('Content-Disposition: attachment; filename*="utf8\'\'' . $fileName . '"');
		} else {
			header('Content-Disposition: attachment; filename="' . $fileName . '"');
		}
		
    // ob_end_clean(); <--有些情况可能需要调用此函数
    // 输出文件内容
		fpassthru($fp);
		exit;
	}
}
