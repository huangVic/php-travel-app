<?php
class date_model extends CI_Model{
	
	public function getDateList()
	{
		$query= $this->db->query("SELECT * FROM app_date where MONTH(date)=MONTH(now()) and year(date)=year(now())  order by date");
		$rows = $query->result_array();
		return $rows;
	}
	
}