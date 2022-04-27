<?php

require __DIR__.'/vendor/autoload.php';


define('TITLE', 'Editar Vaga');


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

if(isset($_POST['titulo'],$_POST['descricao'],$_POST['ativo'],$_POST['dataAbertura'],$_POST['solicitante'])){

   
    $obChamado->titulo = $_POST['titulo'];
    $obChamado->descricao = $_POST['descricao'];
    $obChamado->status = $_POST['ativo'];
    $obChamado->dataAbertura = $_POST['dataAbertura'];
    $obChamado->solicitante = $_POST['solicitante'];
    $obChamado -> atualizarChamado();

    header('location: index.php?staus=sucess');  
    exit;
  
}

include __DIR__.'/include/header.php';
include __DIR__.'/include/formulario_editar.php';
include __DIR__.'/include/footer.php';