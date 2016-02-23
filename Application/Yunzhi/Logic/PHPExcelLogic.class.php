<?php
/**
 * 直接引用PHPExcel.
 * thinkphp导入外置非namespace包时
 * 先将需要导入的库放至Thinkphp\Library\Vendor下。
 * 然后：直接用Vendor()方法进行引用。
 * 使用时，要在引用的类前加 \
 * 注意new的类名，并不是文件名，应该是引用文件中的类名。
 * panjie
 * 2016.02
 * 3792535@qq.com
 */
namespace Yunzhi\Logic;

Vendor('PHPExcel.PHPExcel.IOFactory');
Vendor('PHPExcel.PHPExcel.Cell');

class PHPExcelLogic
{
    private $error = "";
    public function setError($error)
    {
        $this->error = $error;
    }

    public function getError()
    {
        return $this->error;
    }

    /**
     * 读取XLS(xlsx)文件，将第一行，做为数据的键值。自第二行始，做为数据项
     * @param string $filePath  文件在服务器上的具体位置，需要保证有读取权限
     * @return array 二维数组
     */
    public function ReadFile($filePath)
    {
        try
        {
            if (!file_exists($filePath))
            {
                $this->setError("ReadL: file not exists");
                return false;
            }

            $type = strtolower( pathinfo($filePath, PATHINFO_EXTENSION) );
            if ($type == 'xlsx' || $type == 'xls')
            {
                $objPHPExcel = \PHPExcel_IOFactory::load($filePath);
            }
            else
            {
                $this->setError('ReadL: file type is ' . $type . ', but not support');
                return false;
            }

            $sheet = $objPHPExcel->getSheet(0);

            //获取行数与列数,注意列数需要转换
            $highestRowNum = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
            $highestColumnNum = \PHPExcel_Cell::columnIndexFromString($highestColumn);
             
            //取得字段，第一行 为数据的字段，因此先取出用来作后面数组的键名
            $filed = array();
            for($i=0; $i<$highestColumnNum; $i++){
                $cellName = \PHPExcel_Cell::stringFromColumnIndex($i).'1';
                $cellVal = $sheet->getCell($cellName)->getValue();//取得列内容
                $filed []= $cellVal;
            }
             
            //开始从第二行开始取出数据并存入数组
            $data = array();
            for ($i = 2; $i <= $highestRowNum; $i++){
                $row = array();
                for ($j = 0; $j < $highestColumnNum; $j++){
                  $cellName = \PHPExcel_Cell::stringFromColumnIndex($j).$i;
                  $cellVal = $sheet->getCell($cellName)->getValue();
                  $row[ $filed[$j] ] = $cellVal;
                }
                $data []= $row;
            }
            return $data;
        }
        catch(\Exception $e)
        {
            $this->setError("ReadL: exceptions " . $e->getMessage());
            return false;
        }
    }
}