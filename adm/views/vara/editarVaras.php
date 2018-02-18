<?php
if (isset($this->Dados[0])):
    $valorForm = $this->Dados[0];
    //var_dump($valorForm);
elseif (isset($this->Dados)):
    $valorForm = $this->Dados;
    //var_dump($valorForm);
endif;

?>
<div class="well">
    <div class="pull-right well btn btn-warning">
        <a href="<?php echo URL; ?>controle-vara/index"><button type="button" class="btn btn-sm btn-success">Listar</button></a>
        <a href="<?php echo URL; ?>controle-vara/visualizar/<?php echo $valorForm['id']; ?>"><button type="button" class="btn btn-sm btn-primary">Visualizar</button></a>
        <a href="<?php echo URL; ?>controle-vara/apagar/<?php echo $valorForm['id']; ?>"><button type="button" class="btn btn-sm btn-danger" onclick="return confirm('Deseja mesmo apagar?');">Apagar</button></a>
    </div>
    <div class="page-header text-center">
        <h1>Editar Registro da Secretaria</h1>
    </div>
    <h1></h1>
    <?php
    if (isset($_SESSION['msg'])):
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    endif;
    ?>
    <form name="EditVara"  class="form-horizontal" action="" method="post" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?php
        if (isset($valorForm['id'])):
            echo $valorForm['id'];
        endif;
        ?>">


        <div class="form-group">
            <label class="col-sm-2 control-label">Secretaria:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nome_vara" placeholder="Nome da secretaria" value="<?php
                if (isset($valorForm['nome_vara'])):
                    echo $valorForm['nome_vara'];
                endif;
                ?>">
            </div>
        </div>

        <input type="hidden" name="modified" value="<?php echo date("Y-m-d H:i:s"); ?>">

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-warning" value="Editar" name="SendEditVara">
            </div>
        </div>
    </form>
    <?php
    //var_dump($this->Dados);
    ?>
</div>