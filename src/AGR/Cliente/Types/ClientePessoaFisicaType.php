<?php

namespace AGR\Cliente\Types;

use AGR\Cliente\ClienteAbstract;

class ClientePessoaFisicaType extends ClienteAbstract
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
