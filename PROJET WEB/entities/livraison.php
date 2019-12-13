<?PHP
class Livraison{
	private $id;
	private $nom;
	private $email;
	private $numero;
	private $pays;
        private $adresse;
        private $devise;
        private $paiement;

	function __construct($id,$nom,$email,$numero,$pays,$adresse,$devise,$paiement){
		$this->id=$id;
		$this->nom=$nom;
		$this->email=$email;
		$this->numero=$numero;
		$this->pays=$pays;
                $this->adresse=$adresse;
                $this->devise=$devise;
                $this->paiement=$paiement;

	}
	
	function getId(){
		return $this->id;
	}
	function getNom(){
		return $this->nom;
	}
	function getEmail(){
		return $this->email;
	}
	function getNumero(){
		return $this->numero;
	}
	function getPays(){
		return $this->pays;
	}
        function getAdresse(){
		return $this->adresse;
	}
        function getDevise(){
		return $this->devise;
	}
        function getPaiement(){
		return $this->paiement;
	}

	function setId($id){
		$this->id=$id;
	}
	function setNom($nom){
		$this->nom=$nom;
	}
	function setEmail($email){
		$this->email=$email;
	}
	function setNumero($numero){
		$this->numero=$numero;
	}
        function setPays($pays){
		$this->pays=$pays;
	}
        function setAdresse($adresse){
		$this->adresse=$adresse;
	}
          function setDevise($devise){
		$this->devise=$devise;
	}
         function setPaiement($paiement){
		$this->paiement=$paiement;
	}



	
}

?>
