<?php
$objetPdo= new PDO('mysql:host=localhost;dbname=crud','root','');
$pdoStat= $objetPdo->prepare('SELECT * FROM data');
$executeIs0k=$pdoStat->execute();
$data=$pdoStat->fetchAll();

?>
<!Doctype html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	  <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body style="background-image: url('wow.jpg')">
		
<h1 style="background-color:Green;
text-align:center;
	height:50px;
	margin:3px;
	padding:20px;">Liste Des Evenements</h1>
<ul>
	<?php foreach ($data as $datas): ?>
	<li style="font-weight:bold; color:white "> <h2>
		<?= $datas['Name']?> <?= $datas['Location']?> <?= $datas['Date_event']?>
	</h2></li>
	<br>
	<?php endforeach; ?>
</ul>
</body>
</html>
