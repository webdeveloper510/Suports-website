<?php 
   Class Signup_model extends CI_Model { 
	
    Public function __construct() 
	{ 
		parent::__construct(); 
    }
	public function paypal_response()
	{	
	/* echo "Hello";
	print_r($_POST);
	die; */
		$name = $this->session->userdata['deliverdata']['name1'];
		$email = $this->session->userdata['deliverdata']['email1'];
		$password1 = $this->session->userdata['deliverdata']['password1'];
		$password = md5($password1);
		$confirmpassword1 = $this->session->userdata['deliverdata']['confirmpassword1'];
		$confirmpassword=md5($confirmpassword1);
		$games = $this->session->userdata['deliverdata']['games'];
		$register_amount = $this->session->userdata['deliverdata']['register_amount'];
		$data = array('username'=>$name,'email'=>$email,'password'=>$password,'confirmpassword'=>$confirmpassword,'games'=>$games,'register_amount'=>$register_amount);
		$in = $this->db->insert('users', $data);
		$insert_id = $this->db->insert_id();	
		$data1 = array('first_name'=>$name,'email'=>$email,'user_id'=>$insert_id,'games'=>$games);
		$in1 = $this->db->insert('athletes_profile', $data1);
        $data2 = array('user_id'=>$insert_id,'sports_id'=>$games);
		$in2 = $this->db->insert('athlete_stats_value', $data2);
	    error_reporting(E_ERROR | E_PARSE);
		$new_date = date("Y-m-d");
		$data3 = array('user_id'=>$insert_id,'date'=>$new_date,'plan'=>$register_amount);
		$in3 = $this->db->insert('crone_job_table',$data3);		    		
	}
	public function get_game(){
		$this->db->select('*');
        $this->db->from('sports_sport');
        $query = $this->db->get();
        $game = $query->result_array();
		return $game;
	}
	
		public function select_get_game($gamename){
		$this->db->select('*');
        $this->db->from('sports_sport');
        $this->db->where('id', $gamename);
        $query = $this->db->get();
        $game = $query->result_array();
		return $game;
	}
	public function coach_form_submit()
	{	
		$data = array('username'=>$this->input->post('usernamesignup'),
		              'email'=>$this->input->post('emailsignup'),
					  'university'=>$this->input->post('university'),
					  'password'=>md5($this->input->post('passwordsignup')),
					  'sports_id'=>$this->input->post('games'),
					  'confirmpassword'=>md5($this->input->post('passwordsignup_confirm')
		              ));
		$in = $this->db->insert('coach',$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	}
	 public function select_all_users()
	{
		 //  $getdate=date('Y-m-d', strtotime("+30 days"));
            $this->db->select('*');
			$this->db->from('users');
			$this->db->where('card_no!=',0);
			$query2 = $this->db->get();
			$athlete_info2 = $query2->result_array();
			 //print_r($athlete_info2);
			// return $athlete_info2; 
	} 
	public function select_all_users_with_card()
	{
		$this->db->select('*');
			$this->db->from('users');
			$this->db->where('card_no!=',0);
			$query2 = $this->db->get();
			$athlete_info2 = $query2->result_array();
			 //print_r($athlete_info2);
			return $athlete_info2; 
	}
	
	public function update_stat_after_payment($get_uid)
	{
		//echo $get_uid;die;
	$data = array(
				'stat_after_payment' => '1'
				
				);
				$this->db->where('user_id',$get_uid);
                $dooo = $this->db->update('users',$data);
				
				
	}
	
} 