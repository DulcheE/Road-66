<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Raspberry Pi Gpio</title>
    </head>
 
    <body style="background-color: black;">
     <!-- On/Off button's picture -->
	 <?php
	 //this php script generate the first page in function of the gpio's status
	 $status = array (0, 0, 0);
	 echo ("</br></br><p style='text-align:center'><img align='middle' src='data/img/Bandeau/Bandeau.png' alt='Titre'/></p></br></br></br>");
	 for ($i = 0; $i < count($status); $i++) {
		//set the pin's mode to output and read them
		system("gpio mode ".$i." out");
		exec ("gpio read ".$i, $status[$i], $return );
		//if off
		if ($status[$i][0] == 0 ) {
		$Etat="Fermeture" ;
		echo ("</br></br></br><img id='button_".$i."' src='data/img/red/red_".$i.".png' alt='off'/></br>");
		}
		//if on
		if ($status[$i][0] == 1 ) {
		$Etat="Ouverture";
		echo ("</br></br></br><img id='button_".$i."' src='data/img/green/green_".$i.".png' alt='on'/></br>");
		}	 
		//echo "Derniere action : ".$Etat." du port " .$i;
	 }
	 ?>
	 
	 <!-- javascript -->
	 <script src="script.js"></script>
    </body>
</html>