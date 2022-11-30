<?php
include("inc/top.php");
?>

<!-- debut de la partie contenu -->
<div class="main">
	<div class="ser-main">
		<h4>Nos annonces</h4>
		<div class="ser-para">
			<p>Qsi turpis, pellentesque at ultrices in, dapibus in magna. Nunc easi diam risus, placerat ut scelerisque et,sus cipit eu ante. Nullam vitae dolor ullcper felises cursus gravida. Cras felis elit, pellentesqi amet. sus cipit eu ante. </p>
		</div>
    	<!-- debut de  ligne de 3 produits -->    
    	<?php
		if(!empty($_GET['categorie']) AND !empty($_GET['motclef'])){
				$requete5 = $connexion->prepare('SELECT titreannonce, lienImage, texteannonce, idannonce FROM annonce WHERE annonce.idcategorie="'.$_GET['categorie'].'" AND annonce.titreannonce LIKE "%'.$_GET['motclef'].'%"');
			}
		else if(!empty($_GET['categorie']) AND empty($_GET['motclef'])){
			$requete5 = $connexion->prepare('SELECT titreannonce, lienImage, texteannonce, idannonce FROM annonce WHERE annonce.idcategorie="'.$_GET['categorie'].'"');
			
		}
		else if (empty($_GET['categorie']) AND !empty($_GET['motclef'])){
			$requete5 = $connexion->prepare('SELECT titreannonce, lienImage, texteannonce, idannonce FROM annonce WHERE annonce.titreannonce LIKE "%'.$_GET['motclef'].'%"');
		}
		else{
			$requete5 = $connexion->prepare("SELECT titreannonce, lienImage, texteannonce, idannonce FROM annonce");
		}
		$requete5->execute();
		while($resultat5 = $requete5->fetch()){
			echo'<div class="ser-grid-list">
					<h5>'.$resultat5["titreannonce"].'</h5>
					<img src="images/'.$resultat5["lienImage"].'" alt="'.$resultat5["titreannonce"].'">
					<p>'.$resultat5["texteannonce"].'</p>
					<div class="btn top"><a href="annonce.php?id='.$resultat5["idannonce"].'">En savoir plus</a></div>
				</div>';
			}
			?>
		<div class="clear"></div>
	</div>
<!-- fin de la partie contenu -->
<?php
include('inc/menu.php');
include("inc/bottom.php");
?>

