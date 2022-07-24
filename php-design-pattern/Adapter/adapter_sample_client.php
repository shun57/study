<?php
require_once 'ShowFile.php';

/**
 * ShowFileクラスをインスタンス化する。
 * 内容を表示するファイルは、「ShowFile.php」
 */
try {
    $show_file = new ShowFile('./ShowFile.php');
} catch (Exception $e) {
    die($e->getMessage());
}

/**
 * プレーンテキストとハイライトしたファイル内容をそれぞれ
 * 表示する
 */
$show_file->showPlain();
echo '<hr>';
$show_file->showHighlight();
