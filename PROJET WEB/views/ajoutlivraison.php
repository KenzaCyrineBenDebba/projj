<HTML>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="stylebo.css">
<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">
 
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/style.css"/>

</head>
<script language="JavaScript" src="https://code.jquery.com/jquery-1.11.1.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css">
<body>
  <!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header Section -->
		<header class="header-section">
			</a>
		
		<nav class="header-nav">
				<form action="POST">
			<ul class="main-menu">
				<li><a href="index.html" >Home</a></li>
				<li><a href="about-us.html">Gestion de Client</a></li>
				<li><a href="afficherProduit.php">Gestion des Produits</a></li>
				<li><a href="afficherCategorie.php">Gestion des Categories</a></li>
				<li><a href="contact.html">Gestion Commande & panier</a></li>
				<li><a href="afficherLivraison.php"class="active">Gestion de Livraison</a></li>
				<li><a href="afficherPaiement.php">Gestion de paiement</a></li>
				<li><a href="contact.php">Mailing</a></li>
				<li><a href="contact.html">Gestion d'événement</a></li>

			</ul>
		</form>
			<div class="header-right">
				
				
			</div>
		</nav>
	</header>
	<!-- Header Section end -->

	<!-- Hero Section end -->
	<section class="hero-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="hs-text">
						
						
					</div>
				</div>
				<div class="col-lg-6">
					
				</div>
			</div>
		</div>
		<div class="hero-slider owl-carousel">
			
		</div>
	</section>
	<!-- Hero Section end -->

	<!-- Why Section end -->
	
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
		</div>
	</footer>
	<!-- Footer Section end -->
	
	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/main.js"></script>
<?PHP
include "../core/LivraisonC.php";
$livraison1C=new LivraisonC();
$listeLivraisons=$livraison1C->afficherLivraisons();
?>

<div class="container">
	
	<div class="row">
		<h2 class="text-center">BD-ENOVE-Livraison</h2>
	</div>
	<div class="row">
            <div class="col-md-12">
			<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
    				<thead>
						<tr class="first_line">
								<th>ID Produit</th>
								<th>Nom </th>
								<th>Email</th>
								<th>Numero</th>
								<th>Pays</th>
								<th>Adresse</th>
								<th>Devise</th>
								<th>Paiement</th>
                                <th>modifier</th>
                                <th>supprimer</th>
						</tr>
                    </thead>
                    

<?PHP
foreach($listeLivraisons as $row){
	?>
	<tbody>
	<tr>
	<td name="NOM_C" class="contenu2"><?PHP echo $row['id']; ?></td>
	<td name="NOM_C" class="contenu2"><?PHP echo $row['nom']; ?></td>
	<td name="NOM_C" class="contenu2"><?PHP echo $row['email']; ?></td>
	<td name="NOM_C" class="contenu2"><?PHP echo $row['numero']; ?></td>
	<td name="NOM_C" class="contenu2"><?PHP echo $row['pays']; ?></td>
	<td name="NOM_C" class="contenu2"><?PHP echo $row['adresse']; ?></td>
	<td name="NOM_C" class="contenu2"><?PHP echo $row['devise']; ?></td>
	<td name="NOM_C" class="contenu2"><?PHP echo $row['paiement']; ?></td>
	<td name="NOM_C" class="contenu2"><a type="submit" href="modifierLivraison.php?id=<?PHP echo $row['id'];?>"> <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></a> </td>

	<td>
	<form method="POST" action="supprimerLivraison.php">
	<button type="submit" name="supprimer" value="supprimer" class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button>
	<input type="hidden"  value="<?PHP echo $row['id'];?>" name="id" >
	</form>
	</td>
	</tr> 
	<?PHP
}
?>

<!-- <a href="ajoutProduit.html">Ajouter</a> -->
</tbody>
</table>
</body>
</HTMl>
