<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Offers extends CI_Controller {
    
    public function showall()  
    {  
	  
		if(!isset($_SESSION)) { 
			session_start();
		}

		$this->load->model('Offer');  
        //load the method of model  
        $data['h']=$this->Offer->getOffers();
        //return the data in view  
        $this->load->view('head');	
		$this->load->view('offers', $data);  
		$this->load->view('footer');
   
	
	}

	public function showAmountOfOffersByUser()
	{
		
		if(!isset($_SESSION)) { 
			session_start();
		}
	
		$this->load->model('Offer');  
        //load the method of model  
        $data['h']=$this->Offer->getOffersAmountByUserId("6");  
        //return the data in view  	
		$this->load->view('headloggedin');	
		$this->load->view('account', $data);  
		$this->load->view('footer');		
		
	}
	  
}

?>