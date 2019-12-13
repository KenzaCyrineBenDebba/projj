<?PHP
include "../core/paiementC.php";
$paiementC=new PaiementC();
if (isset($_POST["id"])){
	$paiementC->supprimerPaiement($_POST["id"]);
	header('Location: afficherPaiement.php');
}

?>
