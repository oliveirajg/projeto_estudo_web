<?php

/**
 * Descricao ModelsPesquisaMandado
 *
 * @copyright (c) Fev/2018, jgoliveira10474@gmail.com (OLIVEIRA - 88 99984-5395).
 */
class ModelsPesquisarMandado {

    private $Resultado;
    private $Dados;
    private $Msg;
    private $RowCount;
    private $ResultadoPaginacao;
    private $PageId;

    function getResultado() {
        return $this->Resultado;
    }

    function getMsg() {
        return $this->Msg;
    }

    function getRowCount() {
        return $this->RowCount;
    }

    public function pesquisarMandados($PageId = null, $Dados = null) {

        $this->PageId = $PageId;
        $this->Dados = $Dados;

        $this->PageId = strip_tags($this->PageId);
        $this->PageId = trim($this->PageId);

        $this->Dados['destinatario'] = strip_tags($this->Dados['destinatario']);
        $this->Dados['destinatario'] = trim($this->Dados['destinatario']);
        $_SESSION['pesquisa_destinatario'] = $this->Dados['destinatario'];
        $this->Dados['processo'] = strip_tags($this->Dados['processo']);
        $this->Dados['processo'] = trim($this->Dados['processo']);
        $_SESSION['pesquisa_processo'] = $this->Dados['processo'];
        $this->Dados['user_id'] = strip_tags($this->Dados['user_id']);
        $this->Dados['user_id'] = trim($this->Dados['user_id']);
        $_SESSION['pesquisa_oficial_id'] = $this->Dados['user_id'];
        $this->Dados['vara_id'] = strip_tags($this->Dados['vara_id']);
        $this->Dados['vara_id'] = trim($this->Dados['vara_id']);
        $_SESSION['pesquisa_vara_id'] = $this->Dados['vara_id'];
        $this->Dados['origem'] = strip_tags($this->Dados['origem']);
        $this->Dados['origem'] = trim($this->Dados['origem']);
        $_SESSION['pesquisa_origem'] = $this->Dados['origem'];
       

        if (!empty($this->Dados['destinatario']) and !empty($this->Dados['processo']) and !empty($this->Dados['user_id']) and !empty($this->Dados['vara_id'])and !empty($this->Dados['origem'])):
            $this->pesquisarMandadosComp();
        elseif (!empty($this->Dados['destinatario'])):
            $this->pesquisarMandadosName();
        elseif (!empty($this->Dados['processo'])):
            $this->pesquisarMandadosProcesso();
        elseif (!empty($this->Dados['user_id'])):
            $this->pesquisarMandadosOficial();
         elseif (!empty($this->Dados['vara_id'])):
            $this->pesquisarMandadosVara();
         elseif (!empty($this->Dados['origem'])):
            $this->pesquisarMandadosOrigem();
        endif;

        return $this->Resultado;
    }

