<?php
include("inc/top2.php");
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
			$user = "admin";
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
        header('location:redirection.php');
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
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">
                                        Créer un compte
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputFirstName" value="<?= $prenoms ?>" type="text" placeholder="Enter your first name" name="prenoms" required/>
                                                    <label for="inputFirstName">Prenoms*</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input class="form-control" value="<?= $nom ?>" id="inputLastName" name="nom" required type="text" placeholder="Enter your last name" />
                                                    <label for="inputLastName">Nom*</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control email" id="inputEmail" value="<?= $email ?>" type="email" name="email" required placeholder="name@example.com" />
                                            <label for="inputEmail">Adresse email*</label>
                                            <p class="error_email">*email existant</p>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control password1" id="inputPassword" value="" type="password" name="password" required />
                                                    <label for="inputPassword">Password*</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control password2" id="inputPasswordConfirm" value="" type="password" name="password" required />
                                                    <label for="">Retapez votre Password*</label
                            >
                          </div>
                        </div>
                      </div>
                      <div class="mt-4 mb-0">
                        <div class="d-grid">
                        <input type="submit" class="btn btn-primary btn-block submit" name="submit" value="Créer un compte">
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="card-footer text-center py-3">
                    <div class="small">
                      <a href="login.php">Déja inscrit? se connecter ici</a>
                    </div>
                  </div>

<?php
include("inc/bottom2.php");
?>