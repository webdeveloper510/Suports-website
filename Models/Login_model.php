<?php 
   Class Login_model extends CI_Model { 
    Public function __construct() 
	{ 
    parent::__construct(); 
	$this->load->database();
    }
	public function login_query()
	{	
	$name = $this->input->post('username');
    $pas = $this->input->post('password');
	$this->db->select('*');
	$this->db->from('users');
	$arry=  array(
	'username'=>$name,
	'password'=>md5($pas),
	'status'=>'1'
	);
	$this->db->where($arry);
	$query = $this->db->get();
	$t = $query->row_array();
	
	if(count($t)){
	return $t['user_id'];
	}
	else
	{
		return 0;
	}
 	}
	public function login_recruting_query()
	{	
	$name = $this->input->post('username');
    $pas = $this->input->post('password');
	$this->db->select('*');
	$this->db->from('users_recruiting');
	$arry=  array(
	'username'=>$name,
	'password'=>md5($pas)	
	);
	$this->db->where($arry);
	$query = $this->db->get();
	$t = $query->row_array();
	
	if(count($t)){
	return $t['user_id'];
	}
	else
	{
		return 0;
	}
 	}
	public function get_poteintional_cordinator($user_id)
	{	
			$this->db->select('*');
			$this->db->from('user_rec_coordinator_add_details');
			$this->db->where('user_id',$user_id);
			$query131 = $this->db->get();
			$result141 = $query131->result_array();
			
			
			//print_r($result141);die;
		    return $result141;
 	}
	
	public function get_recruiting_cordinator($user_id)
	{	
			$this->db->select('*');
			$this->db->from('users_recruiting');
			$this->db->where('user_id',$user_id);
			$query131 = $this->db->get();
			$result141 = $query131->row_array();
			//print_r($result141);die;
		    return $result141;
 	}
	public function get_cordinator_athlets_data($ref_id)
	{	
			$this->db->select('*');
			$this->db->from('athletes_profile');
			$this->db->where('user_id',$ref_id);
			$query131 = $this->db->get();
			$result141 = $query131->row_array();			
			//print_r($result141);die;
		    return $result141;
 	}
	
	
	public function get_update_rec_cordinator_note()
	{	
	        $user_id = $this->session->userdata('user_idd');
			$this->db->select('*');
			$this->db->from('users_recruiting');
			$this->db->where('user_id',$user_id);
			$query131 = $this->db->get();
			$result141 = $query131->row_array();
			
			//print_r($result141);die;
		    return $result141;
				
	}
 	
	public function get_recruiting_cordi_athlets($user_id)
	{	
			$this->db->select('*');
			$this->db->from('users_recruiting');
			$this->db->where('user_id',$user_id);
			$query131 = $this->db->get();
			$result141 = $query131->row_array();
			$finaldata = $result141['username'];
			if($finaldata)
			{
			$this->db->select('user_id');
			$this->db->from('users');
			$this->db->where('reffered_by',$finaldata);
			$this->db->order_by("user_id", "desc");
			$query = $this->db->get();
			$result = $query->row_array();			
			}
			
			//print_r($result141);die;
		    return $result;
 	}
	public function get_recruiting_cordi_athlets_count($user_id)
	{	
			$user_id = $this->session->userdata('user_idd');
			$this->db->select('*');
			$this->db->from('users_recruiting');
			$this->db->where('user_id',$user_id);
			$query131 = $this->db->get();
			$result141 = $query131->row_array();
			$finaldata = $result141['username'];
			if($finaldata)
			{
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where('reffered_by',$finaldata);
			$this->db->order_by("user_id", "desc");
			$query = $this->db->get();
			$result = $query->result_array();			
			}
			
			//print_r($result141);die;
		    return $result;
 	}
	
 	
 		public function login_query1()
	{	
	$name = $this->input->post('username');
    $pas = $this->input->post('password');
	$this->db->select('*');
	$this->db->from('free_profile_register');
	$arry=  array(
	'username'=>$name,
	'password'=>md5($pas)
	);
	$this->db->where($arry);
	$query = $this->db->get();
	$t = $query->row_array();
	
	if(count($t)){
	return $t['id'];
	}
	else
	{
		return 0;
	}
 	}
   	public function getdata($id)
	{
	  $this->db->select('*');
      $this->db->from('athletes_profile');
	  $this->db->where('user_id',$id);
      $query = $this->db->get();
      $t = $query->row_array();
	  if(count($t)){
	  return $t;
	  }
	  else
	  {
		return 0;
	  }
	}
	
	public function getdata1($id)
	{
	  $this->db->select('*');
      $this->db->from('new_profile');
	  $this->db->where('user_id',$id);
      $query = $this->db->get();
      $t = $query->row_array();
	  //print_r($t);die;
	  if(count($t)){
	  return $t;
	  }
	  else
	  {
		return 0;
	  }
	}
	
	public function getdata2()
	{
		$this->db->select('*');
      $this->db->from('new_profile');
      $query = $this->db->get();
      $t1 =$query->result_array();
	  return $t1;
	}
	
		public function getemail($id)
	{
	    //echo $id;die;
	  $this->db->select('*');
      $this->db->from('free_profile_register');
	  $this->db->where('id',$id);
      $query = $this->db->get();
      $t = $query->row_array();
      //print_r($t);die;
	  if(count($t)){
	  return $t;
	  }
	  else
	  {
		return 0;
	  }
	}
	public function getsignupdata1($id)
	{
	  $this->db->select('*');
      $this->db->from('new_profile');
	  $this->db->where('user_id',$id);
      $query = $this->db->get();
      $t = $query->row_array();
	  if(count($t)){
	  return $t;
	  }
	  else
	  {
		return 0;
	  }
	}
	public function getgame($game_id)
	{
			$this->db->select('*');
			$this->db->from('athlete_position');
			$this->db->where('sports_id', $game_id );
			$query = $this->db->get();
			$t = $query->result_array();
			return $t;
	}
		public function getgame1($game_id)
	{
			$this->db->select('*');
			$this->db->from('athlete_position');
			$this->db->where('sports_id', $game_id );
			$query = $this->db->get();
			$t = $query->result_array();
			return $t;
	}
	public function coach_loggedin()
	{
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$this->db->select('*');
			$this->db->from('coach');
			$arry =  array(
			'email'=>$email,
			'password'=>md5($password)
			);
			$this->db->where($arry);
			$query = $this->db->get();
			$t = $query->row_array();
			if(count($t)){return $t;}
			else{return 0;}
	}
	
	
}