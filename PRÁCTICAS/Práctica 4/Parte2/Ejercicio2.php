<?php 
$matriz = array("x" => "bar", 12 => true);
echo $matriz["x"];
echo $matriz[12];      
?>

<!-- el codigo nos devuelve bar1 !-->

<?php 
$matriz = array("unamatriz" => array(6 => 5, 13 => 9, "a" => 42)); 
echo $matriz["unamatriz"][6];      
echo $matriz["unamatriz"][13];    
echo $matriz["unamatriz"]["a"];  
?> 

<!-- el codigo nos devuelve 5942 !-->

<?php 
$matriz = array(5 => 1, 12 => 2); 
$matriz[] = 56;      
$matriz["x"] = 42;  
unset($matriz[5]);  
unset($matriz);  
?>

<!-- el codigo nos devuelve no nos devuelve nada, primero crea una matriz, la carga con valores, elimina un elemento y elimina toda la matriz !-->