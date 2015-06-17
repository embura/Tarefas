<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jefferson
 * Date: 28/05/15
 * Time: 10:43
 * To change this template use File | Settings | File Templates.
 */
echo "<pre>";
echo "aqui";

$A = array(1,3,2,1);
$B = array(4,2,5,3,2);

echo "\n".(solution($A, $B));


function solution(&$A, &$B) {
    $n = count($A);
    $m = count($B);
    sort($A);
    sort($B);
    $i = 0;
    for ($k = 0; $k < $n; $k++) {
        if ($i < $m - 1 AND $B[$i] < $A[$k])
            $i += 1;
        if ($A[$k] == $B[$i])
            return $A[$k];
    }
    return -1;
}
