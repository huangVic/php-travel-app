<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct()
	{
		
		parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('session','parser','pagination','encrypt'));
		$this->load->model('app/date_model');
		
	}
	
	
	public function date_list()
	{
	
		$date_list = $this->date_model->getDateList();
	
		header("HTTP/1.1 200 OK");
		header('Content-Type: application/json');
		//header('Access-Control-Allow-Origin: http://test-ustvshop.bobitag.com');
		header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
		header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Accept');
		http_response_code(200);
		echo json_encode($date_list);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>