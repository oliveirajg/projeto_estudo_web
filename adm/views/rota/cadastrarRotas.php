<div class="well">

    <div class="pull-right well btn-info">
        <a href="<?php echo URL; ?>controle-rota/index"><button type="button" class="btn btn-sm btn-success">Voltar a Lista Geral</button></a>
    </div>

    <div class="page-header text-center">
        <h1>Cadastrar Registro de Rota</h1>
    </div>
    <?php
    if (isset($_SESSION['msg'])):
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    endif;
    ?>
    <form name="CadRota" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label class="col-sm-2 control-label">Rota:</label>
            <div class="col-sm-10">
                <input type="text"  class="form-control" name="nome_rota" placeholder="Nome da Rota" value="<?php
                if (isset($valorForm['nome_rota'])): echo $valorForm['nome_rota'];
                endif;
                ?>">
            </div>
        </div>
        <input type="hidden" name="created" value="<?php echo date("Y-m-d H:i:s"); ?>">

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-sm btn-success" value="Cadastrar" name="SendCadRota">
            </div>
        </div>
    </form>
    <?php
    //var_dump($this->Dados);
    ?>
</div>