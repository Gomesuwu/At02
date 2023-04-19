<?php
class Livro
{
    /*
    Atributos
    */
    private $idlivro;
    private $anoPublicacao; 
    private $titulo;

    /*
    MÉTODOS
    */
    public function imprimirLivro()
    { //public: Qualquer classe pode acessar essa função
        $str = 'idlivro:' . $this->idlivro . 'Ano de publicação:' . $this->anoPublicacao . 'Títulos:' . $this->titulo;
        return $str;
    }

    public function setAnoPublicacao($ano)
    {
        if (strlen($ano) > 3) {
            $this->anoPublicacao = 'ano';
        } else {
            echo "Insira um ano válido";
        }
    }
    public function setId($idlivro)
    {
        if (isset($idlivro)) {
            $this->idlivro = $idlivro;
        } else {
            echo "ID não foi recebido";
        }
    }

    public function setTitulo($titulo)
    {
        if (strlen($titulo) > 2) {
            $this->titulo = $titulo;
        } else {
            echo "Insira um título válido";
        }
    }

    public function getID()
    {
        return $this->idlivro;
    }


    public function getAnoPublicacao()
    {
        return $this->anoPublicacao;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function salvar()
    {
        $conexao = Conexao::getInstance();

        $sql = "INSERT INTO livro (titulo, anoPublicacao) VALUES (:titulo, :anoPublicacao)";

        $conexao = $conexao->prepare($sql);
        $conexao->bindValue(':titulo', $this->getTitulo());
        $conexao->bindValue(':anoPublicacao', $this->getAnoPublicacao());
        return $conexao->execute();
    }

    public function excluir($idlivro)
    {
        $conexao = Conexao::getInstance();
        $stmt = $conexao->prepare("DELETE FROM livro WHERE idlivro = :idlivro");
        $stmt->bindParam('idlivro', $idlivro, PDO::PARAM_INT);
        $stmt->execute();

    }

    public function editar($idlivro, $titulo)
    {
        $conexao = Conexao::getInstance();

        $sql = "UPDATE livro SET (titulo, anoPublicacao) VALUES (:titulo, :anoPublicacao)";

        $conexao = $conexao->prepare($sql);
        $conexao->bindValue(':titulo', $this->getTitulo());
        $conexao->bindValue(':anoPublicacao', $this->getAnoPublicacao());
        return $conexao->execute();
    }

    public function __construct($idlivro, $anoPublicacao, $titulo)
    {
        $this->setId($idlivro);
        $this->setAnoPublicacao($anoPublicacao);
        $this->setTitulo($titulo);
    }
}
?>