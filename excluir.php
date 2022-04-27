<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Chamado;

//Validação do ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: index.php?status=error');
    exit;
  }


//Consulta o chamado
$obChamado = Chamado::getChamada($_GET['id']);


//Validação da Vaga
if(!$obChamado instanceof Chamado){
  header('location: index.php?status=error');
  exit;
}

//VALIDAÇÃO DO POST
if(isset($_POST['excluir'])){
    $obChamado -> excluirChamada();

    header('location: index.php?staus=sucess');  
    exit;
  
}

include __DIR__.'/include/header.php';
include __DIR__.'/include/confirmar-exclusao.php';
include __DIR__.'/include/footer.php';