<?php
include("inc/top.php");
?>

<!-- debut de la partie contenu -->
<div class="main">
<div class="sidebar">
<div class="s-main">
	<div class="s_hdr">
		<?php 
		$requete3 = $connexion->prepare(
			"SELECT count(nomcategorie) as nb 
			FROM categorie"
			);
		$requete3->execute();
		$resultat3 = $requete3->fetch();
		echo '<h2>Catégories ('.$resultat3["nb"].')</h2>';
		?>
	</div>
	<div class="text1-nav">
		<ul>
			<?php 
				$requete4 = $connexion->prepare(
					"SELECT idcategorie, nomcategorie 
					FROM categorie"
					);
				$requete4->execute();
				while($resultat4 = $requete4->fetch()){
					echo '<li><a href="categories.php?categorie='.$resultat4["idcategorie"].'">'.$resultat4["nomcategorie"].'</a></li>';
				};
				?>
	    </ul>
	</div>
</div>
</div>

<div class="content">
	<div class="clear"></div>
	<div class="cnt-main">
		<div class="s_btn">
			<ul>
				<li><h2>Bienvenue !</h2></li>
				<li><h3><a href="login.php">Se connecter</a></h3></li>
				<li><h2>Nouveau visiteur ?</h2></li>
				<li><h4><a href="sinscrire.php">S'enregistrer</a></h4></li>
				<div class="clear"></div>
			</ul>
		</div>
	<div class="grid">
		<?php
		$requete7 = $connexion->prepare(
			"SELECT idannonce, lienImage, titreannonce, texteannonce
			FROM ( SELECT idannonce,lienImage, titreannonce, texteannonce FROM annonce ORDER BY idannonce DESC LIMIT 5)annonce
			ORDER BY RAND()
			LIMIT 1"
			);
		$requete7->execute();
		while($resultat7 = $requete7->fetch()){
			 
		echo '<div class="grid-img">
		<a href="annonce.php?id='.$resultat7["idannonce"].'"><img src="images/'.$resultat7["lienImage"].'" alt="'.$resultat7["titreannonce"].'"/></a>
			</div>
			<div class="grid-para">
		<h2>Nouveau sur le site</h2>
		<h3>A vendre '.$resultat7["titreannonce"].'</h3>
		<p>'.$resultat7["texteannonce"].'</p>
		<div class="btn top">
		<a href="annonce.php?id='.$resultat7["idannonce"].'">Details&nbsp;<img src="images/marker2.png"></a>
		</div>';
	}?>
	</div>
	<div class="clear"></div>
	</div>
</div>
<div class="cnt-main btm">
	<div class="section group">
		<?php
		$requete8 = $connexion->prepare(
			"SELECT idannonce, lienImage, titreannonce, prix 
			FROM annonce
			ORDER BY RAND()
			LIMIT 6"
			);
		$requete8->execute();
		while($resultat8 = $requete8->fetch()){
			echo'<div class="grid_1_of_3 images_1_of_3">
			<a href="annonce.php?id='.$resultat8["idannonce"].'"><img src="images/'.$resultat8["lienImage"].'" alt="'.$resultat8["titreannonce"].'"/></a>
			<a href="annonce.php?id='.$resultat8["idannonce"].'"><h3>'.$resultat8["titreannonce"].'</h3></a>
			<div class="cart-b">
		   <span class="price left"><sup>'.$resultat8["prix"].'</sup><sub></sub></span>
		   <div class="btn top-right right "><a class="ajout_fav" id="'.$resultat8["idannonce"].'">Ajouter à mes favoris</a></div>
		   <div class="clear"></div>
		</div>
	   </div>';}?>
		</div>
</div>
</div>

<div class="clear"></div>
</div>

<!-- fin de la partie contenu -->
<?php
include("inc/bottom.php");
?>
