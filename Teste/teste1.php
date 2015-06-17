<?php


/**
 * Created by JetBrains PhpStorm.
 * User: jefferson
 * Date: 28/05/15
 * Time: 09:54
 * To change this template use File | Settings | File Templates.
 */

// WRONG ANSWER  (got  expected ew tset sredoc)

$frase ='we test coders';

echo "\n";
echo $frase;
echo "\n";
print_r(solution($frase));


// you can use print for debugging purposes, e.g.
// print "this is a debug message\n";

// you can use print for debugging purposes, e.g.
// print "this is a debug message\n";



    function solution($S) {
        // write your code in PHP5.5

        $newWork ="";
        $works = strrev($S);
        $worksReverse = explode(" ",$works);

        $i = 0;

        foreach($worksReverse as $work){
            $space = "";
            if($i == 0){
                continue;
            }else{
                $space = " ";
            }
            $i++;

            $newWork += $space.$work;
        }

        print_r($newWork);
        return $newWork;
    }

