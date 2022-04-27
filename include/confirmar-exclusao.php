<main>

<h2 class="mt-3">Excluir vaga</h2>

<form method="post">

    <div class="form-group">
        <p>Você desja realmente excluir este chamado, isto será permanete!<strong> <?=$obChamado->titulo?></strong></p>
    </div>

    <div class="form-grou">
        <a href="index.php">
            <button type="button" class="btn btn-success">Cancelar</button>
        </a>

        <button type="submit" name="excluir" class="btn btn-danger">Excluir</button>
        </div>

    </form>  
</main>