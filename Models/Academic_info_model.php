<?php 
class Academic_info_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
				$this->load->database();
		$this->load->helper(array('form', 'url'));
                // Your own constructor code
        }
		public function athlete_info2($ses_id)
		{
			$this->db->select('*');
			$this->db->from('athletes_profile');
			$this->db->where('user_id', $ses_id );
			$query2 = $this->db->get();
			$athlete_info2 = $query2->row_array();
			return $athlete_info2;
		  
		}
		public function find_sport_name()
		{
		    $sport=$this->input->post('sport');
		    $this->db->select('*');
			$this->db->from('sports_sport');
			$this->db->where('id', $sport );
			$query2 = $this->db->get();
			$athlete_info2 = $query2->row_array();
			return $athlete_info2;
		
		}
		public function get_cordinator_athlets_expensis($month_val)
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
			$this->db->like('register_date','2019'.'-'.$month_val);
			$query = $this->db->get();
			$result = $query->result_array();
			$cont = count($result);			
			}
			
		    return $cont;
		}
		public function get_cordinator_athlets_yearly()
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
			$this->db->like('register_date','2019');
			$query = $this->db->get();
			$result = $query->result_array();
			$cont = count($result);			
			}
			
		    return $cont;
		}
		public function get_cordinator_athlets_sports()
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
			$query = $this->db->get();
			$result = $query->result_array();
			$sports_id = $result[0]['games'];
			//print_r($sports_id);
			 if($sports_id)
			{
				$this->db->select('*');
				$this->db->from('sports_sport');
				$this->db->where('id',$sports_id);			
				$get_data = $this->db->get();
				$results = $get_data->result_array	();
				$sport_names = $results[0]['sport_name'];
				return $sport_names;
			} 
			}
		}
		public function get_sports_name_forfree_rec_cordintr()
		{
			$user_id = $this->session->userdata('user_idd');
			$this->db->select('*');
			$this->db->from('users_recruiting');
			$this->db->where('user_id',$user_id);
			$query131 = $this->db->get();
			$result141 = $query131->row_array();
			$finaldata = $result141['username'];
			//print_r($finaldata);die;
			if($finaldata)
			{			
			$this->db->select('free_profile_register.game , sports_sport.sport_name')
              ->from('free_profile_register')
              ->join('sports_sport', 'free_profile_register.game = sports_sport.id');
			  $this->db->where('free_profile_register.reffered_by',$finaldata);		  
              $result = $this->db->get()->result_array();
			  
			  return $result;
			} 
		}
		public function get_sports_name_forpaid_rec_cordintr()
		{
			$user_id = $this->session->userdata('user_idd');
			$this->db->select('*');
			$this->db->from('users_recruiting');
			$this->db->where('user_id',$user_id);
			$query131 = $this->db->get();
			$result141 = $query131->row_array();
			$finaldata = $result141['username'];
			//print_r($finaldata);die;
			if($finaldata)
			{			
			$this->db->select('users.games , sports_sport.sport_name')
              ->from('users')
              ->join('sports_sport', 'users.games = sports_sport.id');
			  $this->db->where('users.reffered_by',$finaldata);		  
              $result = $this->db->get()->result_array();
			  
			  return $result;
			} 
		}
		public function profile_percentage()
		{
			$id = $this->session->userdata('user_idd');
			$this->db->select('*');
			$this->db->from('athletes_profile');
			$this->db->where('user_id', $id);
			$query2 = $this->db->get();
			$athlete_info2 = $query2->row_array();
			//print_r($athlete_info2);die;
			return $athlete_info2;
		}
		public function delete_potention_data($user_id,$user_name)
		{
			
			$this->db->where('user_id', $user_id );
			$this->db->where('email', $user_name );
			$this->db->delete('user_rec_coordinator_add_details');
		    
		}
		public function delete_potention_notes()
		{
			
			$id = $this->input->post('id');
	        $user_ids =  $this->input->post('user_ids');	 
			$this->db->where('user_id', $user_ids);
			$this->db->where('id', $id );
			$this->db->delete('user_recruiting_notes');
		    
		}
		public function change_cordintr_pass()
		{
			$id = $this->session->userdata('user_idd');
			$old_pass = $this->input->post('old_pass');
			$c_pass = $this->input->post('c_pass');
			$this->db->select('*');
			$this->db->from('users_recruiting');			
			$this->db->where('user_id',$id );
			$query2 = $this->db->get();
			$athlete_info2 = $query2->row_array();
			if($athlete_info2['password'] == md5($old_pass))
			{
				$data = array('password' => md5($c_pass));
				$this->db->where('user_id', $id);				
                $dooo = $this->db->update('users_recruiting',$data);
				if($dooo)
				{
					echo "1";
				}
			}
			else
			{
				echo  "0";
			}
		    
		}
		
			public function find_poosition_name($poosition)
		{
		   // $sport=$this->input->post('sport');
		    $this->db->select('*');
			$this->db->from('athlete_position');
			$this->db->where('id', $poosition );
			$query2 = $this->db->get();
			$athlete_info2 = $query2->row_array();
			return $athlete_info2;
		
		}
			public function find_sport_name_profile()
		{
		    $id = $this->session->userdata('user_idd');
		    $this->db->select('*');
			$this->db->from('free_profile_register');
			$this->db->where('id', $id );
			$query2 = $this->db->get();
			$athlete_info2 = $query2->row_array();
			$get_game_id = $athlete_info2['game'];
			
			
		    $this->db->select('*');
			$this->db->from('sports_sport');
			$this->db->where('id', $get_game_id );
			$query2 = $this->db->get();
			$athlete_info2 = $query2->row_array();
			return $got_game_name = $athlete_info2['sport_name'];
		
		}
			public function find_pos_name_profile($pos_name)
		{
		   // $sport=$this->input->post('sport');
		    $this->db->select('*');
			$this->db->from('athlete_position');
			$this->db->where('id', $pos_name );
			$query2 = $this->db->get();
			$athlete_info2 = $query2->row_array();
			return $athlete_info2;
		
		}
	   public function freeconsultation()
	   {
	 
	   $data = array('first_name'=>$this->input->post('first_name'),
		              'middle_name'=>$this->input->post('middlename'),
					  'last_name'=>$this->input->post('lastname'),
					  'birth'=>$this->input->post('birth'),
					  'user_email'=>$this->input->post('email'),
					  'user_phone'=>$this->input->post('phone'),
					  'graduation_year'=>$this->input->post('graduationyear'),
					  'high_school'=>$this->input->post('highschool'),
					  'location'=>$this->input->post('location'),
					    'sport'=>$this->input->post('sport'),
					  'position'=>$this->input->post('position'),
					  'jvteam'=>$this->input->post('jvteam'),
					  'varsity'=>$this->input->post('varsity'),
					  'college_coach'=>$this->input->post('collegecoach'),
					  'mom_name'=>$this->input->post('momname'),
					   'mom_email'=>$this->input->post('momemail'),
					  'mom_phone'=>$this->input->post('momphone'),
					  'dad_name'=>$this->input->post('dadname'),
					  'dad_email'=>$this->input->post('dademail'),
					  'dad_phone'=>$this->input->post('dadphone')
					   );
		$in = $this->db->insert('free_consultation',$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
	   }
	   public function get_free_profile_leads()
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
				$this->db->from('free_profile_register');
				$this->db->where('reffered_by',$finaldata);				
				$query = $this->db->get();
				$result = $query->result_array();
				return $result;
			}
			
			
		    
	   }
	   public function get_free_profile_leads_grad_year()
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
				$this->db->select('id');
				$this->db->from('free_profile_register');
				$this->db->where('reffered_by',$finaldata);				
				$query = $this->db->get();
				$result = $query->result_array();
				$ids= explode(',',$result);
				
				 $this->db->select('free_profile_register.reffered_by ,  new_profile.grad_year')
              ->from('free_profile_register')
              ->join('new_profile', 'free_profile_register.id = new_profile.user_id');
			  $this->db->where_in('free_profile_register.id',$ids);
			  $this->db->where_in('free_profile_register.reffered_by',$finaldata);             			  
              $results = $this->db->get()->result_array();
			  
			  return $results; 
			}
			
			
		    
	   }
		public function get_login_coach_info($login_coach_id)
		{
			$this->db->select('*');
			$this->db->from('coach');
			$this->db->where('id', $login_coach_id);
			$query = $this->db->get();
			$coach_info = $query->row_array();
			return $coach_info;
		}
			public function free_profile_info($regid)
		{
			$this->db->select('*');
			$this->db->from('new_profile');
			$this->db->where('user_id', $regid);
			$query = $this->db->get();
			$coach_info = $query->row_array();
			return $coach_info;
		}
			public function free_profile_info_login($login_id)
		{
			$this->db->select('*');
			$this->db->from('new_profile');
			$this->db->where('user_id', $login_id);
			$query = $this->db->get();
			$coach_info = $query->row_array();
			return $coach_info;
		}
		
	public function updateddpassword()
		{
		$email1 =$_GET['id'];
		$email=base64_decode($email1);
		$newpassword =$_POST['newpassword'];
		$confirmpassword =$_POST['confirmpassword'];
			if($newpassword==$confirmpassword)
		{
		    	$data = array(
				'password' => md5($newpassword),
				'confirmpassword' => md5($confirmpassword)
				);
				 $this->db->where('id', $email);
		    $this->db->update('coach',$data);
		}
		
		
		
		}
		public function getid1($to_email)
		{
		    $this->db->select('*');
			$this->db->from('users');
			$this->db->where('email', $to_email );
			$query = $this->db->get();
			$club_history = $query->result_array();		
			return $club_history;   
		}
			public function getid($to_email)
		{
		    $this->db->select('*');
			$this->db->from('coach');
			$this->db->where('email', $to_email );
			$query = $this->db->get();
			$club_history = $query->result_array();		
			return $club_history;   
		}
		
		public function updateddpassword1()
		{
		$email1 =$_GET['id'];
			$email=base64_decode($email1);
		$newpassword =$_POST['newpassword'];
		$confirmpassword =$_POST['confirmpassword'];
			if($newpassword==$confirmpassword)
		{
		    	$data = array(
				'password' => md5($newpassword),
				'confirmpassword' => md5($confirmpassword)
				);
				 $this->db->where('user_id', $email);
		    $this->db->update('users',$data);
		}
		
		
		
		}
		public function  allemail()
	    {
			$this->db->select('*');
			$this->db->from('coach');
			$query = $this->db->get();
			$club_history = $query->result_array();		
			return $club_history;   
		}
			
			public function  allemail1()
	    {
			$this->db->select('*');
			$this->db->from('users');
			$query = $this->db->get();
			$club_history = $query->result_array();		
			return $club_history;   
		}
		

				 
		
		public function blast_email_open($user_id)
		{
			$coach_id = $this->session->userdata('idd');
			$this->db->select('*');
			$this->db->from('blast_email');
			$this->db->where('user_id', $user_id );
			$this->db->where('coach_id', $coach_id );
			$query = $this->db->get();
			$email_info = $query->row_array();
			$open = $email_info['open_email']+1;
			if($email_info)
			{   $data = array('id'=>$email_info['id'],'coach_id'=>$email_info['coach_id'],'user_id'=>$email_info['user_id'],'total_email'=>$email_info['total_email'],'open_email'=>$open);
		        $this->db->where('id',$email_info['id']);
				$dooo = $this->db->update('blast_email',$data);	
			}
			else{
				$data = array('user_id'=>$user_id,'coach_id'=>$coach_id,'open_email'=>'1','total_email'=>'');
				$this->db->insert('blast_email',$data);
			}	
		}
		public function club_history_save($user_id)
		{	
				$data = array(
				'competition_year' => $this->input->post('year'),
				'club_name' => $this->input->post('club_name'),
				'user_id' => $user_id
				);
				$this->db->insert('club_season_history', $data);
				if($insert_id = $this->db->insert_id())
				{
				redirect('iscoutyou/athletic_info/');	
				}	
		}
			public function free_profile_club_history_save($user_id)
		{	
				$data = array(
				'competition_year' => $this->input->post('year'),
				'club_name' => $this->input->post('club_name'),
				'user_id' => $user_id
				);
				$this->db->insert('free_profile_club_season_history', $data);
				if($insert_id = $this->db->insert_id())
				{
				redirect('iscoutyou/free_profile_athletic_info/');	
				}	
		}
		public function club_season_history($user_id)
		{
			$this->db->select('*');
			$this->db->from('club_season_history');
			$this->db->where('user_id', $user_id );
			$this->db->order_by("competition_year","desc");
			$this->db->limit(3);
			$query = $this->db->get();
			$club_history = $query->result_array();		
			return $club_history;
		}
				public function free_profile_club_season_history($userr_id)
		{
			$this->db->select('*');
			$this->db->from('free_profile_club_season_history');
			$this->db->where('user_id', $userr_id );
			$this->db->order_by("competition_year","desc");
			$this->db->limit(3);
			$query = $this->db->get();
			$club_history = $query->result_array();		
			return $club_history;
		}
				public function free_profile_club_season_history4($id4)
		{
			$this->db->select('*');
			$this->db->from('free_profile_club_season_history');
			$this->db->where('user_id', $id4 );
			$this->db->order_by("competition_year","desc");
			$this->db->limit(3);
			$query = $this->db->get();
			$club_history = $query->result_array();		
			return $club_history;
		}
		public function club_history_del($id)
		{
			$this->db->select('*');
			$this->db->from('club_season_history');
			$this->db->where('id', $id );
     		$query = $this->db->get();
			$club_history = $query->row_array();		
			return $club_history;
			
		}
			public function free_profile_club_history_del($id)
		{
			$this->db->select('*');
			$this->db->from('free_profile_club_season_history');
			$this->db->where('id', $id );
     		$query = $this->db->get();
			$club_history = $query->row_array();	
		//	print_r($club_history);die;
			return $club_history;
			
		}
		public function club_history_deleted($id)
		{
			$this->db->where('id', $id);
            $done = $this->db->delete('club_season_history');
			if($done)
			{
			$this->session->set_userdata('message','Your Record was deleted successfully');
		    redirect('iscoutyou/athletic_info/');
			}
			
		}
			public function free_profile_club_history_deleted($id)
		{
			$this->db->where('id', $id);
            $done = $this->db->delete('free_profile_club_season_history');
			if($done)
			{
			$this->session->set_userdata('message','Your Record was deleted successfully');
		    redirect('iscoutyou/free_profile_athletic_info/');
			}
			
		}
		public function coach_info_save($user_id)
		{
			$data = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'club_name' => $this->input->post('club_name'),
				'user_id' => $user_id
				);
				$this->db->insert('coach_information', $data);
			    if($insert_id = $this->db->insert_id())
				{
				redirect('iscoutyou/athletic_info/');	
				}
		}
			public function free_profile_coach_info_save($user_id)
		{
			$data = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'club_name' => $this->input->post('club_name'),
				'user_id' => $user_id
				);
				$this->db->insert('free_profile_coach_information', $data);
			    if($insert_id = $this->db->insert_id())
				{
				redirect('iscoutyou/free_profile_athletic_info/');	
				}
		}
		public function coach_information($user_id)
		{
			$this->db->select('*');
			$this->db->from('coach_information');
			$this->db->where('user_id', $user_id );
			$this->db->order_by("id","desc");
			$this->db->limit(3);
			$query = $this->db->get();
			$club_history = $query->result_array();		
			return $club_history;
			
		}
			public function free_profile_coach_information($userr_id)
		{
			$this->db->select('*');
			$this->db->from('free_profile_coach_information');
			$this->db->where('user_id', $userr_id );
			$this->db->order_by("id","desc");
			$this->db->limit(3);
			$query = $this->db->get();
			$club_history = $query->result_array();		
			return $club_history;
			
		}
		public function free_profile_coach_info_for_admin($get_sports)
		{
			$this->db->select('*');
			$this->db->from('free_profile_coach_information');
			$this->db->where('user_id', $get_sports );
			$this->db->order_by("id","desc");
			$this->db->limit(3);
			$query = $this->db->get();
			$club_history = $query->result_array();		
			return $club_history;
			
		}
			public function free_profile_coach_information4($id4)
		{
			$this->db->select('*');
			$this->db->from('free_profile_coach_information');
			$this->db->where('user_id', $id4);
			$this->db->order_by("id","desc");
			$this->db->limit(3);
			$query = $this->db->get();
			$club_history = $query->result_array();		
			return $club_history;
			
		}
		public function coach_inform_del($id)
		{
			$this->db->select('*');
			$this->db->from('coach_information');
			$this->db->where('id', $id );
			$query = $this->db->get();
			$club_history = $query->row_array();		
			return $club_history;
		}
			public function free_profile_coach_inform_del($id)
		{
			$this->db->select('*');
			$this->db->from('free_profile_coach_information');
			$this->db->where('id', $id );
			$query = $this->db->get();
			$club_history = $query->row_array();		
			//print_r($club_history);die;
			return $club_history;
		}
		public function coach_inform_deleted($id)
		{
			$this->db->where('id', $id);
            $done = $this->db->delete('coach_information');
			if($done)
			{
			$this->session->set_userdata('message','Your Record was deleted successfully');
		    redirect('iscoutyou/athletic_info/');
			}
		}
			public function free_profile_coach_inform_deleted($id)
		{
			$this->db->where('id', $id);
            $done = $this->db->delete('free_profile_coach_information');
			if($done)
			{
			$this->session->set_userdata('message','Your Record was deleted successfully');
		    redirect('iscoutyou/free_profile_athletic_info/');
			}
		}
		public function coach_infor_get($id)
		{
			$this->db->select('*');
			$this->db->from('coach_information');
			$this->db->where('id', $id );
			$query = $this->db->get();
			$coach_history = $query->row_array();		
			return $coach_history;
		}
			public function free_profile_coach_infor_get($id)
		{
			$this->db->select('*');
			$this->db->from('free_profile_coach_information');
			$this->db->where('id', $id );
			$query = $this->db->get();
			$coach_history = $query->row_array();		
			return $coach_history;
		}
		
		public function get_update_record($id)
		{
			$this->db->select('*');
			$this->db->from('club_season_history');
			$this->db->where('id', $id );
			$query = $this->db->get();
			$club_history = $query->row_array();		
			return $club_history;
		}
		public function free_profile_get_update_record($id)
		{
			$this->db->select('*');
			$this->db->from('free_profile_club_season_history');
			$this->db->where('id', $id );
			$query = $this->db->get();
			$club_history = $query->row_array();		
			return $club_history;
		}
		public function free_profile_get_club_record($get_sports)
		{
			$this->db->select('*');
			$this->db->from('free_profile_club_season_history');
			$this->db->where('user_id', $get_sports );
			$query = $this->db->get();
			$club_history = $query->row_array();		
			return $club_history;
		}
		public function athelte_info_for_coach($id)
		{
			$this->db->select('*');
			$this->db->from('athletes_profile');
			$this->db->where('user_id', $id );
			$query = $this->db->get();
			$athlete_info = $query->row_array();
			return $athlete_info;
		}
		public function indiviual_email_insert($uni_id)
		{
			 
			$id = $this->session->userdata('user_idd');
			$this->db->select('*');
			$this->db->from('indiviual_email');
			$this->db->where('user_id',$id);
			$query = $this->db->get();
			$athlete_info = $query->row_array();
			
			if($athlete_info)
			{ 	
		        $old_uni_id = $athlete_info['university_id'];
				$update_universities = $old_uni_id.','.$uni_id;
		        $new_count = $athlete_info['email_count']+1;
				$data = array('email_count' => $new_count,'university_id' => $update_universities);
				$this->db->where('user_id', $id);
				$dooo = $this->db->update('indiviual_email',$data);
			}
			else
			{
				$data = array(
				'user_id' => $id,
				'email_count' => '1',
				'university_id' => $uni_id				
				);
			   $this->db->insert('indiviual_email', $data);
				
			}
			
		}
		/* public function new_data($data){
			$insert1 = $this->db->insert('athlete_email_count',$data);
			if($insert1){
				return $insert1;
			}
		} */
		public function getting_univer_indiviual()
		{
			$user_id = $this->session->userdata('user_idd');
		    $this->db->select('*');
			$this->db->from('indiviual_email');
			$this->db->where('user_id', $user_id );
			$query = $this->db->get();
			$athlete_info = $query->row_array();
			//print_r($athlete_info);die;
			$new_uni = explode(',',$athlete_info['university_id']);
			/* echo "<pre>";
			print_r($new_uni);die; */
			//game name
		    $this->db->select('*');
            $this->db->from('athletes_profile');
            $this->db->where('user_id', $user_id );
            $universi = $this->db->get(); 
    	    $athlete_info1 = $universi->row_array();
			//print_r($athlete_info1);die;
            $game_id=$athlete_info1['games'];
            $this->db->select('*');
			$this->db->from('sports_sport');
			$this->db->where('id',$game_id);
			$query1 = $this->db->get();
	        $game = $query1->row_array();
			//print_r($game);die;
            $game_na = $game['sport_name'];
			$game_nam = str_replace("'", '', $game_na);
		    $game_name = strtoupper($game_nam);
			//print_r($game_name);die;
			//game name
            $this->db->select('*');
			$this->db->from('university');
			$this->db->join('university_contact','university_contact.UNIVERSITY_ID = university.ID');
			$this->db->where_in('university.ID', $new_uni);
			$this->db->where('university_contact.SPORTS', $game_name);
            $query = $this->db->get();	
			$hj=$query->result_array();
			/*  echo "<pre>";
			print_r($hj);	DIE;  */	
			return $hj=$query->result_array();
		}
		 public function getting_email_counts($uni_ids)
		{
			$user_id = $this->session->userdata('user_idd');
			$this->db->select('*');
			$this->db->from('athlete_email_count');
			$this->db->where('user_id',$user_id);
			$this->db->where('university_id',$uni_ids);
			$query = $this->db->get();
			$email_counts = $query->result_array();
			return $email_counts[0]['email_count'];
			//return $email_counts;
		} 
		
		public function total_indiviual_no_email($user_id)
		{
			$this->db->select('email_count');
			$this->db->from('athlete_email_count');
			$this->db->where('user_id',$user_id);
			$query = $this->db->get();
			$athlete_info = $query->result_array();
			//print_r($athlete_info);die;			
			return $athlete_info;
		}
		public function get_all_uni_counts($user_id)
		{
			$this->db->select('university_id');
			$this->db->from('athlete_email_count');
			$this->db->where('user_id',$user_id);
			$query = $this->db->get();
			$athlete_info = $query->result_array();			
			return $athlete_info;
		}
		public function all_uni_of_email()
		{
			$ses_id = $this->session->userdata('user_idd');
			$this->db->select('university_id');
			$this->db->from('athlete_email_count');
			$this->db->where('user_id',$ses_id);
			$query = $this->db->get();
			$athlete_info = $query->result_array();	
			return 	$athlete_info;			
		
			/* $this->db->select('*');
			$this->db->from('athlete_email_count');
			$this->db->join('university','university.ID = athlete_email_count.university_id');			
			$this->db->where('university_contact.SPORTS', $game_name);
            $query = $this->db->get();	
			$hj=$query->result_array(); */
			
		}
		public function total_no_email()
		{
			
		    $ses_id = $this->session->userdata('user_idd');
			$this->db->select('*');
			$this->db->from('crone_job_table');
			$this->db->where('user_id',$ses_id);
			$query = $this->db->get();
			$crone = $query->row_array();			
			return $crone;			
		}
		public function get_all_profile_data()
		{
		    $ses_id = $this->session->userdata('user_idd');		    
			$this->db->select('*');
			$this->db->from('athletes_profile');
			$this->db->where('user_id',$ses_id);
			$query = $this->db->get();
			$crone = $query->row_array();
			return $crone;			
		}
		public function less_ninty_profiledata()
		{ 	
		      
			$curr_date = date('Y-m-d');
			$this->db->select('*');
			$this->db->from('athletes_less_ninty_percentage');
			$query = $this->db->get();
			$get_dates = $query->row_array();
			   $last_sent_date = $get_dates['last_sent_date'];
		    $next_date= date('Y-m-d', strtotime($last_sent_date. ' + 31 days'));
			if($next_date==$curr_date)
			{
			$query = $this->db->query("SELECT user_id,games,first_name,gpa,
			SUM(percentage1 + percentage2 + percentage3)
			AS total FROM athletes_profile WHERE user_id!=0  GROUP BY user_id");  
			
			$getdata = $query->result_array();
			
			

			
		    for($i=0;$i<count($getdata);$i++)
			{ 	
		      $gettotal =  $getdata[$i]['total'] / 3;
		      $user_id_paid= $getdata[$i]['user_id'];
				$this->db->select('register_amount,user_id,status');
							$this->db->from('users');			
							$this->db->where('user_id',$user_id_paid);	
                             $query = $this->db->get();
							$paid_user_data = $query->result_array();
                             $plan=$paid_user_data[0]['register_amount']; 						
                             $status=$paid_user_data[0]['status']; 					
				if($gettotal < 90 && $plan!='p1' && $status==1)
				{
					 $firstname =  $getdata[$i]['first_name'];
					 
					        $user_idss = $getdata[$i]['user_id'];							 
			
							$this->db->select('*');
							$this->db->from('athletes_academic_info');	
							
							
							$this->db->where('user_id',$user_idss);			
							$query = $this->db->get();
							$getdatau = $query->result_array();
							if(count($getdatau)== 0)
							{
								$grad_year = "GRADUATION YEAR";
							}
							else{
								$grad_year = "";
							}
							
							$this->db->select('stats');
							$this->db->from('athlete_stats_value');			
							$this->db->where('user_id',$user_idss);			
							$query = $this->db->get();
							$athlete_stats_value = $query->result_array();
							
							
							if(count($athlete_stats_value)== 1)
							{
								$athlete_stats = "ATHLETES STATS";
							}
							else{
								$athlete_stats = "";
							}
							$this->db->select('highschool');
							$this->db->from('atheletic_history');			
							$this->db->where('user_id',$user_idss);			
							$query = $this->db->get();
							$atheletic_history = $query->result_array();							
							
							if(count($atheletic_history)== 0)
							{
								$athl_history = "ATHLETES HISTORY";
							}
							else{
								$athl_history = "";
							}
							$this->db->select('video1');
							$this->db->from('athletes_video');			
							$this->db->where('user_id',$user_idss);			
							$query = $this->db->get();
							$athletes_video = $query->result_array();				
							
							if(count($athletes_video)== 0)
							{
								$athl_video = "ATHLETES VIDEOS";
							}
							else{
								$athl_video = "";
							}
							///// Get Total Colleges counts starts here //////
							
		 					
		/* $this->db->select('*');
        $this->db->from('athletes_profile');
        $this->db->where('user_id', $user_idss );
        $universi = $this->db->get(); 
    	$athlete_info = $universi->result_array(); */
					
		$game_id = $getdata[$i]['games'];
        $gpa = $getdata[$i]['gpa'];
           
        
            $this->db->select('*');
			$this->db->from('sports_sport');
			$this->db->where('id',$game_id);
			$query = $this->db->get();
	        $game = $query->result_array();
			
		
            $game_na = $game[0]['sport_name'];
			$game_nam = str_replace("'", '', $game_na);
			$game_name = strtoupper($game_nam);
			
			
			$this->db->select('*');
			$this->db->from('university_contact');
			$this->db->where('SPORTS',$game_name);
			$query = $this->db->get();
			$result = $query->result_array();			
		
		
			 if($result)
			{
			for($n=0;$n<count($result);$n++)
			{
				$arr[] = $result[$n]['UNIVERSITY_ID'];
			}			
			$this->db->select('COUNT(*)');
			$this->db->from('university');						
			$this->db->where_in('ID',$arr);			
			$this->db->where('GPA <=', $gpa);
			$query1 = $this->db->get();
			$result2 = $query1->result_array(); 
			
			  
		
			
			} 
			 
			$totalcount =  $result2[0]['COUNT(*)'];
			
		
			///// Get Total Colleges counts endss here //////
							 
					$user_id[] = $getdata[$i]['user_id']; 
			
			
			
			
			$this->db->select('first_name,last_name,weight,height,ncaa,naia,cel_phone,hs_grad_year,gpa,sat,act,personal_statement,image_profile,email,percentage1,percentage2,percentage3');
			$this->db->from('athletes_profile');
			$this->db->where_in('user_id',$user_idss);			
			$query = $this->db->get();	
			$getalldata = $query->result_array();
			
			
			$aray = array('first_name','last_name','weight','height','ncaa','naia','cel_phone','hs_grad_year','gpa','sat','act','personal_statement','image_profile','email');
			$fields_array = array();
			
			 for($j=0;$j<count($getalldata);$j++)
			 {
				 $allemails = $getalldata[$j]['email'];
				
			
				
				
				 $message ='<div class="ssds" style="width:100%; float: left; background: #f2f2f2;">
			  
			 <br>
	<div class="online-outer">
	<p class="online" style="width: 100%; text-align: center; font-size: 22px; color: #000; margin: 0; padding: 0;">Hello <b>'.$firstname.'</b>, your Online Profile is '.(int)$gettotal.' % , let`s get done. </p>
	
	</div>
	<div class="head" style="float: left; width: 100%; display: block;">
	<h4 style="background: #000; text-align: center; font-size: 20px; padding: 10px; font-weight: 700; color: #fff;" width: 80% !important; margin: 0 auto !important;>BASIC INFORMATION</h4><br>
	
	</div>';
				 
				
				
				for($k=0;$k<count($aray);$k++)
				{
					
					if($getalldata[$j][$aray[$k]]=='')
					{
						$fields_array[]=$aray[$k];
					}
				}				
				  
				$alldatass = implode("<br>",$fields_array);
				$message .= '
			  
		<div class="info" style="width: 100%; float: left; background: #f2f2f2;"><label style="width: 100%;
    float: left; font-weight: 700; font-size: 16px; text-transform: uppercase; text-align: center;"> '.'-'.$alldatass.'</label></div>';
	
	
	$message .='<div class="head" style="float: left; width: 100%; display: block;">
	<h4 style="background: #000; text-align: center; font-size: 20px; padding: 10px; font-weight: 700; color: #fff;" width: 80% !important; margin: 0 auto !important;>ACADEMIC INFORMATION</h4><br>			  
		<div class="info" style="width: 100%; float: left; background: #f2f2f2;"><label style="width: 100%;
    float: left; font-weight: 700; font-size: 16px; text-transform: uppercase; text-align: center;"> - '.$grad_year.'</label></div>		
	</div>';
	$message .='<div class="head" style="float: left; width: 100%; display: block;">
	<h4 style="background: #000; text-align: center; font-size: 20px; padding: 10px; font-weight: 700; color: #fff;" width: 80% !important; margin: 0 auto !important;>ATHLETES INFORMATION</h4><br>			  
		<div class="info" style="width: 100%; float: left; background: #f2f2f2;"><label style="width: 100%;
    float: left; font-weight: 700; font-size: 16px; text-transform: uppercase; text-align: center;"> - '.$athlete_stats.'</label></div>	
<div class="info" style="width: 100%; float: left; background: #f2f2f2;"><label style="width: 100%;
    float: left; font-weight: 700; font-size: 16px; text-transform: uppercase; text-align: center;"> - '.$athl_history.'</label></div>	
	<div class="info" style="width: 100%; float: left; background: #f2f2f2;"><label style="width: 100%;
    float: left; font-weight: 700; font-size: 16px; text-transform: uppercase; text-align: center;"> - '.$athl_video.'</label></div>
	
	</div>';
	
			$message .='<div class="most-outer" style="background: #f2f2f2;
    padding: 10px; width: 100%; float: left;">
	<h3 style="text-align: center; color: #000; font-size: 36px; font-weight: 500; font-family: initial; margin: 0;">Schools to approach '.$totalcount.'</h3>
	<img src="https://isportsrecruiting.com/images/mail-logo.png" style="text-align: center; margin: 10px auto; display: block;">
	<h3 style="text-align: center; color: #000; font-size: 36px; font-weight: 500; font-family: initial; margin: 0;">Let’s do this! </h3><br>
	<a href="https://isportsrecruiting.com/login" class="btn-email"  style="text-align: center;
    width: 15%; padding: 10px; display: block; margin: 0 auto; background: #00e100; color: #fff; text-transform: capitalize;
    font-size: 22px; border: none; text-decoration: none;">login</a>';
			$message .='<div class="end-pont"><h5 style="margin-left: 13px !important;
    font-size: 30px;
    color: #000;
    font-family: initial;
    padding: 0;
    margin-bottom: 0;">iSportsRecruiting Team </h5>
      <h4 class="contact" style="margin-left: 13px !important;
    font-size: 16px;
    color: #000;
    font-family: initial;
    padding: 0;
    margin: 0;"><a class="contact-team" style="color: #000;">contact@isportsrecruiting.com</a></h4>
</div></div>
</div>';

	
	
		 $this->load->library('email');        
         //$to_email = "sandeep@codenomad.net";       
         //$to_email = "amit@codenomad.net";       
         $to_email = $allemails;       
         $this->email->from('isportsrecruiting.com', 'iSportsRecruiting Team '); 
         $this->email->to($to_email);
         $this->email->subject('College Coaches are looking every day'); 
		 $this->email->message($message);
		 $this->email->set_mailtype("html");         
		      $done = $this->email->send();   
			 if($done)
			{
				echo "Yes";
			$update_date = array('last_sent_date'=> $next_date); 
			$this->db->where('mail_type','cron_job');
			$this->db->update('athletes_less_ninty_percentage',$update_date);	
			
			}
			 else 			
			 {
				 echo "No";
			 }   
				
				unset($fields_array);
				$fields_array = array();
			
			
			  
			}   
			 
				
						
		}
		}
			}
		}

		
		
		public function get_all_profile_data_free()
		{
		    $ses_id = $this->session->userdata('user_idd');
			$user_id = $this->session->userdata('userriddd');
			/* if($ses_id!=$user_id)
			echo $ses_id = $user_id; */
			
		
			$this->db->select('*');
			$this->db->from('new_profile');
			$this->db->where('user_id',$ses_id);
			$query = $this->db->get();
			$crone = $query->row_array();
			return $crone;			
		}
		public function get_all_basic_info()
		{
		    $ses_id = $this->session->userdata('user_idd');
			$this->db->select('*');
			$this->db->from('athletes_profile');
			$this->db->where('user_id',$ses_id);
			$query = $this->db->get();
			$crone = $query->row_array();
			if(empty($crone))
			{$this->db->select('*');
			$this->db->from('new_profile');
			$this->db->where('user_id',$ses_id);
			$query = $this->db->get();
			$crone = $query->row_array();
			}
			return $crone;			
		}
		public function total_email_read()
		{
			$ses_id = $this->session->userdata('user_idd');
			$this->db->select('*');
			$this->db->from('blast_email');
			$this->db->where('user_id',$ses_id);
			$this->db->where('open_email','1');
			$query = $this->db->get();
			$blast_email = $query->result_array();
			//print_r($blast_email);die;
			return $blast_email;			
		}
		 public function division($id)
		{
			$this->db->select('*');
			$this->db->from('sports_sport');
			$this->db->where('id',$id);
			$query = $this->db->get();
	    	$game = $query->row_array();
            $game_na = $game['sport_name'];
			$game_nam = str_replace("'", '', $game_na);
			$game_name = strtoupper($game_nam);	
			$this->db->select('UNIVERSITY_ID');
			$this->db->from('university_contact');
			$this->db->where('SPORTS',$game_name);
			$query = $this->db->get();
			$result = $query->result_array();
			
			if($result)
			{
			for($i=0;$i<count($result);$i++)
			{
			$arr[]=$result[$i]['UNIVERSITY_ID'];
			}
		
			$this->db->select('DIVISION');
			$this->db->from('university');
			$this->db->where('DIVISION','NCAA DI');
			$this->db->where_in('ID',$arr);
			$query1 = $this->db->get();
			$result2 = $query1->result_array();			
			$result3 = count($result2);
			
			
			$this->db->select('ID');
			$this->db->from('university');
			$this->db->where('DIVISION','NCAA DII');
			$this->db->where_in('ID',$arr);
			$query4 = $this->db->get();
			$result5 = $query4->result_array();
			$result6 = count($result5);
		 	
			
			$this->db->select('ID');
			$this->db->from('university');
			$this->db->where('DIVISION','NCAA DIII');
			$this->db->where_in('ID',$arr);
			$query7 = $this->db->get();
			$result8 = $query7->result_array();
			$result9 = count($result8);

			
			$this->db->select('ID');
			$this->db->from('university');
			$this->db->where('DIVISION','NAIA');
			$this->db->where_in('ID',$arr);
			$query10 = $this->db->get();
			$result11 = $query10->result_array();
			$result12 = count($result11);
		
		
			$this->db->select('ID');
			$this->db->from('university');
			$this->db->where('DIVISION','NJCAA');
			$this->db->where_in('ID',$arr);
			$query13 = $this->db->get();
			$result14 = $query13->result_array();
			$result15 = count($result14);
		
			
			$this->db->select('ID');
			$this->db->from('university');
			$this->db->where('DIVISION','USCAA');
			$this->db->where_in('ID',$arr);
			$query19 = $this->db->get();
			$result20 = $query19->result_array();
			$result21 = count($result20);
			  
						
			$this->db->select('ID');
			$this->db->from('university');
			$this->db->where('DIVISION','OTHER');
			$this->db->where_in('ID',$arr);
			$query22 = $this->db->get();
			$result23 = $query22->result_array();
			$result24 = count($result23);
			
			$values = array($result3,$result6,$result9,$result12,$result15,$result21,$result24,$id,$game_na);
			return  $values;
			}
			else{
			return 0;	
			}
		
		} 
		public function find_division($id)
		{
			$this->db->select('*');
			$this->db->from('sports_information');
			$this->db->where('sports_id',$id);
			$query131 = $this->db->get();
			$result141 = $query131->result_array();
		    return $result141;
		}
		public function all_athelte()
		{
			$sports_id = $this->session->userdata('sports_idd');
			$this->db->select('*');
			$this->db->from('athletes_profile');
			$this->db->where('games',$sports_id);
			$query131 = $this->db->get();
			$result141 = $query131->result_array();
		    return $result141;
		}
		public function position_name($pos_id)
		{
			$this->db->select('*');
			$this->db->from('athlete_position');
			$this->db->where('id',$pos_id);
			$query131 = $this->db->get();
			$result141 = $query131->row_array();
			//print_r($result141);die;
		    return $result141;
		}
		
		
		public function sports_info_show()
		{  /*  echo "<pre>";
		   print_r($_POST);
		   echo "</pre>";
		   echo "<pre>";
		   print_r($_POST);
		   echo "</pre>";
		die;  */
		
					if($_POST['sports_id']!='' && $_FILES['image']['name'])
					{
					
								$config['upload_path'] = './images/';
								$config['allowed_types'] = 'gif|jpg|png';
								$config['max_size']	= '2000';
								$this->load->library('upload',$config);
								$this->upload->do_upload('image');
								$data1 = array('upload_data' => $this->upload->data());
								$image = $data1['upload_data']['file_name'];
								
								for($i=0;$i<count($_POST['content']);$i++)
								{
									$sports_content = $_POST['sports_content'];
									$content = $_POST['content'][$i];
									$value = $_POST['value'][$i];
									$men = $_POST['men'][$i];
									$women = $_POST['women'][$i];
									$sports_id = $_POST['sports_id'];									
									$data = array(
									        'sports_content' => $sports_content,
									        'image' => $image,
									        'sports_id' => $sports_id,
											'content' => $content,
											'value' => $value,
											'men' => $men,
											'women' => $women
									);
									
									$this->db->insert('sports_information',$data);
		                         	
								}
								redirect('admin/sports');
					}
					else
					{
					echo "Please Fill The Correct Information";	
					}
		}
		public function update_info_shows($id)
		{
			// Plesae be carefull with this code 
	       $new_arr_create = $this->division($id);

			$config['upload_path'] = './images/';
								$config['allowed_types'] = 'gif|jpg|png';
								$config['max_size']	= '2000';
								$this->load->library('upload',$config);
								$this->upload->do_upload('image');
								$data1 = array('upload_data' => $this->upload->data());
								$image_name = $data1['upload_data']['file_name'];
			if($image_name )
			{
						for($i=0;$i<count($_POST['arr']);$i++)
					{
						$new_id = $_POST['arr'][$i];
						$data = array(
						'image' => $image_name,
						'value' => $new_arr_create[$i],
						'sports_content' => $_POST['sports_content'],
						'men' => $_POST['men'][$i],
						'women' => $_POST['women'][$i]
						);
						$this->db->where('id',$new_id);
						$dooo[] = $this->db->update('sports_information',$data);						 
					}
						//redirect('admin/sports');
				
			}
			else
			{
					for($i=0;$i<count($_POST['arr']);$i++)
					{
						$new_id = $_POST['arr'][$i];
					$data = array(
					'sports_content' => $_POST['sports_content'],
					'value' => $new_arr_create[$i],
					'men' => $_POST['men'][$i],
					'women' => $_POST['women'][$i]
					);
					$this->db->where('id',$new_id);
					$dooo[] = $this->db->update('sports_information',$data);		
					}
					//redirect('admin/sports');
			}
			return $dooo;
 		}
		public function sports_detail($id)
		{
			$this->db->select('*');
			$this->db->from('sports_information');
			$this->db->where('sports_id', $id );
			$query = $this->db->get();
			$sport_in = $query->result_array();
			return $sport_in;
		}
		public function sports_seodetail($id)
		{
			$this->db->select('seo_title,seo_description,seo_keywords');
			$this->db->from('sports_sport');
			$this->db->where('id', $id );
			$query = $this->db->get();
			$sport_in = $query->row_array();
			return $sport_in;
		}
		public function athlete_info()
		{
            $ses_id = $this->session->userdata('user_idd');
			$this->db->select('*');
			$this->db->from('athletes_profile');
			$this->db->where('user_id', $ses_id );
			$query = $this->db->get();
			$athlete_info = $query->row_array();
			if(empty($athlete_info))
			{
				$ses_id = $this->session->userdata('user_idd');
				$this->db->select('*');
				$this->db->from('new_profile');
				$this->db->where('user_id', $ses_id );
				$query = $this->db->get();
				$athlete_info = $query->row_array();
			}
			return $athlete_info;
		  
		}
		
			public function athlete_infoview($user_id)
		{
            $ses_id = $this->session->userdata('user_idd');
			$this->db->select('*');
			$this->db->from('athletes_profile');
			$this->db->where('user_id', $user_id );
			$query = $this->db->get();
			$athlete_info = $query->row_array();
			if(empty($athlete_info))
			{
				$this->db->select('*');
			$this->db->from('new_profile');
			$this->db->where('user_id', $user_id );
			$query = $this->db->get();
			$athlete_info = $query->row_array();
			}
			//print_r($athlete_info);die;
			return $athlete_info;
		  
		}
			public function athlete_info1()
		{
            $ses_id = $this->session->userdata('user_idd');
			$this->db->select('*');
			$this->db->from('new_profile');
			$this->db->where('user_id', $ses_id );
			$query = $this->db->get();
			$athlete_info = $query->row_array();
		//	print_r($athlete_info);die;
			return $athlete_info;
		  
		}
		function get_position_name_acc_to_position($get_position_name)
		{
			$this->db->select('*');
			$this->db->from('athlete_position');
			$this->db->where('id', $get_position_name );
			$query = $this->db->get();
			$athlete_info = $query->row_array();
			
			//print_r($athlete_info);
			return $athlete_info;
		  
			
		}
			public function athlete_infosign()
		{
            $ses_id = $this->session->userdata('userriddd');
			$this->db->select('*');
			$this->db->from('new_profile');
			$this->db->where('user_id', $ses_id );
			$query = $this->db->get();
			$athlete_info = $query->row_array();
		//	print_r($athlete_info);die;
			return $athlete_info;
		  
		}
			public function athlete_info11()
		{
            //$ses_id = $this->session->userdata('user_id');
               $id3=$this->session->userdata('user_idd');
              // echo $id3;
	        if($id3)
	   {
			$this->db->select('*');
			$this->db->from('new_profile');
			$this->db->where('user_id', $id3 );
			$query = $this->db->get();
			$athlete_info = $query->row_array();
		//	print_r($athlete_info);die;
			return $athlete_info;
	   }
		  
		}
		public function athlete_info112()
		{
		     $id3=$this->session->userdata('userdata');
		     $this->db->select('*');
			$this->db->from('new_profile');
			$this->db->where('user_id', $id3 );
			$query = $this->db->get();
			$athlete_info = $query->row_array();
		//	print_r($athlete_info);die;
			return $athlete_info;
		}
	
			public function free_profile_athlete_info()
		{
            $ses_id = $this->session->userdata('userdata');
			$this->db->select('*');
			$this->db->from('new_profile');
			$this->db->where('user_id', $ses_id );
			$query = $this->db->get();
			$athlete_info = $query->row_array();
			return $athlete_info;
		  
		}
		public function getall_sports_home()
		{
			$this->db->select('*');
			$this->db->from('sports_sport');
			$query = $this->db->get();
	    	$game = $query->result_array();
		 	return $game;
		}
		public function get_sports_name($id)
		{
			$this->db->select('*');
			$this->db->from('sports_sport');
			$this->db->where('id', $id );
			$query = $this->db->get();
	    	$game_name = $query->row_array();
		 	return $game_name;
		}
		public function get_sports_id($name)
		{
				//echo $name;die;
			$this->db->select('id');
			$this->db->from('sports_sport');
			$this->db->where("slug",$name);
			$query = $this->db->get();
	      $game_id = $query->row_array();
		 	return $game_id;
		}
		public function get_game_for_coach($id)
		{
			$this->db->select('*');
			$this->db->from('sports_sport');
			$this->db->where('id',$id);
			$query = $this->db->get();
	    	$game = $query->row_array();
		 	return $game;
		}
		public function get_game($id)
		{
  			$ses_id = $this->session->userdata('user_idd');
			$this->db->select('*');
			$this->db->from('sports_sport');
			$this->db->where('id',$id);
			$query = $this->db->get();
	    	$game = $query->row_array();
		 	return $game;
	    }
		public function get_game_free_profile($game_id)
		{  			
			$this->db->select('*');
			$this->db->from('sports_sport');
			$this->db->where('id',$game_id);
			$query = $this->db->get();
	    	$game = $query->row_array();
		 	return $game;
	    }
	    public function get_all_game()
	    {
	        $this->db->select('*');
			$this->db->from('sports_sport');
	
			$query = $this->db->get();
	    	$game = $query->result_array();
	    //	print_r($game);die;
		 	return $game;
	    }
	    public function insert_values()
	    {
	        
	        $namee=$this->input->post('email');
			//echo $namee;die;
	        $this->db->select('*');
			$this->db->from('free_profile_register');
			$query = $this->db->get();
			$athlete_info = $query->result_array();
		//	print_r($athlete_info);die;
		
		   for($i=0;$i<count($athlete_info);$i++)
		   {
		      $arr[]=$athlete_info[$i]['email'];
		   }
		  if (in_array("$namee", $arr))
              {
				  //echo "valid";die;
                 $this->session->set_flashdata("error","User Already Exist So Please Use Another Username"); 
               	 redirect('iscoutyou/free_profile_register');
              }
		
            else
              {
				  //echo "not valid";die;
              $pass=md5($this->input->post('password'));
			  $currentdate = date('Y-m-d');			  
              $data = array('username'=>$this->input->post('username'),
             'game'=>$this->input->post('games'),
             'password'=>$pass,
             'email'=>$this->input->post('email'),
             'date'=>$currentdate,
             'reffered_by'=>$this->input->post('reffered_by'));
        $in = $this->db->insert('free_profile_register',$data);
		if($in)
		{
			$save_refferd = array ('username'=>$this->input->post('reffered_by'),'password'=>md5('password@123'),'notes'=>'','date'=>'');
			$savedata = $this->db->insert('users_recruiting', $save_refferd);
		}
        $rt=0;
        $insert_id = $this->db->insert_id();
        $data2 = array('user_id'=>$insert_id,
              'games'=>$this->input->post('games'),
              'position_id'=>$rt,
 
  );
         $in = $this->db->insert('new_profile',$data2);
       // echo $insert_id;die;
        return $insert_id;
              }
		
 }
	    public function selectidforfreeprofile()
	    {
	        
		$this->db->order_by("id","desc");
	    $this->db->limit(1);
		$this->db->select('*');
        $this->db->from('free_profile_register');
        $query = $this->db->get();
        $athlete = $query->row_array();
        //print_r($athlete);die;
		return $athlete;
	
	    }
	    public function get_sport()
	    {
	        $id=$this->session->userdata('user_idd');
		    $regid=$this->session->userdata('userriddd');
			if($id)
			{
				$regid11=$id;
			}
			if($regid)
			{
				$regid11=$regid;
			}
	        $this->db->select('*');
			$this->db->from('free_profile_register');
			$this->db->where('id',$regid11);
			$query = $this->db->get();
	    	$game = $query->row_array();
	    //	print_r($game);die;
		 	return $game;
	        
	    }
	    public function insert_stats()
	    {
	      
	            $id=$this->session->userdata('user_idd');
		        $this->db->select('*');
				$this->db->from('free_profile_register');
				$this->db->where('id',$id);
				$query = $this->db->get();
				$game = $query->row_array();		  
	            $sports = $game['game'];       
	         
	         $data = array(
			'user_id' => $id,
			'sports_id'=>$sports,
		    'position_id'=>$this->input->post('position'),
			'stats' =>'',
			'year' =>$this->input->post('grad_year'),
            );
			
		   $in = $this->db->insert('free_profile_athlete_stats_value',$data);		   
		   return $in;
		  
		   
	         
	    }
		public function Academic_info_model_school_for_coach($id)
		{
		$this->db->order_by("year_acad_graduation","desc");
	    $this->db->limit(3);
		$this->db->select('*');
        $this->db->from('athletes_academic_info');
        $this->db->where('user_id', $id );
        $query = $this->db->get();
        $athlete = $query->result_array();
		return $athlete;
		}
		public function get_athlete_position_free($weight)
		{
		
		$this->db->select('positions');
        $this->db->from('athlete_position');
        $this->db->where('id', $weight );
        $query = $this->db->get();
        $position_free = $query->row_array();
		return $position_free;
		}
		public function Academic_info_model_school()
		{
		$ses_id = $this->session->userdata('user_idd');
		$user_id = $this->session->userdata('userriddd');
		
		$this->db->order_by("year_acad_graduation","desc");
	    $this->db->limit(3);
		$this->db->select('*');
        $this->db->from('athletes_academic_info');
        $this->db->where('user_id', $ses_id );
        $query = $this->db->get();
        $athlete = $query->result_array();
		return $athlete;
		}
			public function Academic_info_model_schoolview($user_id)
		{
		//$ses_id = $this->session->userdata('user_id');
		$this->db->order_by("year_acad_graduation","desc");
	    $this->db->limit(3);
		$this->db->select('*');
        $this->db->from('athletes_academic_info');
        $this->db->where('user_id', $user_id );
        $query = $this->db->get();
        $athlete = $query->result_array();
		if(empty($athlete))
		{
			
			$this->db->order_by("year-acad_graduation","desc");
	    $this->db->limit(3);
		$this->db->select('*');
        $this->db->from('free_profile_athletes_academic_info');
        $this->db->where('user_id', $user_id );
        $query = $this->db->get();
        $athlete = $query->result_array();
		}
		return $athlete;
		}
		
		public function free_profile_Academic_info_model_school()
		{
		$ses_id = $this->session->userdata('userdata');
		$this->db->order_by("year-acad_graduation","desc");
	    $this->db->limit(3);
		$this->db->select('*');
        $this->db->from('free_profile_athletes_academic_info');
        $this->db->where('user_id', $ses_id );
        $query = $this->db->get();
        $athlete = $query->result_array();
		return $athlete;
		}
		public function free_profile_Academic_info_model_foradmin()
		{
		
		$this->db->order_by("year-acad_graduation","desc");
	    $this->db->limit(3);
		$this->db->select('*');
        $this->db->from('free_profile_athletes_academic_info');
        $this->db->where('user_id', $ses_id );
        $query = $this->db->get();
        $athlete = $query->result_array();
		return $athlete;
		}
			public function free_profile_Academic_info_model_school4()
		{
		$ses_id = $this->session->userdata('user_idd');
		$this->db->order_by("year-acad_graduation","desc");
	    $this->db->limit(3);
		$this->db->select('*');
        $this->db->from('free_profile_athletes_academic_info');
        $this->db->where('user_id', $ses_id );
        $query = $this->db->get();
        $athlete = $query->result_array();
		return $athlete;
		}
		
		public function Academic_info_model_award_for_coach($id)
		{
		$this->db->select('*');
		$this->db->order_by("year","desc");
	    $this->db->limit(3);
        $this->db->from('athletes_awards');
        $this->db->where('user_id', $id );
        $query1 = $this->db->get();
        $awards = $query1->result_array();
		return $awards;
			
		}
		public function Academic_info_model_award()
		{
		$ses_id = $this->session->userdata('user_idd');
		$this->db->select('*');
		$this->db->order_by("year","desc");
	    $this->db->limit(3);
        $this->db->from('athletes_awards');
        $this->db->where('user_id', $ses_id );
        $query1 = $this->db->get();
        $awards = $query1->result_array();
		return $awards;
		}
			public function Academic_info_model_awardview($user_id)
		{
		//$ses_id = $this->session->userdata('user_id');
		$this->db->select('*');
		$this->db->order_by("year","desc");
	    $this->db->limit(3);
        $this->db->from('athletes_awards');
        $this->db->where('user_id', $user_id );
        $query1 = $this->db->get();
        $awards = $query1->result_array();
		if(empty($awards))
		{
			$this->db->select('*');
		$this->db->order_by("year","desc");
	    $this->db->limit(3);
        $this->db->from('free_profile_athletes_awards');
        $this->db->where('user_id', $user_id );
        $query1 = $this->db->get();
        $awards = $query1->result_array();
		}
		return $awards;
		}
		public function free_profile_Academic_info_model_award()
		{
		$ses_id = $this->session->userdata('userdata');
		$this->db->select('*');
		$this->db->order_by("year","desc");
	    $this->db->limit(3);
        $this->db->from('free_profile_athletes_awards');
        $this->db->where('user_id', $ses_id );
        $query1 = $this->db->get();
        $awards = $query1->result_array();
        //prin_r($awards);
		return $awards;
		}
		public function free_prof_Aca_award_foradmin($get_sports)
		{
		
		$this->db->select('*');
		$this->db->order_by("year","desc");
	    $this->db->limit(3);
        $this->db->from('free_profile_athletes_awards');
        $this->db->where('user_id', $get_sports );
        $query1 = $this->db->get();
        $awards = $query1->result_array();
        //prin_r($awards);
		return $awards;
		}
				public function free_profile_Academic_info_model_award4()
		{
		$ses_id = $this->session->userdata('user_idd');
		$this->db->select('*');
		$this->db->order_by("year","desc");
	    $this->db->limit(3);
        $this->db->from('free_profile_athletes_awards');
        $this->db->where('user_id', $ses_id );
        $query1 = $this->db->get();
        $awards = $query1->result_array();
        //prin_r($awards);
		return $awards;
		}
		public function  Academic_info_model_achivement_for_coach($id)
		{
		$this->db->order_by("year","desc");
	    $this->db->limit(3);
		$this->db->select('*');
        $this->db->from('athletes_achivement');
        $this->db->where('user_id', $id );
        $query2 = $this->db->get();
        $archivement = $query2->result_array();
		return $archivement;
		}
		public function Academic_info_model_achivement()
		{
		$ses_id = $this->session->userdata('user_idd');
		$this->db->order_by("year","desc");
	    $this->db->limit(3);
		$this->db->select('*');
        $this->db->from('athletes_achivement');
        $this->db->where('user_id', $ses_id );
        $query2 = $this->db->get();
        $archivement = $query2->result_array();
		return $archivement;
		}
			public function Academic_info_model_achivementview($user_id)
		{
		$ses_id = $this->session->userdata('user_idd');
		$this->db->order_by("year","desc");
	    $this->db->limit(3);
		$this->db->select('*');
        $this->db->from('athletes_achivement');
        $this->db->where('user_id', $user_id );
        $query2 = $this->db->get();
        $archivement = $query2->result_array();
		if(empty($archivement))
		{
			$this->db->order_by("year","desc");
	    $this->db->limit(3);
		$this->db->select('*');
        $this->db->from('free_profile_athletes_achivement');
        $this->db->where('user_id', $user_id );
        $query2 = $this->db->get();
        $archivement = $query2->result_array();
		}
		return $archivement;
		}
		public function free_profile_Academic_info_model_achivement()
		{
		$ses_id = $this->session->userdata('userdata');
		$this->db->order_by("year","desc");
	    $this->db->limit(3);
		$this->db->select('*');
        $this->db->from('free_profile_athletes_achivement');
        $this->db->where('user_id', $ses_id );
        $query2 = $this->db->get();
        $archivement = $query2->result_array();
      //  print_r($archivement);die;
		return $archivement;
		}
		public function free_prof_Aca_achv_foradm($get_sports)	
		{		
		$this->db->select('*');
        $this->db->from('free_profile_athletes_achivement');
        $this->db->where('user_id', $get_sports );
        $query2 = $this->db->get();
        $archivement = $query2->result_array();
      //  print_r($archivement);die;
		return $archivement;
		}
			public function free_profile_Academic_info_model_achivement4()
		{
		$ses_id = $this->session->userdata('user_idd');
		$this->db->order_by("year","desc");
	    $this->db->limit(3);
		$this->db->select('*');
        $this->db->from('free_profile_athletes_achivement');
        $this->db->where('user_id', $ses_id );
        $query2 = $this->db->get();
        $archivement = $query2->result_array();
      //  print_r($archivement);die;
		return $archivement;
		}
		public function Academic_info_model_honorget($user_id)
		{
		$this->db->order_by("year","desc");
	    $this->db->limit(5);
		$this->db->select('*');
        $this->db->from('athlete_honor_roll');
        $this->db->where('user_id',$user_id);
        $query2 = $this->db->get();
        $honor = $query2->result_array();
		if(empty($honor))
		{
			$this->db->order_by("year","desc");
	    $this->db->limit(5);
		$this->db->select('*');
        $this->db->from('free_profile_athlete_honor_roll');
        $this->db->where('user_id',$user_id);
        $query2 = $this->db->get();
        $honor = $query2->result_array();
		}
		return $honor;	
		}
		public function free_profile_Academic_info_model_honorget()
		{
		$ses_id = $this->session->userdata('userdata');		
		$this->db->select('*');
        $this->db->from('free_profile_athlete_honor_roll');
        $this->db->where('user_id',$ses_id);
        $query2 = $this->db->get();
        $honor = $query2->row_array();
       // print_r($honor);die;
		return $honor;	
		}
		public function fre_prof_Acad_info_honor_foradmin($get_sports)
		{
		
		$this->db->order_by("year","desc");
	    $this->db->limit(5);
		$this->db->select('*');
        $this->db->from('free_profile_athlete_honor_roll');
        $this->db->where('user_id',$get_sports);
        $query2 = $this->db->get();
        $honor = $query2->result_array();
       // print_r($honor);die;
		return $honor;	
		}
			public function free_profile_Academic_info_model_honorget4()
		{
		$ses_id =$this->session->userdata('user_idd');
		$this->db->order_by("year","desc");
	    $this->db->limit(5);
		$this->db->select('*');
        $this->db->from('free_profile_athlete_honor_roll');
        $this->db->where('user_id',$ses_id);
        $query2 = $this->db->get();
        $honor = $query2->result_array();
       // print_r($honor);die;
		return $honor;	
		}
		public function Academic_school()
		{
			
			$ses_id = $this->session->userdata('user_idd');
			$year = $_POST['year_acad_graduation'];
			$this->db->select('*');
			$this->db->from('athletes_academic_info');
			$this->db->where('year_acad_graduation', $year );
			$this->db->where('user_id', $ses_id );
			$query = $this->db->get();
			$his = $query->row_array();
			if($his)
			{
				$data = array(
				'year_acad_graduation' => $this->input->post('year_acad_graduation'),
				'school' => $this->input->post('school'),
				'user_id' => $ses_id
				);
				$this->db->where('year_acad_graduation', $year);
				$this->db->where('user_id', $ses_id);
                $dooo = $this->db->update('athletes_academic_info',$data);
				 if($dooo)
				 {
				 redirect('iscoutyou/academic_info/');
				 }
			}
			else
			{
               $data = array(
			'year_acad_graduation' => $this->input->post('year_acad_graduation'),
			'school' => $this->input->post('school'),
			'user_id' => $ses_id
            );
			$this->db->insert('athletes_academic_info', $data);
			$insert_id = $this->db->insert_id();
			return  $insert_id;			
			
			}
			
		}
		public function free_profile_honour_Academic()
		{
		    $ses_id = $this->session->userdata('userdata');
			$year = $_POST['year'];
			$this->db->select('*');
			$this->db->from('free_profile_athlete_honor_roll');
			$this->db->where('year', $year );
			$this->db->where('user_id', $ses_id );
			$query = $this->db->get();
			$his = $query->row_array();
			if($his)
			{
				$data = array(
				'year' => $this->input->post('year'),
				'honor_roll' => $this->input->post('honor_roll'),
				'user_id' => $ses_id
				);
				$this->db->where('year', $year);
				$this->db->where('user_id', $ses_id);
                $dooo = $this->db->update('free_profile_athlete_honor_roll',$data);
				 if($dooo)
				 {
				 redirect('iscoutyou/free_profile_academic_info/');
				 }
			}
			else
			{
               $data = array(
			'year' => $this->input->post('year'),
			'honor_roll' => $this->input->post('honor_roll'),
			'user_id' => $ses_id
            );
			$this->db->insert('free_profile_athlete_honor_roll', $data);
			$insert_id = $this->db->insert_id();
			return  $insert_id;			
			
			}
		    
		}
			public function free_profile_honour_Academic4()
		{
		    $ses_id = $this->session->userdata('user_idd');
			$year = $_POST['year'];
			$this->db->select('*');
			$this->db->from('free_profile_athlete_honor_roll');
			$this->db->where('year', $year );
			$this->db->where('user_id', $ses_id );
			$query = $this->db->get();
			$his = $query->row_array();
			if($his)
			{
				$data = array(
				'year' => $this->input->post('year'),
				'honor_roll' => $this->input->post('honor_roll'),
				'user_id' => $ses_id
				);
				$this->db->where('year', $year);
				$this->db->where('user_id', $ses_id);
                $dooo = $this->db->update('free_profile_athlete_honor_roll',$data);
				 if($dooo)
				 {
				 redirect('iscoutyou/free_profile_academic_info/');
				 }
			}
			else
			{
               $data = array(
			'year' => $this->input->post('year'),
			'honor_roll' => $this->input->post('honor_roll'),
			'user_id' => $ses_id
            );
			$this->db->insert('free_profile_athlete_honor_roll', $data);
			$insert_id = $this->db->insert_id();
			return  $insert_id;			
			
			}
		    
		}
			public function free_profile_Academic_school()
		{
			$ses_id = $this->session->userdata('userdata');
			$year = $_POST['year_acad_graduation'];
			$this->db->select('*');
			$this->db->from('free_profile_athletes_academic_info');
			$this->db->where('year-acad_graduation', $year );
			$this->db->where('user_id', $ses_id );
			$query = $this->db->get();
			$his = $query->row_array();
			if($his)
			{
				$data = array(
				'year-acad_graduation' => $this->input->post('year_acad_graduation'),
				'school' => $this->input->post('school'),
				'user_id' => $ses_id
				);
				$this->db->where('year-acad_graduation', $year);
				$this->db->where('user_id', $ses_id);
                $dooo = $this->db->update('free_profile_athletes_academic_info',$data);
				 if($dooo)
				 {
				 redirect('iscoutyou/free_profile_academic_info/');
				 }
			}
			else
			{
               $data = array(
			'year-acad_graduation' => $this->input->post('year_acad_graduation'),
			'school' => $this->input->post('school'),
			'user_id' => $ses_id
            );
			$this->db->insert('free_profile_athletes_academic_info', $data);
			$insert_id = $this->db->insert_id();
			return  $insert_id;			
			
			}
			
		}
		public function free_profile_Academic_school4()
		{
			$ses_id = $this->session->userdata('user_idd');
			$year = $_POST['year_acad_graduation'];
			$this->db->select('*');
			$this->db->from('free_profile_athletes_academic_info');
			$this->db->where('year-acad_graduation', $year );
			$this->db->where('user_id', $ses_id );
			$query = $this->db->get();
			$his = $query->row_array();
			if($his)
			{
				$data = array(
				'year-acad_graduation' => $this->input->post('year_acad_graduation'),
				'school' => $this->input->post('school'),
				'user_id' => $ses_id
				);
				$this->db->where('year-acad_graduation', $year);
				$this->db->where('user_id', $ses_id);
                $dooo = $this->db->update('free_profile_athletes_academic_info',$data);
				 if($dooo)
				 {
				 redirect('iscoutyou/free_profile_academic_info/');
				 }
			}
			else
			{
               $data = array(
			'year-acad_graduation' => $this->input->post('year_acad_graduation'),
			'school' => $this->input->post('school'),
			'user_id' => $ses_id
            );
			$this->db->insert('free_profile_athletes_academic_info', $data);
			$insert_id = $this->db->insert_id();
			return  $insert_id;			
			
			}
			
		}
		public function Academic_awards()
		{
				$ses_id = $this->session->userdata('user_idd');
				$year = $_POST['year'];
				$this->db->select('*');
				$this->db->from('athletes_awards');
				$this->db->where('year', $year );
				$this->db->where('user_id', $ses_id );
				$query = $this->db->get();
				$his = $query->row_array();
			if($his)
			{
				$data = array(
				'year' => $this->input->post('year'),
				'awards' => $this->input->post('awards'),
				'user_id' => $ses_id
				);
				$this->db->where('year', $year);
				$this->db->where('user_id', $ses_id);
				$dooo = $this->db->update('athletes_awards',$data);
				if($dooo)
				 {
				 redirect('iscoutyou/academic_info/');
				 }
			}
			else
			{
						$data = array(
			'year' => $this->input->post('year'),
			'awards' => $this->input->post('awards'),
			'user_id' => $ses_id
            );
			$this->db->insert('athletes_awards', $data);
			$insert_id = $this->db->insert_id();
			return  $insert_id;
			}
		}
		
				public function free_profile_Academic_awards()
		{
				$ses_id = $this->session->userdata('userdata');
				$year = $_POST['year'];
				$this->db->select('*');
				$this->db->from('athletes_awards');
				$this->db->where('year', $year );
				$this->db->where('user_id', $ses_id );
				$query = $this->db->get();
				$his = $query->row_array();
			if($his)
			{
				$data = array(
				'year' => $this->input->post('year'),
				'awards' => $this->input->post('awards'),
				'user_id' => $ses_id
				);
				$this->db->where('year', $year);
				$this->db->where('user_id', $ses_id);
				$dooo = $this->db->update('free_profile_athletes_awards',$data);
				if($dooo)
				 {
				 redirect('iscoutyou/free_profile_academic_info/');
				 }
			}
			else
			{
						$data = array(
			'year' => $this->input->post('year'),
			'awards' => $this->input->post('awards'),
			'user_id' => $ses_id
            );
			$this->db->insert('free_profile_athletes_awards', $data);
			$insert_id = $this->db->insert_id();
			return  $insert_id;
			}
		}
		
		
		
					public function free_profile_Academic_awards4()
		{
				$ses_id = $this->session->userdata('user_idd');
				$year = $_POST['year'];
				$this->db->select('*');
				$this->db->from('free_profile_athletes_awards');
				$this->db->where('year', $year );
				$this->db->where('user_id', $ses_id );
				$query = $this->db->get();
				$his = $query->row_array();
			if($his)
			{
				$data = array(
				'year' => $this->input->post('year'),
				'awards' => $this->input->post('awards'),
				'user_id' => $ses_id
				);
				$this->db->where('year', $year);
				$this->db->where('user_id', $ses_id);
				$dooo = $this->db->update('free_profile_athletes_awards',$data);
				if($dooo)
				 {
				 redirect('iscoutyou/free_profile_academic_info/');
				 }
			}
			else
			{
						$data = array(
			'year' => $this->input->post('year'),
			'awards' => $this->input->post('awards'),
			'user_id' => $ses_id
            );
			$this->db->insert('free_profile_athletes_awards', $data);
			$insert_id = $this->db->insert_id();
			return  $insert_id;
			}
		}
		public function Academic_achivement()
		{
			$ses_id = $this->session->userdata('user_idd');
			$year = $_POST['year'];
			$this->db->select('*');
			$this->db->from('athletes_achivement');
			$this->db->where('year', $year );
			$this->db->where('user_id', $ses_id );
			$query = $this->db->get();
			$his = $query->row_array();
			if($his)
			{
				$data = array(
				'year' => $this->input->post('year'),
				'descriptions' => $this->input->post('descriptions'),
				'user_id' => $ses_id
				);
				$this->db->where('year', $year);
				$this->db->where('user_id', $ses_id);
				$dooo = $this->db->update('athletes_achivement',$data);
				if($dooo)
				{
				 redirect('iscoutyou/academic_info/');
				}
				
			}
			else
			{
				$data = array(
			'year' => $this->input->post('year'),
			'descriptions' => $this->input->post('descriptions'),
			'user_id' => $ses_id
            );
			$this->db->insert('athletes_achivement', $data);
			$insert_id = $this->db->insert_id();
			return  $insert_id;
			}
			
		}	
		public function free_profile_Academic_achivement()
		{
			$ses_id = $this->session->userdata('userdata');
			$year = $_POST['year'];
			$this->db->select('*');
			$this->db->from('free_profile_athletes_achivement');
			$this->db->where('year', $year );
			$this->db->where('user_id', $ses_id );
			$query = $this->db->get();
			$his = $query->row_array();
			if($his)
			{
				$data = array(
				'year' => $this->input->post('year'),
				'descriptions' => $this->input->post('descriptions'),
				'user_id' => $ses_id
				);
				$this->db->where('year', $year);
				$this->db->where('user_id', $ses_id);
				$dooo = $this->db->update('free_profile_athletes_achivement',$data);
				if($dooo)
				{
				 redirect('iscoutyou/free_profile_Academic_info/');
				}
				
			}
			else
			{
				$data = array(
			'year' => $this->input->post('year'),
			'descriptions' => $this->input->post('descriptions'),
			'user_id' => $ses_id
            );
			$this->db->insert('free_profile_athletes_achivement', $data);
			$insert_id = $this->db->insert_id();
			return  $insert_id;
			}
			
		}
		public function free_profile_Academic_achivement4()
		{
			$ses_id = $this->session->userdata('user_idd');
			$year = $_POST['year'];
			$this->db->select('*');
			$this->db->from('free_profile_athletes_achivement');
			$this->db->where('year', $year );
			$this->db->where('user_id', $ses_id );
			$query = $this->db->get();
			$his = $query->row_array();
			if($his)
			{
				$data = array(
				'year' => $this->input->post('year'),
				'descriptions' => $this->input->post('descriptions'),
				'user_id' => $ses_id
				);
				$this->db->where('year', $year);
				$this->db->where('user_id', $ses_id);
				$dooo = $this->db->update('free_profile_athletes_achivement',$data);
				if($dooo)
				{
				 redirect('iscoutyou/free_profile_Academic_info/');
				}
				
			}
			else
			{
				$data = array(
			'year' => $this->input->post('year'),
			'descriptions' => $this->input->post('descriptions'),
			'user_id' => $ses_id
            );
			$this->db->insert('free_profile_athletes_achivement', $data);
			$insert_id = $this->db->insert_id();
			return  $insert_id;
			}
			
		}
		public function Academic_del($id)
		{
			//$ses_id = $this->session->userdata('user_id');
			$this->db->select('*');
			$this->db->from('athletes_academic_info');
			$this->db->where('id', $id );
			$query = $this->db->get();
			$athlete = $query->row_array();
			if($athlete)
			{
			return  $athlete;
			}
			else
			{
		    redirect('iscoutyou/academic_info/');
			}
		}
		 public function free_profile_Academic_del($id)
		{
			//$ses_id = $this->session->userdata('user_id');
			$this->db->select('*');
			$this->db->from('free_profile_athletes_academic_info');
			$this->db->where('id', $id );
			$query = $this->db->get();
			$athlete = $query->row_array();
			if($athlete)
			{
			return  $athlete;
			}
			else
			{
		    redirect('iscoutyou/free_profile_academic_info/');
			}
		}
		public function academic_info_del_done()
		{
			$idd= $this->input->post('iddd');
		    //echo $id=$this->uri->segment(2);die;
			//echo $id = $_GET['iddd'];die;
			//echo $id;die;
			$this->db->where('id', $idd);
            $done = $this->db->delete('athletes_academic_info');
			if($done)
			{
		    redirect('iscoutyou/academic_info/');
			}
		}
		public function free_profile_academic_info_del_done()
	      {
		    $id = $_POST['iddd'];
		//	echo $id;die;
			$this->db->where('id', $id);
            $done = $this->db->delete('free_profile_athletes_academic_info');
			if($done)
			{
		    redirect('iscoutyou/free_profile_academic_info/');
			}
		}
		public function academic_honor_update($id)
		{
			$this->db->select('*');
			$this->db->from('athlete_honor_roll');
			$this->db->where('id', $id );
			$query = $this->db->get();
			$honor = $query->row_array();
			return $honor;
		}
			public function free_profile_academic_honor_update($id)
		{
			$this->db->select('*');
			$this->db->from('free_profile_athlete_honor_roll');
			$this->db->where('id', $id );
			$query = $this->db->get();
			$honor = $query->row_array();
			return $honor;
		}
		public function del_honor_page($id)
		{
			//echo $id;die;
			$this->db->select('*');
			$this->db->from('athlete_honor_roll');
			$this->db->where('id', $id );
			$query = $this->db->get();
			$del_honor = $query->row_array();
			return  $del_honor;
		}
		public function free_profile_del_honor_page($id)
		{
		   // echo $id;die;
			$this->db->select('*');
			$this->db->from('free_profile_athlete_honor_roll');
			$this->db->where('id', $id );
			$query = $this->db->get();
			$del_honor = $query->row_array();
		//	print_r($del_honor);die;
			return  $del_honor;
		}
		public function academic_info_del($id)
		{
			
			$this->db->select('*');
			$this->db->from('athletes_awards');
			$this->db->where('id', $id );
			$query = $this->db->get();
			$athlete_id = $query->row_array();
			if($athlete_id)
			{
			return  $athlete_id;
			}
			else
			{
		    redirect('iscoutyou/academic_info/');
			}
		}
			public function free_profile_academic_info_del($id)
		{
			
			$this->db->select('*');
			$this->db->from('free_profile_athletes_awards');
			$this->db->where('id', $id );
			$query = $this->db->get();
			$athlete_id = $query->row_array();
			if($athlete_id)
			{
			return  $athlete_id;
			}
			else
			{
		    redirect('iscoutyou/free_profile_academic_info/');
			}
		}
		public function academic_info_del_awards()
		{
			$id = $_POST['idddd'];
			$this->db->where('id', $id);
            $do = $this->db->delete('athletes_awards');
			if($do)
			{
		    redirect('iscoutyou/academic_info/');
			}
		}
		public function free_profile_academic_info_del_awards()
		{
			$id = $_POST['idddd'];
			$this->db->where('id', $id);
            $do = $this->db->delete('free_profile_athletes_awards');
			if($do)
			{
		    redirect('iscoutyou/free_profile_academic_info/');
			}
		}
		public function academic_info_del_achivement($id)
		{
			
			$this->db->select('*');
			$this->db->from('athletes_achivement');
			$this->db->where('id', $id );
			$query = $this->db->get();
			$athlete_id1 = $query->row_array();
			if($athlete_id1)
			{
			return  $athlete_id1;
			}
			else
			{
		    redirect('iscoutyou/academic_info/');
			}
		}
			public function free_profile_academic_info_del_achivement($id)
		{
			
			$this->db->select('*');
			$this->db->from('free_profile_athletes_achivement');
			$this->db->where('id', $id );
			$query = $this->db->get();
			$athlete_id1 = $query->row_array();
			if($athlete_id1)
			{
			return  $athlete_id1;
			}
			else
			{
		    redirect('iscoutyou/free_profile_academic_info/');
			}
		}
		public function academic_info_delete_achivement()
		{
			$id = $_POST['idd'];
			$this->db->where('id', $id);
            $do1 = $this->db->delete('athletes_achivement');
			if($do1)
			{
		    redirect('iscoutyou/academic_info/');
			}
		}
				public function free_profile_academic_info_delete_achivement()
		{
			$id = $_POST['idd'];
			$this->db->where('id', $id);
            $do1 = $this->db->delete('free_profile_athletes_achivement');
			if($do1)
			{
		    redirect('iscoutyou/free_profile_academic_info/');
			}
		}
		public function academic_info_update($id)
		{
			$this->db->select('*');
			$this->db->from('athletes_academic_info');
			$this->db->where('id', $id );
			$query = $this->db->get();
			$ath_id = $query->row_array();
			if($ath_id)
			{
			return  $ath_id;
			}
			else
			{
		    redirect('iscoutyou/academic_info/');
			}
		}
				public function free_profile_academic_info_update($id)
		{
			$this->db->select('*');
			$this->db->from('free_profile_athletes_academic_info');
			$this->db->where('id', $id );
			$query = $this->db->get();
			$ath_id = $query->row_array();
			if($ath_id)
			{
			return  $ath_id;
			}
			else
			{
		    redirect('iscoutyou/free_profile_academic_info/');
			}
		}
		public function academic_info_update_done()
		{
			$id = $_POST['idddddd'];
            $data = array(
						'year_acad_graduation' => $this->input->post('year_acad_graduation'),
						'school' => $this->input->post('school')
						);
			$this->db->where('id', $id);
            $dooo = $this->db->update('athletes_academic_info',$data);
			if($dooo)
			{
		    redirect('iscoutyou/academic_info/');
			}
		}
				public function free_profile_academic_info_update_done()
		{
			$id = $_POST['idddddd'];
            $data = array(
						'year-acad_graduation' => $this->input->post('year_acad_graduation'),
						'school' => $this->input->post('school')
						);
			$this->db->where('id', $id);
            $dooo = $this->db->update('free_profile_athletes_academic_info',$data);
			if($dooo)
			{
		    redirect('iscoutyou/free_profile_academic_info/');
			}
		}
		public function academic_awards_update($id)
		{
			$this->db->select('*');
			$this->db->from('athletes_awards');
			$this->db->where('id', $id );
			$query = $this->db->get();
			$a = $query->row_array();
			if($a)
			{
			return  $a;
			}
			else
			{
		    redirect('iscoutyou/academic_info/');
			}
		}
			public function free_profile_academic_awards_update($id)
		{
			$this->db->select('*');
			$this->db->from('free_profile_athletes_awards');
			$this->db->where('id', $id );
			$query = $this->db->get();
			$a = $query->row_array();
			if($a)
			{
			return  $a;
			}
			else
			{
		    redirect('iscoutyou/free_profile_academic_info/');
			}
		}
		public function academic_awards_update_done()
		{
			$id = $_POST['id7'];
            $data = array(
						'awards' => $this->input->post('awards'),
						'year' => $this->input->post('year')
						);
			$this->db->where('id', $id);
            $dooo = $this->db->update('athletes_awards',$data);
			if($dooo)
			{
		    redirect('iscoutyou/academic_info/');
			}
		}
			public function free_profile_academic_awards_update_done()
		{
			$id = $_POST['id7'];
            $data = array(
						'awards' => $this->input->post('awards'),
						'year' => $this->input->post('year')
						);
			$this->db->where('id', $id);
            $dooo = $this->db->update('free_profile_athletes_awards',$data);
			if($dooo)
			{
		    redirect('iscoutyou/free_profile_academic_info/');
			}
		}
		public function academic_achivement_update($id)
		{
			$this->db->select('*');
			$this->db->from('athletes_achivement');
			$this->db->where('id', $id );
			$query = $this->db->get();
			$ab = $query->row_array();
			if($ab)
			{
			return  $ab;
			}
			else
			{
		    redirect('iscoutyou/academic_info/');
			}
		}
			public function free_profile_academic_achivement_update($id)
		{
			$this->db->select('*');
			$this->db->from('free_profile_athletes_achivement');
			$this->db->where('id', $id );
			$query = $this->db->get();
			$ab = $query->row_array();
			if($ab)
			{
			return  $ab;
			}
			else
			{
		    redirect('iscoutyou/free_profile_academic_info/');
			}
		}
		public function academic_achivement_update_done()
		{
			$id = $_POST['id4'];
            $data = array(
						'descriptions' => $this->input->post('descriptions'),
						'year' => $this->input->post('year')
						);
			$this->db->where('id', $id);
            $dooo = $this->db->update('athletes_achivement',$data);
			if($dooo)
			{
		    redirect('iscoutyou/academic_info/');
			}
		}
			public function free_profile_academic_achivement_update_done()
		{
			$id = $_POST['id4'];
            $data = array(
						'descriptions' => $this->input->post('descriptions'),
						'year' => $this->input->post('year')
						);
			$this->db->where('id', $id);
            $dooo = $this->db->update('free_profile_athletes_achivement',$data);
			if($dooo)
			{
		    redirect('iscoutyou/free_profile_academic_info/');
			}
		}
		public function athletic_history_submit()
		{
			$ses_id = $this->session->userdata('user_idd');
			$year = $_POST['year'];
			$this->db->select('*');
			$this->db->from('atheletic_history');
			$this->db->where('year', $year );
			$query = $this->db->get();
			$his = $query->row_array();
			if($his)
			{
				$data = array(
				'year' => $this->input->post('year'),
				'highschool' => $this->input->post('highschool'),
				'descriptions' => $this->input->post('descriptions'),
				'user_id' => $ses_id
				);
				$this->db->where('year', $year);
                $dooo = $this->db->update('atheletic_history',$data);
				 if($dooo)
				 {
				 redirect('iscoutyou/athletic_info/');
				 }
				
			}
		    else
			{
				$data = array(
				'year' => $this->input->post('year'),
				'highschool' => $this->input->post('highschool'),
				'descriptions' => $this->input->post('descriptions'),
				'user_id' => $ses_id
				);
				$check = $this->db->insert('atheletic_history', $data);
				$insert_id = $this->db->insert_id();
				 if($insert_id)
				 {
				 redirect('iscoutyou/athletic_info/');
				 }
			}
		}
				public function free_profile_athletic_history_submit()
		{
			$ses_id = $this->session->userdata('userdata');
			$year = $_POST['year'];
			$this->db->select('*');
			$this->db->from('free_profile_atheletic_history');
			$this->db->where('year', $year );
			$query = $this->db->get();
			$his = $query->row_array();
			if($his)
			{
				$data = array(
				'year' => $this->input->post('year'),
				'highschool' => $this->input->post('highschool'),
				'descriptions' => $this->input->post('descriptions'),
				'user_id' => $ses_id
				);
				$this->db->where('year', $year);
                $dooo = $this->db->update('free_profile_atheletic_history',$data);
				 if($dooo)
				 {
				 redirect('iscoutyou/free_profile_athletic_info/');
				 }
				
			}
		    else
			{
				$data = array(
				'year' => $this->input->post('year'),
				'highschool' => $this->input->post('highschool'),
				'descriptions' => $this->input->post('descriptions'),
				'user_id' => $ses_id
				);
				$check = $this->db->insert('free_profile_atheletic_history', $data);
				$insert_id = $this->db->insert_id();
				 if($insert_id)
				 {
				 redirect('iscoutyou/free_profile_athletic_info/');
				 }
			}
		}
		
		public function free_profile_athletic_history_submit4()
		{
			$ses_id = $this->session->userdata('user_idd');
			$year = $_POST['year'];
			$this->db->select('*');
			$this->db->from('free_profile_atheletic_history');
			$this->db->where('year', $year );
			$query = $this->db->get();
			$his = $query->row_array();
			if($his)
			{
				$data = array(
				'year' => $this->input->post('year'),
				'highschool' => $this->input->post('highschool'),
				'descriptions' => $this->input->post('descriptions'),
				'user_id' => $ses_id
				);
				$this->db->where('year', $year);
                $dooo = $this->db->update('free_profile_atheletic_history',$data);
				 if($dooo)
				 {
				 redirect('iscoutyou/free_profile_athletic_info/');
				 }
				
			}
		    else
			{
				$data = array(
				'year' => $this->input->post('year'),
				'highschool' => $this->input->post('highschool'),
				'descriptions' => $this->input->post('descriptions'),
				'user_id' => $ses_id
				);
				$check = $this->db->insert('free_profile_atheletic_history', $data);
				$insert_id = $this->db->insert_id();
				 if($insert_id)
				 {
				 redirect('iscoutyou/free_profile_athletic_info/');
				 }
			}
		}
		public function get_athlete_history_for_coach($id)
		{
		    $this->db->order_by("year","desc");
			$this->db->limit(3);
			$this->db->select('*');
			$this->db->from('atheletic_history');	
			$this->db->where('user_id',$id);
			$query = $this->db->get();
			$his = $query->result_array();
			if(empty($his))
			{
				   $this->db->order_by("year","desc");
			$this->db->limit(3);
			$this->db->select('*');
			$this->db->from('free_profile_atheletic_history');	
			$this->db->where('user_id',$id);
			$query = $this->db->get();
			$his = $query->result_array();
			}
			return $his;	
		}
		public function get_athlete_history()
		{   
		    $ses_id = $this->session->userdata('user_idd');
			$this->db->order_by("year","desc");
			$this->db->limit(3);
			$this->db->select('*');
			$this->db->from('atheletic_history');	
			$this->db->where('user_id',$ses_id);
			$query = $this->db->get();
			$his = $query->result_array();
			return $his;
		}
			public function get_athlete_historyview($user_id)
		{   
		    $ses_id = $this->session->userdata('user_idd');
			$this->db->order_by("year","desc");
			$this->db->limit(3);
			$this->db->select('*');
			$this->db->from('atheletic_history');	
			$this->db->where('user_id',$user_id);
			$query = $this->db->get();
			$his = $query->result_array();
			if(empty($his))
			{
				$this->db->order_by("year","desc");
			$this->db->limit(3);
			$this->db->select('*');
			$this->db->from('free_profile_atheletic_history');	
			$this->db->where('user_id',$user_id);
			$query = $this->db->get();
			$his = $query->result_array();
			}
			return $his;
		}
		public function free_profile_get_athlete_history()
		{   
		    $ses_id = $this->session->userdata('userdata');
		 
			$this->db->order_by("year","desc");
			$this->db->limit(3);
			$this->db->select('*');
			$this->db->from('free_profile_atheletic_history');	
			$this->db->where('user_id',$ses_id);
			$query = $this->db->get();
			$his = $query->result_array();
		//	print_r($his);die;
			return $his;
		}
				public function free_profile_get_athlete_history4()
		{   
		    $ses_id = $this->session->userdata('user_idd');
		 
			$this->db->order_by("year","desc");
			$this->db->limit(3);
			$this->db->select('*');
			$this->db->from('free_profile_atheletic_history');	
			$this->db->where('user_id',$ses_id);
			$query = $this->db->get();
			$his = $query->result_array();
		//	print_r($his);die;
			return $his;
		}
		public function athlete_history_delete($id)
		{
			$this->db->select('*');
			$this->db->from(' atheletic_history');
			$this->db->where('id', $id );	
			$query = $this->db->get();
			$mis = $query->row_array();
			return $mis;
		}
			public function free_profile_athlete_history_delete($id)
		{
			$this->db->select('*');
			$this->db->from('free_profile_atheletic_history');
			$this->db->where('id', $id );	
			$query = $this->db->get();
			$mis = $query->row_array();
			return $mis;
		}
		public function athlete_history_delete_done()
		{
           $id = $_POST['id_del'];			
		   $this->db->where('id', $id);
		   $del = $this->db->delete('atheletic_history'); 
		   if($del)
		   {
			   redirect('iscoutyou/athletic_info/');
		   }
		}
			public function free_profile_athlete_history_delete_done()
		{
           $id = $_POST['id_del'];			
		   $this->db->where('id', $id);
		   $del = $this->db->delete('free_profile_atheletic_history'); 
		   if($del)
		   {
			   redirect('iscoutyou/free_profile_athletic_info/');
		   }
		}
		public function athlete_history_update($id)
		{
			$this->db->select('*');
			$this->db->from(' atheletic_history');
			$this->db->where('id', $id );	
			$query = $this->db->get();
			$mis = $query->row_array();
			return $mis;
			
		}
			public function free_profile_athlete_history_update($id)
		{
			$this->db->select('*');
			$this->db->from('free_profile_atheletic_history');
			$this->db->where('id', $id );	
			$query = $this->db->get();
			$mis = $query->row_array();
			return $mis;
			
		}
		public function athlete_history_update_done()
		{
			$id = $_POST['up_id'];
			$data = array(
						'descriptions' => $this->input->post('descriptions'),
						'year' => $this->input->post('year'),
						'highschool' => $this->input->post('highschool'),
						);
			$this->db->where('id', $id);
            $dooo = $this->db->update('atheletic_history',$data);
			if($dooo)
			{
		    redirect('iscoutyou/athletic_info/');
			}
		}
			public function free_profile_athlete_history_update_done()
		{
			$id = $_POST['up_id'];
			$data = array(
						'descriptions' => $this->input->post('descriptions'),
						'year' => $this->input->post('year'),
						'highschool' => $this->input->post('highschool'),
						);
			$this->db->where('id', $id);
            $dooo = $this->db->update('free_profile_atheletic_history',$data);
			if($dooo)
			{
		    redirect('iscoutyou/free_profile_athletic_info/');
			}
		}
		public function get_athlete_stats()
		{
			$ses_id = $this->session->userdata('user_idd');
			$this->db->select('*');
			$this->db->from('athlete_stats');
			$this->db->where('user_id', $ses_id );
			$query = $this->db->get();
			$mis = $query->row_array();
			if(empty($mis))
			{
				$this->db->select('*');
			$this->db->from('free_profile_athlete_stats_value');
			$this->db->where('user_id', $ses_id );
			$query = $this->db->get();
			$mis = $query->row_array();
			}
			return $mis;		
		}
		public function athletic_game_stats()
		{
			$ses_id = $this->session->userdata('user_idd');
            $data = array('games' => $this->input->post('result'));
			$this->db->where('user_id', $ses_id);
            $dooo = $this->db->update('athlete_stats',$data);
			redirect('iscoutyou/athletic_info/');
		}
		public function athletic_goals_stats()
		{
			$ses_id = $this->session->userdata('user_idd');
            $data = array('goals' => $this->input->post('result'));
			$this->db->where('user_id', $ses_id);
            $dooo = $this->db->update('athlete_stats',$data);
			redirect('iscoutyou/athletic_info/');
		}
		public function athletic_assists_stats()
		{
			$ses_id = $this->session->userdata('user_idd');
            $data = array('assists' => $this->input->post('result'));
			$this->db->where('user_id', $ses_id);
            $dooo = $this->db->update('athlete_stats',$data);
			redirect('iscoutyou/athletic_info/');
		}
		public function athlete_stats_add()
		{
			$ses_id = $this->session->userdata('user_idd');
			$data = array(
			'games' =>$this->input->post('games'),
			'goals' => $this->input->post('goals'),
			'assists' => $this->input->post('assists'),
			'user_id' => $ses_id
			);
			$this->db->insert('athlete_stats', $data);
			$insert_id = $this->db->insert_id();	
		}
		public function generate_form()
		{
			
			$ses_id = $this->session->userdata('user_idd');
			$this->db->select('*');
			$this->db->from('athletes_profile');
			$this->db->where('user_id', $ses_id );
			$query = $this->db->get();
			$row = $query->row_array();			
			$sports_id = $row['games'];
			$position_id = $row['position_id'];
			$this->db->select('*');
			$this->db->from('athlete_game_position_stats');
			$this->db->where("FIND_IN_SET('$position_id',position_id) !=", 0);
			$this->db->where('sports_id', $sports_id );
			$query1 = $this->db->get();
			$row1 = $query1->row_array();			
			return $row1;
		}
		public function free_profile_generate_form()
		{
			
	     	$ses_id = $this->session->userdata('user_idd');
			$this->db->select('*');
			$this->db->from('new_profile');
			$this->db->where('user_id', $ses_id );
			$query = $this->db->get();
			$row = $query->row_array();
	    	$sports_id = $row['games'];
			$position_id = $row['position_id'];
			$this->db->select('*');
			$this->db->from('athlete_game_position_stats');//use old table
			$this->db->where("FIND_IN_SET('$position_id',position_id) !=", 0);
			$this->db->where('sports_id', $sports_id );
			$query1 = $this->db->get();
			$row1 = $query1->row_array();
		//	print_r($row1);die;
			return $row1;
		}
				public function free_profile_generate_form4()
		{
			
	     	$ses_id = $this->session->userdata('user_idd');
			$this->db->select('*');
			$this->db->from('new_profile');
			$this->db->where('user_id', $ses_id );
			$query = $this->db->get();
			$row = $query->row_array();			
	    	$sports_id = $row['games'];
			$position_id = $row['position_id'];
			$this->db->select('*');
			$this->db->from('athlete_game_position_stats');//use old table
			$this->db->where("FIND_IN_SET('$position_id',position_id) !=", 0);
			$this->db->where('sports_id', $sports_id );
			$query1 = $this->db->get();
			$row1 = $query1->row_array();			
			return $row1;
		}
	//	public function free_profile_get_stats11()
	//	{
		   // $regid11=$this->session->userdata('userriddd');
		   //$ses_id = $this->session->userdata('userdata');
		//	$this->db->select('*');
		//	$this->db->from('new_profile');
		//	$this->db->where('user_id', $regid11 );
		//	$query = $this->db->get();
		//	$row = $query->row_array();
		//	return row;
		
	//	}
		public function free_profile_get_stats()
		{
		    $id=$this->session->userdata('user_idd');
		      $regid=$this->session->userdata('userriddd');
			  if($id)
			  {
				  $regid11=$id;
			  }
			  if($regid)
			  {
				   $regid11=$regid;
			  }
	
		   //$ses_id = $this->session->userdata('userdata');
			$this->db->select('*');
			$this->db->from('new_profile');
			$this->db->where('user_id', $regid11 );
			$query = $this->db->get();
			$row = $query->row_array();			
	        $sports_id = $row['games'];
			$position_id = $row['position_id'];
			$this->db->select('*');
			$this->db->from('athlete_game_position_stats');//use old table
			$this->db->where("FIND_IN_SET('$position_id',position_id) !=", 0);
			$this->db->where('sports_id', $sports_id );
			$query1 = $this->db->get();
			$row1 = $query1->row_array();
		//print_r($row1);die;
			return $row1;
		}
		public function getting_overall_for_coach($game_id,$pos_id)
		{
			$this->db->select('*');
			$this->db->from('athlete_game_position_stats');
			$this->db->where("FIND_IN_SET('$pos_id',position_id) !=", 0);
			$this->db->where('sports_id', $game_id );
			$query1 = $this->db->get();
			$row1 = $query1->row_array();
			return $row1;
		}
		public function getting_overall($game_id,$pos_id)
		{
			//$ses_id = $this->session->userdata('user_id');
			$this->db->select('*');
			$this->db->from('athlete_game_position_stats');
			$this->db->where("FIND_IN_SET('$pos_id',position_id) !=", 0);
			$this->db->where('sports_id', $game_id );
			$query1 = $this->db->get();
			$row1 = $query1->row_array();
			return $row1;	
		}
		public function free_user_stats($get_position_name,$game_id)
		{
		    
		    $this->db->select('*');
			$this->db->from('athlete_game_position_stats');
			$this->db->where("FIND_IN_SET('$get_position_name',position_id) !=", 0);
			$this->db->where('sports_id', $game_id );
			$query1 = $this->db->get();
			$row1 = $query1->row_array();
			return $row1;	
		}
		public function getting_stats_value_for_coach($game_id,$pos_id,$id)
		{
			
			$cu_year = gmdate("Y");
			$this->db->select('*');
			$this->db->from('athlete_stats_value');
			$this->db->where('user_id', $id );
			$this->db->where('sports_id', $game_id );
			$this->db->where('position_id', $pos_id );
			$this->db->where('year', $cu_year );
			$query1 = $this->db->get();
			$row1 = $query1->row_array();
			return $row1;			
		}
		public function getting_stats_value($game_id,$pos_id,$user_id)
		{
			//$ses_id = $this->session->userdata('user_id');
			 
			$cu_year = gmdate("Y");
			$this->db->select('*');
			$this->db->from('athlete_stats_value');
			$this->db->where('user_id', $user_id );
			$this->db->where('sports_id', $game_id );
			$this->db->where('position_id', $pos_id );
			$this->db->where('year', $cu_year );
			$query1 = $this->db->get();
			$row1 = $query1->row_array();
			
			if(empty($row1))
			{
			$this->db->select('*');
			$this->db->from('free_profile_athlete_stats_value');
			$this->db->where('user_id', $user_id );
			$this->db->where('sports_id', $game_id );
			$this->db->where('position_id', $pos_id );
			$this->db->where('year', $cu_year );
			$query1 = $this->db->get();
			$row1 = $query1->row_array();
			}
			return $row1;
			
		}
		public function free_user_stat_val_for_admin($get_position_name,$game_id,$get_sports)
		{
			
			
			$this->db->select('*');
			$this->db->from('free_profile_athlete_stats_value');
			$this->db->where('user_id', $get_sports );
			$this->db->where('sports_id', $game_id );
			$this->db->where('position_id', $get_position_name );			
			$query1 = $this->db->get();
			$row1 = $query1->row_array();
			return $row1;
		}
		
		
		public function video_get_for_coach($id)
		{
			$this->db->select('*');
			$this->db->from('athletes_video');
			$this->db->where('user_id', $id );	
			$query = $this->db->get();
			$mis = $query->row_array();
			return $mis;
		}
		
		public function video_get($user_id)
		{
		    //$ses_id = $this->session->userdata('user_idd');
			$this->db->select('*');
			$this->db->from('athletes_video');
			$this->db->where('user_id', $user_id );	
			$query = $this->db->get();
			$mis = $query->row_array();
			return $mis;
			
			
		}
		public function free_video_get()
		{		
		    $ses_id = $this->session->userdata('user_idd');
			$this->db->select('*');
			$this->db->from('free_profile_athletes_video');
			$this->db->where('user_id', $ses_id );	
			$query = $this->db->get();
			$mis = $query->row_array();	
			return $mis;
		}
		
		public function video_get_percentage()
		{
			$user_id = $this->session->userdata('user_idd');
			$this->db->select('*');
			$this->db->from('athletes_video');
			$this->db->where('user_id', $user_id );	
			$query = $this->db->get();
			$mis = $query->row_array();
			return $mis;
		}
		public function video_get_percentage_free()
		{
			$user_id = $this->session->userdata('user_idd');
			$this->db->select('*');
			$this->db->from('free_profile_athletes_video');
			$this->db->where('user_id', $user_id );	
			$query = $this->db->get();
			$mis = $query->row_array();
			return $mis;
		}
		public function video_get_data_for_admin($get_sports)
		{
			$user_id = $this->session->userdata('user_idd');
			$this->db->select('*');
			$this->db->from('free_profile_athletes_video');
			$this->db->where('user_id', $get_sports );	
			$query = $this->db->get();
			$mis = $query->row_array();
			return $mis;
		}
		
		
		public function athlete_history_percentage()
		{
			$user_id = $this->session->userdata('user_idd');
			$this->db->select('*');
			$this->db->from('atheletic_history');
			$this->db->where('user_id', $user_id );	
			$query = $this->db->get();
			$mis = $query->result_array();
			//print_r($mis);die;
			return $mis;
		}
		public function athlete_history_percentage_free()
		{
			$user_id = $this->session->userdata('user_idd');
			$this->db->select('*');
			$this->db->from('free_profile_atheletic_history');
			$this->db->where('user_id', $user_id );	
			$query = $this->db->get();
			$mis = $query->result_array();
			//print_r($mis);die;
			return $mis;
		}
		public function athlete_history_data_for_admin($get_sports)
		{
			
			$this->db->select('*');
			$this->db->from('free_profile_atheletic_history');
			$this->db->where('user_id', $get_sports );	
			$query = $this->db->get();
			$mis = $query->result_array();
			//print_r($mis);die;
			return $mis;
		}
		public function ath_stat_percentage($games_per,$sport_per)
		{
			$user_id = $this->session->userdata('user_idd');
			$year=date("Y");
			$this->db->select('*');
			$this->db->from('athlete_stats_value');
			$this->db->where('user_id', $user_id );	
			$this->db->where('sports_id', $games_per);
			$this->db->where('position_id', $sport_per);
			$this->db->where('year', $year);
			$query = $this->db->get();
			$mis = $query->result_array();
			if(empty($mis))
			{
				$this->db->select('*');
			$this->db->from('free_profile_athlete_stats_value');
			$this->db->where('user_id', $user_id );	
			$this->db->where('sports_id', $games_per);
			$this->db->where('position_id', $sport_per);
			$this->db->where('year', $year);
			$query = $this->db->get();
			$mis = $query->result_array();
			}
			//print_r($mis);die;
			return $mis;
		}
		public function ath_stat_percentage_free($games_per,$sport_per)
		{
			$user_id = $this->session->userdata('user_idd');
			$year=date("Y");
			$this->db->select('*');
			$this->db->from('free_profile_athlete_stats_value');
			$this->db->where('user_id', $user_id );	
			$this->db->where('sports_id', $games_per);
			$this->db->where('position_id', $sport_per);
			$this->db->where('year', $year);
			$query = $this->db->get();
			$mis = $query->result_array();
			//print_r($mis);die;
			return $mis;
		}
			public function free_profile_video_get()
		{
			$ses_id = $this->session->userdata('userdata');
			$this->db->select('*');
			$this->db->from('free_profile_athletes_video');
			$this->db->where('user_id', $ses_id );	
			$query = $this->db->get();
			$mis = $query->row_array();
			return $mis;
		}
			public function free_profile_video_get4()
		{
			$ses_id = $this->session->userdata('user_idd');
			$this->db->select('*');
			$this->db->from('free_profile_athletes_video');
			$this->db->where('user_id', $ses_id );	
			$query = $this->db->get();
			$mis = $query->row_array();
			return $mis;
		}
		public function video_update()
		{
			 if($_POST['video1']=="" && $_POST['video2']=="")
			{
				$ses_id = $this->session->userdata('user_idd');
				$data = array('video1'=>$this->input->post('video1'),
				'video2'=>$this->input->post('video2'));
				$this->db->where('user_id', $ses_id);
				$dooo = $this->db->update('athletes_video',$data);
				if($dooo)
				{
				redirect('iscoutyou/athletic_info/');
				}
				//redirect('iscoutyou/athletic_info/');
			} 
			else
			{
			$ses_id = $this->session->userdata('user_idd');
			$this->db->select('*');
			$this->db->from('athletes_video');
			$this->db->where('user_id', $ses_id );	
			$query = $this->db->get();
			$mis = $query->row_array();
			//print_r($mis);die;
			if($mis)
			{
			    $data = array('video1'=>$this->input->post('video1'),
				'video2'=>$this->input->post('video2'));
				$this->db->where('user_id', $ses_id);
				$dooo = $this->db->update('athletes_video',$data);
				if($dooo)
				{
				redirect('iscoutyou/athletic_info/');
				}	
			}
			
			else{
				$data = array('video1'=>$this->input->post('video1'),
				'video2'=>$this->input->post('video2'),
				'user_id'=>$ses_id);
				$this->db->insert('athletes_video', $data);
			    $insert_id = $this->db->insert_id();
				if($insert_id)
				{
					redirect('iscoutyou/view_profile/');
				}
			}
			
			}
		}
			public function free_profile_video_update()
		{
			 if($_POST['video1']=="" && $_POST['video2']=="")
			{
				redirect('iscoutyou/free_profile_athletic_info/');
			} 
			else
			{
			$ses_id = $this->session->userdata('userdata');
			$this->db->select('*');
			$this->db->from('free_profile_athletes_video');
			$this->db->where('user_id', $ses_id );	
			$query = $this->db->get();
			$mis = $query->row_array();
			if($mis)
			{
			    $data = array('video1'=>$this->input->post('video1'),
				'video2'=>$this->input->post('video2'));
				$this->db->where('user_id', $ses_id);
				$dooo = $this->db->update('free_profile_athletes_video',$data);
				if($dooo)
				{
				redirect('iscoutyou/free_profile_athletic_info/');
				}	
			}
			else{
				$data = array('video1'=>$this->input->post('video1'),
				'video2'=>$this->input->post('video2'),
				'user_id'=>$ses_id);
				$this->db->insert('free_profile_athletes_video', $data);
			    $insert_id = $this->db->insert_id();
				if($insert_id)
				{
					redirect('iscoutyou/free_profile_athletic_info/');
				}
			}
			
			}
		}
				public function free_profile_video_update4()
		{
			 if($_POST['video1']=="" && $_POST['video2']=="")
			{
				redirect('iscoutyou/free_profile_athletic_info/');
			} 
			else
			{
			$ses_id = $this->session->userdata('user_idd');
			$this->db->select('*');
			$this->db->from('free_profile_athletes_video');
			$this->db->where('user_id', $ses_id );	
			$query = $this->db->get();
			$mis = $query->row_array();
			if($mis)
			{
			    $data = array('video1'=>$this->input->post('video1'),
				'video2'=>$this->input->post('video2'));
				$this->db->where('user_id', $ses_id);
				$dooo = $this->db->update('free_profile_athletes_video',$data);
				if($dooo)
				{
				redirect('iscoutyou/free_profile_athletic_info/');
				}	
			}
			else{
				$data = array('video1'=>$this->input->post('video1'),
				'video2'=>$this->input->post('video2'),
				'user_id'=>$ses_id);
				$this->db->insert('free_profile_athletes_video', $data);
			    $insert_id = $this->db->insert_id();
				if($insert_id)
				{
					redirect('iscoutyou/free_profile_athletic_info/');
				}
			}
			
			}
		}
		public function generate_form_submit()
		{
			
			$cu_year = gmdate("Y");
			$arr = $this->input->post('array');
			$new_arr = explode(",",$arr);
			$pos = $this->input->post('position');
			$new = $this->input->post('origi');
			
			$new_arr[$pos] = $new;
			$new_string = implode(",",$new_arr);
			$ses_id = $this->session->userdata('user_idd');
            $data = array('stats' => $new_string);
			$this->db->where('user_id', $ses_id);
			$this->db->where('year', $cu_year);
            $dooo = $this->db->update('athlete_stats_value',$data);
		
			
		}
			public function free_profile_generate_form_submit()
		{
			$cu_year = gmdate("Y");
			$arr = $this->input->post('array');
			$new_arr = explode(",",$arr);
			$pos = $this->input->post('position');
			$new = $this->input->post('origi');
			
			$new_arr[$pos] = $new;
			$new_string = implode(",",$new_arr);
			$ses_id = $this->session->userdata('user_idd');
            $data = array('stats' => $new_string);
			$this->db->where('user_id', $ses_id);
			$this->db->where('year', $cu_year);
            $dooo = $this->db->update('free_profile_athlete_stats_value',$data);
			return $dooo;
			
			
			
		/* $user_id = $this->session->userdata('user_idd');
		$regid=$this->session->userdata('userriddd');
		
			
			$arr = $this->input->post('array');
			print_r($arr);die;			
			$new_arr = explode(",",$arr);			
			$new_string = implode(",",$new_arr);			
            $data = array('stats' => $new_string);						
			$this->db->where('user_id', $user_id);			
            $dooo = $this->db->update('free_profile_athlete_stats_value',$data);//use old table */
		    
			
		}
		public function free_profile_fetch_psition()
		{
		    $html='';
		    $arr = $this->input->post('array');
		    $this->db->select('*');
			$this->db->from('athlete_position');
			$this->db->where('sports_id', $arr );	
			$query = $this->db->get();
			$mis = $query->result_array();
			$fg=count($mis);
			for($i=0;$i<$fg;$i++)
			{
			  $html.='<option value="'.$mis[$i]['id'].'">'.$mis[$i]['positions'].'</option>';   
			}
		//	print_r($html);die;
			return $html;
		    	
		}
		public function generate_form_stats_value()
		{
			$ses_id = $this->session->userdata('user_idd');
			$cu_year = gmdate("Y");
			$this->db->select('*');
			$this->db->from('athlete_stats_value');
			$this->db->where('user_id', $ses_id );
			$this->db->where('year',$cu_year);
			$query1 = $this->db->get();
			$row1 = $query1->row_array();
			if($row1!="")
			{
			return $row1;
			}
			else{
			$this->db->select('*');
			$this->db->from('athlete_stats_value');
			$this->db->where('user_id', $ses_id );
			$query12 = $this->db->get();
			$row12 = $query12->row_array();	
			$stst = $row12['stats'];
			$userid = $row12['user_id'];
			$sports_id = $row12['sports_id'];
			$posit_id = $row12['position_id'];
			$statsget = explode(",",$stst);
			for($i=0;$i<count($statsget);$i++)
			{
				$new_stats[$i]= '0';
			}
			$new_stats_value=implode(",",$new_stats);
			$new_stats_value;
			$data = array(
			'user_id' =>$userid,
			'sports_id' => $sports_id,
			'position_id' => $posit_id,
			'stats' => $new_stats_value,
			'year'=>$cu_year 
			);
			$this->db->insert('athlete_stats_value', $data);
			$insert_id = $this->db->insert_id();
		    $this->db->select('*');
			$this->db->from('athlete_stats_value');
			$this->db->where('user_id', $ses_id );
			$this->db->where('year',$cu_year);
			$query123 = $this->db->get();
			$row123 = $query123->row_array();
			return $row123;
			}
		}
		
		public function free_profile_generate_form_stats_value()
		{
		    $ses_id = $this->session->userdata('user_idd');
		    $cu_year = gmdate("Y");
			$this->db->select('*');
			$this->db->from('free_profile_athlete_stats_value');//use old table
			$this->db->where('user_id', $ses_id );
			$this->db->where('year',$cu_year);
			$query1 = $this->db->get();
			$row1 = $query1->row_array();
			//print_r($row1);die;
			if($row1!="")
			{
			return $row1;
			}
			else{
			$this->db->select('*');
			$this->db->from('free_profile_athlete_stats_value');
			$this->db->where('user_id', $ses_id );
			$query12 = $this->db->get();
			$row12 = $query12->row_array();	
			$stst = $row12['stats'];
			$userid = $row12['user_id'];
			$sports_id = $row12['sports_id'];
			$posit_id = $row12['position_id'];
			$statsget = explode(",",$stst);
			for($i=0;$i<count($statsget);$i++)
			{
				$new_stats[$i]= '0';
			}
			$new_stats_value=implode(",",$new_stats);
			$data = array(
			'user_id' =>$userid,
			'sports_id' => $sports_id,
			'position_id' => $posit_id,
			'stats' => $new_stats_value,
			'year'=>$cu_year 
			);
			$this->db->insert('free_profile_athlete_stats_value', $data);
			$insert_id = $this->db->insert_id();
		    $this->db->select('*');
			$this->db->from('free_profile_athlete_stats_value');
			$this->db->where('user_id', $ses_id );
			$this->db->where('year',$cu_year);
			$query123 = $this->db->get();
			$row123 = $query123->row_array();
			return $row123;
			}
		}
			public function free_profile_generate_form_stats_value4()
		{
			$ses_id = $this->session->userdata('user_idd');
			$cu_year = gmdate("Y");			
			$this->db->select('*');
			$this->db->from('free_profile_athlete_stats_value');//use old table
			$this->db->order_by("id", "desc");
			$this->db->where('user_id', $ses_id );			
			$query1 = $this->db->get();
			$row1 = $query1->row_array();				
			return $row1;
				
			
		}
			public function free_profile_athlete_info1()
		{
            $ses_id = $this->session->userdata('userdata');
			$this->db->select('*');
			$this->db->from('new_profile');
			$this->db->where('user_id', $ses_id );
			$query = $this->db->get();
			$athlete_info = $query->row_array();
			//print_r($athlete_info);die;
			return $athlete_info;
		  
		}
		public function get_free_sports_id($get_sports)
		{
            $ses_id = $this->session->userdata('userdata');
			$this->db->select('games');
			$this->db->from('new_profile');
			$this->db->where('user_id', $get_sports );
			$query = $this->db->get();
			$athlete_info = $query->row_array();
			//print_r($athlete_info);die;
			return $athlete_info;
		  
		}
			public function free_profile_video_get1()
		{
			$ses_id = $this->session->userdata('userdata');
			$this->db->select('*');
			$this->db->from('free_profile_athletes_video');
			$this->db->where('user_id', $ses_id );	
			$query = $this->db->get();
			$mis = $query->row_array();
		//print_r($mis);die;
			return $mis;
		}
			public function free_profile_get_athlete_history1()
		{   
		    $ses_id = $this->session->userdata('userdata');			
			$this->db->from('free_profile_atheletic_history');	
			$this->db->where('user_id',$ses_id);
			$query = $this->db->get();
			$his = $query->row_array();
			//print_r($his);die;
			return $his;
		}
		public function  free_profile_athletes_academic_info()
		{   
		    $ses_id = $this->session->userdata('userdata');			
			$this->db->from('free_profile_athletes_academic_info');	
			$this->db->where('user_id',$ses_id);
			$query = $this->db->get();
			$his = $query->row_array();
			//print_r($his);die;
			return $his;
		}
		public function  free_profile_athletes_academic_infos($get_sports)
		{   
		    
			$this->db->select('school');			
			$this->db->from('free_profile_athletes_academic_info');	
			$this->db->where('user_id',$get_sports);
			$query = $this->db->get();
			$his = $query->row_array();
			//print_r($his);die;
			return $his;
		}
		
			public function free_profile_club_season_history1($user_id)
		{
			$this->db->select('*');
			$this->db->from('free_profile_club_season_history');
			$this->db->where('user_id', $user_id );
			$this->db->order_by("competition_year","desc");
			$this->db->limit(3);
			$query = $this->db->get();
			$club_history = $query->result_array();		
			return $club_history;
		}
			public function free_profile_coach_information1($user_id)
		{
			$this->db->select('*');
			$this->db->from('free_profile_coach_information');
			$this->db->where('user_id', $user_id );
			$this->db->order_by("id","desc");
			$this->db->limit(3);
			$query = $this->db->get();
			$club_history = $query->result_array();		
			return $club_history;
			
		}
		public function free_profile_Academic_info_model_school1()
		{
		$ses_id = $this->session->userdata('userdata');
		$this->db->order_by("year-acad_graduation","desc");
	    $this->db->limit(3);
		$this->db->select('*');
        $this->db->from('free_profile_athletes_academic_info');
        $this->db->where('user_id', $ses_id );
        $query = $this->db->get();
        $athlete = $query->result_array();
		return $athlete;
		}
		public function free_profile_Academic_info_model_honorget1($user_id)
		{
		$this->db->order_by("year","desc");
	    $this->db->limit(5);
		$this->db->select('*');
        $this->db->from('free_profile_athlete_honor_roll');
        $this->db->where('user_id',$user_id);
        $query2 = $this->db->get();
        $honor = $query2->result_array();
		return $honor;	
		}
		public function free_profile_Academic_info_model_award1()
		{
		$ses_id = $this->session->userdata('userdata');
		$this->db->select('*');
		$this->db->order_by("year","desc");
	    $this->db->limit(3);
        $this->db->from('free_profile_athletes_awards');
        $this->db->where('user_id', $ses_id );
        $query1 = $this->db->get();
        $awards = $query1->result_array();
		return $awards;
		}
				public function free_profile_Academic_info_model_achivement1()
		{
		$ses_id = $this->session->userdata('userdata');
		$this->db->order_by("year","desc");
	    $this->db->limit(3);
		$this->db->select('*');
        $this->db->from('free_profile_athletes_achivement');
        $this->db->where('user_id', $ses_id );
        $query2 = $this->db->get();
        $archivement = $query2->result_array();
		return $archivement;
		}
		public function free_profile_getting_overall1($game_id,$pos_id)
		{
			

		  $id3=$this->session->userdata('user_idd');
	   if($id3)
	   { 
	      // echo $game_id;
	       //echo "<br>";
	       //echo $pos_id;die;
	        $this->session->set_userdata('userdata',$id3);
	     	$ses_id = $this->session->userdata('userdata');
	     	$this->db->select('*');
			$this->db->from('athlete_game_position_stats');
			$this->db->where("FIND_IN_SET('$pos_id',position_id) !=", 0);
			$this->db->where('sports_id', $game_id );
			$query1 = $this->db->get();
			$row1 = $query1->row_array();
			return $row1;
	        
	   }
		    else
		    {
			$ses_id = $this->session->userdata('userdata');
			$this->db->select('*');
			$this->db->from('athlete_game_position_stats');
			$this->db->where("FIND_IN_SET('$pos_id',position_id) !=", 0);
			$this->db->where('sports_id', $game_id );
			$query1 = $this->db->get();
			$row1 = $query1->row_array();
			//print_r($row1);die;
			return $row1;
		    }
		}	
		
		public function free_profile_getting_stats_value1()
		{
		    $user_id=$this->session->userdata('user_idd');			
			$this->db->select('*');			
			$this->db->from('free_profile_athlete_stats_value');
	     	$this->db->where('user_id', $user_id );			
			$query1 = $this->db->get();
			$row1 = $query1->row_array();			
			return $row1;
			
		}
		public function fetch_game_id()
		{
			$id=$this->session->userdata('user_idd');
	        $regid=$this->session->userdata('userriddd');
			if($id)
			{
				$ses=$id;
			}
			if($regid)
			{
				$ses=$regid;
			}
		   // echo $regidd=$this->session->userdata('userriddd');die;
			$this->db->select('*');
			$this->db->from('free_profile_register');
			$this->db->where('id', $id );
			$query1 = $this->db->get();
			$row1 = $query1->row_array();
		//	print_r($row1);die;
			return $row1;
		    
		}
		public function free_profile_fetch_psition1($sportidd)
		{
			$this->db->from('athlete_position');
			$this->db->where('sports_id',$sportidd );
			$query1 = $this->db->get();
			$row1 = $query1->result_array();
			//print_r($row1);die;
			return $row1;
		}
		public function free_profile_position_selected()
		{
			$id=$this->session->userdata('user_idd');
			$this->db->select('*');
			$this->db->from('new_profile');
			$this->db->where('user_id',$id );			
			$query = $this->db->get();
			$position_id = $query->row_array();			
			$selected_position_id = $position_id['position_id'];
			
			$id=$this->session->userdata('user_idd');
			$this->db->select('*');
			$this->db->from('athlete_position');						
			$this->db->where('id',$selected_position_id );			
			$query = $this->db->get();
			$position = $query->row_array();			
			$get_position = $position['positions'];
			return $get_position;
		}			
		public function insert_user_id()
		{
		  	$this->db->select('*');
			$this->db->from('free_profile_register');
			$this->db->order_by("id","desc");
			$this->db->limit(1);
			$query = $this->db->get();
			$club_history = $query->row_array();
			//print_r($club_history);die;
			return $club_history;
		}
		public function get_position($sportidd)
		{
		    $regid11=$this->session->userdata('userriddd');
		   	$this->db->from('new_profile');
			$this->db->where('sports_id',$sportidd );
			$this->db->where('user_id', $regid11 );
			$query1 = $this->db->get();
			$row1 = $query1->row_array();
		//	print_r($row1);die;
			return $row1;
		}
		public function  allemail_free_profile()
	    {
			$this->db->select('*');
			$this->db->from('free_profile_register');
			$query = $this->db->get();
			$club_history = $query->result_array();		
			//print_r($club_history);die;
			return $club_history;   
		}
			public function getid_free_profile($to_email)
		{
		    $this->db->select('*');
			$this->db->from('free_profile_register');
			$this->db->where('email', $to_email );
			$query = $this->db->get();
			$club_history = $query->result_array();
            //print_r($club_history);die;	
			return $club_history;   
		}
		
		
			public function updateddpassword_free_profile()
		{
		$email1 =$_GET['id'];
		$email=base64_decode($email1);
		$newpassword =$_POST['newpassword'];
		$confirmpassword =$_POST['confirmpassword'];
			if($newpassword==$confirmpassword)
		{
		    	$data = array(
				'password' => md5($newpassword)
				
				);
				 $this->db->where('id', $email);
		        $this->db->update('free_profile_register',$data);
		}
		
		
		
		}
		public function search_result_get_users()
		{
			$arr = $this->input->post('arrayu');
			$tablename = $this->input->post('tablename');
			$rt=$arr[0];
			$this->db->select('*');
			$this->db->from($tablename);
			if($arr!='')
			{
				$this->db->where("username LIKE '%$arr%'");
				$this->db->or_where("email LIKE '%$arr%'");
					//$this->db->where('email', $to_email );
			}
			$query = $this->db->get();
			$club_history = $query->result_array();		
			
			return $club_history;   
			
		}
		public function search_result_get_athelete()
		{
			$arr = $this->input->post('arrayu');
			$rt=$arr[0];
			$this->db->select('users.*,sports_sport.sport_name');
			$this->db->from('users');
			$this->db->join('sports_sport','users.games = sports_sport.id ');
			if($arr!='')
			{
				$this->db->where("users.username LIKE '%$arr%'");
			}
			$new_arr= $query=$this->db->get()->result_array();
		
			return $new_arr;
		    
			
		}
		public function search_result_get()
		{
			$arr = $this->input->post('arrayu');
		
			//$rt=$arr[0];
			
			$this->db->select('*');
			$this->db->from('university');
			if($arr!='')
			{
				$this->db->where('UNIVERSITY',$arr);
					//$this->db->where('email', $to_email );
					$query = $this->db->get();
					$club_history = $query->result_array();	
			}
				
			
			return $club_history;   
			
		}
		public function live_search_result_get()
		{
			 $arr = $this->input->post('arrayu');
		
			//$rt=$arr[0];
			
			$this->db->select('*');
			$this->db->from('university');
			if($arr!='')
			{
				$this->db->where('UNIVERSITY',$arr);
					//$this->db->where('email', $to_email );
					$query = $this->db->get();
					$club_history = $query->result_array();	
			}
				
			
			return $club_history;   
			
		}
	/* 	public function update_basic_percentage()
		{
		$email1 =$_GET['id'];
		$email=base64_decode($email1);
		$newpassword =$_POST['newpassword'];
		$confirmpassword =$_POST['confirmpassword'];
			if($newpassword==$confirmpassword)
		{
		    	$data = array(
				'password' => md5($newpassword),
				'confirmpassword' => md5($confirmpassword)
				);
				 $this->db->where('id', $email);
		    $this->db->update('coach',$data);
		} */
			
		
		public function update_basic_percentage($percentage)
		{
		    $ses_id = $this->session->userdata('user_idd');
			$data = array(
						'percentage1' => $percentage
						);
			$this->db->where('user_id', $ses_id);
            $dooo = $this->db->update('athletes_profile',$data);
        }
		public function update_basic_percentage_free($percentage,$number)
		{
		    $ses_id = $this->session->userdata('user_idd');
			$data = array(
						$number => $percentage
						);
			$this->db->where('user_id', $ses_id);
            $dooo = $this->db->update('new_profile',$data);
        }
		public function update_basic_percentage11($percentage)
		{
		    $ses_id = $this->session->userdata('user_idd');
			$data = array(
						'percentage1' => $percentage
						);
			$this->db->where('user_id', $ses_id);
            $dooo = $this->db->update('athletes_profile',$data);
        }
		public function free_profile_get_athlete_percentage()
		{
			$ses_id = $this->session->userdata('user_idd');
			$this->db->select('percentage1');
			$this->db->from('athletes_profile');	
			$this->db->where('user_id', $ses_id);
			$query = $this->db->get();
			$percentage = $query->result_array();
			return $percentage;
        }
		
		public function get_basic_percentage()
		{
			$ses_id = $this->session->userdata('user_idd');
			$this->db->select('*');
			$this->db->from('atheletic_history');	
			$this->db->where('user_id',$id);
			$query = $this->db->get();
			$his = $query->result_array();
			return $his;
		}
		
		public function update_acdemic_percentage($percentage2)
		{
		  
		    $ses_id = $this->session->userdata('user_idd');
			$data = array(
						'percentage2' => $percentage2
						);						
			$this->db->where('user_id', $ses_id);
            $dooo = $this->db->update('athletes_profile',$data);
			
			return $dooo;
        }
		public function update_athlete_percentage($percentage3)
		{
			$ses_id = $this->session->userdata('user_idd');
			$data = array(
						'percentage3' => $percentage3
						);
			$this->db->where('user_id', $ses_id);
            $dooo = $this->db->update('athletes_profile',$data);
		}
			public function video_update_percentage($percentage)
		{
		    $ses_id = $this->session->userdata('user_idd');
			$data = array(
						'percentage3' => $percentage
						);
			$this->db->where('user_id', $ses_id);
            $dooo = $this->db->update('athletes_profile',$data);
			return $dooo;	
        }
		public function getting_all_percentage()
		{
			$ses_id = $this->session->userdata('user_idd');
			$this->db->select('percentage1,percentage2,percentage3');
			$this->db->from('athletes_profile');
			$this->db->where('user_id', $ses_id);
			$query = $this->db->get();
			$get_percentage = $query->result_array();
            //print_r($club_history);die;	
			return $get_percentage;   
		}
			public function get_free_profile_games_sports()
		{
		    $id=$this->session->userdata('user_idd');
		      $regid=$this->session->userdata('userriddd');
			  if($id)
			  {
				  $regid11=$id;
			  }
			  if($regid)
			  {
				   $regid11=$regid;
			  }
			$this->db->select('*');
			$this->db->from('new_profile');
			$this->db->where('user_id',$regid11);
			$query = $this->db->get();
			$get_percentage = $query->result_array();
            //print_r($club_history);die;	
			return $get_percentage;   
		}
		public function get_free_profile_sport_name($sport)
		{
			$this->db->select('*');
			$this->db->from(' sports_sport');
			$this->db->where('id',$sport);
			$query = $this->db->get();
			$send_sport_name = $query->result_array();            	
			return $send_sport_name;   
		}
		public function get_free_profile_position_name($position_id)
		{
			$this->db->select('*');
			$this->db->from('athlete_position');
			$this->db->where('id',$position_id);
			$query = $this->db->get();
			$send_sport_position_name = $query->result_array();            	
			return $send_sport_position_name;   
		}
		public function send_mail()
		{
			$this->db->select('*');
			$this->db->from(' users');
			$this->db->where('status','1');
			$this->db->where('stat_after_mail','0');
			$query = $this->db->get();
			$get_status = $query->result_array();				
			return $get_status;
		}
		public function freeusermail()
		{
			$this->db->select('*');
			$this->db->from('free_profile_register');
			$this->db->where('id >=','275');							
			$query = $this->db->get();
			$get_status = $query->result_array();	
            //print_r($get_status);die;			
			return $get_status;
		}
		public function add_potentional_data()
		{
				$user_id = $this->session->userdata('user_idd');
				$data = array('user_id'=>$user_id,
							  'name'=>$this->input->post('name'),					  
							  'email'=>$this->input->post('email'),
							  'phone'=>$this->input->post('phone'),
							  'sports'=>$this->input->post('sports'),
							  'grad_year'=>$this->input->post('grad_year'),
							  'school'=>$this->input->post('school'),					  
							  'note'=>$this->input->post('note'));
							   
				$inseted = $this->db->insert('user_rec_coordinator_add_details',$data);	
			 if($inseted)
			 {
				  echo "1";
			 }		
			else 
				{
					  echo "0";
				}
		}
		public function get_singe_row_data_potentioal()
		{
			$id = $_POST['get_id'];
			$user_id = $this->session->userdata('user_idd');
			$this->db->select('*');
			$this->db->from('user_rec_coordinator_add_details');
			$this->db->where('id',$id);							
			$this->db->where('user_id',$user_id);							
			$query = $this->db->get();
			$get_status = $query->row_array();            			
			return $get_status;
		}
		public function update_singe_row_data_potentioal()
		{
			$id = $this->input->post('get_id');
			$user_id = $this->session->userdata('user_idd');
			$data = array(		
				'note' => $this->input->post('note'));
				$this->db->where('id', $id);
				$this->db->where('user_id', $user_id);
                $dooo = $this->db->update('user_rec_coordinator_add_details',$data);
				 
		}
		
		public function update_sports_block_images()
		
		{
			$sports_id = $_POST['sports_id'];
		    $this->load->library('upload');
		    $image = array();
		    $ImageCount = count($_FILES['block_image']['name']);
			for($i = 0; $i < $ImageCount; $i++)
			{
				$_FILES['file']['name']       = $_FILES['block_image']['name'][$i];
				$_FILES['file']['type']       = $_FILES['block_image']['type'][$i];
				$_FILES['file']['tmp_name']   = $_FILES['block_image']['tmp_name'][$i];
				$_FILES['file']['error']      = $_FILES['block_image']['error'][$i];
				$_FILES['file']['size']       = $_FILES['block_image']['size'][$i];

				// File upload configuration
				$uploadPath = './images/';
				$config['upload_path'] = $uploadPath;
				$config['allowed_types'] = 'jpg|jpeg|png|gif';

				// Load and initialize upload library
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				// Upload file to server
				if($this->upload->do_upload('file'))
				{
					// Uploaded file data
					$imageData = $this->upload->data();
					$uploadImgData[$i]['block_image'] = $imageData['file_name'];
					$block_one_img = $uploadImgData[0]['block_image'];
					$block_two_img = $uploadImgData[1]['block_image'];
					$block_three_img = $uploadImgData[2]['block_image'];
					$block_four_img = $uploadImgData[3]['block_image'];					
				}			
					
		   }
			
						$data = array('block_one_img' =>$block_one_img,'block_two_img'=>$block_two_img,'block_three_img'=>$block_three_img,'block_four_img'=>$block_four_img);
						$this->db->where('sports_id', $sports_id);				
						$this->db->where('content', 'NCAA DI');				
						$dooo = $this->db->update('sports_information',$data);
						if($dooo)
						{
							echo "1";
						}
						else
						{
							"0";
						}
	   }			
		public function update_block_content_images()
		
		{
			$sports_id = $_POST['sportsid'];
		    $this->load->library('upload');
		    $image = array();
		    $ImageCount = count($_FILES['f_block_c_img']['name']);
			for($i = 0; $i < $ImageCount; $i++)
			{
				$_FILES['file']['name']       = $_FILES['f_block_c_img']['name'][$i];
				$_FILES['file']['type']       = $_FILES['f_block_c_img']['type'][$i];
				$_FILES['file']['tmp_name']   = $_FILES['f_block_c_img']['tmp_name'][$i];
				$_FILES['file']['error']      = $_FILES['f_block_c_img']['error'][$i];
				$_FILES['file']['size']       = $_FILES['f_block_c_img']['size'][$i];

				// File upload configuration
				$uploadPath = './images/';
				$config['upload_path'] = $uploadPath;
				$config['allowed_types'] = 'jpg|jpeg|png|gif';

				// Load and initialize upload library
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				// Upload file to server
				if($this->upload->do_upload('file'))
				{
					// Uploaded file data
					$imageData = $this->upload->data();
					$uploadImgData[$i]['f_block_c_img'] = $imageData['file_name'];
					$block_one_img = $uploadImgData[0]['f_block_c_img'];
					$block_two_img = $uploadImgData[1]['f_block_c_img'];
					$block_three_img = $uploadImgData[2]['f_block_c_img'];
					
										
				}			
					
		   }
			
			$data = array('first_block_cont_img' =>$block_one_img,'sec_block_cont_img'=>$block_two_img,'third_block_cont_img'=>$block_three_img);
						$this->db->where('sports_id', $sports_id);				
						$this->db->where('content', 'NCAA DI');				
						$dooo = $this->db->update('sports_information',$data);
						if($dooo)
						{
							echo "1";
						}
						else
						{
							"0";
						} 
	   }
	   public function update_banner_image_sports()
		
		{
			$sports_id = $_POST['sports_id'];
			if($_FILES['banner_image']['name'])
					{
					
								$config['upload_path'] = './images/';
								$config['allowed_types'] = 'gif|jpg|png|jpeg';
								$config['max_size']	= '2000';
								$this->load->library('upload',$config);
								$this->upload->do_upload('banner_image');
								$data1 = array('upload_data' => $this->upload->data());
								$image = $data1['upload_data']['file_name'];
								
								$data = array('top_banner' =>$_FILES['banner_image']['name']);
								$this->db->where('sports_id', $sports_id);				
								$this->db->where('content', 'NCAA DI');					
								$dooo = $this->db->update('sports_information',$data);
								if($dooo)
								{
									echo "1";
								}
					}
		}
		
		public function update_first_block_img()
		
		{
			$sports_id = $_POST['sports_id'];
			$change_img = $_POST['change_img'];
			if($_FILES['first_block_img']['name'])
					{
					
								$config['upload_path'] = './images/';
								$config['allowed_types'] = 'gif|jpg|png|jpeg';
								$config['max_size']	= '2000';
								$this->load->library('upload',$config);
								$this->upload->do_upload('first_block_img');
								$data1 = array('upload_data' => $this->upload->data());
								$image = $data1['upload_data']['file_name'];
								
								$data = array($change_img =>$_FILES['first_block_img']['name']);
								$this->db->where('sports_id', $sports_id);				
								$this->db->where('content', 'NCAA DI');				
								$dooo = $this->db->update('sports_information',$data);
								if($dooo)
								{
									echo "1";
								}
					}
		}
		
		public function update_content_images()
		
		{
			$column_name = $_POST['column_name'];
			$sports_id = $_POST['sports_id'];
			if($_FILES['first_cont_img']['name'])
					{
					
								$config['upload_path'] = './images/';
								$config['allowed_types'] = 'gif|jpg|png|jpeg';
								$config['max_size']	= '2000';
								$this->load->library('upload',$config);
								$this->upload->do_upload('first_cont_img');
								$data1 = array('upload_data' => $this->upload->data());
								$image = $data1['upload_data']['file_name'];
								
								$data = array($column_name =>$_FILES['first_cont_img']['name']);
								$this->db->where('sports_id', $sports_id);				
								$this->db->where('content', 'NCAA DI');				
								$dooo = $this->db->update('sports_information',$data);
								if($dooo)
								{
									echo "1";
								}
					}
			
		}
		public function update_content_text()
		{
			$column_name = $_POST['update_colum_name'];
			$sports_id = $_POST['sports_id'];					
			$yourData = $_POST['description'];					
							
								
								$data = array($column_name =>$yourData);
								$this->db->where('sports_id', $sports_id);				
								$this->db->where('content', 'NCAA DI');				
								$dooo = $this->db->update('sports_information',$data);
								if($dooo)
								{
								$this->session->set_flashdata('insert','Your record was inserted successfully');
        
		redirect(base_url()."admin/add_sports_info/".$sports_id);
		
								}
		}
		public function update_content_two()
		{
			$column_name = $_POST['block_content_two'];
			$sports_id = $_POST['sports_id'];					
			$yourData = $_POST['description'];					
							
								
								$data = array($column_name =>$yourData);
								$this->db->where('sports_id', $sports_id);				
								$this->db->where('content', 'NCAA DI');				
								$dooo = $this->db->update('sports_information',$data);
								if($dooo)
								{
								$this->session->set_flashdata('insert','Your record was inserted successfully');
        
		redirect(base_url()."admin/add_sports_info/".$sports_id);
		
								}
		}
		public function update_content_text_three()
		{
			$column_name = $_POST['block_content_third'];
			$sports_id = $_POST['sports_id'];					
			$yourData = $_POST['description'];					
							
								
								$data = array($column_name =>$yourData);
								$this->db->where('sports_id', $sports_id);				
								$this->db->where('content', 'NCAA DI');				
								$dooo = $this->db->update('sports_information',$data);
								if($dooo)
								{
								$this->session->set_flashdata('insert','Your record was inserted successfully');
        
		redirect(base_url()."admin/add_sports_info/".$sports_id);
		
								}
		}
		public function calender_default_txt()
		{
			$column_name = $_POST['calender_default_txt'];
			$sports_id = $_POST['sports_id'];					
			$yourData = $_POST['description'];					
							
								
								$data = array($column_name =>$yourData);
								$this->db->where('sports_id', $sports_id);				
								$this->db->where('content', 'NCAA DI');				
								$dooo = $this->db->update('sports_information',$data);
								if($dooo)
								{
								$this->session->set_flashdata('insert','Your record was inserted successfully');
        
		redirect(base_url()."admin/add_sports_info/".$sports_id);
		
								}
		}
		public function contact_period()
		{
			$column_name = $_POST['contact_period'];
			$sports_id = $_POST['sports_id'];					
			$yourData = $_POST['description'];					
							
								
								$data = array($column_name =>$yourData);
								$this->db->where('sports_id', $sports_id);				
								$this->db->where('content', 'NCAA DI');				
								$dooo = $this->db->update('sports_information',$data);
								if($dooo)
								{
								$this->session->set_flashdata('insert','Your record was inserted successfully');
        
		redirect(base_url()."admin/add_sports_info/".$sports_id);
		
								}
		}
		
		public function evauation_peroid()
		{
			$column_name = $_POST['evauation_peroid'];
			$sports_id = $_POST['sports_id'];					
			$yourData = $_POST['description'];					
							
								
								$data = array($column_name =>$yourData);
								$this->db->where('sports_id', $sports_id);				
								$this->db->where('content', 'NCAA DI');				
								$dooo = $this->db->update('sports_information',$data);
								if($dooo)
								{
								$this->session->set_flashdata('insert','Your record was inserted successfully');
        
		redirect(base_url()."admin/add_sports_info/".$sports_id);
		
								}
		}
		public function dead_period()
		{
			$column_name = $_POST['dead_period'];
			$sports_id = $_POST['sports_id'];					
			$yourData = $_POST['description'];					
							
								
								$data = array($column_name =>$yourData);
								$this->db->where('sports_id', $sports_id);				
								$this->db->where('content', 'NCAA DI');				
								$dooo = $this->db->update('sports_information',$data);
								if($dooo)
								{
								$this->session->set_flashdata('insert','Your record was inserted successfully');
        
		redirect(base_url()."admin/add_sports_info/".$sports_id);
		
								}
		}
		public function quit_period()
		{
			$column_name = $_POST['quit_period'];
			$sports_id = $_POST['sports_id'];					
			$yourData = $_POST['description'];					
							
								
								$data = array($column_name =>$yourData);
								$this->db->where('sports_id', $sports_id);				
								$this->db->where('content', 'NCAA DI');				
								$dooo = $this->db->update('sports_information',$data);
								if($dooo)
								{
								$this->session->set_flashdata('insert','Your record was inserted successfully');
        
		redirect(base_url()."admin/add_sports_info/".$sports_id);
		
								}
		}
		
		
}
?>