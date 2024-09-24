<?php
function doble($i) {
 return $i*2;
}
$a = TRUE; 
$b = "xyz"; 
$c = 'xyz';
$d = 12; 
echo gettype($a);
echo gettype($b); 
echo gettype($c);
echo gettype($d); 
if (is_int($d)) {
 $d += 4;
}
if (is_string($a)) {
 echo "Cadena: $a";
}
$d = $a ? ++$d : $d*3;
$f = doble($d++);
$g = $f += 10;
echo $a, $b, $c, $d, $f , $g;
?>