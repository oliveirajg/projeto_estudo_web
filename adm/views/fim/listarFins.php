<div class="well well-personalizado">

    <div class="pull-right well">
        <a href="<?php echo URL; ?>controle-fim/cadastrar"><button type="button" class="btn btn-sm btn-success">Cadastrar</button></a>
          <a href="<?php echo URL; ?>controle-fim/pesquisarFinalidade"><button type="button" class="btn btn-sm btn-info">Pesquisar</button></a>
    </div>


    <div class="page-header text-center">
        <h1>Listar Registro das Finalidades</h1>
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


    <?php
    if (!empty($this->Dados)):
        ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Finalidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($this->Dados as $fim) :
                    extract($fim);
                    ?>               
                    <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $nome_fim; ?></td>
                        <td>
                            <a href="<?php echo URL; ?>controle-fim/visualizar/<?php echo $id; ?>"><button type="button" class="btn btn-primary">Visualizar</button></a>

                            <a href="<?php echo URL; ?>controle-fim/editar/<?php echo $id; ?>"><button type="button" class="btn btn-warning">Editar</button></a>

                            <a href="<?php echo URL; ?>controle-fim/apagar/<?php echo $id; ?>"><button type="button" class="btn btn-danger" onclick="return confirm('Deseja mesmo apagar?');">Apagar</button></a>
                        </td>
                    </tr>

                    <?php
                endforeach;
                ?>
            </tbody>
        </table>
        <?php
    endif;
    echo $paginacao;

    //var_dump($this->Dados);
    ?>
</div>

