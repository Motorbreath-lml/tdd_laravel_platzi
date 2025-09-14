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
- En el archivo *.env* colocamos las credenciales de SQl de la maquina local, por lo general uso MySQL o MariaDB
- Ejecutamos el siguiente comando para crear las migraciones `php artisan migrate` pedira crear la base de datos, otorgamos el permiso
- Podemos ejecutar `php artisan db:seed` para poblar la base de datos, usando datos de prueba
- El comando `npm run dev` ejecutara la compilacion de JS y CSS y se quedara a la escuha por cambios en estos archivos
- El comando `php artisan serve` creara un servidor local para la aplicacion


<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
