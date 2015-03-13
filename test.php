<?php
include 'src/Baidumap.php';

$baidu = new Baidumap();
$p = new b4(1294830854, 484857493);
$ll = $baidu->convertMC2LL($p);
var_dump($ll);