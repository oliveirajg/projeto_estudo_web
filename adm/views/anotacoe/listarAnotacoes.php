<div class="well well-personalizado">

    <div class="pull-right well">
        <a href="<?php echo URL; ?>controle-anotacao/cadastrar"><button type="button" class="btn btn-sm btn-success">Cadastrar</button></a>
          <a href="<?php echo URL; ?>controle-anotacao/pesquisarDiversos"><button type="button" class="btn btn-sm btn-info">Pesquisar</button></a>
    </div>
    <div class="page-header text-center">
        <h2>Lista Geral dos Registros das Anotações Cadastrados</h2>
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
                    <th>Nome</th>
                    <th>Observações</th>
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
                        <td><?php echo $nome_destinatario; ?></td>
                        <td><?php echo $observacoes; ?></td>
                        <td width="125">
                            <a href="<?php echo URL; ?>controle-anotacao/visualizar/<?php echo $id; ?>"><button type="button" class="btn btn-xs btn-primary">Ver</button></a>

                            <a href="<?php echo URL; ?>controle-anotacao/editar/<?php echo $id; ?>"><button type="button" class="btn btn-xs btn-warning">Ed</button></a>

                            <a href="<?php echo URL; ?>controle-anotacao/apagar/<?php echo $id; ?>"><button type="button" class="btn btn-xs btn-danger" onclick="return confirm('Deseja mesmo apagar?');">Apag</button></a>
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

