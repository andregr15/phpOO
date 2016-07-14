<?php
//require_once ("cliente.php");
require_once ("clientePessoaFisica.php");
require_once ("clientePessoaJuridica.php");

$clientes = array(
  new ClientePessoaFisica (5, "Larissa", "Rua d, numero 8", "São João da Boa Vista", "3219603247"),
	new ClientePessoaJuridica (2, "Gabriel", "Rua t, numero 30", "São Paulo", "9854320501254863"),
	new ClientePessoaFisica (3, "Joel", "Rua y, numero 500", "Caldas", "123423574"),
	new ClientePessoaFisica (1, "André", "Rua x, numero 21", "Poços de Caldas", "123456789"),
  new ClientePessoaJuridica (9, "Lucas", "Rua i, numero 985", "Campinas", "5410981032"),
	new ClientePessoaJuridica (6, "Talita", "Rua a, numero 2510", "Poços de Caldas", "864035240"),
  new ClientePessoaJuridica (4, "Juliana", "Rua o, numero 5", "Porto Alegre", "351951324"),
	new ClientePessoaFisica (7, "Sandra", "Rua e, numero 50", "Fortaleza", "321068103"),
  new ClientePessoaJuridica (10, "Rose", "Rua p, numero 70", "Poços de Caldas", "3209810327"),
	new ClientePessoaFisica (8, "Silas", "Rua t, numero 25", "Pinhal", "32106801321")
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
                .($cliente instanceof ClientePessoaJuridica ? $cliente->getCnpj() : $cliente->getCpf())."','".$cliente->getEndereco()."','".$cliente->getCidade()."','".($cliente instanceof ClientePessoaJuridica ? "Jurídica" : "Fisíca")."')\">"
                .$cliente->getId()."</td><td>".$cliente->getNome()."</td><td>".($cliente instanceof ClientePessoaJuridica ? $cliente->getCnpj() : $cliente->getCpf())."</td><td>"
                .$cliente->getEndereco()."</td><td>".$cliente->getCidade()."</td><td>".($cliente instanceof ClientePessoaJuridica ? "Jurídica" : "Fisíca")."</td></tr>";
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
