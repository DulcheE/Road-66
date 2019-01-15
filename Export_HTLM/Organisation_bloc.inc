<?php

	include "Organisation_sub_bloc.inc";


	class Organisation_bloc {

		private $order;

		function Organisation_bloc(int $order){
			$this->order = $order;

		}

		public function display(){
			$db = new Mysqli("localhost", "root", "");

			$db->query("SELECT user_id FROM organisation LIMIT 2 OFFSET " + ($this->order - 1) );

			$fetch = $db->fetch();

			if($fetch->length > 0){

				echo "
	<!-- /m_editable -->
    <div class=\"clearfix colelem\" id=\"ppu28421\"><!-- group -->";


				$sub_bloc1 = new Organisation_sub_bloc($fetch[0]);

				$sub_bloc1->display();


				echo "
	 <div class=\"shadow rounded-corners grpelem\" id=\"u28399\"><!-- content -->
      <div class=\"fluid_height_spacer\"></div>
     </div>";


				if($fetch->length > 1){

					$sub_bloc2 = new Organisation_sub_bloc($fetch[1]);

					$sub_bloc2->display();

				}else{

					Organisation_sub_bloc->display_empty();

				}

				echo "
	<!-- /m_editable -->
    </div>";

			}



			$db->close();
		}

	}

?>