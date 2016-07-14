<?php

namespace AGR\Cliente\Types;

use AGR\Cliente\ClienteAbstract;

class ClientePessoaJuridicaType extends ClienteAbstract
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
