<?php

/**
 * Descricao de ControleAnotacao
 * 
 *@copyright (c) Fev/2018, jgoliveira10474@gmail.com (OLIVEIRA - 88 99984-5395).
 */
class ControleAnotacao {

    private $Dados;
    private $PageId;
    private $AnotacaoId;

    public function index($pageId = null) {

        $this->PageId = ((int) $pageId ? $pageId : 1);

        $listarAsAnotacoes = new ModelsAnotacao();
        $this->Dados = $listarAsAnotacoes->listar($this->PageId);

        $carregarView = new ConfigView('anotacoe/listarAnotacoes',  $this->Dados);
        $carregarView->renderizar();
    }

    public function cadastrar() {

        $this->Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $cadastrarAnotacao = new ModelsAnotacao();
        if (!empty($this->Dados['SendCadObs'])):
            unset($this->Dados['SendCadObs']);

            $cadastrarAnotacao->cadastrar($this->Dados);
            if (!$cadastrarAnotacao->getResultado()):
                $_SESSION['msg'] = "<div class='alert alert-danger'><b>Erro ao cadastrar: </b>Para cadastrar a anotação preencha todos os campos!</div>";
            else:
                $_SESSION['msgcad'] = "<div class='alert alert-success'><b>Anotações</b> cadastradas com sucesso!</div>";
                $UrlDestino = URL . 'controle-anotacao/index';
                header("Location: $UrlDestino");
            endif;

        else:
            $Dados = null;
        endif;

        $CarregarView = new ConfigView("anotacoe/cadastrarAnotacoes",  $this->Dados);
        $CarregarView->renderizar();
    }

    public function visualizar($AnotacaoId = null) {
        $this->AnotacaoId = (int) $AnotacaoId;
        if (!empty($this->AnotacaoId)):
            $verAnotacoes = new ModelsAnotacao();
            $this->Dados = $verAnotacoes->visualizar($this->AnotacaoId);

            if ($verAnotacoes->getResultado()):
                $carregarView = new ConfigView('anotacoe/visualizarAnotacoes',  $this->Dados);
                $carregarView->renderizar();
            else:
                $_SESSION['msg'] = "<div class='alert alert-danger'>Necessário seleciona uma Anotação!</div>";
                $UrlDestino = URL . 'controle-anotacao/index';
                header("Location: $UrlDestino");
            endif;
        else:
            $_SESSION['msg'] = "<div class='alert alert-danger'>Necessário seleciona uma Anotação!</div>";
            $UrlDestino = URL . 'controle-anotacao/index';
            header("Location: $UrlDestino");
        endif;
    }

    public function editar($AnotacaoId = null) {

        $this->AnotacaoId = (int) $AnotacaoId;
        if (!empty($this->AnotacaoId)):
            $this->Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $this->alterarPrivado();
            $verAnotacoes = new ModelsAnotacao();
            $this->Dados = $verAnotacoes->visualizar($this->AnotacaoId);
            $carregarView = new ConfigView('anotacoe/editarAnotacoes',  $this->Dados);
            $carregarView->renderizar();

        else:
            $_SESSION['msg'] = "<div class='alert alert-danger'>Necessário selecionar uma Anotação!</div>";
            $UrlDestino = URL . 'controle-anotacao/index';
            header("Location: $UrlDestino");
        endif;
    }

    private function alterarPrivado() {
        if (!empty($this->Dados['SendEditObs'])):
            unset($this->Dados['SendEditObs']);
            $editarAnotacoes = new ModelsAnotacao();
            $editarAnotacoes->editar($this->AnotacaoId, $this->Dados);
            if (!$editarAnotacoes->getResultado()):
                $_SESSION['msg'] = "<div class='alert alert-danger'>Para editar uma Anotação preencha todos os campos!</div>";
            else:
                $_SESSION['msgcad'] = "<div class='alert alert-success'><b>Anotação</b> editada com sucesso!</div>";
                $UrlDestino = URL . 'controle-anotacao/index';
                header("Location: $UrlDestino");
            endif;
        else:
            $verAnotacoes = new ModelsAnotacao();
            $this->Dados = $verAnotacoes->visualizar($this->AnotacaoId);
            if ($verAnotacoes->getRowCount() <= 0):
                $_SESSION['msgcad'] = "<div class='alert alert-danger'>Necessário selecionar uma Anotação</div>";
                $UrlDestino = URL . 'controle-anotacao/index';
                header("Location: $UrlDestino");
            endif;
        endif;
    }

    public function apagar($AnotacaoId = null) {
        $this->AnotacaoId = (int) $AnotacaoId;
        if (!empty($this->AnotacaoId)):
            $apagarAnotacoe = new ModelsAnotacao();
            $apagarAnotacoe->apagar($this->AnotacaoId);
        else:
            $_SESSION['msg'] = "<div class='alert alert-danger'>Necessário selecionar uma Anotação!</div>";
            $UrlDestino = URL . 'controle-anotacao/index';
            header("Location: $UrlDestino");
        endif;

        $UrlDestino = URL . 'controle-anotacao/index';
        header("Location: $UrlDestino");
    }

   
    //** Acrescentado alem do curso**/
    public function pesquisarDiversos($pageId = null) {

        $this->Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        //var_dump($this->Dados);
        if (!empty($this->Dados['SendPesquisaAnote'])):
            unset($this->Dados['SendPesquisaAnote']);
        else:
            $this->PageId = ((int) $pageId ? $pageId : 1);
            $this->Dados['nome_destinatario'] = filter_input(INPUT_GET, 'nome_destinatario', FILTER_DEFAULT);
            $this->Dados['observacoes'] = filter_input(INPUT_GET, 'observacoes', FILTER_DEFAULT);
        endif;

        $pesquisarAnotacoes = new ModelsPesquisarAnotacao();
        $this->Dados = $pesquisarAnotacoes->pesquisar($this->PageId, $this->Dados);
//        var_dump($this->Dados);
        $carregarView = new ConfigView("anotacoe/pesquisarAnotacoes", $this->Dados);
        $carregarView->renderizar();
    }



    //** Acrescentado alem do curso */
    public function gerarPdf() {
        if (isset($_SESSION['pesquisa_anotacao']) and (isset($_SESSION['pesquisa_obs']))):
            $gerarAnotacaoPdf = new ModelsGerarAnotacaoPdf();
            $this->Dados = $gerarAnotacaoPdf->gerarPdf();
        else:
            echo "Nenhum valor encontrado";
        endif;
    }


}
