<?php

require 'Cliente.php';
require 'FormularioCliente.php';
require 'controller.php';
/* $cliente = new cliente();
  $cliente->Read(1);

  echo $cliente;

  $cliente->Read(5);
  echo $cliente;
 */
$cliente = new cliente();
echo $cliente;

$cliente->Delete('77788778a');
$d = array(
    "dni" => "77788778a",
    "nombre" => "asfasdfasdfasfd",
    "apellidos" => "bar",
    "direccion" => "foofoobar",
    "observaciones" => "foobarfooo",
    "telefono" => "968123132",
    "telefono_movil" => "606123123",
    "email" => "foo@bar.com",
    "password" => "foopaswd"
);

$cliente->set($d);
echo $cliente;

$cliente->get('48430556P');
echo $cliente;
$cliente->edit(array("nombre" => "lamaquina"));
echo $cliente;
$cliente->edit(array("nombre" => "Pascual"));

$cliente->Delete('77788778a');

$controlador = new controller();
$controlador->enviar_data();




