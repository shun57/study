<?php

require_once 'Reader.php';
require_once 'CSVFileReader.php';
require_once 'XMLFileReader.php';

/**
 * Readerクラスのインスタンス生成を行なうクラスです
 */
class ReaderFactory
{
    /**
     * Readerクラスのインスタンスを生成します
     */
    public function create($filename)
    {
        $reader = $this->createReader($filename);
        return $reader;
    }

    /**
     * Readerクラスのサブクラスを条件判定し、生成します
     */
    private function createReader($filename)
    {
        $poscsv = stripos($filename, '.csv');
        $posxml = stripos($filename, '.xml');

        if ($poscsv !== false) {
            $r = new CSVFileReader($filename);
            return $r;
        } elseif ($posxml !== false) {
            return new XMLFileReader($filename);
        } else {
            die('This filename is not supported : ' . $filename);
        }
    }
}
