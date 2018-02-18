<?php

//referenciar o DomPDF com namespace
use Dompdf\Dompdf;

/**
 * Descricao 
 *
 * @copyright (c) Fev/2018, jgoliveira10474@gmail.com (OLIVEIRA - 88 99984-5395).
 */
class ModelsGerarPdfMandado {

    private $Resultado;
    private $Dados;
    private $Msg;
    private $RowCount;
    private $ConteudoPdf;

    function getResultado() {
        return $this->Resultado;
    }

    function getMsg() {
        return $this->Msg;
    }

    function getRowCount() {
        return $this->RowCount;
    }

    public function gerarPdf() {

        $this->Dados['destinatario'] = $_SESSION['pesquisa_destinatario'];
        $this->Dados['processo'] = $_SESSION['pesquisa_processo'];
        $this->Dados['user_id'] = $_SESSION['pesquisa_oficial_id'];
        $this->Dados['vara_id'] = $_SESSION['pesquisa_vara_id'];

        if (!empty($this->Dados['destinatario']) and ! empty($this->Dados['processo']) and ! empty($this->Dados['user_id'])and ! empty($this->Dados['vara_id'])):
            $this->pesquisarMandadosComp();
        elseif (!empty($this->Dados['destinatario'])):
            $this->pesquisarMandadosName();
        elseif (!empty($this->Dados['processo'])):
            $this->pesquisarMandadosEmail();
        elseif (!empty($this->Dados['user_id'])):
            $this->pesquisarMandadosOrigem();
         elseif (!empty($this->Dados['vara_id'])):
            $this->pesquisarMandadosVara();
        endif;

        if ($this->Resultado):
            $this->imprimirDadosPdf();
        endif;
    }

