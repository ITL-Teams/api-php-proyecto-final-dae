# Aplicación web para administar dispositivos de red por ssh

### ¿Quiénes somos?
Somos un equipo de estudiantes del Instituto Tecnológico de León

El equipo llamado **BugDevelopers**
Integrado por:
* Ángel Ricardo Ramírez de la Torre
* Andrés Rodríguez Barba
* Christian André Hernández García
* Javier Alejandro Ortiz Gaona

### Como instalar
**Nota:** *Aun estamos en fase de desarrollo, estas instrucciones son para los miembros de nuestro equipo. 
Una vez finalice el proyecto podrá encontrar las instrucciones de instalación para producción.*

* Clonar este repositorio
* Crear la BD en MySQL/MariaDB usando el script ``script-bd.sql``
* Crear el archivo ``.env`` dentro del proyecto  ``laravel-passport``
* Copiar la configuración de ``laravel-passport/.env.example`` a ``laravel-passport/.env`` *(Realizar los cambios pertinentes en la configuración de conexión a la base de datos por los de su SGBD, si esta usando XAMMP no requiere ningun cambio)*
* Ejecutar los comandos para completar el entorno de trabajo
```sh
# Entrar al proyecto de laravel
cd laravel-passport

# Instalar Paquetes
composer install

# Generar Llave
php artisan key:generate

# Correr Migraciones (solo la primera vez que se clona, tenga en cuenta que si se ejecuta por segunda vez se borraran todos los datos)
php artisan migrate

# Ejecutar el servidor de desarrollo
php artisan serve
```

### ¿Por qué hacemos este proyecto?
Principalmente porque debemos desarrollar un proyecto para solucionar una problematica relacionada a la crisis por el COVID-19

### Problematica
Debido al reciente brote del COVID-19 muchas personas han tenido que entrar en un estado de cuarentena, por lo que deben permanecer en sus hogares para frenar los masivos contagios que se han venido registrando. 
Esto ha ocasionado que las personas comiencen a sobrecargar los servicios de internet, ¿Por qué?, simple, al no estar en sus lugares de trabajo habituales realizando sus tareas cotidianas, estas se aburren y comienzan a utilizar internet como una alternativa para entretenerse, incluso en el mejor de los casos para continuar trabajando o estudiar. Si bien es cierto, se sabe que todos utilizamos internet para propósitos de entretenimiento, el problema es que ahora mismo son muchas las personas que se conectan al mismo tiempo, por lo que se saturan los anchos de banda de los proveedores de servicios de internet y esto ocasiona que el servicio se vea interrumpido por que los equipos de red no dan abasto para tanto tráfico.
Si sumamos a esto que mucha de la infraestructura de red que hay en México da mucho que desear para sus consumidores, al final del día tenemos un problema muy grande que se puede poner todavía peor. México aún no tiene un toque de queda obligatorio para sus ciudadanos, pero en algún punto esto puede cambiar y la saturación de las redes e internet se convertirá en una realidad.

### Objetivo
Realizar una aplicación web que permita limitar uso del del ancho de banda dirigido a cierto tipo de tráfico de red definido por el administrador de red, el cual puede ser seleccionado automáticamente por el software o ajustado manualmente con el fin de dar prioridad al uso de páginas de estudio o de trabajo, evitando así el colapso de la red o mejorando la eficiencia de la educación y el trabajo desde casa.