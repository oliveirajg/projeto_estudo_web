<div class="well">
    <div class="pull-right well btn-info">
        <a href="<?php echo URL; ?>controle-rota/index"><button type="button" class="btn btn-sm btn-success">Listar</button></a>
        <a href="<?php echo URL; ?>controle-rota/editar/<?php echo $this->Dados[0]['id']; ?>"><button type="button" class="btn btn-sm btn-warning">Editar</button></a>
         <a href="<?php echo URL; ?>controle-rota/apagar/<?php echo $this->Dados[0]['id']; ?>"><button type="button" class="btn btn-sm btn-danger" onclick="return confirm('Deseja mesmo apagar?');">Apagar</button></a>
    </div>
    <div class="page-header">
        <h1>Detalhes do Registro das Rotas</h1>
    </div>
    <?php
    if (isset($_SESSION['msg'])):
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    endif;
    if (!empty($this->Dados[0]['id'])):
        ?>
        <dl class="dl-horizontal">
            <dt>ID</dt>
            <dd><?php echo $this->Dados[0]['id']; ?></dd>

            <dt>Rota</dt>
            <dd><?php echo $this->Dados[0]['nome_rota']; ?></dd>
            
            <dt>Inserido</dt>
            <dd><?php echo date('d/m/Y H:i:s', strtotime($this->Dados[0]['created'])); ?></dd>

            <dt>Alterado</dt>
            <dd>
                <?php
                if(!empty($this->Dados[0]['modified'])):
                    echo date('d/m/Y H:i:s', strtotime($this->Dados[0]['modified']));        
                endif;
                ?>
            </dd>
        </dl>
        <?php
    else:
        echo "<div class='alert alert-danger'>Nenhum dado encontrado.</div>";
    endif;
    ?>
</div>


