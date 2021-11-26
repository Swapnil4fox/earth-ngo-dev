<?php
class Location_Model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	//-----------------------------------------------------
	public function get_all_countries(){

		$wh =array();

		$query = $this->db->get('fx_countries');
		$SQL = $this->db->last_query();

		if(count($wh)>0)
		{
			$WHERE = implode(' and ',$wh);
			return $this->datatable->LoadJson($SQL,$WHERE);
		}
		else
		{
			return $this->datatable->LoadJson($SQL);
		}
	}

	//-----------------------------------------------------
	public function get_all_states(){

		$wh =array();

		$query = $this->db->get('fx_states');
		$SQL = $this->db->last_query();

		if(count($wh)>0)
		{
			$WHERE = implode(' and ',$wh);
			return $this->datatable->LoadJson($SQL,$WHERE);
		}
		else
		{
			return $this->datatable->LoadJson($SQL);
		}
	}

	//-----------------------------------------------------
	public function get_all_cities(){

		$wh =array();

		$query = $this->db->get('fx_cities');
		$SQL = $this->db->last_query();

		if(count($wh)>0)
		{
			$WHERE = implode(' and ',$wh);
			return $this->datatable->LoadJson($SQL,$WHERE);
		}
		else
		{
			return $this->datatable->LoadJson($SQL);
		}
	}


	//-----------------------------------------------------
	public function add_country($data){

		$result = $this->db->insert('fx_countries', $data);
        return $this->db->insert_id();	
	}

	//-----------------------------------------------------
	public function add_state($data){

		$result = $this->db->insert('fx_states', $data);
        return true;	
	}

	//-----------------------------------------------------
	public function add_city($data){

		$result = $this->db->insert('fx_cities', $data);
        return true;	
	}

	//-----------------------------------------------------
	public function edit_country($data, $id){

		$this->db->where('id', $id);
		$this->db->update('fx_countries', $data);
		return true;

	}

	//-----------------------------------------------------
	public function edit_state($data, $id){

		$this->db->where('id', $id);
		$this->db->update('fx_states', $data);
		return true;

	}

	//-----------------------------------------------------
	public function edit_city($data, $id){

		$this->db->where('id', $id);
		$this->db->update('fx_cities', $data);
		return true;

	}

	//-----------------------------------------------------
	public function get_country_by_id($id){

		$query = $this->db->get_where('fx_countries', array('id' => $id));
		return $result = $query->row_array();
	}

	//-----------------------------------------------------
	public function get_state_by_id($id){

		$query = $this->db->get_where('fx_states', array('id' => $id));
		return $result = $query->row_array();
	}

	//-----------------------------------------------------
	public function get_city_by_id($id){

		$query = $this->db->get_where('fx_cities', array('id' => $id));
		return $result = $query->row_array();
	}

		//------------------------------------------------
	// Get Countries
	function get_countries_list($id=0)
	{
		if($id==0)
		{
			return  $this->db->get('fx_countries')->result_array();	
		}
		else
		{
			return  $this->db->select('id,country')->from('fx_countries')->where('id',$id)->get()->row_array();	
		}
	}	

	//------------------------------------------------
	// Get Cities
	function get_cities_list($id=0)
	{
		if($id==0){
			return  $this->db->get('fx_cities')->result_array();	
		}
		else{
			return  $this->db->select('id,city')->from('fx_cities')->where('id',$id)->get()->row_array();	
		}
	}	

	//------------------------------------------------
	// Get States
	function get_states_list($id=0)
	{
		if($id==0){
			return  $this->db->get('fx_states')->result_array();	
		}
		else{
			return  $this->db->select('id,s')->from('fx_cities')->where('id',$id)->get()->row_array();	
		}
	}
	
}
?>