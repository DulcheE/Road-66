Classe utilisateur pour gestion simple de login et droits---------------------------------------------------------
Url     : http://codes-sources.commentcamarche.net/source/50973-classe-utilisateur-pour-gestion-simple-de-login-et-droitsAuteur  : ArchimaDate    : 02/08/2013
Licence :
=========

Ce document intitulé « Classe utilisateur pour gestion simple de login et droits » issu de CommentCaMarche
(codes-sources.commentcamarche.net) est mis à disposition sous les termes de
la licence Creative Commons. Vous pouvez copier, modifier des copies de cette
source, dans les conditions fixées par la licence, tant que cette note
apparaît clairement.

Description :
=============

J'ai fait cette source dans le cadre d'un projet en cours.
<br />Elle permet un
e utilisation d'utilisateurs avec login/mot de passe et des droits assez simplem
ent.
<br />Il n'y a que la classe, pas de mise en page de l'administration ou q
uoique ce soit, c'est au programmeur de faire tout &ccedil;a. La classe fournit 
juste les outils pour utiliser une base de donn&eacute;es avec des utilisateurs 
et des droits.
<br />
<br />Le code parlera mieux que moi ;)
<br />
<br />Il
 y a 3 tables : membres, droits, dispose_de
<br />La table membre contient les 
membres. Le champ admin indique si le membre poss&egrave;de des droits ou non.

<br />La table droits contient les droits avec une id, un nom et une description
.
<br />La table dispose_de indique les droits qu'a tel ou tel membre.
<br />

<br />Il y a plusieurs m&eacute;thodes :
<br />function Utilisateur($idMembre)
;
<br />private function droits();
<br />public static function inscription($p
seudo, $motDePasse, $nom, $prenom, $sexe, $dateDeNaissance, $email, $adresse, $v
ille, $codePostal, $pays, $participeAuConcours);
<br />public static function p
seudoDejaUtilise($pseudo);
<br />public static function emailDejaUtilise($email
);
<br />public static function connexion($pseudoUtilisateur, $motDePasse, $var
Session);
<br />public static function deconnexion($varSession);
<br />public 
function sauvegarderLUtilisateur();
<br />public static function supprimerLUtil
isateur($id_membre);
<br />public function isAdmin();
<br />public function aL
eDroit($leDroit);
<br />+ geteur;
<br />+ seteur;
<br />
<br />Je sais que j
e n'utilise pas toute la puissance du php objet dans ma classe, mais je vais m'y
 mettre un de ces quatre matins ;)
<br /><a name='source-exemple'></a><h2> Sour
ce / Exemple : </h2>
<br /><pre class='code' data-mode='basic'>
Pour créer le
s tables :

CREATE TABLE IF NOT EXISTS `dispose_de` (
  `id_dispose` int(11) 
NOT NULL AUTO_INCREMENT,
  `id_droits` int(11) NOT NULL,
  `id_membres` int(11
) NOT NULL,
  PRIMARY KEY (`id_dispose`),
  KEY `id_droits` (`id_droits`),
  
KEY `id_membres` (`id_membres`)
);

CREATE TABLE IF NOT EXISTS `droits` (
  
`id_droit` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) DEFAULT NULL,

  `description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_droit`)
);

CR
EATE TABLE IF NOT EXISTS `membres` (
  `id_membre` int(11) NOT NULL AUTO_INCREM
ENT,
  `pseudo` varchar(20) NOT NULL,
  `mot_de_passe` varchar(50) NOT NULL,

  `nom` varchar(20) DEFAULT NULL,
  `prenom` varchar(20) DEFAULT NULL,
  `emai
l` varchar(40) NOT NULL,
  `sexe` varchar(1) DEFAULT NULL,
  `date_de_naissanc
e` date DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `ville` varchar(
30) DEFAULT NULL,
  `code_postal` varchar(10) DEFAULT NULL,
  `pays` varchar(2
5) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `url_avatar` varchar(50)
 DEFAULT NULL,
  `participe_au_concours` tinyint(1) DEFAULT NULL,
  `admin` ti
nyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_membre`)
);

#Exemples d'u
tilisations (extrais d'une application) :

=&gt;Connecter un utilisateur :
$T
EXTE_connexion = &quot;&quot;; // Texte qui sera mit au module connexion si nécé
ssaire
if (isset($_POST[&quot;pseudo&quot;]) &amp;&amp; isset($_POST[&quot;pass
word&quot;]))
{
	//On execute la fonction connexion qui renvoie true ou false

	$validation = Utilisateur::connexion($_POST[&quot;pseudo&quot;], $_POST[&quot;
password&quot;], &quot;membre&quot;);				
	if(!$validation){// Si la connexion 
a échoué on l'indique en rajoutant un texte près du module 
		$TEXTE_connexion 
= &quot;Pseudo inexistant ou mot de passe invalide&quot;;
	}
}

=&gt;Un fois
 connecté :
//# Si le membre est connecté on créer son objet (le membre est con
necté quand la variable de session existe, voir fonction Utilisateur::connexion 
)	
if(isset($_SESSION['membre'])){
	$leMembre = new Utilisateur($_SESSION['mem
bre']);
	//print_r($leMembre);
}

=&gt; Exemple pour un panneau d'admin :
i
f(isset($leMembre) &amp;&amp; $leMembre-&gt;isAdmin()){
	...
	if($leMembre-&gt
;aLeDroit(&quot;gestionMembres&quot;))
		echo '&lt;img id=&quot;boutonMembres&q
uot; src=&quot;images/onglet_membre_actif.png&quot; alt=&quot;membres&quot; /&gt
;';
	...
	if($leMembre-&gt;aLeDroit(&quot;gestionMembres&quot;)){
		//LISTAGE
 DES MEMBRES ICI
		echo '	&lt;!-- Liste des membres --&gt;
			&lt;table id=&qu
ot;liste_membres&quot;&gt;...';
	}
}

=&gt; Changer le nom de l'utilisateur 
:
$leMembre-&gt;setPrenom($_POST['prenom']);
$retour = $leMembre-&gt;sauvegard
erLUtilisateur();
if(!$retour)
	$TEXTE_compte .= &quot;ECHEC de la sauvegarde 
des modifications.&quot;;

=&gt; Supprimer un utilisateur :
if(!Utilisateur::
supprimerLUtilisateur($_GET['suppmbr']))
	$TEXTE_admin = &quot;Erreur à la supp
ression du membre.&lt;br/&gt;&quot;;

=&gt; Inscrire un utilisateur :
Utilisa
teur::inscription($_POST['pseudoInscription'], $_POST['passwordInscription'], $_
POST['nom'], $_POST['prenom'], $_POST['sexe'], $_POST['dateNais'], $_POST['email
'], $_POST['adresse'], $_POST['ville'], $_POST['codePostal'], $_POST['pays'], $p
articipeAuConcours);
</pre>
<br /><a name='conclusion'></a><h2> Conclusion : <
/h2>
<br />Bon, voila, y a pas mal de commentaire je pense, donc &ccedil;a dev
rai aller. C'est pas du php haut niveau, mais &ccedil;a reste quand m&ecirc;me p
our les initi&eacute;s.
<br />
<br />Si vous avez des questions ou autre, n'h&
eacute;sitez pas ;)
