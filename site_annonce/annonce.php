<?php
include("inc/top.php");
?>

<!-- debut de la partie contenu -->
<div class="main">
<?php 
	$requete9 = $connexion->prepare('SELECT * FROM annonce WHERE annonce.idannonce="'.$_GET['id'].'"');	
	$requete9->execute();
	while($resultat9 = $requete9->fetch()){
		echo'<div class="details">
		<div class="product-details">				
			<div class="images_3_of_2">
				<div id="container">
					<div id="products_example">
						<div id="products">
							<div class="slides_container">
								<a href="#" target="_blank"><img src="images/'.$resultat9["lienImage"].'" alt="'.$resultat9["titreannonce"].'" /></a>
							</div>
							<ul class="pagination">
								<li><a href="#"><img height="40" src="images/'.$resultat9["lienImage"].'" alt="'.$resultat9["titreannonce"].'" /></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="desc span_3_of_2">
				<h2>'.$resultat9["titreannonce"].'</h2>
				<p>'.$resultat9["texteannonce"].'</p>					
				<div class="price">
					<p>Prix: <span>'.$resultat9["prix"].' $</span></p>
				</div>
			<div class="wish-list">
				<ul>
				 	<li class="wish"><a style="cursor: pointer;" class="ajout_fav" id="'.$resultat9["idannonce"].'">Ajouter à mes favoris</a></li>
				</ul>
			</div>
		</div>
		<div class="clear"></div>
	</div>';
	}?>

	


	<div class="content_bottom">
   		<div class="text-h1 top1 btm">
			<h2>Annonces qui pourraient vous intéresser</h2>
	  	</div>
 	<div class="div2">
        <div id="mcts1">
			<?php
			$requete9 = $connexion->prepare('SELECT idcategorie FROM annonce WHERE annonce.idannonce="'.$_GET['id'].'"');
			$requete9->execute();
			$resultat9 = $requete9->fetch();
			$requete10 = $connexion->prepare('SELECT idannonce,titreannonce, lienImage FROM annonce WHERE annonce.idcategorie="'.$resultat9['idcategorie'].'" AND annonce.idannonce!="'.$_GET['id'].'" LIMIT 3');
			$requete10->execute();
			while($resultat10 = $requete10->fetch()){
				echo '<div class="w3l-img">
				<a href="annonce.php?id='.$resultat10["idannonce"].'"><img src="images/'.$resultat10['lienImage'].'" alt="'.$resultat10['lienImage'].'"/></a>
					</div>';
				}
			?>
			<div class="clear"></div>	
        </div>
   	</div>
</div>

</div>
<!-- fin de la partie contenu -->
<?php
include('inc/menu.php');
include("inc/bottom.php");
?>