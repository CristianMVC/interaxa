##  1) Clonar proyecto.
##  2) Dentro de la raiz(osea antes de app) ejecutar por linea de comandos "composer update". (En caso de no poseer composer descargarlo: https://getcomposer.org/download/)
##  3) Ejecutar apache y mysql server.
##  4) Configurar app/config/parameters.yml con los datos de la base de datos.
##  5) Borrar los datos contenidos en la carpeta app/cache (par avaciar la cache)
##  6) En la raiz del proyecto (osea un directorio antes de app) ejecutar:
    php app/console doctrine:database:create
##  7) Luego que se cree la base de datos con el comando anterior, ejecutar:
     php app/console doctrine:schema:update --force
     
##  8) Por ultimo ingresar al proyecto segun la url configurada:
    Ej: localhost/interaxa/web/app_dev.php
    
    Recordar utilizar la extension app_dev.php, ya que el proyecto se encuentra en desarrollo

