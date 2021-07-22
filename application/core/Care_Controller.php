<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Care_Controller extends CI_Controller {

    public function __construct(){
        parent::__construct();   
    }
	
	protected function render_page($view, $data) {
        $this->load->view('templates/header', $data);
        $this->load->view($view, $data);
        $this->load->view('templates/footer', $data);
    } 
}
