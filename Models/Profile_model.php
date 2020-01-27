<?php
 
    Class Profile_model extends CI_Model { 
    Public function __construct() 
	{ 
		parent::__construct(); 
		$this->load->database();
		$this->load->helper(array('form', 'url'));
    }	
	public function active_users()
	{   error_reporting(E_ERROR | E_PARSE);
	    $this->db->select('*');
		$this->db->from('crone_job_table');
		$this->db->where('plan','p2');
		$this->db->where('status',1);
		$query1 = $this->db->get();
		$result2 = $query1->result_array();
	/* 	echo "<pre>";
		print_r($result2);
		echo "</pre>";
		die;  */
		for($i=0;$i<count($result2);$i++)
		{
	    $id = $result2[$i]['user_id'];
		$this->db->select('percentage1,percentage2,percentage3');
		$this->db->from('athletes_profile');
		$this->db->where('user_id', $id);
		$query = $this->db->get();
		$get_percentage = $query->result_array();
       // print_r($get_percentage);die;	
	    $per1=$get_percentage[0]['percentage1']+$get_percentage[0]['percentage2']+$get_percentage[0]['percentage3'];
		$per2=$per1;
		if($per2>=90)
		{
		//$count_percentage=$get_percentage[0][]+
		
	    $curr_date = date('Y-m-d');
		
		
        $crone_date = $result2[$i]['register_date'];
   
	    $next_date= date('Y-m-d', strtotime($crone_date. ' + 89 days'));
   
        
		
			if($next_date == $curr_date)
			{
		   // echo $name = $result2[$i]['user_id'];
			
		      $id = $result2[$i]['user_id'];
		      $count = $result2[$i]['count'];
			
			  /* $date = $result2[$i]['date'];
			  $database_date = date('Y-m-d', strtotime('+3 month', strtotime($date)));
			  $today_date = date("Y-m-d"); */
		
			  $this->db->select('*');
    		  $this->db->from('athletes_profile');
	    	  $this->db->where('user_id',$id);
		      $query3 = $this->db->get();
			  $result4 = $query3->row_array();
			  
		$game_id = $result4['games'];		 
		$state = $result4['state'];		 
		$position_id = $result4['position_id'];		 
		$gpa = $result4['gpa'];
		  
		      $this->db->select('*');
			  $this->db->from('athlete_position');
			  $this->db->where('sports_id',$game_id);
			  $this->db->where('id',$position_id);
			  $q = $this->db->get();
	    	  $pos_name = $q->row_array();
              $position_name = $pos_name['positions'];
  
		  
		  
		  
              $this->db->select('*');
			  $this->db->from('sports_sport');
			  $this->db->where('id',$game_id);
			  $query = $this->db->get();
	    	  $game_name = $query->row_array();
              $spo_name = $game_name['sport_name'];	
              $sport_nam = str_replace("'", '', $spo_name);
			  
	      $sports_name = strtoupper($sport_nam);			  
              
			  $this->db->select('university_contact.* , university.UNIVERSITY')
              ->from('university_contact')
              ->join('university', 'university_contact.UNIVERSITY_ID = university.ID');
			  $this->db->where('university.GPA<=', $gpa);
              $this->db->where('university_contact.SPORTS',$sports_name);
			  $this->db->limit(200,$count);
              $result = $this->db->get()->result_array();
			  //$result = array('gurjeet@codenomad.net','nehajoshi@codenomad.net');
			   /* echo "<pre>";
			   echo $id;
			 print_r($result);
       		 echo "</pre>";  */
			 
                foreach($result as $info_all)
			    {
				$message ="<div style='width: 60%;border: 1px solid #000;margin: 24px;padding: 28px;background: #fff;color: #000;font-family: Open Sans,sans-serif; font-size: 18px;'><h3><img src='http://iscoutyou.com/images/logo.png'><br/><br/>Introducingg"." ".$result4['first_name']." ".$result4['middle_name']." ".$result4['last_name']." (".$info_all['SPORTS'].") ".$result4['state']."</h3>"."<h3 style='color:#000;'>Dear Coach"."</h3>"."<p style='font-size: 18px;line-height: 24px;font-weight: 600;'>I'm currently a student student-athlete looking for an opportunity to be part of your team. I'm extremely interested in"."<b style='margin: 0px 4px;'>(".$info_all['UNIVERSITY'].").</b><br/>"." I have looked at your program and would like to obtain more information, I'm also including a link so you can view my academic/athletic  information as well as a brief highlight video. Please click here"."<a href='https://iscoutyou.com/iscoutyou/coach_login' target='_blank' style='color: rgb(17, 85,204);text-decoration:none;'> (login as Coach)</a>"." or click here  to view"."<a href='http://iscoutyou.com/profilee/".$id."' target='_blank' style='color: rgb(17, 85,204);text-decoration:none;'> (My Profile).</a>"."<br/>Thank you for your time and consideration, I look forward to hearing from you."."<br>"."<h5 style='font-size: 21px;margin: 0px 0px;'>Best regards,"."</p>"."<b>".$result4['first_name']." ".$result4['middle_name']." ".$result4['last_name']."</b></h5></div>";			 
		 		   $this->load->library('email'); 
                   $this->email->from('studentathlete@iscoutyou.com','iScoutYou Student Athlete'); 
                   $this->email->to($info_all['EMAIL']);
				   //$this->email->to('rashmi@codenomad.net');
                   $this->email->subject($result4['first_name']." ".$result4['middle_name']." ".$result4['last_name'].", ".$position_name." ".$state); 
				   $this->email->message($message);
			       $this->email->set_mailtype("html");
                   $this->email->send();    			   
				} 
			 
			   if(count($result)<=0)
			  { 
			  /* $this->db->set('count','0'); //value that used to update column  
              $this->db->where('user_id', $id); //which row want to upgrade  
              $this->db->update('crone_job_table'); 
			  echo "if"; */
			  }
			  else	
			  {
			  $new_count = count($result)+$count;
			  $data = array('count'=> $new_count,'register_date'=>$next_date); //value that used to update column  
			  $this->db->where('user_id', $id); //which row want to upgrade  
              $this->db->update('crone_job_table',$data);			 
			  }
	     	}
		}
		}
		
	}
	public function getfirstname()
	{
		$this->db->select('firts_name');
		$this->db->from('athletes_profile');
		$this->db->where('user_id', $id);
		$query = $this->db->get();
		$name = $query->row_array();
		if(empty($name))
		{
			$this->db->select('firtsname');
			$this->db->from('new_profile');
			$this->db->where('user_id', $id);
			$query = $this->db->get();
			$name = $query->row_array();
		}
		return $name;
	}
	public function active_users2()
	{
		error_reporting(E_ERROR | E_PARSE);
		$this->db->select('*');
		$this->db->from('crone_job_table');
		$this->db->where('plan','p3');
		$this->db->where('status',1);
		$query1 = $this->db->get();
		$result2 = $query1->result_array();
		
		for($i=0;$i<count($result2);$i++)
		{
			
        $id = $result2[$i]['user_id'];
		$this->db->select('percentage1,percentage2,percentage3');
		$this->db->from('athletes_profile');
		$this->db->where('user_id', $id);
		$query = $this->db->get();
		$get_percentage = $query->result_array();
       // print_r($get_percentage);die;	
	    $per1=$get_percentage[0]['percentage1']+$get_percentage[0]['percentage2']+$get_percentage[0]['percentage3'];
		$per2 = $per1;
		
		
		if($per2>=90)
		{		
		
        echo $curr_date = date('Y-m-d');
		echo "<br>";
	    echo $crone_date = $result2[$i]['register_date'];
		echo "<br>";
        echo $next_date= date('Y-m-d', strtotime($crone_date. ' + 61 days'));
	    echo "<br>";
			if($next_date == $curr_date)
			{
				
			
				$name = $result2[$i]['username'];
				$id = $result2[$i]['user_id'];
				$count = $result2[$i]['count'];
			 /*  $date = $result2[$i]['date'];
			  $database_date = date('Y-m-d', strtotime('+3 month', strtotime($date)));
			  $today_date = date("Y-m-d"); */
		
			  $this->db->select('*');
    		  $this->db->from('athletes_profile');
	    	  $this->db->where('user_id',$id);
		      $query3 = $this->db->get();
			  $result4 = $query3->row_array();
			 
		    $game_id = $result4['games'];	
			$state = $result4['state'];		 
			$position_id = $result4['position_id'];			  
			$gpa = $result4['gpa'];
			
			  $this->db->select('*');
			  $this->db->from('athlete_position');
			  $this->db->where('sports_id',$game_id);
			  $this->db->where('id',$position_id);
			  $q = $this->db->get();
	    	  $pos_name = $q->row_array();			  
              $position_name = $pos_name['positions'];		  
              $this->db->select('*');
			  $this->db->from('sports_sport');
			  $this->db->where('id',$game_id);
			  $query = $this->db->get();
	    	  $game_name = $query->row_array();
              $spo_name = $game_name['sport_name'];	
              $sport_nam = str_replace("'", '', $spo_name);			  
			  $sports_name = strtoupper($sport_nam);	
			  
              /* START CHECK THE TOTAL NUMBER OF COLLEGE APPEARING BY THE ATHLETE
			     SO WE CAN UPDATE THE DATE WHEN THE LAST EMAIL PASSING THROUGH THE CRON JOB
              */			  
			  $this->db->select('university_contact.* , university.UNIVERSITY')
              ->from('university_contact')
              ->join('university', 'university_contact.UNIVERSITY_ID = university.ID');
			  $this->db->where('university.GPA<=', $gpa);
              $this->db->where('university_contact.SPORTS',$sports_name);
			  //$this->db->limit(100000,$count);
             $when_update_date = $this->db->get()->result_array();
			 //print_r($when_update_date);
			 $total_coa_here = count($when_update_date);
			
			
			 //$total_coa_here = 2;
			 
			  /*
			  END OF THE CHECK TOTAL NUMBER OF COLLEGE APPEARING BY THE ATHLETE
			     SO WE CAN UPDATE THE DATE WHEN THE LAST EMAIL PASSING THROUGH THE CRON JOB
			  */
			  
			  $this->db->select('university_contact.* , university.UNIVERSITY')
              ->from('university_contact')
              ->join('university', 'university_contact.UNIVERSITY_ID = university.ID');
			  $this->db->where('university.GPA<=', $gpa);
              $this->db->where('university_contact.SPORTS',$sports_name);
			  //$this->db->limit(50,$count);
             $result = $this->db->get()->result_array();
		      /* echo "<pre>";
			echo  $current_date = date('d/m/Y == H:i:s');
			print_r($result);
			echo "</pre>";  die;  */
			 
			   foreach($result as $info_all)
			  {
			   $message ="<div style='width: 60%;border: 1px solid #000;margin: 24px;padding: 28px;background: #fff;color: #000;font-family: Open Sans,sans-serif; font-size: 18px;'><h3><img src='https://isportsrecruiting.com/images/black-logo.png' alt='isr_logo' height='63' width='88'><br/><br/>Introducingg"." ".$result4['first_name']." ".$result4['middle_name']." ".$result4['last_name']." (".$info_all['SPORTS'].") ".$result4['state']."</h3>"."<h3 style='color:#000;'>Dear Coach"."</h3>"."<p style='font-size: 18px;line-height: 24px;font-weight: 600;'>I'm currently a student student-athlete looking for an opportunity to be part of your team. I'm extremely interested in"."<b style='margin: 0px 4px;'>(".$info_all['UNIVERSITY'].").</b><br/>"." I have looked at your program and would like to obtain more information, I'm also including a link so you can view my academic/athletic  information as well as a brief highlight video. Please click here"."<a href='https://isportsrecruiting.com/iscoutyou/coach_login' target='_blank' style='color: rgb(17, 85,204);text-decoration:none;'> (login as Coach)</a>"." or click here  to view"."<a href='https://isportsrecruiting.com/profilee/".$id."' target='_blank' style='color: rgb(17, 85,204);text-decoration:none;'> (My Profile).</a>"."<br/>Thank you for your time and consideration, I look forward to hearing from you."."<br>"."<h5 style='font-size: 21px;margin: 0px 0px;'>Best regards,"."</p>"."<b>".$result4['first_name']." ".$result4['middle_name']." ".$result4['last_name']."</b></h5></div>";		
                   
				   $this->load->library('email'); 
                   $this->email->from('studentathlete@isportsrecruiting.com','iSportsRecruiting Student Athlete'); 
                   $this->email->to($info_all['EMAIL']);
                   //$this->email->to('sandeep@codenomad.net','ajay@codenomad.net','amit@codenomad.net');
                   $this->email->subject($result4['first_name']." ".$result4['middle_name']." ".$result4['last_name'].", ".$position_name." ".$state); 
				   $this->email->message($message);
			       $this->email->set_mailtype("html");
				   sleep(5);
                     $yes = $this->email->send();
				    
				   	
			   
			   }
			
			   if(count($result)<=0)
			  { 
			/*$this->db->set('count','0'); //value that used to update column  
              $this->db->where('user_id', $id); //which row want to upgrade  
              $this->db->update('crone_job_table'); */
			  }
			  else	
			  {
				  //check if all email send once then start from the initialize
				  /* $check_email_count = count($result)*/
				  $new_count = count($result)+$count;
				  if($new_count == $total_coa_here)
				  {
					  $next_cron_date= date('Y-m-d', strtotime('+ 61 days'));
					  $data = array('count'=> $new_count,'register_date'=>$next_cron_date); //value that used to update column  
					  $this->db->where('user_id', $id); //which row want to upgrade  
					  $this->db->update('crone_job_table',$data);
					  //$coach_email = $result[$i]['EMAIL'];  			 					  
				  }
				  else
				  { 
			          $next_cron_date= date('Y-m-d', strtotime('+ 61 days'));
					  $data = array('count'=> $new_count,'register_date'=>$next_cron_date); //value that used to update column  
					  $this->db->where('user_id', $id); //which row want to upgrade  
					  $this->db->update('crone_job_table',$data);
					  //$coach_email = $result[$i]['EMAIL'];  			   
				  }
			  } 
			} 
		}	}
	}
   public function find_colleges_count($tablename)
    	{
			
    	$id = $this->session->userdata('user_idd');
		$user_id = $this->uri->segment('2');    	
    	$this->db->select('*');
        $this->db->from($tablename);
        $this->db->where('user_id', $user_id );
        $universi = $this->db->get(); 
    	$athlete_info = $universi->row_array();
		$game_id=$athlete_info['games'];
        $gpa=$athlete_info['gpa'];
        $sat=$athlete_info['sat'];
        
            $this->db->select('*');
			$this->db->from('sports_sport');
			$this->db->where('id',$game_id);
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
			$this->db->select('*');
			$this->db->from('university');						
			$this->db->where_in('ID',$arr);
			//$this->db->where('SAT<=',(int)$sat);			
			$this->db->where('GPA <=', $gpa);
			$query1 = $this->db->get();
			$result2 = $query1->result_array();
			//print_r($result2);die;
            return $result2;
			}
    	}
	public function send_camp_data()
    {
		
		$data  = array('user_name'=>$this->input->post('username'),
			          'email'=>$this->input->post('email'),
			          'phone_no'=>$this->input->post('phone_no'),
			          'message'=>$this->input->post('message'),			        
					   );
		$saved = $this->db->insert('camp_contact_data',$data);
		if ($saved)
		{
			
			$message ="<div style='width: 60%;border: 1px solid #000;margin: 24px;padding: 28px;background: #fff;color: #000;font-family: Open Sans,sans-serif; font-size: 18px;'><h3><img src='https://isportsrecruiting.com/images/black-logo.png' alt='isr_logo' height='63' width='88'><br/><br/>New Enquiry  is submitted by "."".$this->input->post('username')."<br>"."Here is the Details of the User Below"."<br>"."Name :".$this->input->post('username')."<br>"."Email:".$this->input->post('email')."<br>"."Phone No: ".$this->input->post('phone_no')."<br>"." Message:".$this->input->post('message')."</h3>".""."<p style='font-size: 18px;line-height: 24px;font-weight: 600;'>".""."</p>"."</div>";		
                   
				   $this->load->library('email'); 
                   $this->email->from('Contact@isportsrecruiting.com');
				   $this->email->to('Contact@isportsrecruiting.com');
				   //$this->email->to('sandeep@codenomad.net');
                   $this->email->subject("New Camp Enquiry By ".$this->input->post('username')); 
				   $this->email->message($message);
			       $this->email->set_mailtype("html");				   
                   $yes = $this->email->send();
				   if($yes)
				   {
					   echo "1";
					   $messages ="<div style='width: 60%;border: 1px solid #000;margin: 24px;padding: 28px;background: #fff;color: #000;font-family: Open Sans,sans-serif; font-size: 18px;'><h3><img src='https://isportsrecruiting.com/images/black-logo.png' alt='isr_logo' height='63' width='88'><br/><br/>Thank you for your request, "."".$this->input->post('username')."</h3><br>"."<h5>"."iSportsRecruiting Team will contact you with in the next 24 hours."."<br/><br/>Best regards!"."<br>"."</h5>".""."</div>";		
                   
				   $this->load->library('email'); 
                   $this->email->from('Contact@isportsrecruiting.com');
				   $this->email->to($this->input->post('email'));
                   $this->email->subject("International AZ Soccer Camp "); 
				   $this->email->message($messages);
			       $this->email->set_mailtype("html");				   
                   $yes = $this->email->send();
					   
				   }
		}
		else
		{
			echo "0";
		}
	}
	public function send_blastmail_byselect()
    {
		$get_division  = $_POST['division'];
		
		$id = $this->session->userdata('user_idd');
		
		
		// get registration date days count
		$this->db->select('register_date');
        $this->db->from('users');
        $this->db->where('user_id', $id );
        $get_registerdate = $this->db->get(); 
    	$checkusre = $get_registerdate->row_array();
		$olddata = $checkusre['register_date'];
		
		$this->db->select('*');
        $this->db->from('athletes_profile');
        $this->db->where('user_id', $id );
        $getpercentg = $this->db->get(); 
    	$getpercent = $getpercentg->row_array();
		 $perc1 = $getpercent['percentage1'];
		 $perc2 = $getpercent['percentage2'];
		 $perc3 = $getpercent['percentage3'];
		 $perc_total = $perc1+$perc2+$perc3;
		 if($perc_total >= 90)
			 {
    $current_date=date('Y-m-d');
	$date = $olddata; 
	 $startTimeStamp = strtotime($date); 
	 
			
			$curr = strtotime($current_date);		
		   
			
			 $timeDiff1 = abs($curr - $startTimeStamp);
			 $numberDays = $timeDiff1/86400; 
			 $numberDays = intval($numberDays);
			
		 
			if($numberDays >= 60)
			{
				
		$get_division  = $_POST['division'];
		for($i=0;$i<count($get_division);$i++)
		{
			$division[] = $get_division[$i];
		}
		$data_sv = array(
					'ncaadl'=>$division[0]!=''?$division[0]:'',
					'ncaadll'=>$division[1]!=''?$division[1]:'',
					'ncaadlll'=>$division[2]!=''?$division[2]:'',
					'naia'=>$division[3]!=''?$division[3]:'',
					'njcaa'=>$division[4]!=''?$division[4]:'',
					'cccaa'=>$division[5]!=''?$division[5]:'',
					'set_queue_date'=>date('Y-m-d'),
					'user_id'=>$id
					);
					
					
		$in = $this->db->insert('blast_email_set_queue',$data_sv);
		$this->db->select('user_id');
        $this->db->from('blast_email_set_queue');
        $this->db->where('user_id', $id );
        $universi = $this->db->get(); 
    	$athlete_info = $universi->row_array();
		
		 if($athlete_info=="")
		{ 
			
		
		$this->db->select('*');
        $this->db->from('athletes_profile');
        $this->db->where('user_id', $id );
        $universi = $this->db->get(); 
    	$athlete_info = $universi->row_array();				
		$game_id=$athlete_info['games'];
			$gpa = $athlete_info['gpa'];
			
			$this->db->select('*');
			$this->db->from('sports_sport');
			$this->db->where('id',$game_id);
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
			
			/// if found result
			if($result)
			{
			for($i=0;$i<count($result);$i++)
			{
				$arr[]=$result[$i]['UNIVERSITY_ID'];
				
			}
			
			$this->db->select('*');
			$this->db->from('university');
			$this->db->where('gpa<=',$gpa);
			$this->db->where_in('DIVISION',$division);
			$this->db->where_in('ID',$arr);
			$query1 = $this->db->get();
			$result2 = $query1->result_array();
		   
			for($i=0;$i<count($result2);$i++)
			{
				$uni_ids[]= $result2[$i]['ID'];				
				$name[]= $result2[$i]['UNIVERSITY'];				
			}
			
			$this->db->select('EMAIL');
			$this->db->from('university_contact');			
			$this->db->where('SPORTS',$game_na);
			$this->db->where_in('UNIVERSITY_ID',$uni_ids);
			$query2 = $this->db->get();
			$result3 = $query2->result_array();
			  for($k=0;$k<count($result3);$k++)
			  {
				  $all_emails[] = $result3[$k]['EMAIL'];
				  
				  $message ="<div style='width: 60%;border: 1px solid #000;margin: 24px;padding: 28px;background: #fff;color: #000;font-family: Open Sans,sans-serif; font-size: 18px;'><h3><img src='https://isportsrecruiting.com/images/black-logo.png' alt='isr_logo' height='63' width='88'><br/><br/>Introducingg"." ".$athlete_info['first_name']." ".$athlete_info['middle_name']." ".$athlete_info['last_name']." (".$game_na.") ".$athlete_info['state']."</h3>"."<h3 style='color:#000;'>Dear Coach"."</h3>"."<p style='font-size: 18px;line-height: 24px;font-weight: 600;'>I'm currently a student student-athlete looking for an opportunity to be part of your team. I'm extremely interested. I have looked at your program and would like to obtain more information, I'm also including a link so you can view my academic/athletic  information as well as a brief highlight video. Please click here"."<a href='https://isportsrecruiting.com/iscoutyou/coach_login' target='_blank' style='color: rgb(17, 85,204);text-decoration:none;'> (login as Coach)</a>"." or click here  to view"."<a href='https://isportsrecruiting.com/profilee/".$id."' target='_blank' style='color: rgb(17, 85,204);text-decoration:none;'> (My Profile).</a>"."<br/>Thank you for your time and consideration, I look forward to hearing from you."."<br>"."<h5 style='font-size: 21px;margin: 0px 0px;'>Best regards,"."</p>"."<b>".$athlete_info['first_name']." ".$athlete_info['middle_name']." ".$athlete_info['last_name']."</b></h5></div>";		
                  //$to_mail = $all_emails;
                   $to_mail = 'sandeep@codenomad.net';
				   $this->load->library('email'); 
                   $this->email->from('studentathlete@isportsrecruiting.com','iSportsRecruiting Student Athlete');
				   $this->email->to($to_mail);
				  
                   $this->email->subject($athlete_info['first_name']." ".$athlete_info['middle_name']." ".$athlete_info['last_name']." ".$athlete_info['state']); 
				   $this->email->message($message);
			       $this->email->set_mailtype("html");				   
                   $yes = $this->email->send();
				   if($yes)
				   {
					   echo "1";
					   $success = "1";
					   $old_counts = count($success);
					    $this->db->select('*');
						$this->db->from('crone_job_table');
						$this->db->where('user_id',$id);
						$query = $this->db->get();
						$crone = $query->row_array();
						$total_couts = $crone['count'];
						if($total_couts =="0")
						{
							$data_sav = array('count' => $old_counts);
				$this->db->where('user_id', $id);
				$dooo = $this->db->update('crone_job_table',$data_sav);
						}
						else
						{
							$this->db->select('count');
							$this->db->from('crone_job_table');
							$this->db->where('user_id',$id);
							$query = $this->db->get();
							$crone = $query->row_array();
							$findl = $crone['count'];
							if($findl)
							{
								$dataa = array('count' => $old_counts + $total_couts);
				$this->db->where('user_id', $id);
				$dooo = $this->db->update('crone_job_table',$dataa);
							}
						}
						
					   
				   }
				   
				  
			  }		
		  
			 
			
		   }
				
		 }
			}
			else
			{
				$get_division  = $_POST['division'];
		for($i=0;$i<count($get_division);$i++)
		{
			$division[] = $get_division[$i];
		}
				$data_sv = array(
					'ncaadl'=>$division[0]!=''?$division[0]:'',
					'ncaadll'=>$division[1]!=''?$division[1]:'',
					'ncaadlll'=>$division[2]!=''?$division[2]:'',
					'naia'=>$division[3]!=''?$division[3]:'',
					'njcaa'=>$division[4]!=''?$division[4]:'',
					'cccaa'=>$division[5]!=''?$division[5]:'',
					'set_queue_date'=>date('Y-m-d'),
					'user_id'=>$id
					);
					
					
		$in = $this->db->insert('blast_email_set_queue',$data_sv);
			
			$id = $this->session->userdata('user_idd');			
			$send_division = $_POST['division'];
			for($k=0;$k<count($_POST['division']);$k++)
			{
				$counts[] = $_POST['division'][$k];
				
			}
			$save_divison = implode(',',$counts);
	 $date = $olddata; 
	 $startTimeStamp = strtotime($date); 
	 $new_date = strtotime('+ 61 days', $startTimeStamp); 
		 $nextdate= date('Y-m-d', $new_date);
			 $save_queue= array(
					
					'user_id'=>$id,
					'divisions'=>$save_divison,
					'send_date'=>$nextdate					
					);  
					$saved_queued = $this->db->insert('blast_email_less_sixtydays',$save_queue);
					
		
			}
			 }
			 else
			 {
				 echo "NO";
			 }
		
         	
		}
		public function send_mail_tolessthen_sixtydays_withus()
		{
			$date = date('Y-m-d');	
			$this->db->select('*');
			$this->db->from('blast_email_less_sixtydays');
			$this->db->where('send_date',$date);
			$universi = $this->db->get(); 
			$findata = $universi->result_array();
		  
			for($i=0;$i<count($findata);$i++)
			{
				$get_datas = $findata[$i]['user_id'];
				
				$divisions = explode(',',$findata[$i]['divisions']);
					
					
				$this->db->select('*');
				$this->db->from('athletes_profile');
				$this->db->where_in('user_id', $get_datas);
				$universi = $this->db->get(); 
				$athlete_info = $universi->result_array();
			
			
		    for($j=0;$j<count($athlete_info);$j++)
			{
							
				$game_id = $athlete_info[$j]['games'];				
				$gpa = $athlete_info[$j]['gpa'];
				$first_name = $athlete_info[$j]['first_name'];
				$middle_name = $athlete_info[$j]['middle_name'];				
				$last_name = $athlete_info[$j]['last_name'];
				$state = $athlete_info[$j]['state'];
		
			
				
				$this->db->select('*');
				$this->db->from('sports_sport');
				$this->db->where('id',$game_id);
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
				
				  for($k=0;$k<count($result);$k++)
				{
					$arr =$result[$k]['UNIVERSITY_ID'];
					
			
				
					 $this->db->select('*');
					$this->db->from('university');
					$this->db->where('gpa<=',$gpa);
					$this->db->where_in('DIVISION',$divisions);
					$this->db->where_in('ID',$arr);
					$query1 = $this->db->get();
					$result2 = $query1->result_array(); 	
						
						
						for($l=0;$l<count($result2);$l++)
					{
						$uni_ids = $result2[$l]['ID'];	
						
								
		
					
					$this->db->select('EMAIL');
					$this->db->from('university_contact');			
					$this->db->where('SPORTS',$game_name);
					$this->db->where('UNIVERSITY_ID',$uni_ids);
					$query2 = $this->db->get();
					$result3 = $query2->result_array();		
					
					  for($k=0;$k<count($result3);$k++)
					{
						$all_emails = $result3[$k]['EMAIL'];
						
						   $message ="<div style='width: 60%;border: 1px solid #000;margin: 24px;padding: 28px;background: #fff;color: #000;font-family: Open Sans,sans-serif; font-size: 18px;'><h3><img src='https://isportsrecruiting.com/images/black-logo.png' alt='isr_logo' height='63' width='88'><br/><br/>Introducingg"." ".$first_name." ".$middle_name." ".$last_name." (".$game_name.") ".$state ."</h3>"."<h3 style='color:#000;'>Dear Coach"."</h3>"."<p style='font-size: 18px;line-height: 24px;font-weight: 600;'>I'm currently a student student-athlete looking for an opportunity to be part of your team. I'm extremely interested. I have looked at your program and would like to obtain more information, I'm also including a link so you can view my academic/athletic  information as well as a brief highlight video. Please click here"."<a href='https://isportsrecruiting.com/iscoutyou/coach_login' target='_blank' style='color: rgb(17, 85,204);text-decoration:none;'> (login as Coach)</a>"." or click here  to view"."<a href='https://isportsrecruiting.com/profilee/".$get_datas."' target='_blank' style='color: rgb(17, 85,204);text-decoration:none;'> (My Profile).</a>"."<br/>Thank you for your time and consideration, I look forward to hearing from you."."<br>"."<h5 style='font-size: 21px;margin: 0px 0px;'>Best regards,"."</p>"."<b>".$first_name." ".$middle_name." ".$last_name."</b></h5></div>";		
						   $to_mail = $all_emails;
						   $this->load->library('email'); 
						   $this->email->from('studentathlete@isportsrecruiting.com','iSportsRecruiting Student Athlete');
						   $this->email->to($to_mail);
						  
						   $this->email->subject($first_name." ".$middle_name." ".$last_name." ".$state); 
						   $this->email->message($message);
						   $this->email->set_mailtype("html");				   
						   $yes = $this->email->send();
						   if($yes)
						   {
							   $data = array('ncaadl'=> '','ncaadll'=>'','ncaadlll'=>'','naia'=>'','njcaa'=>'','cccaa'=>''); //value that used to update column  
					  $this->db->where('user_id', $get_datas); //which row want to upgrade  
					  $this->db->update('crone_job_table',$data);
						   }
						} 
					}
				}  
			}
		}
		  
		}
		
		public function checkbox_disable_check()
		{
			 
		$id = $this->session->userdata('user_idd');	
		$this->db->select('*');
        $this->db->from('blast_email_set_queue');
        $this->db->where('user_id', $id );
        $universi = $this->db->get(); 
    	return $athlete_info = $universi->result_array();
		
		
		
		}
		public function find_colleges_countii($tablename)
    	{    	   
    	$id = $this->session->userdata('user_idd');	
		$this->db->select('*');
        $this->db->from($tablename);
        $this->db->where('user_id', $id );
        $universi = $this->db->get(); 
    	$athlete_info = $universi->row_array();		
		$game_id=$athlete_info['games'];
        $gpa=$athlete_info['gpa'];
        $sat=$athlete_info['sat'];
        
            $this->db->select('*');
			$this->db->from('sports_sport');
			$this->db->where('id',$game_id);
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
			$this->db->select('*');
			$this->db->from('university');						
			$this->db->where_in('ID',$arr);
			//$this->db->where('SAT<=',(int)$sat);			
			$this->db->where('GPA <=', $gpa);
			$query1 = $this->db->get();
			$result2 = $query1->result_array();						
            return $result2;
			}
    	}
		public function find_colleges_counts($uni_name,$idd)
    	{
			
			$this->db->select('games');
			$this->db->from('users');
			$this->db->where('user_id',$idd);
			$query1 = $this->db->get();
			$game_id = $query1->row_array();			
			$game_idd = $game_id['games'];
			
			if($game_idd)
			{
				$this->db->select('sport_name');
				$this->db->from('sports_sport');
				$this->db->where('id',$game_idd);
				$game = $this->db->get();
				$game_name = $game->row_array();
				$game_names = $game_name['sport_name'];				
				$sport_name = str_replace("'", "", $game_names);
				
				$sport_names =  strtoupper($sport_name);
			}
			
			if($sport_names)
			{
				$this->db->select('UNIVERSITY_ID');
				$this->db->from('university_contact');				
				$this->db->where('SPORTS',$sport_names);				
				$sports_name = $this->db->get();
				$university_id = $sports_name->result_array();
				
				 		
				for($i=0;$i<count($university_id);$i++)
				{
					
					$uni_ids[] = $university_id[$i]['UNIVERSITY_ID'];
					
			       					
				}				
				  
					/* $finalids = implode(',',$uni_ids);
					 echo "<pre>";
					print_r($finalids);die;  */ 	
			}
			 /* echo "<pre>";   
			print_r($uni_ids);  	die;  */   
			if($uni_ids)
			{
			   $this->db->select('*'); 
			   $this->db->from('athletes_profile');   
			   $this->db->where('user_id', $idd);
			   $queryyy =  $this->db->get()->row_array();			   
			   $gpa = $queryyy['gpa'];
			   $sat = $queryyy['sat'];
			   $act = $queryyy['act'];
			   
			   
			}
			if($gpa)
			{
				
			$this->db->select('*');
			$this->db->from('university');
			$this->db->where_in('ID',$uni_ids);
			$this->db->where('STATE', $uni_name );
			//$this->db->where('SAT<=',(int)$sat);			
			$this->db->where('GPA <=', $gpa);
			
			

			//$where = "GPA<='".$gpa."' OR SAT<='".(int)$sat."'";

			//$this->db->where($where);			    	    		    			
		    $this->db->order_by('DIVISION','ASC');
			$query = $this->db->get();
			$result2 = $query->result_array();
			//echo "<pre>";
			//print_r($result2);die;
			return $result2;
			}	 
				 
    	}
		public function find_colleges_counts_free($uni_name,$idd)
    	{
			
			$this->db->select('games');
			$this->db->from('new_profile');
			$this->db->where('user_id',$idd);
			$query1 = $this->db->get();
			$game_id = $query1->row_array();			
			$game_idd = $game_id['games'];
			if($game_id)
			{
				$this->db->select('sport_name');
				$this->db->from('sports_sport');
				$this->db->where('id',$game_idd);
				$game = $this->db->get();
				$game_name = $game->row_array();
				$game_names = $game_name['sport_name'];
				//print_r($game_names);die;
				$sport_name = str_replace("'", "", $game_names);
				
				$sport_names =  strtoupper($sport_name);
			}
			if($sport_names)
			{
				$this->db->select('UNIVERSITY_ID');
				$this->db->from('university_contact');
				//$this->db->like('SPORTS', $sport_name, 'both');
				$this->db->where('SPORTS',$sport_names);
				//$this->db->where("SPORTS LIKE Soccer Mens")->get();
				//$this->db->like('SPORTS', 'Soccer Mens');
				//$this->db->escape_like_str('SPORTS',$game_names)."%' ESCAPE '''";
				$sports_name = $this->db->get();
				$university_id = $sports_name->result_array();
				
				//print_r($university_id)	; die;  		
				for($i=0;$i<count($university_id);$i++)
				{
					
					$uni_ids[] = $university_id[$i]['UNIVERSITY_ID'];
					
			       					
				}				
				  
					/* $finalids = implode(',',$uni_ids);
					 echo "<pre>";
					print_r($finalids);die;  */ 	
			}
			 /* echo "<pre>";   
			print_r($uni_ids);  	die;  */   
			if($uni_ids)
			{
			   $this->db->select('gpa'); 
			   $this->db->from('new_profile');   
			   $this->db->where('user_id', $idd);
			   $queryyy =  $this->db->get()->row_array();
			   $gpa = $queryyy['gpa'];
			   //print_r($gpa);die;
			}
			if($gpa)
			{
				
			$this->db->select('*');
			$this->db->from('university');
			$this->db->where_in('ID',$uni_ids);
			$this->db->where('STATE', $uni_name );
		    $this->db->where('GPA <=', $gpa);			
		    $this->db->order_by('DIVISION','ASC');
			$query = $this->db->get();
			$result2 = $query->result_array();
			
            return $result2;
			}	 
				 
    	}
		public function find_colleges_counts1($ses_id){
			$this->db->select('games');
			$this->db->from('users');
			$this->db->where('user_id',$ses_id);
			$query1 = $this->db->get();
			$game_id = $query1->row_array();
			$game_idd = $game_id['games'];
			return $game_idd;
		}
		public function insert_db($info,$user_id,$uni_id){
			$this->db->select('*');
			$this->db->from('athlete_email_count');
			$this->db->where('user_id',$user_id);
			$this->db->where('university_id',$uni_id);
			$query = $this->db->get();
			$athlete_info = $query->row_array();
			
			
			
			 if($athlete_info['university_id'] && $athlete_info['user_id']){
		        $old_email_count = $athlete_info['email_count'];				
				$data=array('email_count'=>$old_email_count +1);
              /*  $this->db->set('email_count','email_count',false);
              $this->db->where('user_id',$user_id); */
            	$this->db->where('user_id', $user_id);
            	$this->db->where('university_id', $uni_id);
				$dooo = $this->db->update('athlete_email_count',$data);
			 if($dooo){
				 return $dooo;
			 }
			} 
			else{
				 $ins=$this->db->insert('athlete_email_count',$info);
				 return $ins;
			}
		}
		public function fetch_counts($ses,$uni)
		{
			
			
			$this->db->select('*');
			$this->db->from('athlete_email_count');
			$this->db->where('user_id',$ses);
			$this->db->where('university_id',$uni);
			$query = $this->db->get();
			$count = $query->row_array();			
			$email_count = $count['email_count'];			
			return $email_count; 
		}
		public function fetch_mail_show($ses,$uni){
			
			
			$this->db->select('*');
			$this->db->from('athlete_email_count');
			$this->db->where('user_id',$ses);
			$this->db->where('university_id',$uni);
			$query = $this->db->get();
			$show = $query->row_array();			
			$email_counts = $show['email_show'];			
			return $email_counts; 
		}
		
		public function find_colleges_count_freeprof_foradm($get_sports)
    	{
    	       	
    	$this->db->select('*');
        $this->db->from('new_profile');
        $this->db->where('user_id', $get_sports );
        $universi = $this->db->get(); 
    	$athlete_info = $universi->row_array();
        $game_id=$athlete_info['games'];
        $gpa=$athlete_info['gpa'];
                        $this->db->select('*');
			$this->db->from('sports_sport');
			$this->db->where('id',$game_id);
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
			$this->db->select('*');
			$this->db->from('university');
			$this->db->where('gpa<=',$gpa);
			$this->db->where_in('ID',$arr);
			$query1 = $this->db->get();
			$result2 = $query1->result_array();
            return $result2;
			}
    	}
    public function find_colleges($limit, $start,$tablename)
    	{
    	   
		// echo $start;die;
    	//echo $limit;
		//echo $start;die;
    	$id = $this->session->userdata('user_idd');	
    	$this->db->select('*');
        $this->db->from($tablename);
        $this->db->where('user_id', $id );
        $universi = $this->db->get(); 
    	$athlete_info = $universi->row_array();
    //	print_r($athlete_info);die;
        $game_id=$athlete_info['games'];
        $gpa=$athlete_info['gpa'];
            $this->db->select('*');
			$this->db->from('sports_sport');
			$this->db->where('id',$game_id);
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
			$this->db->select('*');
			$this->db->limit($limit, $start);
			$this->db->from('university');
			
			$this->db->where('gpa<=',$gpa);
			$this->db->where_in('ID',$arr);
			$this->db->limit($limit, $start);
			$query1 = $this->db->get();
			$result2 = $query1->result_array();
			//print_r($result2);die;
            return $result2;
			}
    	}
    	   public function find_colleges_countwithoutlogin()
    	{
    	   // $this->db->limit($limit, $start);
    	$id = $this->session->userdata('find');	
    	$this->db->select('*');
        $this->db->from('athletes_profile');
        $this->db->where('user_id', $id );
        $universi = $this->db->get(); 
    	$athlete_info = $universi->row_array();
        $game_id=$athlete_info['games'];
        $gpa=$athlete_info['gpa'];
                        $this->db->select('*');
			$this->db->from('sports_sport');
			$this->db->where('id',$game_id);
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
			$this->db->select('*');
			$this->db->from('university');
			$this->db->where('gpa<=',$gpa);
			$this->db->where_in('ID',$arr);
			$query1 = $this->db->get();
			$result2 = $query1->result_array();
            return $result2;
			}
    	}
    public function find_collegeswithoutlogin($limit, $start)
    	{
    	   
    	
    	$id = $this->session->userdata('find');	
    	$this->db->select('*');
        $this->db->from('athletes_profile');
        $this->db->where('user_id', $id );
        $universi = $this->db->get(); 
    	$athlete_info = $universi->row_array();
    //	print_r($athlete_info);die;
        $game_id=$athlete_info['games'];
        $gpa=$athlete_info['gpa'];
                        $this->db->select('*');
			$this->db->from('sports_sport');
			$this->db->where('id',$game_id);
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
			$this->db->select('*');
			$this->db->from('university');
			$this->db->where('gpa<=',$gpa);
			$this->db->where_in('ID',$arr);
			$this->db->limit($limit, $start);
			$query1 = $this->db->get();
			$result2 = $query1->result_array();
			//print_r($result2);die;
            return $result2;
			}
    	}
    	public function find_colleges_free()
    	{
    	   // echo "hellllllo";die;
    	  // echo $rt= $this->session->set_userdata('userdata');die;
    	    $id3=$this->session->userdata('user_idd');
	   //  $regid11=$this->session->userdata('userriddd');
       if($id3)
	   {
        $id=$this->session->userdata('user_idd');
    	$this->db->select('*');
        $this->db->from('new_profile');
        $this->db->where('user_id', $id );
        $universi = $this->db->get(); 
    	$athlete_info = $universi->row_array();
        $game_id=$athlete_info['games'];
       // echo "<br>";
         $gpa=$athlete_info['gpa'];
      //  print_r($athlete_info);die;
       // return $result2;
        $this->db->select('*');
		$this->db->from('sports_sport');
		$this->db->where('id',$game_id);
		$query = $this->db->get();
	    $game = $query->row_array();
	      $game_na = $game['sport_name'];
         $game_nam = str_replace("'", '', $game_na);
		$game_name = strtoupper($game_nam);
		// $game_name;
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
			$this->db->select('*');
			$this->db->from('university');
			$this->db->where('gpa<=',$gpa);
			$this->db->where_in('ID',$arr);
			$query1 = $this->db->get();
			$result2 = $query1->result_array();
			//print_r($result2);die;
            return $result2;
         
			}
	    //print_r($game);die;
    	}
    
    	}
    	
    	public function find_colleges_free1()
    	{
    	   // echo "ghjkk";
    	  $id = $this->session->userdata('userdata');
    	 $this->db->select('*');
        $this->db->from('new_profile');
        $this->db->where('user_id', $id );
        $universi = $this->db->get(); 
    	$athlete_info = $universi->row_array();
        $game_id=$athlete_info['games'];
       // echo "<br>";
         $gpa=$athlete_info['gpa'];
      //  print_r($athlete_info);die;
       // return $result2;
        $this->db->select('*');
		$this->db->from('sports_sport');
		$this->db->where('id',$game_id);
		$query = $this->db->get();
	    $game = $query->row_array();
	      $game_na = $game['sport_name'];
         $game_nam = str_replace("'", '', $game_na);
		$game_name = strtoupper($game_nam);
		// $game_name;
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
			$this->db->select('*');
			$this->db->from('university');
			$this->db->where('gpa<=',$gpa);
			$this->db->where_in('ID',$arr);
			$query1 = $this->db->get();
			$result2 = $query1->result_array();
			//print_r($result2);die;
            return $result2;
         
			}
    	}

		public function show_total_email()
		{    
		    $id = $this->session->userdata('user_id');	
			$this->db->select('*');
			$this->db->from('crone_job_table');
			$this->db->where('user_id',$id);
			$query1 = $this->db->get();
			$result2 = $query1->result_array();
		
			for($i=0;$i<count($result2);$i++)
     		{
	    	//echo $name = $result2[$i]['username'];
		   $id = $result2[$i]['user_id'];
		      $count = $result2[$i]['count'];
		   
			  $this->db->select('*');
    		  $this->db->from('athletes_profile');
	    	  $this->db->where('user_id',$id);
		      $query3 = $this->db->get();
			  $result4 = $query3->row_array();
			  
		  $game_id = $result4['games'];		 
		  $gpa = $result4['gpa'];
		  
              $this->db->select('*');
			  $this->db->from('sports_sport');
			  $this->db->where('id',$game_id);
			  $query = $this->db->get();
	    	  $game_name = $query->row_array();
              $spo_name = $game_name['sport_name'];	
              $sport_nam = str_replace("'", '', $spo_name);
			  
	      $sports_name = strtoupper($sport_nam);			  
              
			  $this->db->select('university_contact.* , university.UNIVERSITY')
              ->from('university_contact')
              ->join('university', 'university_contact.UNIVERSITY_ID = university.ID');
			  $this->db->where('university.GPA<=', $gpa);
              $this->db->where('university_contact.SPORTS',$sports_name);
			  $this->db->limit($count);
              $result = $this->db->get()->result_array();
			  return $result;
		    }
			
		}
		public function show_read_email()
		{
			$id = $this->session->userdata('user_idd');
			$this->db->select('*');
    	    $this->db->from('blast_email');
    	    $this->db->where('user_id', $id );
    	    $coach = $this->db->get(); 
    		$coach_detail = $coach->result_array();
			//print_r($coach_detail);die;
			
			foreach($coach_detail as $coach_info)
			{
				$coach_id = $coach_info['coach_id'];
			  $this->db->select('coach.* ,  blast_email.open_email')
              ->from('coach')
              ->join('blast_email', 'coach.id = blast_email.coach_id');
			  $this->db->where('blast_email.coach_id=', $coach_id);
			  $this->db->where('blast_email.user_id=', $id);
              $result5[] = $this->db->get()->row_array();
			}
			 return $result5;
		}
		public function find_gpa($tablename)
		{
			$id = $this->session->userdata('user_idd');
			$this->db->select('*');
    	    $this->db->from($tablename);
    	    $this->db->where('user_id', $id );
    	    $universi = $this->db->get(); 
    		$athlete_info = $universi->row_array();
            return $athlete_info;
		}
				public function find_gpawithoutlogin()
		{
			$id = $this->session->userdata('find');
			$this->db->select('*');
    	    $this->db->from('athletes_profile');
    	    $this->db->where('user_id', $id );
    	    $universi = $this->db->get(); 
    		$athlete_info = $universi->row_array();
            return $athlete_info;
		}
			public function find_gpa1()
		{
		    $id=$this->session->userdata('user_idd');
		//	$id = $this->session->userdata('user_id');
			$this->db->select('*');
    	    $this->db->from('new_profile');
    	    $this->db->where('user_id', $id );
    	    $universi = $this->db->get(); 
    		$athlete_info = $universi->row_array();
    		//print_r($athlete_info);die;
            return $athlete_info;
		}
				public function find_gpa12()
		{
		    $id=$this->session->userdata('userdata');
		//	$id = $this->session->userdata('user_id');
			$this->db->select('*');
    	    $this->db->from('new_profile');
    	    $this->db->where('user_id', $id );
    	    $universi = $this->db->get(); 
    		$athlete_info = $universi->row_array();
    		//print_r($athlete_info);die;
            return $athlete_info;
		}
				public function find_gpa2()
		{
		    $id=$this->session->userdata('userdata');
		//	$id = $this->session->userdata('user_id');
			$this->db->select('*');
    	    $this->db->from('new_profile');
    	    $this->db->where('user_id', $id );
    	    $universi = $this->db->get(); 
    		$athlete_info = $universi->row_array();
            return $athlete_info;
		}
		public function university_info($uni_id)
		{
			$this->db->select('*');
			$this->db->from('university');
			$this->db->where('ID',$uni_id);
			$query1 = $this->db->get();
			$result2 = $query1->row_array();
            return $result2;			
		}
			public function university_info1($uni_id1)
		{
			$this->db->select('*');
			$this->db->from('university');
			$this->db->where('ID',$uni_id1);
			$query1 = $this->db->get();
			$result2 = $query1->row_array();
			//print_r($result2);die;
            return $result2;			
		}
		public function university_contact_info($uni_id1,$game_id_get)
		{
			//echo $uni_id1.$game_id_get;die;
			$this->db->select('*');
			$this->db->from('sports_sport');
			$this->db->where('id',$game_id_get);
			$ga = $this->db->get();
			$ga = $ga->row_array();
			//echo "<pre>";
			//print_r($ga);die;
			$game_na = $ga['sport_name'];
			$game_nam = str_replace("'", '', $game_na);
		    $game_name = strtoupper($game_nam);
            
			$array_new = array('UNIVERSITY_ID' => $uni_id1, 'SPORTS' => $game_name);
			$this->db->select('*');
			$this->db->from('university_contact');
			$this->db->where($array_new);
			$query1 = $this->db->get();
			$result2 = $query1->row_array();
			//print_r($result2);
            return $result2;			
		}
		public function update_create_profile()
		{
		
    	$ses_id = $this->session->userdata('user_idd');
		$this->db->select('*');
        $this->db->from('new_profile');
        $this->db->where('user_id', $ses_id );
        $query = $this->db->get();
        $athlete = $query->row_array();
        //print_r($athlete);die;
		
		if($_FILES['image_profile']['name']!='')
		{
					$config['upload_path'] = './uploads/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']	= '1000';
					$this->load->library('upload',$config);
					$this->upload->do_upload('image_profile');
					$data1 = array('upload_data' => $this->upload->data());
					$filename = $data1['upload_data']['file_name'];
				
		}
		else
		{
			$filename = $athlete['image_profile'];
			
		}
		if($_FILES['gpa_pdf']['name']!='')
		{	
					$config['upload_path'] = './uploads/';
					$config['allowed_types'] = 'jpg|pdf';
					$config['max_size']	= '3000';
					$this->load->library('upload',$config);
					$this->upload->do_upload('gpa_pdf');
					$data2 = array('upload_data' => $this->upload->data());
					$filename2 = $data2['upload_data']['file_name'];
				
					
		}
		else
		{
			$filename2 = $athlete['gpa_pdf'];
			
		}
		if($_FILES['sat_pdf']['name']!=''){
			        $config['upload_path'] = './uploads/';
					$config['allowed_types'] = 'jpg|pdf';
					$config['max_size']	= '3000';
					$this->load->library('upload',$config);
					$this->upload->do_upload('sat_pdf');
					$data3 = array('upload_data' => $this->upload->data());
					$filename3 = $data3['upload_data']['file_name'];
					
				 					
		}
		else
		{
			$filename3 = $athlete['sat_pdf'];
			
		}
		if($_FILES['act_pdf']['name']!=''){
			        $config['upload_path'] = './uploads/';
					$config['allowed_types'] = 'jpg|pdf';
					$config['max_size']	= '3000';
					$this->load->library('upload',$config);
					$this->upload->do_upload('act_pdf');
					$data4 = array('upload_data' => $this->upload->data());
					$filename4 = $data4['upload_data']['file_name'];
					
					
		}
		else
		{
			$filename4 = $athlete['act_pdf'];
			
		}
				if($athlete['position_id']=='0')
		{
		    $postid = $this->input->post('position');
		    
		}
		else
		{
		    $postid = $athlete['position_id'];
		}
		
		   $id=$this->session->userdata('user_idd');
		    $data = array(
'firstname'=>$this->input->post('firstname'),
		              'middlename'=>$this->input->post('middlename'),
		             // 'games'=>$this->input->post('middlename'),
					  'lastname'=>$this->input->post('lastname'),
					  'gender'=>$this->input->post('gender'),
					  'image_profile'=>$filename,
					  'birth'=>$this->input->post('birth'),
					  'position_id'=>$postid,
					  'weight'=>$this->input->post('weight'),
					  'height'=>$this->input->post('height'),
					   'address1'=>$this->input->post('address1'),
					  'address2'=>$this->input->post('address2'),
					  'ncaa'=>$this->input->post('ncaa'),
					  'naia'=>$this->input->post('naia'),
					//  'homephone'=>$this->input->post('homephone'),
					  'celphone'=>$this->input->post('celphone'),
					   'email'=>$this->input->post('email'),
					  'guardian1'=>$this->input->post('guardian1'),
					  'g_first_name'=>$this->input->post('g_first_name'),
					  'g_last_name'=>$this->input->post('g_last_name'),
					  'g_phone'=>$this->input->post('g_phone'),
					  'g_mail'=>$this->input->post('g_mail'),
					  'guardian2'=>$this->input->post('guardian2'),
					  'g2_first_name'=>$this->input->post('g2_first_name'),
					  'g2_last_name'=>$this->input->post('g2_last_name'),
					  'g2_phone'=>$this->input->post('g2_phone'),
					 'g2_mail'=>$this->input->post('g2_mail'),
					 'grad_year'=>$this->input->post('grad_year'),
			          'gpa'=>$this->input->post('gpa'), 
			          'sat'=>$this->input->post('sat'),
			           'act'=>$this->input->post('act'),
			           'gpa_pdf'=>$filename2, 
			           'sat_pdf'=>$filename3,
			          'act_pdf'=>$filename4 
			        
					   );
					  
						$this->db->where('user_id',$id);
						$this->db->update('new_profile', $data);
		}
		
				public function update_create_profilesign()
		{
		 /* $id=$this->session->userdata('user_idd');	
    	$ses_id = $this->session->userdata('userriddd');
		$this->db->select('*');
        $this->db->from('new_profile');
        $this->db->where('user_id', $id );
        $query = $this->db->get();
        $athlete = $query->row_array();
        $athlete_pic = $athlete['image_profile'];
		if($athlete_pic)
		{
			echo "Filled";die;
		}
		else
		{
			echo "Empty";die;
		} */
		if($_FILES['image_profile']['name']!='')
		{
			
					
					$config['upload_path'] = './uploads/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']	= '1000';
					$this->load->library('upload',$config);
					$this->upload->do_upload('image_profile');
					$data1 = array('upload_data' => $this->upload->data());
					$filename = $data1['upload_data']['file_name'];
				
		}
		else
		{
			
			echo $filename = $athlete['image_profile'];
			
		}
		if($_FILES['gpa_pdf']['name']!='')
		{	
					$config['upload_path'] = './uploads/';
					$config['allowed_types'] = 'jpg|pdf';
					$config['max_size']	= '3000';
					$this->load->library('upload',$config);
					$this->upload->do_upload('gpa_pdf');
					$data2 = array('upload_data' => $this->upload->data());
					$filename2 = $data2['upload_data']['file_name'];
				
					
		}
		else
		{
			$filename2 = $athlete['gpa_pdf'];
			
		}
		if($_FILES['sat_pdf']['name']!=''){
			        $config['upload_path'] = './uploads/';
					$config['allowed_types'] = 'jpg|pdf';
					$config['max_size']	= '3000';
					$this->load->library('upload',$config);
					$this->upload->do_upload('sat_pdf');
					$data3 = array('upload_data' => $this->upload->data());
					$filename3 = $data3['upload_data']['file_name'];
					
				 					
		}
		else
		{
			$filename3 = $athlete['sat_pdf'];
			
		}
		if($_FILES['act_pdf']['name']!=''){
			        $config['upload_path'] = './uploads/';
					$config['allowed_types'] = 'jpg|pdf';
					$config['max_size']	= '3000';
					$this->load->library('upload',$config);
					$this->upload->do_upload('act_pdf');
					$data4 = array('upload_data' => $this->upload->data());
					$filename4 = $data4['upload_data']['file_name'];
					
					
		}
		else
		{
			$filename4 = $athlete['act_pdf'];
			
		}
		
				if($athlete['position_id']=='0')
		{
		    $postid = $this->input->post('position');
		    
		}
		else
		{
		    $postid = $athlete['position_id'];
		}
		    $id=$this->session->userdata('user_idd');
		    $this->db->select('*');
			$this->db->from('new_profile');
			$this->db->where('user_id',$id);
			$query = $this->db->get();
	    	$pic_name = $query->row_array();
	        echo $file_name = $pic_name['image_profile'];die;
		    $data = array(
'firstname'=>$this->input->post('firstname'),
		              'middlename'=>$this->input->post('middlename'),
		             // 'games'=>$this->input->post('middlename'),
					  'lastname'=>$this->input->post('lastname'),
					  'gender'=>$this->input->post('gender'),
					  'image_profile'=>$file_name,
					  'birth'=>$this->input->post('birth'),
					  'position_id'=>$postid,
					  'weight'=>$this->input->post('weight'),
					  'height'=>$this->input->post('height'),
					   'address1'=>$this->input->post('address1'),
					  'address2'=>$this->input->post('address2'),
					  'ncaa'=>$this->input->post('ncaa'),
					  'naia'=>$this->input->post('naia'),
					//  'homephone'=>$this->input->post('homephone'),
					  'celphone'=>$this->input->post('celphone'),
					   'email'=>$this->input->post('email'),
					  'guardian1'=>$this->input->post('guardian1'),
					  'g_first_name'=>$this->input->post('g_first_name'),
					  'g_last_name'=>$this->input->post('g_last_name'),
					  'g_phone'=>$this->input->post('g_phone'),
					  'g_mail'=>$this->input->post('g_mail'),
					  'guardian2'=>$this->input->post('guardian2'),
					  'g2_first_name'=>$this->input->post('g2_first_name'),
					  'g2_last_name'=>$this->input->post('g2_last_name'),
					  'g2_phone'=>$this->input->post('g2_phone'),
					 'g2_mail'=>$this->input->post('g2_mail'),
					 'grad_year'=>$this->input->post('grad_year'),
			          'gpa'=>$this->input->post('gpa'), 
			          'sat'=>$this->input->post('sat'),
			           'act'=>$this->input->post('act'),
			           'gpa_pdf'=>$filename2, 
			           'sat_pdf'=>$filename3,
			          'act_pdf'=>$filename4 
			        
					   );
					 
					 // $data12 = array(
                      //'position_id'=>$this->input->post('position')
		           
					   //);
					   
						$this->db->where('user_id',$id);
						$success = $this->db->update('new_profile', $data);
						
					//	$this->db->update('free_profile_athlete_stats_value', $data12);
		}
		
	public function update_create_profile_free()
	{	
		if($_FILES['image_profile']['name']!='')
		{				
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '1000';
			$this->load->library('upload',$config);
			$this->upload->do_upload('image_profile');
			$data1 = array('upload_data' => $this->upload->data());
			$filename = $data1['upload_data']['file_name'];
				
		}
		else
		{
			
		 $filename = $this->input->post(image_profile);
			
		} 
					
		    $id=$this->session->userdata('user_idd');		   
		    $data = array(
					  'firstname'=>$this->input->post('firstname'),
		              'middlename'=>$this->input->post('middlename'),
					  'lastname'=>$this->input->post('lastname'),
		              'games'=>$this->input->post('sports_id'),
					  'position_id'=>$this->input->post('position'),					  
					  'image_profile'=>$filename,
					  'gender'=>$this->input->post('gender'),
					  'birth'=>$this->input->post('birth'),					  
					  'weight'=>$this->input->post('weight'),
					  'height'=>$this->input->post('height'),
					  'address1'=>$this->input->post('address1'),
					  'address2'=>'',
					  'ncaa'=>'',
					  'naia'=>'',					
					  'celphone'=>$this->input->post('celphone'),
					  'email'=>$this->input->post('email'),
					  'guardian1'=>$this->input->post('guardian1'),
					  'g_first_name'=>$this->input->post('g_first_name'),
					  'g_last_name'=>$this->input->post('g_last_name'),
					  'g_phone'=>$this->input->post('g_phone'),
					  'g_mail'=>$this->input->post('g_mail'),
					  'guardian2'=>$this->input->post('guardian2'),
					  'g2_first_name'=>$this->input->post('g2_first_name'),
					  'g2_last_name'=>$this->input->post('g2_last_name'),
					  'g2_phone'=>$this->input->post('g2_phone'),
					  'g2_mail'=>$this->input->post('g2_mail'),
					  'grad_year'=>$this->input->post('grad_year'),
			          'gpa'=>$this->input->post('gpa'), 
			          'sat'=>$this->input->post('sat'),
			          'act'=>$this->input->post('act'),
			          'gpa_pdf'=>$filename2, 
			          'sat_pdf'=>$filename3,
			          'act_pdf'=>$filename4 			        
					);
						//print_r($data);die;
		$this->db->where('user_id',$id);
		$success = $this->db->update('new_profile', $data);
						
					
		}
		public function new_profile_submit($sport)
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
	            
		       // $regid11=$this->session->userdata('userriddd');
		    	$config['upload_path'] = './uploads/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']	= '1000';
					$this->load->library('upload',$config);
					$this->upload->do_upload('image_profile');
					$data1 = array('upload_data' => $this->upload->data());
					$filename = $data1['upload_data']['file_name'];
					
					
				$config['upload_path'] = './uploads/';
					$config['allowed_types'] = 'jpg|pdf';
					$config['max_size']	= '3000';
					$this->load->library('upload',$config);
					$this->upload->do_upload('gpa_pdf');
					$data2 = array('upload_data' => $this->upload->data());
					$filename2 = $data2['upload_data']['file_name'];
					
					
			     $config['upload_path'] = './uploads/';
					$config['allowed_types'] = 'jpg|pdf';
					$config['max_size']	= '3000';
					$this->load->library('upload',$config);
					$this->upload->do_upload('sat_pdf');
					$data3 = array('upload_data' => $this->upload->data());
					$filename3 = $data3['upload_data']['file_name'];
					
					
				 $config['upload_path'] = './uploads/';
					$config['allowed_types'] = 'jpg|pdf';
					$config['max_size']	= '3000';
					$this->load->library('upload',$config);
					$this->upload->do_upload('act_pdf');
					$data4 = array('upload_data' => $this->upload->data());
					$filename4 = $data4['upload_data']['file_name'];
					
