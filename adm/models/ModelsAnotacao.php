<?php

/**
 * Descricao de ModelsAnotacao
 *
 * @copyright (c) Fev/2018, jgoliveira10474@gmail.com (OLIVEIRA - 88 99984-5395).
 */
class ModelsAnotacao {

    private $Resultado;
    private $AnotacaoId;
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

        $paginacao = new ModelsPaginacao(URL . 'controle-anotacao/index/');
        $paginacao->condicao($pageId, 5);
        $this->ResultadoPaginacao = $paginacao->paginacao('anotacoes');

        $listarAsAnotacoes = new ModelsRead();
        $listarAsAnotacoes->ExeRead('anotacoes', 'ORDER BY id DESC LIMIT :limit OFFSET :offset', "limit={$paginacao->getLimiteResultado()}&offset={$paginacao->getOffset()}");

        if ($listarAsAnotacoes->getResultado()):
            $this->Resultado = $listarAsAnotacoes->getResultado();
            //var_dump($this->Resultado);
            return array($this->Resultado, $this->ResultadoPaginacao);
        else:
            $paginacao->paginaInvalida();
        endif;
    }

    public function cadastrar(array $dados) {
        $this->Dados = $dados;
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
        $criar = new ModelsCreate();
        var_dump($this->Dados);
        $criar->ExeCreate('anotacoes', $this->Dados);
        if ($criar->getResultado()):
            $this->Resultado = $criar->getResultado();
        endif;
    }

    public function visualizar($AnotacaoId) {
        $this->AnotacaoId = (int) $AnotacaoId;
        $Visulizar = new ModelsRead();
        $Visulizar->ExeRead('anotacoes', 'WHERE id =:id LIMIT :limit', "id={$this->AnotacaoId}&limit=1");
        $this->Resultado = $Visulizar->getResultado();
        $this->RowCount = $Visulizar->getRowCount();
        return $this->Resultado;
    }

    public function editar($AnotacaoId, array $Dados) {
        $this->AnotacaoId = (int) $AnotacaoId;
        $this->Dados = $Dados;
        $this->validarDados();
        if ($this->Resultado):
            $this->alterar();
        endif;
    }

    private function alterar() {
        $Update = new ModelsUpdate();
        $Update->ExeUpdate('anotacoes', $this->Dados, 'WHERE id =:id', "id={$this->Dados['id']}");
        if ($Update->getResultado()):
            $this->Resultado = true;
        else:
            $this->Resultado = false;
        endif;
    }

    public function apagar($AnotacaoId) {
        $this->AnotacaoId = (int) $AnotacaoId;
        $this->Dados = $this->visualizar($this->AnotacaoId);
        if ($this->getRowCount() >= 0):
            $apagarAnotacao = new ModelsDelete();
            $apagarAnotacao->ExeDelete('anotacoes', 'WHERE id =:id', "id={$this->AnotacaoId}");
            $this->Resultado = $apagarAnotacao->getResultado();
            $_SESSION['msg'] = "<div class='alert alert-success'><b>Anotação</b> apagada com sucesso!</div>";
        else:
            $_SESSION['msg'] = "<div class='alert alert-success'>Anotação não foi apagado com sucesso!</div>";
        endif;
    }

}
