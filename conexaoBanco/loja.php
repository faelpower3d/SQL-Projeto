<?php
$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$db = 'loja';
$con = mysqli_connect($servidor,$usuario,$senha,$db);
if (!$con) {
    print('ERRO NA CONEXÃO COM MySQL');
    print('Erro: '.mysqli_connect_error());
    exit();
}
?>