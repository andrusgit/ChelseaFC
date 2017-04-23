<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Offers extends CI_Controller {
    
    public function showall()  
    {  
	
		$this->session->set_userdata('referred_from', current_url());
	  
		if(!isset($_SESSION)) { 
			session_start();
		}
		
		$title['title'] = lang('OFFERS_PAGE_TITLE');
		$this->load->model('Offer');  
        	//load the method of model  
        	
        $data['h'] = json_encode($this->Offer->getOffers(0));
		if($this->session->userdata('isFbUserLoggedIn')){
			$this->load->view('fbhead', $title);
		}
		else if($this->session->userdata('isUserLoggedIn')){
			$this->load->view('headloggedin', $title);	
		}else{
			$this->load->view('head', $title);	
		}
		$this->load->view('offers', $data);  
		$this->load->view('footer');
   
	
	}
	public function loadnews($start) {
		$this->load->model('Offer');
			
		$this->data['h'] = $this->Offer->getOffers($start);
		$this->output->set_content_type('application/json')->set_output(json_encode($this->data['h']));
	}

	public function add() {
			
		$this->session->set_userdata('referred_from', current_url());
	  
		if(!isset($_SESSION)) { 
			session_start();
		}
		
		if($this->session->userdata('isUserLoggedIn')  || $this->session->userdata('isFbUserLoggedIn')){
            //$this->load->view(ANDRUSE_VIEW_KÄIB_SIIA, $vb_data_ka);

			$title['title'] = lang('OFFERS_PAGE_TITLE');
			if($this->session->userdata('isFbUserLoggedIn')){
				$this->load->view('fbhead', $title);
			}
			else if($this->session->userdata('isUserLoggedIn')){
				$this->load->view('headloggedin', $title);	
			}
			
			$this->load->view('addoffer');
			$this->load->view('footer');

		}else{
			$title['title'] = lang('UNAUTH_PAGE_TITLE');
			$this->load->view('head', $title);
			$this->load->view('unauth2');
			$this->load->view('footer');
        }

		
	}

	
}

?>