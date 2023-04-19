<?php
require('../conf.inc.php');
class Aluno
{
    /*
     Atributos 
    */
    private $ID;
    private $nome; 
    private $sobrenome;
    private $nasc;
    private $email;
    private $senha;

    /* 
    Métodos
    */
    public function imprimirAluno()
    { //public: Qualquer função pode acessar
        $str = 'ID:' . $this->ID . 'nome:' . $this->nome . 'sobrenome:' . $this->sobrenome . 'sobrenome:' . $this->sobrenome . 'sobrenome:' . $this->sobrenome . 'sobrenome:' . $this->sobrenome;
        return $str;
    }

    public function setId($ID)
    {
        if (isset($ID)) {
            $this->ID = $ID;
        } else {
            echo "ID não foi recebido";
        }
    }

    public function setNome($nome)
    {
        if (strlen($nome) > 2) {
            $this->nome = 'nome';
        } else {
            echo "O nome deve conter pelo menos duas letras";
        }
    }

    public function setSobrenome($sobrenome)
    {
        if (strlen($sobrenome) > 2) {
            $this->sobrenome = $sobrenome;
        } else {
            echo "O sobrenome deve conter pelo menos duas letras";
        }
    }

    public function setNasc($nasc)
    {
        if (isset($nasc)) {
            $this->nasc = 'nasc';
        } else {
            echo "Erro na data de nascimento";
        }
    }

    public function setEmail($email)
    {
        if (strlen($email) > 10) {
            $this->email = 'email';
        } else {
            echo "O email deve ser escrito de acordo com: exemplo@exemplo.com";
        }
    }

    public function setSenha($senha)
    {
        if (strlen($senha) > 2) {
            $this->senha = 'senha';
        } else {
            echo "A senha deve conter mais dígitos";
        }
    }

    public function getID()
    {
        return $this->ID;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getSobrenome()
    {
        return $this->sobrenome;
    }
    public function getNasc()
    {
        return $this->nasc;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getSenha()
    {
        return $this->senha;
    }



    public function salvar()
    {
        $conexao = Conexao::getInstance();

        $sql = "INSERT INTO aluno (nome, sobrenome, nasc, email, senha) VALUES (:nome,:sobrenome,:nasc,:email,:senha)";

        $conexao = $conexao->prepare($sql);
        $conexao->bindValue(':nome', $this->getNome());
        $conexao->bindValue(':sobrenome', $this->getSobrenome());
        $conexao->bindValue(':nasc', $this->getnasc());
        $conexao->bindValue(':email', $this->getEmail());
        $conexao->bindValue(':senha', $this->getSenha());
        return $conexao->execute();
    }



    public function editar($ID, $nome, $sobrenome, $nasc, $email, $senha)
    {
        $conexao = Conexao::getInstance();

        $sql = "UPDATE aluno SET (nome, sobrenome, nasc, email, senha) VALUES (:nome,:sobrenome,:nasc,:email,:senha)";

        $conexao = $conexao->prepare($sql);
        $conexao->bindValue(':nome', $this->getNome());
        $conexao->bindValue(':sobrenome', $this->getSobrenome());
        $conexao->bindValue(':nasc', $this->getnasc());
        $conexao->bindValue(':email', $this->getEmail());
        $conexao->bindValue(':senha', $this->getSenha());
        return $conexao->execute();
    }



    public function excluir($ID)
    {
        $conexao = Conexao::getInstance();
        $stmt = $conexao->prepare("DELETE FROM aluno WHERE idaluno = :idaluno");
        $stmt->bindParam('ID', $ID, PDO::PARAM_INT);
        $stmt->execute();

    }

    

    public function __construct($ID, $nome, $sobrenome, $nasc, $email, $senha)
    { 
        $this->setNome($nome);
        $this->setSobrenome($sobrenome);
        $this->setnasc($nasc);
        $this->setEmail($email);
        $this->setSenha($senha);
    }
}
?>