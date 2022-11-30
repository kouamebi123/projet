<?php
session_start();
include("DB/connexion_DB.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<title>BreizhCoinCoin</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/autre.css" rel="stylesheet" type="text/css" media="all" />
<link href='//fonts.googleapis.com/css?family=Cabin+Condensed' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="wrap">
<div class="header">
	<div class="logo">
		<a href="index.php"><img src="images/logo.png" alt=""> </a>
	</div>
	<div class="header-right">
	<div class="contact-info">
		<ul class="ici">
			<?php if(!empty($_SESSION['Auth'])){
				$requete1 = $connexion->prepare("SELECT count(favoris.idannonce) as compte
				FROM favoris
				WHERE favoris.idutilisateur =".$_SESSION['Auth']."");
				$requete1->execute();
				$resultat1 = $requete1->fetch();
				echo '<li><a href="favoris.php">Favoris : '.$resultat1["compte"].' enregistrés</a></li>';
			}
			else{
				echo"<br/>";
			}
				?>
			
	
		</ul>
	</div>
	<div class="menu">
	 	 <ul class="nav">
        <li class="active"><a href="index.php" title="Home">Accueil</a></li>
  		<li><a href="apropos.php">Notre concept</a></li>
  	     <li><a href="categories.php">Annonces</a></li>
  		<li><a href="contact.php">Contact</a></li>
  		<li><a href="sinscrire.php">S'enregistrer</a></li>
	    <li><a href="manager/index.php">Mon compte</a></li>
  		<div class="clear"></div>
      </ul>
	 </div>
	 </div>
	<div class="clear"></div>
</div>
<div class="hdr-btm pad-w3l">
<div class="hdr-btm-bg"></div>
<div class="hdr-btm-left">
<form action="categories.php" method="get">
	<div class="search">
		<input type="text" name="motclef" placeholder="tapez votre recherche" >
		<input type="submit" value="Chercher" class="pad-w3l-search">
	  
	</div>
	<div class="drp-dwn">
		<select name="categorie" class="custom-select" id="select-1">
			<option value="">Catégorie</option>
			<?php 
				$requete2 = $connexion->prepare("SELECT idcategorie, nomcategorie FROM categorie");
				$requete2->execute();
				while($resultat2 = $requete2->fetch()){
					echo "<option value='".$resultat2["idcategorie"]."'>".$resultat2["nomcategorie"]."</option>";};
			?>
		</select>
	</div>
</form>
	<div class="txt-right">
		<h3><a href="">Recherche avancée</a></h3>
	</div>
	<div class="clear"></div>
</div>
</div>