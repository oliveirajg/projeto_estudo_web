<?php

/**
 * Descricao de ModelsMandado
 *
 * @copyright (c) Fev/2018, jgoliveira10474@gmail.com (OLIVEIRA - 88 99984-5395).
 */
class ModelsMandado {

    private $MandadoId;
    private $Dados;
    private $RowCount;
    private $ResultadoPaginacao;
    private $Mensagem;
    private $Resultado;

    const Entity = 'mandados';

    function getRowCount() {
        return $this->RowCount;
    }

    function getMensagem() {
        return $this->Mensagem;
    }

    function getResultado() {
        return $this->Resultado;
    }

    public function listar($pageId = null) {

        $paginacao = new ModelsPaginacao(URL . 'controle-mandado/index/');
        $paginacao->condicao($pageId, 10);

        $this->ResultadoPaginacao = $paginacao->paginacao('mandados');
        //var_dump($this->ResultadoPaginacao);

        $listarMandados = new ModelsRead();
        //$listarMandados->ExeRead('mandados', "LIMIT :limit OFFSET :offset", "limit={$paginacao->getLimiteResultado()}&offset={$paginacao->getOffset()}");

        $listarMandados->fullRead("select mand.*, var.nome_vara varas, fim.nome_fim fins, rot.nome_rota rotas, usu.name users from mandados mand 
            INNER JOIN varas var on var.id = mand.vara_id             
            INNER JOIN fins fim on fim.id = mand.fim_id             
            INNER JOIN rotas rot on rot.id = mand.rota_id             
            INNER JOIN users usu on usu.id = mand.user_id             
            ORDER BY id DESC LIMIT :limit OFFSET :offset", "limit={$paginacao->getLimiteResultado()}&offset={$paginacao->getOffset()}");

        if ($listarMandados->getResultado()):
            $this->Resultado = $listarMandados->getResultado();
            //var_dump($this->Rsultado);
            return array($this->Resultado, $this->ResultadoPaginacao);
        else:
            //echo "Nenhum mandado encontrado<br>";
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
        $criar = new ModelsCreate;
        $criar->ExeCreate(self::Entity, $this->Dados);
        if ($criar->getResultado()):
            $this->Resultado = $criar->getResultado();
        endif;
    }

    public function listarCadastrar() {
        $Listar = new ModelsRead();
        $Listar->ExeRead("varas");
        $vara = $Listar->getResultado();
        //var_dump($vara);
        $Listar->ExeRead("fins");
        $finalidade = $Listar->getResultado();
        //var_dump($finalidade);
        $Listar->ExeRead("rotas");
        $rota = $Listar->getResultado();
        //var_dump($rota);
        $Listar->ExeRead("users");
        $oficial = $Listar->getResultado();
        //var_dump($oficial);
        $this->Resultado = array($vara, $finalidade, $rota, $oficial);
        //var_dump($this->Resultado);
        return $this->Resultado;
    }

    public function visualizar($MandadoId) {
        $this->MandadoId = (int) $MandadoId;
        $Visualizar = new ModelsRead();

        //$Visualizar->ExeRead('mandados', 'WHERE id =:id LIMIT :limit', "id={$this->MandadoId}&limit=1");

        $Visualizar->fullRead("select mand.*, var.nome_vara varas, fim.nome_fim fins, rot.nome_rota rotas, usu.name users from mandados mand 
            INNER JOIN varas var on var.id = mand.vara_id             
            INNER JOIN fins fim on fim.id = mand.fim_id             
            INNER JOIN rotas rot on rot.id = mand.rota_id             
            INNER JOIN users usu on usu.id = mand.user_id     
            WHERE mand.id =:id LIMIT :limit", "id={$this->MandadoId}&limit=1");
            
        //var_dump($Visualizar->getResultado());
        //$this->devolutivas();

        $this->Resultado = $Visualizar->getResultado();
        $this->RowCount = $Visualizar->getRowCount();
        //return array($this->Resultado, $this->ResltDevolutivas);
        return $this->Resultado;
    }

    public function editar($MandadoId, array $Dados) {
        $this->MandadoId = (int) $MandadoId;
        $this->Dados = $Dados;

        $this->validarDados();
        if ($this->Resultado):
            $this->alterar();
        endif;
    }

    private function alterar() {
        $Update = new ModelsUpdate();
        $Update->ExeUpdate(self::Entity, $this->Dados, "WHERE id = :id", "id={$this->MandadoId }");
        if ($Update->getResultado()):
            $this->Resultado = true;
        else:
            $this->Resultado = false;
        endif;
    }

    public function apagar($MandadoId) {
        $this->Dados = $this->visualizar($MandadoId);
        var_dump($this->Dados);
        if ($this->getRowCount() > 0):
            echo "O mandado existe: {$this->getRowCount()}<br>";
            $ApagarMandado = new ModelsDelete();
            $ApagarMandado->ExeDelete('mandados', 'WHERE id = :id', "id=$MandadoId");
            $this->Resultado = $ApagarMandado->getResultado();
            $_SESSION['msg'] = "<div class='alert alert-success'>Mandado apagado com sucesso.</div>";
        else:
            $_SESSION['msg'] = "<div class='alert alert-danger'>Não foi encontrado o mandado.</div>";
        endif;
    }

}
