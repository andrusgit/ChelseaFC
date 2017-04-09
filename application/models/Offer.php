<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Offer extends CI_Model{
	
	function __construct()  
    {  
        // Call the Model constructor  
		parent::__construct();  
    }
	
	public function getOffers($start){
		$this->load->database();
		
		$query = $this->db->query("SELECT * FROM view_JobOffersWithUser ORDER BY Id DESC LIMIT " . $start . ", " . (OFFERSPRESENTED + 1));
		return $query->result_array();
	
	}
	
	public function getOffersAmountByUserId($userId){
		$userId = (int)$userId;
		
		/*$query = $this->db->query("SELECT COUNT(*) as Count FROM view_JobOffersWithUser Where UserId=".$userId);
		$data = mysqli_fetch_assoc($query);
		return $data['Count'];*/
		
		$con=mysqli_connect("localhost","chelseafccsut_toomastoomas","D,,}?]m_Z[R,","chelseafccsut_Users");
		$result = mysqli_query($con, "SELECT COUNT(*) as Count FROM view_JobOffersWithUser Where UserId=".$userId);
		$row = mysqli_fetch_assoc($result);
		$count = $row['Count'];
	
		return $count;
	
	}
	
}

?>