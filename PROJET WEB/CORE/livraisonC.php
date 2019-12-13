<?PHP
include "../config.php";
class LivraisonC {

	function ajouterLivraison($livraison){
		$sql="insert into livraison (id,nom,email,numero,pays,adresse,devise,paiement) values (:id, :nom,:email,:numero,:pays,:adresse,:devise,:paiement)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);//prépare la requete sql à etre exécuté par
		
        $id=$livraison->getId();
        $nom=$livraison->getNom();
        $email=$livraison->getEmail();
        $numero=$livraison->getNumero();
		$pays=$livraison->getPays();
		$adresse=$livraison->getAdresse();
		$devise=$livraison->getDevise();
		$paiement=$livraison->getPaiement();
		$req->bindValue(':id',$id);//bind value associe une valeur à un parametre
		$req->bindValue(':nom',$nom);
		$req->bindValue(':email',$email);
		$req->bindValue(':numero',$numero);
		$req->bindValue(':pays',$pays);
		$req->bindValue(':adresse',$adresse);
		$req->bindValue(':devise',$devise);
		$req->bindValue(':paiement',$paiement);
		
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
    function afficherLivraisons(){
		//$sql="SElECT * From livraison e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From livraison";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function modifierLivraison($livraison){
		$sql="UPDATE produits SET id=:id,nom=:nom,email=:email,numero=:numero,pays=:pays,adresse=:adresse,devise=:devise,paiement=:paiement WHERE id=:id";

		$db = config::getConnexion();
		
try{
		$req=$db->prepare($sql);
	
        $id=$livraison->getId();
        $nom=$livraison->getNom();
        $email=$livraison->getEmail();
		$numero=$livraison->getNumero();
		$pays=$livraison->getPays();
        $adresse=$livraison->getAdresse();
		$devise=$livraison->getDevise();
		$paiement=$livraison->getPaiement();
		$datas = array(':id'=>$id,':nom'=>$nom,':email'=>$email,':numero'=>$numero,':pays'=>$pays,':adresse'=>$adresse,':devise'=>$devise,':paiement'=>$paiement);
		$req->bindValue(':id',$id);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':email',$email);
		$req->bindValue(':numero',$numero);
		$req->bindValue(':pays',$pays);
		$req->bindValue(':adresse',$adresse);
		$req->bindValue(':devise',$devise);
		$req->bindValue(':paiement',$paiement);
		
            $s=$req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   			echo " Les datas : " ;
  			print_r($datas);
        }
	}
	function recupererLivraison($id){
		$sql="SELECT * from livraison where id=$id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherListeLivraisons($id){
		$sql="SELECT * from livraison where id=$id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}


	function supprimerLivraison($id){
		$sql="DELETE  FROM livraison where id= :id";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id',$id);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
}











?>
