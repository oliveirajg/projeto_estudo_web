<?php

/**
 * Descricao de ControleFim
 *
 *@copyright (c) Fev/2018, jgoliveira10474@gmail.com (OLIVEIRA - 88 99984-5395).
 */
class ControleFim {

    private $Dados;
    private $PageId;
    private $FimId;

    public function index($pageId = null) {

        $this->PageId = ((int) $pageId ? $pageId : 1);

        $listarAsFinalidades = new ModelsFim();
        $this->Dados = $listarAsFinalidades->listar($this->PageId);

        $carregarView = new ConfigView('fim/listarFins',  $this->Dados);
        $carregarView->renderizar();
    }

    public function cadastrar() {
        $this->Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $CadFim = new ModelsFim();
        if (!empty($this->Dados['SendCadFim'])):
            unset($this->Dados['SendCadFim']);

            $CadFim->cadastrar($this->Dados);
            if (!$CadFim->getResultado()):
                $_SESSION['msg'] = "<div class='alert alert-danger'><b>Erro ao cadastrar: </b>Para cadastrar a finalidade preencha todos os campos!</div>";
            else:
                $_SESSION['msgcad'] = "<div class='alert alert-success'>Fim cadastrado com sucesso!</div>";
                $UrlDestino = URL . 'controle-fim/index';
                header("Location: $UrlDestino");
            endif;

        else:
            $Dados = null;
        endif;

        $CarregarView = new ConfigView("fim/cadastrarFins",  $this->Dados);
        $CarregarView->renderizar();
    }

    public function visualizar($FimId = null) {

        $this->FimId = (int) $FimId;
        if (!empty($this->FimId)):
            $VerFim = new ModelsFim();
            $this->Dados = $VerFim->visualizar($this->FimId);

            if ($VerFim->getResultado()):
                $CarregarView = new ConfigView('fim/visualizarFins',  $this->Dados);
                $CarregarView->renderizar();
            else:
                $_SESSION['msg'] = "<div class='alert alert-danger'>Necessário seleciona uma finalidade!</div>";
                $UrlDestino = URL . 'controle-fim/index';
                header("Location: $UrlDestino");
            endif;
        else:
            $_SESSION['msg'] = "<div class='alert alert-danger'>Necessário seleciona uma finalidade!</div>";
            $UrlDestino = URL . 'controle-fim/index';
            header("Location: $UrlDestino");
        endif;
    }

    public function editar($FimId = null) {

        $this->FimId = (int) $FimId;
        if (!empty($this->FimId)):
            $this->Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $this->alterarPrivado();
            $verFim = new ModelsFim();
            $this->Dados = $verFim->visualizar($this->FimId);
            $CarregarView = new ConfigView('fim/editarFins',  $this->Dados);
            $CarregarView->renderizar();

        else:
            $_SESSION['msg'] = "<div class='alert alert-danger'>Necessário selecionar uma finalidade!</div>";
            $UrlDestino = URL . 'controle-fim/index';
            header("Location: $UrlDestino");
        endif;
    }

    private function alterarPrivado() {
        if (!empty($this->Dados['SendEditFim'])):
            unset($this->Dados['SendEditFim']);
            $EditaFim = new ModelsFim();
            $EditaFim->editar($this->FimId, $this->Dados);
            if (!$EditaFim->getResultado()):
                $_SESSION['msg'] = "<div class='alert alert-danger'>Para editar finalidade preencha todos os campos!</div>";
            else:
                $_SESSION['msgcad'] = "<div class='alert alert-success'>Finalidade editado com sucesso!</div>";
                $UrlDestino = URL . 'controle-fim/index';
                header("Location: $UrlDestino");
            endif;
        else:
            $VerFim = new ModelsFim();
            $this->Dados = $VerFim->visualizar($this->FimId);
            if ($VerFim->getRowCount() <= 0):
                $_SESSION['msgcad'] = "<div class='alert alert-danger'>Necessário selecionar uma finalidade</div>";
                $UrlDestino = URL . 'controle-fim/index';
                header("Location: $UrlDestino");
            endif;
        endif;
    }

    public function apagar($FimId = null) {
        $this->FimId = (int) $FimId;
        if (!empty($this->FimId)):
            $ApagarFim = new ModelsFim();
            $ApagarFim->apagar($this->FimId);
        else:
            $_SESSION['msg'] = "<div class='alert alert-danger'>Necessário selecionar uma finalidade!</div>";
            $UrlDestino = URL . 'controle-fim/index';
            header("Location: $UrlDestino");
        endif;

        $UrlDestino = URL . 'controle-fim/index';
        header("Location: $UrlDestino");
    }

    //** Acrecentado alem do curso**/
    public function pesquisarFinalidade($pageId = null) {

        $this->Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        //var_dump($this->Dados);
        if (!empty($this->Dados['SendPesquisaFim'])):
            unset($this->Dados['SendPesquisaFim']);
        else:
            $this->PageId = ((int) $pageId ? $pageId : 1);
            $this->Dados['nome_fim'] = filter_input(INPUT_GET, 'nome_fim', FILTER_DEFAULT);
        endif;

        $pesquisarFins = new ModelsPesquisarFim();
        $this->Dados = $pesquisarFins->pesquisar($this->PageId, $this->Dados);
//        var_dump($this->Dados);
        $carregarView = new ConfigView("fim/pesquisarFinalidades",  $this->Dados);
        $carregarView->renderizar();
    }



    //** Acrescentado alem do curso */
    public function gerarPdf() {
        if (isset($_SESSION['pesquisa_fim'])):
            $gerarFimPdf = new ModelsGerarFimPdf();
            $this->Dados = $gerarFimPdf->gerarPdf();
        else:
            echo "Nenhum valor encontrado";
        endif;
    }

}
