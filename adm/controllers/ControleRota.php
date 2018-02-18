<?php

/**
 * Descricao de ControleRota
 *
 * @copyright (c) Fev/2018, jgoliveira10474@gmail.com (OLIVEIRA - 88 99984-5395).
 */
class ControleRota {

    private $Dados;
    private $RotaId;
    private $PageId;

    public function index($pageId = null) {

        $this->PageId = ((int) $pageId ? $pageId : 1);

        $listarAsRotas = new ModelsRota();
        $this->Dados = $listarAsRotas->listar($this->PageId);

        $carregarView = new ConfigView('rota/listarRotas',  $this->Dados);
        $carregarView->renderizar();
    }

    public function cadastrar() {

        $this->Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $cadastraRota = new ModelsRota();
        if (!empty($this->Dados['SendCadRota'])):
            unset($this->Dados['SendCadRota']);

            $cadastraRota->cadastrar($this->Dados);
            if (!$cadastraRota->getResultado()):
                $_SESSION['msg'] = "<div class='alert alert-danger'><b>Erro ao cadastrar: </b>Para cadastrar a Rota preencha todos os campos!</div>";
            else:
                $_SESSION['msgcad'] = "<div class='alert alert-success'><b>A Rota</b> foi cadastrada com sucesso!</div>";
                $UrlDestino = URL . 'controle-rota/index';
                header("Location: $UrlDestino");
            endif;

        else:
            $Dados = null;
        endif;

        $carregarView = new ConfigView("rota/cadastrarRotas",  $this->Dados);
        $carregarView->renderizar();
    }

    public function visualizar($rotaId = null) {

        $this->RotaId = (int) $rotaId;
        if (!empty($this->RotaId)):
            $verRota = new ModelsRota();
            $this->Dados = $verRota->visualizar($this->RotaId);

            if ($verRota->getResultado()):
                $carregarView = new ConfigView('rota/visualizarRotas', $this->Dados);
                $carregarView->renderizar();
            else:
                $_SESSION['msg'] = "<div class='alert alert-danger'>Necessário seleciona uma rota!</div>";
                $UrlDestino = URL . 'controle-rota/index';
                header("Location: $UrlDestino");
            endif;
        else:
            $_SESSION['msg'] = "<div class='alert alert-danger'>Necessário seleciona uma rota!</div>";
            $UrlDestino = URL . 'controle-rota/index';
            header("Location: $UrlDestino");
        endif;
    }

    public function editar($rotaId = null) {
        $this->RotaId = (int) $rotaId;
        if (!empty($this->RotaId)):
            $this->Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $this->alterarPrivado();
            $verRota = new ModelsRota();
            $this->Dados = $verRota->visualizar($this->RotaId);
            $carregarView = new ConfigView('rota/editarRotas', $this->Dados);
            $carregarView->renderizar();

        else:
            $_SESSION['msg'] = "<div class='alert alert-danger'>Necessário selecionar uma rota!</div>";
            $UrlDestino = URL . 'controle-rota/index';
            header("Location: $UrlDestino");
        endif;
    }

    private function alterarPrivado() {
        if (!empty($this->Dados['SendEditRota'])):
            unset($this->Dados['SendEditRota']);
            $editarRota = new ModelsRota();
            $editarRota->editar($this->RotaId, $this->Dados);
            if (!$editarRota->getResultado()):
                $_SESSION['msg'] = "<div class='alert alert-danger'>Para editar a rota preencha todos os campos!</div>";
            else:
                $_SESSION['msgcad'] = "<div class='alert alert-success'><b>Rota</b> editada com sucesso!</div>";
                $UrlDestino = URL . 'controle-rota/index';
                header("Location: $UrlDestino");
            endif;
        else:
            $verRota = new ModelsRota();
            $this->Dados = $verRota->visualizar($this->RotaId);
            if ($verRota->getRowCount() <= 0):
                $_SESSION['msgcad'] = "<div class='alert alert-danger'>Necessário selecionar uma rota</div>";
                $UrlDestino = URL . 'controle-rota/index';
                header("Location: $UrlDestino");
            endif;
        endif;
    }

    public function apagar($rotaId = null) {
        $this->RotaId = (int) $rotaId;
        if (!empty($this->RotaId)):
            $apagarRota = new ModelsRota();
            $apagarRota->apagar($this->RotaId);
        else:
            $_SESSION['msg'] = "<div class='alert alert-danger'>Necessário selecionar uma rota!</div>";
            $UrlDestino = URL . 'controle-rota/index';
            header("Location: $UrlDestino");
        endif;

        $UrlDestino = URL . 'controle-rota/index';
        header("Location: $UrlDestino");
    }

}
