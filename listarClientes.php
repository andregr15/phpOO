<?php
require_once ("cliente.php");

$clientes = array(
  new Cliente (5, "Larissa", "3219603247", "Rua d, numero 8", "São João da Boa Vista"),
	new Cliente (2, "Gabriel", "98543205", "Rua t, numero 30", "São Paulo"),
	new Cliente (3, "Joel", "123423574", "Rua y, numero 500", "Caldas"),
	new Cliente (1, "André", "123456789", "Rua x, numero 21", "Poços de Caldas"),
  new Cliente (9, "Lucas", "5410981032", "Rua i, numero 985", "Campinas"),
	new Cliente (6, "Talita", "864035240", "Rua a, numero 2510", "Poços de Caldas"),
  new Cliente (4, "Juliana", "351951324", "Rua o, numero 5", "Porto Alegre"),
	new Cliente (7, "Sandra", "321068103", "Rua e, numero 50", "Fortaleza"),
  new Cliente (10, "Rose", "3209810327", "Rua p, numero 70", "Poços de Caldas"),
	new Cliente (8, "Silas", "32106801321", "Rua t, numero 25", "Pinhal")
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

					td{
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
                    <th>CPF</th>
                    <th>Endereço</th>
										<th>Cidade</th>
                </tr>
            </thead>
						<tbody>
					  <?php

					   	foreach($clientes as $cliente)
							{
								echo "<tr><td>".$cliente->getId()."</td><td>".$cliente->getNome()."</td><td>".$cliente->getCpf()."</td><td>".$cliente->getEndereco()."</td><td>".$cliente->getCidade()."</td></tr>";
							}

					  ?>
				  </tbody>
			  	</table>

				<script>
	            $(document).ready(function()
	            {
	                $("#myTable").tablesorter();
	            }
	        );
        </script>

			</div>
		</div>
		</center>
	</body>

	<?php require_once("rodape.php"); ?>
</html>
