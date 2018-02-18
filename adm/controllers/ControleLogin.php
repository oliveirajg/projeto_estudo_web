<?php

/**
 * Descricao de ControleLogin
 *
 * @copyright (c) Fev/2018, jgoliveira10474@gmail.com (OLIVEIRA - 88 99984-5395).
 */
class ControleLogin {

    private $Dados;
    private $IdMethodo;
    private $Chave;

    public function login() {
        $this->Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if (!empty($this->Dados['SendLogin'])):
            unset($this->Dados['SendLogin']);
            $Login = new ModelsLogin();
            $Login->logar($this->Dados);
            if (!$Login->getResultado()):
                $_SESSION['msg'] = $Login->getMsg();
            else:
                $this->Dados = $Login->getResultado();

                $AtualizarSessao = new ModelsUsuario();
                $AtualizarSessao->atualizaSessao($this->Dados[0]['id']);

                $UrlDestino = URL . 'controle-home/index';
                header("Location: $UrlDestino");
            endif;
        else:
            $this->Dados = null;
        endif;

        $CarregarView = new ConfigView("login/login", $this->Dados);
        $CarregarView->renderizarlogin();
    }

    public function logout() {
        unset($_SESSION['id'], $_SESSION['name'], $_SESSION['email']);
        $_SESSION['msg'] = "<div class='alert alert-success'>Deslogado com sucesso</div>";
        $UrlDestino = URL . 'controle-login/login';
        header("Location: $UrlDestino");
    }

    public function recuperarSenha() {
        $CarregarView = new ConfigView('login/recuperarSenha');
        $CarregarView->renderizarlogin();
        $this->Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        if (!empty($this->Dados['SendRecupSenha'])):
            unset($this->Dados['SendRecupSenha']);
            $RecuperarSenha = new ModelsRecuperarSenha();
            $RecuperarSenha->recuperarSenha($this->Dados);
            if ($RecuperarSenha->getResultado()):
                $_SESSION['msgcad'] = "<div class='alert alert-success'>Enviado dados de recuperação par o seu e-mail!</div>";
                $UrlDestino = URL . 'controle-login/login';
                header("Location: $UrlDestino");
            else:
                $_SESSION['msg'] = "<div class='alert alert-danger'>E-mail inválido!</div>";
                $UrlDestino = URL . 'controle-login/recuperar-senha';
                header("Location: $UrlDestino");
            endif;
        endif;
    }

    public function atualizarSenha($Chave = null) {
        $this->Chave = $Chave;
        $this->Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        $this->atualizarSenhaPrivado();

        $CarregarView = new ConfigView('login/atualizaSenha');
        $CarregarView->renderizarlogin();
    }

    public function atualizarSenhaPrivado() {
        if (!empty($this->Dados['SendAtualSenha'])):
            unset($this->Dados['SendAtualSenha']);
            $this->Dados['recuperar_senha'] = $this->Chave;
            $AtualizarSenha = new ModelsRecuperarSenha();
            $AtualizarSenha->atualizarSenha($this->Chave, $this->Dados);

            if (!$AtualizarSenha->getResultado()) :
                $_SESSION['msg'] = "<div class='alert alert-danger'>Erro ao atualizar a senha!</div>";
            else:
                $_SESSION['msgcad'] = "<div class='alert alert-success'>Senha atualizada com sucesso!</div>";
                $UrlDestino = URL . 'controle-login/login';
                header("Location: $UrlDestino");
            endif;

        endif;
    }

    public function listarClasseMethodo() {
        $Listar = new ModelsLogin();
        $this->Dados = $Listar->listar();
        $CarregarView = new ConfigView("login/listarClasseMethodo", $this->Dados);
        $CarregarView->renderizar();
    }

    public function cadastrarClasse() {
        $CadClasse = new ModelsLogin();
        $CadClasse->cadastrarClasse();
        $_SESSION['msg'] = "<div class='alert alert-success'>Sincronizado com sucesso</div>";
        $UrlDestino = URL . 'controle-login/listar-classe-methodo';
        header("Location: $UrlDestino");
    }

    public function editarPermissao($MethodoId = null) {
        $this->IdMethodo = (int) $MethodoId;
        //echo "Método: {$this->IdMethodo}<br>";
        if (!empty($this->IdMethodo)):
            $this->Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $this->alterarPrivado();

            $CarregarView = new ConfigView("login/editarPermissao", $this->Dados);
            $CarregarView->renderizar();
        else:
            $_SESSION['msg'] = "<div class='alert alert-danger'>Necessário selecionar um Método</div>";
            $UrlDestino = URL . 'controle-login/listar-classe-methodo';
            header("Location: $UrlDestino");
        endif;
    }

    private function alterarPrivado() {
        if (!empty($this->Dados['SendEditPermissao'])):
            //var_dump($this->Dados);
            unset($this->Dados['SendEditPermissao']);
            $EditarPermissao = new ModelsLogin();
            $EditarPermissao->editarPermissoes($this->IdMethodo, $this->Dados);

            if (!$EditarPermissao->getResultado()):
                $_SESSION['msg'] = "<div class='alert alert-danger'>Erro ao editar a permissão</div>";
                $UrlDestino = URL . 'controle-login/listar-classe-methodo';
                header("Location: $UrlDestino");
            else:
                $_SESSION['msg'] = "<div class='alert alert-success'>Permissão editada com sucesso</div>";
                $UrlDestino = URL . 'controle-login/listar-classe-methodo';
                header("Location: $UrlDestino");
            endif;

        else:
            $VerPermissao = new ModelsLogin();
            $this->Dados = $VerPermissao->listar($this->IdMethodo);
        endif;
    }

}
