<?php

require_once "cliente.php";
require_once "enderecoCobranca.php";
require_once "grauImportancia.php";

class ClientePessoaJuridica extends Cliente
{
  private $cnpj;

  public function __construct($id, $nome, $endereco, $cidade, $cnpj)
  {
      parent::__construct($id, $nome, $endereco, $cidade);
      $this->cnpj = $cnpj;
  }

  public function getCnpj()
  {
    return $this->cnpj;
  }
}

 ?>
