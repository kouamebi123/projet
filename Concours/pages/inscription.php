
<?php

$contenu = '';

use \Core\Auth\DBAuth;

function genererChaineAleatoire($longueur)
{
 $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
 $longueurMax = strlen($caracteres);
 $chaineAleatoire = '';
 for ($i = 0; $i < $longueur; $i++)
 {
 $chaineAleatoire .= $caracteres[rand(0, $longueurMax - 1)];
 }
 return "20-TWIN-".$chaineAleatoire;
}

$password = genererChaineAleatoire(10);

if(!empty($_POST)){
    $dossier = "../public/images/";
    $fichier = basename($_FILES['photo']['name']);
    $taille = $_FILES["photo"]["size"];
    $taille_maxi = 100000;

    if($taille===0){
      echo '<script type="text/javascript">
      $(document).ready(function() 
      {
          $(".error1").addClass("border border-danger");
          $(".error1").attr("placeholder", "format incorrecte").placeholder();
      })
      </script>';
    }
    else{
      $auth = new DBAuth(App::getInstance()->getDb());
      $password = "20-TWIN-".genererChaineAleatoire(10);
      if($auth->inscription($_POST, $password,$fichier)){
          move_uploaded_file($_FILES["photo"]["tmp_name"], $dossier . $fichier);
          header('Location:user.php');
    }else{
        
      echo '<script type="text/javascript">
      $(document).ready(function() 
      {
          $(".error").addClass("border border-danger");
          $(".error").attr("placeholder", "Matricule existant").placeholder();
      })
      </script>';
}
}
}

?>

