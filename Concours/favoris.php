<?php
include("inc/top.php");
if(empty($_SESSION['Auth'])){
    header('location:login.php');
}
?>

<!-- debut de la partie contenu -->
<div class="main">
<div class="ser-main">
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
					<div class="btn top"><a class="delete_fav" id="'.$resultat5["idannonce"].'">Supprimer de mes favoris</a></div>
				</div>';
			}
			?>
	</div>
    <!-- fin de  ligne de 3 produits -->
    
    
        
    
	<div class="clear">
		<div class="btn top">
			<a href="favoris_imprimer.php">Imprimer mes favoris</a>
		</div>
	</div>
</div>
	

<!-- fin de la partie contenu -->
<?php
include('inc/menu.php');
include("inc/bottom.php");
?>


