<?php
/**
 * 前台的基类
 * panjie
 */
use Yunzhi\Model\AttachmentModel;
class BaseModel
{
	/**
	 * 通过附件IDS，返回附件的URL信息
	 * @param  string $attachmentIds 字符串 "1,2,3,4"
	 * @return lists               二维数组
	 */
	public function getListsByAttachmentIds($attachmentIds , $delimiter = ",")
	{
		$datas = array();
		$attachmentIdArray = explode($delimiter, $attachmentIds);
		foreach ($attachmentIds as $attachmentIdArray)
		{
			$datas["$attachmentId"] => $this->getListByAttachmentId($attachmentId);
		}
		return $datas;
	}

	/**
	 * 通过附件ID,返回附件信息
	 * @param  int $attachmentId 附件ID
	 * @return list               一组数组，其中附件的URL，用绝对地址进行了拼接
	 */
	public function getListByAttachmentId($attachmentId)
	{
		$AttachmentM = new AttachmentModel();
		$data = $AttachmentM->getListById($attachmentId);
		if (isset($data))
		{
			$data['url'] = ROOT . $data['savepath'] . $data['savename'];
		}
		else
		{
			return array();
		}
	}
}