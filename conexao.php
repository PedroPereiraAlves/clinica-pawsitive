<?php
$servidor = '127.0.0.1';
$usuario = 'root';
$senha = '';
$banco = 'pawsitive';
$mysqli = new mysqli($servidor, $usuario, $senha, $banco);

if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

?>