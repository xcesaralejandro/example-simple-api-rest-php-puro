Esto es un simple ejemplo de como responder una solicitud asincrona sin frameworks y en php puro. (Creada en php 7.2)

Instalación:

1)  Crea una base de datos manualmente y modifica los valores de las constantes en el fichero db.php
 
2) Crea la siguiente tabla en la base de datos
 
CREATE TABLE IF NOT EXISTS users(
    id int unsigned AUTO_INCREMENT primary key,
    name varchar(256)
)

3) Consume el fichero api.php
   localhost/api.php?action=XXXXXXXXXX&PARAMS
   
   Actions:
     show: NO REQUIERE PARAMETROS
     create: requiere el parametro "name"
     update: requiere el parametro "name" y "id"
     delete: requiere el parametro "id"
