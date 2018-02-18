<?php

/**
 * Descricao de ModelsRota
 *
 * @copyright (c) Fev/2018, jgoliveira10474@gmail.com (OLIVEIRA - 88 99984-5395).
 */
class ModelsRota {

    private $Resultado;
    private $RotaId;
    private $Dados;
    private $Mensagem;
    private $RowCount;
    private $ResultadoPaginacao;

    function getResultado() {
        return $this->Resultado;
    }

    function getMensagem() {
        return $this->Mensagem;
    }

    function getRowCount() {
        return $this->RowCount;
    }

    public function listar($pageId) {
        $paginacao = new ModelsPaginacao(URL . 'controle-rota/index/');
        $paginacao->condicao($pageId, 5);

        $this->ResultadoPaginacao = $paginacao->paginacao('rotas');

        $listarAsRotas = new ModelsRead();
        $listarAsRotas->ExeRead('rotas', "ORDER BY id DESC LIMIT :limit OFFSET :offset", "limit={$paginacao->getLimiteResultado()}&offset={$paginacao->getOffset()}");
        if ($listarAsRotas->getResultado()):
            $this->Resultado = $listarAsRotas->getResultado();
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
        //var_dump($this->Dados);
        $criar->ExeCreate('rotas', $this->Dados);
        if ($criar->getResultado()):
            $this->Resultado = $criar->getResultado();
        endif;
    }

    public function visualizar($rotaId) {
        $this->RotaId = (int) $rotaId;
        $visulizarRota = new ModelsRead();
        $visulizarRota->ExeRead('rotas', 'WHERE id =:id LIMIT :limit', "id={$this->RotaId}&limit=1");
        $this->Resultado = $visulizarRota->getResultado();
        $this->RowCount = $visulizarRota->getRowCount();
        return $this->Resultado;
    }

    public function editar($rotaId, array $dados) {
        $this->RotaId = (int) $rotaId;
        $this->Dados = $dados;
        $this->validarDados();
        if ($this->Resultado):
            $this->alterar();
        endif;
    }

    private function alterar() {
        $updateAlterar = new ModelsUpdate();
        $updateAlterar->ExeUpdate('rotas', $this->Dados, 'WHERE id =:id', "id={$this->Dados['id']}");
        if ($updateAlterar->getResultado()):
            $this->Resultado = true;
        else:
            $this->Resultado = false;
        endif;
    }

    public function apagar($rotaId) {
        $this->RotaId = (int) $rotaId;
        $this->Dados = $this->visualizar($this->RotaId);
        if ($this->getRowCount() >= 0):
            $apagarRota = new ModelsDelete();
            $apagarRota->ExeDelete('rotas', 'WHERE id =:id', "id={$this->RotaId}");
            $this->Resultado = $apagarRota->getResultado();
            $_SESSION['msg'] = "<div class='alert alert-success'><b>Rota</b> apagado com sucesso!</div>";
        else:
            $_SESSION['msg'] = "<div class='alert alert-success'>Rota não foi apagado com sucesso!</div>";
        endif;
    }

}
