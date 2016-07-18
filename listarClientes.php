<?php

define("CLASS_DIR", "src");
set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);
spl_autoload_register();

$conexao = new AGR\BD\Conexao(new \PDO("mysql:host=localhost;dbname=", "root", "1234"));
$clientes = null;
try {
  $conexao->executarFixture();
  $clientes = $conexao->getClientes();

} catch (Exception $e) {
  die($e->getMessage());
}

?>

<html>
	<head>
		    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
			  <script src="http://tablesorter.com/__jquery.tablesorter.min.js" type="text/javascript"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <meta charset="utf-8">
       	<title>PHP OO</title>

				<style>
				  th{
				  cursor:pointer;
				  }

			  </style>
	</head>

	<body>
		<center>
		<div class="well">
			<center>
				<h1>Listagem de todos os clientes</h1>
			</center>
		</div>
		<?php require_once ("menu.php");?>
		<div class="panel panel-default">
			<div class="well">
				<table style="width:70%" id="myTable">
					<thead>
                <tr>
                    <th>id</th>
                    <th>Nome</th>
                    <th>CPF/CNPJ</th>
                    <th>Endereço</th>
										<th>Cidade</th>
                    <th>Tipo</th>
                </tr>
            </thead>
						<tbody>
					  <?php

					   	foreach($clientes as $cliente)
							{
								echo "<tr><td onClick=\"infoCliente('".$cliente->getId()."','".$cliente->getNome()."','"
                .($cliente instanceof AGR\Cliente\Types\ClientePessoaJuridicaType ? $cliente->getCnpj() : $cliente->getCpf())."','".$cliente->getEndereco()."','".$cliente->getCidade()."','".($cliente instanceof AGR\Cliente\Types\ClientePessoaJuridicaType ? "Jurídica" : "Física")."')\">"
                .$cliente->getId()."</td><td>".$cliente->getNome()."</td><td>".($cliente instanceof AGR\Cliente\Types\ClientePessoaJuridicaType ? $cliente->getCnpj() : $cliente->getCpf())."</td><td>"
                .$cliente->getEndereco()."</td><td>".$cliente->getCidade()."</td><td>".($cliente instanceof AGR\Cliente\Types\ClientePessoaJuridicaType ? "Jurídica" : "Física")."</td></tr>";
							}

					  ?>
				  </tbody>
			  	</table>

				<script>
	            $(document).ready(function()
	            {
	                $("#myTable").tablesorter();
	            });

              function infoCliente(id, nome, cpf, endereco, cidade, tipo){
                   alert('Id: '+ id +' Nome: '+ nome +' CPF/CNPJ: ' + cpf + ' Endereço: ' + endereco + ' Cidade: ' + cidade + ' Tipo: ' + tipo);
                  }
        </script>

			</div>
		</div>
		</center>
	</body>

	<?php require_once("rodape.php"); ?>
</html>
