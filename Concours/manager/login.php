<?php
include("inc/top2.php");
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
			$_SESSION['Auth']=$resultat1['idutilisateur'];
			$_SESSION['Role'] = $resultat1['roles'];
			if(!empty($_SESSION['Auth'])){
				header('location:redirection.php');
			
			}
		}
}

if(empty($_POST)){
	$email ="";
}else{
	$email =$_POST['email'];
}
?>
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">
                                        Connexion
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="">
                                        <div class="form-floating mb-3">
                                            <input class="form-control email" id="inputEmail" type="email" name="email" value="<?= $email ?>" required placeholder="name@example.com" />
                                            <label for="inputEmail">Adresse email</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control password3" name="password" value="" id="inputPassword" type="password" placeholder="Password" required />
                                            <label for="inputPassword">Mot de passe</label>
                                            <p style="color:red" class="error_email">*adresse email ou mot de passe incorrect</p>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                            <label class="form-check-label" for="inputRememberPassword">Se rappeler de moi</label
                        >
                      </div>
                      <div
                        class="d-flex align-items-center justify-content-between mt-4 mb-0"
                      >
                        <a class="small" href="password.php"
                          >Mot de passe oublié</a
                        >
                        <input type="submit" class="btn btn-primary btn-block submit" name="submit" value="Se connecter">
                      </div>
                    </form>
                  </div>
                  <div class="card-footer text-center py-3">
                    <div class="small">
                      <a href="sinscrire.php"
                        >Besoin d'un compte? Se connecter ici</a
                      >
                    </div>
                  </div>
<?php
include("inc/bottom2.php");
?>