 <!Doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" 
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      

      
<style>
      table {
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th {
  cursor: pointer;
}

th, td {
  text-align: left;
  padding: 16px;
}

tr:nth-child(even) {
  background-color: #f2f2f2
}
</style>
</head>

<body style="background-image: url('bb.jpg')" >
    <form method="POST" action="recherche.php"> 
     Rechercher un mot : <input type="text" name="recherche">
     <input type="SUBMIT" value="Search!"> 
   </form>


<h1 style="background-color:Green;
text-align:center;
    height:50px;
    margin:3px;
    padding:20px;">Liste Des Evenements</h1>
    
 <?php
    $db_server = 'localhost'; // Adresse du serveur MySQL
    $db_name = 'crud';            // Nom de la base de données
    $db_user_login = 'root';  // Nom de l'utilisateur
    $db_user_pass = '';       // Mot de passe de l'utilisateur

    // Ouvre une connexion au serveur MySQL
    $conn = mysqli_connect($db_server,$db_user_login, $db_user_pass, $db_name);


     // Récupère la recherche
     $recherche = isset($_POST['recherche']) ? $_POST['recherche'] : '';

     // la requete mysql
     $q = $conn->query(
     "SELECT Id, Name, Location, Date_event FROM data
      WHERE Name LIKE '%$recherche%'
      OR Location LIKE '%$recherche%'
      LIMIT 10");


     // affichage du résultat
     while( $r = mysqli_fetch_array($q)){
     echo 'Résultat de la recherche: '.$r['Id'].', '.$r['Name'].', '.$r['Location'].', '.$r['Date_event'].' <br />'
;
     }

?>

</body>
</html>
