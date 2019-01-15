<?php

	class Organisation_bloc {

		private $order;

		function Organisation_bloc(int $order){
			$this->order = $order;

		}

		public function display(){
			$db = new Mysqli("localhost", "root", "");

			$db->query("SELECT Nom, Prenom, Pseudo, ID_Participer FROM organisation WHERE ( ID_User = " + $this->order + " )" );

			$fetch = $db->fetch();

			if($fetch->length > 0){

				echo "
	 <div class=\"clearfix grpelem\" id=\"pu28421\"><!-- group -->
      <div class=\"shadow rounded-corners grpelem\" id=\"u28421\"><!-- content -->
       <div class=\"fluid_height_spacer\"></div>
      </div>
      <!-- m_editable region-id=\"editable-static-tag-U28422-BP_infinity\" template=\"l-organisation.html\" data-type=\"html\" data-ice-options=\"disableImageResize,link,txtStyleTarget\" -->
      <div class=\"clearfix grpelem\" id=\"u28422-14\" data-muse-temp-textContainer-sizePolicy=\"true\" data-muse-temp-textContainer-pinning=\"true\" data-muse-uid=\"U28422\" data-muse-type=\"txt_frame\" data-IBE-flags=\"txtStyleSrc\"><!-- content -->";

				
				echo "
       <p id=\"u28455-2\">Nom : ". $fetch["Nom"] ."</p>
       <p id=\"u28455-4\">Prénom : ". $fetch["Prenom"] ."</p>
       <p id=\"u28455-6\">Pseudo : ". $fetch["Pseudo"] ."</p>
       <p id=\"u28455-7\">&nbsp;</p>
       <p id=\"u28455-9\">Véhicule :</p>
       <p id=\"u28455-10\">&nbsp;</p>
       <p id=\"u28455-12\"> ". $fetch["ID_Participer"] ."</p>";
				
				
				echo "
	  </div>
      <!-- /m_editable -->
      <div class=\"shadow rounded-corners grpelem\" id=\"u28456\"><!-- simple frame --></div>
     </div>";

			}



			$db->close();
		}
		
		
		
		
		static public function display_empty(){
			
			echo "
	  <div class=\"clearfix grpelem\" id=\"pu28454\"><!-- group -->
      <div class=\"shadow rounded-corners grpelem\" id=\"u28454\"><!-- content -->
       <div class=\"fluid_height_spacer\"></div>
      </div>
      <!-- m_editable region-id=\"editable-static-tag-U28455-BP_infinity\" template=\"l-organisation.html\" data-type=\"html\" data-ice-options=\"disableImageResize,link,txtStyleTarget\" -->
      <div class=\"clearfix grpelem\" id=\"u28455-14\" data-muse-temp-textContainer-sizePolicy=\"true\" data-muse-temp-textContainer-pinning=\"true\" data-muse-uid=\"U28455\" data-muse-type=\"txt_frame\" data-IBE-flags=\"txtStyleSrc\"><!-- content -->
       <p id=\"u28455-2\">Nom :</p>
       <p id=\"u28455-4\">Prénom :</p>
       <p id=\"u28455-6\">Pseudo :</p>
       <p id=\"u28455-7\">&nbsp;</p>
       <p id=\"u28455-9\">Véhicule :</p>
       <p id=\"u28455-10\">&nbsp;</p>
       <p id=\"u28455-12\">Participer à l''aventure depuis Chicago</p>
      </div>
      <!-- /m_editable -->
      <div class=\"shadow rounded-corners grpelem\" id=\"u28456\"><!-- simple frame --></div>
     </div>";
			
		}

	}

?>