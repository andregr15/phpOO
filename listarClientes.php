<?php

define("CLASS_DIR", "src");
set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);
spl_autoload_register();

$clientes = array(
  new AGR\Cliente\Types\ClientePessoaFisicaType (5, "Larissa", "Rua d, numero 8", "São João da Boa Vista", "3219603247"),
	new AGR\Cliente\Types\ClientePessoaJuridicaType (2, "Gabriel", "Rua t, numero 30", "São Paulo", "9854320501254863"),
	new AGR\Cliente\Types\ClientePessoaFisicaType (3, "Joel", "Rua y, numero 500", "Caldas", "123423574"),
	new AGR\Cliente\Types\ClientePessoaFisicaType (1, "André", "Rua x, numero 21", "Poços de Caldas", "123456789"),
  new AGR\Cliente\Types\ClientePessoaJuridicaType (9, "Lucas", "Rua i, numero 985", "Campinas", "5410981032"),
	new AGR\Cliente\Types\ClientePessoaJuridicaType (6, "Talita", "Rua a, numero 2510", "Poços de Caldas", "864035240"),
  new AGR\Cliente\Types\ClientePessoaJuridicaType (4, "Juliana", "Rua o, numero 5", "Porto Alegre", "351951324"),
	new AGR\Cliente\Types\ClientePessoaFisicaType (7, "Sandra", "Rua e, numero 50", "Fortaleza", "321068103"),
  new AGR\Cliente\Types\ClientePessoaJuridicaType (10, "Rose", "Rua p, numero 70", "Poços de Caldas", "3209810327"),
	new AGR\Cliente\Types\ClientePessoaFisicaType (8, "Silas", "Rua t, numero 25", "Pinhal", "32106801321")
);

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