    private function pesquisarMandadosComp() {

        $Listar = new ModelsRead();
        $Listar->fullRead("select mand.*, var.nome_vara varas, fim.nome_fim fins, rot.nome_rota rotas, usu.name users from mandados mand 
            INNER JOIN varas var on var.id = mand.vara_id             
            INNER JOIN fins fim on fim.id = mand.fim_id             
            INNER JOIN rotas rot on rot.id = mand.rota_id             
            INNER JOIN users usu on usu.id = mand.user_id             
                                WHERE destinatario LIKE '%' :parte '%' OR 
                                processo LIKE '%' :processo '%' OR 
                                user_id LIKE '%' :oficial_id '%' OR  
                                vara_id LIKE '%' :vara_id '%'  
                                ORDER BY id DESC", "parte={$this->Dados['destinatario']}&processo={$this->Dados['processo']}&oficial_id={$this->Dados['user_id']}&vara_id={$this->Dados['vara_id']}");
        if ($Listar->getResultado()):
            $this->Resultado = $Listar->getResultado();
        else:
            echo "Nenhum valor encontrado";
            $this->Resultado = false;
        endif;
    }

    private function pesquisarMandadosName() {

        $Listar = new ModelsRead();
        $Listar->fullRead("select mand.*, var.nome_vara varas, fim.nome_fim fins, rot.nome_rota rotas, usu.name users from mandados mand 
            INNER JOIN varas var on var.id = mand.vara_id             
            INNER JOIN fins fim on fim.id = mand.fim_id             
            INNER JOIN rotas rot on rot.id = mand.rota_id             
            INNER JOIN users usu on usu.id = mand.user_id             
                                WHERE destinatario LIKE '%' :parte '%'  
                                ORDER BY id DESC", "parte={$this->Dados['destinatario']}");
        if ($Listar->getResultado()):
            $this->Resultado = $Listar->getResultado();
        else:
            echo "Nenhum valor encontrado";
            $this->Resultado = false;
        endif;
    }

    private function pesquisarMandadosEmail() {
        $Listar = new ModelsRead();
        $Listar->fullRead("select mand.*, var.nome_vara varas, fim.nome_fim fins, rot.nome_rota rotas, usu.name users from mandados mand 
            INNER JOIN varas var on var.id = mand.vara_id             
            INNER JOIN fins fim on fim.id = mand.fim_id             
            INNER JOIN rotas rot on rot.id = mand.rota_id             
            INNER JOIN users usu on usu.id = mand.user_id             
                                WHERE processo LIKE '%' :processo '%'  
                                ORDER BY id DESC", "processo={$this->Dados['processo']}");
        if ($Listar->getResultado()):
            $this->Resultado = $Listar->getResultado();
        else:
            echo "Nenhum valor encontrado";
            $this->Resultado = false;
        endif;
    }

    private function pesquisarMandadosOrigem() {
        $Listar = new ModelsRead();
        $Listar->fullRead("select mand.*, var.nome_vara varas, fim.nome_fim fins, rot.nome_rota rotas, usu.name users from mandados mand 
            INNER JOIN varas var on var.id = mand.vara_id             
            INNER JOIN fins fim on fim.id = mand.fim_id             
            INNER JOIN rotas rot on rot.id = mand.rota_id             
            INNER JOIN users usu on usu.id = mand.user_id             
                                WHERE name LIKE '%' :oficial_id '%'  
                                ORDER BY id DESC", "oficial_id={$this->Dados['user_id']}");
        if ($Listar->getResultado()):
            $this->Resultado = $Listar->getResultado();
        else:
            echo "Nenhum valor encontrado";
            $this->Resultado = false;
        endif;
    }
    
     private function pesquisarMandadosVara() {
        $Listar = new ModelsRead();
        $Listar->fullRead("select mand.*, var.nome_vara varas, fim.nome_fim fins, rot.nome_rota rotas, usu.name users from mandados mand 
            INNER JOIN varas var on var.id = mand.vara_id             
            INNER JOIN fins fim on fim.id = mand.fim_id             
            INNER JOIN rotas rot on rot.id = mand.rota_id             
            INNER JOIN users usu on usu.id = mand.user_id             
                                WHERE nome_vara LIKE '%' :vara_id '%'  
                                ORDER BY id DESC", "vara_id={$this->Dados['vara_id']}");
        if ($Listar->getResultado()):
            $this->Resultado = $Listar->getResultado();
        else:
            echo "Nenhum valor encontrado";
            $this->Resultado = false;
        endif;
    }

    private function imprimirDadosPdf() {

        $this->tabelaDados();

        require ('assets/lib/dompdf/autoload.inc.php');

        //Criando a Instancia
        $dompdf = new DOMPDF();

        // Carrega seu HTML
        $dompdf->load_html('
			<h1 style="text-align: center;">COMAN - Relatório dos Mandados</h1>
			' . $this->ConteudoPdf . '
		');

        //Renderizar o html
        $dompdf->render();

        //Exibibir a página
        $dompdf->stream(
                "relatorio_coman.pdf", array(
            "Attachment" => false //Para realizar o download somente alterar para true
                )
        );
    }

    //Criar tabela com os dados do banco de dados
    private function tabelaDados() {
        $this->ConteudoPdf = '<table border=1';
        $this->ConteudoPdf .= '<thead>';
        $this->ConteudoPdf .= '<tr>';
        $this->ConteudoPdf .= '<th>ID</th>';
        $this->ConteudoPdf .= '<th>Nome da Parte</th>';
        $this->ConteudoPdf .= '<th>Processo</th>';
        $this->ConteudoPdf .= '<th>Origem</th>';
        $this->ConteudoPdf .= '<th>Vara</th>';
        $this->ConteudoPdf .= '<th>Oficial</th>';
        $this->ConteudoPdf .= '<th>Rota</th>';        
        $this->ConteudoPdf .= '<th>Cadastro</th>';        
        $this->ConteudoPdf .= '</tr>';
        $this->ConteudoPdf .= '</thead>';
        $this->ConteudoPdf .= '<tbody>';
        foreach ($this->Resultado as $key => $workshop) :
            extract($workshop);

            $this->ConteudoPdf .= '<tr><td>' . $this->Resultado[$key]['id'] . "</td>";
            $this->ConteudoPdf .= '<td>' . $this->Resultado[$key]['destinatario'] . "</td>";
            $this->ConteudoPdf .= '<td>' . $this->Resultado[$key]['processo'] . "</td>";
            $this->ConteudoPdf .= '<td>' . $this->Resultado[$key]['origem'] . "</td>";
            $this->ConteudoPdf .= '<td>' . $this->Resultado[$key]['varas'] . "</td>";
            $this->ConteudoPdf .= '<td>' . $this->Resultado[$key]['users'] . "</td>";
            $this->ConteudoPdf .= '<td>' . $this->Resultado[$key]['rotas'] . "</td>";
            $this->ConteudoPdf .= '<td>' . $this->Resultado[$key]['created'] . "</td></tr>";

        endforeach;
        $this->ConteudoPdf .= '</tbody>';
        $this->ConteudoPdf .= '</table';
    }

}
