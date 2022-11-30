<?php
include("inc/top.php");
if(!empty($_POST)){
	$requete1 = $connexion->prepare(
		'SELECT idutilisateur, roles
		FROM utilisateur
		WHERE utilisateur.email="'.$_POST['email'].'" AND utilisateur.mot_pass="'.$_POST['password'].'"
		');
		$requete1->execute();
		$resultat1 = $requete1->fetch();
		if(!$resultat1){
			echo '<script type="text/javascript">
			$(document).ready(function(){
				$(".email").addClass("error")
				$(".password3").addClass("error")
				$(".error_email").show()
			})
			</script>';
		}else{
			$_SESSION['Auth'] = $resultat1['idutilisateur'];
			$_SESSION['Role'] = $resultat1['roles'];
			if(!empty($_SESSION['Auth'])){
				header('location:index.php');
			}
		}
}

if(empty($_POST)){
	$email ="";
}else{
	$email =$_POST['email'];
}
?>

<!-- debut de la partie contenu -->
<div class="main">

		<div class="register">
			   <div class="col_1_of_list span_1_of_list login-left">
			  	 <h3>Nouveau membre</h3>
				 <p>En créant un compte, vous pourrez créer des annonces</p>
				 <a class="acount-btn" href="sinscrire.php">Créer un compte</a>
			   </div>
			   <div class="col_1_of_list span_1_of_list login-right">
			  	<h3>Déja membre ?</h3>
				<p>Si vous avez déja un compte, merci de vous connecter</p>
				<form  method="post" action="" >
					<div class="register-top-grid">
						<div style="width: 100%">
							<span>Adresse email<label>*</label></span>
							<input class="email" type="email" name="email" value="<?= $email ?>" required> 
				  		</div>
				  		<div style="width: 100%">
							<span>Mot de passe<label>*</label></span>
							<input type="password" class="password3" name="password" required> 
							<p style="display:none;color: red" class="error_email">*adresse email ou mot de passe incorrect</p>
				  		</div>
				  		
				  		<a class="forgot" href="#">Mot de passe oublié</a>
				  		<input type="submit" name="submit" value="Login">
					</div>
			    </form>
			   </div>	
			   <div class="clearfix"> </div>
		
	</div>
  <div class="clear"></div>
</div><!-- fin de la partie contenu -->

<?php
include("inc/bottom.php");
?>