<?php
if (isset($this->Dados[0])):
    $vara = $this->Dados[0];
//var_dump($vara);
endif;

if (isset($this->Dados[1])):
    $fim = $this->Dados[1];
//var_dump($fim);
endif;

if (isset($this->Dados[2])):
    $rota = $this->Dados[2];
//var_dump($rota);
endif;

if (isset($this->Dados[3])):
    $oficial = $this->Dados[3];
//var_dump($oficial);
endif;

if (isset($this->Dados[4][0])):
    $valorForm = $this->Dados[4][0];
//var_dump($valorForm);
elseif (isset($this->Dados[4])):
    $valorForm = $this->Dados[4];
//var_dump($valorForm);
endif;
?>

<div class="well">

    <div class="pull-right">
        <a href="<?php echo URL; ?>controle-mandado/index"><button type="button" class="btn btn-sm btn-success">Lista Geral dos Mandados</button></a>
        <a href="<?php echo URL; ?>controle-mandado/visualizar/<?php echo $valorForm['id']; ?>"><button type="button" class="btn btn-sm btn-primary">Visualizar Mandado</button></a>
        <a href="<?php echo URL; ?>controle-mandado/apagar/<?php echo $valorForm['id']; ?>"><button type="button" class="btn btn-sm btn-danger" onclick="return confirm('Deseja mesmo apagar?');">Apagar Mandado</button></a>
    </div>

    <div class="page-header text-center">
        <h1>Formulário para Editar o Mandado</h1>
    </div>
    <H1></H1>
    <?php
    if (isset($_SESSION['msg'])):
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    endif;
    ?>
    <form name="CadMandado"  class="form-horizontal" action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label class="col-sm-2 control-label">Distribuição:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="origem" placeholder="Distribuição de Origem" value="<?php
                if (isset($valorForm['origem'])):
                    echo $valorForm['origem'];
                endif;
                ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Processo:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="processo" placeholder="Número do Processo" value="<?php
                if (isset($valorForm['processo'])):
                    echo $valorForm['processo'];
                endif;
                ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Destinatário:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="destinatario" placeholder="Nome da Parte" value="<?php
                if (isset($valorForm['destinatario'])):
                    echo $valorForm['destinatario'];
                endif;
                ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Secretaria:</label>
            <div class="col-sm-10">
                <select class="form-control" name="vara_id">
                    <option value="">Selecione</option>
                    <?php
                    foreach ($vara as $sec):
                        extract($sec);
                        if ($valorForm['vara_id'] == $id):
                            $selecionado = "selected";
                        else:
                            $selecionado = "";
                        endif;
                        echo "<option value='$id' $selecionado>$nome_vara</option>";
                    endforeach;
                    ?>
                </select> 
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Finalidade:</label>
            <div class="col-sm-10">
                <select class="form-control" name="fim_id">
                    <option value="">Selecione</option>
                    <?php
                    foreach ($fim as $finalid):
                        extract($finalid);
                        if ($valorForm['fim_id'] == $id):
                            $selecionado = "selected";
                        else:
                            $selecionado = "";
                        endif;
                        echo "<option value='$id' $selecionado>$nome_fim</option>";
                    endforeach;
                    ?>
                </select> 
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Rota:</label>
            <div class="col-sm-10">
                <select class="form-control" name="rota_id">
                    <option value="">Selecione</option>
                    <?php
                    foreach ($rota as $setor):
                        extract($setor);
                        if ($valorForm['rota_id'] == $id):
                            $selecionado = "selected";
                        else:
                            $selecionado = "";
                        endif;
                        echo "<option value='$id' $selecionado>$nome_rota</option>";
                    endforeach;
                    ?>
                </select> 
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">Oficial Justiça:</label>
            <div class="col-sm-10">
                <select class="form-control" name="user_id">
                    <option value="">Selecione</option>
                    <?php
                    foreach ($oficial as $of_just):
                        extract($of_just);
                        if ($valorForm['user_id'] == $id):
                            $selecionado = "selected";
                        else:
                            $selecionado = "";
                        endif;
                        echo "<option value='$id' $selecionado>$name</option>";
                    endforeach;
                    ?>
                </select> 
            </div>
        </div>

        <input type="hidden" name="modified" value="<?php echo date("Y-m-d H:i:s"); ?>"/>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-warning" value="Editar" name="SendEditMandado">
            </div>
        </div>
    </form>
    <?php
    //var_dump($this->Dados)
    ?>
</div>