# Bienvenido a Asismedic hospital el oro!

Desarrollado como caso de estudio del taller de arquitectura de aplicaciones.


# instalación

**clonar el repositorio** desde https://github.com/efrenrodas/sigmedic.git
1. ejecutar 
- git clone https://github.com/efrenrodas/sigmedic.git
2. Aceder a la carpeta /sigmedic y ejecutar 
- composer install 
## Migrar la base de datos

Ejecutar el comando 
- php artisan migrate

## Crear los usuarios por defecto

Se necesita crear usuarios por defecto para acceder al sistema 
ejecutar
- php artisan  db:seed
o 
- importar datos de base de datos desde 

## Crear un enlace publico para imagenes

- php artisan storage:link

## generar el app key

- php artisan key:generate

## Ejecutar 
- php artisan serve
- npm run dev