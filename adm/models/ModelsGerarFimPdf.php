<?php

//referenciar o DomPDF com namespace
use Dompdf\Dompdf;

/**
 * Descricao 
 *
 * @copyright (c) Fev/2018, jgoliveira10474@gmail.com (OLIVEIRA - 88 99984-5395).
 */
class ModelsGerarFimPdf {

    private $Resultado;
    private $Dados;
    private $Mensagem;
    private $RowCount;
    private $ConteudoPdf;

    function getResultado() {
        return $this->Resultado;
    }

    function getMensagem() {
        return $this->Mensagem;
    }

    function getRowCount() {
        return $this->RowCount;
    }

    public function gerarPdf() {

        $this->Dados['nome_fim'] = $_SESSION['pesquisa_fim'];

        if (!empty($this->Dados['nome_fim'])):
            $this->pesquisarAsFinalidades();
        endif;

        if ($this->Resultado):
            $this->imprimirDadosPdf();
        endif;
    }

    private function pesquisarAsFinalidades() {

        $Listar = new ModelsRead();
        $Listar->fullRead("SELECT * From fins
                                WHERE nome_fim LIKE '%' :name '%' 
                                ORDER BY id DESC", "name={$this->Dados['nome_fim']}");
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
			<h1 style="text-align: center;">COMAN - Relatório das Finalidades</h1>
			' . $this->ConteudoPdf . '
		');

        //Renderizar o html
        $dompdf->render();

        //Exibibir a página
        $dompdf->stream(
                "relatorio_oliveira.pdf", array(
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
        $this->ConteudoPdf .= '<th>Nome</th>';
        $this->ConteudoPdf .= '<th>Created</th>';
        $this->ConteudoPdf .= '<th>Modified</th>';
        $this->ConteudoPdf .= '</tr>';
        $this->ConteudoPdf .= '</thead>';
        $this->ConteudoPdf .= '<tbody>';
        foreach ($this->Resultado as $key => $workshop) :
            extract($workshop);

            $this->ConteudoPdf .= '<tr><td>' . $this->Resultado[$key]['id'] . "</td>";
            $this->ConteudoPdf .= '<td>' . $this->Resultado[$key]['nome_fim'] . "</td>";
            $this->ConteudoPdf .= '<td>' . $this->Resultado[$key]['created'] . "</td>";
            $this->ConteudoPdf .= '<td>' . $this->Resultado[$key]['modified'] . "</td></tr>";

        endforeach;
        $this->ConteudoPdf .= '</tbody>';
        $this->ConteudoPdf .= '</table';
    }

}
