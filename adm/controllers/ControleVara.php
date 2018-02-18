<?php

/**
 * Descricao de ControleVara
 *
 *@copyright (c) Fev/2018, jgoliveira10474@gmail.com (OLIVEIRA - 88 99984-5395).
 */
class ControleVara {

    private $PageId;
    private $VaraId;
    private $Dados;

    public function index($pageId = null) {

        $this->PageId = ((int) $pageId ? $pageId : 1);

        $listarAsVaras = new ModelsVara();
        $this->Dados = $listarAsVaras->listar($this->PageId);

        $carregarView = new ConfigView('vara/listarVaras', $this->Dados);
        $carregarView->renderizar();
    }

    public function cadastrar() {

        $this->Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $cadastraVara = new ModelsVara();
        if (!empty($this->Dados['SendCadVara'])):
            unset($this->Dados['SendCadVara']);

            $cadastraVara->cadastrar($this->Dados);
            if (!$cadastraVara->getResultado()):
                $_SESSION['msg'] = "<div class='alert alert-danger'><b>Erro ao cadastrar: </b>Para cadastrar a secretaria preencha todos os campos!</div>";
            else:
                $_SESSION['msgcad'] = "<div class='alert alert-success'><b>A Secretaria</b> foi cadastrada com sucesso!</div>";
                $UrlDestino = URL . 'controle-vara/index';
                header("Location: $UrlDestino");
            endif;

        else:
            $Dados = null;
        endif;

        $carregarView = new ConfigView("vara/cadastrarVaras", $this->Dados);
        $carregarView->renderizar();
    }

    public function visualizar($varaId = null) {
        $this->VaraId = (int) $varaId;
        if (!empty($this->VaraId)):
            $verSec = new ModelsVara();
            $this->Dados = $verSec->visualizar($this->VaraId);

            if ($verSec->getResultado()):
                $carregarView = new ConfigView('vara/visualizarVaras', $this->Dados);
                $carregarView->renderizar();
            else:
                $_SESSION['msg'] = "<div class='alert alert-danger'>Necessário seleciona uma secretaria!</div>";
                $UrlDestino = URL . 'controle-vara/index';
                header("Location: $UrlDestino");
            endif;
        else:
            $_SESSION['msg'] = "<div class='alert alert-danger'>Necessário seleciona uma secretaria!</div>";
            $UrlDestino = URL . 'controle-vara/index';
            header("Location: $UrlDestino");
        endif;
    }

    public function editar($varaId = null) {
        $this->VaraId = (int) $varaId;
        if (!empty($this->VaraId)):
            $this->Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $this->alterarPrivado();
            $verSecretaria = new ModelsVara();
            $this->Dados = $verSecretaria->visualizar($this->VaraId);
            $carregarView = new ConfigView('vara/editarVaras', $this->Dados);
            $carregarView->renderizar();

        else:
            $_SESSION['msg'] = "<div class='alert alert-danger'>Necessário selecionar uma secretaria!</div>";
            $UrlDestino = URL . 'controle-vara/index';
            header("Location: $UrlDestino");
        endif;
    }

    private function alterarPrivado() {
        if (!empty($this->Dados['SendEditVara'])):
            unset($this->Dados['SendEditVara']);
            $editarSecretaria = new ModelsVara();
            $editarSecretaria->editar($this->VaraId, $this->Dados);
            if (!$editarSecretaria->getResultado()):
                $_SESSION['msg'] = "<div class='alert alert-danger'>Para editar secretaria preencha todos os campos!</div>";
            else:
                $_SESSION['msgcad'] = "<div class='alert alert-success'><b>Secretaria</b> editada com sucesso!</div>";
                $UrlDestino = URL . 'controle-vara/index';
                header("Location: $UrlDestino");
            endif;
        else:
            $verSecretaria = new ModelsVara();
            $this->Dados = $verSecretaria->visualizar($this->VaraId);
            if ($verSecretaria->getRowCount() <= 0):
                $_SESSION['msgcad'] = "<div class='alert alert-danger'>Necessário selecionar uma secretaria</div>";
                $UrlDestino = URL . 'controle-vara/index';
                header("Location: $UrlDestino");
            endif;
        endif;
    }

    public function apagar($varaId = null) {
        $this->VaraId = (int) $varaId;
        if (!empty($this->VaraId)):
            $apagarSecretaria = new ModelsVara();
            $apagarSecretaria->apagar($this->VaraId);
        else:
            $_SESSION['msg'] = "<div class='alert alert-danger'>Necessário selecionar uma secretaria!</div>";
            $UrlDestino = URL . 'controle-vara/index';
            header("Location: $UrlDestino");
        endif;

        $UrlDestino = URL . 'controle-vara/index';
        header("Location: $UrlDestino");
    }

}
