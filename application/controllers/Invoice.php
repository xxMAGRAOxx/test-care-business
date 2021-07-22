<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends Care_Controller {

	public function __construct() {
        parent::__construct();
				
		$this->load->model('Invoice_Model');
	}
	
	public function index() {
		$data['title']  = 'Notas Fiscais';
		$data['invoices']  = $this->Invoice_Model->get_from_database();

		$this->render_page('pages/invoice', $data);
	}

	public function upload() {
		$config['upload_path']          = './assets/xml/';
		$config['allowed_types']        = 'xml';
		$config['max_size']             = 100;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('invoice-files')) {
				echo $this->upload->display_errors();
		}else {
			$file = $this->upload->data();

			$xmlObject = simplexml_load_file($file['full_path']);

			$this->Invoice_Model->set_from_xml($xmlObject);

			if($this->Invoice_Model->validate()) {
				$this->Invoice_Model->set_to_database();
				
				redirect(base_url());
			}else {
				die('Did not pass the validation');
			}
		}
	}
}
