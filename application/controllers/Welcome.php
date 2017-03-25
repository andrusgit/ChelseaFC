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
		
		//header
		$this->load->view('head');
		//main content
		$this->load->view('index');
		//footer
		$this->load->view('footer');
		
	}
	
	public function kontakt() 
	{
		if(!isset($_SESSION)) { 
			session_start();
		}
		
		$this->load->view('head');	
		$this->load->view('contact');
		$this->load->view('footer');
		
	}
	
	public function login() 
	{
		if(!isset($_SESSION)) { 
			session_start();
		}
		
		$this->load->view('head');	
		$this->load->view('login');
		$this->load->view('footer');
		
	}
	
	public function register() 
	{
		if(!isset($_SESSION)) { 
			session_start();
		}
		
		$this->load->view('head');	
		$this->load->view('registration');
		$this->load->view('footer');
		
	}
	
	
	
}
