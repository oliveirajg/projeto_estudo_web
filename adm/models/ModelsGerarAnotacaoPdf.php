<?php

//referenciar o DomPDF com namespace
use Dompdf\Dompdf;

/**
 * Descricao de ModelsGerarAnotacaoPdf
 *
 * @copyright (c) Fev/2018, jgoliveira10474@gmail.com (OLIVEIRA - 88 99984-5395).
 */
class ModelsGerarAnotacaoPdf {

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

        $this->Dados['nome_destinatario'] = $_SESSION['pesquisa_anotacao'];
        $this->Dados['observacoes'] = $_SESSION['pesquisa_obs'];

        if (!empty($this->Dados['nome_destinatario']) and ! empty($this->Dados['observacoes'])):
            $this->pesquisarAnotacoesGeral();
        elseif (!empty($this->Dados['nome_destinatario'])):
            $this->pesquisarAnotacoesDestinatario();
        elseif (!empty($this->Dados['observacoes'])):
            $this->pesquisarAnotacoesObservacoes();
        endif;

        if ($this->Resultado):
            $this->imprimirDadosPdf();
        endif;
    }

    private function pesquisarAnotacoesGeral() {

        $Listar = new ModelsRead();
        $Listar->fullRead("SELECT * 
				FROM anotacoes
                                WHERE nome_destinatario LIKE '%' :nome '%' OR 
                                observacoes LIKE '%' :observacoes '%' 
                                ORDER BY id DESC", "nome={$this->Dados['nome_destinatario']}&observacoes={$this->Dados['observacoes']}");
        if ($Listar->getResultado()):
            $this->Resultado = $Listar->getResultado();
        else:
            echo "Nenhum valor encontrado";
            $this->Resultado = false;
        endif;
    }

    private function pesquisarAnotacoesDestinatario() {
        $Listar = new ModelsRead();
        $Listar->fullRead("SELECT *
				FROM anotacoes
                                WHERE nome_destinatario LIKE '%' :nome '%'  
                                ORDER BY id DESC", "nome={$this->Dados['nome_destinatario']}");
        if ($Listar->getResultado()):
            $this->Resultado = $Listar->getResultado();
        else:
            echo "Nenhum valor encontrado";
            $this->Resultado = false;
        endif;
    }

    private function pesquisarAnotacoesObservacoes() {
        $Listar = new ModelsRead();
        $Listar->fullRead("SELECT *
				FROM anotacoes
                                WHERE observacoes LIKE '%' :observacoes '%'  
                                ORDER BY id DESC", "observacoes={$this->Dados['observacoes']}");
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
			<h1 style="text-align: center;">COMAN - Relatório das Observações</h1>
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
        $this->ConteudoPdf .= '<th>Descrição das Observações</th>';
        $this->ConteudoPdf .= '<th>Created</th>';
        $this->ConteudoPdf .= '<th>Modified</th>';
        $this->ConteudoPdf .= '</tr>';
        $this->ConteudoPdf .= '</thead>';
        $this->ConteudoPdf .= '<tbody>';
        foreach ($this->Resultado as $key => $workshop) :
            extract($workshop);

            $this->ConteudoPdf .= '<tr><td>' . $this->Resultado[$key]['id'] . "</td>";
            $this->ConteudoPdf .= '<td>' . $this->Resultado[$key]['nome_destinatario'] . "</td>";
            $this->ConteudoPdf .= '<td>' . $this->Resultado[$key]['observacoes'] . "</td>";
            $this->ConteudoPdf .= '<td>' . $this->Resultado[$key]['created'] . "</td>";
            $this->ConteudoPdf .= '<td>' . $this->Resultado[$key]['modified'] . "</td></tr>";

        endforeach;
        $this->ConteudoPdf .= '</tbody>';
        $this->ConteudoPdf .= '</table';
    }

}
