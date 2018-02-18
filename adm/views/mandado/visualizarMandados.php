<div class="well well-personalizado">
    <?php
    if (isset($this->Dados[0][0])):
        $this->Dados[0] = $this->Dados[0][0];
    endif;
    ?>
    <div class="pull-right"> 
        <a href="<?php echo URL; ?>controle-mandado/index"><button type="button" class="btn btn-xm btn-success">Lista Geral dos Mandados</button></a>
        <a href="<?php echo URL; ?>controle-mandado/editar/<?php echo $this->Dados[0]['id']; ?>"><button type="button" class="btn btn-xm btn-warning">Editar Mandado</button></a>
        <a href="<?php echo URL; ?>controle-mandado/apagar/<?php echo $this->Dados[0]['id']; ?>"><button type="button" class="btn btn-xm btn-danger" onclick="return confirm('Deseja mesmo apagar?');">Apagar Mandado</button></a>
    </div>

    <div class="page-header">
        <h1>Visualizar Mandado</h1>
    </div>

    <?php
    if (isset($_SESSION['msg'])):
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    endif;
    if (!empty($this->Dados[0]['id'])):
        ?>
        <dl class="dl-horizontal">
            <dt>Identificador:</dt>
            <dd><?php echo $this->Dados[0]['id']; ?></dd>

            <dt>Distribuição Origem:</dt>
            <dd><?php echo $this->Dados[0]['origem']; ?></dd>

            <dt>Processo nº:</dt>
            <dd><?php echo $this->Dados[0]['processo']; ?></dd>

            <dt>Destinatário(s):</dt>
            <dd><?php echo $this->Dados[0]['destinatario']; ?></dd>

            <dt>Secretaria:</dt>
            <dd><?php echo $this->Dados[0]['varas']; ?></dd>

            <dt>Finalidade:</dt>
            <dd><?php echo $this->Dados[0]['fins']; ?></dd>

            <dt>Setor:</dt>
            <dd><?php echo $this->Dados[0]['rotas']; ?></dd>

            <dt>Oficial de Justiça:</dt>
            <dd><?php echo $this->Dados[0]['users']; ?></dd>

            <dt>Data do Cadastro:</dt>
            <dd>
                <?php
                echo date('d/m/Y H:i:s', strtotime($this->Dados[0]['created']));
                ?>
            </dd>

            <dt>Data Alteração:</dt>
            <dd>
                <?php
                //ESSA CONDIÇÃO DESTINA A IMPRIMIR NADA QUANDO A DATA É NULA
                if (!empty($this->Dados[0]['modified'])):
                    echo date('d/m/Y H:i:s', strtotime($this->Dados[0]['modified']));
                endif;
                ?>
            </dd>
        </dl>
        <?php
    else:
        echo "<div class='alert alert-danger'>Nenhum dado encontrado.</div>";
    endif;

    //var_dump($this->Dados);
    ?>

</div>