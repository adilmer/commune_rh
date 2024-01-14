<?php

namespace App\Traits;

use NumberFormatter ;
use PhpOffice\PhpWord\TemplateProcessor;
use Rmunate\Utilities\SpellNumber;
/**
 * Summary of ExportTrait
 */
trait ExportTrait
{
    /**
     * Summary of exportWord
     * @param mixed $fileRequest
     * @param mixed $Name
     * @param mixed $folder
     * @return string
     */
    function exportWord($data , $template_name, $file_name)
    {

        $templateProcessor = new TemplateProcessor('template_documents/'.$template_name.'.docx');

            foreach ($data as $key => $value){
                if (!is_array($value)){
                    $templateProcessor->setValue($key,$value);
                }
            }
            $path = 'word_documents/'.$file_name.' ('.time().') '.'.docx';
            $templateProcessor->saveAs($path);
            return $path;
    }

    function chiffre_en_lettre($number, $root = true)
    {

        $formatter = new NumberFormatter("fr", NumberFormatter::SPELLOUT);
        $num =  $formatter->format($number);
        return $num;

    }


}
