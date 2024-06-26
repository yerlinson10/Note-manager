<p align="center"><img src="logo.png" width="225" alt="Note-Manager logo"></p>

# Note-Manager.
Note-Manager es un administrador de notas donde puedes escribir tus notas, agregarles una categoría y etiquetas para organizarlas mejor, y luego filtrarlas.

## Instalación y configuración de Note-Manager.
Para la instalación de Note-Manager se necesita ejecutar los siguiente comandos.

### Clonar el proyecto.

```console
git clone https://github.com/yerlinson10/Note-manager.git
```
### Instalar las dependencias.
Para instalar las dependencias de php y laravel.
 ```console
composer install
 ```
Para instalar las dependencias de node js y npm
```console
npm install
```
### Archivo de configuración(.env)
Copie el archivo ``.env.example`` y renómbrelo a simplemente ``.env``. Este archivo ya tendrá el nombre de la aplicación. Asegúrese de configurar las credenciales de la base de datos.

### Genrar la key(APP_KEY)
```console
php artisan key:generate
```

### Ejecutar migraciones

```console
php artisan migrate
```
Al ejecutar este comando, si no se define una base de datos existente va a preguntar si desea crearla automático, aquí hace lo que usted desea.

## Ejecución del proyecto
Para ejecutar el proyecto, es necesario que el servidor de PHP y la base de datos estén en funcionamiento.
## Comando npm
```console
npm run dev
```
## Requerimiento del proyecto
A continuación, te presento la lista de requisitos para poder ejecutar el proyecto.
- **[PHP ^8.1](https://www.php.net/releases/8.1/en.php)**
- **[Laragon (o cualquier otro entorno de su elección)](https://laragon.org/download/).**
- **[MySql 8.0.30](https://dev.mysql.com/doc/relnotes/mysql/8.0/en/news-8-0-30.html)**
- **[Node 20.11.1](https://nodejs.org/en/blog/release/v20.11.1)**
- **[Cualquier otro requerimiento de Laravel 10](https://laravel.com/docs/10.x/releases)**
