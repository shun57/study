<?php
require_once 'ReaderFactory.php';
?>
<html lang="ja">
<head>
<title>作曲家と作品たち</title>
</head>
<body>
<?php
    /**
     * 外部からの入力ファイルです
     */
    $filename = 'Music.xml';

// もし拡張子が増えてもクライアントのコード差し替えは不要
$factory = new ReaderFactory();
$data = $factory->create($filename);
$data->read();
$data->display();
?>
</body>
</html>