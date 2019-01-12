<?php
/*Echo "Connecter ou pas";
Echo "affiche un cadena";
$_SESSION['membre'] = "Marc";*/
/*
<?php
include("script\Connecter.php")
?>
*/

session_start();
if(isset($_SESSION['membre']))
{
	echo '<img class="cadenasOuvert" src="../images/cadenasOuvert32x32.png" alt="Grapefruit slice atop a pile of other slices" />';
}
else
{
	echo '<img class="cadenasOuvert" src="../images/cadenasFerme32x32.png" alt="Grapefruit slice atop a pile of other slices" />';
}
//Echo '<img class="cadenasOuvert" src="../images/cadenasFerme32x32.png" alt="Grapefruit slice atop a pile of other slices" />';
?>