    private function pesquisarMandadosComp() {
        $Paginacao = new ModelsPaginacao(URL . 'controle-mandado/pesquisar-mandado/', 'destinatario=' . $this->Dados['destinatario'], '&processo=' . $this->Dados['processo']);
        $Paginacao->condicao($this->PageId, 50);
        $this->ResultadoPaginacao = $Paginacao->paginacaoFullRead("select mand.*, var.nome_vara varas, fim.nome_fim fins, rot.nome_rota rotas, usu.name users from mandados mand 
            INNER JOIN varas var on var.id = mand.vara_id             
            INNER JOIN fins fim on fim.id = mand.fim_id             
            INNER JOIN rotas rot on rot.id = mand.rota_id             
            INNER JOIN users usu on usu.id = mand.user_id       
                                WHERE destinatario LIKE '%' :destinatario '%' OR 
                                processo LIKE '%' :processo '%' OR
                                user_id LIKE '%' :oficial_id '%' OR
                                origem LIKE '%' :origem '%' OR
                                vara_id LIKE '%' :vara_id '%'", "destinatario={$this->Dados['destinatario']}&processo={$this->Dados['processo']}&oficial_id={$this->Dados['user_id']}&origem={$this->Dados['origem']}&vara_id={$this->Dados['vara_id']}");
        //var_dump($this->ResultadoPaginacao);

        $Listar = new ModelsRead();
        $Listar->fullRead("select mand.*, var.nome_vara varas, fim.nome_fim fins, rot.nome_rota rotas, usu.name users from mandados mand 
            INNER JOIN varas var on var.id = mand.vara_id             
            INNER JOIN fins fim on fim.id = mand.fim_id             
            INNER JOIN rotas rot on rot.id = mand.rota_id             
            INNER JOIN users usu on usu.id = mand.user_id       
                                WHERE destinatario LIKE '%' :destinatario '%' OR 
                                processo LIKE '%' :processo '%' OR 
                                user_id LIKE '%' :oficial_id '%' OR
                                vara_id LIKE '%' :vara_id '%'
                                ORDER BY id DESC LIMIT :limit OFFSET :offset", "destinatario={$this->Dados['destinatario']}&processo={$this->Dados['processo']}&oficial_id={$this->Dados['user_id']}&vara_id={$this->Dados['vara_id']}&limit={$Paginacao->getLimiteResultado()}&offset={$Paginacao->getOffset()}");
        if ($Listar->getResultado()):
            $this->Resultado = $Listar->getResultado();
            //var_dump($this->Resultado);
            $this->Resultado = array($this->Resultado, $this->ResultadoPaginacao);
        else:
            $Paginacao->paginaInvalida();
        endif;
    }

    private function pesquisarMandadosName() {
        $Paginacao = new ModelsPaginacao(URL . 'controle-mandado/pesquisar-mandado/', 'destinatario=' . $this->Dados['destinatario']);
        $Paginacao->condicao($this->PageId, 50);
        $this->ResultadoPaginacao = $Paginacao->paginacaoFullRead("select mand.*, var.nome_vara varas, fim.nome_fim fins, rot.nome_rota rotas, usu.name users from mandados mand 
            INNER JOIN varas var on var.id = mand.vara_id             
            INNER JOIN fins fim on fim.id = mand.fim_id             
            INNER JOIN rotas rot on rot.id = mand.rota_id             
            INNER JOIN users usu on usu.id = mand.user_id       
                                WHERE destinatario LIKE '%' :destinatario '%'", "destinatario={$this->Dados['destinatario']}");
        //var_dump($this->ResultadoPaginacao);

        $Listar = new ModelsRead();
        $Listar->fullRead("select mand.*, var.nome_vara varas, fim.nome_fim fins, rot.nome_rota rotas, usu.name users from mandados mand 
            INNER JOIN varas var on var.id = mand.vara_id             
            INNER JOIN fins fim on fim.id = mand.fim_id             
            INNER JOIN rotas rot on rot.id = mand.rota_id             
            INNER JOIN users usu on usu.id = mand.user_id       
                                WHERE destinatario LIKE '%' :destinatario '%'  
                                ORDER BY id DESC LIMIT :limit OFFSET :offset", "destinatario={$this->Dados['destinatario']}&limit={$Paginacao->getLimiteResultado()}&offset={$Paginacao->getOffset()}");
        if ($Listar->getResultado()):
            $this->Resultado = $Listar->getResultado();
            //var_dump($this->Resultado);
            $this->Resultado = array($this->Resultado, $this->ResultadoPaginacao);
        else:
            $Paginacao->paginaInvalida();
        endif;
    }

    private function pesquisarMandadosProcesso() {
        $Paginacao = new ModelsPaginacao(URL . 'controle-mandado/pesquisar-mandado/', 'processo=' . $this->Dados['processo']);
        $Paginacao->condicao($this->PageId, 50);
        $this->ResultadoPaginacao = $Paginacao->paginacaoFullRead("select mand.*, var.nome_vara varas, fim.nome_fim fins, rot.nome_rota rotas, usu.name users from mandados mand 
            INNER JOIN varas var on var.id = mand.vara_id             
            INNER JOIN fins fim on fim.id = mand.fim_id             
            INNER JOIN rotas rot on rot.id = mand.rota_id             
            INNER JOIN users usu on usu.id = mand.user_id       
                                WHERE processo LIKE '%' :processo '%'", "processo={$this->Dados['processo']}");
        //var_dump($this->ResultadoPaginacao);

        $Listar = new ModelsRead();
        $Listar->fullRead("select mand.*, var.nome_vara varas, fim.nome_fim fins, rot.nome_rota rotas, usu.name users from mandados mand 
            INNER JOIN varas var on var.id = mand.vara_id             
            INNER JOIN fins fim on fim.id = mand.fim_id             
            INNER JOIN rotas rot on rot.id = mand.rota_id             
            INNER JOIN users usu on usu.id = mand.user_id       
                                WHERE processo LIKE '%' :processo '%'  
                                ORDER BY id DESC LIMIT :limit OFFSET :offset", "processo={$this->Dados['processo']}&limit={$Paginacao->getLimiteResultado()}&offset={$Paginacao->getOffset()}");
        if ($Listar->getResultado()):
            $this->Resultado = $Listar->getResultado();
            //var_dump($this->Resultado);
            $this->Resultado = array($this->Resultado, $this->ResultadoPaginacao);
        else:
            $Paginacao->paginaInvalida();
        endif;
    }

    private function pesquisarMandadosOficial() {
        $Paginacao = new ModelsPaginacao(URL . 'controle-mandado/pesquisar-mandado/', 'oficial_id=' . $this->Dados['user_id']);
        $Paginacao->condicao($this->PageId, 50);
        $this->ResultadoPaginacao = $Paginacao->paginacaoFullRead("select mand.*, var.nome_vara varas, fim.nome_fim fins, rot.nome_rota rotas, usu.name users from mandados mand 
            INNER JOIN varas var on var.id = mand.vara_id             
            INNER JOIN fins fim on fim.id = mand.fim_id             
            INNER JOIN rotas rot on rot.id = mand.rota_id             
            INNER JOIN users usu on usu.id = mand.user_id       
                                WHERE name LIKE '%' :oficial_id '%'", "oficial_id={$this->Dados['user_id']}");
        //var_dump($this->ResultadoPaginacao);

        $Listar = new ModelsRead();
        $Listar->fullRead("select mand.*, var.nome_vara varas, fim.nome_fim fins, rot.nome_rota rotas, usu.name users from mandados mand 
            INNER JOIN varas var on var.id = mand.vara_id             
            INNER JOIN fins fim on fim.id = mand.fim_id             
            INNER JOIN rotas rot on rot.id = mand.rota_id             
            INNER JOIN users usu on usu.id = mand.user_id       
                                WHERE name LIKE '%' :oficial_id '%'  
                                ORDER BY id DESC LIMIT :limit OFFSET :offset", "oficial_id={$this->Dados['user_id']}&limit={$Paginacao->getLimiteResultado()}&offset={$Paginacao->getOffset()}");
        if ($Listar->getResultado()):
            $this->Resultado = $Listar->getResultado();
            //var_dump($this->Resultado);
            $this->Resultado = array($this->Resultado, $this->ResultadoPaginacao);
        else:
            $Paginacao->paginaInvalida();
        endif;
    }
    
     private function pesquisarMandadosVara() {
        $Paginacao = new ModelsPaginacao(URL . 'controle-mandado/pesquisar-mandado/', 'vara_id=' . $this->Dados['vara_id']);
        $Paginacao->condicao($this->PageId, 50);
        $this->ResultadoPaginacao = $Paginacao->paginacaoFullRead("select mand.*, var.nome_vara varas, fim.nome_fim fins, rot.nome_rota rotas, usu.name users from mandados mand 
            INNER JOIN varas var on var.id = mand.vara_id             
            INNER JOIN fins fim on fim.id = mand.fim_id             
            INNER JOIN rotas rot on rot.id = mand.rota_id             
            INNER JOIN users usu on usu.id = mand.user_id       
                                WHERE nome_vara LIKE '%' :vara_id '%'", "vara_id={$this->Dados['vara_id']}");
        //var_dump($this->ResultadoPaginacao);

        $Listar = new ModelsRead();
        $Listar->fullRead("select mand.*, var.nome_vara varas, fim.nome_fim fins, rot.nome_rota rotas, usu.name users from mandados mand 
            INNER JOIN varas var on var.id = mand.vara_id             
            INNER JOIN fins fim on fim.id = mand.fim_id             
            INNER JOIN rotas rot on rot.id = mand.rota_id             
            INNER JOIN users usu on usu.id = mand.user_id       
                                WHERE nome_vara LIKE '%' :vara_id '%'  
                                ORDER BY id DESC LIMIT :limit OFFSET :offset", "vara_id={$this->Dados['vara_id']}&limit={$Paginacao->getLimiteResultado()}&offset={$Paginacao->getOffset()}");
        if ($Listar->getResultado()):
            $this->Resultado = $Listar->getResultado();
            //var_dump($this->Resultado);
            $this->Resultado = array($this->Resultado, $this->ResultadoPaginacao);
        else:
            $Paginacao->paginaInvalida();
        endif;
    }   
    
     private function pesquisarMandadosOrigem() {
        $Paginacao = new ModelsPaginacao(URL . 'controle-mandado/pesquisar-mandado/', 'origem=' . $this->Dados['origem']);
        $Paginacao->condicao($this->PageId, 50);
        $this->ResultadoPaginacao = $Paginacao->paginacaoFullRead("select mand.*, var.nome_vara varas, fim.nome_fim fins, rot.nome_rota rotas, usu.name users from mandados mand 
            INNER JOIN varas var on var.id = mand.vara_id             
            INNER JOIN fins fim on fim.id = mand.fim_id             
            INNER JOIN rotas rot on rot.id = mand.rota_id             
            INNER JOIN users usu on usu.id = mand.user_id       
                                WHERE origem LIKE '%' :origem '%'", "origem={$this->Dados['origem']}");
        //var_dump($this->ResultadoPaginacao);

        $Listar = new ModelsRead();
        $Listar->fullRead("select mand.*, var.nome_vara varas, fim.nome_fim fins, rot.nome_rota rotas, usu.name users from mandados mand 
            INNER JOIN varas var on var.id = mand.vara_id             
            INNER JOIN fins fim on fim.id = mand.fim_id             
            INNER JOIN rotas rot on rot.id = mand.rota_id             
            INNER JOIN users usu on usu.id = mand.user_id       
                                WHERE origem LIKE '%' :origem '%'  
                                ORDER BY id DESC LIMIT :limit OFFSET :offset", "origem={$this->Dados['origem']}&limit={$Paginacao->getLimiteResultado()}&offset={$Paginacao->getOffset()}");
        if ($Listar->getResultado()):
            $this->Resultado = $Listar->getResultado();
            //var_dump($this->Resultado);
            $this->Resultado = array($this->Resultado, $this->ResultadoPaginacao);
        else:
            $Paginacao->paginaInvalida();
        endif;
    }   

}
