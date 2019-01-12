<?php
Echo "Test de creation de session ";
$_SESSION['membre'] = "Marc";
if(!isset($_SESSION['Refresh']))
{ echo("<meta http-equiv='refresh' content='1'>");}
$_SESSION['Refresh'] = 1; 
?>