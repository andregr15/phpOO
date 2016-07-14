<?php
require_once "enderecoCobranca.php";
require_once "grauImportancia.php";

class Cliente implements EnderecoCobranca, GrauImportancia
{
  private $id;
  private $nome;
  private $endereco;
  private $cidade;
  private $enderecoCobranca;
  private $grauImportancia;

  function __construct($id, $nome, $endereco, $cidade)
  {
    $this->id = $id;
    $this->nome = $nome;
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

  public function getEndereco()
  {
    return $this->endereco;
  }

  public function getCidade()
  {
    return $this->cidade;
  }

  public function setEnderecoCobranca($enderecoCobranca)
  {
    $this->enderecoCobranca = $enderecoCobranca;
  }

  public function getEnderecoCobranca()
  {
    return $this->enderecoCobranca;
  }

  public function setGrauImportancia($grauImportancia)
  {
    $this->grauImportancia = $grauImportancia;
  }

  public function getGrauImportancia()
  {
    return $this->grauImportancia;
  }

}


 ?>
