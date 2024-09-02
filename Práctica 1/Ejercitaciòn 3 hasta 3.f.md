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


