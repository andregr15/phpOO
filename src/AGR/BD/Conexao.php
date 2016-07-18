<?php
namespace AGR\BD;

use \AGR\Cliente\ClienteAbstract;
use \AGR\Cliente\Types\ClientePessoaFisicaType;
use \AGR\Cliente\Types\ClientePessoaJuridicaType;

class Conexao
{
  private $pdo;
  private $persist;

  public function __construct(\PDO $pdo)
  {
    $this->pdo = $pdo;
  }

  public function flush(ClienteAbstract $cliente)
  {
    try
		{
      $this->persist = $cliente;
      $stmt = $this->pdo->prepare("insert into poo.clientes(nome, endereco, cidade, documento, tipo) values (:nome, :endereco, :cidade, :documento, :tipo)");
      $stmt->bindValue("nome", $this->persist->getNome());
      $stmt->bindValue("endereco", $this->persist->getEndereco());
      $stmt->bindValue("cidade", $this->persist->getCidade());
      $stmt->bindValue("documento", ($this->persist instanceof ClientePessoaJuridicaType) ? $this->persist->getCnpj() : $this->persist->getCpf());
      $stmt->bindValue("tipo", ($this->persist instanceof ClientePessoaJuridicaType) ? 1 : 0);
      $ret = $stmt->execute();
		}
		catch(\PDOException $e)
		{
			throw $e;
		}

    return $ret;
  }

  public function getClientes()
  {
    $stmt = $this->pdo->prepare("select id, nome, endereco, cidade, documento, tipo from poo.clientes order by id desc;");
    $stmt->execute();
		$clis = $stmt->fetchAll(\PDO::FETCH_ASSOC);

    $clientes = array();

    foreach($clis as $cls)
    {
      if($cls == null) return;

      if($cls["tipo"] == 0)
      {
        $clientes[] = new ClientePessoaFisicaType($cls["id"], $cls["nome"], $cls["endereco"], $cls["cidade"], $cls["documento"]);
      }
      else
      {
        $clientes[] = new ClientePessoaJuridicaType($cls["id"], $cls["nome"], $cls["endereco"], $cls["cidade"], $cls["documento"]);
      }
    }

    return $clientes;
  }

  public function executarFixture()
  {
    $this->criacaoBancoDados();
    $this->insercaoDadosTeste();
  }

  private function criacaoBancoDados()
  {
    try
		{
			$this->pdo->query("drop database if exists poo;");
      $this->pdo->query("create database poo;");
      $this->pdo->query("create table poo.clientes
                        (
                          id int auto_increment primary key,
                          nome varchar(255),
                          endereco varchar(255),
                          cidade varchar(100),
                          enderecoCobranca varchar(255),
                          grauImportancia int,
                          documento varchar(14),
                          tipo int default 0
                        );");
		}
		catch(\PDOException $e)
		{
			throw $e;
		}
  }

  private function insercaoDadosTeste()
  {
    try
		{
      $clientes = array(
        new ClientePessoaFisicaType (5, "Larissa", "Rua d, numero 8", "São João da Boa Vista", "3219603247"),
      	new ClientePessoaJuridicaType (2, "Gabriel", "Rua t, numero 30", "São Paulo", "9854320501254863"),
      	new ClientePessoaFisicaType (3, "Joel", "Rua y, numero 500", "Caldas", "123423574"),
      	new ClientePessoaFisicaType (1, "André", "Rua x, numero 21", "Poços de Caldas", "123456789"),
        new ClientePessoaJuridicaType (9, "Lucas", "Rua i, numero 985", "Campinas", "5410981032"),
      	new ClientePessoaJuridicaType (6, "Talita", "Rua a, numero 2510", "Poços de Caldas", "864035240"),
        new ClientePessoaJuridicaType (4, "Juliana", "Rua o, numero 5", "Porto Alegre", "351951324"),
      	new ClientePessoaFisicaType (7, "Sandra", "Rua e, numero 50", "Fortaleza", "321068103"),
        new ClientePessoaJuridicaType (10, "Rose", "Rua p, numero 70", "Poços de Caldas", "3209810327"),
      	new ClientePessoaFisicaType (8, "Silas", "Rua t, numero 25", "Pinhal", "32106801321"),
        new ClientePessoaFisicaType (11, "Luiz", "Rua t, numero 78", "S", "32168103217")
      );

      foreach($clientes as $cliente)
      {
        $stmt = $this->pdo->prepare("insert into poo.clientes(nome, endereco, cidade, documento, tipo) values (:nome, :endereco, :cidade, :documento, :tipo)");
        $stmt->bindValue("nome", $cliente->getNome());
        $stmt->bindValue("endereco", $cliente->getEndereco());
        $stmt->bindValue("cidade", $cliente->getCidade());
        $stmt->bindValue("documento", ($cliente instanceof ClientePessoaJuridicaType) ? $cliente->getCnpj() : $cliente->getCpf());
        $stmt->bindValue("tipo", ($cliente instanceof ClientePessoaJuridicaType) ? 1 : 0);
        $stmt->execute();
      }
		}
		catch(\PDOException $e)
		{
			throw $e;
		}
  }

}

 ?>
