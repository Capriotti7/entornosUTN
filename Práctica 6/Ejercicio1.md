Para comenzar la comunicación con un servidor de base de datos MySQL, es necesario abrir una conexión a ese servidor. Para inicializar esta conexión, PHP ofrece la función:
  mysqli_connect()

Todos sus parámetros son opcionales, pero hay tres de ellos que generalmente son necesarios:
  $hostname (servidor), $nombreUsuario (nombre de usuario de la base de datos), $contraseña (contraseña para el usuario de la base de datos)

Una vez abierta la conexión, se debe seleccionar una base de datos para su uso, mediante la función:
  mysqli_select_db()

Esta función debe pasar como parámetro:
  $nombreConexión (el recurso de conexión obtenido mediante mysqli_connect), $nombreBaseDatos (el nombre de la base de datos)

La función mysqli_query () se utiliza para:
  Esta función nos permite ejecutar una consulta SQL a la base de datos que especifiquemos.

y requiere como parámetros:
  $nombreConexion (el recurso de conexión), $query (la consulta SQL que se desea ejecutar, como una cadena de texto)

La cláusula or die() se utiliza para:
  Capturar el error.

y la función mysqli_error() se puede usar para:
  Devolver el último mensaje de error para la llamada más reciente a una función de MySQLi que puede haberse ejecutado correctamente o haber fallado.

Si la función mysqli_query() es exitosa, el conjunto resultante retornado se almacena en una variable, por ejemplo $vResult, y a continuación se puede ejecutar el siguiente código (explicarlo):

<?php
while ($fila = mysqli_fetch_array($vResultado))
{
?>
<tr>
  <td><?php echo ($fila[0]); ?></td>
  <td><?php echo ($fila[1]); ?></td>
  <td><?php echo ($fila[2']); ?></td>
</tr>
<tr>
  <td colspan="5">
<?php
}
mysqli_free_result($vResultado);
mysqli_close($link);
?>

-La estructura while usa mysqli_fetch_array($vResultado), que extrae cada fila de datos obtenida en la consulta como un array fila.
-Dentro del bucle, se imprimen cada uno de los valores de las columnas de esa fila en celdas <td> de una tabla HTML.
-mysqli_free_result($vResultado); libera la memoria usada por el resultado de la consulta.
-mysqli_close($link); cierra la conexión a la base de datos, liberando recursos del servidor.