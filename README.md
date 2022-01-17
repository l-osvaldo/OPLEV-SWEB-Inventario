# INVENTARIO

_Plantilla de Laravel 5.8 para el desarrollo de aplicaciones del OPLE Veracruz_

# Tabla de Contenidos  

- ### [Comenzando](#comenzando)
- ### [Pre-requisitos](#pre-requisitos)
- ### [Instalación](#instalación)
- ### [Correr Proyecto](#correr-proyecto)

## Comenzando 🚀

Estas instrucciones te permitirán obtener una copia de la plantilla para el desarrollo de tu nuevo proyecto en tu máquina local.

### Pre-requisitos 📋

Para correr el proyecto es necesario tener el entorno de desarrollo configurado correctamente:

- [ ] PHP 7.2
- [ ] Vagrant
- [ ] Laravel Homestead

### Instalación ⚙️

Ingresa a vagrant corriendo `vagrant up` y `vagrant ssh` desde línea de comando o símbolo del sistema abierto como **administrador**:
```
C:\WINDOWS\system32> cd C:\Users\User\homestead
C:\Users\User\homestead> vagrant up
C:\Users\User\homestead> vagrant ssh
```

Clona la plantilla con el nombre de tu nuevo proyecto dentro del directorio **code**, colocando el nombre de tu nuevo proyecto al final del comando de clonar:

```
$ cd code
$ git clone https://gitlab.com/opleveracruz/dashboardclon nuevo-proyecto
```

Agrega la rutas del proyecto y su base de datos a Homestead:

**C:\Users\User\homestead\Homestead.yaml**

```
sites:
 ...
    - map: nuevo-proyecto.test
      to: /home/vagrant/code/nuevo-proyecto/public
      php: "7.2"
 ...
databases:
    - nuevo-proyecto
```

Agrega la el url de tu nuevo proyecto a la lista de hosts:

**C:\Windows\System32\drivers\etc\hosts**
```
...
192.168.10.10		nuevo-proyecto.test

```

Corre `vagrant provision` desde **homestead** para realizar el mapeo de rutas, una vez finalizado este proceso, ingresa nuevamente a vagrant:
```
$ exit
C:\Users\User\homestead> vagrant provision
C:\Users\User\homestead> vagrant ssh
```

Dirígete al directorio de tu proyecto para instalar los paquetes y dependencias de PHP del proyecto:
```
$ cd code/nuevo-proyecto
$ composer install
``` 

Instala los paquetes y dependencias de javascript:
```
$ npm install
$ npm run dev
```

Verifica que el archivo **.env** exista en tu proyecto. Si no existe crea una copia a partir del ejemplo y genera una llave para el proyecto:
```
$ cp .env.example .env
$ php artisan key:generate
```

Asegúrate de configurar el nombre y url de la app así como el ID, llave y contraseña de Pusher correctamente:
```
APP_NAME=nuevo-proyecto
...
APP_URL=http://nuevo-proyecto.test
...
DB_DATABASE=nuevo-proyecto
...
PUSHER_APP_ID=XXXXX
PUSHER_APP_KEY=XXXXX
PUSHER_APP_SECRET=XXXXX
PUSHER_APP_CLUSTER=us2
```

Por último, corre las migraciones junto con el seeder para crear y pre-cargar las tablas de la base de datos:
```
$ php artisan migrate:refresh --seed
```
_Como el .env está configurado como Production, va a preguntar si quieres proseguir con el comando, a lo que debes escribir **yes**_:
``` 
**************************************
*     Application In Production!     *
**************************************
Do you really wish to run this command? (yes/no) [no]:
> yes
```

## Correr proyecto

Abre tu navegador y dirígete a [http://nuevo-proyecto.test](http://nuevo-proyecto.test). 

