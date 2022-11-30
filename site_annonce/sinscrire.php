<?php
include("inc/top.php");
if(!empty($_POST)){
	$requete1 = $connexion->prepare(
		'SELECT email 
		FROM utilisateur
		WHERE utilisateur.email="'.$_POST['email'].'"
		');
		$requete1->execute();
		$resultat1 = $requete1->fetch();
		if($resultat1){
			echo '<script type="text/javascript">
			$(document).ready(function(){
				$(".email").addClass("error")
				$(".error_email").show()
			})
			</script>';
		}else{
			$requete2 = $connexion->prepare(
				"INSERT INTO utilisateur (nomutilisateur, prenomsutilisateur, email, mot_pass, roles) 
				VALUES (:nomutilisateur, :prenomsutilisateur, :email, :mot_pass, :roles)
				");
			$user = "user";
			$requete2->bindParam(':nomutilisateur', $_POST['nom']);
			$requete2->bindParam(':prenomsutilisateur',$_POST['prenoms'] );
			$requete2->bindParam(':email', $_POST['email']);
			$requete2->bindParam(':mot_pass', $_POST['password']);
			$requete2->bindParam(':roles', $user);
			$requete2->execute();
		
			$requete12 = $connexion->prepare(
				'SELECT idutilisateur
				FROM utilisateur
				WHERE utilisateur.email="'.$_POST['email'].'" AND utilisateur.mot_pass="'.$_POST['password'].'"
				');
			$requete12->execute();
			$resultat12 = $requete12->fetch();
			$_SESSION['Auth'] = $resultat12['idutilisateur'];
			$_SESSION['Role'] = $user;
			
			if(!empty($_SESSION['Auth'])){
				header('location:index.php');
			}
		}
}

if(empty($_POST)){
	$nom = "";
	$prenoms = "";
	$email ="";
}else{
	$nom = $_POST['nom'];
	$prenoms = $_POST['prenoms'];
	$email =$_POST['email'];
}

?>

<!-- debut de la partie contenu -->
<div class="main">
     <div class="register">
		  	  <form method="post" action=""> 
				 <div class="register-top-grid">
					<h3>Vos informations</h3>
					 <div>
						<span>Prénom<label>*</label></span>
						<input value="<?= $prenoms ?>" type="text" name="prenoms" required> 
					 </div>
					 <div>
						<span>Nom<label>*</label></span>
						<input value="<?= $nom ?>" type="text" name="nom" required> 
					 </div>
					 <div>
						 <span>Email<label>*</label></span>
						 <input class="input email" value="<?= $email ?>" type="email" name="email" required> 
						 <p class="error_email">*email existant</p>
					 </div>
					 <div class="clear"> </div>
					     <a class="news-letter" href="#">
						 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>S'inscrire à la neswletter</label>
					   </a>
					 </div>
				     <div class="register-bottom-grid">
						    <h3>Pour vous authentifier</h3>
							 <div>
								<span>Password<label>*</label></span>
								<input class="password1" type="password" name="password" required>
							 </div>
							 <div>
								<span>Retapez votre Password<label>*</label></span>
								<input class="password2" type="password" name="password" required>
								<p class="error_password">*mot de passe different</p>
							 </div>
							 <div class="clear"> </div>
					 </div>
				
				<div class="clear"> </div>
				<div class="register-but">
				
					   <input type="submit" class="submit" value="M'inscrire">
					   <div class="clear"> </div>
				   </form>
				</div>
		   </div>
  <div class="clear"></div>
</div>
<!-- fin de la partie contenu -->
<?php
include("inc/bottom.php");
?>