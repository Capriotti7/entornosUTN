<?php
function doble($i) {
 return $i*2; //Función que toma un parámetro $i, y devuelve el doble de su valor.
}
$a = TRUE; // $a variable de tipo boolean 
$b = "xyz"; // $b variable de tipo string
$c = 'xyz'; // $c variable de tipo string 
$d = 12; // $d variable de tipo integer
echo gettype($a);
echo gettype($b); 
echo gettype($c);
echo gettype($d); 
//la salida muestra: 'boolean' , 'string', 'string', 'integer'
if (is_int($d)) { //funcion is_int para determinar si la variable es entera
 $d += 4;
}
if (is_string($a)) { //funcion is_string para determinar si la variable es una cadena de caracteres. 
 echo "Cadena: $a"; //la salida muestra: 'Cadena: 1'
}
$d = $a ? ++$d : $d*3; 
$f = doble($d++);
$g = $f += 10;
echo $a, $b, $c, $d, $f , $g; //la salida muetsra: 1, xyz, xyz, 18, 44, 44
?>

<!-- operadores: 
* Multiplicación 
+ Adición (operador binario)
+= Adición compuesta (incrementa $g en 10).
++ operador unario
? : Operador ternario (usado para evaluar $d).
-->

<!-- estructuras de control: 
if (is_int($d)) 
if (is_string($a))
en estas funciones se utiliza la estructura de control if, esta permite la ejecución condicional de
fragmentos de código.
-->