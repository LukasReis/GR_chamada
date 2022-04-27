<?php

$mensagem = '';
if(isset($_GET['status'])){
  switch ($_GET['status']) {
    case 'success':
      $mensagem = '<div class="alert alert-success">Ação executada com sucesso!</div>';
      break;

    case 'error':
      $mensagem = '<div class="alert alert-danger">Ação não executada!</div>';
      break;
  }
}


$resultados = '';
foreach( $obChamado as $obChamados){
  $resultados .= '<tr>
                    
                    <td>'.$obChamados->titulo.'</td>
                    <td>'.$obChamados->descricao.'</td>
                    <td>'.$obChamados->responsavel.'</td>
                    <td>
                    <a href="editar.php?id='.$obChamados->id.'">
                        <button type="button" class="btn btn-success">Editar</button>
                    </a>
                    <a href="excluir.php?id='.$obChamados->id.'">
                        <button type="button" class="btn btn-danger">Exluir</button>
                    </a>
                    </td>
                </tr>';
                

}

$resultados = strlen($resultados) ? $resultados : '<tr>
                                        <td colspan="6" class="text-center">
                                            Nenhuma vaga encontrada
                                        </td>
                                        </tr>';


?>

<main>

   
  <?=$mensagem?>

    <scetion>
        <a href="cadastrar.php">
            <button class="btn btn-success">Novo</button>
        </a>
    <section>

    <section>

        <table class="table bg-light mt-3">
            <thead>
            <tr>
                <th>Título</th>
                <th>Descrição</th>
                <th>Solicitante</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
                <?=$resultados?>
            </tbody>
        </table>

    </section>
</main>