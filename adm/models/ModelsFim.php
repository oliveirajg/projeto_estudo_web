<?php

/**
 * Descricao de ModelsFim
 *
 * @copyright (c) Fev/2018, jgoliveira10474@gmail.com (OLIVEIRA - 88 99984-5395).
 */
class ModelsFim {

    private $Resultado;
    private $FimId;
    private $Dados;
    private $Mensagem;
    private $RowCount;
    private $ResultadoPaginacao;

    function getMensagem() {
        return $this->Mensagem;
    }

    function getRowCount() {
        return $this->RowCount;
    }

    function getResultado() {
        return $this->Resultado;
    }

    public function listar($pageId = null) {

        $paginacao = new ModelsPaginacao(URL . 'controle-fim/index/');
        $paginacao->condicao($pageId, 5);
        $this->ResultadoPaginacao = $paginacao->paginacao('fins');

        $listarOsFins = new ModelsRead();
        $listarOsFins->ExeRead('fins', 'ORDER BY id DESC LIMIT :limit OFFSET :offset', "limit={$paginacao->getLimiteResultado()}&offset={$paginacao->getOffset()}");

        if ($listarOsFins->getResultado()):
            $this->Resultado = $listarOsFins->getResultado();
            //var_dump($this->Resultado);
            return array($this->Resultado, $this->ResultadoPaginacao);
        else:
            $paginacao->paginaInvalida();
        endif;
    }

    public function cadastrar(array $Dados) {
        $this->Dados = $Dados;
        $this->validarDados();
        if ($this->Resultado):
            $this->inserir();
        endif;
    }

    private function validarDados() {
        $this->Dados = array_map('strip_tags', $this->Dados);
        $this->Dados = array_map('trim', $this->Dados);
        if (in_array('', $this->Dados)):
            $this->Resultado = false;
        else:
            $this->Resultado = true;
        endif;
    }

    private function inserir() {
        $Create = new ModelsCreate();
        var_dump($this->Dados);
        $Create->ExeCreate('fins', $this->Dados);
        if ($Create->getResultado()):
            $this->Resultado = $Create->getResultado();
        endif;
    }

    public function visualizar($FimId) {
        $this->FimId = (int) $FimId;
        $Visulizar = new ModelsRead();
        $Visulizar->ExeRead('fins', 'WHERE id =:id LIMIT :limit', "id={$this->FimId}&limit=1");
        $this->Resultado = $Visulizar->getResultado();
        $this->RowCount = $Visulizar->getRowCount();
        return $this->Resultado;
    }

    public function editar($FimId, array $Dados) {
        $this->FimId = (int) $FimId;
        $this->Dados = $Dados;
        $this->validarDados();
        if ($this->Resultado):
            $this->alterar();
        endif;
    }

    private function alterar() {
        $Update = new ModelsUpdate();
        $Update->ExeUpdate('fins', $this->Dados, 'WHERE id =:id', "id={$this->Dados['id']}");
        if ($Update->getResultado()):
            $this->Resultado = true;
        else:
            $this->Resultado = false;
        endif;
    }

    public function apagar($FimId) {
        $this->FimId = (int) $FimId;
        $this->Dados = $this->visualizar($this->FimId);
        if ($this->getRowCount() >= 0):
            $ApagarFim = new ModelsDelete();
            $ApagarFim->ExeDelete('fins', 'WHERE id =:id', "id={$this->FimId}");
            $this->Resultado = $ApagarFim->getResultado();
            $_SESSION['msg'] = "<div class='alert alert-success'>Finalidade apagado com sucesso!</div>";
        else:
            $_SESSION['msg'] = "<div class='alert alert-success'>Finalidade não foi apagado com sucesso!</div>";
        endif;
    }

}
