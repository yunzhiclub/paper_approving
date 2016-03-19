<?php
namespace Yunzhi\Vendor\PhpWord;

use PhpOffice\PhpWord\TemplateProcessor as TemplateP;

class TemplateProcessor extends TemplateP
{
    public function getTempDocumentMainPart()
    {
        return $this->tempDocumentMainPart;
    }

    public function setTempDocumentMainPart($string)
    {
        $this->tempDocumentMainPart = $string;
    }

    public function setUnicodeValue($index, $unicode)
    {
         // dump($this->tempDocumentMainPart);
        $pattern = '/(<w:t>' . $index . '<\/w:t>)(.{0,100}?:char=")(.*?)("\/>)/i';
        preg_match($pattern, $this->tempDocumentMainPart, $matchs);
        // $replacement = '\2' . $unicode . '\4' . $unicode;
        $replacement = '\2' . $unicode . '\4';
        
        $this->tempDocumentMainPart = preg_replace($pattern, $replacement, $this->tempDocumentMainPart);
        // dump($this->tempDocumentMainPart);
    }

    public function setChecked($index)
    {
        $check = "F0FE";
        return $this->setUnicodeValue($index, $check);
    }

    public function setUnchecked($index)
    {
        $unCheck = "F0A8";
        return $this->setUnicodeValue($index, $unCheck);
    }
}