<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Concours d'entrée en TWIN</title>
    <!-- Font Awesome -->
    <!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
<link rel="shortcut icon" type="image/ico" href="../public/images/favicon.ico"/>
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    
<style type="text/css">
   html,
    body,
    header,
    .view {
      height: 100%;
    }
    #caroussel-item{
      width: 50%;

    }
    html{
      color: black;
    }
    
    .form-control::-webkit-input-placeholder {
      color: red;
      }
      :root {
  --info-color: #0099CC;
}

.btn-toggle-pass {
  border: none;
  position: absolute;
  top: 11px;
  background: transparent;
  right: 0;
}

.btn-toggle-pass.active {
  color: var(--info-color);
}
  </style>
  </head>

  <body class="medical-lp">
    <!--Navigation & Intro-->
    <header>
      <!--Navbar-->
      <nav class="navbar info-color py-3 navbar-expand-lg navbar-dark">
        <div class="container">
        <a class="navbar-brand" href="index.php?p=Acceuil"
            ><strong><img src="../public/images/logo-wide.png" alt="logo_esatic" style="height: 30px;"></strong></a
          >
          <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!--Links-->
            <ul class="navbar-nav mr-auto smooth-scroll">
              <li class="nav-item">
                <a class="nav-link" style="font-size:1.3em;" href="index.php?p=Acceuil"
                  >Accueil <span class="sr-only">(current)</span></a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" style="font-size:1.3em;" href="index.php?p=A_propos" data-offset="80">A propos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" style="font-size:1.3em;" href="documents/presentation_twin.pdf" target="_blank" data-offset="80"
                  >Parcours TWIN</a
                >
              </li>
            </ul>

            <!--Social Icons-->
            <ul class="navbar-nav nav-flex-icons">
              <li class="nav-item">
                <a href="https://www.facebook.com/EsaticpoledesTIC" target="_blank" class="nav-link"
                  ><i class="fab fa-facebook-f white-text"></i
                ></a>
              </li>
              <li class="nav-item">
                <a href="https://www.instagram.com/esatic_pole_tic/?hl=fr" target="_blank" class="nav-link"
                  ><i class="fab fa-instagram white-text"></i
                ></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <?= $content ?>
  </div>  
  </header>
  
    <!-- SCRIPTS -->
    <!-- JQuery -->
    <!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>

    <!-- Custom scripts -->
    <script>
      // Animation init
      new WOW().init();
    </script>
  </body>
</html>
