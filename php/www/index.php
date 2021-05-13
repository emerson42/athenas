<!DOCTYPE html>
<html lang="pt-BR">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Teste Athenas - Emerson N S</title>
      <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">-
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

      <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
      <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

      <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>      
      <script type="text/javascript" language="javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      
      <script src="script.js"></script>

    </head>
    <?php
        $conn = mysqli_connect("banco","root","phpens","athenas") or die (mysqli_error($conn));
        $sql2 = "SELECT a.codigo as codigo, a.nome as nome FROM Categoria a";
        $resultado2 = mysqli_query($conn, $sql2) or die (mysqli_error($conn));
        $resultado3 = mysqli_query($conn, $sql2) or die (mysqli_error($conn));
    ?>
    <body>
        <div class="container">
            <div class="col-md-12">
                <br>
                <div class="row">
                    <div class="col-md-8">
                        <h3>Cadastro de Pessoas</h2>
                    </div>
                    <div class="col-md-4" align="right">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalnovo">
                        Novo Registro
                        </button>
                    </div>
                </div>
            <div>
            <br>
        </div>
        <div  class="container">    
            <div class="col-md-12">    
                <div class="row">
                    <div class="col-md-1"></div>
                        <table id="example" class="table table-sm display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">Codigo</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">E-mail</th>
                                    <th scope="col">Categoria</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <!--
                            <tbody class="resultado">
                                Preenchimento dinâmico via Ajax
                            </tbody>
                            -->
                        </table>
                    </div>
                </div>
            </div>

            <!-- Modal Novo registro-->
            <div class="modal fade" id="modalnovo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Cadastrando Nova Pessoa</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="formNovo">
                                <div class="mb-3">
                                    <label for="nome" class="form-label">Nome</label>
                                    <input type="text" class="form-control" id="nome" value="" aria-describedby="nomeHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Endereço de Email</label>
                                    <input type="email" class="form-control" id="email"  value = "" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="categoria" class="form-label">Categoria</label>
                                    <select id="categoria" class="form-select">
                                        <?php while ($registro2 = mysqli_fetch_array($resultado2)){
                                            $codigo = $registro2['codigo'];
                                            $nome = $registro2['nome'];?>
                                        <option value=<?=$codigo?>><?=$nome?></option><?php } ?>
                                    </select>
                                </div>
                                <button onclick="salvar" type="submit" class="btn btn-primary">Salvar</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>                
                        </div>
                    </div>            
                </div>
            </div>

            <!-- Modal Alterar registro-->
            <div class="modal fade" id="modalalterar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Alterando Nova Pessoa</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="formAlterar">
                                <div class="mb-3">
                                    <label for="codigo2" class="form-label">Codigo</label>
                                    <input type="text" class="form-control" id="codigo2" value="" aria-describedby="nomeHelp" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="nome2" class="form-label">Nome</label>
                                    <input type="text" class="form-control" id="nome2" value="" aria-describedby="nomeHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="email2" class="form-label">Endereço de Email</label>
                                    <input type="email2" class="form-control" id="email2"  value = "" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="categoria2" class="form-label">Categoria</label>
                                    <select id="categoria2" class="form-select">
                                        <?php while ($registro3 = mysqli_fetch_array($resultado3)){
                                            $codigo = $registro3['codigo'];
                                            $nome = $registro3['nome'];?>
                                        <option value=<?=$codigo?>><?=$nome?></option><?php } ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>                
                        </div>
                    </div>            
                </div>
            </div>

       	</div>
   </body>
    <!-- Dependência jQuery-->
</html>