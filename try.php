<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="shortcut icon" href="favicon.ico">
  <title>ENOVE</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

  <title>My Cart</title>
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	    <link rel="stylesheet" href="assets/css/main.css">
	    <link rel="stylesheet" href="assets/css/green.css">
	    <link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/owl.transitions.css">
		<!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
		<link href="assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/animate.min.css">
		<link rel="stylesheet" href="assets/css/rateit.css">
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">

		<!-- Demo Purpose Only. Should be removed in production -->
		<link rel="stylesheet" href="assets/css/config.css">

		<link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
		<link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
		<link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
		<link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
		<link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
		<!-- Demo Purpose Only. Should be removed in production : END -->

		
		<!-- Icons/Glyphs -->
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">

        <!-- Fonts --> 
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="assets/images/favicon.ico">

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="asset/css/fontawesome.css">
  <link rel="stylesheet" href="asset/css/templatemo-style.css">
  <link rel="stylesheet" href="asset/css/owl.css">

</head>

<body class="is-preload">
    <?php 
    session_start();
    error_reporting(0);
    include('includes/config.php');
    if(isset($_POST['submit'])){
        if(!empty($_SESSION['cart'])){
        foreach($_POST['quantity'] as $key => $val){
          if($val==0){
            unset($_SESSION['cart'][$key]);
          }else{
            $_SESSION['cart'][$key]['quantity']=$val;
    
          }
        }
          echo "<script>alert('Your Cart hasbeen Updated');</script>";
        }
      }
    // Code for Remove a Product from Cart
    if(isset($_POST['remove_code']))
      {
    
    if(!empty($_SESSION['cart'])){
        foreach($_POST['remove_code'] as $key){
          
            unset($_SESSION['cart'][$key]);
        }
          echo "<script>alert('Your Cart has been Updated');</script>";
      }
    }
    // code for insert product in order table
    
    
    if(isset($_POST['ordersubmit'])) 
    {
      
    if(strlen($_SESSION['login'])==0)
        {   
    header('location:login.php');
    }
    else{
    
      $quantity=$_POST['quantity'];
      $pdd=$_SESSION['pid'];
      $value=array_combine($pdd,$quantity);
    
    
        foreach($value as $qty=> $val34){
    
    
    
    mysqli_query($con,"insert into orders(userId,productId,quantity) values('".$_SESSION['id']."','$qty','$val34')");
    header('location:payment-method.php');
    }
    }
    }
    
    
    ?>

  <!-- Wrapper -->
  <div id="wrapper">

    <!-- Main -->
    <div id="main">
      <div class="inner">

        <!-- Header -->
        <header id="header">
            <?php include('includes/main-header.php');?>
                  <div class="logo">
                      <img id="enove-logo" src="assets\images\logo-2-blanc.ico">
                  </div>
                </header>

        <!-- Banner -->
        <section class="main-banner">

          <div class="container-fluid">

            <div class="row">
              <div class="col-md-12">

                <div class="banner-content">

                  <div class="row">

                    <div class="col-md-12">


                      <div class="diapo">
                        <!-- Sidebar -->
                        <div id="sidebar">

                          <div class="inner">
                            <!-- Menu -->
                            <nav id="menu">
                              <!-- Search Box -->
                              <section id="search" class="alt">
                                <form method="get" action="#">
                                  <input type="text" name="search" id="search" placeholder="Search..." />
                                </form>
                              </section>
                              <ul>
                                <li><a href="try.php">Présentation</a></li>
                                <li>
                                  <a href="index.php">Produits</a>

                                </li>
                                <li>
                                  <span class="opener">Dropdown Two</span>
                                  <ul>
                                    <li><a href="order-history.php">My orders</a></li>
                                    <li><a href="#">Sub Menu #2</a></li>
                                    <li><a href="#">Sub Menu #3</a></li>
                                  </ul>
                                </li>
                                <li><a href="https://www.groupebismuth.com/">Groupe Bismuth</a></li>
                              </ul>
                            </nav>
                            <!-- Footer -->
                            <footer id="footer">
                              <p class="copyright">Copyright &copy; 2019 Groupe Bismuth Enove
                                <br>Designed by <a rel="nofollow" href="https://www.facebook.com/templatemo">Template
                                  Mo</a></p>
                            </footer>
                          </div>
                        </div>


                        <div class="banner-caption">
                          <h4>Groupe Bismuth vous présente<em> ENOVE</em>.</h4>
                          <span>Energies Nouvelles &amp; Environnement</span>

                          <p class="blured">La société « ENOVE » a été créée en 2003 en se basant sur la technologie
                            Pila Zeta, Italie.
                            La production d'ENOVE a démarré avec une ligne de production de piles zinc air type RP2 et
                            suite à son succès immédiat, la gamme s’est étendue à la fin de 2004 avec l’inclusion des
                            batteries de type RP1 (90Ah, 130Ah et 170Ah), RP7 et RP0.
                            <span id="More">Aujourd’hui, ENOVE peut offrir des piles avec la marque du client. Ceci peut
                              être assuré par un autocollant, une sérigraphie ou une griffe permanente avec un moulage
                              dans le couvercle plastique, selon les préférences du client.<span id="dots">...</span>
                              La société est implantée dans la zone industrielle de Zaghouan qui se trouve à environ 60
                              km de la ville de Tunis. Le site s’étend sur une superficie de 28000 m² dont 9000 m² sont
                              couverts comme suit :
                              - Bâtiments administratifs et vestiaires : 700 m²
                              - Ateliers de production et aires de stockage : 7680 m²</span>
                          </p>
                          <div class="primary-button">
                            <a href="#" id="read" onclick="read()">Voir Plus</a>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>


  </div>

  <!-- Scripts -->
  <script type="text/javascript">
    var i = 0;

    function read() {
      if (!i) {
        document.getElementById("More").style.display = "inline";
        document.getElementById("dots").style.display = "none";
        document.getElementById("read").style.innerHTML = "Voir Moin";
        i = 1;
      } else {
        document.getElementById("More").style.display = "none";
        document.getElementById("dots").style.display = "inline";
        document.getElementById("read").style.innerHTML = "Voir Plus";
        i = 0;
      }

    }
  </script>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="asset/js/browser.min.js"></script>
  <script src="asset/js/breakpoints.min.js"></script>
  <script src="asset/js/transition.js"></script>
  <script src="asset/js/owl-carousel.js"></script>
  <script src="asset/js/custom.js"></script>

  <div id="map">
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3192.901062980441!2d10.205828051025463!3d36.84484547278613!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12fd34da47d9d251%3A0x3a3087a624ddcc99!2sBismuth%20Groupe!5e0!3m2!1sfr!2stn!4v1574025455678!5m2!1sfr!2stn"
      width="1080" height="400" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
  </div>
</body>


</body>

</html>