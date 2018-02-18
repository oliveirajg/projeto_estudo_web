<?php

/**
 * Descricao de ModelsVara
 *
 * @copyright (c) Fev/2018, jgoliveira10474@gmail.com (OLIVEIRA - 88 99984-5395).
 */
class ModelsVara {

    private $Resultado;
    private $VaraId;
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
        $paginacao = new ModelsPaginacao(URL . 'controle-vara/index/');
        $paginacao->condicao($pageId, 10);

        $this->ResultadoPaginacao = $paginacao->paginacao('varas');

        $listarAsSecretarias = new ModelsRead();
        $listarAsSecretarias->ExeRead('varas', "ORDER BY id ASC LIMIT :limit OFFSET :offset", "limit={$paginacao->getLimiteResultado()}&offset={$paginacao->getOffset()}");
        if ($listarAsSecretarias->getResultado()):
            $this->Resultado = $listarAsSecretarias->getResultado();
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
        $criar->ExeCreate('varas', $this->Dados);
        if ($criar->getResultado()):
            $this->Resultado = $criar->getResultado();
        endif;
    }

    public function visualizar($varaId) {
        $this->VaraId = (int) $varaId;
        $visulizarSec = new ModelsRead();
        $visulizarSec->ExeRead('varas', 'WHERE id =:id LIMIT :limit', "id={$this->VaraId}&limit=1");
        $this->Resultado = $visulizarSec->getResultado();
        $this->RowCount = $visulizarSec->getRowCount();
        return $this->Resultado;
    }

    public function editar($varaId, array $dados) {
        $this->VaraId = (int) $varaId;
        $this->Dados = $dados;
        $this->validarDados();
        if ($this->Resultado):
            $this->alterar();
        endif;
    }

    private function alterar() {
        $updateAlterar = new ModelsUpdate();
        $updateAlterar->ExeUpdate('varas', $this->Dados, 'WHERE id =:id', "id={$this->Dados['id']}");
        if ($updateAlterar->getResultado()):
            $this->Resultado = true;
        else:
            $this->Resultado = false;
        endif;
    }

    public function apagar($varaId) {
        $this->VaraId = (int) $varaId;
        $this->Dados = $this->visualizar($this->VaraId);
        if ($this->getRowCount() >= 0):
            $apagarSecretaria = new ModelsDelete();
            $apagarSecretaria->ExeDelete('varas', 'WHERE id =:id', "id={$this->VaraId}");
            $this->Resultado = $apagarSecretaria->getResultado();
            $_SESSION['msg'] = "<div class='alert alert-success'><b>Secretaria</b> apagado com sucesso!</div>";
        else:
            $_SESSION['msg'] = "<div class='alert alert-success'>Secretaria não foi apagado com sucesso!</div>";
        endif;
    }

}
