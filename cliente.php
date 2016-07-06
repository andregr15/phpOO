<?php

class Cliente
{
  private $id;
  private $nome;
  private $cpf;
  private $endereco;
  private $cidade;

  function __construct($id, $nome, $cpf, $endereco, $cidade)
  {
    $this->id = $id;
    $this->nome = $nome;
    $this->cpf = $cpf;
    $this->endereco = $endereco;
    $this->cidade = $cidade;
  }

  public function getId()
  {
    return $this->id;
  }

  public function getNome()
  {
    return $this->nome;
  }

  public function getCpf()
  {
    return $this->cpf;
  }

  public function getEndereco()
  {
    return $this->endereco;
  }

  public function getCidade()
  {
    return $this->cidade;
  }
}


 ?>
