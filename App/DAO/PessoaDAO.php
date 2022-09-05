<?php
 
 namespace App\DAO;

 use App\Model\PessoaModel;

 use \PDO;
 

class PessoaDAO extends DAO
{
   
    private $conexao;


    public function __construct()
    {
      parent::__construct();
    }


   
    public function insert(PessoaModel $model)
    {
       
        $sql = "INSERT INTO pessoa 
        (nome, rg, cpf, data_nascimento, email, telefone, endereco) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";

       
        $stmt = $this->conexao->prepare($sql);


       
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->rg);
        $stmt->bindValue(3, $model->cpf);
        $stmt->bindValue(4, $model->data_nascimento);
        $stmt->bindValue(5, $model->email);
        $stmt->bindValue(6, $model->telefone);
        $stmt->bindValue(7, $model->endereco);

        
        $stmt->execute();
    }


    
    public function update(PessoaModel $model)
    {
        $sql = "UPDATE pessoa SET nome=?, rg=?, cpf=? data_nascimento=?,
                email=?, telefone=?, endereco=? WHERE id=?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1,$model->nome);
        $stmt->bindValue(2,$model->rg);
        $stmt->bindValue(3,$model->cpf);
        $stmt->bindValue(4,$model->data_nascimento);
        $stmt->bindValue(5,$model->email);
        $stmt->bindValue(6,$model->telefone);
        $stmt->bindValue(7,$model->endereco);
        $stmt->bindValue(8,$model->id);
    }


    /**
     * Método que retorna todas os registros da tabela pessoa no banco de dados.
     */
    public function select()
    {
        $sql = "SELECT * FROM pessoa ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        // Retorna um array com as linhas retornadas da consulta. Observe que
        // o array é um array de objetos. Os objetos são do tipo stdClass e 
        // foram criados automaticamente pelo método fetchAll do PDO.
        return $stmt->fetchAll(PDO::FETCH_CLASS);        
    }


    /**
     * Retorna um registro específico da tabela pessoa do banco de dados.
     * Note que o método exige um parâmetro $id do tipo inteiro.
     */
    public function selectById(int $id)
    {
        $sql = "SELECT * FROM pessoa WHERE id = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject("PessoaModel"); // Retornando um objeto específico PessoaModel
    }


    /**
     * Remove um registro da tabela pessoa do banco de dados.
     * Note que o método exige um parâmetro $id do tipo inteiro.
     */
    public function delete(int $id)
    {
        $sql = "DELETE FROM pessoa WHERE id = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}