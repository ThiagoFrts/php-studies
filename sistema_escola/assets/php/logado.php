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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
		<div id="topo">
			<span class="saudacao">Olá, <strong><?= htmlspecialchars($_SESSION['usuario']) ?></strong></span>
			<div id="sair">
				<a href="sair.php" target="_parent"><img alt="" src="../imagens/sair.png" /><span>Sair</span></a>
			</div>
		</div>
		<div id="menu">
			<div class="marca">
				<strong>Sistema Web</strong>
				<span>Gestão escolar</span>
			</div>
			<ul>
				<li> <a href="../html/cadastro_turma.html" target="conteudo">Cadastrar turma</a></li>
				<li> <a href="cadastro_aluno.php" target="conteudo">Cadastrar Aluno</a></li>
				<li> <a href="consulta_aluno.php" target="conteudo">Consultar Aluno</a></li>
			</ul>
		</div>
		<div id="conteudo">
			<p class="vazio" id="vazio">Selecione uma opção no menu para começar.</p>
			<iframe name="conteudo" title="Conteúdo" frameborder="0" scrolling="auto"></iframe>
		</div>
	</div>

	<script>
		// Destaca a opção ativa do menu e esconde a mensagem inicial
		document.querySelectorAll('#menu a').forEach(function(link) {
			link.addEventListener('click', function() {
				document.querySelectorAll('#menu a').forEach(function(l) {
					l.classList.remove('ativo');
				});
				link.classList.add('ativo');
				document.getElementById('vazio').classList.add('oculto');
			});
		});
	</script>
</body>

</html>
