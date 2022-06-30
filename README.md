# Trabajo Final

Trabajo final del taller de programación web.

Debido a caracteristicas agregadas en el archivo .htaccess, es requerido  
modificar el archivo de  configuracion `AppServ/Apache24/conf/httpd.conf`.  
Es necesario activar el modulo: `mod_rewrite` o descomentar la línea
`LoadModule rewrite_module modules/mod_rewrite.so`.
Así mismo talvez sea necesario editar la linea (289) `AllowOverride None`  
en `<Directory>` y cambiarlo por `AllowOverride All`
