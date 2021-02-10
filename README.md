## Descripción :page_with_curl:

Alegra Lunch disponibiliza un módulo para solicitud de platos preparados, encargandose de elegir un plato aleatoriamente
y administrando la disponibilidad de ingredientes para cada receta.

El usuario genera una orden hacía la cocina de N cantidad de platos, la cocina elige para cada plato una receta
aleatoriamente de las 6 disponibles, por cada receta se verifican los ingredientes y su cantidad disponible. En caso de
no haber la cantidad suficiente de ingredientes, automaticamente se consumira una API externa (mercado) donde se pueden
generar compras del ingrediente, esto se realiza a traves de un ciclo repetitivo hasta que se cuente con la cantidad
necesaria de ingredientes.

El tiempo de preparación de cada plato es de 3 minutos.\
La comprobación de stock y compras al mercado son realizadas casi instantaneamente al momento de generar la orden.

Visualizar la aplicación ya montada en:

[https://alegra-lunch.herokuapp.com](https://alegra-lunch.herokuapp.com)

Credenciales:

Usuario: admin@mail.com\
Contraseña: 123456789

## Desarrollado con: :wrench:

[Laravel 8.x](https://laravel.com/docs/8.x/)\
[Inertia.js](https://inertiajs.com/) para la integración con [Vue.js v2](https://vuejs.org/v2/guide/)
## Instalación :package:

	git clone https://github.com/benjaminarteaga/alegra-lunch.git
	cd alegra-lunch

	docker run --rm \
		-v $(pwd):/opt \
		-w /opt \
		laravelsail/php80-composer:latest \
		composer install

	cp .env.example .env

## Configuración :construction_worker:

Dentro del archivo `.env` eliminar las variables del prefijo `DB_`:

~~DB_CONNECTION=mysql~~
~~DB_HOST=127.0.0.1~~
~~DB_PORT=3306~~
~~DB_DATABASE=alegra_lunch~~
~~DB_USERNAME=root~~
~~DB_PASSWORD=~~

Y sustituirlas por:

	JAWSDB_URL='mysql://izak4svvzv9vagi0:x1y9ud497cbmqb88@z5zm8hebixwywy9d.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/xzhizlz96c18n1x3'

Esto genera una conexión directa a la BD creada en JawsDB, Add-on de Heroku para Base de Datos MySQL

\* Se muestran las credenciales a la BD en este readme ya que el repositorio es privado.
\*\* Se puede ver afectado el performance al correr la aplicación local conectandola a la BD remota, más adelante se explica como levantar una BD local.
## Disponibilizar :whale:

Se utiliza como apoyo el paquete Laravel Sail para la generación de contenedores en Docker.

En la raíz del proyecto ejecutar el siguiente comando para levantar el server:

	./vendor/bin/sail up
    ./vendor/bin/sail artisan key:generate

## Opcional :construction:

En caso de querer usar una Base de Datos diponibilizada por el contenedor, dejar las credenciales tachadas anteriormente en la seccion *Configuración*:

~~JAWSDB_URL='mysql://izak4svvzv9vagi0:x1y9ud497cbmqb88@z5zm8hebixwywy9d.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/xzhizlz96c18n1x3'~~

Y sustituirlas por:

	DB_CONNECTION=mysql
	DB_HOST=mysql
	DB_PORT=3306
	DB_DATABASE=alegra_lunch
	DB_USERNAME=root
	DB_PASSWORD=

Ejecutar las migraciones:

    ./vendor/bin/sail artisan migrate --seed