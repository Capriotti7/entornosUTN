# <!-- Código controlado el día 12/08/2009 →

Esta sentencia se puede colocar en cualquier seccion del documento HTML, por lo general, dentro del head o el body.
En cuanto a las etiquetas de abierto y cierre de comentarios son obligatorias, el contenido va entre las etiquetas y es el comentario;
y los comentarios no cuentan con atributos.

---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
# <div id="bloque1">Contenido del bloque1</div>

Esta sentencia se coloca dentro del <body> de un documento HTML. El <div> es un elemento de bloque.
Las etiquetas <div> (apertura) y </div> (cierre) son obligatorias para definir un contenedor. Cuenta con un atributo id
que sirve para identificar el bloque. El contenido va entre las etiquetas y representa el contenido del elemento con id "bloque1"

---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
# <img src="" alt="lugar imagen" id="im1" name="im1" width="32" height="32" longdesc="detalles.htm" />

Esta sentencia se coloca dentro del <body> de un documento HTML. Es una self-closing tag, ya que no requiere una etiqueta de cierre. Crea un espacio para una imagen de 32x32px, sin embargo no se podria visualizar la imagen dado que el atributo src esta vacío. Tenemos otros atributos como longdesc, width y height para las dimensiones de la imágen, name para el nombre del elemento, id como identificador unico y alt como texto alternativo de la imagen. De todos estos atributos los unicos obligatorios son src y alt sobretodo por una cuestión
de accesibilidad. 

---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
# <meta name="keywords" lang="es" content="casa, compra, venta, alquiler " />
# <meta http-equiv="expires" content="16-Sep-2019 7:49 PM" />

Esta sentencia se coloca dentro del <head> de un documento HTML. Tal como lo vimos en el <img>, es una self-closing tag por lo que no precisa de una etiqueta de cierre.
La etiqueta <meta> no es obligatoria, pero proporciona información sobre palabras claves relevantes para el contenido de la pagina que algunos motores de busqueda podrian utilizar para indexar la página. De todos los atributos el unico obligatorio es content, ya que se usa el name="keywords", y contiene las palabras clave relevantes. El atributo lang="es" indica el idioma del contenido que sigue. 
En la segunda sentencia <meta> tenemos los atributos http-equiv que indica una directiva de cabecera HTTP, en este caso 'expires' para cuando debe considerarse caducado el contenido.
Luego tenemos content que en este caso es obligatorio dado el atributo http-equiv e indica la fecha y hora en que la página expira.

---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
# <a href="http://www.e-style.com.ar/resumen.html" type="text/html" hreflang="es" charset="utf-8" rel="help">Resumen HTML </a>

Esta sentencia se coloca dentro del <body> de un documento HTML. La etiqueta <a> es un enlace que permite a los usuarios navegar entre paginas haciendo click sobre el enlace. Tenemos atributos como href que especifica la URL a la que apunta el enlace, hreflang que indica el idioma del recurso vinculado, charset especifica el la codificacion de caracteres y rel define la relacion entre el documento actual y el vinculado. De todos estos el unico obligatorio es href, ya que el enlace necesita una URL si o si a la cual apuntar.

---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
# <table width="200" summary="Datos correspondientes al ejercicio vencido">
<caption align="top"> Título </caption>
<tr>
<th scope="col">&nbsp;</th>
<th scope="col">A</th>
<th scope="col">B</th>
<th scope="col">C</th>
</tr>
<tr>
<th scope="row">1º</th>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<th scope="row">2º</th>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
</table>

Esta sentencia se coloca dentro del <body> de un documento HTML. La etiqueta table representa una tabla y se utiliza para mostrar datos ordenados en filas y columnas. El codigo crea una tabla de 200px (mediante el atributo width) y tiene un titulo (atributo caption) alineado hacia arriba. El atributo summary proporciona un resumen textual de la tabla, sobretodo por motivos de accesibilidad. De estos atributos ninguno es obligatorio.
Luego tenemos etiquetas como <tr> que define una fila en la tabla, <th> que define una celda de encabezado de la tabla y <td> que define una celda de datos de la tabla. En las etiquetas <th> encontramos el atributo scope que mediante 'col' indica que la celda es un encabezado de columna y con 'row' indica que la celda es un encabezado de fila. Este atributo no es obligatorio, pero mejora la accesibilidad.
El '&nbsp;' que podemos ver en muchas de las celdas representa en HTML un espacio en blanco.