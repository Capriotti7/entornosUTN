3.a)

# <a href="http://www.google.com.ar">Click aquí para ir a Google</a>

Crea un enlace en el texto: "Click aquí para ir a Google", el cual redirige la pagina actual a www.google.com.ar.

# <a href="http://www.google.com.ar" target="_blank">Click aquí para ir a Google</a>

Hace lo mismo que el segmento de codigo anterior, solo que en vez de redirigir la pagina actual, abre otra ventana con el url www.google.com.ar.

# <a href="http://www. google.com.ar" type="text/html" hreflang="es" charset="utf-8" rel="help">

Crea un enlace que va a la url www.google.com.ar, type="text/html" indica que el contenido de la url va a ser html,
hreflang="es" indica el idioma en el que va a estar la pagina de la url, charset="utf-8" indica el formato de codificacion de caracteres de la pagina de la url y por ultimo rel="help" define la relacion entre la pagina actual y la referenciada (en este caso va a servir como ayuda).

# <a href="#">Click aquí para ir a Google</a>

Hace lo mismo que en el primer segmento del codigo, pero al clickear no lleva a ninguna pagina ya que como url esta definido el #.

# <a href="#arriba">Click aquí para volver arriba</a>

Al clickear el enlace en la frase: "Click aquì para volver arriba", si en la pagina esta definido algun id="arriba" en alguna tag, se lleva hasta esa tag (no cambiando de pagina ya que esto es una ancla), si no esta definido el lugar de la ancla, la pagina sigue igual.

# <a name="arriba" id="arriba"></a>

Es un enlace en el cual hay dos maneras de definir un anclaje, siendo name la forma antigua (y no recomendable), en este pedazo de codigo se define un ancla identificada con "arriba" pero el codigo en si no hace nada, necesitaria otro enlace con una referencia hacia #arriba para que funcione el anclaje.

______________________________________________________________________________________________________________________

3.b)

# <p><img src="im1.jpg" alt="imagen1" /><a href="http://www.google.com.ar">Click aquí</a></p>

<p> define un parrafo, en el cual va a estar contenido una imagen <img> y un vinculo <a>.
El archivo de la imagen es el perteneciente al src, mientras que alt es un texto alternativo usado para describir la imagen si no se pudiera cargar la imagen.
El vinculo creado aparece en el texto: "click aquì" y, redirige la pagina actual a google.

# <p><a href="http://www.google.com.ar"><img src="im1.jpg" alt="imagen1" /></a> Click aquí</p>

se define un parrafo con una imagen, la cual contiene un vinculo y un texto.
La imagen perteneciente al src, con un texto alternativo usado para describir la imagen, al hacerle click, nos lleva a google.com.
Mientras que click aqui funciona solo como un texto.

# <p><a href="http://www.google.com.ar"><img src="im1.jpg" alt="imagen1" />Click aquí</a></p>

Es lo mismo que el codigo anterior, solo que la frase: "Click aquì" tambien puede ser clickeada para ir a google.com.

# <p><a href="http://www.google.com.ar"><img src="im1.jpg" alt="imagen1" /></a> <a href="http://www.google.com.ar">Click aquí</a></p>

Se define un parrafo el cual contiene una imagen y una frase.
la imagen perteneciente al src, con texto alternativo, al clickearla redirige la pagina a google.com.
Tambien hay un vinculo en el texto: "Click aqui", el cual tambien redirige la pagina a google.com

______________________________________________________________________________________________________________________

3.c)

# <ul>
# <li>xxx</li>
# <li>yyy</li>
# <li>zzz</li>
# </ul>

Crea una lista no ordenada de 3 puntos con los valores: xxx, yyy, zzz.

# <ol>
# <li>xxx</li>
# <li>yyy</li>
# <li>zzz</li>
# </ol>

Crea una lista ordenada de 3 puntos con los valores: xxx (1), yyy (2), zzz(3).

# <ol>
# <li>xxx</li>
# </ol>
# <ol>
# <li value="2">yyy</li>
# </ol>
# <ol>
# <li
# value="3">zzz</li>
# </ol>

Crea tres listas ordenadas diferentes, las cuales sus valores iniciales van en orden 1 al 3 gracias a la modificacion del valor con el atributo value. Sin la prescencia de este, habrian tres listas todas con valor inicial 1.

# <blockquote>
# <p>1. xxx<br />
# 2. yyy<br />
# 3. zzz</p>
# </blockquote>

