<?php // Début du PHP 


$nom	= $_POST["nom"]; 
$prenom = $_POST["prenom"]; 
$to = "marc.dulche@numericable.fr"; 


$entete = "MIME-Version: 1.0\r\n"; 
$entete .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
$entete .= "From: $from <xxxx@free.fr>\r\n"; 
$entete .= "Reply-to: $from\r\n"; 
$entete .= "X-Mailer: PHP\r\n"; 
$entete .= "X-Priority: 1\r\n"; 
$entete .= "Return-Path: <xxxx@free.fr> \r\n"; 

//sujet du mail 
$sujet = "Demande\r\n"; 
//preparation du texte du mail (\r\n correspond au retour à la ligne) 
$mge = "Vous avez reçu une demande : \r\n Nom : ".$nom."\r\n Prenom : ".$prenom."\r\n"; 

//Envoi du mail 
if (mail($to,$sujet,$mge,$entete)) 
{ 
echo "OK"; 
}	
else 
{ 
echo phpinfo ();
echo "KO"; 
} 

// Fin du PHP 


?>