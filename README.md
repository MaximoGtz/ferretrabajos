Este es un proyecto de laravel.
Si se descarga por primera vez es necesario ejecutar los siguientes comandos

INSTALAR DEPENDENCIAS
composer install

CREAR BASE DE DATOS
php artisan migrate

LIMPIAR CACHE
php artisan cache:clear

LIMPIAR CONFIGURACION
php artisan config:clear

GENERAR LLAVE
php artisan key:generate

METER LOS SEEDERS *opcional*
php artisan db:seed