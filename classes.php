<?php

class something{
    function operation1(){
return "smth";
    }
    function operation2($param1, $param2){
return $param1 . $param2;
    }
}

$a = new something();
$a -> operation1();
$a -> operation2(12,"test");
$x = $a -> operation1();
$y = $a -> operation2(12,"test");
?>