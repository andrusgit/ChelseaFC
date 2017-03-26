<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Offers extends CI_Controller {
    
    public function showall()  
    {  
	  
		if(!isset($_SESSION)) { 
			session_start();
		}
		
		$title['title'] = lang('OFFERS_PAGE_TITLE');
		$this->load->model('Offer');  
        //load the method of model  
        $data['h']=$this->Offer->getOffers();
		if($this->session->userdata('isUserLoggedIn')){
			$this->load->view('headloggedin', $title);	
		}else{
			$this->load->view('head', $title);	
		}
		$this->load->view('offers', $data);  
		$this->load->view('footer');
   
	
	}
	  
}

?>