<form action="" method="post" enctype="multipart/form-data">
<div class="container row w-100 mx-auto">
      <div class="h2 mx-auto text-center my-5">
        Formulaire d'inscription
      </div>
      <!--/Title-->
      <!-- Forms -->
      <div class="content">
        <!-- Grid row -->
        <div class="container row w-100 mx-auto">


          
          <div class="row col-12 border border-light p-5">

            <h5 class="card-header info-color white-text text-center py-3 col-12" style="top: -70px;">
              <strong>Information</strong>
            </h5>


          <!-- First column -->
          <div class="col-md">
            <!-- Card -->
            <div class="card card-cascade narrower">
              <!-- Card image -->
              <div
                class="view view-cascade gradient-card-header white-text text-center mdb-color elegant-color-dark"
              >
                <p class="mb-0 h2">Civilités</p>
              </div>
              <!-- Card image -->

              <!-- Card content -->
              <div class="card-body card-body-cascade text-center">
                <div class="md-form md-outline">
                  <input type="file" id="Photo" name="photo" accept="image/png, image/jpeg" class="error1 form-control" required/>
                </div>
                
                <div class="md-form md-outline">
                  <input type="text" id="NomCand" name="NomCand" class="form-control" required/>
                  <label for="nom">Nom</label>
                </div>

                <div class="md-form md-outline">
                  <input type="text" id="PrenomCand" name="PrenomCand" class="form-control" required/>
                  <label for="PrenomCand">Prenom</label>
                </div>

                <div class="md-form md-outline">
                  <input type="date" id="DateCand" name="DateCand" class="form-control" required/>
                  <label for="DateCand">Date de naissance</label>
                </div>

                <div class="md-form md-outline">
                  <input type="text" id="LieuCand" name="LieuCand" class="form-control" required/>
                  <label for="LieuCand">Lieu de naissance</label>
                </div>

                <div class="md-form md-outline">
                  <select name="SexeCand" id="SexeCand" class="form-control" required>
                            <option >Sexe</option>
                            <option value="Féminin">Féminin</option>
                            <option value="Masculin">Masculin</option>
                  </select>
                </div>

                <div class="md-form md-outline">
                  <input type="email" id="EmailCand" name="emailCand" class="form-control" required/>
                  <label for="EmailCand">Email</label>
                </div>
                
                <div class="md-form md-outline">
                  <input type="tel" id="NumeroCand" name="NumeroCand" class="form-control" required/>
                  <label for="NumeroCand">Numero de téléphone</label>
                </div>
                
                <div class="md-form md-outline">
                  <input type="text" id="NationCand" name="NationCand" class="form-control" required/>
                  <label for="NationCand">Nationnalitée</label>
                </div>
                
                <div class="md-form md-outline">
                  <select name="Piece" id="Piece" class="form-control" required>
                            <option value="">Type de piece</option>
                            <option value="CNI">CNI</option>
                            <option value="Passeport">Passeport</option>
                            <option value="Masculin">Attestation</option>
                  </select>
                </div>
                
                <div class="md-form md-outline">
                  <input type="number" id="NumeroPieceCand" name="NumeroPieceCand" class="form-control" required/>
                  <label for="NumeroPieceCand">Numero de piece</label>
                </div>
                
                <div class="md-form md-outline">
                  <input type="text" id="ResidCand" name="ResidCand" class="form-control" required/>
                  <label for="ResidCand">Lieu de résidence</label>
                </div>
              </div>
              <!-- Card content -->
            </div>
            <!-- Card -->
          </div>







          <!-- First column -->
          <div class="col-md">
            <!-- Card -->
            <div class="card card-cascade narrower">
              <!-- Card image -->
              <div
                class="view view-cascade gradient-card-header mdb-color white-text text-center elegant-color-dark"
              >
                
                <p class="mb-0 h2">Notes</p>
              </div>
              <!-- Card image -->

              <!-- Card content -->
              <div class="card-body card-body-cascade text-center">
                <div class="md-form md-outline">
                  <input type="text" id="Matricule" name="Matricule" placeholder="" class="error form-control" required/>
                  <label for="Matricule">Matricule</label>
                </div>
                <div class="md-form md-outline">
                  <input type="text" id="EtaO" name="EtaO" class="form-control" required/>
                  <label for="EtaO">Etablissememnt d'origine</label>
                </div>
                
                <div class="md-form md-outline">
                  <input type="text" id="VilleO" name="VilleO" class="form-control" required/>
                  <label for="VilleO">Ville d'origine</label>
                </div>
                
                <div class="md-form md-outline">
                  <select name="Serie" id="Serie" class="form-control" required>
                            <option >Serie</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="E">E</option>
                  </select>
                </div>

                <div class="md-form md-outline">
                  <select name="Mention" id="Mention" class="form-control" required>
                            <option >Mention</option>
                            <option value="Passable">Passable</option>
                            <option value="Assez bien">Assez bien</option>
                            <option value="Bien">Bien</option>
                            <option value="Tres Bien">Tres Bien</option>
                  </select>
                </div>

                <div class="md-form md-outline">
                  <input type="number" id="N_AngB" name="N_AngB" class="form-control" min="0" max="20" required/>
                  <label for="N_AngB">Note d'anglais au bac</label>
                </div>
                
                <div class="md-form md-outline">
                  <input type="number" id="N_AngC" name="N_AngC" class="form-control" min="0" max="20" required/>
                  <label for="N_AngC">Moyenne d'anglais</label>
                </div>
                
                <div class="md-form md-outline">
                  <input type="number" id="N_PhyB" name="N_PhyB" class="form-control" min="0" max="20" required/>
                  <label for="N_PhyB">Note de physique au bac</label>
                </div>
                
                <div class="md-form md-outline">
                  <input type="number" id="N_PhyC" name="N_PhyC" class="form-control" min="0" max="20" required/>
                  <label for="N_PhyC">Moyenne de physique</label>
                </div>
                
                <div class="md-form md-outline">
                  <input type="number" id="N_MathB" name="N_MathB" class="form-control" min="0" max="20" required/>
                  <label for="N_MathB">Note de mathematique au bac</label>
                </div>
                
                <div class="md-form md-outline">
                  <input type="number" id="N_MathC" name="N_MathC" class="form-control" min="0" max="20" required/>
                  <label for="N_MathC">Moyenne de mathematique</label>
                </div>

                <div class="md-form md-outline">
                  <input type="number" id="M_Classe" name="M_Classe" class="form-control"min="0" max="20" required/>
                  <label for="M_Classe">Moyenne de classe</label>
                </div>
                
                <div class="md-form md-outline">
                  <input type="number" id="R_annuelle" name="R_annuelle" class="form-control" required/>
                  <label for="R_annuelle">Rang Annuelle</label>
                </div>
              </div>
              <!-- Card content -->
            </div>
            <!-- Card -->
          </div>
          <!-- First column -->



        </div>

        <div class="row col-12 border border-light p-5 mt-5">

          <h5 class="card-header info-color white-text text-center py-3 col-12" style="top: -70px;">
            <strong>Information supplementaire</strong>
          </h5>


        <!-- First column -->
        <div class="col-md">
          <!-- Card -->
          <div class="card card-cascade narrower">
            <!-- Card image -->
            <div
              class="view view-cascade white-text text-center gradient-card-header mdb-color elegant-color-dark"
            >
              
              <p class="mb-0 h3">Père</p>
            </div>
            <!-- Card image -->

            <!-- Card content -->
            <div class="card-body card-body-cascade text-center">
              <div class="md-form md-outline">
                <input type="text" id="NomPere" name="NomPere" class="form-control" required/>
                <label for="NomPere">Nom</label>
              </div>

              <div class="md-form md-outline">
                <input type="text" id="PrenomPere" name="PrenomPere" class="form-control" required/>
                <label for="PrenomPere">Prenom</label>
              </div>

              <div class="md-form md-outline">
                <input type="tel" id="NumeroPere" name="NumeroPere" class="form-control" required/>
                <label for="NumeroPere">Numero de téléphone</label>
              </div>

              <div class="md-form md-outline">
                <input type="text" id="ProfessionPere" name="ProfessionPere" class="form-control" required/>
                <label for="ProfessionPere">Profession</label>
              </div>
              
            </div>
            <!-- Card content -->
          </div>
          <!-- Card -->
        </div>







        <!-- First column -->
        <div class="col-md">
          <!-- Card -->
          <div class="card card-cascade narrower">
            <!-- Card image -->
            <div
              class="view view-cascade white-text text-center gradient-card-header mdb-color elegant-color-dark"
            >
              
              <p class="mb-0 h3">Mère</p>
            </div>
            <!-- Card image -->

            <!-- Card content -->
            <div class="card-body card-body-cascade text-center">
              <div class="md-form md-outline">
                <input type="text" id="NomMere" name="NomMere" class="form-control" required/>
                <label for="NomMere">Nom</label>
              </div>

              <div class="md-form md-outline">
                <input type="text" id="PrenomMere" name="PrenomMere" class="form-control" required/>
                <label for="PrenomMere">Prenom</label>
              </div>

              <div class="md-form md-outline">
                <input type="tel" id="NumeroMere" name="NumeroMere" class="form-control" required/>
                <label for="NumeroMere">Numero de téléphone</label>
              </div>

              <div class="md-form md-outline">
                <input type="text" id="ProfessionMere" name="ProfessionMere" class="form-control" required/>
                <label for="ProfessionMere">Profession</label>
              </div>

            </div>
            <!-- Card content -->
          </div>
          <!-- Card -->
        </div>
        <!-- First column -->



      </div>


          <!-- First column -->

          <!-- Grid row -->
          <div class="row justify-content-center w-100 my-3">
            <button type="submit" class="btn w-25 btn-primary">
              Valider
            </button>
          </div>
        </div>
      </div>
      <!--/Forms-->
    
    </div>
    </form>
    <script type="text/javascript">
    $(document).ready(function() 
    {   
        $("input").click(function(){
            $(".error").removeAttr("placeholder");
            $(".error").removeClass("border border-danger")
            $(".error1").removeAttr("placeholder");
            $(".error1").removeClass("border border-danger")
        })
        
    })
</script>
<footer class="page-footer font-small blue" style="position: relative; bottom: 0; width: 100%;">
    <!-- Copyright -->
<div class="footer-copyright text-center py-3">Tous droits reservés:
  <a href="https://mdbootstrap.com/"> www.esatic.com</a>
</div>
<!-- Copyright -->
</footer>

