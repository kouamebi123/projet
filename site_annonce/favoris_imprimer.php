<?php
session_start();
include("DB/connexion_DB.php");
if(empty($_SESSION['Auth'])){
    header('location:login.php');
}
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
<body style="text-align: center;" onLoad="window.print()">
<div class="main">
<div class="ser-main1">
	<h4>Vos favoris</h4>
	<div class="ser-para">
		<p>Qsi turpis, pellentesque at ultrices in, dapibus in magna. Nunc easi diam risus, placerat ut scelerisque et,sus cipit eu ante. Nullam vitae dolor ullcper felises cursus gravida. Cras felis elit, pellentesqi amet. sus cipit eu ante. </p>
	</div>

    <!-- debut de  ligne de 3 produits -->    
    <div class="list_favoris">
	<?php 
	$requete5 = $connexion->prepare('SELECT titreannonce, lienImage, texteannonce, favoris.idannonce 
	FROM annonce, favoris
	WHERE annonce.idannonce=favoris.idannonce  AND favoris.idutilisateur="'.$_SESSION['Auth'].'"');
	$requete5->execute();
		while($resultat5 = $requete5->fetch()){
			echo'<div class="ser-grid-list">
					<h5>'.$resultat5["titreannonce"].'</h5>
					<img src="images/'.$resultat5["lienImage"].'" alt="'.$resultat5["titreannonce"].'">
					<p>'.$resultat5["texteannonce"].'</p>
				</div>';
			}
			?>
	</div>
    <!-- fin de  ligne de 3 produits -->
</div>
<script language="javascript">
<!--
window.print();
setTimeout(function(){
    window.location.href = "favoris.php";
}, 1000);

//-->
</script>
</body>
</html>