<?php
class date_model extends CI_Model{
	
	public function getDateList()
	{
		$query= $this->db->query("SELECT d.* , DATE_FORMAT(d.date, '%Y/%m/%d') as format_date FROM app_date d where MONTH(date)=MONTH(now()) and year(date)=year(now())  order by date");
		$rows = $query->result_array();
		return $rows;
	}
	
}