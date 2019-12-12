<?
if (isset($_COOKIE[$name]))
header("Location: ".$_SERVER['HTTP_REFERER']); 
else
{
  if (isset($name))
  {
setcookie($name, $name, time()+60*60*24*30,"/");


if (file_exists("votes/$name.txt"))
{
$fp = fopen("votes/$name.txt", "r");
$ligne = fgets($fp,4096);

// Acquisition des variables

$tt_votes = strrchr($ligne, "|");
$tt_votes = str_replace("|", "", $tt_votes);
$tt_votes = trim($tt_votes);
$ligne = strrev($ligne);
$nb_votes = strrchr($ligne, "|");
$nb_votes = strrev($nb_votes);
$nb_votes = str_replace("|", "", $nb_votes);
$nb_votes = trim($nb_votes);
fclose($fp);

// Calculs

$nb_votes++;
$tt_votes = $tt_votes + $note;
}
// Création du fichier s'il n'existe pas

else
{
touch("votes/$name.txt");
$nb_votes = 1;
$tt_votes = $note;

}

// Ajout des données


$fp = fopen("votes/$name.txt","w");
fputs($fp, "$nb_votes|$tt_votes");
fclose($fp);

header("Location: ".$_SERVER['HTTP_REFERER']);
}
}

?>
