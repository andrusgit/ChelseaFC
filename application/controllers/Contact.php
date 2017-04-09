<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {


    public function __construct() {
        parent::__construct();
    }
    
    
    public function index() {
        $this->load->view("contact");
    }
    
    public function success(){  

        if(!isset($_SESSION)) { 
                session_start();
        }
        $title['title'] = lang('CONTACT_PAGE_TITLE');
        if($this->session->userdata('isUserLoggedIn')){
                $this->load->view('headloggedin', $title);	
        }else{
                $this->load->view('head', $title);	
        }
        $this->load->view('success');
        $this->load->view('footer');
   
	
    }
    public function failure() {
        if(!isset($_SESSION)) { 
            session_start();
        }
        $title['title'] = lang('CONTACT_PAGE_TITLE');
        if($this->session->userdata('isUserLoggedIn')){
            $this->load->view('headloggedin', $title);	
        }else{
            $this->load->view('head', $title);	
        }
        $this->load->view('failure');
        $this->load->view('footer');

    }
}

?>