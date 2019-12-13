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
include "../entities/paiement.php";
include "../core/paiementC.php";
if (isset($_GET['id'])){
	$paiementC=new PaiementC();
    $result=$paiementC->recupererPaiement($_GET['id']);
	foreach($result as $row){
		$id=$row['id'];
		$nom=$row['nom'];
		$prenom=$row['prenom'];
		$mode_de_paiement=$row['mode_de_paiement'];
		$prix_de_livraison=$row['prix_de_livraison'];
		$net_a_payer=$row['net_a_payer'];
		$prix_recu=$row['prix_recu'];
		
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
<td class="first_line">Nom du client</td>
<td><input type="text" name="nom" value="<?PHP echo $nom ?>"></td>
</tr>
<tr>
<td class="first_line">prenom du client</td>
<td><input type="text" name="prenom" value="<?PHP echo $prenom ?>"></td>
</tr>
<tr>
<td class="first_line">Mode de paiement</td>
<td><input type="text" name="mode_de_paiement" value="<?PHP echo $mode_de_paiement ?>"></td>
</tr>
<tr>
<td class="first_line">Prix de livraison</td>
<td><input type="text"  name="prix_de_livraison" value="<?PHP echo $prix_de_livraison ?>"></td>
</tr>
<tr>
<td class="first_line">Net a payer</td>
<td><input type="text" name="net_a_payer" value="<?PHP echo $net_a_payer ?>"></td>
</tr>
<tr>
<td class="first_line">Prix recu </td>
<td><input type="text" name="prix_recu" value="<?PHP echo $prix_recu ?>"></td>
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
	$paiement=new paiement($_POST['id'],$_POST['nom'],$_POST['prenom'],$_POST['mode_de_paiement'],$_POST['prix_de_livraison'],$_POST['net_a_payer'],$_POST['prix_recu']);
	$paiementC->modifierPaiement($paiement,$_POST['id_ini']);
	echo $_POST['id_ini'];
	header('Location: afficherPaiement.php');
}
?>

</body>
</HTMl>
