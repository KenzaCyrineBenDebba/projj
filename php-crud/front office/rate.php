<?php
function rate($name)
{

if (file_exists("votes/$name.txt")) {

$fp = fopen("votes/$name.txt", "r");
$ligne = fgets($fp,4096);

//we retrieve variables

$tt_votes = strrchr($ligne, "|");
$tt_votes = str_replace("|", "", $tt_votes);
$tt_votes = trim($tt_votes);

$ligne = strrev($ligne);
$nb_votes = strrchr($ligne, "|");
$nb_votes = strrev($nb_votes);
$nb_votes = str_replace("|", "", $nb_votes);
$nb_votes = trim($nb_votes);

fclose($fp);

// Calculs :

if (($tt_votes == 0) AND ($nb_votes == 0))
{
// Si fichier vide
$etoiles_oui = 0;
$note = "0.00";
}
else
{
$moy_en = $tt_votes/$nb_votes;
$etoiles = round($moy_en);

$note = round($moy_en, 2);
}

$Result = "<table border='0' width='100%' ><tr><td width='50%'>";
if ($nb_votes > 0)
{
$Result .="<img src=\"rating/".$etoiles."stars.gif\" border=\"0\" alt=\"Rate\">";

$Result .="  (<strong><font size=3>Ratings: ".$note."  /  5</strong>";
$Result .=" - <strong>Votes:  ".$nb_votes."</strong></font>)";
}
else $Result .="<font size=3><strong>rate this event</strong></font> ";
if (!isset($_COOKIE[$name]))
{
$Result.="</td><form name=\"rate\" action=\"takerate.php?name=$name\" method=\"post\"   onSubmit=\"alert('Thank you for voting!');\" > ";
$Result.="<td width=50% align=left><select name=\"note\">";
$Result.="<option value =\"5\"><a href = 5stars.html>5 - Excellent !</a></option>";
$Result.="<option value =\"4\">4 - Very Good !</option>";
$Result.="<option value =\"3\">3 - Fair !</option>";
$Result.="<option value =\"2\">2 - Ok !</option>";
$Result.="<option value =\"1\">1 - Poor !</option>";
$Result.="<option value =\"0\">0 - Awful !</option>";
$Result.="</select>";
$Result.=" <input type=\"submit\" value=\"Rate\"></td></form>";

}
else{

$Result.="<font size=3><strong> - You have already rated this software</strong></font>";

$Result.="</td></tr></table>";
}
}
else
{
$Result = "<table border='0' width='100%'><tr><td width=20%>";
$Result.="<strong><font size=3>rate this event</font></strong></td><form name=\"rate\" action=\"takerate.php?name=$name\" method=\"post\"   onSubmit=\"alert('Thank you for voting!');\" > ";
$Result.="<td width=80% align=left><select name=\"note\" style=\"margin: 0; font-size: 6 pt; font-family: Verdana; border: 0\">";
$Result.="<option value =\"5\">5 - Excellent !</option>";
$Result.="<option value =\"4\">4 - Very Good !</option>";
$Result.="<option value =\"3\">3 - Fair !</option>";
$Result.="<option value =\"2\">2 - Ok !</option>";
$Result.="<option value =\"1\">1 - Poor !</option>";
$Result.="<option value =\"0\">0 - Awful !</option>";
$Result.="</select>";
$Result.=" <input type=\"submit\" value=\"Rate\">";
$Result.="</td></form></tr></table>";
}

return $Result;
}

?>
