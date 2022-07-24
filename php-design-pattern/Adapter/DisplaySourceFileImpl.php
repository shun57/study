<?php

require_once 'DisplaySourceFile.php';
require_once 'ShowFile.php';


class DisplaySourceFileImpl extends ShowFile implements DisplaySourceFile
{
    public function __construct($filename)
    {
        parent::__construct($filename);
    }

    public function display()
    {
        parent::showHighlight();
    }
}
