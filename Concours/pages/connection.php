<?php

$contenu = '';

use \Core\Auth\DBAuth;

if(!empty($_POST)){
    if(stristr($_POST['Identifiant'], '20-TWIN-') == TRUE){
    $auth = new DBAuth(App::getInstance()->getDb());
    $Identifiant = str_replace('20-TWIN-','',$_POST['Identifiant']);
    if($auth->login($Identifiant, $_POST['Password'])){
        header('Location:user.php');
    }
    else{
    echo '<script type="text/javascript">
    $(document).ready(function() 
    {
        $(".ok").removeClass("white-text");
        $(".ok").addClass("alert-danger");
    })
    </script>';
}
}
else{
    echo '<script type="text/javascript">
    $(document).ready(function() 
    {
        $(".ok").removeClass("white-text");
        $(".ok").addClass("alert-danger");
    })
    </script>';
}
    
}

?>
<div>
<form style="height:473px;" method="post" class="text-center col-md-4 w-50 mx-auto border border-light mt-5 p-5" action="">
        <p  style="font-size: 60px; top:-20px; position:relative;"><i class="fas fa-users"></i></p>
        <p class="h4 mec" style="top:-40px; position:relative;">Espace candidat</p>
        <div class="col-12" style="position:relative; top:-40px;cursor: default; " ><div class="alert ok white-text ">Identifiant incorrect</div></div>
        
        <div style="position:relative; top:-40px;">
        <div class="md-form md-outline mx-auto ">
          <input type="text" name="Identifiant" id="Identifiant" class="form-control" />
          <label for="nom">Identifiant</label>
        </div>

        <div class="md-form md-outline mx-auto">
          <input type="password" name="Password" id="password" class="form-control"/>
          <label for="password">Mot de passe</label>
          <div class="btn-toggle-pass oeil2" style="right:10px;"><i class="fa fa-eye"></i></div>
        </div>
        <!-- Sign in button -->
        <button class="btn btn-info my-4 " type="submit">
          Connexion
        </button>
    </form>
    </div>
    </div>
<!-- Footer -->
<footer class="page-footer mt-5 font-small blue" style="position: relative; bottom: 0; width: 100%;">
<!-- Copyright -->
<div class="footer-copyright text-center py-3">Tous droits reservés:
  <a href="https://mdbootstrap.com/"> www.esatic.com</a>
</div>
<!-- Copyright -->
</footer>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>

<script type="text/javascript">
$(document).ready(function() 
  {
    $('.change2').click(function(){
    $.fn.toggleAttr = function(attr, attr1, attr2){
  return this.each(function() {
    var self = $(this);
    if (self.attr(attr) == attr1)
      self.attr(attr, attr2);
    else
      self.attr(attr, attr1);
  });
};
    $('#password2').toggleAttr('type', 'password', 'text');
    $('.oeil2').toggleClass('active');
  })
})
</script>