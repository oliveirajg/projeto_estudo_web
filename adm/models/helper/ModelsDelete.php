<?php

/**
 * Descricao de Creat.class
 *
 * @copyright (c) Fev/2018, jgoliveira10474@gmail.com (OLIVEIRA - 88 99984-5395).
 */
class ModelsDelete extends ModelsConn {

    private $Tabela;
    private $Termos;
    private $Values;
    
    private $Resultado;
    private $Msg;
    
    private $Query;
    private $Conn;
    
    public function ExeDelete($Tabela, $Termos, $ParseString) {
        $this->Tabela = (string) $Tabela;
        $this->Termos = (string) $Termos;
        
        parse_str($ParseString, $this->Values);
        
        $this->getInstrucao();
        $this->ExecutarInstrucao();
    }
    
    public function getResultado() {
        return $this->Resultado;
    }
    
    public function getMsg() {
        return $this->Msg;
    }
    
    public function getRowCount() {
        return $this->Query->rowCount();
    }
    
    private function Conexao() {
        $this->Conn = parent::getConn();
        $this->Query = $this->Conn->prepare($this->Query);
    }
    
    private function getInstrucao() {
        $this->Query = "DELETE FROM {$this->Tabela} {$this->Termos}";
    }
    
    private function ExecutarInstrucao() {
        $this->Conexao();
        try {
            $this->Query->execute($this->Values);
            $this->Resultado = true;
            $this->Msg = "<b>Sucesso: </b>Usuário apagado";
        } catch (Exception $e) {
            $this->Resultado = null;
            $this->Msg = "<b>Erro ao apagar: </b> {$e->getMessage()}";
        }
    }
}
