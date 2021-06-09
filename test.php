<?php
$ar=array("seven","one","two","three","four","seven","eleven" ,"seven");
$newDices = array();
$i = count($newDices);
echo $i."----<br>";
$n = sizeof($ar);
for( $ii=0; $ii <sizeof($ar); $ii++){
    echo $ii." ".$ar[$ii]."<br>";
}
echo "---------<br>";
if (($key = array_search("seven", $ar)) !== false) {
    echo $key."<br>";
    array_splice($ar,$key,1);
}
$n = count($ar);
for( $ii=0; $ii <$n; $ii++){
    echo $ii." ".$ar[$ii]."<br>";
}
$ar[] = "ten";
echo "---------<br>";
if (($key = array_search("seven", $ar)) !== false) {
    echo $key."<br>";
    array_splice($ar,$key,1);
}
$n = count($ar);
for( $ii=0; $ii <$n; $ii++){
    echo $ii." ".$ar[$ii]."<br>";
}
// $regex = "/\([\d\w]+\)/";
// $string = "Hello haha(oj)(dice)1234fiwjoqmsa(oj)(123) akmd<br>";
// echo $string;
//                 preg_match_all($regex, $string, $matches);
//                 $i = 0;
//                 foreach ($matches[0] as $word) {
//                     //dice1 == (oj) : AC / WA / RE
//                     if($word == "(oj)"){
//                         $n = 1;
//                         $string = preg_replace("/\(oj\)/", "(123".$i.")", $string, 1);
//                         $i = $i+1;
//                         echo $string;
//                     }

                    
//                 }
//                 // for($i=0;$i<10;$i++){
//                 //     echo rand(0,2);
//                 // }
?>