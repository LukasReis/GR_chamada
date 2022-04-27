<main>

    <scetion>
        <a href="index.php">
            <button class="btn btn-success">Voltar</button>
        </a>
    </scetion>

</main>

<h2 class="mt-3"><?=TITLE?></h2>

<form method="post">

    <h2 class="mt-3"></h2>

    <div class="form-group">
      <label>Título</label>
      <input type="text" class="form-control" name="titulo" >
    </div>
    
    <h2 class="mt-3"></h2>

    <div class="form-group">
        <label>Descrição</label>
      <textarea name="descricao" class="form-control" name="descricao" rows="5"></textarea>
    </div>

    <h2 class="mt-3"></h2>

    <div class="form-group" >
        <label>Status</label>
            
        <div>
            <div class="form-check form-check-inline">
               <label class="form-control">
                   <input type="radio" name="ativo" value="aberto" checked> Aberto
               </label> 
         </div>


            <div class="form-check form-check-inline">
                <label class="form-control">
                    <input type="radio" name="ativo" value="fechado"> Fechado
                </label> 
            </div>
        </div>

    </div>  
    
     <h2 class="mt-3"></h2>
     <h2 class="mt-3"></h2>

    <div class="form-group">
        <label>Data de Abertura:</label>
        <input id="data" type="date" name="dataAbertura">
    </div>

    <h2 class="mt-3"></h2>

    <div class="form-group" >   
        <label>Solicitante</label>
        <input type="text" class="form-control" name="solicitante">
    </div>

    <h2 class="mt-3"></h2>

    <div class="form-grou">
        <button type="submit" class="btn btn-success">Salvar</button>
    </div>
</form>  