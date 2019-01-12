<?php
	/*	=================================================================================================
		Fichier : utilisateur.class.php
		Auteur : Ravinet Marianne, Cyrille Gandon
	
		Description : Classe PHP regroupant toutes les fonctions de manipulations d'un utilisateur 
		(inscription, connexion, mon compte, etc...)
	=================================================================================================	*/
	
	class Utilisateur {
		private $id;
		private $pseudo;
		private $motDePasse;
		private $email;
		private $nom;
		private $prenom;
		private $dateDeNaissance;
		private $sexe;
		private $adresse;
		private $ville;
		private $codePostal;
		private $pays;
		private $urlAvatar;
		private $participeAuConcours;
		private $admin = false;
		private $droits;

		
		//Constructeur
		function Utilisateur($idMembre){
			//Si l'utilisateur est déjà connecté, cette fonction ira dans la bdd lire les infos sur l'utilisateur désigné
			//Variables utilisées :
			$requete;
			$ligne;
			//Connexion à la bdd :
			$pdo = connectionBDD();
			//On prépare la requête (entre autre contre les injections avec pdo->prepare)
		    $requete = $pdo->prepare("SELECT * FROM membres WHERE id_membre='".$idMembre."'");
		    //On effectue la requete
		    $requete->execute();
		    //On met sous forme d'objet la réponse à la reqête 
		    $ligne = $requete->fetch(PDO::FETCH_ASSOC);
		    //print_r ($ligne);
		    $pdo = null;
		    //Si il y a un résultat sinon c'est une erreur de membre inexistant		    
		    if($ligne == true)
		    {		      
		        $this->id = $ligne['id_membre'];
		        $this->pseudo = $ligne['pseudo'];
		        $this->motDePasse = $ligne['mot_de_passe'];
		        $this->nom = $ligne['nom'];		    
		        $this->prenom = $ligne['prenom'];
		        $this->email = $ligne['email'];
		        $this->sexe = $ligne['sexe'];
		        $this->dateDeNaissance = $ligne['date_de_naissance'];
		        $this->adresse = $ligne['adresse'];
		        $this->ville = $ligne['ville'];
		        $this->codePostal = $ligne['code_postal'];
		        $this->pays = $ligne['pays'];
		        $this->urlAvatar = $ligne['url_avatar'];
		        $this->participeAuConcours = $ligne['participe_au_concours'];
		        $this->admin = $ligne['admin'];
		    }
			$this->droits();
		}
		/*
		 * Fonction droits() permet de connaitre les droits de l'utilisateur
		 */
		private function droits(){
			//On se connecte à la base de données
		    $pdo = connectionBDD();
		    //On prépare la requête (entre autre contre les injections avec pdo->prepare)
		    $requete = $pdo->prepare("SELECT nom FROM droits, dispose_de WHERE dispose_de.id_membres =".$this->id." AND dispose_de.id_droits = droits.id_droit");
		    //On effectue la requete
		    $requete->execute();		    
		    //On met sous forme de tableau la réponse à la reqête 
		    $ligne = $requete->fetch(PDO::FETCH_ASSOC);
		    		    
		    
		    while($ligne == true)
		    {
		    	$this->droits[$ligne['nom']] = true;
		       /* switch($ligne['nom']){
		        	case "gestionMembres":
		        		$this->gestionMembres = true;
		        		break;
		        	case "gestionVideos":
		        		$this->gestionVideos = true;
		        		break;
		        	case "gestionCommentaires":
		        		$this->gestionCommentaires =true;
		        		break;		        	
		        }*/
		        $ligne = $requete->fetch(PDO::FETCH_ASSOC);
		    }
		    $pdo = null;
		}
		/**
		 * 	Permet d'inscrire un utilisateur au site.
		 * @param $pseudo
		 * @param $motDePasse1
		 * @param $motDepasse2
		 * @param $nom
		 * @param $prenom
		 * @param $sexe
		 * @param $dateDeNaissance
		 * @param $email1
		 * @param $email2
		 * @param $adresse
		 * @param $ville
		 * @param $codePostal
		 * @param $pays
		 * @param $participeAuConcours
		 * @return boolean => true = ok, false = erreur
		 */
		public static function inscription($pseudo, $motDePasse, $nom, $prenom, $sexe, $dateDeNaissance, $email, $adresse, $ville, $codePostal, $pays, $participeAuConcours){
			$retour = true;
			if($pseudo == "" || $motDePasse == "" ||$email == ""){
				$retour = false;
			}
			if($dateDeNaissance =="")
				$dateDeNaissance = "0000-00-00";
			else{
				$dateDeNaissance2 = explode("/", $dateDeNaissance);
				$dateDeNaissance = $dateDeNaissance2[2]."-".$dateDeNaissance2[1]."-".$dateDeNaissance2[0];

			}
			if ($retour)
			{
				//On crypte le mot de passe :
				$motDePasseCrypt =  md5("mamy87".$motDePasse."papy15");
				//On se connecte à la base de données
			    $pdo = connectionBDD();
			    //On prépare la requête (entre autre contre les injections avec pdo->prepare)
			    //id_membre 	pseudo 	mot_de_passe 	nom 	prenom 	email 	sexe 	date_de_naissance 	adresse 	ville 	code_postal 	pays 	url_avatar 	participe_au_concours 	admin
			    $requete = $pdo->prepare("INSERT INTO membres VALUES(0, '".$pseudo."', '".$motDePasseCrypt."', '".$nom."', '".$prenom."', '".$email."', '".$sexe."', '".$dateDeNaissance."', '".$adresse."', '".$ville."', '".$codePostal."', '".$pays."', '', '".$participeAuConcours."', '0')"); 
			    //On effectue la requete			   
			    $retour = $requete->execute();
			   //print_r($requete->errorInfo());
			    
			}
			return $retour;
		}
		/**
		 * Function pseudoDejaUtilise
		 * Vérifie si le pseudo n'est pas déjà utilisé
		 * @param $pseudo
		 * @return boolean : true si déjà utilisé
		 */
		public static function pseudoDejaUtilise($pseudo){
				//On se connecte à la base de données
			    $pdo = connectionBDD();
			    //On prépare la requête
			    $requete = $pdo->prepare("SELECT id_membre FROM membres WHERE pseudo='".$pseudo."'");
			    //On effectue la requete
			    $requete->execute();
			    $ligne = $requete->fetch(PDO::FETCH_ASSOC);
			    //Si il y a un résultat c'est que l'utilisateur existe déjà
			    //print_r($ligne);
			    if($ligne == true)
			    	return true;
			    else
			    	return false;
		}
			/**
		 * Function emailDejaUtilise
		 * Vérifie si l'email n'est pas déjà utilisé
		 * @param $pseudo
		 * @return boolean : true si déjà utilisé
		 */
		public static function emailDejaUtilise($email){
				//On se connecte à la base de données
			    $pdo = connectionBDD();
			    //On prépare la requête
			    $requete = $pdo->prepare("SELECT id_membre FROM membres WHERE email='".$email."'");
			    //On effectue la requete
			    $requete->execute();
			    $ligne = $requete->fetch(PDO::FETCH_ASSOC);
			    //Si il y a un résultat c'est que l'email est déjà utilisée
			    //print_r($ligne);
			    if($ligne == true)
			    	return true;
			    else
			    	return false;
		}
		public static function connexion($pseudoUtilisateur, $motDePasse, $varSession){					
			/*
			 * Utilisation :
			 * un utilisateur veut se connecter, on appelle la fonction en indiquant le nom de l'utilisateur et le mot ed passe indiqué
			 * la fonction vérifie si cela correspond bien, si oui on renvoie true, si non on renvoie false
			 * 
			 */
			//Variables utilisées :				
			$requete;
			$ligne;
			$retour = false;
			$motDePasseCrypt;
			
			//On crypte le mot de passe :
			$motDePasseCrypt =  md5("mamy87".$motDePasse."papy15");
			//On se connecte à la base de données
		    $pdo = connectionBDD();
		    //On prépare la requête (entre autre contre les injections avec pdo->prepare)
		    $requete = $pdo->prepare("SELECT id_membre FROM membres WHERE pseudo='".$pseudoUtilisateur."' AND mot_de_passe='".$motDePasseCrypt."'");
		    //On effectue la requete
		    $requete->execute();
		    $ligne = $requete->fetch(PDO::FETCH_ASSOC);
		    //print_r ($ligne);
		    //Si il y a un résultat c'est que l'utilisateur c'est bien logé
		    if($ligne == true)
		    {			      
		        $_SESSION[$varSession] = $ligne['id_membre'];//On créer une variable session qui à pour valeur le pseudo de l'utilisateur logé
		        $retour = true; //On retourne true pour dire que tout c'est bien passé
		    }
		    //Sinon c'est que le mot de passe ou le nom d'utilisateur n'est pas bon
		    else
		    {
		        $retour = false;//Si c'est pas bon on renvoie false
		    }
		    $pdo = null;
		    return $retour;
		} 
		/*
		 *  Fonction deconnexion, detruit les variables de sessions utilisé par la classe
		 */
		public static function deconnexion($varSession){			
			unset($_SESSION[$varSession]);
			if(isset($_SESSION[$varSession]))
				return false;
			else
				return true;
		}
		/*
		 *  Fonction sauverLUtilisateur, permet de sauvegarder l'utilisateur dans la bdd avec des modifications
		 *  Retourne false si la sauvegarde à échouée
		 */
		public function sauvegarderLUtilisateur(){
			//On se connecte à la base de données
		    $pdo = connectionBDD();
		    //On prépare la requête (entre autre contre les injections avec pdo->prepare)
		    //id_membre 	pseudo 	mot_de_passe 	nom 	prenom 	email 	sexe 	date_de_naissance 	adresse 	ville 	code_postal 	pays 	url_avatar 	participe_au_concours 	admin
		    $requete = $pdo->prepare("UPDATE membres SET pseudo = '".$this->pseudo."',
		    										 mot_de_passe = '".$this->motDePasse."', 
		    										 nom = '".$this->nom."', 
		    										 prenom ='".$this->prenom."', 
		    										 email = '".$this->email."', 
		    										 sexe = '".$this->sexe."', 
		    										 date_de_naissance = '".$this->dateDeNaissance."', 
		    										 adresse = '".$this->adresse."', 
		    										 ville = '".$this->ville."', 
		    										 code_postal = '".$this->codePostal."', 
		    										 pays = '".$this->pays."', 
		    										 url_avatar = '".$this->urlAvatar."', 
		    										 participe_au_concours = '".$this->participeAuConcours."'
		    										 WHERE id_membre = '".$this->id."'");
		    //On effectue la requete			   
		    $retour = $requete->execute();
		    //print_r($requete->errorInfo());			
			
			return $retour;
		}
		/*
		 * 	Fonction supprimerLUtilisateur, Static, supprime le membre de la base de donnée
		 */
		public static function supprimerLUtilisateur($id_membre){
			//On se connecte à la base de données
		    $pdo = connectionBDD();		   
		    $requete = $pdo->prepare("DELETE FROM membres WHERE id_membre =".$id_membre); 
		    //On effectue la requete			   
		    $retour = $requete->execute();
		    //print_r($requete->errorInfo());
			return $retour;
		}
		/*
		 * Renvoie true si l'utilisateur est un admin, false sinon
		 */
		public function isAdmin(){
			if($this->admin == 1)
			 	return true;
			else
			 	return false;
		}
		/*
		 * Renvoie true si l'utilisateur a le droit rentré en paramètre
		 * Renvoie false si l'utilisateur n'a pas le droit ou si ce dernier n'existe pas
		 */
		public function aLeDroit($leDroit){
			if(isset($this->droits[$leDroit]))
				return $this->droits[$leDroit];
			else
				return false;
		}
		public function hasAvatar(){
			if($this->urlAvatar != "")
				return true;
			else
				return false;
		}
		public function getID(){
			return $this->id;
		}
		public function getAvatar(){
			return $this->urlAvatar;
		}
		public function getPseudo(){
			return $this->pseudo;
		}
		public function getNom(){
			return $this->nom;
		}
		public function getPrenom(){
			return $this->prenom;
		}
		public function getDateDeNaissance(){
			$dateDeNaissance2 = explode("-", $this->dateDeNaissance);
			$dateDeNaissance = $dateDeNaissance2[2]."/".$dateDeNaissance2[1]."/".$dateDeNaissance2[0];			
			return $dateDeNaissance;
		}
		public function getSexe(){
			return $this->sexe;
		}
		public function getEmail(){
			return $this->email;
		}
		public function getAdresse(){
			return $this->adresse;
		}
		public function getVille(){
			return $this->ville;
		}
		public function getCodePostal(){
			return $this->codePostal;
		}
		public function getPays(){
			return $this->pays;
		}
		public function isParticipeAuConcours(){
			return $this->participeAuConcours;
		}
		/** Les SETEURS **/
		public function setPseudo($nvPseudo){
			if($nvPseudo != "")
				$this->pseudo = $nvPseudo;
		}
		public function setAvatar($nvAvatar){
			$this->urlAvatar = $nvAvatar;
		}
		public function setNom($nvNom){
			$this->nom = $nvNom;
		}
		public function setPrenom($nvPrenom){
			$this->prenom = $nvPrenom;
		}
		public function setDateDeNaissance($nvDate){
			if($nvDate != ""){
				$dateDeNaissance2 = explode("/", $nvDate);
				$dateDeNaissance = $dateDeNaissance2[2]."-".$dateDeNaissance2[1]."-".$dateDeNaissance2[0];			
				$this->dateDeNaissance = $dateDeNaissance;
			}
		}
		public function setSexe($nvSexe){
			$this->sexe = $nvSexe;
		}
		public function setEmail($nvEmail){
			if($nvEmail != "")
				$this->email = $nvEmail;
		}
		public function setAdresse($nvAdresse){
			$this->adresse= $nvAdresse;
		}
		public function setVille($nvVille){
			$this->ville = $nvVille;
		}
		public function setCodePostal($nvCodePostal){
			$this->codePostal = $nvCodePostal;
		}
		public function setPays($nvPays){
			$this->pays = $nvPays;
		}
		public function setParticipeAuConcours($nvChoix){
			$this->participeAuConcours = $nvChoix;
		}
		public function setMotDePasse($nvPassword){
			if($nvPassword != "")
				$this->motDePasse = md5("mamy87".$nvPassword."papy15");
		}
	}
?>