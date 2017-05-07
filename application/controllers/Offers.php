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
			
			$title['title'] = lang('OFFERS_PAGE_TITLE');
			
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			$exp = '/^([0-9]{4})([\-])([0-9]{2})([\-])([0-9]{2})[\ ]'
			.'([0-9]{2})[\:]([0-9]{2})[\:]([0-9]{2})$/';
			
			//Reeglid
			$this->form_validation->set_rules('pealkiri', lang('ADDOFFERS_VAL_TITLE'), 'required|max_length[100]');
			$this->form_validation->set_rules('sisu', lang('ADDOFFERS_VAL_DESCRIPTION'), 'required|max_length[500]');
			$this->form_validation->set_rules('tunnitasu', lang('ADDOFFERS_VAL_PAY'), 'required|max_length[11]');
			//$this->form_validation->set_rules('algus', lang('ADDOFFERS_VAL_BEGIN'), 'required|regex_match[$exp]');
			//$this->form_validation->set_rules('lõpp', lang('ADDOFFERS_VAL_END'), 'required|regex_match[$exp]');
			$this->form_validation->set_rules('asukoht', lang('ADDOFFERS_VAL_LOCATION'), 'required|max_length[80]');
			
			//Reeglite kontroll
			if ($this->form_validation->run()) {
				$_POST['userId'] = 6;
				$this->load->model('Insert_offer_model');
			
				if($this->Insert_offer_model->salvesta($_POST)) {
					redirect('offers/showall');
				}
			
			} else {
				if($this->session->userdata('isFbUserLoggedIn')){
					$this->load->view('fbhead', $title);
				}
				else if($this->session->userdata('isUserLoggedIn')){
					$this->load->view('headloggedin', $title);	
				}
			
				$this->load->view('addoffer');
				$this->load->view('footer');
			}

		}else{
			$title['title'] = lang('UNAUTH_PAGE_TITLE');
			$this->load->view('head', $title);
			$this->load->view('unauth2');
			$this->load->view('footer');
        }

		
	}

	
}

?>