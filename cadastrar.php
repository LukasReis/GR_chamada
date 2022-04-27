<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE', 'Cadastar Vaga');

use \App\Entity\Chamado;
$obChamado = new Chamado;

if(isset($_POST['titulo'],$_POST['descricao'],$_POST['ativo'],$_POST['dataAbertura'],$_POST['solicitante'])){

  
    $obChamado->titulo = $_POST['titulo'];
    $obChamado->descricao = $_POST['descricao'];
    $obChamado->status = $_POST['ativo'];
    $obChamado->dataAbertura = $_POST['dataAbertura'];
    $obChamado->solicitante = $_POST['solicitante'];  
    $obChamado->cadastrar();

    header('location: index.php?staus=sucess');  
    exit;
  
}

include __DIR__.'/include/header.php';
include __DIR__.'/include/formulario.php';
include __DIR__.'/include/footer.php';


