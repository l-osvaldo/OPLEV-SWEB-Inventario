# INVENTARIO

_Plantilla de Laravel 5.8 para el desarrollo de aplicaciones del OPLE Veracruz_

# Tabla de Contenidos  

- ### [Comenzando](#comenzando)
- ### [Pre-requisitos](#pre-requisitos)
- ### [Instalación](#instalación)
- ### [Configuración de git](#configuración-de-git)
    - ### [Verificar configuración local](#verificar-configuración-local)
    - ### [Renombrar origin](#renombrar-origin)
    - ### [Crear nuevo origin](#crear-nuevo-origin)
- ### [Correr Proyecto](#correr-proyecto)

## Comenzando 🚀

Estas instrucciones te permitirán obtener una copia de la plantilla para el desarrollo de tu nuevo proyecto en tu máquina local.

Ve a la sección **Contribuyendo** para saber como contribuir a la plantilla con mejoras o correcciones.  

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

## Configuración de git 🖇️

Para poder trabajar en tu nuevo proyecto pero aún poder recibir actualizaciones a la plantilla en un futuro, se deben realizar unos cambios a los **remote**, que son _aliases_ de los repositorios a los que se apunta en los comandos `git fetch`, `git pull`, `gut push`, entre otros.

#### Verificar configuración local

Debido a que se pueden realizar cambios de parte de diferentes usuarios en la plantilla, es esencial configurar el nombre de usuario y correo para identificar correctamente a los usuarios en el historial de commits, utiliza el correo que tienes registrado en gitlab:

```
$ git config --global user.name "Mi Nombre"
$ git config --global user.email "micorreo@correo.com"
```
#### Renombrar origin

Cuando escribes el comando `git remote -v` te aparece una lista de los remotes (aliases) y el repositorio (url) al que apuntan:

```
$ git remote -v
origin  https://github.com/l-osvaldo/OPLEV-SWEB-Inventario.git (fetch)
origin  https://github.com/l-osvaldo/OPLEV-SWEB-Inventario.git (push)

```

Esto quiere decir que cuando utilizas el comando `git fetch origin master` o `git push origin master` estas diciéndole a git que revise o envíe cambios a la rama **master** del repositorio en el url **https://gitlab.com/opleveracruz/dashboardclon.git**, respectivamente.

Por conveniencia y buena práctica el remote **origin** siempre debe ser correspondiente al repositorio de tu proyecto por lo cual en este caso ya no puede ser _~/dashboardclon.git_.

Renombra **origin** a **dashboard** con el comando `git remote rename origin dashboard`

#### Crear nuevo origin 

Crea el un nuevo remote **origin**:

```
$ git remote add origin https://gitlab.com/opleveracruz/nuevo-proyecto.git
```

Verifica que se hayan modificado los remote correctamente con `remote -v`:
```
$ git remote -v
dashboard       https://gitlab.com/opleveracruz/dashboardclon.git (fetch)
dashboard       https://gitlab.com/opleveracruz/dashboardclon.git (push)
origin  https://gitlab.com/opleveracruz/nuevo-proyecto.git (fetch)
origin  https://gitlab.com/opleveracruz/nuevo-proyecto.git (push)

```

## Correr proyecto

Abre tu navegador y dirígete a [http://nuevo-proyecto.test](http://nuevo-proyecto.test). Debes ver una pantalla similar a la siguiente imagen:

![](resources/assets/readme/dashboard_login.png)

