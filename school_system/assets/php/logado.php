<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../html/aviso.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8" />
	<title>Sistema Web</title>
	<link rel="stylesheet" href="../css/estilo.css">

	<script>
		function noBack() {
			window.history.forward();
		}
		noBack();
		window.onload = noBack;
		window.onpageshow = function(evt) {
			if (evt.persisted) noBack();
		};
	</script>
</head>

<body class="pg-logado">

	<div id="fundo">
		<div id="consulta_aluno"></div>
		<div id="sair">
			<a href="sair.php" target="_parent"><img width="100%" height="100%" border="0" alt="Sair" src="../imagens/sair.png" /></a>
		</div>
		<div id="conteudo">
			<iframe name="conteudo" width="100%" height="100%" frameborder="0" scrolling="auto"></iframe>
		</div>
		<div id="menu">
			<ul>
				<li> <a href="../html/cadastro_turma.html" target="conteudo">Cadastrar turma</a></li>
				<li> <a href="cadastro_aluno.php" target="conteudo">Cadastrar Aluno</a></li>
				<li> <a href="consulta_aluno.php" target="conteudo">Consultar Aluno</a></li>
			</ul>
		</div>
	</div>
</body>

</html>
