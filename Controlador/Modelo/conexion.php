<?php

$link = 'mysql:host=localhost;dbname=melodatabase';
$usuario = 'root';
$pass = '';
try{

    $pdo = new pdo($link, $usuario, $pass);

/*         foreach($pdo->query('SELECT id_rol, tipo_rol FROM rol') as $fila) {
        print_r($fila);
    } */
}  catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>