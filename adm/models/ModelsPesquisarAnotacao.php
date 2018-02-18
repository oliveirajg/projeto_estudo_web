<?php

/**
 * Descricao de ModelsPesquisarAnotacao
 *
 * @copyright (c) Fev/2018, jgoliveira10474@gmail.com (OLIVEIRA - 88 99984-5395).
 */
class ModelsPesquisarAnotacao {

    private $Resultado;
    private $Dados;
    private $Mensagem;
    private $RowCount;
    private $ResultadoPaginacao;
    private $PageId;

    function getResultado() {
        return $this->Resultado;
    }

    function getMensagem() {
        return $this->Mensagem;
    }

    function getRowCount() {
        return $this->RowCount;
    }

    public function pesquisar($PageId = null, $Dados = null) {

        $this->PageId = $PageId;
        $this->Dados = $Dados;

        $this->PageId = strip_tags($this->PageId);
        $this->PageId = trim($this->PageId);

        $this->Dados['nome_destinatario'] = strip_tags($this->Dados['nome_destinatario']);
        $this->Dados['nome_destinatario'] = trim($this->Dados['nome_destinatario']);
        $_SESSION['pesquisa_anotacao'] = $this->Dados['nome_destinatario'];
        $this->Dados['observacoes'] = strip_tags($this->Dados['observacoes']);
        $this->Dados['observacoes'] = trim($this->Dados['observacoes']);
        $_SESSION['pesquisa_obs'] = $this->Dados['observacoes'];

        if (!empty($this->Dados['nome_destinatario']) and ! empty($this->Dados['observacoes'])):
            $this->pesquisarAnotacoesGeral();
        elseif (!empty($this->Dados['nome_destinatario'])):
            $this->pesquisarAnotacoesDestinatario();
        elseif (!empty($this->Dados['observacoes'])):
            $this->pesquisarAnotacoesObservacoes();
        endif;

        return $this->Resultado;
    }

    private function pesquisarAnotacoesGeral() {
        $Paginacao = new ModelsPaginacao(URL . 'controle-anotacao/pesquisar-diversos/', 'nome_destinatario=' . $this->Dados['nome_destinatario'], '&observacoes=' . $this->Dados['observacoes']);
        $Paginacao->condicao($this->PageId, 50);
        $this->ResultadoPaginacao = $Paginacao->paginacaoFullRead("SELECT id
				FROM anotacoes
                                WHERE nome_destinatario LIKE '%' :name '%' OR 
                                observacoes LIKE '%' :obs '%'", "name={$this->Dados['nome_destinatario']}&obs={$this->Dados['observacoes']}");
        //var_dump($this->ResultadoPaginacao);

        $Listar = new ModelsRead();
        $Listar->fullRead("SELECT id, nome_destinatario, observacoes 
				FROM anotacoes
                                WHERE nome_destinatario LIKE '%' :name '%' OR 
                                observacoes LIKE '%' :obs '%'  
                                ORDER BY id DESC LIMIT :limit OFFSET :offset", "name={$this->Dados['nome_destinatario']}&obs={$this->Dados['observacoes']}&limit={$Paginacao->getLimiteResultado()}&offset={$Paginacao->getOffset()}");
        if ($Listar->getResultado()):
            $this->Resultado = $Listar->getResultado();
            //var_dump($this->Resultado);
            $this->Resultado = array($this->Resultado, $this->ResultadoPaginacao);
        else:
            $Paginacao->paginaInvalida();
        endif;
    }

    private function pesquisarAnotacoesDestinatario() {
        $Paginacao = new ModelsPaginacao(URL . 'controle-anotacao/pesquisar-diversos/', 'nome_destinatario=' . $this->Dados['nome_destinatario']);
        $Paginacao->condicao($this->PageId, 50);
        $this->ResultadoPaginacao = $Paginacao->paginacaoFullRead("SELECT id
				FROM anotacoes
                                WHERE nome_destinatario LIKE '%' :name '%'", "name={$this->Dados['nome_destinatario']}");
        //var_dump($this->ResultadoPaginacao);

        $Listar = new ModelsRead();
        $Listar->fullRead("SELECT id, nome_destinatario, observacoes 
				FROM anotacoes
                                WHERE nome_destinatario LIKE '%' :name '%'  
                                ORDER BY id DESC LIMIT :limit OFFSET :offset", "name={$this->Dados['nome_destinatario']}&limit={$Paginacao->getLimiteResultado()}&offset={$Paginacao->getOffset()}");
        if ($Listar->getResultado()):
            $this->Resultado = $Listar->getResultado();
            //var_dump($this->Resultado);
            $this->Resultado = array($this->Resultado, $this->ResultadoPaginacao);
        else:
            $Paginacao->paginaInvalida();
        endif;
    }

    private function pesquisarAnotacoesObservacoes() {
        $Paginacao = new ModelsPaginacao(URL . 'controle-anotacoes/pesquisar-diversos/', 'observacoes=' . $this->Dados['observacoes']);
        $Paginacao->condicao($this->PageId, 50);
        $this->ResultadoPaginacao = $Paginacao->paginacaoFullRead("SELECT id
				FROM anotacoes
                                WHERE observacoes LIKE '%' :obs '%'", "obs={$this->Dados['observacoes']}");
        //var_dump($this->ResultadoPaginacao);

        $Listar = new ModelsRead();
        $Listar->fullRead("SELECT id, nome_destinatario, observacoes 
				FROM anotacoes
                                WHERE observacoes LIKE '%' :obs '%'  
                                ORDER BY id DESC LIMIT :limit OFFSET :offset", "obs={$this->Dados['observacoes']}&limit={$Paginacao->getLimiteResultado()}&offset={$Paginacao->getOffset()}");
        if ($Listar->getResultado()):
            $this->Resultado = $Listar->getResultado();
            //var_dump($this->Resultado);
            $this->Resultado = array($this->Resultado, $this->ResultadoPaginacao);
        else:
            $Paginacao->paginaInvalida();
        endif;
    }

}
