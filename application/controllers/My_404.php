<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_404 extends Medrio_Controller {

    public function __construct(){
        parent::__construct();
    }
	
	public function index() {		
		$data['title'] = 'Test Care';

        $this->load->view('pages/404', $data);
	}
}
