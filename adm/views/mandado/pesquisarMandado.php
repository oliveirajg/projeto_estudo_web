<?php 
 echo "Oficial logado: <b>".$_SESSION['name']."</b>";
?>
<div class="well well-personalizado">
    <div class="btn pull-right" >
        <a href="<?php echo URL; ?>controle-mandado/index"><button type="button" class="btn btn-sm btn-success">Ver a Lista Geral dos Mandados</button></a>
        <a href="<?php echo URL; ?>controle-mandado/gerarPdf" target="_blank"><button type="button" class="btn btn-sm btn-danger">PDF da Pesquisa</button></a>
    </div>
    <div class="page-header text-center">
        <h1>Lista dos Mandados Pesquisados</h1>
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
    <form  name="CadPesquisaMandado" class="form-inline" method="POST" action="<?php echo URL . "controle-mandado/pesquisar-mandado"; ?>">

        <div class="well ">
            <div class="form-group">
                <label>Nome</label>
                <input type="text" name="destinatario" class="form-control" placeholder="Nome da Parte">
            </div>
            <div class="form-group">
                <label>Origem</label>
                <input type="text" name="origem" class="form-control" placeholder="Número de Origem">
            </div>
            <div class="form-group">
                <label>Processo</label>
                <input type="text" name="processo" class="form-control" placeholder="Número do Processo">
            </div>
            <div class="form-group">
                <label>Oficial</label>
                <input type="text" name="user_id" class="form-control" placeholder="Nome do Oficial">
            </div>
            <div class="">
                <br>
            </div>
            <div class="form-group">
                <label>Por Vara</label>
                <input type="text" name="vara_id" class="form-control" placeholder="Nome da Secretaria">
            </div>

            <div class="btn pull-right" >
                <input type="submit" class="btn btn-info" value="Pesquisar" name="SendPesquisaMandado">
            </div>

        </div>
    </form>    


    <?php
    if (!empty($this->Dados)):
        ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th class="hidden-xs">Nome da Parte</th>
                    <th>Processo</th>
                    <th>Orig</th>
                    <th>OfJust</th>
                    <th>Vara</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($this->Dados as $mand) {
                    extract($mand);
                    ?>               
                    <tr>
                        <td><?php echo $id; ?></td>
                        <td class="hidden-xs"><?php echo $destinatario; ?></td>
                        <td><?php echo $processo; ?></td>
                        <td><?php echo $origem; ?></td>
                        <td><?php echo $users; ?></td>
                        <td width="65"><?php echo $varas; ?></td>
                        <td width="130">
                            <a href="<?php echo URL; ?>controle-mandado/visualizar/<?php echo $id; ?>"><button type="button" class="btn btn-xs btn-xs btn-primary">Ver</button></a>

                            <a href="<?php echo URL; ?>controle-mandado/Editar/<?php echo $id; ?>"><button type="button" class="btn btn-xs btn-xs btn-warning">Edit</button></a>

                            <a href="<?php echo URL; ?>controle-mandado/apagar/<?php echo $id; ?>" onclick="return confirm('Deseja mesmo apagar?');"><button type="button" class="btn btn-xs btn-xs btn-danger">Del</button></a>
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

