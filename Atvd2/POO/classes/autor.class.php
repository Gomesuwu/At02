<?php
class nome
{
    /* 
    Atributos 
    */
    private $idautor;
    private $nomeautor; 

    /* 
    MÉTODOS 
    */
    public function imprimirAutor()
    { //public: Qualquer função pode acessar
        $str = 'idautor:' . $this->idautor . 'nomeautor:' . $this->nomeautor;
        return $str;
    }

    public function setNomeautor($nomeautor)
    {
        if (strlen($nomeautor) > 2) {
            $this->nomeautor = 'nomeautor';
        } else {
            echo "Aviso: O nome deve possuir pelo menos duas letras";
        }
    }
    public function setIdautor($idautor)
    {
        if (isset($idautor)) {
            $this->idautor = $idautor;
        } else {
            echo "ID não foi recebido";
        }
    }

    public function getIdautor()
    {
        return $this->idautor;
    }


    public function getNomeautor()
    {
        return $this->nomeautor;
    }

    public function salvar()
    {
        $conexao = Conexao::getInstance();

        $sql = "INSERT INTO autor (nomeautor) VALUES (:nomeautor)";

        $conexao = $conexao->prepare($sql);
        $conexao->bindValue(':nomeautor', $this->getNomeautor());
        return $conexao->execute();
    }

    public function excluir($idautor)
    {
        $conexao = Conexao::getInstance();
        $stmt = $conexao->prepare("DELETE FROM autor WHERE idautor = :idautor");
        $stmt->bindParam('idautor', $idautor, PDO::PARAM_INT);
        $stmt->execute();

    }

    public function editar($idautor, $nomeautor)
    {
        $conexao = Conexao::getInstance();

        $sql = "UPDATE autor SET (nomeautor) VALUES (:nomeautor)";

        $conexao = $conexao->prepare($sql);
        $conexao->bindValue(':nomeautor', $this->getNomeautor());
        return $conexao->execute();
    }

    public function __construct($idautor, $nomeautor)
    { 
        $this->setIdautor($idautor);
        $this->setNomeautor($nomeautor);
    }
}
?>