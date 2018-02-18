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
    <div class="pull-right">
        <a href="<?php echo URL; ?>controle-anotacao/index"><button type="button" class="btn btn-sm btn-success">Listar</button></a>
        <a href="<?php echo URL; ?>controle-anotacao/visualizar/<?php echo $valorForm['id']; ?>"><button type="button" class="btn btn-sm btn-primary">Visualizar</button></a>
        <a href="<?php echo URL; ?>controle-anotacao/apagar/<?php echo $valorForm['id']; ?>"><button type="button" class="btn btn-sm btn-danger">Apagar</button></a>
    </div>
    <div class="page-header">
        <h1>Editar Registro das Anotações</h1>
    </div>
    <H1></H1>
    <?php
    if (isset($_SESSION['msg'])):
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    endif;
    ?>
    <form name="EditObs"  class="form-horizontal" action="" method="post" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?php
        if (isset($valorForm['id'])):
            echo $valorForm['id'];
        endif;
        ?>">


        <div class="form-group">
            <label class="col-sm-2 control-label">Nome Destinatario:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="nome_destinatario" placeholder="Nome do Destinatario" value="<?php
                if (isset($valorForm['nome_destinatario'])):
                    echo $valorForm['nome_destinatario'];
                endif;
                ?>">
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-sm-2 control-label">Observações:</label>
            <div class="col-sm-10">
<!--                <input type="text" class="form-control" name="observacoes" placeholder="Descrição das anotações" value="--><textarea class="form-control" id="editable" name="observacoes" rows="10"><?php
                if (isset($valorForm['observacoes'])):
                    echo $valorForm['observacoes'];
                endif;
                ?>
<!--">--></textarea> 
            </div>
        </div>

        <input type="hidden" name="modified" value="<?php echo date("Y-m-d H:i:s"); ?>">

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-warning" value="Editar" name="SendEditObs">
            </div>
        </div>
    </form>
    <?php
    //var_dump($this->Dados);
    ?>
</div>