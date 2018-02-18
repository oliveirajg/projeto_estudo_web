<?php 
 echo "Oficial logado: <b>".$_SESSION['name']."</b>";
?>
<div class="well">

    <div class="pull-right well">
        <a href="<?php echo URL; ?>controle-mandado/cadastrarMandado"><button type="button" class="btn btn-sm btn-success">Cadastrar</button></a>
          <a href="<?php echo URL; ?>controle-mandado/pesquisar-mandado"><button type="button" class="btn btn-sm btn-info">Pesquisar</button></a>
          
    </div>
    <div class="page-header text-center">
        <h2>Relação Geral dos Mandados Cadastrados</h2>
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
                    <th>Orig</th>
                    <th>Processo</th>
                    <th class="hidden-xs">Destinatário</th>
                    <th>Vara</th>
                    <th>Of_Just</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($this->Dados as $mands) :
                    extract($mands);
                    ?>               
                    <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $origem; ?></td>
                        <td><?php echo $processo; ?></td>
                        <td class="hidden-xs"><?php echo $destinatario; ?></td>
                        <td width="70"><?php echo $varas; ?></td>
                        <td><?php echo $users; ?></td>
                        <td width="155">
                            <a href="<?php echo URL; ?>controle-mandado/visualizar/<?php echo $id; ?>"><button type="button" class="btn btn-xs btn-primary">Ver</button></a>

                            <a href="<?php echo URL; ?>controle-mandado/Editar/<?php echo $id; ?>"><button type="button" class="btn btn-xs btn-warning">Editar</button></a>

                            <a href="<?php echo URL; ?>controle-mandado/apagar/<?php echo $id; ?>"><button type="button" class="btn btn-xs btn-danger" onclick="return confirm('Deseja mesmo apagar?');">Apagar</button></a>
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


