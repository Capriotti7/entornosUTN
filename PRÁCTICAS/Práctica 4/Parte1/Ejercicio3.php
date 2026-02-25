<html>
<head><title>Documento 1</title></head> 
<body> 
<?php     echo "<table width = 90% border = '1' >";
$row = 5;     
$col = 2;     
for ($r = 1; $r <= $row; $r++) {     
         echo "<tr>";           
         for ($c = 1; $c <= $col;$c++) {           
               echo "<td>&nbsp;</td>\n";          
            }     
        echo "</tr>\n";   
        }   
echo "</table>\n"; 
?> 
</body>
</html>

<!-- 
Este codigo sirve para generar una tabla con 5 filas y 2 columnas, con un ancho del 90% de la pagina
y con un borde de 1px de ancho. El contenido de la celdas es $nbsp que es un espacio en blanco
!--> 


<html> 
<head><title>Documento 2</title></head> 
<body> 
<?php 
if (!isset($_POST['submit'])) 
{ 
?>     
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    Edad: <input name="age" size="2">     
    <input type="submit" name="submit" value="Ir">     
    </form> 
<?php     
    }
 else {       
    $age = $_POST['age']; 
    if ($age >= 21) {      
         echo 'Mayor de edad';         
         }     
    else {         
        echo 'Menor de edad';     
        } 
    } 
?> 
</body></html> 

<!--
Este codigo crea un formulario el cual solicita ingresar la edad de una persona, dependiendo de la edad ingresada,
se devuelve si es mayor o menor a 21 años. Este codigo se fija si el formulario ya fue mandado, si no se presiono el boton
submit, se muestra el formulario.
!--> 