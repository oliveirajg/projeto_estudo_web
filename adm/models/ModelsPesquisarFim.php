<?php

/**
 * Descricao de ModelsPesquisarFim
 *
 * @copyright (c) Fev/2018, jgoliveira10474@gmail.com (OLIVEIRA - 88 99984-5395).
 */
class ModelsPesquisarFim {

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

        $this->Dados['nome_fim'] = strip_tags($this->Dados['nome_fim']);
        $this->Dados['nome_fim'] = trim($this->Dados['nome_fim']);
        $_SESSION['pesquisa_fim'] = $this->Dados['nome_fim'];

        if (!empty($this->Dados['nome_fim'])):
            $this->pesquisarFim();        
        endif;

        return $this->Resultado;
    }

    private function pesquisarFim() {
        $Paginacao = new ModelsPaginacao(URL . 'controle-fim/pesquisar-fim/', 'nome_fim=' . $this->Dados['nome_fim']);
        $Paginacao->condicao($this->PageId, 10);
        $this->ResultadoPaginacao = $Paginacao->paginacaoFullRead("SELECT id
				FROM fins
                                WHERE nome_fim LIKE '%' :nome_fim '%'", "nome_fim={$this->Dados['nome_fim']}");
        //var_dump($this->ResultadoPaginacao);

        $Listar = new ModelsRead();
        $Listar->fullRead("SELECT id, nome_fim 
				FROM fins
                                WHERE nome_fim LIKE '%' :nome_fim '%' 
                                ORDER BY id DESC LIMIT :limit OFFSET :offset", "nome_fim={$this->Dados['nome_fim']}&limit={$Paginacao->getLimiteResultado()}&offset={$Paginacao->getOffset()}");
        if ($Listar->getResultado()):
            $this->Resultado = $Listar->getResultado();
            //var_dump($this->Resultado);
            $this->Resultado = array($this->Resultado, $this->ResultadoPaginacao);
        else:
            $Paginacao->paginaInvalida();
        endif;
    }


}
