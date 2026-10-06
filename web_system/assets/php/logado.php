<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8" />
	<title>Sistema Web</title>
	<link rel="stylesheet" href="../css/estilo.css">

	<script>
		// Script para esconder o código da página
		function protegercodigo(event) {
			if (event.button == 2 || event.button == 3) {
				alert('Indisponivel');
			}
		}
		document.onmousedown = protegercodigo;
	</script>

	<script>
		function noBack() {
			window.history.forward();
		}
		noBack();
		window.onload = noBack;
		window.onpageshow = function(evt) {
			if (evt.persisted) noBack();
		};
		window.onunload = function() {
			void(0);
		};
	</script>
</head>

<body class="pg-logado">

	<div id="fundo">
		<div id="consulta_aluno">

		</div>
		<div id="sair">
			<a href="../../index.html" target="_parent"><img width="100%" height="100%" border="0" src="../imagens/sair.png" /></a>
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
		<!--
  <div id="title" style="vertical-align:middle" align="center">
   <img width="100%" height="100%" src="../imagens/bemvindo.png"/>
  </div>
  -->
	</div>
</body>

</html>
