<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		if(!isset($_SESSION)) { 
			session_start();
		}
	
		$this->session->set_userdata('referred_from', current_url());
			
		$title['title'] = lang('MAIN_PAGE_TITLE');
		if($this->session->userdata('isFbUserLoggedIn')){
			$this->load->view('fbhead', $title);
		}
		else if($this->session->userdata('isUserLoggedIn')){
			$this->load->view('headloggedin', $title);	
		}else{
			$this->load->view('head', $title);	
		}
		$this->load->view('index');
		//footer
		$this->load->view('footer');
		
	}
	
	public function kontakt() 
	{
		if(!isset($_SESSION)) { 
			session_start();
		}
	
		$this->session->set_userdata('referred_from', current_url());
			
		$title['title'] = lang('CONTACT_PAGE_TITLE');
		if($this->session->userdata('isFbUserLoggedIn')){
			$this->load->view('fbhead', $title);
		}
		else if($this->session->userdata('isUserLoggedIn')){
			$this->load->view('headloggedin', $title);	
		}else{
			$this->load->view('head', $title);	
		}
		$this->load->view('contact');
		$this->load->view('footer');
		
	}
		
	public function faq() 
	{
		
		//igale funktsioonile
		if(!isset($_SESSION)) { 
			session_start();
		}
		//igale funktsioonile	
		$this->session->set_userdata('referred_from', current_url());
			
		$title['title'] = lang('FAQ_PAGE_TITLE');
		if($this->session->userdata('isFbUserLoggedIn')){
			$this->load->view('fbhead', $title);
		}
		else if($this->session->userdata('isUserLoggedIn')){
			$this->load->view('headloggedin', $title);	
		}else{
			$this->load->view('head', $title);	
		}
		$this->load->view('faq');
		$this->load->view('footer');
		
	}
	
	
	//Õppejõu järgi
	function vahetaKeelt($language = "") {
		if(!isset($_SESSION)) { 
			session_start();
		}
		
		//$this->session->set_userdata('referred_from', current_url());
		
		if($language == "")
			$language = "estonian";
		
        $this->session->set_userdata('site_lang', $language);
		$referred_from = $this->session->userdata('referred_from');
		redirect($referred_from, 'refresh');
    }
	
	
	
}
