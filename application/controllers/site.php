<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {

	public function __construct()
	{
		
		parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('session','parser','pagination','encrypt'));
		$this->load->model('app/date_model');
		
	}
	public function index()
	{
		
		$date_list = $this->date_model->getDateList();
		$data['date_list']= $date_list;
		//print_r($date_list);
		
		$this->load->view('/site/index', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>