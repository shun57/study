<?php

require_once 'DisplaySourceFile.php';
require_once 'ShowFile.php';


// 委譲パターン
class DisplaySourceFileImpl implements DisplaySourceFile
{
    private $show_file;

    public function __construct($filename)
    {
        $this->show_file = new ShowFile($filename);
    }

    public function display()
    {
        $this->show_file->showHighlight();
    }
}
