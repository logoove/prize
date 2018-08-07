<?php
header('content-type:text/html;charset=utf-8');
function dump($arr){
    echo '<pre>'.print_r($arr,TRUE).'</pre>';
}
require_once('Redpaper.class.php');
$total = 1;
$num = 100;
$max = 0.01;
$min = 0.01;
$a = new Redpaper();
$arr = $a->random_red($total, $num, $max, $min);
dump($arr);
