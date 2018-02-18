<div class="well">
        
    <div class="pull-right">
        <a href="<?php echo URL; ?>controle-usuario/cadastrar"><button type="button" class="btn btn-sm btn-success">Cadastrar</button></a>
    </div>

    <div class="page-header text-center">
        <h1>Lista Geral dos Usuários Cadastrados no Sistema</h1>
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
   
    if (!empty($this->Dados)):
        ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th class="hidden-xs">E-mail</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($this->Dados as $user) {
                    extract($user);
                    ?>               
                    <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $name; ?></td>
                        <td class="hidden-xs"><?php echo $email; ?></td>
                        <td>
                            <a href="<?php echo URL; ?>controle-usuario/visualizar/<?php echo $id; ?>"><button type="button" class="btn btn-primary">Visualizar</button></a>

                            <a href="<?php echo URL; ?>controle-usuario/Editar/<?php echo $id; ?>"><button type="button" class="btn btn-warning">Editar</button></a>

                            <a href="<?php echo URL; ?>controle-usuario/apagar/<?php echo $id; ?>"><button type="button" class="btn btn-danger" onclick="return confirm('Deseja mesmo apagar?');">Apagar</button></a>
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

