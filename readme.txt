Options All -Indexes: Esto deshabilita la visualización del listado de directorios cuando no hay un archivo index.html o index.php presente en un directorio.

RewriteEngine on: Esto habilita el motor de reescritura de URL de Apache.

RewriteCond %{REQUEST_FILENAME} !-d: Esta condición establece que si la solicitud no apunta a un directorio real en el servidor, la regla de reescritura siguiente se aplicará.

RewriteCond %{REQUEST_FILENAME} !-f: Esta condición establece que si la solicitud no apunta a un archivo real en el servidor, la regla de reescritura siguiente se aplicará.

RewriteRule ^(.*)$ index.php?url=$1 [QSA,L]: Esta regla de reescritura toma la URL solicitada, pasa el segmento de la URL como parámetro url a index.php, y termina el proceso de reescritura con la bandera [QSA,L]. QSA significa "Append query string", que agrega cualquier cadena de consulta de la URL original a la URL modificada. L significa "Last", lo que indica que esta es la última regla de reescritura que se aplicará si se cumple.