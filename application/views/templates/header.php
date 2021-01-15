<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Le super blog</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url('style/inscription.css'); ?>" >
	<link rel="stylesheet" href="<?php echo base_url('style/style.css'); ?>" >
	<link rel="stylesheet" href="<?php echo base_url('style/connexion.css'); ?>" >
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/d3js/6.1.1/d3.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>

<header>

	<div id="menu">
		<ul>
			<li><a href="<?php echo base_url('index.php'); ?>"><b>Bababoui</b></a></li>
			<?php if (!empty($_SESSION)) { ?>
				<li>Bienvenue <?php echo $_SESSION['prenom'] . ' ' . $_SESSION['nom']; ?> </li>
				<a href="<?php echo base_url('index.php/connexion/deconnexion'); ?>" class="btn btn-outline-danger float-right align-middle m-2">Déconnexion</a></li>
				<?php
			}else {
			?>
			<div id="boutons">
				<a href="<?php echo base_url('index.php/connexion/connexion'); ?>" class="btn btn-outline-success float-right align-middle m-2">Connexion</a>
				<a href="<?php echo base_url('index.php/connexion/inscription'); ?>" class="btn btn-outline-primary float-right align-middle m-2">S'inscrire</a>
			</div>
			<?php
			}
			?>
		</ul>
	</div>
</header>
