<?php

class Insert_offer_model extends CI_Model{
	
	public function salvesta($options = array()){
		$this->load->database();
		// Calling procedure from database
		$stored_procedure = "CALL addNewOffer(?,?,?,?,?,?,?)";
		
		if($this->db->query($stored_procedure,array('pealkiri'=>$options['pealkiri'],'sisu'=>$options['sisu'],'tunnitasu'=>$options['tunnitasu'],'algus'=>$options['begindate'],'lõpp'=>$options['enddate'],'asukoht'=>$options['asukoht'], 'userId'=>$options['userId'])))
			return 1;
	}

}

?>