Crea una cita en bloque (usado para citar texto proveniente de otras fuentes), definiendo en este un parrafo el cual simula ser una lista ordenada con los indices 1. , 2. , 3. y usando br como salto de linea para dar ese efecto.

______________________________________________________________________________________________________________________

3.d)

<table border="1" width="300">
<tr>
<th>Columna 1</th>
<th>Columna 2</th>
</tr>
<tr>
<td>Celda 1</td>
<td>Celda 2</td>
</tr>
<tr>
<td>Celda 3</td>
<td>Celda 4</td>
</tr>
</table>

Este pedazo de codigo crea una tabla la cual cuenta con un borde de 1 pixel al rededor de la tabla, con un ancho de tabla de 300 pixeles.
Usa tr para definir filas en la tabla y th para definir un encabezado en negrita y centrado.
Usa td para definir los datos que van en la tabla.

<table border="1" width="300">
<tr>
<td><div align="center"><strong>Colum
na1</strong></div></td>
<td><div align="center"><strong>Columna
2</strong></div></td>
</tr>
<tr>
<td>Celda 1</td>
<td>Celda 2</td>
</tr>
<tr>
<td>Celda 3</td>
<td>Celda 4</td>
</tr>
</table>

Este pedazo de codigo se asemeja al anterior, pero la unica diferencia es que no tiene encabezados en cada columna, si no que simula unos usando div alineados al centro y poniendo en negrita los nombres de las columnas.

3.e)

<table width="200">
<caption>
Título
</caption>
<tr>
<td bgcolor="#dddddd">&nbsp;</td>
<td bgcolor="#dddddd">&nbsp;</td>
<td bgcolor="#dddddd">&nbsp;</td>
</tr>
<tr>
<td bgcolor="#dddddd">&nbsp;</td>
<td bgcolor="#dddddd">
&nbsp;</td>
<td bgcolor="#dddddd">&nbsp;</td>
</tr>
</table>

En este codigo se define una tabla de 200 pixeles de ancho con un tìtulo de tabla. 
Se definen tres columnas en una tabla.
Las celdas son definidas con el td, el cual tiene un color de fondo gris, y con un texto el cual html usa para dejar un espacio vacio.

<table width="200">
                <tr>
                <td colspan="3"><div
                align="center">Título</div></td>
                </tr>
                <tr>
                <td bgcolor="#dddddd">&nbsp;</td>
                <td bgcolor="#dddddd">&nbsp;</td>
                <td bgcolor="#dddddd">&nbsp;</td>
                </tr>
                <tr>
                <td bgcolor="#dddddd">&nbsp;</td>
                <td bgcolor="#dddddd">&nbsp;</td>
                <td bgcolor="#dddddd">&nbsp;</td>
                </tr>
                </table>

Este codigo tiene un resultado similar al anterior, solo que lo logra de manera diferente.
Se definen tres columnas en una tabla.
Para el titulo en vez de usar la tag caption, se usa un atributo colspan en el td (el cual define celdas), este lo que hace es juntar las tres filas de una celda y con un div alineado al centro simula el titulo del caption.
En cuanto a las celdas siguientes, es lo mismo que la tabla anterior.

______________________________________________________________________________________________________________________

3.f)

 <table width="200">
        <tr>
        <td colspan="3"><div
        align="center">Título</div></td>
        </tr>
        <tr>
        <td rowspan="2" bgcolor="#dddddd">&nbsp;</td>
        <td bgcolor="#dddddd">&nbsp;</td>
        <td bgcolor="#dddddd">&nbsp;</td>
        </tr>
        <tr>
        <td bgcolor="#dddddd">&nbsp;</td>
        <td bgcolor="#dddddd">&nbsp;</td>
        </tr>
        </table>

Es similar al ejercicio 3.e, ya que crea una tabla con tres columnas y dos filas, ambas con un fondo gris y un texto que simula ser nulo en estas, solo que en este codigo la primera fila abarca dos columnas verticlaes, ocupando toda la primera columna.

 <table width="200">
            <tr>
            <td colspan="3"><div
            align="center">Título</div></td>
            </tr>
            <tr>
            <td colspan="2"
            bgcolor="#dddddd">&nbsp;</td>
            <td bgcolor="#dddddd">&nbsp;</td>
            </tr>
            <tr>
            <td bgcolor="#dddddd">&nbsp;</td>
            <td bgcolor="#dddddd">&nbsp;</td>
            <td bgcolor="#dddddd">&nbsp;</td>
            </tr>
            </table>

Es similar a la anterior, solo que en este codigo la primera celda abarca dos columnas horizontales ocupando las dos primeras columnas de la fila.


