<HTML>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="stylebo.css">
</head>
<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css">
<body>

<?PHP
include "../entities/livraison.php";
include "../core/livraisonC.php";
if (isset($_GET['id'])){
	$livraisonC=new LivraisonC();
    $result=$livraisonC->recupererLivraison($_GET['id']);
	foreach($result as $row){
		$id=$row['id'];
		$nom=$row['nom'];
		$email=$row['email'];
		$numero=$row['numero'];
		$pays=$row['pays'];
		$adresse=$row['adresse'];
		$devise=$row['devise'];
		$paiement=$row['paiement'];
?>
<div class="container">
	<div class="row">
		<h2 class="text-center">BD-ENOVE-Paiement</h2>
	</div>
	<div class="row"> 
			<div class="col-md-12">
<form method="POST">
<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
<caption>Modifier Paiement</caption>
<tr>
<td class="first_line" >ID produit ENOVE</td>
<td><input type="text" name="id" value="<?PHP echo $id ?>"></td>
</tr>
<tr>
<td class="first_line" >Nom</td>
<td><input type="text" name="nom" value="<?PHP echo $nom ?>"></td>
</tr>
<tr>
<td class="first_line" >Email</td>
<td><input type="text" name="email" value="<?PHP echo $email ?>"></td>
</tr>
<tr>
<td class="first_line" >Numero</td>
<td><input type="text" name="numero" value="<?PHP echo $numero ?>"></td>
</tr>
<tr>
<tr>
<td class="first_line" >Pays</td>
<td><input type="text" name="pays" value="<?PHP echo $pays ?>"></td>
</tr>
<tr>
<tr>
<td class="first_line" >Adresse/td>
<td><input type="text" name="adresse" value="<?PHP echo $adresse ?>"></td>
</tr>
<tr>
<tr>
<td class="first_line" >Devise</td>
<td><input type="text" name="devise" value="<?PHP echo $devise ?>"></td>
</tr>
<tr>
<td class="first_line" >paiement</td>
<td><input type="text" name="paiement" value="<?PHP echo $paiement ?>"></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="modifier" value="modifier"></td>
</tr>
<tr>
<td></td>
<tr>
<td></td>
<td><input type="hidden" name="id_ini" value="<?PHP echo $_GET['id'];?>"></td>
</tr>
</tr>
</table>
</form>
</div>
</div>
</div>
<?PHP
	}
}
if (isset($_POST['modifier'])){
	$livraison=new livraison($_POST['id'],$_POST['nom'],$_POST['email'],$_POST['numero'],$_POST['pays'],$_POST['adresse'],$_POST['devise'],$_POST['paiement']);
	$livraisonC->modifierLivraison($livraison,$_POST['id_ini']);
	echo $_POST['id_ini'];
	header('Location: afficherLivraison.php');
}
?>
</body>
</HTMl>
