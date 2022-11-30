<div class="sidebar">
<div class="s-main">
	<div class="s_hdr">
	<?php 
	$requete6 = $connexion->prepare("SELECT count(nomcategorie) as nb FROM categorie");
	$requete6->execute();
	$resultat6 = $requete6->fetch();
	echo '<h2>Catégories ('.$resultat6["nb"].')</h2>';
	?>
	</div>
	<div class="text1-nav">
		<ul>
			<?php 
				$requete6 = $connexion->prepare("SELECT idcategorie, nomcategorie FROM categorie");
				$requete6->execute();
				while($resultat6 = $requete6->fetch()){
					echo '<li><a href="categories.php?categorie='.$resultat6["idcategorie"].'">'.$resultat6["nomcategorie"].'</a></li>';};
				?>
	    </ul>
	</div>
</div>
</div>
<div class="clear"></div>
</div>