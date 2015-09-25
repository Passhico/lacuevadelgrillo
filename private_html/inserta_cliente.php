
<?php

require 'Cliente.php';


while ($post = each($_POST))
    echo $post[0] . " = " . $post[1] ."<br>";

$d = array ("dni" => "77788778e",
            "nombre" => "dosdosdos",
            "apellidos" => "bar",
            "direccion" => "foofoobar",
            "observaciones" => "foobarfooo",
            "telefono" => "968123132",
            "telefono_movil" => "606123123",
            "email" => "foo@bar.com",
            "password" => "foopaswd" 
    );
$cliente_a_insertar = new cliente();
$cliente_a_insertar->set($d);
