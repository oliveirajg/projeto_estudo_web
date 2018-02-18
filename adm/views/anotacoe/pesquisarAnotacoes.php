<div class="well">

    
    <div class="pull-right well">
        <a href="<?php echo URL; ?>controle-anotacao/index"><button type="button" class="btn btn-sm btn-success">Listar Geral</button></a>
        <a href="<?php echo URL; ?>controle-anotacao/gerarPdf" target="_blank"><button type="button" class="btn btn-sm btn-danger">PDF da Pesquisa</button></a>
    </div>
   
    <?php
    if (isset($_SESSION['msg'])):
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    endif;
    if (isset($_SESSION['msgcad'])):
        echo $_SESSION['msgcad'];
        unset($_SESSION['msgcad']);
    endif;
    
    $paginacao = $this->Dados[1];
    $this->Dados = $this->Dados[0];
    ?>
    <form  name="CadPesquisaAnote" class="form-inline" method="POST" action="<?php echo URL . "controle-anotacao/pesquisar-diversos";?>">
        <div class="form-group">
            <label>Nome</label>
            <input type="text" name="nome_destinatario" class="form-control" placeholder="Nome da Anotação">
        </div>
        <div class="form-group">
            <label>Observações</label>
            <input type="text" name="observacoes" class="form-control" placeholder="Descrição da Anotação">
        </div>
        <input type="submit" class="btn btn-info" value="Pesquisar" name="SendPesquisaAnote">
    </form>  
     <div class="page-header text-center">
        <h1>Lista das Anotações Pesquisadas</h1>
    </div>
    <?php
    if (!empty($this->Dados)):
        ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>                   
                    <th>Obs</th>                   
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($this->Dados as $user) {
                    extract($user);
                    ?>               
                    <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $nome_destinatario; ?></td>                      
                        <td><?php echo $observacoes; ?></td>                      
                        <td width="125">
                            <a href="<?php echo URL; ?>controle-anotacao/visualizar/<?php echo $id; ?>"><button type="button" class="btn btn-xs btn-primary">Ver</button></a>

                            <a href="<?php echo URL; ?>controle-anotacao/Editar/<?php echo $id; ?>"><button type="button" class="btn btn-xs btn-warning">Ed</button></a>

                            <a href="<?php echo URL; ?>controle-anotacao/apagar/<?php echo $id; ?>" onclick="return confirm('Deseja mesmo apagar?');"><button type="button" class="btn btn-xs btn-danger">Apag</button></a>
                        </td>
                    </tr>

                    <?php
                }
                ?>
            </tbody>
        </table>
        <?php
    endif;
    echo $paginacao;
    ?>
</div>

