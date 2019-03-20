# ProyectoVentas

Miembros del equipo:

   - Andrea Vidal Paniagua
   - Sergi Coma Corcuera

Una vez hecho el clone de la aplicación debemos seguir los pasos que nos indica en este enlace

Una vez tenemos el .env y lo hemos configurado para tu base de datos necesitamos cargar todas las tablas para poder 
almacenar los datos. Para ello usaremos la consola, donde nos posicionaremos en la carpeta del proyecto y se usara el
siguiente comando:

  - php artisan migrate

A continuación cargamos los datos generados aleatoriamente que se nos insertarán en las tablas con el siguiente comando: 

  - php artisan db:seed

Para poder subir archivos hay que poner el siguiente comando: 

  - php artisan storage:link
