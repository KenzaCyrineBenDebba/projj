<?php
$objetPdo= new PDO('mysql:host=localhost;dbname=crud','root','');
$pdoStat= $objetPdo->prepare('SELECT * FROM avis');
$executeIs0k=$pdoStat->execute();
$avis=$pdoStat->fetchAll();

?>
<!Doctype html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	  <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body style="background-image: url('bb.jpg')">
		
<h1 style="background-color:Green;
text-align:center;
	height:50px;
	margin:3px;
	padding:20px;">Liste Des avis</h1>
<ul>
	<?php foreach ($avis as $aviss): ?>
	<li style="font-weight:bold; color:white "> <h2>
		<?= $aviss['Name']?> <?= $aviss['Email']?> <?= $aviss['Feedback']?>
	</h2></li>
	<br>
	<?php endforeach; ?>
</ul>
</body>
</html>
