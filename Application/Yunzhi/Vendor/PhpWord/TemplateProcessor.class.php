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
        $pattern = '/(<w:t>' . $index . '<\/w:t>)(.*?:char=")(.*?)("\/>)/i';
        preg_match($pattern, $this->tempDocumentMainPart, $matchs);
        // $replacement = '\2' . $unicode . '\4' . $unicode;
        $replacement = '\2' . $unicode . '\4';
        
        $this->tempDocumentMainPart = preg_replace($pattern, $replacement, $this->tempDocumentMainPart);
        // dump($this->tempDocumentMainPart);

    }
}