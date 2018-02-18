<div class="well">

    <div class="page-header">
        <h1>Listar Finalidades Pesquisados</h1>
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
    <form  name="CadPesquisaFim" class="form-inline" method="POST" action="<?php echo URL . "controle-fim/pesquisar-finalidade";?>">
        <div class="form-group">
            <label>Nome</label>
            <input type="text" name="nome_fim" class="form-control" placeholder="Nome da Finalidade">
        </div>
        <input type="submit" class="btn btn-info" value="Pesquisar" name="SendPesquisaFim">
    </form>    
    
    <div class="pull-right">
        <a href="<?php echo URL; ?>controle-fim/index"><button type="button" class="btn btn-sm btn-success">Listar</button></a>
        <a href="<?php echo URL; ?>controle-fim/gerarPdf" target="_blank"><button type="button" class="btn btn-sm btn-danger">PDF</button></a>
    </div>
   
    <?php
    if (!empty($this->Dados)):
        ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>                   
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
                        <td><?php echo $nome_fim; ?></td>                      
                        <td>
                            <a href="<?php echo URL; ?>controle-fim/visualizar/<?php echo $id; ?>"><button type="button" class="btn btn-xs btn-primary">Visualizar</button></a>

                            <a href="<?php echo URL; ?>controle-fim/Editar/<?php echo $id; ?>"><button type="button" class="btn btn-xs btn-warning">Editar</button></a>

                            <a href="<?php echo URL; ?>controle-fim/apagar/<?php echo $id; ?>" onclick="return confirm('Deseja mesmo apagar?');"><button type="button" class="btn btn-xs btn-danger">Apagar</button></a>
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

