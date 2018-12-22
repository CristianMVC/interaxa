# 1) Clonar proyecto.
# 2) Ejecutar apache y mysql server.
# 3) Configurar app/config/parameters.yml con los datos de la base de datos.
# 4) Borrar los datos contenidos en la carpeta app/cache (par avaciar la cache)
# 5) En la raiz del proyecto (osea un directorio antes de app) ejecutar:
    php app/console doctrine:database:create
# 6) Luego que se cree la base de datos con el comando anterior, ejecutar:
     php app/console doctrine:schema:update --force
     
# 7) Por ultimo ingresar al proyecto segun la url configurada:
    Ej: localhost/interaxa/web/app_dev.php
    
    Recordar utilizar la extension app_dev.php, ya que el proyecto se encuentra en desarrollo

