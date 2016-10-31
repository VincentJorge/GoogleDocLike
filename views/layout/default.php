<!DOCTYPE html>
<html lang="fr">
<head>
	<!--Meta qui permet de zoomer ou dezoomer sur les mobiles-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- /*/ -->
	<!-- Meta pour les accents et caractères spéciaux -->
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- /*/ -->
	<!-- Meta pour le référencement -->
	<meta name="description" content="my_meetic site de rencontre">
	<!-- /*/ -->
	<!-- Meta pour les robots ,  l'indexation, le potentiel de positionnement et le cache -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<meta name="robots" content="index, follow, archive">
	<meta name="robots" content="all">
	<!-- /*/ -->
	<link rel="stylesheet" type="text/css" href="<?php echo WEBROOT; ?>Assets/css/homes.css">

	<title>WacDoc</title>
	</head>
<body>
	<header class="col-md-12">
			<h1><span class="glyphicon glyphicon-grain"></span> Bienvenue sur WacDoc </h1>
			<ul class="first" id="menu-demo2">
				<li><a href="#">Menu</a>
					<ul>
						<li><a href="<?php echo WEBROOT; ?>Homes/index">Accueil</a></li>
						<li><a href="<?php echo WEBROOT; ?>Uploads/getList">Fichiers Uploadés</a></li>
						<li><a href="<?php echo WEBROOT; ?>Uploads/getCreate">Fichiers Créés</a></li>
						<li><a href="<?php echo WEBROOT; ?>Uploads/create">Nouveau document</a></li>
					</ul>
				</li>
			</ul>
	</header>
	<?php error_reporting(E_ALL); ini_set('display_errors', '1');
	echo $content_for_layout; ?>
	<footer>
		<div>
			<!-- <h4><a href="#">CONTACTER LE SUPPORT</a></h4> -->
		</div>
	</footer>
</body>
<script type="text/javascript" src="<?php echo WEBROOT; ?>Assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo WEBROOT; ?>Assets/js/script.js"></script>
</html>