$data = array('user_id'=>$regid11,
'firstname'=>$this->input->post('firstname'),
		              'middlename'=>$this->input->post('middlename'),
		              'games'=>$sport,
					  'lastname'=>$this->input->post('lastname'),
					  'gender'=>$this->input->post('gender'),
					  'image_profile'=>$filename,
					  'birth'=>$this->input->post('birth'),
					  'position_id'=>$this->input->post('position'),
					  'weight'=>$this->input->post('weight'),
					  'height'=>$this->input->post('height'),
					   'address1'=>$this->input->post('address1'),
					  'address2'=>$this->input->post('address2'),
					  'ncaa'=>$this->input->post('ncaa'),
					  'naia'=>$this->input->post('naia'),
					//  'homephone'=>$this->input->post('homephone'),
					  'celphone'=>$this->input->post('celphone'),
					   'email'=>$this->input->post('email'),
					  'guardian1'=>$this->input->post('guardian1'),
					  'g_first_name'=>$this->input->post('g_first_name'),
					  'g_last_name'=>$this->input->post('g_last_name'),
					  'g_phone'=>$this->input->post('g_phone'),
					  'g_mail'=>$this->input->post('g_mail'),
					  'guardian2'=>$this->input->post('guardian2'),
					  'g2_first_name'=>$this->input->post('g2_first_name'),
					  'g2_last_name'=>$this->input->post('g2_last_name'),
					  'g2_phone'=>$this->input->post('g2_phone'),
					 'g2_mail'=>$this->input->post('g2_mail'),
					 'grad_year'=>$this->input->post('grad_year'),
			          'gpa'=>$this->input->post('gpa'), 
			          'sat'=>$this->input->post('sat'),
			           'act'=>$this->input->post('act'),
			          'gpa_pdf'=>$filename2, 
			          'sat_pdf'=>$filename3,
			          'act_pdf'=>$filename4 
			        
					   );
		$in = $this->db->insert('new_profile',$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
		}
		
	public function new_free_profile_submit()
	
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
	            
		       // $regid11=$this->session->userdata('userriddd');
		    	$config['upload_path'] = './uploads/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']	= '1000';
					$this->load->library('upload',$config);
					$this->upload->do_upload('image_profile');
					$data1 = array('upload_data' => $this->upload->data());
					$filename = $data1['upload_data']['file_name'];					
				
					
				$data = array('user_id'=>$this->input->post('user_id'),
				'firstname'=>$this->input->post('firstname'),
		              'middlename'=>$this->input->post('middlename'),
					  'lastname'=>$this->input->post('lastname'),
		              'games'=>$this->input->post('sports_id'),
					  'position_id'=>$this->input->post('position'),
					  'image_profile'=>$filename,
					  'gender'=>'',
					  'birth'=>$this->input->post('birth'),					  
					  'weight'=>'',
					  'height'=>'',
					  'address1'=>$this->input->post('address1'),
					  'address2'=>'',
					  'ncaa'=>'',
					  'naia'=>'',
					  'homephone'=>'',
					  'celphone'=>$this->input->post('celphone'),
					  'email'=>$this->input->post('email'),
					  'guardian1'=>$this->input->post('guardian1'),
					  'g_first_name'=>$this->input->post('g_first_name'),
					  'g_last_name'=>$this->input->post('g_last_name'),
					  'g_phone'=>$this->input->post('g_phone'),
					  'g_mail'=>$this->input->post('g_mail'),
					  'guardian2'=>'',
					  'g2_first_name'=>'',
					  'g2_last_name'=>'',
					  'g2_phone'=>'',
					  'g2_mail'=>'',
					  'grad_year'=>$this->input->post('grad_year'),
			          'gpa'=>$this->input->post('gpa'), 
			          'sat'=>'',
			          'act'=>'',
			          'gpa_pdf'=>'', 
			          'sat_pdf'=>'',
			          'act_pdf'=>'', 
			          'percentage1'=>'', 
			          'percentage2'=>'', 
			          'percentage3'=>'' 
			        
					   );
		$in = $this->db->insert('new_profile',$data);
		$insert_id = $this->db->insert_id();
		return $insert_id;
		}
		
		
		
		
    public function profile_information()
	{
		// uploas profile picture
	 	$ses_id = $this->session->userdata('user_idd');
		$this->db->select('*');
        $this->db->from('athletes_profile');
        $this->db->where('user_id', $ses_id );
        $query = $this->db->get();
        $athlete = $query->row_array();
		
		if($_FILES['image_profile']['name']!='')
		{
					$config['upload_path'] = './uploads/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']	= '1000';
					$this->load->library('upload',$config);
					$this->upload->do_upload('image_profile');
					$data1 = array('upload_data' => $this->upload->data());
					$filename = $data1['upload_data']['file_name'];
		}
		else
		{
			$filename = $athlete['image_profile'];
		}
		if($_FILES['gpa_pdf']['name']!='')
		{	
					$config['upload_path'] = './uploads/';
					$config['allowed_types'] = 'jpg|pdf';
					$config['max_size']	= '3000';
					$this->load->library('upload',$config);
					$this->upload->do_upload('gpa_pdf');
					$data2 = array('upload_data' => $this->upload->data());
					$filename2 = $data2['upload_data']['file_name'];
					
		}
		else
		{
			$filename2 = $athlete['gpa_pdf'];
		}
		if($_FILES['sat_pdf']['name']!=''){
			        $config['upload_path'] = './uploads/';
					$config['allowed_types'] = 'jpg|pdf';
					$config['max_size']	= '3000';
					$this->load->library('upload',$config);
					$this->upload->do_upload('sat_pdf');
					$data3 = array('upload_data' => $this->upload->data());
					$filename3 = $data3['upload_data']['file_name'];
				 					
		}
		else
		{
			$filename3 = $athlete['sat_pdf'];
		}
		if($_FILES['act_pdf']['name']!=''){
			        $config['upload_path'] = './uploads/';
					$config['allowed_types'] = 'jpg|pdf';
					$config['max_size']	= '3000';
					$this->load->library('upload',$config);
					$this->upload->do_upload('act_pdf');
					$data4 = array('upload_data' => $this->upload->data());
					$filename4 = $data4['upload_data']['file_name'];
					
		}
		else
		{
			$filename4 = $athlete['act_pdf'];
		}
		
						$id = $this->session->userdata('user_idd'); 
						foreach($this->input->post() as $key=>$val){
							if($key=='buttt'){}
							else{
						$data[$key]= $val; 	
							}
						}
						
						
						$data['gpa_pdf'] = $filename2;
						$data['sat_pdf'] = $filename3;
						$data['act_pdf'] = $filename4;
						$data['image_profile'] = $filename;
						
						
					//	print_r($data);die;
						$this->db->where('user_id',$id);
						$this->db->update('athletes_profile', $data);
						
						$pos_id = $this->input->post('position_id');
						$this->db->select('*');
						$this->db->from('athlete_game_position_stats');
						$this->db->where("FIND_IN_SET('$pos_id',position_id) !=", 0);
						$query = $this->db->get();
						$mine = $query->row_array();
						$over = $mine['stats'];
                       // echo $over;
						$this->db->select('*');
						$this->db->from('athlete_stats_value');	
                        $this->db->where('user_id',$id);
                        $query3 = $this->db->get();
						$mine3 = $query3->row_array();
                        $stats = $mine3['stats'];
						if($stats)
						{   
						}	
						else{
							$cur_year = gmdate("Y");
							$overallget = explode(",",$over);
							for($i=0;$i<count($overallget);$i++)
							{
							$st[$i] = 0;
							}
							$stats_value = implode(",",$st);
						$data2 = array('position_id'=>$pos_id,
					   	'stats'=>$stats_value,
						'year'=>$cur_year);
						$this->db->where('user_id',$id);
						$this->db->update('athlete_stats_value', $data2);
						}
    					
						if($this->db->affected_rows() >=0){
						  return '1'; 
						}else{
						  return '0'; 
						}
	}
	public function profile_information_free()
	{
		// uploas profile picture
	 	$ses_id = $this->session->userdata('user_idd');
		$this->db->select('*');
        $this->db->from('new_profile');
        $this->db->where('user_id', $ses_id );
        $query = $this->db->get();
        $athlete = $query->row_array();
		
		if($_FILES['image_profile']['name']!='')
		{
					$config['upload_path'] = './uploads/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']	= '1000';
					$this->load->library('upload',$config);
					$this->upload->do_upload('image_profile');
					$data1 = array('upload_data' => $this->upload->data());
					$filename = $data1['upload_data']['file_name'];
		}
		else
		{
			$filename = $athlete['image_profile'];
		}
		if($_FILES['gpa_pdf']['name']!='')
		{	
					$config['upload_path'] = './uploads/';
					$config['allowed_types'] = 'jpg|pdf';
					$config['max_size']	= '3000';
					$this->load->library('upload',$config);
					$this->upload->do_upload('gpa_pdf');
					$data2 = array('upload_data' => $this->upload->data());
					$filename2 = $data2['upload_data']['file_name'];
					
		}
		else
		{
			$filename2 = $athlete['gpa_pdf'];
		}
		if($_FILES['sat_pdf']['name']!=''){
			        $config['upload_path'] = './uploads/';
					$config['allowed_types'] = 'jpg|pdf';
					$config['max_size']	= '3000';
					$this->load->library('upload',$config);
					$this->upload->do_upload('sat_pdf');
					$data3 = array('upload_data' => $this->upload->data());
					$filename3 = $data3['upload_data']['file_name'];
				 					
		}
		else
		{
			$filename3 = $athlete['sat_pdf'];
		}
		if($_FILES['act_pdf']['name']!=''){
			        $config['upload_path'] = './uploads/';
					$config['allowed_types'] = 'jpg|pdf';
					$config['max_size']	= '3000';
					$this->load->library('upload',$config);
					$this->upload->do_upload('act_pdf');
					$data4 = array('upload_data' => $this->upload->data());
					$filename4 = $data4['upload_data']['file_name'];
					
		}
		else
		{
			$filename4 = $athlete['act_pdf'];
		}
		
						$id = $this->session->userdata('user_idd'); 
						foreach($this->input->post() as $key=>$val){
							if($key=='buttt'){}
							else{
						$data[$key]= $val; 	
							}
						}
						
						
						$data['gpa_pdf'] = $filename2;
						$data['sat_pdf'] = $filename3;
						$data['act_pdf'] = $filename4;
						$data['image_profile'] = $filename;
						
						
					//	print_r($data);die;
						$this->db->where('user_id',$id);
						$this->db->update('new_profile', $data);
						
						$pos_id = $this->input->post('position_id');
						/* $this->db->select('*');
						$this->db->from('athlete_game_position_stats');
						$this->db->where("FIND_IN_SET('$pos_id',position_id) !=", 0);
						$query = $this->db->get();
						$mine = $query->row_array();
						$over = $mine['stats']; */
                       // echo $over;
						$this->db->select('*');
						$this->db->from('free_profile_athlete_stats_value');	
                        $this->db->where('user_id',$id);
                        $query3 = $this->db->get();
						$mine3 = $query3->row_array();
                        $stats = $mine3['stats'];
						if($stats)
						{   
						}	
						else{
							$cur_year = gmdate("Y");
							$overallget = explode(",",$over);
							for($i=0;$i<count($overallget);$i++)
							{
							$st[$i] = 0;
							}
							$stats_value = implode(",",$st);
						$data2 = array('position_id'=>$pos_id,
					   	'stats'=>$stats_value,
						'year'=>$cur_year);
						$this->db->where('user_id',$id);
						$this->db->update('free_profile_athlete_stats_value', $data2);
						}
    					
						if($this->db->affected_rows() >=0){
						  return '1'; 
						}else{
						  return '0'; 
						}
	}
	
	
		public function val_count_tick()
		{
		   // $sport=$this->input->post('sport');
		    $id = $this->session->userdata('user_idd');
		    $this->db->select('*');
			$this->db->from('indiviual_email');
			$this->db->where('user_id', $id);
			$query2 = $this->db->get();
			$athlete_info2 = $query2->row_array();
			//print_r($athlete_info2);die;
			return $athlete_info2;
		
		}
		
		
}
