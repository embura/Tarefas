<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jefferson
 * Date: 28/05/15
 * Time: 10:57
 * To change this template use File | Settings | File Templates.
 */

$arr = array(1,5,3,3,7);

print_r(solution($arr));

function solution($A) {
    // write your code in PHP5.5
    $A1 = $A;
    sort($A1);

    for($i =0 ; $i < (count($A)-1);$i++){
        if($A[$i] >  $A[$i+1] ){
            $tmp = $A[$i];
            $A[$i] = $A[$i+1];
            $A[$i+1] =$tmp;
        }
    }
    $compare = array_diff($A1,$A);
    var_dump($compare);

    if($compare){
        echo "false";
        return false;
    }
    return true;
}