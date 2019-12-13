<?PHP
include "../entities/paiement.php";
include "../core/paiementC.php";

if (isset($_POST['id']) and isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['mode_de_paiement']) and isset($_POST['prix_de_livraison'])and isset($_POST['net_a_payer'])and isset($_POST['prix_recu'])){
$paiement1=new paiement($_POST['id'],$_POST['nom'],$_POST['prenom'],$_POST['mode_de_paiement'],$_POST['prix_de_livraison'],$_POST['net_a_payer'],$_POST['prix_recu']);
//Partie2
/*
var_dump($employe1);
}
*/
//Partie3
$paiement1C=new PaiementC();
$paiement1C->ajouterPaiement($paiement1);
header('Location: afficherPaiement.php');
	
}else{
	echo "vérifier les champs";
}
//*/

?>
