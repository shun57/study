<?php

declare(strict_types=1);

require_once 'DataListDisplay.php';
require_once 'TableDisplay.php';

$display_data = array('Design Pattern','Gang of Four','Template Method Sample1','Template Method Sample2');

$display1 = new DataListDisplay($display_data);
$display2 = new TableDisplay($display_data);

$display1->display();
echo '<hr>';
$display2->display();
