<?php

require_once "cliente.php";
require_once "enderecoCobranca.php";
require_once "grauImportancia.php";

class ClientePessoaFisica extends Cliente implements EnderecoCobranca, GrauImportancia
{
  private $cpf;

  public function __construct($id, $nome, $endereco, $cidade, $cpf)
  {
      parent::__construct($id, $nome, $endereco, $cidade);
      $this->cpf = $cpf;
  }

  public function getCpf()
  {
    return $this->cpf;
  }
}

 ?>
