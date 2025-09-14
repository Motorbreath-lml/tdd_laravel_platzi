# Curso de desarrollo en Laravel con Test Driven Develoment
Este curso lo tome en [Platzi](https://platzi.com/) en el año 2025, el curso se lanzo en el 2021 pensado para Laravel 9, en mi caso lo realice en Laravel 12, muchas cosas se mantiene algunas otras cambia la sintaxis, tengo algunas [notas](https://docs.google.com/document/d/1jD9BZy4xoW_ImDfZDPlIxlKkUGFiFhjlTkOSa6nvcYY/edit?usp=sharing) que fui tomando durante el curso.

## Inicializar el Proyecto
Debemos tener instalado Composer, NodeJs y Git
- Clonar el proyecto con el siguiente comando `git clone git@github.com:Motorbreath-lml/tdd_laravel_platzi.git`
- Movernos a la carpeta del proyecto `cd .\tdd_laravel_platzi\`
- Instalar las dependencias de Node con el siguiente comando `npm install`
- Instalar las dependencias de Composer con el siguiente comando `composer install`
- Apartir de rchivo *.env.example* de la carpeta raiz, crear el archivo *.env* 
- Ejecutar el comando `php artisan key:generate` para generar el **APP_KEY** en el archivo *.env*
- Para ejecutar los tests necesitamos ejecutar antes el comando `npm run build` para crear los archivos compilados de Vite, tambien podemos ejecutar `npm run dev` para compilar archivos de Vite en el lado de producción, o en el archivo *.env* colocar **VITE_SKIP_MANIFEST=true** para cuando ejecutemos los test los archivos compilados del frontend no sean necesarios.
- Ejecutamos los Test con el comando `php artisan test` o si queremos un test en especifico usamos las bandera filter`--filter <nombre_test>` por ejemplo: `php artisan test --filter test_create`

### Enlazar con base de datos y representacion visual
- En el archivo *.env* colocamos las credenciales de SQL de la maquina local, por lo general uso MySQL o MariaDB
- Ejecutamos el siguiente comando para crear las migraciones `php artisan migrate` pedira crear la base de datos, otorgamos el permiso
- Podemos ejecutar `php artisan db:seed` para poblar la base de datos, usando datos de prueba
- El comando `npm run dev` ejecutara la compilacion de JS y CSS y se quedara a la escuha por cambios en estos archivos
- El comando `php artisan serve` creara un servidor local para la aplicacion, entonces podemos entrar al proyecto web