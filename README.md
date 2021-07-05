
## Requisitos
- [MariaDb](https://mariadb.org/) o [MySql](https://www.mysql.com/)
- [Apache](https://httpd.apache.org/download.cgi) 
- [Composer](https://getcomposer.org/)
## Instalar el proyecto
Para instalar descargar el proyecto es necesario ejecutar
```bash
git clone https://github.com/g0d13/swork
```
Una vez finalice el comando duplica el archivo ```.env.example``` con el nombre ```.env```

Dentro del archivo modifica el campo ```DB_USERNAME``` con el nombre de usuario de la base de datos, 
y el campo ``` DB_PASSWORD``` con la contraseña de la base de datos.

> Es necesario que exista una base de datos con el nombre ```servicio``` o de lo contrario debera cambiar el campo ```DB_DATABASE```

## Instalar dependencias
Una vez finalizado el proceso toca instalar las dependencias con composer
```bash
composer install 
```
 
## Creacion de una llave
Despues de haber agregado los datos necesarios toca crear una llave con el comando
```bash
php artisan key:generate
```

## Iniciar
Se puede iniciar el servidor con ```php artisan serve```
o configurar el servidor apache.
