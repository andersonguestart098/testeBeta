<?php
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>CRUD - Pesquisar</title>		
	</head>
	<body>
		<a href="cad_usuario.php">Cadastrar</a><br>
		<a href="index.php">Listar</a><br>
		
		<h1>Pesquisar Registro</h1>
		
		<form method="POST" action="">
			<label>Nome: </label>
			<input type="text" name="numeronf" placeholder="Digite o nome"><br><br>
			
			<input name="SendPesqUser" type="submit" value="Pesquisar">
		</form><br><br>
		
		<?php
		$SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);
		if($SendPesqUser){
			$numeronf = filter_input(INPUT_POST, 'numeronf', FILTER_SANITIZE_STRING);
			$result_usuario = "SELECT * FROM exped WHERE numeronf LIKE '%$numeronf%'";
			$resultado_usuario = mysqli_query($conn, $result_usuario);
			while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
				echo "ID: " . $row_usuario['id'] . "<br>";
				echo "numeronf: " . $row_usuario['numeronf'] . "<br>";
				echo "datahora: " . $row_usuario['datahora'] . "<br>";
				echo "exped: " . $row_usuario['exped'] . "<br>";
				echo "quemrecebeu: " . $row_usuario['quemrecebeu'] . "<br>";
				echo "statusdep: " . $row_usuario['statusdep'] . "<br>";
				echo "<a href='edit_usuario.php?id=" . $row_usuario['id'] . "'>Editar</a><br>";
				echo "<a href='proc_apagar_usuario.php?id=" . $row_usuario['id'] . "'>Apagar</a><br><hr>";
			}
		}
		?>
	</body>
</html>