<?php

/**
 * Descricao de ControleMandado
 *
 *@copyright (c) Fev/2018, jgoliveira10474@gmail.com (OLIVEIRA - 88 99984-5395).
 */
class ControleMandado {

    private $PageId;
    private $Dados;
    private $MandadoId;

    public function index($pageId = null) {
        $this->PageId = ((int) $pageId ? $pageId : 1);
        //echo "Número da página: {$this->PageId}<br>";

        $listarOsMandados = new ModelsMandado();
        $this->Dados = $listarOsMandados->listar($this->PageId);

        $carregarView = new ConfigView('mandado/listarMandados', $this->Dados);
        $carregarView->renderizar();
    }

    public function cadastrarMandado() {

        $this->Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $cadMandado = new ModelsMandado();
        if (!empty($this->Dados['SendCadMandado'])):
            unset($this->Dados['SendCadMandado']);

            $cadMandado->cadastrar($this->Dados);
            if (!$cadMandado->getResultado()):
                $_SESSION['msg'] = "<div class='alert alert-danger'><b>Erro ao cadastrar: </b>Para cadastrar o mandado preencha todos os campos!</div>";
            else:
                $_SESSION['msgcad'] = "<div class='alert alert-success'>O <b>Mandado</b> foi cadastrado com sucesso!</div>";
                $UrlDestino = URL . 'controle-mandado/index';
                header("Location: $UrlDestino");
            endif;

        else:
            $dados = null;
        endif;

        $registros = $cadMandado->listarCadastrar();
        $this->Dados = array($registros[0], $registros[1], $registros[2], $registros[3], $this->Dados);
        $carregarView = new ConfigView('mandado/cadastrarMandados', $this->Dados);
        $carregarView->renderizar();
    }

    public function visualizar($MandadoId = null) {
        $this->MandadoId = (int) $MandadoId;
        if (!empty($this->MandadoId)):
            $VerMandado = new ModelsMandado();
            $this->Dados = $VerMandado->visualizar($this->MandadoId);

            if ($VerMandado->getResultado()):
                $CarregarView = new ConfigView("mandado/visualizarMandados", $this->Dados);
                $CarregarView->renderizar();
            else:
                $_SESSION['msg'] = "<div class='alert alert-danger'>Necessário seleciona um Mandado!</div>";
                $UrlDestino = URL . 'controle-mandado/index';
                header("Location: $UrlDestino");
            endif;

        else:
            $_SESSION['msg'] = "<div class='alert alert-danger'>Necessário seleciona um Mandado!</div>";
            $UrlDestino = URL . 'controle-mandado/index';
            header("Location: $UrlDestino");
        endif;
    }

    public function editar($MandadoId = null) {
        $this->MandadoId = (int) $MandadoId;
        if (!empty($this->MandadoId)):
            $this->Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $this->alterarPrivado();
            //$_SESSION['msg'] = "<div class='alert alert-success'>Mandado editado com sucesso</div>";
            $EditaMandado = new ModelsMandado();
            $Registros = $EditaMandado->listarCadastrar();
            //var_dump($Registros);
            $this->Dados = array($Registros[0], $Registros[1], $Registros[2], $Registros[3], $this->Dados);

            $CarregarView = new ConfigView("mandado/editarMandados",  $this->Dados);
            $CarregarView->renderizar();
        else:
            $_SESSION['msg'] = "<div class='alert alert-danger'>Necessário selecionar um mandado</div>";
            $UrlDestino = URL . 'controle-mandado/index';
            header("Location: $UrlDestino");
        endif;
    }

    private function alterarPrivado() {
        if (!empty($this->Dados['SendEditMandado'])):
            unset($this->Dados['SendEditMandado']);
            $EditaMandado = new ModelsMandado();
            $EditaMandado->editar($this->MandadoId, $this->Dados);
            if (!$EditaMandado->getResultado()):
                $_SESSION['msg'] = "<div class='alert alert-danger'>Para <b>Editar</b> o Mandado preencha todos os campos!</div>";
            else:
                $_SESSION['msg'] = "<div class='alert alert-success'><b>Mandado</b> Editado com sucesso!</div>";
                $UrlDestino = URL . 'controle-mandado/visualizar/' . $this->MandadoId;
                header("Location: $UrlDestino");
            endif;
        else:
            $VerMandado = new ModelsMandado();
            $this->Dados = $VerMandado->visualizar($this->MandadoId);
            if ($VerMandado->getRowCount() <= 0):
                $_SESSION['msg'] = "<div class='alert alert-danger'>Necessário selecionar um mandado</div>";
                $UrlDestino = URL . 'controle-mandado/index';
                header("Location: $UrlDestino");
            endif;
        //var_dump($this->Dados);
        endif;
    }

    public function apagar($MandadoId = null) {
        $this->MandadoId = (int) $MandadoId;
        if (!empty($this->MandadoId)):
            echo "Mandado a ser apagado: {$this->MandadoId}<br>";
            $ApagarMandado = new ModelsMandado();
            $ApagarMandado->apagar($this->MandadoId);
        else:
            $_SESSION['msg'] = "<div class='alert alert-danger'>Necessário selecionar um mandado</div>";
        endif;

        $UrlDestino = URL . 'controle-mandado/index';
        header("Location: $UrlDestino");
    }

    public function pesquisarMandado($PageId = null) {
        $this->Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        //var_dump($this->Dados);
        if (!empty($this->Dados['SendPesquisaMandado'])):
            unset($this->Dados['SendPesquisaMandado']);
        else:
            $this->PageId = ((int) $PageId ? $PageId : 1);
            $this->Dados['destinatario'] = filter_input(INPUT_GET, 'destinatario', FILTER_DEFAULT);
            $this->Dados['processo'] = filter_input(INPUT_GET, 'processo', FILTER_DEFAULT);
            $this->Dados['user_id'] = filter_input(INPUT_GET, 'user_id', FILTER_DEFAULT);
            $this->Dados['vara_id'] = filter_input(INPUT_GET, 'vara_id', FILTER_DEFAULT);
            $this->Dados['origem'] = filter_input(INPUT_GET, 'origem', FILTER_DEFAULT);
        endif;

        $PesquisarMandados = new ModelsPesquisarMandado();
        $this->Dados = $PesquisarMandados->pesquisarMandados($this->PageId, $this->Dados);
//        var_dump($this->Dados);
        $CarregarView = new ConfigView("mandado/pesquisarMandado",  $this->Dados);
        $CarregarView->renderizar();
    }

    public function gerarPdf() {
        if (isset($_SESSION['pesquisa_destinatario']) AND isset($_SESSION['pesquisa_processo']) AND isset($_SESSION['pesquisa_oficial_id']) AND isset($_SESSION['pesquisa_vara_id'])):
            $GerarPdf = new ModelsGerarPdfMandado();
            $this->Dados = $GerarPdf->gerarPdf();
        else:
            echo "Nenhum valor encontrado";
        endif;
    }

}
