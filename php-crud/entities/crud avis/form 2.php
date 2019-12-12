<?php
$objetPdo= new PDO('mysql:host=localhost;dbname=crud','root','');
$pdoStat= $objetPdo->prepare('SELECT * FROM avis');
$executeIs0k=$pdoStat->execute();
$crud=$pdoStat->fetchAll();

function rechercheravis($name){
		$sql="SELECT * from avis where name=$name";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
?>
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
<form name="f" action="recherche2.php" method="POST">
        <input type="text" placeholder="rechercher" value="" maxlength="100" name="rechercher">
         <input class="btn btn-success btn-xs" type="submit" value="rechercher">
        </form>



<h1 style="background-color:Green;
text-align:center;
	height:50px;
	margin:3px;
	padding:20px;">Liste Des avis</h1>
	


<table id="myTable">
  <tr>
   <!--When a header is clicked, run the sortTable function, with a parameter, 0 for sorting by names, 1 for sorting by country:-->  
    <th style="color:black; font-size: 15pt" onclick="sortTable(0)">Name</th> 
    <th style="color:black; font-size: 15pt"onclick="sortTable(1)">Email</th> 
	<th style="color:black; font-size: 15pt" onclick="sortTable(2)" >Feedback</th> 
  </tr>
	<?php foreach ($crud as $datas): ?>
	
  <tr>
    <td style="color:black; font-size: 15pt"><?= $datas['Name']?></td>
    <td style="color:black; font-size: 15pt"> <?= $datas['Email']?></td>
	<td style="color:black; font-size: 15pt"> <?= $datas['Feedback']?></td>

  </tr>


	<?php endforeach; ?>
	</table>
</body>
</html>
