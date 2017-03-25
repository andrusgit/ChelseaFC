<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Offer extends CI_Model{
	
	function __construct()  
    {  
        // Call the Model constructor  
		parent::__construct();  
    }
	
	public function getOffers(){
		
		$query = $this->db->query("SELECT * FROM view_JobOffersWithUser ORDER BY 'Price per hour' DESC");
		return $query;
	
	}
	
}

?>