<!-- indicar si los siguentes códigos son equivalentes--> 
<!-- ejercicio 2 a) --> 
<?php
$i = 1;
while ($i <= 10) {
 print $i++;         //mientras la variable sea <= a 10 se va a mostrar el contenido de la variable. En la primer salida se muestra 1 y luego se incrementa en una unidad. 
}
?> 

<?php
$i = 1;
while ($i <= 10):
 print $i;          //idem 1 pero con la diferencia de que se usa la sintaxis alternativa de PHP para estructuras de control, con : y endwhile, lo que no cambia la funcionalidad.
 $i++;
endwhile;
?>

<?php
$i = 0;
do {
 print ++$i;        //Aunque todos imprimen los números del 1 al 10, este código utiliza un bucle do-while, lo cual garantiza que el cuerpo del bucle se ejecute al menos una vez antes de verificar la condición.
} while ($i<10);
?>

<!-- los códigos son equivalentes, si bien utilzan distinas funciones, la salida en los tres casos es la misma--> 

<!-- ejercicio 2 b) --> 

<?php
for ($i = 1; $i <= 10; $i++) {
 print $i;
}
?>

<?php
for ($i = 1; $i <= 10; print $i, $i++) ;
?>

<?php
for ($i = 1; ;$i++) {
 if ($i > 10) {
 break;
 }
 print $i;
}
?>

<?php
$i = 1;
for (;;) {
 if ($i > 10) {
 break;
 }
 print $i;
 $i++;
}
?>

<!-- 
Los cuatro códigos son esencialmente equivalentes en función, aunque los dos últimos usan formas infinitas del bucle for (for(;;)) con una condición de ruptura (break) explícita.
En todos los casos, el resultado será imprimir los números del 1 al 10.
-->

<!-- ejercicio 2 c) --> 

<?php
…
…
if ($i == 0) {
 print "i equals 0";
} elseif ($i == 1) {
 print "i equals 1";
} elseif ($i == 2) {
 print "i equals 2";
}
?>

<?php
…
…
switch ($i) {
 case 0:
 print "i equals 0";
 break;
 case 1:
 print "i equals 1";
 break;
 case 2:
 print "i equals 2";
 break;
}
?>

<!-- Ambos códigos muestran la misma salida para los mismos valores de entrada ($i = 0, $i = 1, y $i = 2). 
 La funcionalidad es equivalente entre las estructuras if-elseif y switch, ya que ambas evalúan el valor de $i y, 
 dependiendo de este valor, imprimen la cadena correspondiente sin ejecutar los otros bloques de código.-->