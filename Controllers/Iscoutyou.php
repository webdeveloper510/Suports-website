<?php
class Iscoutyou extends CI_Controller {
	public function __construct()	
	{
	    parent::__construct();		
		error_reporting(E_ALL & ~E_NOTICE);
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->database();
		$this->load->model('Signup_model');
		$this->load->model('Profile_model');
		$this->load->model('Login_model');	
        $this->load->model('Academic_info_model');	
		$this->load->model('Admin_info_model'); 
	
    }
	public function mail1()
	{
		 $this->load->library('email'); 
        //$to_email = "iscoutyou2@gmail.com";
         $to_email = "freeathletes@isportsrecruiting.com";
       //to_email = "rashmi@codenomad.net";
         $this->email->from('info@codenomad.net', 'Why iScoutYou'); 
         $this->email->to($to_email);
         $this->email->subject('ISCOUTYOU CREATE FREE PROFILE'); 
        



$this->email->message("<table align='center' border='0' cellpadding='0' cellspacing='0' width='600' style=' border-collapse: collapse;'><tbody><tr><td align='center' bgcolor='#5afd5a' style='padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;'><img src='https://iscoutyou.com/images/Race-PNG-HD.png' alt='Creating Email Magic' width='300' height='230' style='display: block;'></td></tr><tr><td bgcolor='#f9f5f5' style='padding: 21px 5px 29px 5px; background-image:url(https://iscoutyou.com/images/imgpsh_fullsize.jpg); background-position: center; background-size: cover;'><table border='0' cellpadding='0' cellspacing='0' width='100%'><tbody><tr><td align='center' style='color: #153643; sans-serif; font-size: 34px;'><img src='https://iscoutyou.com/images/logo.png' alt='Creating Email Magic'  style='display: block;'></td></tr><tr><td style='padding: 0px 0 0px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;'><div style='float:left;width: 28%;padding: 14px;text-align:center;'><img src='https://content.nike.com/content/dam/one-nike/globalAssets/menu_header_images/OneNike_Global_Nav_Icons_Basketball.png'>Let’s work together!</div><div style='float:left;width: 28%;padding: 14px;text-align:center;'><img src='https://content.nike.com/content/dam/one-nike/globalAssets/menu_header_images/OneNike_Global_Nav_Icons_Soccer.png'>You’re so Close </div><div style='float:left;text-align:center;width: 28%;padding: 14px;'><img src='https://content.nike.com/content/dam/one-nike/globalAssets/menu_header_images/OneNike_Global_Nav_Icons_WomensTraining.png'>Why iScoutYou</div></td></tr><tr><td><table border='0' cellpadding='0' cellspacing='0' width='100%'><tbody><tr><td width='100%' valign='top'style='padding: 0px 0 0 0; color: #153643;position:relative; font-size: 16px; line-height: 30px;'><img src='https://iscoutyou.com/images/1957f78c3919430.jpg' alt='' width='100%' height='auto' style='display: block;'><h3 style=' position: absolute;top: 22px;text-align: center;width: 100%;font-size: 25px;color:#00E100;margin: 9px 0px 0px 0px;'>Let’s work together!</h3><p style='color:#000;font-size: 17px;
text-align: center;'>Take a moment to evaluate where are you at on your recruiting process. You are spending the majority of your time looking for answers or are you really looking for the opportunity on playing at the Collegiate Level. Now answer this:</p></td></tr><tr><td width='100%' valign='top'style='padding: 0px 0 0 0; color: #153643;position:relative; font-size: 16px; line-height: 30px;'><h3 style=' position: absolute;top: 22px;text-align: center;width: 100%;font-size: 25px;color:#00E100;margin: 9px 0px 0px 0px;'>What are you doing to get your name out to colleges Coaches?</h3><p style='color:#000;;font-size: 17px;text-align: center;'>Most of the time we have Student-Athletes approach us asking, “how can I get known”. Any Student-Athlete has to take a strategic approach starting as soon as freshman year.</p></td></tr><tr><td width='100%' valign='top'style='padding: 0px 0 0 0; color: #153643;position:relative; font-size: 25px; line-height: 30px;'><h3 style=' position: absolute;top: 22px;text-align: center;width: 100%;font-size: 25px;color:#00E100;;margin: 9px 0px 0px 0px;'>Coaches are looking all year around</h3><p style='color:#000;;font-size: 17px;text-align: center;'>iScoutYou will get your name in front of all Colleges and University you qualify for. We have a power toll that will make your process practical and easier. Think of your future, think of what can you accomplish in your College career.</p></td></tr><tr><td align='center'><a href='https://iscoutyou.com/Iscoutyou/new_plan' style='background: #00E100;padding: 11px;color: #fff;text-decoration: none;font-size: 16px;'>Try our Free Month Subscription</a></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td bgcolor='#000' style='padding: 30px 30px 30px 30px;'><table border='0' cellpadding='0' cellspacing='0' width='100%'><tbody><tr><td style='color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;' width='75%'><p>COPYRIGHT © 2016 - 2017 ISCOUTYOU</p></td><td align='right' width='25%'><table border='0' cellpadding='0' cellspacing='0'><tbody><tr><td style='font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;'><a href='https://twitter.com/iScout_You' style='color: #ffffff;'><img src='http://icons.iconarchive.com/icons/fasticon/web-2/256/Twitter-icon.png' alt='Twitter' width='38' height='38' style='display: block;' border='0'></a></td><td style='font-size: 0; line-height: 0;' width='20'>&nbsp;</td><td style='font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;'><a href='https://www.facebook.com/iScoutYou.ISY/' style='color: #ffffff;'><img src='https://tctechcrunch2011.files.wordpress.com/2012/02/facebook_logo.png?w=150' alt='Facebook' width='38' height='38'></a></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table>",true);
$this->email->set_mailtype("html");
         $this->email->set_mailtype("html");
		 $done = $this->email->send();
		 echo "hello";die;
	}
	public function mail2(){
		 $this->load->library('email'); 
        //$to_email = "iscoutyou2@gmail.com";
        $to_email = "freeathletes@isportsrecruiting.com";
       //to_email = "rashmi@codenomad.net";
         $this->email->from('isportsrecruiting.com', 'Mail2'); 
         $this->email->to($to_email);
         $this->email->subject('ISCOUTYOU CREATE FREE PROFILE'); 
		 $this->email->message("<div style='color:red'>Sample Text</div>",true);
		 $this->email->set_mailtype("html");
         $this->email->set_mailtype("html");
		 $done = $this->email->send();
		 echo "hello";die;
	}
	public function testemail(){
		
		$this->load->view('test_email');
		
	}
	public function applemail()
	{		
	     
	     $this->load->library('email');        
         $to_email = "nehajoshi@codenomad.net";       
         $this->email->from('isportsrecruiting.com', 'Mail2'); 
         $this->email->to($to_email);
         $this->email->subject('Test Email '); 
		 $this->email->message('<div id="mailsub" class="notification" align="center">
    
<table width="50%" border="0" cellspacing="0" cellpadding="0" style="min-width: 320px;"><tr><td align="center" bgcolor="#eff3f8">


<!--[if gte mso 10]>
<table width="680" border="0" cellspacing="0" cellpadding="0">
<tr><td>

<table border="0" cellspacing="0" cellpadding="0" class="table_width_100" width="100%" style="max-width: 680px; min-width: 300px;">

	<tr><td align="center" bgcolor="#ffffff">
		<!-- padding -->
		<table width="90%" border="0" cellspacing="0" cellpadding="0">
			<tr><td align="center">
			    		<a href="#" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; float:left; width:100%; padding:20px;text-align:center; font-size: 13px;">
									<font face="Arial, Helvetica, sans-seri; font-size: 13px;" size="3" color="#596167">
									<img style="width: 136px;" border="0" src="https://isportsrecruiting.com/images/black-logo.png"> </font></a>
					</td>
					
					<td align="right">
			
			    		<label  style="color: #596167; font-family: Arial, Helvetica, sans-serif; float:left; width:100%; padding:20px;text-align:center; font-size: 32px;">
									Receipt </font></label>
					

			</td>
			</tr>
		</table>
		<!-- padding -->
	</td></tr>
	<!--header END-->

	<!--content 1 -->
	<tr><td align="center" bgcolor="#fbfcfd">
	    <font face="Arial, Helvetica, sans-serif" size="4" color="#57697e" style="font-size: 15px;">
		<table width="90%" border="0" cellspacing="0" cellpadding="0">
			<tr><td>
			    Dear Candidate,<br/>
			    Welcome to Creative Talent Management!<br/>
			    We have created an account for you. Here are your details:<br/>
			    Name:<br/>
			    Email:<br/>
                Organization:<br/>
                Password:<br/>
			</td></tr>
			<tr><td align="center">
				<div style="line-height: 24px;">
					<a href="#" target="_blank" class="btn btn-danger block-center">
					    click
					</a>
				</div>
				<!-- padding --><div style="height: 60px; line-height: 60px; font-size: 10px;"></div>
			</td></tr>
</table></font></td></tr><tr><td class="iage_footer" align="center" bgcolor="#ffffff"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td align="center" style="padding:20px;flaot:left;width:100%; text-align:center;"><font face="Arial, Helvetica, sans-serif" size="3" color="#96a5b5" style="font-size: 13px;"><span style="font-family: Arial, Helvetica, sans-serif; font-size: 13px; color: #96a5b5;">2015 © CTM. ALL Rights Reserved.</span></font>				</td></tr></table></td></tr><tr><td></td></tr></table></td></tr></table></td></tr></table>',true);
		 $this->email->set_mailtype("html");
         $this->email->set_mailtype("html");
		 $done = $this->email->send();
		 if($done)
		 {
			 redirect('iscoutyou/test_email');
		 }
	}
	public function mail3(){
		 $this->load->library('email'); 
        //$to_email = "iscoutyou2@gmail.com";
        $to_email = "freeathletes@isportsrecruiting.com";
       //to_email = "rashmi@codenomad.net";
         $this->email->from('isportsrecruiting.com', 'Mail3'); 
         $this->email->to($to_email);
         $this->email->subject('ISCOUTYOU CREATE FREE PROFILE'); 
        



$this->email->message("<div style='color:red'>Sample Text</div>",true);
$this->email->set_mailtype("html");
         $this->email->set_mailtype("html");
		 $done = $this->email->send();
		 echo "hello";die;
	}
	public function index()
	{	
	 	
		if($this->session->userdata('user_idd'))
		{
		redirect('iscoutyou/profile');
		}
		else if($this->session->userdata('sports_id'))
		{
			redirect('Iscoutyou/all_athelte');
		}
		else{
			$data['getall_sports_home'] = $this->Academic_info_model->getall_sports_home();
			$data['get_blogs'] = $this->Admin_info_model->get_blogs();
			$this->load->view('header_main');
			$this->load->view('homepage',$data);
			$this->load->view('footer');
		}
	}
	public function user_send_email()
	{
		if (!filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL) === false) {
            $this->load->library('email');
			$this->email->to($_POST['admin_email']);
			$this->email->from($_POST['user_email']);
			$this->email->subject($_POST['subject']);
			$this->email->message($_POST['message']);
			$this->email->set_mailtype("html");
			$done = $this->email->send();
			if($done)
			{
				echo "1";
			}
			else
			{
				echo "0";
			}
        } 
		else
		{
			echo "0";
		}
	}
	public function about_recruit()
	{
			$this->load->view('header_main');
			$this->load->view('about_recruit');
			$this->load->view('footer');
	}
	public function sports_page(){
		$this->load->view('header_main');
		$this->load->view('sports');
			$this->load->view('footer');
		
	}
	public function today_recruiting()
	{
			$this->load->view('header_main');
			$this->load->view('today_recruiting');
			$this->load->view('footer');
	}
	public function things_to_consider()
	{
			$this->load->view('header_main');
			$this->load->view('things_to_consider');
			$this->load->view('footer');
	}
	public function national_letter_of_intent()
	{
			$this->load->view('header_main');
			$this->load->view('national_letter_of_intent');
			$this->load->view('footer');
	}
	public function recruiting_terms()
	{
			$this->load->view('header_main');
			$this->load->view('recruiting_terms');
			$this->load->view('footer');
	}
	public function official_and_unofficial_campus()
	{
			$this->load->view('header_main');
			$this->load->view('official_and_unofficial_campus');
			$this->load->view('footer');
	}
	public function recruiting_calendar()
	{
			$this->load->view('header_main');
			$this->load->view('recruiting_calendar');
			$this->load->view('footer');
	}
	//////////////////////////////////////////
		public function profileexaple()
	{
		if(!$this->session->userdata('user_idd'))
	{
			redirect();
	}
	   else
	{
		$id = $this->session->userdata('user_idd');
		$data['arr'] = $this->Login_model->getdata1($id);
	    $game_id = $data['arr']['games'];
		$data['var'] = $this->Login_model->getgame1($game_id);
		//print_r($data['var']);die;
		$this->load->view('header');
		$this->load->view('profile_page',$data);
		$this->load->view('footer');
	}
	}
	function my_college()
	{
	    $id=$this->session->userdata('user_idd');
	    $regid=$this->session->userdata('userriddd');
	     if($regid){
		   $this->load->view('free_header');
       }
       else if($id){
            $this->load->view('free_header2');
       }
       else
       {
           $this->load->view('headerforview');
           
       }
       
	    	$this->load->view('free_profile_mycolleges');
	}
	
	/////////////////////////////

	
	public function create_profile()
	{   		
	    $data['userdata'] = $this->session->userdata;	  
	    $id = $this->session->userdata('user_idd');		
		if($id)
		{			
	    $data['arr'] = $this->Login_model->getdata1($id);				
	    $data['getemail']= $this->Login_model->getemail($id);	   
		}
		else
		{			
		 $data['arr'] = $this->Login_model->getdata1($id);
		 $data['getemail']= $this->Login_model->getemail(id);		 
		}
	    $game_id = $data['arr']['games'];	    
		$data['var'] = $this->Login_model->getgame1($game_id);
		if(count($data['var']))
		{			
	      $data['up']=1;
		}
		else
		{		
		    $data['up']=0;		    
		}	 
	    $data['fetch_game_id']=$this->Academic_info_model->fetch_game_id();
		
	   $sportidd = $data['fetch_game_id']['game'];	
	   
	    $data['get_position']=$this->Academic_info_model->free_profile_fetch_psition1($sportidd);
		
	    $data['get_position_selected']=$this->Academic_info_model->free_profile_position_selected();		   
            $this->load->view('free_header2',$data);       
			$this->load->view('create_profile',$data);
			$this->load->view('footer');
	}
	public function update_profilee()
	{
		
		  //print_r($_POST);die;
		  $sport_id  = $this->input->post('sports_id');
	      $regid11=$this->session->userdata('user_idd');
	      $selectid=$this->Academic_info_model->selectidforfreeprofile();
		  
	      $idd=$selectid['id'];
	  $val=0;		
		foreach($this->input->post() as $value){
			if($value){
				$val=$val+1;
				
			}
		}
			    
		$percentage=$val/19*100;		
		$data['res1'] = $this->Academic_info_model->update_basic_percentage_free($percentage,'percentage1');				
	  $this->session->set_userdata('userdata',$idd);
	  if($regid11)
	  {
		  
		  
	    $rec1 = $this->Profile_model->update_create_profile_free();
		$get_game_val=$this->Academic_info_model->get_free_profile_games_sports();
		$sport=$get_game_val[0]['games'];
		$position_id=$get_game_val[0]['position_id'];
		$get_game_sport_name=$this->Academic_info_model->get_free_profile_sport_name($sport);
		$sport_name=$get_game_sport_name[0]['sport_name'];
		$get_position_name=$this->Academic_info_model->get_free_profile_position_name($position_id);
		$get_sport_position_name=$get_position_name[0]['positions'];
		$name=$this->input->post('firstname');	   
		$middlename=$this->input->post('middlename');	   
		$lastname=$this->input->post('lastname');	   
		$gender=$this->input->post('gender');	   
		$birth=$this->input->post('birth');	   
		$address1=$this->input->post('address1');	   
		$celphone=$this->input->post('celphone');	   
		$email=$this->input->post('email');	   
		$guardian1=$this->input->post('guardian1');	   
		$g_first_name=$this->input->post('g_first_name');	   
		$g_last_name=$this->input->post('g_last_name');	   
		$g_phone=$this->input->post('g_phone');	   
		$g_mail=$this->input->post('g_mail');	   
		$grad_year=$this->input->post('grad_year');	   
		$gpa=$this->input->post('gpa');	
		$sport_id  = $this->input->post('sports_id');
		//$image_profile  = $_FILES('image_profile');
	  $val1=0;
		if($name)
		{
			$val1=$val1+1;
		}
		if($last_name)
		{
			$val1=$val1+1;
		}
		if($gender)
		{
			$val1=$val1+1;
		}
		if($birth)
		{
			$val1=$val1+1;
		}
		if($weight)
		{
			$val1=$val1+1;
		}
		if($height)
		{
			$val1=$val1+1;
		}
		if($address)
		{
			$val1=$val1+1;
		}
		if($address2)
		{
			$val1=$val1+1;
		}
		if($phone)
		{
			$val1=$val1+1;
		}
		if($celphone)
		{
			$val1=$val1+1;
		}
		if($email)
		{
			$val1=$val1+1;
		}
		if($guardian1)
		{
			$val1=$val1+1;
		}
		if($guardianfirstname)
		{
			$val1=$val1+1;
		}
		if($guardianlastname)
		{
			$val1=$val1+1;
		}
		if($guardianmobile)
		{
			$val1=$val1+1;
		}
		if($guardianemail)
		{
			$val1=$val1+1;
		}
		if($graduationyear)
		{
			$val1=$val1+1;
		}
		if($gpa)
		{
			$val1=$val1+1;
		}
		$percentage = $val1/19*100;
		
		
		$val2=0;
		$data['per'] = $this->Academic_info_model->update_basic_percentage_free($percentage,'percentage2');	   
	  $get_stat_value=$get['stats'];
	
	  $insert_stats = $this->Academic_info_model->insert_stats($sport_id,$get_stat_value);	  
	  redirect('Iscoutyou/free_profile_academic_info');
	  }
	  else
	  {
	    $rec1 = $this->Profile_model->update_create_profile();
	    $get=$this->Academic_info_model->free_profile_get_stats();		
	    $get_game_val=$this->Academic_info_model->get_free_profile_games_sports();
		$sport=$get_game_val[0]['games'];
		$position_id=$get_game_val[0]['position_id'];
		$get_game_sport_name=$this->Academic_info_model->get_free_profile_sport_name($sport);
		$sport_name=$get_game_sport_name[0]['sport_name'];
		$get_position_name=$this->Academic_info_model->get_free_profile_position_name($position_id);
		$get_sport_position_name=$get_position_name[0]['positions'];
		$name=$this->input->post('firstname');	   
		$first_name = $this->Profile_model->getfirstname();
		$middlename=$this->input->post('middlename');	   
		$lastname=$this->input->post('lastname');	   
		$gender=$this->input->post('gender');	   
		$birth=$this->input->post('birth');	   
		$address1=$this->input->post('address1');	   
		$celphone=$this->input->post('celphone');	   
		$email=$this->input->post('email');	   
		$guardian1=$this->input->post('guardian1');	   
		$g_first_name=$this->input->post('g_first_name');	   
		$g_last_name=$this->input->post('g_last_name');	   
		$g_phone=$this->input->post('g_phone');	   
		$g_mail=$this->input->post('g_mail');	   
		$grad_year=$this->input->post('grad_year');	   
		$gpa=$this->input->post('gpa');	   
		$games_per=$sport;
		$sport_per=$position_id;
	  $val1=0;
		if($name)
		{
			$val1=$val1+1;
		}
		if($last_name)
		{
			$val1=$val1+1;
		}
		if($gender)
		{
			$val1=$val1+1;
		}
		if($birth)
		{
			$val1=$val1+1;
		}
		if($weight)
		{
			$val1=$val1+1;
		}
		if($height)
		{
			$val1=$val1+1;
		}
		if($address)
		{
			$val1=$val1+1;
		}
		if($address2)
		{
			$val1=$val1+1;
		}
		if($phone)
		{
			$val1=$val1+1;
		}
		if($celphone)
		{
			$val1=$val1+1;
		}
		if($email)
		{
			$val1=$val1+1;
		}
		if($guardian1)
		{
			$val1=$val1+1;
		}
		if($guardianfirstname)
		{
			$val1=$val1+1;
		}
		if($guardianlastname)
		{
			$val1=$val1+1;
		}
		if($guardianmobile)
		{
			$val1=$val1+1;
		}
		if($guardianemail)
		{
			$val1=$val1+1;
		}
		if($graduationyear)
		{
			$val1=$val1+1;
		}
		if($gpa)
		{
			$val1=$val1+1;
		}
		$percentage = $val1/19*100;
		
		
		$val2=0;
		$data['per'] = $this->Academic_info_model->update_basic_percentage_free($percentage,'percentage2'); 
		
		
		
		
		$data['video_get'] = $this->Academic_info_model->video_get_percentage_free();
		//print_r($data['video_get']);die;
		$vid1=$data['video_get']['video1'];
		$vid2=$data['video_get']['video2'];
		
		$val3=0;
		if($vid1)
		{
			$val3=1;
		}
		if($vid2)
		{
			$val3=$val3+1;
		}
		$data['get_ath_history'] = $this->Academic_info_model->athlete_history_percentage_free();
		if($data['get_ath_history'])
		{
			$val3=$val3+1;
		}
		//echo $val3;die;
	    $data['ath_stat_val'] = $this->Academic_info_model->ath_stat_percentage_free($games_per,$sport_per);
		//print_r($data['ath_stat_val']);
		 $stat_valll=$data['ath_stat_val'][0]['stats'];
		$satat=explode(",",$stat_valll);
		if($data['ath_stat_val'])
		{
		if (max($satat) > 0)
		{
			//echo "xds";die;
	     $val3=$val3+1;
		} }
		//echo $val3;die;
		//print_r($satat);die;
		$percentage3=$val3/4*100;
		$data['per_athlete'] = $this->Academic_info_model->update_basic_percentage_free($percentage3,'percentage3');
		
		
		$data['get_all_data'] = $this->Academic_info_model->get_all_profile_data_free();
		
	    $from_email = "contact@iscoutyou.com";
	    $this->load->library('email'); 
         $to_email = "freeathletes@isportsrecruiting.com";
        // $to_email = "pankaj@codenomad.net";
          //$to_email = "sandeep@codenomad.net";
         $this->email->from($from_email, 'Create Profile'); 
         $this->email->to($to_email);
         $this->email->subject('ISCOUTYOU UPDATE FREE PROFILE'); 
        

//$link="<a href='http://iscoutyou.com/iscoutyou/updatepassword'/'.$to_email.">Click Here</a>'"; 
//$link = 'Click on this link -'. base_url().'/iscoutyou/updatepassword?id='.$idd;
//$link = "Click on this link - http://iscoutyou.com/iscoutyou/updatepassword?id=$idd";

//$this->email->message('<a href= "http://iscoutyou2.com/iscoutyou/updatepassword?id="'.$idd.'">Click on this link</a>',true);

$this->email->message("<table style='border:1px solid #ccc;'>
<tr style='order:1px solid #ccc;'>
   <th style='border:1px solid #ccc;'>Field</th>
   <th style='border:1px solid #ccc;'>Value</th>
</tr>
<tr style='border:1px solid #ccc;'>
   <td style='border:1px solid #ccc;'>First Name</td>
   <td style='border:1px solid #ccc;'>$name</td>
</tr>
<tr style='border:1px solid #ccc;'>
   <td style='border:1px solid #ccc;'>Middle Name</td>
   <td style='border:1px solid #ccc;'>$middlename</td>
</tr>
<tr style='border:1px solid #ccc;'>
   <td style='border:1px solid #ccc;'>Last Name</td>
   <td style='border:1px solid #ccc;'>$lastname</td>
</tr>
<tr style='border:1px solid #ccc;'>
   <td style='border:1px solid #ccc;'>Sport Name</td>
   <td style='border:1px solid #ccc;'>$sport_name</td>
</tr>
<tr style='border:1px solid #ccc;'>
   <td style='border:1px solid #ccc;'>Position Name</td>
   <td style='border:1px solid #ccc;'>$get_sport_position_name</td>
</tr>
<tr style='border:1px solid #ccc;'>
   <td style='border:1px solid #ccc;'>Birthday</td>
   <td style='border:1px solid #ccc;'>$birth</td>
</tr>
<tr style='border:1px solid #ccc;'>
   <td style='border:1px solid #ccc;'>Gender</td>
   <td style='border:1px solid #ccc;'>$gender</td>
</tr>
<tr style='border:1px solid #ccc;'>
   <td style='border:1px solid #ccc;'>Address1</td>
   <td style='border:1px solid #ccc;'>$address1</td>
</tr>
<tr style='border:1px solid #ccc;'>
   <td style='border:1px solid #ccc;'>Email</td>
   <td style='border:1px solid #ccc;'>$email</td>
</tr>
<tr style='border:1px solid #ccc;'>
   <td style='border:1px solid #ccc;'>Mobile</td>
   <td style='border:1px solid #ccc;'>$celphone</td>
</tr>
<tr style='border:1px solid #ccc;'>
   <td style='border:1px solid #ccc;'>First Guardian</td>
   <td style='border:1px solid #ccc;'>$guardian1</td>
</tr>

<tr style='border:1px solid #ccc;'>
   <td style='border:1px solid #ccc;'>Guardian First Name</td>
   <td style='border:1px solid #ccc;'>$g_first_name</td>
</tr>
<tr style='border:1px solid #ccc;'>
   <td style='border:1px solid #ccc;'>Guardian Last Name</td>
   <td style='border:1px solid #ccc;'>$g_last_name</td>
</tr>
<tr style='border:1px solid #ccc;'>
   <td style='border:1px solid #ccc;'>Guardian Phone Number</td>
   <td style='border:1px solid #ccc;'>$g_phone</td>
</tr>
<tr style='border:1px solid #ccc;'>
   <td style='border:1px solid #ccc;'>Guardian Email</td>
   <td style='border:1px solid #ccc;'>$g_mail</td>
</tr>
</tr>
<tr style='border:1px solid #ccc;'><td>Graduation Year</td>
   <td style='border:1px solid #ccc;'>$grad_year</td>
 </tr>
 <tr style='border:1px solid #ccc;'><td>GPA</td>
   <td style='border:1px solid #ccc;'>$gpa</td>
 </tr>
</table>",true);
$this->email->set_mailtype("html");
         $this->email->set_mailtype("html");

		 $done = $this->email->send();
	  $game=$get['sports_id'];
	   //$pos=$get['position_id'];
	  $get_stat_value=$get['stats'];
		//  print_r($get);die;
	  $insert_stats=$this->Academic_info_model->insert_stats($game,$get_stat_value);
	    
	  }
	     	$this->session->set_flashdata('dd','Your Profile Is Updated Successfully');
			// redirect('Iscoutyou/create_profile');
	}
	public function create_profile1()
	{
	     
	        $data['fetch_data']=$this->Academic_info_model->free_profile_fetch_psition();
	        
	     print_r($data['fetch_data']);
	     
	}
		public function consultation()
	{
			$this->load->view('header_main');
			$this->load->view('consultation');
			$this->load->view('footer');
	}
	public function consultantsubmit()
	{
		
	    $name=$this->input->post('first_name');
	    $middle_name=$this->input->post('middlename');
	    $last_name=$this->input->post('lastname');
	    $birth=$this->input->post('birth');
	    $email=$this->input->post('email');
	    $phone=$this-> input->post('phone');
	    $graduationyear= $this->input->post('graduationyear');
	    $highschool=  $this->input->post('highschool');
	    $location= $this->input->post('location');
	    $gpa= $this->input->post('gpa');
	    $sport1=$this->input->post('sport');
	    $position= $this->input->post('position');
	    $jvteam= $this->input->post('jvteam');
	    $varsity=  $this->input->post('varsity');
	    $collegecoach = $this->input->post('collegecoach');
	    $momname= $this->input->post('momname');
	    $momemail= $this->input->post('momemail');
	    $momphone=  $this->input->post('momphone');
	    $dadname= $this->input->post('dadname');
	    $dademail= $this->input->post('dademail');
        $dadphone=$this->input->post('dadphone');
        $poosition=$this->input->post('position');
        $data['poosition_name']=$this->Academic_info_model->find_poosition_name($poosition);
        $pos_name=$data['poosition_name']['positions'];
	    $this->Academic_info_model->freeconsultation();
	    $data['sport_name']=$this->Academic_info_model->find_sport_name();
	    //print_r($data['sport_name']);
	    $sport=$data['sport_name']['sport_name'];
         $from_email = "Consultant@isportsrecruiting.com";
	     $this->load->library('email'); 
         $to_email = "contact@isportsrecruiting.com";
       // $to_email = "sandeep@codenomad.net";
         $this->email->from($from_email, 'Create Consultant'); 
         $this->email->to($to_email);
         $this->email->subject('ISCOUTYOU FREE CONSULTATION'); 
        

//$link="<a href='http://iscoutyou.com/iscoutyou/updatepassword'/'.$to_email.">Click Here</a>'"; 
//$link = 'Click on this link -'. base_url().'/iscoutyou/updatepassword?id='.$idd;
//$link = "Click on this link - http://iscoutyou.com/iscoutyou/updatepassword?id=$idd";

//$this->email->message('<a href= "http://iscoutyou2.com/iscoutyou/updatepassword?id="'.$idd.'">Click on this link</a>',true);

$this->email->message("<table style='border:1px solid #ccc;'>
<tr style='order:1px solid #ccc;'>
<th style='border:1px solid #ccc;'>Field</th>
<th style='border:1px solid #ccc;'>Value</th></tr>
<tr style='border:1px solid #ccc;'>
<td style='border:1px solid #ccc;'>First Name</td>
<td style='border:1px solid #ccc;'>$name</td></tr>
<tr style='border:1px solid #ccc;'><td style='border:1px solid #ccc;'>Middle Name</td>
<td style='border:1px solid #ccc;'>$middle_name</td></tr><tr style='border:1px solid #ccc;'>
<td style='border:1px solid #ccc;'>Last Name</td><td style='border:1px solid #ccc;'>$last_name</td>
</tr><tr style='border:1px solid #ccc;'><td style='border:1px solid #ccc;'>Birthday</td>
<td style='border:1px solid #ccc;'>$birth</td></tr><tr style='border:1px solid #ccc;'>
<td style='border:1px solid #ccc;'>Email</td><td style='border:1px solid #ccc;'>$email</td></tr>
<tr style='border:1px solid #ccc;'><td style='border:1px solid #ccc;'>Phone Number</td>
<td style='border:1px solid #ccc;'>$phone</td></tr><tr style='border:1px solid #ccc;'>
<td style='border:1px solid #ccc;'>Graduation Year</td><td style='border:1px solid #ccc;'>$graduationyear</td>
</tr><tr style='border:1px solid #ccc;'><td style='border:1px solid #ccc;'>High School</td>
<td style='border:1px solid #ccc;'>$highschool</td></tr><tr style='border:1px solid #ccc;'>
<td style='border:1px solid #ccc;'>Location</td><td style='border:1px solid #ccc;'>$location</td></tr>
<td style='border:1px solid #ccc;'>GPA</td><td style='border:1px solid #ccc;'>$gpa</td></tr>
<tr style='border:1px solid #ccc;'><td style='border:1px solid #ccc;'>Sport</td><td style='border:1px solid #ccc;'>$sport</td></tr>
<tr style='border:1px solid #ccc;'><td style='border:1px solid #ccc;'>Position</td>
<td style='border:1px solid #ccc;'>$pos_name</td></tr><tr style='border:1px solid #ccc;'>
<td style='border:1px solid #ccc;'>Jvteam</td><td style='border:1px solid #ccc;'>$jvteam</td></tr>
<tr style='border:1px solid #ccc;'>
<td style='border:1px solid #ccc;'>Varsity</td><td style='border:1px solid #ccc;'>$varsity</td></tr>
<tr style='border:1px solid #ccc;'><td style='border:1px solid #ccc;'>Contact With Any College Coach</td>
<td style='border:1px solid #ccc;'>$collegecoach</td></tr><tr style='border:1px solid #ccc;'>
<td style='border:1px solid #ccc;'>Mom Name</td><td style='border:1px solid #ccc;'>$momname</td></tr>
<tr style='border:1px solid #ccc;'><td style='border:1px solid #ccc;'>Mom Phone Number</td>
<td style='border:1px solid #ccc;'>$momphone</td></tr><tr style='border:1px solid #ccc;'>
<td style='border:1px solid #ccc;'>Mom Email</td><td style='border:1px solid #ccc;'>$momemail</td>
</tr><tr style='border:1px solid #ccc;'><td style='border:1px solid #ccc;'>Dad Name</td>
<td style='border:1px solid #ccc;'>$dadname</td></tr><tr style='border:1px solid #ccc;'>
<td style='border:1px solid #ccc;'>Dad Email</td><td style='border:1px solid #ccc;'>$dademail</td></tr>
<tr style='border:1px solid #ccc;'><td>Dad Phone Number</td><td style='border:1px solid #ccc;'>$dadphone</td></tr>
</table>",true);
         $this->email->set_mailtype("html");
		 $done = $this->email->send();
	    if($done) 
         {
			 echo "1";    	
        
         }
		 else 
		 {
			 $this->session->set_flashdata('error','Failed, Sorry Something Went Wrong!');
		 }
	}
	public function my_colleges()
	{
		
		if($ses_id = $this->session->userdata('user_idd'))
		{
			 $ses_id = $this->session->userdata('user_idd');
			
	    $this->load->view('header');
		$data['total_no_email'] = $this->Academic_info_model->total_no_email();
		$data['total_email_read'] = $this->Academic_info_model->total_email_read();
		$data['total_indiviual_no_email'] = $this->Academic_info_model->total_indiviual_no_email($ses_id);		
		$this->load->view('my_colleges',$data);
		$this->load->view('footer');	
		}
		else 
		{
			
			
		}
	}
	public function my_colleges_free()
	{
		
		if($ses_id = $this->session->userdata('user_idd'))
		{
			 $ses_id = $this->session->userdata('user_idd');
			
	    $this->load->view('free_header2');
		$data['total_no_email'] = $this->Academic_info_model->total_no_email();
		$data['total_email_read'] = $this->Academic_info_model->total_email_read();
		$data['total_indiviual_no_email'] = $this->Academic_info_model->total_indiviual_no_email($ses_id);		
		$this->load->view('my_colleges_free',$data);
		$this->load->view('footer');	
		}
		else 
		{
			
			
		}
	}
	public function total_email_send()
	{
	    $this->load->view('header');
		$data['show_total_email'] = $this->Profile_model->show_total_email();
		$this->load->view('total_mail',$data);
		$this->load->view('footer');
	}
		public function read_by_coach()
	{
	    $this->load->view('header');
		$data['show_read_email'] = $this->Profile_model->show_read_email();
		$this->load->view('total_mail_read',$data);
		$this->load->view('footer');
	}
	public function new_email_send()
	{
		$data['active_users']=$this->Profile_model->active_users();
	}
	 public function new_email_send2()
	{
		$data['active_users2']= $this->Profile_model->active_users2();		
	} 
	public function coach_login()
	{
		if($this->session->userdata('sports_id'))
		{
			redirect('Iscoutyou/all_athelte');
		}
		else
		{
			if($_POST)
		   {
			$data['coach_form_submit'] = $this->Signup_model->coach_form_submit();
			if($data['coach_form_submit'])
			{
			$this->session->set_flashdata('somename','Registration Successful');	
			}
			
		   }
			$data['game'] = $this->Signup_model->get_game();	
			$data['all_university'] = $this->Admin_info_model->all_university();    
			$this->load->view('coach_login',$data);	
		}
	}
	
	public function forgotpasswordcoach()
	{
	   // $this->load->view('header_main');
	    $this->load->view('forgotpasswordcoach');
	   //	$this->load->view('footer');
	    
	}
		public function forgotpasswordcoach1()
	{
	   // $this->load->view('header_main');
	    $this->load->view('forgotpasswordcoach1');
	   //	$this->load->view('footer');
	    
	}
	public function forgot_password()
	{
		  $this->load->view('free_profile_forgot_password');
	}
	public function updatepassword()
	{
	    
	  // $this->load->view('header_main');
	   $this->load->view('updatepassword');
	//   $this->load->view('footer');
	}
		public function updateddpassword()
	{
	    $this->Academic_info_model->updateddpassword();
	    $this->session->set_flashdata('updated','Your password updated successfully.'); 
	    	redirect('Iscoutyou/coach_login');

	}
		public function updatepassword1()
	{
	    
	   //$this->load->view('header_main');
	   $this->load->view('updatepassword1');
	   //$this->load->view('footer');
	}
		public function updateddpassword1()
	{
	    
	    $this->Academic_info_model->updateddpassword1();
	    $this->session->set_flashdata('updated1','Your password updated successfully.'); 
	    redirect('Iscoutyou/login');
	}
	public function sendforgotpasswordemail()
	{
	    $from_email = "contact@isportsrecruiting.com"; 
         $to_email = $this->input->post('email'); 
       
         $data['email1']=$this->Academic_info_model->allemail();
         for($i=0;$i<count($data['email1']);$i++)
         {
         $fg[]=$data['email1'][$i]['email'];
         }
         if (in_array($to_email, $fg))
         {
         //Load email library 
         $data['id']=$this->Academic_info_model->getid($to_email);
        // print_r($data['id']);
         $fg=$data['id'][0]['id'];
		 $nameee=$data['id'][0]['username'];
         $idd=base64_encode($fg);
        
         $this->load->library('email'); 
   
         $this->email->from($from_email, 'Iscoutyou Password'); 
         $this->email->to($to_email);
         $this->email->subject('Reset Your Iscoutyou Password'); 
        

//$link="<a href='http://iscoutyou.com/iscoutyou/updatepassword'/'.$to_email.">Click Here</a>'"; 
//$link = 'Click on this link -'. base_url().'/iscoutyou/updatepassword?id='.$idd;
//$link = "Click on this link - http://iscoutyou.com/iscoutyou/updatepassword?id=$idd";

//$this->email->message('<a href= "http://iscoutyou2.com/iscoutyou/updatepassword?id="'.$idd.'">Click on this link</a>',true);
$this->email->message('
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Internal_email-29</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<style type="text/css">
			* {
				-ms-text-size-adjust:100%;
				-webkit-text-size-adjust:none;
				-webkit-text-resize:100%;
				text-resize:100%;
			}
			a{
				outline:none;
				color:#40aceb;
				text-decoration:underline;
			}
			a:hover{text-decoration:none !important;}
			.nav a:hover{text-decoration:underline !important;}
			.title a:hover{text-decoration:underline !important;}
			.title-2 a:hover{text-decoration:underline !important;}
			.btn:hover{opacity:0.8;}
			.btn a:hover{text-decoration:none !important;}
			.btn{
				-webkit-transition:all 0.3s ease;
				-moz-transition:all 0.3s ease;
				-ms-transition:all 0.3s ease;
				transition:all 0.3s ease;
			}
			table td {border-collapse: collapse !important;}
			.ExternalClass, .ExternalClass a, .ExternalClass span, .ExternalClass b, .ExternalClass br, .ExternalClass p, .ExternalClass div{line-height:inherit;}
			@media only screen and (max-width:500px) {
				table[class="flexible"]{width:100% !important;}
				table[class="center"]{
					float:none !important;
					margin:0 auto !important;
				}
				*[class="hide"]{
					display:none !important;
					width:0 !important;
					height:0 !important;
					padding:0 !important;
					font-size:0 !important;
					line-height:0 !important;
				}
				td[class="img-flex"] img{
					width:100% !important;
					height:auto !important;
				}
				td[class="aligncenter"]{text-align:center !important;}
				th[class="flex"]{
					display:block !important;
					width:100% !important;
				}
				td[class="wrapper"]{padding:0 !important;}
				td[class="holder"]{padding:30px 15px 20px !important;}
				td[class="nav"]{
					padding:20px 0 0 !important;
					text-align:center !important;
				}
				td[class="h-auto"]{height:auto !important;}
				td[class="description"]{padding:30px 20px !important;}
				td[class="i-120"] img{
					width:120px !important;
					height:auto !important;
				}
				td[class="footer"]{padding:5px 20px 20px !important;}
				td[class="footer"] td[class="aligncenter"]{
					line-height:25px !important;
					padding:20px 0 0 !important;
				}
				tr[class="table-holder"]{
					display:table !important;
					width:100% !important;
				}
				th[class="thead"]{display:table-header-group !important; width:100% !important;}
				th[class="tfoot"]{display:table-footer-group !important; width:100% !important;}
			}
		</style>
	</head>
	<body style="margin:0; padding:0;" bgcolor="#eaeced">
		<table style="min-width:320px;" width="100%" cellspacing="0" cellpadding="0" bgcolor="#eaeced">
			<!-- fix for gmail -->
			<tr>
				<td class="hide">
					<table width="700" cellpadding="0" cellspacing="0" style="width:500px !important;">
						<tr>
							<td style="min-width:500px; font-size:0; line-height:0;">&nbsp;</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td class="wrapper" style="padding:0 10px;">
					<!-- module 1 -->
					<table data-module="module-1" data-thumb="thumbnails/01.png" width="100%" cellpadding="0" cellspacing="0">
						<tr>
							<td data-bgcolor="bg-module" bgcolor="#eaeced">
								
							</td>
						</tr>
					</table>
					<!-- module 2 -->
					<table data-module="module-2" data-thumb="thumbnails/02.png" width="100%" cellpadding="0" cellspacing="0">
						<tr>
							<td data-bgcolor="bg-module" bgcolor="#eaeced">
								<table class="flexible" width="700" align="center" style="margin:0 auto;" cellpadding="0" cellspacing="0">
									
									<tr>
										<td data-bgcolor="bg-block" class="holder" style="padding:58px 60px 0px;" bgcolor="#f9f9f9">
											<table width="100%" cellpadding="0" cellspacing="0">
												<tr>
													<td data-color="title" data-size="size title" data-min="25" data-max="45" data-link-color="link title color" data-link-style="text-decoration:none; color:#292c34;" class="title" align="center" style="font:20px/10px Arial, Helvetica, sans-serif; color:#292c34; padding:0 0 24px;">
														
													</td>
												</tr>
											</table>
										</td>
									</tr>
										<tr style="background: rgb(249, 249, 249);">
										<td class="img-flex" style="text-align: center;"><img src="https://iscoutyou.com/images/logoooo.png" style="vertical-align:top;" width="66%" height="100" alt="" /></td>
									</tr>
									<tr style="background: rgb(249, 249, 249);"><td height="28"></td></tr>
								</table>
							</td>
						</tr>
					</table>
					<!-- module 3 -->
					<table data-module="module-3" data-thumb="thumbnails/03.png" width="100%" cellpadding="0" cellspacing="0">
						<tr>
							<td data-bgcolor="bg-module" bgcolor="#eaeced">
								<table class="flexible" width="700" align="center" style="margin:0 auto;" cellpadding="0" cellspacing="0">
									<tr>
										<td data-bgcolor="bg-block" class="holder" style="padding:30px 60px 50px;" bgcolor="#f9f9f9">
											<table width="100%" cellpadding="0" cellspacing="0">
												<tr>
													<td data-color="title" data-size="size title" data-min="20" data-max="40" data-link-color="link title color" data-link-style="text-decoration:none; color:#292c34;" class="title" align="center" style="font:20px/10px Arial, Helvetica, sans-serif; color:#292c34; padding:0 0 24px; text-align: left;">
														Hi! ' .$namee. '
													</td>
												</tr>
												<tr>
													<td data-color="text" data-size="size text" data-min="10" data-max="26" data-link-color="link text color" data-link-style="font-weight:bold; text-decoration:underline; color:#40aceb;" align="center" style="font:15px/29px Arial, Helvetica, sans-serif; color:#000; padding:0 0 21px;">
														You forgot your password. No worries, it happens to the best of us. Just click bellow <br>
														iScoutYou Sports Recruiting Network
													</td>
												</tr>
												<tr>
													<td style="padding:0 0 20px;">
														<table width="134" align="center" style="margin:0 auto;" cellpadding="0" cellspacing="0">
															<tr>
																<td data-bgcolor="bg-button" data-size="size button" data-min="10" data-max="16" class="btn" align="center" style="font:12px/14px Arial, Helvetica, sans-serif; color:#f8f9fb; text-transform:uppercase; mso-padding-alt:12px 10px 10px; border-radius:2px;" bgcolor="#00e100">
									<a  style="text-decoration:none; color:#f8f9fb; display:block; padding:12px 10px 10px;" href="http://iscoutyou.com/iscoutyou/updatepassword?id=' .$idd. '">Reset Password</a>
																</td>
															</tr>
															
														</table>
													</td>
												</tr>
												<tr>
			 										<td data-color="title" data-size="size title" data-min="20" data-max="40" data-link-color="link title color" data-link-style="text-decoration:none; color:#292c34;" class="title" align="center" style="font:20px/10px Arial, Helvetica, sans-serif; color:#292c34; padding:30px 0 24px; text-align: left;"><img src="https://iscoutyou.com/images/roni.png" style="vertical-align:top;"width="20%" height="34% alt="" />
<img src="https://iscoutyou.com/images/roni2.png" style="vertical-align:top;     margin-left: 0%;
    margin-top: 4%;"width="47%" height="34% alt="" />																									
													</td>
												</tr>
												<tr>
													<td data-color="title" data-size="size title" data-min="20" data-max="40" data-link-color="link title color" data-link-style="text-decoration:none; color:#292c34;" class="title" align="center" style="font:13px/10px Arial, Helvetica, sans-serif; color:#292c34; padding:8px 0 24px; text-align: left;">P.S Perhaps it was by mistake. No big deal, you can safely disregard this email
													</td>
												</tr>
											</table>
										</td>
									</tr>
									<tr><td height="28"></td></tr>
								</table>
							</td>
						</tr>
					</table>
					<!-- module 4 -->
					<!-- module 5 -->
					<!-- module 6 -->
					<!-- module 7 -->
				</td>
			</tr>
			<!-- fix for gmail -->
			<tr>
				<td style="line-height:0;"><div style="display:none; white-space:nowrap; font:15px/1px courier;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div></td>
			</tr>
		</table>
	</body>
</html>',true);
         $this->email->set_mailtype("html");
		 $done = $this->email->send();
   
         //Send mail 
         if($done) 
         {
       // echo "heelo";
       	$this->session->set_flashdata("updatedd","Your Email Is Submitted Successfully So Please Check Your Email"); 
        	redirect('Iscoutyou/forgotpasswordcoach');
        
         }
         }
         else
         {
            $this->session->set_flashdata("error","Please Use Another Email"); 
        	redirect('Iscoutyou/forgotpasswordcoach');
         }
         
			
			
//			
		
	}
		public function sendforgotpasswordemail1()
	{
	     $from_email = "contact@iscoutyou.com"; 
         $to_email = $this->input->post('email'); 
         $data['email1']=$this->Academic_info_model->allemail1();
         for($i=0;$i<count($data['email1']);$i++)
         {
         $fg[]=$data['email1'][$i]['email'];
         }
         if (in_array($to_email, $fg))
         {
         $data['id']=$this->Academic_info_model->getid1($to_email);
        // print_r($data['id']);
         $fg=$data['id'][0]['user_id'];
         $usernameee=$data['id'][0]['username'];
		 
         $idd=base64_encode($fg);
         //Load email library 
         $this->load->library('email'); 
   
         $this->email->from($from_email, 'Iscoutyou Password'); 
         $this->email->to($to_email);
         $this->email->subject('Reset Your Iscoutyou Password'); 
        

//$link="<a href='http://iscoutyou.com/iscoutyou/updatepassword'/'.$to_email.">Click Here</a>'"; 
//$link = "Click on this link - http://iscoutyou2.com/iscoutyou/updatepassword1?id=$idd";
//$link = 'Click on this link -'. base_url().'/iscoutyou/updatepassword?id='.$idd;
$this->email->message('
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Internal_email-29</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<style type="text/css">
			* {
				-ms-text-size-adjust:100%;
				-webkit-text-size-adjust:none;
				-webkit-text-resize:100%;
				text-resize:100%;
			}
			a{
				outline:none;
				color:#40aceb;
				text-decoration:underline;
			}
			a:hover{text-decoration:none !important;}
			.nav a:hover{text-decoration:underline !important;}
			.title a:hover{text-decoration:underline !important;}
			.title-2 a:hover{text-decoration:underline !important;}
			.btn:hover{opacity:0.8;}
			.btn a:hover{text-decoration:none !important;}
			.btn{
				-webkit-transition:all 0.3s ease;
				-moz-transition:all 0.3s ease;
				-ms-transition:all 0.3s ease;
				transition:all 0.3s ease;
			}
			table td {border-collapse: collapse !important;}
			.ExternalClass, .ExternalClass a, .ExternalClass span, .ExternalClass b, .ExternalClass br, .ExternalClass p, .ExternalClass div{line-height:inherit;}
			@media only screen and (max-width:500px) {
				table[class="flexible"]{width:100% !important;}
				table[class="center"]{
					float:none !important;
					margin:0 auto !important;
				}
				*[class="hide"]{
					display:none !important;
					width:0 !important;
					height:0 !important;
					padding:0 !important;
					font-size:0 !important;
					line-height:0 !important;
				}
				td[class="img-flex"] img{
					width:100% !important;
					height:auto !important;
				}
				td[class="aligncenter"]{text-align:center !important;}
				th[class="flex"]{
					display:block !important;
					width:100% !important;
				}
				td[class="wrapper"]{padding:0 !important;}
				td[class="holder"]{padding:30px 15px 20px !important;}
				td[class="nav"]{
					padding:20px 0 0 !important;
					text-align:center !important;
				}
				td[class="h-auto"]{height:auto !important;}
				td[class="description"]{padding:30px 20px !important;}
				td[class="i-120"] img{
					width:120px !important;
					height:auto !important;
				}
				td[class="footer"]{padding:5px 20px 20px !important;}
				td[class="footer"] td[class="aligncenter"]{
					line-height:25px !important;
					padding:20px 0 0 !important;
				}
				tr[class="table-holder"]{
					display:table !important;
					width:100% !important;
				}
				th[class="thead"]{display:table-header-group !important; width:100% !important;}
				th[class="tfoot"]{display:table-footer-group !important; width:100% !important;}
			}
		</style>
	</head>
	<body style="margin:0; padding:0;" bgcolor="#eaeced">
		<table style="min-width:320px;" width="100%" cellspacing="0" cellpadding="0" bgcolor="#eaeced">
			<!-- fix for gmail -->
			<tr>
				<td class="hide">
					<table width="700" cellpadding="0" cellspacing="0" style="width:500px !important;">
						<tr>
							<td style="min-width:500px; font-size:0; line-height:0;">&nbsp;</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td class="wrapper" style="padding:0 10px;">
					<!-- module 1 -->
					<table data-module="module-1" data-thumb="thumbnails/01.png" width="100%" cellpadding="0" cellspacing="0">
						<tr>
							<td data-bgcolor="bg-module" bgcolor="#eaeced">
								
							</td>
						</tr>
					</table>
					<!-- module 2 -->
					<table data-module="module-2" data-thumb="thumbnails/02.png" width="100%" cellpadding="0" cellspacing="0">
						<tr>
							<td data-bgcolor="bg-module" bgcolor="#eaeced">
								<table class="flexible" width="700" align="center" style="margin:0 auto;" cellpadding="0" cellspacing="0">
									
									<tr>
										<td data-bgcolor="bg-block" class="holder" style="padding:58px 60px 0px;" bgcolor="#f9f9f9">
											<table width="100%" cellpadding="0" cellspacing="0">
												<tr>
													<td data-color="title" data-size="size title" data-min="25" data-max="45" data-link-color="link title color" data-link-style="text-decoration:none; color:#292c34;" class="title" align="center" style="font:20px/10px Arial, Helvetica, sans-serif; color:#292c34; padding:0 0 24px;">
														 
													</td>
												</tr>
											</table>
										</td>
									</tr>
									<tr style="background: rgb(249, 249, 249);">
										<td class="img-flex" style="text-align: center;"><img src="https://iscoutyou.com/images/logoooo.png" style="vertical-align:top;" width="66%" height="100" alt="" /></td>
									</tr>
									<tr style="background: rgb(249, 249, 249);"><td height="28"></td></tr>
								</table>
							</td>
						</tr>
					</table>
					<!-- module 3 -->
					<table data-module="module-3" data-thumb="thumbnails/03.png" width="100%" cellpadding="0" cellspacing="0">
						<tr>
							<td data-bgcolor="bg-module" bgcolor="#eaeced">
								<table class="flexible" width="700" align="center" style="margin:0 auto;" cellpadding="0" cellspacing="0">
									<tr>
										<td data-bgcolor="bg-block" class="holder" style="padding:30px 60px 50px;" bgcolor="#f9f9f9">
											<table width="100%" cellpadding="0" cellspacing="0">
												<tr>
													<td data-color="title" data-size="size title" data-min="20" data-max="40" data-link-color="link title color" data-link-style="text-decoration:none; color:#292c34;" class="title" align="center" style="font:20px/10px Arial, Helvetica, sans-serif; color:#292c34; padding:0 0 24px; text-align: left;">
														Hi! ' .$namee. '
													</td>
												</tr>
												<tr>
													<td data-color="text" data-size="size text" data-min="10" data-max="26" data-link-color="link text color" data-link-style="font-weight:bold; text-decoration:underline; color:#40aceb;" align="center" style="font:15px/29px Arial, Helvetica, sans-serif; color:#000; padding:0 0 21px;">
														You forgot your password. No worries, it happens to the best of us. Just click bellow <br>
														iScoutYou Sports Recruiting Network
													</td>
												</tr>
												<tr>
													<td style="padding:0 0 20px;">
														<table width="134" align="center" style="margin:0 auto;" cellpadding="0" cellspacing="0">
															<tr>
																<td data-bgcolor="bg-button" data-size="size button" data-min="10" data-max="16" class="btn" align="center" style="font:12px/14px Arial, Helvetica, sans-serif; color:#f8f9fb; text-transform:uppercase; mso-padding-alt:12px 10px 10px; border-radius:2px;" bgcolor="#00e100">
									<a  style="text-decoration:none; color:#f8f9fb; display:block; padding:12px 10px 10px;" href="http://iscoutyou.com/iscoutyou/updatepassword1?id=' .$idd. '">Reset Password</a>
																</td>
															</tr>
															
														</table>
													</td>
												</tr>
												<tr>
													<td data-color="title" data-size="size title" data-min="20" data-max="40" data-link-color="link title color" data-link-style="text-decoration:none; color:#292c34;" class="title" align="center" style="font:20px/10px Arial, Helvetica, sans-serif; color:#292c34; padding:30px 0 24px; text-align: left;"><img src="https://iscoutyou.com/images/roni.png" style="vertical-align:top;" width="20%" height="34%" alt="" />
										<img src="https://iscoutyou.com/images/roni2.png" style="vertical-align:top;     margin-left: 0%;
    margin-top: 4%;" width="47%" height="37%" alt="" />												
													</td>
												</tr>
												<tr>
													<td data-color="title" data-size="size title" data-min="20" data-max="40" data-link-color="link title color" data-link-style="text-decoration:none; color:#292c34;" class="title" align="center" style="font:13px/10px Arial, Helvetica, sans-serif; color:#292c34; padding:8px 0 24px; text-align: left;">P.S Perhaps it was by mistake. No big deal, you can safely disregard this email
													</td>
												</tr>
											</table>
										</td>
									</tr>
									<tr><td height="28"></td></tr>
								</table>
							</td>
						</tr>
					</table>
					<!-- module 4 -->
					<!-- module 5 -->
					<!-- module 6 -->
					<!-- module 7 -->
				</td>
			</tr>
			<!-- fix for gmail -->
			<tr>
				<td style="line-height:0;"><div style="display:none; white-space:nowrap; font:15px/1px courier;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div></td>
			</tr>
		</table>
	</body>
</html>',true);
//$this->email->message($link);
         $this->email->set_mailtype("html");
		 $done = $this->email->send();
   
         //Send mail 
         if($done) 
         {
       // echo "heelo";
       	$this->session->set_flashdata("updatedd","Your Email Is Submitted Successfully So Please Check Your Email"); 
        	redirect('Iscoutyou/forgotpasswordcoach1');
        
         }
         }
         else
         {
            $this->session->set_flashdata("error","Please Use Another Email"); 
        	redirect('Iscoutyou/forgotpasswordcoach1');
         }
         
			
			
//			
		
	}
	public function coach_loggedin()
	{
	        $data['coach_info'] = $this->Login_model->coach_loggedin();
			
	        if($data['coach_info'])
			{
				
				$this->session->set_userdata('id',$data['coach_info']['id']);
				$this->session->set_userdata('sports_id',$data['coach_info']['sports_id']);
				redirect('Iscoutyou/all_athelte');
			}
			else
	        {
			 $this->session->set_flashdata('message','Please enter a correct username and password. Note that both fields may be case-sensitive');
			 redirect('Iscoutyou/coach_login');
		    }

	}
	public function all_athelte()
	{
		if($this->session->userdata('sports_id'))
		{
			
	    $login_coach_id = $this->session->userdata('id');
        $data['get_login_coach_info'] = $this->Academic_info_model->get_login_coach_info($login_coach_id);	
		$this->load->view('dashboard_view_1',$data);
		$data['all_athelte'] = $this->Academic_info_model->all_athelte();
		$this->load->view('all_athelte',$data);	
		}
	    	
	}

	public function coach_send_email()
	{	
		    $this->load->library('email');
			$this->email->to($_POST['admin_email']);
			$this->email->from($_POST['coach_new_email']);
			$this->email->subject($_POST['subject']);
			$this->email->message($_POST['message']);
			$this->email->set_mailtype("html");
			$done = $this->email->send();
			if($done)
			{	
	         $this->session->set_userdata('new_message','Your email has been send successfully.');
			}
	}
	
	public function athelte_info_show($id=null)
	{
		if($id)
		{
		$login_coach_id = $this->session->userdata('id');
		$data['get_login_coach_info'] = $this->Academic_info_model->get_login_coach_info($login_coach_id);
		$this->load->view('dashboard_view_1',$data);
		$data['athelte_info_for_coach'] = $this->Academic_info_model->athelte_info_for_coach($id);
		$data['Academic_info_model_school_for_coach'] = $this->Academic_info_model->Academic_info_model_school_for_coach($id);
		$data['Academic_info_model_award_for_coach'] = $this->Academic_info_model->Academic_info_model_award_for_coach($id);
		$data['Academic_info_model_achivement_for_coach'] = $this->Academic_info_model->Academic_info_model_achivement_for_coach($id);
		$data['get_athlete_history_for_coach'] = $this->Academic_info_model->get_athlete_history_for_coach($id);
		$game_id = $data['athelte_info_for_coach']['games'];
	    $pos_id = $data['athelte_info_for_coach']['position_id'];
		$data['get_game_for_coach'] = $this->Academic_info_model->get_game_for_coach($game_id);
		$data['getting_overall_for_coach'] = $this->Academic_info_model->getting_overall_for_coach($game_id,$pos_id);
		$data['getting_stats_value_for_coach'] = $this->Academic_info_model->getting_stats_value_for_coach($game_id,$pos_id,$id);
        $data['video_get_for_coach'] = $this->Academic_info_model->video_get_for_coach($id);
        $data['blast_email_open'] = $this->Academic_info_model->blast_email_open($id);
        $data['club_season_history'] = $this->Academic_info_model->club_season_history($id);
		$data['coach_information'] = $this->Academic_info_model->coach_information($id);
        $data['honor_get'] = $this->Academic_info_model->Academic_info_model_honorget($id);		
		$this->load->view('athelte_info_show',$data);	
		}
	}
	public function email_sent()
	{
		
		
		date_default_timezone_set('Asia/Bangkok');
		$data['get_percentage'] = $this->Academic_info_model->getting_all_percentage();		
		$count_all_percentage=$data['get_percentage'][0]['percentage1']+$data['get_percentage'][0]['percentage2']+$data['get_percentage'][0]['percentage3'];
		$cnt_percentage=$count_all_percentage;
		$id = $this->session->userdata('user_idd');
		$athelte_info_for_coach = $this->Academic_info_model->athelte_info_for_coach($id);
		
		$first_name = $athelte_info_for_coach['first_name'];
		$last_name = $athelte_info_for_coach['last_name'];
		$state = $athelte_info_for_coach['state'];
		$data['athletes_info'] = $this->Academic_info_model->athlete_infoview($id);
		$get_position_name=$data['athletes_info']['position_id'];
		$get_position_names = $this->Academic_info_model->get_position_name_acc_to_position($get_position_name);
		$position_name = $get_position_names['positions'];
		
		if($cnt_percentage>=90)
		{
			
		$my_arr = array($_POST['main_coach'],$_POST['assis_coach']);
		//$my_arr = array('gurjeet@codenomad.net','nehajoshi@codenomad.net');
		for($i=0;$i<count($my_arr);$i++)
		{
			if($my_arr[$i])
			{
		  $content='<div class="outer-email" style="width:80%; border:1px solid #000; margin: 0; padding: 28px;background: #fff; color: #000; font-family:Open Sans, sans-serif;font-size: 18px; text-align: justify;"><img src="https://isportsrecruiting.com/images/black-logo.png" alt="isr_logo" height="63" width="88">'.$_POST['part_first'].'</h3><h3>'.$_POST['second_part'].'</h3><h3 class ="email-con" style="font-size: 18px;   line-height: 24px; font-weight: 600;">'.$_POST['third_part']." "."<b>".$_POST['fourth_part']."</b>"." ".$_POST['fifth_part'].'</h3><h3 style="font-size:18px;font -weight:600;">'.$_POST['sixth_part'].'</h3></div>';
			$this->load->library('email');
			$this->email->to($my_arr[$i]);
			//$this->email->to('rashmi@codenomad.net');
			$this->email->from('studentathlete@isportsrecruiting.com','iSportsRecruiting Student Athlete');
			$this->email->subject($first_name.' '.$last_name.','.$position_name.', '.$state.', '.'GPA/'.''.$_POST['hidden_gpa']);
			$this->email->message($content);
			$this->email->set_mailtype("html");
			$done[] = $this->email->send();
			}
		}
		if($done)
		{
		    $id = $this->session->userdata('user_idd');
		   //$_POST['university_id'];die;
		     $uni_id =  $_POST['university_id'];
		   
		  $coach_email =  $_POST['main_coach'];
	  $data['indiviual_email_insert'] = $this->Academic_info_model->indiviual_email_insert($uni_id);
	  
	  $data['find_colleges']=$this->Profile_model->find_colleges_counts1($id);
	    $sport_id= $data['find_colleges'];
   $data = array(
        'sports_id'=>$sport_id,
        'university_id'=>$uni_id,
		'coach_email'=>$coach_email,
		'user_id'=>$id,
		'email_count'=>'1',
		'email_show'=>'0',
    );
	
	     $insert_success['complete']=$this->Profile_model->insert_db($data,$id,$uni_id);
		 if($insert_success){
				echo "1";
		 }
	}
	}
	}
	public function total_ind_email_sent()
	{
		$suer_id = $this->session->userdata('user_idd');
		$data['getting_univer_indiviual'] = $this->Academic_info_model->getting_univer_indiviual();
		$datadd = $this->Academic_info_model->getting_univer_indiviual();
		$data['get_all_uni_emails_counts'] = $this->Academic_info_model->total_indiviual_no_email($suer_id);		
		$data['get_all_uni_counts'] = $this->Academic_info_model->get_all_uni_counts($suer_id);		
		$datasi = $this->Academic_info_model->all_uni_of_email();
		 for($i=0;$i<count($datasi);$i++)
			{				
				 $univer_id = $datasi[$i]['university_id'];								
				 $this->db->select('STATE,UNIVERSITY');
				 $this->db->from('university');
				 $this->db->where('ID',$univer_id);
				 $query = $this->db->get();
				 $athlete_infos[] = $query->row_array();             		
				 
			}			
		
			for ($k=0;$k<count($athlete_infos);$k++)
			{
				 $athlete_infos[$k]['count'] = $data['get_all_uni_emails_counts'][$k]['email_count'];
			}
			$data['send_all_data'] = $athlete_infos;	
		
		$this->load->view('header');
		$this->load->view('total_ind_email_sent',$data);
		$this->load->view('footer');
	}
	
	public function homepage()
	{

	if($this->session->userdata('user_idd'))
	{
	redirect('iscoutyou/profile');
	}
	else if($this->session->userdata('sports_id'))
	{
		redirect('Iscoutyou/all_athelte');
	}
	else{
		$data['getall_sports_home'] = $this->Academic_info_model->getall_sports_home();
		$data['get_blogs'] = $this->Admin_info_model->get_blogs();
		
		$this->load->view('homepage',$data);
		$this->load->view('footer');
		}
	}
	public function allblogs()
	{   
	 $data['get_blogs'] = $this->Admin_info_model->get_allblogs();
		 if($data['get_blogs'])
		 {
		 $this->load->view('header_main');
		 $this->load->view('allblogs_frontend',$data);
	     $this->load->view('footer');
		 }
		 else{
		 $this->load->view('allblogs');
		 }
	}
	public function all_sports()
	{
		$this->load->view('header_main');
		$this->load->view('all_sports');
		$this->load->view('footer');
	}
	public function errorpage()
	{
		$this->load->view('error404'); 		
	}
	public function sports_detail($name=null)
	{
		$idarray =  $this->Academic_info_model->get_sports_id($name);
		//print_r($idarray );die;
		$id= $idarray['id'];//28
		if($id)
	    {	
		        $data['sporty'] = $this->Academic_info_model->sports_detail($id);
				//echo "<pre>";
				//print_r($data['sporty']);die;
		        $data['seo'] = $this->Academic_info_model->sports_seodetail($id);
				$data['name'] = $name;
				$data['get_sports_name'] = $this->Academic_info_model->get_sports_name($id);
				$this->load->view('header_main',$data);
				if($data)
				{
					$this->load->view('sports_detail',$data);
				}
				$this->load->view('footer');
			
		}
		else
		{
			// $this->output->set_status_header('404');
			$this->load->view('error404'); 
		}
	
	}
	public function terms_conditions()
	{
		$this->load->view('header_main');
		$this->load->view('terms_conditions');
		$this->load->view('footer');
	}
	
	
	public function view_profileexample()
	{
		//if(!$this->session->userdata('user_id'))
			
	//	{
			//redirect();
	//	}
	   // else
	   // {
		    //$user_id = $this->session->userdata('user_id');
		    $user_id=$this->uri->segment('2');
			$this->load->view('header');
			$data['athletes_info'] = $this->Academic_info_model->athlete_info();
			$data['academic_info'] = $this->Academic_info_model->Academic_info_model_school();
			$data['awards_info'] = $this->Academic_info_model->Academic_info_model_award();
			$data['achivement_info'] = $this->Academic_info_model->Academic_info_model_achivement();
			$data['athlete_history_info'] = $this->Academic_info_model->get_athlete_history();
			$game_id = $data['athletes_info']['games'];
			$pos_id = $data['athletes_info']['position_id'];
			$data['get_game'] = $this->Academic_info_model->get_game($game_id);			
			$data['getting_overall'] = $this->Academic_info_model->getting_overall($game_id,$pos_id);						
			$data['getting_stats_value'] = $this->Academic_info_model->getting_stats_value($game_id,$pos_id);						
			$data['video_get'] = $this->Academic_info_model->video_get();	
            $data['club_season_history'] = $this->Academic_info_model->club_season_history($user_id);
		    $data['coach_information'] = $this->Academic_info_model->coach_information($user_id);	
            $data['honor_get'] = $this->Academic_info_model->Academic_info_model_honorget($user_id);			
		    $this->load->view('view_profile',$data);
			$this->load->view('footer');
	  //  }
	}
	public function view_profile()
	{
		
		
		   $id = $this->session->userdata('user_idd');
		    if($id)
		    {
		        	$this->load->view('header');
		    }
		    else
		    {
		        	$this->load->view('headerwithoulogin');
		    }
		     $user_id=$this->uri->segment('2');
		     $this->session->set_userdata('find',$user_id);
		      $em = $_GET['em'];
		      $uid = $_GET['uid'];
			 if($em ==1)
			 {
				 $update_email=array('email_show'=>$em);					
					$this->db->where('user_id',$id);
					$this->db->where('university_id',$uid);
					$this->db->update('athlete_email_count',$update_email);
			 } 
			 
					 
		
			$data['athletes_info'] = $this->Academic_info_model->athlete_infoview($user_id);
			$get_position_name=$data['athletes_info']['position_id'];
			$data['get_position_name'] = $this->Academic_info_model->get_position_name_acc_to_position($get_position_name);
			
			$data['academic_info'] = $this->Academic_info_model->Academic_info_model_schoolview($user_id);
			$data['awards_info'] = $this->Academic_info_model->Academic_info_model_awardview($user_id);
			$data['achivement_info'] = $this->Academic_info_model->Academic_info_model_achivementview($user_id);
			$data['athlete_history_info'] = $this->Academic_info_model->get_athlete_historyview($user_id);
			$data['find_colleges']=$this->Profile_model->find_colleges_count('athletes_profile');
			
			$data['count']= count($data['find_colleges']);			
			$game_id = $data['athletes_info']['games'];
			$pos_id = $data['athletes_info']['position_id'];
			$data['get_game'] = $this->Academic_info_model->get_game($game_id);			
			$data['getting_overall'] = $this->Academic_info_model->getting_overall($game_id,$pos_id);						
			$data['getting_stats_value'] = $this->Academic_info_model->getting_stats_value($game_id,$pos_id,$user_id);						
			$data['video_get'] = $this->Academic_info_model->video_get($user_id);	
            $data['club_season_history'] = $this->Academic_info_model->club_season_history($user_id);
		    $data['coach_information'] = $this->Academic_info_model->coach_information($user_id);	
            $data['honor_get'] = $this->Academic_info_model->Academic_info_model_honorget($user_id);			
		    $this->load->view('view_profile',$data);
			$this->load->view('footer');
	  
	}
	
	
	public function free_profile_view() ///view before the id in the url
	{
			
	   $id=$this->session->userdata('user_idd');
	   $regid=$this->session->userdata('userriddd');
	  if($regid){
		   $this->load->view('free_header');
       }
	   
      else if($id){
            $this->load->view('free_header2');
       } 
       else
       {
           $this->load->view('headerforview');
       }
	     $id3 = $this->uri->segment('2');
	  // $id3=$this->session->userdata('user_idd');
	
	       $this->session->set_userdata('userdata',$id3);
	      //$this->load->view('free_header');
	      $user_id = $this->session->userdata('userdata');
	        //$data['athletes_info'] = $this->Academic_info_model->free_profile_athlete_info1();			
	        $data['athletes_info'] = $this->Academic_info_model->get_all_profile_data();			
			
	        if(empty($data['athletes_info']))
			{
				
				$data['athletes_info'] = $this->Academic_info_model->get_all_profile_data_free();			
				
			}		 
			
			
	         $game_id = $data['athletes_info']['games'];
	     	 $pos_id = $data['athletes_info']['position_id'];
			
			$data['get_position_name'] = $this->Academic_info_model->get_position_name_acc_to_position($pos_id);
			$data['get_game'] = $this->Academic_info_model->get_game_free_profile($game_id);			
			$data['getting_overall'] = $this->Academic_info_model->free_profile_getting_overall1($game_id,$pos_id);	
		
			$data['getting_stats_value'] = $this->Academic_info_model->free_profile_getting_stats_value1();
				
	    	$data['video_get'] = $this->Academic_info_model->free_video_get();	
	    
	    	$data['free_profile_get_athlete_history'] = $this->Academic_info_model->free_profile_get_athlete_history1();
	    	$data['athlete_history_info'] = $this->Academic_info_model-> free_profile_athletes_academic_info();
	    	 $data['club_season_history'] = $this->Academic_info_model->free_profile_club_season_history1($user_id);
	    	 $data['club_season_history'] = $this->Academic_info_model->club_season_history($user_id);
	    	
	    	 $data['coach_information'] = $this->Academic_info_model->coach_information($user_id);
	    	 
	    	 $data['academic_info'] = $this->Academic_info_model->Academic_info_model_school();
	    	  
	    	  $data['honor_get'] = $this->Academic_info_model->Academic_info_model_honorget($user_id);
	    	  $data['honor_get_roll'] = $this->Academic_info_model->free_profile_Academic_info_model_honorget();
	    	
	    	 $data['awards_info'] = $this->Academic_info_model->Academic_info_model_award();
			
			$data['achivement_info'] = $this->Academic_info_model->Academic_info_model_achivement();
			$data['find_colleges']=$this->Profile_model->find_colleges_countii('new_profile');		
	
		
		    $data['count']= count($data['find_colleges']);
			
			
	    	$this->load->view('free_profile_view',$data);
			$this->load->view('footer');
	   
	   	} 
		public function free_profile_view_profile()
	{
		if(!$this->session->userdata('userdata'))
		{
			redirect();
		}
	    else
	    {
			$user_id = $this->session->userdata('userdata');
			$this->load->view('header');
		//	$data['athletes_info'] = $this->Academic_info_model->athlete_info();
			$data['academic_info'] = $this->Academic_info_model->Academic_info_model_school();
			$data['awards_info'] = $this->Academic_info_model->Academic_info_model_award();
			$data['achivement_info'] = $this->Academic_info_model->Academic_info_model_achivement();
			$data['athlete_history_info'] = $this->Academic_info_model->get_athlete_history();
			$game_id = $data['athletes_info']['games'];
			$pos_id = $data['athletes_info']['position_id'];
			$data['get_game'] = $this->Academic_info_model->get_game($game_id);			
			$data['getting_overall'] = $this->Academic_info_model->getting_overall($game_id,$pos_id);						
			$data['getting_stats_value'] = $this->Academic_info_model->getting_stats_value($game_id,$pos_id);						
			$data['video_get'] = $this->Academic_info_model->video_get();	
            $data['club_season_history'] = $this->Academic_info_model->club_season_history($user_id);
		    $data['coach_information'] = $this->Academic_info_model->coach_information($user_id);	
            $data['honor_get'] = $this->Academic_info_model->Academic_info_model_honorget($user_id);			
		    $this->load->view('view_profile',$data);
			$this->load->view('footer');
	    }
	}
	
	public function send_blast_byselect()
	{
		
		$this->Profile_model->send_blastmail_byselect();
	}
	public function send_mail_tolessthen_sixtydays_withus()
	{
		$this->Profile_model->send_mail_tolessthen_sixtydays_withus();
	}
	
	public function Send_camp_contact()
	{
		$data = $this->Profile_model->send_camp_data();
	}
	public function find_colleges()
	{
	
		 $id = $this->session->userdata('user_idd');
		    if($id)
		    {
		        	$this->load->view('header');
		    }
		    else
		    {
		        	$this->load->view('headerwithoulogin');
		    }
		   // $this->load->view('header');
		$data['val_count']=$this->Profile_model->val_count_tick();
		
		
		  /************* when use the the script pagination then use find_colleges variable in the view otherwise tghe results in the view   *******/  
  
		$data['find_colleges']=$this->Profile_model->find_colleges_countii('athletes_profile');
		$data['count'] = count($data['find_colleges']);		
		$data['find_gpa']=$this->Profile_model->find_gpa('athletes_profile');
		$data["checkbox_disable"] = $this->Profile_model->checkbox_disable_check();
		
		
			$pagename = 'athletes_profile';
			$data['find_gpa']=$this->Profile_model->find_gpa($pagename);
		
		
		$config = array();
        $config["base_url"] = base_url() . "iscoutyou/find_colleges";
        $config["total_rows"] = $data['count'];
        $config["per_page"] = 50;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
       // echo $page;die;
	   
        $data["results"] = $this->Profile_model->
            find_colleges($config["per_page"], $page,$pagename);
			//print_r($data["results"]);die;
        $data["links"] = $this->pagination->create_links();
		
		$data["find_colleges1"] = $this->Admin_info_model->all_university1();
		
       	$this->load->view('find_colleges',$data);
			$this->load->view('footer');
		
		
	}
	
		public function find_collegeswithoutlogin()
	{
		
	  $this->session->set_userdata('findlogin','1');
		$id = $this->session->userdata('find');
	
		 $this->load->view('headerwithoulogin');
		    
		   // $this->load->view('header');
		$data['find_colleges']=$this->Profile_model->find_colleges_countwithoutlogin();
		$data['count']=count($data['find_colleges']);
			$data['find_gpa']=$this->Profile_model->find_gpawithoutlogin();
		//	$this->load->view('find_colleges',$data);
		//	$this->load->view('footer');
			
		// $this->load->view('header');	
		$config = array();
        $config["base_url"] = base_url() . "iscoutyou/find_colleges";
        $config["total_rows"] = $data['count'];
        $config["per_page"] = 50;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
      
        $data["results"] = $this->Profile_model->
            find_collegeswithoutlogin($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();

       	$this->load->view('find_colleges',$data);
			$this->load->view('footer');
		
		
	}
	public function university_info($uni_id=null)
	{
		//echo $uni_id;die;
       	$findid = $this->session->userdata('findlogin');
       	//echo $findid;die;
       	if($findid)
       	{
       	    	$this->load->view('headerwithoulogin');
       	}
       	else
       	{
       	    	//$this->load->view('header');
       	}
	 	$this->session->unset_userdata('new_univer_id');
		$this->session->set_userdata('new_univer_id',$uni_id); 
	//	$this->load->view('header');
		$data['university_info']=$this->Profile_model->university_info($uni_id);
		$data['find_gpa']=$this->Profile_model->find_gpa('athletes_profile');
		if(empty($data['find_gpa']))
		$data['find_gpa']=$this->Profile_model->find_gpa('new_profile');
		$data['athletes_info'] = $this->Academic_info_model->athlete_info();
		if(empty($data['athletes_info']))
		$data['athletes_info'] = $this->Academic_info_model->athlete_info1();
		
		$pos_id = $data['athletes_info']['position_id'];
		$data['position_name'] = $this->Academic_info_model->position_name($pos_id);
		//print_r($data['position_name']['sports_id']);die;
		$game_id_get = $data['position_name']['sports_id'];
		$data['university_contact_info']=$this->Profile_model->university_contact_info($uni_id,$game_id_get);
		$this->load->view('university_info',$data);
		//$this->load->view('footer');
	
	} 
	public function search_university_info($uni_id=null)
	{
		//echo $uni_id;die;
       	$findid = $this->session->userdata('findlogin');
       	//echo $findid;die;
       	if($findid)
       	{
       	    	$this->load->view('headerwithoulogin');
       	}
       	else
       	{
       	    	//$this->load->view('header');
       	}
	 	$this->session->unset_userdata('new_univer_id');
		$this->session->set_userdata('new_univer_id',$uni_id); 
	//	$this->load->view('header');
		$data['university_info']=$this->Profile_model->university_info($uni_id);
		
		$data['find_gpa']=$this->Profile_model->find_gpa('athletes_profile');
		
		if(empty($data['find_gpa']))
		$data['find_gpa']=$this->Profile_model->find_gpa('new_profile');
		$data['athletes_info'] = $this->Academic_info_model->athlete_info();
		if(empty($data['athletes_info']))
		$data['athletes_info'] = $this->Academic_info_model->athlete_info1();
		
		$pos_id = $data['athletes_info']['position_id'];
		$data['position_name'] = $this->Academic_info_model->position_name($pos_id);
		//print_r($data['position_name']['sports_id']);die;
		$game_id_get = $data['position_name']['sports_id'];
		$data['university_contact_info']=$this->Profile_model->university_contact_info($uni_id,$game_id_get);
		$this->load->view('university_info',$data);
		//$this->load->view('footer');
	
	} 
		public function free_profile_university_info($uni_id1=null)
	{
	    $id3=$this->session->userdata('user_idd');
	    if($id3)
	    {
	 	$this->session->unset_userdata('new_univer_id');
        $this->session->set_userdata('new_univer_id',$uni_id1);
		$this->load->view('free_header');
		$data['university_info']=$this->Profile_model->university_info1($uni_id1);
		$data['find_gpa']=$this->Profile_model->find_gpa1();
		$data['athletes_info'] = $this->Academic_info_model->athlete_info11();
    	$pos_id = $data['athletes_info']['position_id'];
		$data['position_name'] = $this->Academic_info_model->position_name($pos_id);
		$data['university_contact_info']=$this->Profile_model->university_contact_info($uni_id1);
		$this->load->view('university_info',$data);
		$this->load->view('footer');
	    }
	    else
	    {
	    $this->session->unset_userdata('new_univer_id');
        $this->session->set_userdata('new_univer_id',$uni_id1);
		$this->load->view('free_header');
		$data['university_info']=$this->Profile_model->university_info1($uni_id1);
		$data['find_gpa']=$this->Profile_model->find_gpa12();
		//print_r($data['find_gpa']);die;
		$data['athletes_info'] = $this->Academic_info_model->athlete_info112();
    	$pos_id = $data['athletes_info']['position_id'];
		$data['position_name'] = $this->Academic_info_model->position_name($pos_id);
		$data['university_contact_info']=$this->Profile_model->university_contact_info($uni_id1);
		$this->load->view('university_info',$data);
		$this->load->view('footer');
	    }
	    
	
	}
	
	   public function find_college_free_profile()
	{
		
	
		 $id = $this->session->userdata('user_idd');
		    if($id)
		    {
		        	$this->load->view('free_header2');
		    }
		    else
		    {
		        	$this->load->view('headerwithoulogin');
		    }
		   // $this->load->view('header');
		$data['val_count']=$this->Profile_model->val_count_tick();
		
		
		  /************* when use the the script pagination then use find_colleges variable in the view otherwise tghe results in the view   *******/  
  
		//$data['find_colleges']=$this->Profile_model->find_colleges_count('athletes_profile');
		//$data['find_colleges'] = $this->Profile_model->find_colleges_countii('athletes_profile');
		$data['find_colleges']=$this->Profile_model->find_colleges_countii('new_profile');
		 
		  
		$data['free']=false;
		if(empty($data['find_colleges']))
		{
			$data['find_colleges']=$this->Profile_model->find_colleges_countii('new_profile');
			$data['free']=true;
		}
	
		
		$data['count']= count($data['find_colleges']);		 
		$data['find_gpa']=$this->Profile_model->find_gpa('athletes_profile');
		if(empty($data['find_gpa']))
		{
			$pagename = 'new_profile';
		$data['find_gpa']=$this->Profile_model->find_gpa($pagename);
		}
		else {
			$pagename = 'athletes_profile';
			$data['find_gpa']=$this->Profile_model->find_gpa($pagename);
		}
		
		//	$this->load->view('find_colleges',$data);
		//	$this->load->view('footer');
			
		// $this->load->view('header');	
		$config = array();
        $config["base_url"] = base_url() . "iscoutyou/find_colleges";
        $config["total_rows"] = $data['count'];
        $config["per_page"] = 50;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
       // echo $page;die;
	   
        $data["results"] = $this->Profile_model->
            find_colleges($config["per_page"], $page,$pagename);
			//print_r($data["results"]);die;
        $data["links"] = $this->pagination->create_links();
		
		$data["find_colleges1"] = $this->Admin_info_model->all_university1();
       	$this->load->view('find_college_free_profile',$data);
			$this->load->view('footer');
		
		
	}
	
	
	public function profile_form()
	{
		echo $this->session->userdata('user_idd');
		print_r($_POST);
	}
	public function send_user_data()
	{
		
		$data = $this->Admin_info_model->all_free_user1();		
		$get_position_name = $data[0]['position_id'];
		$get_sports =  $data[0]['user_id'];		
		$get_sports_model = $this->Academic_info_model->get_free_sports_id($get_sports);
		$get_sports_model = $this->Academic_info_model->get_free_sports_id($get_sports);
		$game_id = $get_sports_model['games'];		
		$datas = $this->Academic_info_model->get_position_name_acc_to_position($get_position_name);	
		$pos_name = $datas['positions'];				
		$free_user_state = $this->Academic_info_model->free_user_stats($get_position_name,$game_id);
        $free_user_stat = $free_user_state['stats'] ;
		$free_user_stat_vals = $this->Academic_info_model->free_user_stat_val_for_admin($get_position_name,$game_id,$get_sports);
		$athlete_history_info = $this->Academic_info_model->free_profile_athletes_academic_infos($get_sports);
		$athlete_history_infos = $athlete_history_info['school'];
		$free_user_stat_val_data = $free_user_stat_vals['stats'];		
		$free_user_stat_val = $this->Academic_info_model->video_get_data_for_admin($get_sports);
		 $video_get = $free_user_stat_val['video1'];	
		$user_vid2 = $free_user_stat_val['video2'];		
		$free_athlet_history = $this->Academic_info_model->athlete_history_data_for_admin($get_sports);
		$year = $free_athlet_history[0]['year'];
		$highschool = $free_athlet_history[0]['highschool'];
		$descriptions = $free_athlet_history[0]['descriptions'];
		$free_club_history = $this->Academic_info_model->free_profile_get_club_record($get_sports);	
		$club_name = $free_club_history['club_name'];
		$competition_year = $free_club_history['competition_year'];		
	    $free_coch_ref_for_admin = $this->Academic_info_model->free_profile_coach_info_for_admin($get_sports);			
		$fre_user_coch_ref_name = $free_coch_ref_for_admin[0]['name']; 
		$fre_user_coch_ref_phone = $free_coch_ref_for_admin[0]['phone']; 
		$fre_user_coch_ref_email = $free_coch_ref_for_admin[0]['email']; 
		$fre_user_coch_ref_club  = $free_coch_ref_for_admin[0]['club_name'];
		$fre_prof_honor_foradmin = $this->Academic_info_model->fre_prof_Acad_info_honor_foradmin($get_sports);
		$honr_roll_year = $fre_prof_honor_foradmin[0]['year'];
		$honor_roll = $fre_prof_honor_foradmin[0]['honor_roll'];
		//$free_prof_award_foradm = $this->Academic_info_model->free_prof_Aca_award_foradmin($get_sports);
		//$free_prof_award_year = $free_prof_award_foradm[0]['year'];
		//$free_prof_award_award = $free_prof_award_foradm[0]['awards'];		
		//$free_prof_achivemt = $this->Academic_info_model->free_prof_Aca_achv_foradm($get_sports);
		//$free_pro_achv_year = $free_prof_achivemt[0]['year'];
		//$free_pro_achv_descip = $free_prof_achivemt[0]['descriptions'];
		$free_prof_achivemt = $this->Profile_model->find_colleges_count_freeprof_foradm($get_sports);
		$qualified_collegs_count = count($free_prof_achivemt);		
		$grad_year  = $data[0]['grad_year'];		
		$guardian1 = $data[0]['guardian1'];
		$g_first_name = $data[0]['g_first_name'];
		$g_last_name = $data[0]['g_last_name'];
		$g_phone = $data[0]['g_phone'];
		$g_mail = $data[0]['g_mail'];
		$guardian2 = $data[0]['guardian2'];
		$g2_first_name = $data[0]['g2_last_name'];
		$g2_phone = $data[0]['g2_phone'];
		$g2_mail = $data[0]['g2_mail'];
		$birthData = $data[0]['birth'];   
		$profile_image = $data[0]['image_profile'];		
		$img_profile = base_url().'uploads/'.$profile_image;	                            	  
	    $birthDate = explode("/", $birthData);							  
	    $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y") - $birthDate[2]) - 1) : (date("Y") - $birthDate[2]));	
			$data[0]['birth']= $age;
            $data[0]['image_profile'] = $img_profile;	
            $data[0]['positions'] = $pos_name;	
            $data[0]['stats'] = $free_user_stat;	
            $data[0]['stats_value'] = $free_user_stat_val_data;	
            $data[0]['vedio1'] = $video_get;
			$data[0]['vedio2'] = $user_vid2;	
			$data[0]['years'] = $year;	
			$data[0]['highschool'] = $highschool;	
			$data[0]['descriptions'] = $descriptions;
			$data[0]['club_names'] = $athlete_history_infos;	
			$data[0]['coch_ref_name'] = $fre_user_coch_ref_name;	
			$data[0]['coch_ref_phon'] = $fre_user_coch_ref_phone;	
			$data[0]['coch_ref_email'] = $fre_user_coch_ref_email;	
			$data[0]['coch_ref_club'] = $fre_user_coch_ref_club;	
			$data[0]['g_last_name'] = $g_last_name;	
			$data[0]['g_phone'] = $g_phone;	
			$data[0]['g_mail'] = $g_mail;	
			$data[0]['guardian2'] = $guardian2;	
			$data[0]['g2_first_name'] = $g2_first_name;	
			$data[0]['g2_phone'] = $g2_phone;	
			$data[0]['g2_mail'] = $g2_mail;	
			$data[0]['grad_year'] = $grad_year;	
			$data[0]['honor_roll'] = $honor_roll;	
			$data[0]['honr_roll_year'] = $honr_roll_year;	
			$data[0]['free_prof_award_year'] = $free_prof_award_year;	
			$data[0]['free_prof_award_award'] = $free_prof_award_award;
			$data[0]['free_pro_achv_year'] = $free_pro_achv_year;
			$data[0]['free_pro_achv_descip'] = $free_pro_achv_descip;
			$data[0]['qualified_collegs_count'] = $qualified_collegs_count;
				
			 
			
		echo json_encode($data);
		
	}
	
	
	
	public function login()
	{
		if($_POST)
		{
			 $data = $this->Login_model->login_query();
			 if(!empty($data))
			 {
				 //echo $data;die;
				$this->session->set_userdata('user_idd',$data);
				redirect('iscoutyou/profile');	
			 }
			 else
			 {
			 $this->session->set_flashdata('message','Please enter a correct username and password. Note that both fields may be case-sensitive');
			 redirect('Iscoutyou/login');
			 
			 
			 }	
		}
	    else
	    {
			$id = $this->session->userdata('user_idd');
			if($id)
			{
				redirect('iscoutyou/profile');				
			}
			else
			{
				$this->load->view('login');
			}
		}
	}
	public function thankyou()
	{
		$this->load->view('header_main');
		$this->load->view('thankyou');	
	}
	public function recruiting_coordinator() 
	{
		
		if(!$this->session->userdata('user_idd'))
	{
			redirect('iscoutyou/recruiting_coordinator');
	}
	else 
	{
		//print_r($_POST['valus']);
		$user_id = $this->session->userdata('user_idd');		
		$data['cordinator_details'] = $this->Login_model->get_recruiting_cordinator($user_id);
		$data['potentional_data'] = $this->Login_model->get_poteintional_cordinator($user_id);
	    $data['get_id'] = $this->Login_model->get_recruiting_cordi_athlets($user_id);				
	    $data['total_reffered'] = $this->Login_model->get_recruiting_cordi_athlets_count();		
	    $data['yearly_athelets'] = $this->Academic_info_model->get_cordinator_athlets_yearly();
	    $data['sports_name'] = $this->Academic_info_model->get_cordinator_athlets_sports();
	    $data['sports_name_for_free'] = $this->Academic_info_model->get_sports_name_forfree_rec_cordintr();	
	    $data['sports_name_for_paid'] = $this->Academic_info_model->get_sports_name_forpaid_rec_cordintr();	
	    $data['grad_year_free_user'] = $this->Academic_info_model->get_free_profile_leads_grad_year();		
	    $data['get_free_profile_leads'] = $this->Academic_info_model->get_free_profile_leads();	    		
		$ref_id = 	$data['get_id']['user_id'];		
		$data['get_recruiting_cordi_athlets'] = $this->Login_model->get_cordinator_athlets_data($ref_id);				
		$this->load->view('recriuting_dashboard');
		$this->load->view('recuiting_cordinator_add',$data);
	}
		
	}
		
	public function delete_potention_data(){
		
		
		 $user_id = $this->input->post('user_id');
		 $user_name =  $this->input->post('user_name');		 
		 $this->Academic_info_model->delete_potention_data($user_id,$user_name);
		 $this->session->set_flashdata('deleted','User deleted successfully');
		 redirect("iscoutyou/recruiting_coordinator");
	}
	public function delete_potention_notes(){
		
		
		  
		 $this->Academic_info_model->delete_potention_notes();
		 $this->session->set_flashdata('notes_deleted','Note deleted successfully');
		 redirect("iscoutyou/recruiting_coordinator");
	}
	public function add_rec_coordinator_data() 
	{
		
						
		$data = $this->Academic_info_model->add_potentional_data();
		
	}
	public function get_singe_row_data_potentioal()
 	{						
		
		$data = $this->Academic_info_model->get_singe_row_data_potentioal();
		echo json_encode($data);
	}
	public function update_singe_row_data_potentioal()
 	{						
		
		 $data = $this->Academic_info_model->update_singe_row_data_potentioal();
		 $this->session->set_flashdata('updated','Record Updated successfully');
		 redirect("iscoutyou/recruiting_coordinator");
	}
	public function add_rec_cordinator_note()
		{		
		  $data = $this->Academic_info_model->add_notes();
		  
		}
	public function recruiting_coordinator_login() 
	{
		
		if($_POST)
		{
			 $data = $this->Login_model->login_recruting_query();			 
			 if(!empty($data))
			 {
				 //echo $data;die;
				$this->session->set_userdata('user_idd',$data);
				redirect('iscoutyou/recruiting_coordinator');	
			 }
			 else
			 {
			 $this->session->set_flashdata('message','Please enter a correct username and password. Note that both fields may be case-sensitive');
			 redirect('Iscoutyou/recruiting_coordinator_login');
			 
			 
			 }	
		}
		else
	    {
			$id = $this->session->userdata('user_idd');
			if($id)
			{
				redirect('iscoutyou/recruiting_coordinator');				
			}
			else
			{
				$this->load->view('login_recruiting_cordinator');
			}
		}
		
		
		
		
	}
	public function profile()
	{
		if(!$this->session->userdata('user_idd'))
	{
			redirect();
	}
	   else
	{
		
		$id = $this->session->userdata('user_idd');
		$data['arr'] = $this->Login_model->getdata($id);
		if(empty($data['arr']))
		{
			
			$view = "free_profile_page";
			$data['arr'] = $this->Login_model->getdata1($id);
		}
		else {
			
			$view = "profile_page";
		}
		//$data['arr'] = $this->Login_model->getdata1($id);
		$game_id = $data['arr']['games'];
		$data['var'] = $this->Login_model->getgame($game_id);
		$get_pecentage_basic=$this->Academic_info_model->profile_percentage();
		
		$firstnameper1=$get_pecentage_basic['first_name'];
		$lastnameper1=$get_pecentage_basic['last_name'];		
		$weight=$get_pecentage_basic['weight'];
		$height=$get_pecentage_basic['height'];		
		$ncaa=$get_pecentage_basic['ncaa'];		
		$naia=$get_pecentage_basic['naia'];		
		$cel_phone=$get_pecentage_basic['cel_phone'];		
		$hs_grad_year=$get_pecentage_basic['hs_grad_year'];
		$gpa=$get_pecentage_basic['gpa'];
		$sat=$get_pecentage_basic['sat'];
		$act=$get_pecentage_basic['act'];
		$personal_statement=$get_pecentage_basic['personal_statement'];		
		$image_profile =$get_pecentage_basic['image_profile'];		
		$val1=0;
		if($firstnameper1)
		{
			$val1=$val1+2.5;
		}
		if($lastnameper1)
		{
			$val1=$val1+2.5;    
		}		
		if($weight)
		{
			$val1=$val1+2.5;
		}
		if($height)
		{
			$val1=$val1+2.5;   
		}
		if($ncaa)
		{
			$val1=$val1+2.5;    
		}
		if($naia)
		{
			
			$val1=$val1+2.5;
		}		
		if($cel_phone)
		{
			$val1=$val1+5;       
		}		
		if($hs_grad_year)
		{
			$val1=$val1+5;       
		}
		if($gpa)
		{
			$val1=$val1+10;       
		}
		if($sat)
		{
			$val1=$val1+2.5;      
		}
		if($act)
		{
			$val1=$val1+2.5;
		}
		if($personal_statement)     
		{
			$val1=$val1+10;
		}
		if($image_profile)         
		{
			$val1=$val1+5;
		}
		
		$percentage = $val1;	
		$val2=0;
		$data['res1'] = $this->Academic_info_model->update_basic_percentage11($percentage); 
		//$get_pecentage_basic=$this->Academic_info_model->profile_percentage_academic();
		
		$data['res'] = $this->Academic_info_model->Academic_info_model_school();	
             if($data['res'])
             {
               $val2=val2+5;
             }	
             $percentage2=$val2;
			
             $data['per'] = $this->Academic_info_model->update_acdemic_percentage($percentage2);
		
		$data['video_get'] = $this->Academic_info_model->video_get_percentage();
		//print_r($data['video_get']);die;
		$vid1=$data['video_get']['video1'];
		$vid2=$data['video_get']['video2'];
		$data['meet'] = $this->Academic_info_model->get_athlete_history();
		$data['generate_form'] = $this->Academic_info_model->generate_form();
		$val3=0;
		$data['generate_form_stats_value'] = $this->Academic_info_model->generate_form_stats_value();
		
		$stats = $data['generate_form_stats_value']['stats'];
		
		 $athlete_history = $data['meet'][0]['highschool'];
		 $video1 = $data['video_get']['video1'];
		if($stats)
		{
			 $val3=$val3+10;
		}
		if($athlete_history)
		{
		  $val3=$val3+5;
		}	
		
		if($video1)
		{
			$val3=$val3+25;
		}		
		$percentage3=$val3;
		$data['per_athlete'] = $this->Academic_info_model->update_athlete_percentage($percentage3);
		if($view=='free_profile_page')
		$data['get_all_data'] = $this->Academic_info_model->get_all_profile_data_free();
		else 
		$data['get_all_data'] = $this->Academic_info_model->get_all_profile_data();
		 $per1=$data['get_all_data']['percentage1'];
		 $per2=$data['get_all_data']['percentage2'];
		 $per3=$data['get_all_data']['percentage3'];
		 $full_percentage1=$per1+$per2+$per3;		 
		 $full_percentage = $full_percentage1;
		 if($full_percentage < 90)
		 {
			  $myarray = $data['arr'];
			 foreach($myarray as $key=>$value)
			{
				if($value == '')
				{
					$keynames[] = $key;	
							
				}	
				
			}
			  
			
			  
			 $data['grad_year'] = $this->Academic_info_model->Academic_info_model_school();
			
			
			 if (empty($data['grad_year']))
				{
					$empty_grad_year = 'GRADUATION YEAR';
				} 
				 
			
			$message ='<div class="ssds" style="width:100%; float: left; background: #f2f2f2;">
			  
			 <br>
	<div class="online-outer">
	<p class="online" style="width: 100%; text-align: center; font-size: 22px; color: #000; margin: 0; padding: 0;">Hello <b>'.$data['arr']['first_name'].'</b>, your Online Profile is '.$full_percentage.' % , let`s get done. </p>
	
	</div>
	<div class="head" style="float: left; width: 100%; display: block;">
	<h4 style="background: #000; text-align: center; font-size: 20px; padding: 10px; font-weight: 700; color: #fff;" width: 80% !important; margin: 0 auto !important;>BASIC INFORMATION</h4><br>
	
	</div>';
			for($u=0;$u<count($keynames);$u++)
			{
			  $datar = $keynames[$u];
			
			 $message .= '
			  
		<div class="info" style="width: 100%; float: left; background: #f2f2f2;"><label style="width: 100%;
    float: left; font-weight: 700; font-size: 16px; text-transform: uppercase; text-align: center;"> - '.$datar.'</label></div>';
	}
			
			
			$message .='<div class="head" style="float: left; width: 100%; display: block;">
	<h4 style="background: #000; text-align: center; font-size: 20px; padding: 10px; font-weight: 700; color: #fff;" width: 80% !important; margin: 0 auto !important;>ACADEMIC INFORMATION</h4><br>			  
		<div class="info" style="width: 100%; float: left; background: #f2f2f2;"><label style="width: 100%;
    float: left; font-weight: 700; font-size: 16px; text-transform: uppercase; text-align: center;"> - '.$empty_grad_year.'</label></div>		
	</div>';
			$message .='<div class="most-outer" style="background: #f2f2f2;
    padding: 10px; width: 100%; float: left;">
	<h3 style="text-align: center; color: #000; font-size: 36px; font-weight: 500; font-family: initial; margin: 0;">Schools to approach 567</h3>
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
$message .='';
		 $this->load->library('email');        
         $to_email = "sandeep@codenomad.net";       
         $this->email->from('isportsrecruiting.com', 'iSportsRecruiting Team '); 
         $this->email->to($to_email);
         $this->email->subject('College Coaches are looking every day'); 
		 $this->email->message($message);
		 $this->email->set_mailtype("html");
         $this->email->set_mailtype("html");
		 //$done = $this->email->send();
		 						
			
		 } 
			$this->load->view('header');
		$this->load->view($view,$data);
		$this->load->view('footer');
		 } 
		 
		
		
	}
	
	
		
	public function create_profile_submit()
	{
		//echo "create_profile_submit";die;
		
	    $name=$this->input->post('firstname');
	    $user_id=$this->input->post('$user_id');
	    $middle_name=$this->input->post('middlename');
	    $last_name=$this->input->post('lastname');		
	    $birth=$this->input->post('birth');
	    $weight=$this->input->post('position');	   
	    $address1= $this->input->post('address1');
		$celphone=  $this->input->post('celphone');
		$email= $this->input->post('email');
		 $guardian1=$this->input->post('guardian1');
		 $guardianfirstname = $this->input->post('g_first_name');
		 $guardianlastname= $this->input->post('g_last_name');
		 $guardianmobile= $this->input->post('g_phone');
		 $guardianemail=  $this->input->post('g_mail');
		 $graduationyear=$this->input->post('grad_year');
		 $gpa=$this->input->post('gpa');
	     $selectid1=$this->Academic_info_model->selectidforfreeprofile();		  
	     $insert_stats=$this->Academic_info_model->insert_stats();
	     $get_athlete_position_free=$this->Academic_info_model->get_athlete_position_free($weight);
	     $position_nam = $get_athlete_position_free['positions'];	
		
		
        $data['sport_name']=$this->Academic_info_model->find_sport_name_profile();
        $sp_name=$data['sport_name'];
        $pos_name=$this->input->post('position');
        $data['pos_name']=$this->Academic_info_model->find_pos_name_profile($pos_name);
        $pos=$data['pos_name']['positions'];
        $rec1 = $this->Profile_model->new_free_profile_submit();
		 
		 
		 
		 
		 
         $from_email = "contact@isportsrecruiting.com";
	     $this->load->library('email'); 
         $to_email = "contact@isportsrecruiting.com";
         //$to_email = "sandeep@codenomad.net";
         $this->email->from($from_email, 'Create Profile'); 
         $this->email->to($to_email);
         $this->email->subject('ISPORTSRECRUITING FREE PROFILE'); 
        

//$link="<a href='http://iscoutyou.com/iscoutyou/updatepassword'/'.$to_email.">Click Here</a>'"; 
//$link = 'Click on this link -'. base_url().'/iscoutyou/updatepassword?id='.$idd;
//$link = "Click on this link - http://iscoutyou.com/iscoutyou/updatepassword?id=$idd";

//$this->email->message('<a href= "http://iscoutyou2.com/iscoutyou/updatepassword?id="'.$idd.'">Click on this link</a>',true);

$this->email->message("<table style='border:1px solid #ccc;'>
<tr style='order:1px solid #ccc;'>
   <th style='border:1px solid #ccc;'>Field</th>
   <th style='border:1px solid #ccc;'>Value</th>
</tr>
<tr style='border:1px solid #ccc;'>
   <td style='border:1px solid #ccc;'>First Name</td>
   <td style='border:1px solid #ccc;'>$name</td>
</tr>
<tr style='border:1px solid #ccc;'>
   <td style='border:1px solid #ccc;'>Middle Name</td>
   <td style='border:1px solid #ccc;'>$middle_name</td>
</tr>
<tr style='border:1px solid #ccc;'>
   <td style='border:1px solid #ccc;'>Last Name</td>
   <td style='border:1px solid #ccc;'>$last_name</td>
</tr>
<tr style='border:1px solid #ccc;'>
   <td style='border:1px solid #ccc;'>Gender</td>
   <td style='border:1px solid #ccc;'>$gender</td>
</tr>
<tr style='border:1px solid #ccc;'>
   <td style='border:1px solid #ccc;'>Birthday</td>
   <td style='border:1px solid #ccc;'>$birth</td>
</tr>
<tr style='border:1px solid #ccc;'>
   <td style='border:1px solid #ccc;'>Birthday</td>
   <td style='border:1px solid #ccc;'>$birth</td>
</tr>
<tr style='border:1px solid #ccc;'>
   <td style='border:1px solid #ccc;'>Position</td>
   <td style='border:1px solid #ccc;'>$position_nam</td>
</tr>
<tr style='border:1px solid #ccc;'>
   <td style='border:1px solid #ccc;'>Sports Name</td>
   <td style='border:1px solid #ccc;'>$sp_name</td>
</tr>

<tr style='border:1px solid #ccc;'>
   <td style='border:1px solid #ccc;'>Address</td>
   <td style='border:1px solid #ccc;'>$Address1</td>
</tr>
<tr style='border:1px solid #ccc;'>
   <td style='border:1px solid #ccc;'>Celphone</td>
   <td style='border:1px solid #ccc;'>$celphone</td>
</tr>
<tr style='border:1px solid #ccc;'>
   <td style='border:1px solid #ccc;'>Email</td>
   <td style='border:1px solid #ccc;'>$email</td>
</tr>
<tr style='border:1px solid #ccc;'>
   <td style='border:1px solid #ccc;'>Guardian First Name</td>
   <td style='border:1px solid #ccc;'>$guardianfirstname</td>
</tr>
<tr style='border:1px solid #ccc;'>
   <td style='border:1px solid #ccc;'>Guardian Last Name</td>
   <td style='border:1px solid #ccc;'>$guardianlastname</td>
</tr>
<tr style='border:1px solid #ccc;'>
   <td style='border:1px solid #ccc;'>Ncaa</td>
   <td style='border:1px solid #ccc;'>$ncaa</td>
</tr>
<tr style='border:1px solid #ccc;'>
   <td style='border:1px solid #ccc;'>Naia</td>
   <td style='border:1px solid #ccc;'>$naia</td>
</tr>
<tr style='border:1px solid #ccc;'>
   <td style='border:1px solid #ccc;'>Email</td>
   <td style='border:1px solid #ccc;'>$email</td>
</tr>
<tr style='border:1px solid #ccc;'>
   <td style='border:1px solid #ccc;'>Mobile</td>
   <td style='border:1px solid #ccc;'>$celphone</td>
</tr>
<tr style='border:1px solid #ccc;'>
   <td style='border:1px solid #ccc;'>First Guardian</td>
   <td style='border:1px solid #ccc;'>$guardian1</td>
</tr>
<tr style='border:1px solid #ccc;'>
   <td style='border:1px solid #ccc;'>Guardian Email</td>
   <td style='border:1px solid #ccc;'>$guardianemail</td>
</tr>
<tr style='border:1px solid #ccc;'>
   <td style='border:1px solid #ccc;'>Guardian Phone Number</td>
   <td style='border:1px solid #ccc;'>$guardianmobile</td>
</tr>
<tr style='border:1px solid #ccc;'><td>Graduation Year</td>
   <td style='border:1px solid #ccc;'>$graduationyear</td>
 </tr>
 <tr style='border:1px solid #ccc;'><td>GPA</td>
   <td style='border:1px solid #ccc;'>$gpa</td>
 </tr>

</table>",true);
$this->email->set_mailtype("html");
         $this->email->set_mailtype("html");
		 $done = $this->email->send();
		 if($done)
		     {
			
			$this->session->set_flashdata('dd','Well Done! Now You Can Finished Your Profile');
			redirect('Iscoutyou/free_profile_academic_info');
		     }
	   
	    //  $selectid1=$this->Academic_info_model->selectidforfreeprofile();	
	     // $idd1=$selectid1['id'];
	    //  $get_stats=$this->Academic_info_model->free_profile_get_stats($idd1);	
	     // $get_stat_value=$data['$get_stats']['position_id'];
	  //   $insert_stats=$this->Academic_info_model->insert_stats($idd1,$get_stat_value);
	 //  $rec1 = $this->Profile_model->new_profile_submit();
      
      // $get_sports=$this->Academic_info_model->get_sports();
	// $insert_stats=$this->Academic_info_model->insert_stats();
	
	
	
	//insert stats values code
	
	  $get=$this->Academic_info_model->free_profile_get_stats();
	  
	  $game = $get['sports_id'];
	  
	   //$pos=$get['position_id'];
	  $get_stat_value=$get['stats'];
	//  print_r($get);die;
	  $insert_stats=$this->Academic_info_model->insert_stats($game,$get_stat_value);
	 	$selectid=$this->Academic_info_model->selectidforfreeprofile();	
	  $idd=$selectid['id'];
	 
	    $this->session->set_userdata('userdata',$idd);
	    
	    if($rec1)
		 {
		     if($done)
		     {
			$this->session->set_flashdata('dd','Well Done! Now You Finished Your Profile');
			 
			//redirect('Iscoutyou/create_profile');
		     }
		 }
	
	}
	public function profile_submit()
	{	
	    $user_id = $this->session->userdata('user_idd');		
		$get_pecentage_basic=$this->Academic_info_model->profile_percentage();		
		$fields = array('first_name','last_name','gender','birth','weight','height','address','address2',
		'home_phone','cel_phone','email','guardian1','g_first_name','g_last_name','g_phone','g_mail','hs_grad_year',
		'gpa','personal_statement');		 
			//////custom
		$get_pecentage_basic=$this->Academic_info_model->profile_percentage();
		//print_r($get_pecentage_basic);die;
		$firstnameper1=$get_pecentage_basic['first_name'];
		$lastnameper1=$get_pecentage_basic['last_name'];		
		$weight=$get_pecentage_basic['weight'];
		$height=$get_pecentage_basic['height'];		
		$ncaa=$get_pecentage_basic['ncaa'];		
		$naia=$get_pecentage_basic['naia'];		
		$cel_phone=$get_pecentage_basic['cel_phone'];		
		$hs_grad_year=$get_pecentage_basic['hs_grad_year'];
		$gpa=$get_pecentage_basic['gpa'];
		$sat=$get_pecentage_basic['sat'];
		$act=$get_pecentage_basic['act'];
		$personal_statement=$get_pecentage_basic['personal_statement'];		
		$image_profile=$get_pecentage_basic['image_profile'];		
		$val1=0;
		if($firstnameper1)
		{
			$val1=$val1+2.5;
		}
		if($lastnameper1)
		{
			$val1=$val1+2.5;
		}		
		if($weight)
		{
			$val1=$val1+2.5;
		}
		if($height)
		{
			$val1=$val1+2.5;
		}
		if($ncaa)
		{
			$val1=$val1+2.5;
		}
		if($naia)
		{
			$val1=$val1+2.5;
		}		
		if($cel_phone)
		{
			$val1=$val1+5;
		}		
		if($hs_grad_year)
		{
			$val1=$val1+5;
		}
		if($gpa)
		{
			$val1=$val1+10;
		}
		if($sat)
		{
			$val1=$val1+2.5;
		}
		if($act)
		{
			$val1=$val1+2.5;
		}
		if($personal_statement)
		{
			$val1=$val1+10;
		}
		if($image_profile)
		{
			$val1=$val1+5;
		}			
		$percentage = $val1;
			
			/////		  
		
		$rec = $this->Profile_model->profile_information();
		$data['res1'] = $this->Academic_info_model->update_basic_percentage($percentage); 
		
    //echo  $fg=$this->input->post('position');
    //echo "hellllllo";die;
	
	
		 if($rec)
		 {
			$this->session->set_flashdata('dd','Well done! Now you can see your Profile');
			redirect('iscoutyou/academic_info');
			
			//redirect(site_url('iscoutyou/profile'));
		 }
		 
	}
	public function free_profile_submit()
	{	
        	
		$val=0;		
		foreach($this->input->post() as $value){
			if($value){
				$val=$val+1;
				
			}
		}
			    
		$percentage=$val/19*100;
		$data['res1'] = $this->Academic_info_model->update_basic_percentage_free($percentage,'percentage1'); 
		
    //echo  $fg=$this->input->post('position');
    //echo "hellllllo";die;
	$rec = $this->Profile_model->profile_information_free();
	
		 if($rec)
		 {
			$this->session->set_flashdata('dd','Well done! Now you can see your Profile');
			redirect('iscoutyou/academic_info');
			//redirect(site_url('iscoutyou/profile'));
		 }
		 
	}
	public function new_plan()
	{
     $this->load->view('new_plan');
	}
	public function free_profile_academic_info($add=null)
	{
	    $id4=$this->session->userdata('user_idd');
	    if($id4)
	  	{
	  	    
	  	    $this->load->view('free_header2');
			$data['res1'] = $this->Academic_info_model->free_profile_Academic_info_model_school4();
		    $data['ser1'] = $this->Academic_info_model->free_profile_Academic_info_model_award4();
		    $data['esr1'] = $this->Academic_info_model->free_profile_Academic_info_model_achivement4();
		    $data['honor_get1'] = $this->Academic_info_model->free_profile_Academic_info_model_honorget4();
		    $data['athlete_info1'] = $this->Academic_info_model->athlete_info1();
		   // print_r( $data['athlete_info1']);die;
			 if($add=='school')
		   {
		       $this->load->view('free_profile_school',$data);
				$this->load->view('footer');
	       }
	      else if($add=='awards')
	       {
	           	$this->load->view('free_profile_awards',$data); 
	           	$this->load->view('footer');
	       }
	      else if($add=='honor_roll')
			 {
				$this->load->view('free_profile_honor_roll',$data); 
			 }
	      else if($add=='archivement')
			 {
				$this->load->view('free_profile_archivement',$data);
				$this->load->view('footer');
			 }
	       
	       
	        else
			 {
				$this->load->view('free_profile_academic_info',$data);
				$this->load->view('footer');
			 } 
		   
	  	    
	  	}
	  	else
	  	{
	    
	   // $selectid=$this->Academic_info_model->selectidforfreeprofile();	
	   $selectid=$this->Academic_info_model->selectidforfreeprofile();	
	  $idd=$selectid['id'];
	  
	    $this->session->set_userdata('userdata',$idd);
	    
	   
		
	  // $selectid=$this->Academic_info_model->selectidforfreeprofile();	
	 //  $idd=$selectid['id'];
	 //  $this->session->set_userdata('userdata',$idd);
	  // $rt=$this->session->userdata('userdata');
	   $rt=$this->session->userdata('userdata');
		   $data['res1'] = $this->Academic_info_model->free_profile_Academic_info_model_school();
		    $data['ser1'] = $this->Academic_info_model->free_profile_Academic_info_model_award();
		    $data['esr1'] = $this->Academic_info_model->free_profile_Academic_info_model_achivement();
		    $data['honor_get1'] = $this->Academic_info_model->free_profile_Academic_info_model_honorget();
		    $data['athlete_info1'] = $this->Academic_info_model->athlete_infosign();
		   
		  // print_r($data['res1']);die;
		   if($add=='school')
		   {
		       $this->load->view('free_profile_school',$data);
				$this->load->view('footer');
	       }
	      else if($add=='awards')
	       {
	           	$this->load->view('free_profile_awards',$data); 
	           	$this->load->view('footer');
	       }
	      else if($add=='honor_roll')
			 {
				$this->load->view('free_profile_honor_roll',$data); 
			 }
	      else if($add=='archivement')
			 {
				$this->load->view('free_profile_archivement',$data);
				$this->load->view('footer');
			 }
	       
	       
	        else
			 {
				$this->load->view('free_profile_academic_info',$data);
				$this->load->view('footer');
			 } 
		   
	
	  	}
	 
	   
	}
	public function academic_info($add=null)
	{
		
        $ses_id = $this->session->userdata('user_idd');		
		$this->load->view('header');
		if(!$this->session->userdata('user_idd'))
		{
			redirect();
		}
		else
		{
			  $user_id = $this->session->userdata('user_idd');
              $data['res'] = $this->Academic_info_model->Academic_info_model_school();			  
			  $val2=0;
              if($data['res'][0]['school'])
             {
               $val2= $val2+5;
             }	
             $percentage2=$val2;
			
             $data['per'] = $this->Academic_info_model->update_acdemic_percentage($percentage2);
			 
			 $data['ser'] = $this->Academic_info_model->Academic_info_model_award();		
		     $data['esr'] = $this->Academic_info_model->Academic_info_model_achivement();				     
		     $data['honor_get'] = $this->Academic_info_model->Academic_info_model_honorget($user_id);
			 
			//$data['get_all_data'] = $this->Academic_info_model->get_all_profile_data_free();
			
		     $data['get_all_data'] = $this->Academic_info_model->get_all_profile_data(); 
		 
		     $data['athlete_info'] = $this->Academic_info_model->athlete_info();				     
			 if(empty($data['athlete_info']))
			 {
				 $data['athlete_info'] = $this->Academic_info_model->athlete_info1();				     
			 }
			 if($add=='school')
			 {
				$this->load->view('school',$data);
				$this->load->view('footer');
			 }
			 else if($add=='honor_roll')
			 {
				$this->load->view('honor_roll',$data); 
			 }
			 else if($add=='awards')
			 {
				$this->load->view('awards',$data); 
				$this->load->view('footer');
			 }
			 else if($add=='archivement')
			 {
				$this->load->view('archivement',$data);
				$this->load->view('footer');
			 }
			 else
			 {
				$this->load->view('academic_info',$data);
				$this->load->view('footer');
			 } 
			 //$this->load->view('footer');
		}
	}
	public function honour_submit()
	{
		$userid = $this->session->userdata('user_idd');
		$data = array('user_id' =>$userid,
			'honor_roll' => $this->input->post('honor_roll'),
			'year'=>$this->input->post('year')
			);
			$this->db->insert('athlete_honor_roll', $data);
			$insert_id = $this->db->insert_id();
			if($insert_id)
			{
				redirect('iscoutyou/academic_info/');
			}
	}
	public function free_profile_honour_submit()
	{
	    $id4=$this->session->userdata('user_idd');
	    if($id4)
	    {
	    $data = $this->Academic_info_model->free_profile_honour_Academic4();
		if($data)
		{
			redirect('Iscoutyou/free_profile_academic_info/');
		}
	        
	    }
	    else
	    {
		if(!$this->session->userdata('userdata'))
		{
			redirect();
		}
		else
		{
		$data = $this->Academic_info_model->free_profile_honour_Academic();
		if($data)
		{
			redirect('Iscoutyou/free_profile_academic_info/');
		}
		}
	    }
	}
	

	public function academic_info_delete($del=null)
	{
		
		$this->load->view('header');
		if(!$this->session->userdata('user_idd'))
		{
			redirect();
		}
		else
		{
			if($del)
			 {	
		        $data['arr'] = $this->Academic_info_model->Academic_del($del);
				if($data)
				{
				$data['athlete_info'] = $this->Academic_info_model->athlete_info();
				$this->load->view('delete',$data);
				}
			 }
		}
	}
		public function free_profile_academic_info_delete($del=null)
	{
	    $id4=$this->session->userdata('user_idd');
	    if($id4)
	    {
	        	$this->load->view('free_header2');
	        	if($del)
			 {	
		        $data['arr'] = $this->Academic_info_model->free_profile_Academic_del($del);
				if($data)
				{
				$data['athlete_info1'] = $this->Academic_info_model->athlete_info1();
				$this->load->view('free_profile_academic_info_delete',$data);
				}
			 }
	        
	    }
	   else
	   {
		$this->load->view('free_header');
		if(!$this->session->userdata('userdata'))
		{
			redirect();
		}
		else
		{
			if($del)
			 {	
		        $data['arr'] = $this->Academic_info_model->free_profile_Academic_del($del);
				if($data)
				{
				$data['athlete_info1'] = $this->Academic_info_model->athlete_infosign();
				$this->load->view('free_profile_academic_info_delete',$data);
				}
			 }
		}
	   }
	}
	public function academic_info_del_done()
	{
		$this->Academic_info_model->academic_info_del_done();	
	}
		public function free_profile_academic_info_del_done()
	{
		$this->Academic_info_model->free_profile_academic_info_del_done();	
	}
	public function academic_info_del($del=null)
	{
		$this->load->view('header');
		if(!$this->session->userdata('user_idd'))
		{
			redirect();
		}
		else
		{
			if($del)
			 {	
		        $data['mar'] = $this->Academic_info_model->academic_info_del($del);
				if($data)
				{
				$data['athlete_info'] = $this->Academic_info_model->athlete_info();
				$this->load->view('del_awards',$data);
				}
			 }
		}
	}
		public function free_profile_academic_info_del($del=null)
	{
	     $id4=$this->session->userdata('user_idd');
	    if($id4)
	    {
	        	$this->load->view('free_header2');
	        		if($del)
			 {	
		        $data['mar'] = $this->Academic_info_model->free_profile_academic_info_del($del);
				if($data)
				{
				$data['athlete_info1'] = $this->Academic_info_model->athlete_info1();
				$this->load->view('free_profile_del_awards',$data);
				}
			 }
	        
	    }
	    else
	    {
		$this->load->view('free_header');
		if(!$this->session->userdata('userdata'))
		{
			redirect();
		}
		else
		{
			if($del)
			 {	
		        $data['mar'] = $this->Academic_info_model->free_profile_academic_info_del($del);
				if($data)
				{
				$data['athlete_info1'] = $this->Academic_info_model->athlete_infosign();
				$this->load->view('free_profile_del_awards',$data);
				}
			 }
		}
	    }
	}
	public function academic_honor_del($id=null)
	{
		$this->load->view('header');
	    $data['del_honor_page'] = $this->Academic_info_model->del_honor_page($id);
		$data['athlete_info'] = $this->Academic_info_model->athlete_info();
		$this->load->view('del_honor_roll',$data);
		
	}
		public function free_profile_academic_honor_del($id=null)
	{
	
	     $id4=$this->session->userdata('user_idd');
	   $regid=$this->session->userdata('userriddd');
	  if($regid){
		   $this->load->view('free_header');
		   $data['athlete_info1'] = $this->Academic_info_model->athlete_infosign();
       }
       if($id4){
            $this->load->view('free_header2');
            $data['athlete_info1'] = $this->Academic_info_model->athlete_info1();
       }
   
	//	$this->load->view('header');
	    $data['del_honor_page'] = $this->Academic_info_model->free_profile_del_honor_page($id);
		
		$this->load->view('free_profile_del_honor_roll',$data);
		
	}
	public function academic_info_honor_deleted()
	{
      $this->db->where('id', $_POST['id']);
            $done = $this->db->delete('athlete_honor_roll');
			if($done)
			{
		    redirect('iscoutyou/academic_info/');
			}
	}
		public function free_profile_academic_info_honor_deleted()
	{
      $this->db->where('id', $_POST['id']);
            $done = $this->db->delete('free_profile_athlete_honor_roll');
			if($done)
			{
		    redirect('iscoutyou/free_profile_academic_info/');
			}
	}
	public function academic_honor_update($id=null)
	{
		$this->load->view('header');
		$data['athlete_info'] = $this->Academic_info_model->athlete_infosign();
		$data['academic_honor_update'] = $this->Academic_info_model->academic_honor_update($id);
		$data['athlete_info'] = $this->Academic_info_model->athlete_info();
        $this->load->view('update_honor',$data);		
	}
		public function free_profile_academic_honor_update($id=null)
	{
	     $id4=$this->session->userdata('user_idd');
	   $regid=$this->session->userdata('userriddd');
	   if($id4)
	   {    
	    	$this->load->view('free_header2');
	    	$data['athlete_info1'] = $this->Academic_info_model->athlete_info1();   
	   }
	   else
	   {
	       $this->load->view('free_header');
	       	$data['athlete_info1'] = $this->Academic_info_model->athlete_infosign();
	   }
		//$this->load->view('header');
	
		$data['academic_honor_update'] = $this->Academic_info_model->free_profile_academic_honor_update($id);
        $this->load->view('free_profile_update_honor',$data);		
	}
	public function academic_honor_update_done()
	{
		$id = $_POST['id'];
            $data = array(
						'honor_roll' => $this->input->post('honor_roll'),
						'year' => $this->input->post('year')
						);
			$this->db->where('id', $id);
            $dooo = $this->db->update('athlete_honor_roll',$data);
			if($dooo)
			{
		    redirect('iscoutyou/academic_info/');
			}
	}
		public function free_profile_academic_honor_update_done()
	{
		$id = $_POST['id'];
            $data = array(
						'honor_roll' => $this->input->post('honor_roll'),
						'year' => $this->input->post('year')
						);
			$this->db->where('id', $id);
            $dooo = $this->db->update('free_profile_athlete_honor_roll',$data);
			if($dooo)
			{
		    redirect('iscoutyou/free_profile_academic_info/');
			}
	}
	public function academic_info_delete_awards()
	{
		$this->Academic_info_model->academic_info_del_awards();	
	}
		public function free_profile_academic_info_delete_awards()
	{
		$this->Academic_info_model->free_profile_academic_info_del_awards();	
	}
	public function academic_info_dele($del=null)
	{
		$this->load->view('header');
		if(!$this->session->userdata('user_idd'))
		{
			redirect();
		}
		else
		{
			if($del)
			 {	
		        $data['ram'] = $this->Academic_info_model->academic_info_del_achivement($del);
				if($data)
				{
				$data['athlete_info'] = $this->Academic_info_model->athlete_info();
				$this->load->view('del_achivement',$data);
				}
			 }
		}

	}
		public function free_profile_academic_info_dele($del=null)
	{
	   $id4=$this->session->userdata('user_idd');
	    if($id4)
	    { $this->load->view('free_header2');
	        	if($del)
			 {	
		        $data['ram'] = $this->Academic_info_model->free_profile_academic_info_del_achivement($del);
				if($data)
				{
				$data['athlete_info1'] = $this->Academic_info_model->athlete_info1();
				$this->load->view('free_profile_del_archivement',$data);
				}
			 }
	        
	    }
	    else
	    {
		$this->load->view('free_header');
		if(!$this->session->userdata('userdata'))
		{
			redirect();
		}
		else
		{
			if($del)
			 {	
		        $data['ram'] = $this->Academic_info_model->free_profile_academic_info_del_achivement($del);
				if($data)
				{
				$data['athlete_info1'] = $this->Academic_info_model->athlete_infosign();
				$this->load->view('free_profile_del_archivement',$data);
				}
			 }
		}
	    }

	}
	public function academic_info_delete_achivement()
	{
		$this->Academic_info_model->academic_info_delete_achivement();	
	}
		public function free_profile_academic_info_delete_achivement()
	{
		$this->Academic_info_model->free_profile_academic_info_delete_achivement();	
	}
	
	public function academic_info_update($del=null)
	{
		$this->load->view('header');
		if(!$this->session->userdata('user_idd'))
		{
			redirect();
		}
		else
		{
			if($del)
			 {	
		        $data['up'] = $this->Academic_info_model->academic_info_update($del);
				if($data)
				{
				$data['athlete_info'] = $this->Academic_info_model->athlete_info();
				$data['get_all_data'] = $this->Academic_info_model->get_all_profile_data();				
				$this->load->view('update_info',$data);
				}
			 }
		}
	}
		public function free_profile_academic_info_update($del=null)
	{
	     $id4=$this->session->userdata('user_idd');
	    if($id4)
	    {
	        	$this->load->view('free_header2');
	        if($del)
			 {	
		        $data['up'] = $this->Academic_info_model->free_profile_academic_info_update($del);
				if($data)
				{
				$data['athlete_info1'] = $this->Academic_info_model->athlete_info1();	
				$this->load->view('free_profile_update_info',$data);
				}
			 }
	    }
	    else
	    {
		$this->load->view('free_header');
		if(!$this->session->userdata('userdata'))
		{
			redirect();
		}
		else
		{
			if($del)
			 {	
		        $data['up'] = $this->Academic_info_model->free_profile_academic_info_update($del);
				if($data)
				{
				$data['athlete_info1'] = $this->Academic_info_model->athlete_infosign();	
				$this->load->view('free_profile_update_info',$data);
				}
			 }
		}
	    }
	}
	public function academic_info_update_done()
	{
		$this->Academic_info_model->academic_info_update_done();	
	}
		public function free_profile_academic_info_update_done()
	{
		$this->Academic_info_model->free_profile_academic_info_update_done();	
	}
	public function academic_awards_update($del=null)
	{
		$this->load->view('header');
		if(!$this->session->userdata('user_idd'))
		{
			redirect();
		}
		else
		{
			if($del)
			 {	

		        $data['given'] = $this->Academic_info_model->academic_awards_update($del);
				if($data)
				{
				$data['athlete_info'] = $this->Academic_info_model->athlete_info();	
				$this->load->view('update_awards',$data);
				}
			 }
		}
	}
		public function free_profile_academic_awards_update($del=null)
	{
	    //echo "xdexd";die;
	     $id4=$this->session->userdata('user_idd');
	    if($id4)
	    {
	        $this->load->view('free_header2');
	        if($del)
			 {	

		        $data['given'] = $this->Academic_info_model->free_profile_academic_awards_update($del);
				if($data)
				{
				$data['athlete_info1'] = $this->Academic_info_model->athlete_info1();	
				$this->load->view('free_profile_update_awards',$data);
				}
			 }
	        
	    }
	    else
	    {
		$this->load->view('free_header');
		if(!$this->session->userdata('userdata'))
		{
			redirect();
		}
		else
		{
			if($del)
			 {	

		        $data['given'] = $this->Academic_info_model->free_profile_academic_awards_update($del);
				if($data)
				{
				$data['athlete_info1'] = $this->Academic_info_model->athlete_infosign();	
				$this->load->view('free_profile_update_awards',$data);
				}
			 }
		}
	    }
	}
	public function academic_awards_update_done()
	{
		$this->Academic_info_model->academic_awards_update_done();	
	}
		public function free_profile_academic_awards_update_done()
	{
		$this->Academic_info_model->free_profile_academic_awards_update_done();	
	}
	
	
	public function academic_achivement_update($del=null)
	{
		$this->load->view('header');
		if(!$this->session->userdata('user_idd'))
		{
			redirect();
		}
		else
		{
			if($del)
			 {	

		        $data['pass'] = $this->Academic_info_model->academic_achivement_update($del);
				if($data)
				{
				$data['athlete_info'] = $this->Academic_info_model->athlete_info();		
				$this->load->view('update_achivement',$data);
				}
			 }
		}
	}
		public function free_profile_academic_achivement_update($del=null)
	{
	     $id4=$this->session->userdata('user_idd');
	    if($id4)
	    {
	        $this->load->view('free_header2');
	       	if($del)
			 {	

		        $data['pass'] = $this->Academic_info_model->free_profile_academic_achivement_update($del);
				if($data)
				{
				$data['athlete_info1'] = $this->Academic_info_model->athlete_info1();		
				$this->load->view('free_profile_update_achivement',$data);
				}
			 } 
	    }
	    else
	    {
		$this->load->view('free_header');
		if(!$this->session->userdata('userdata'))
		{
			redirect();
		}
		else
		{
			if($del)
			 {	

		        $data['pass'] = $this->Academic_info_model->free_profile_academic_achivement_update($del);
				if($data)
				{
				$data['athlete_info1'] = $this->Academic_info_model->athlete_infosign();		
				$this->load->view('free_profile_update_achivement',$data);
				}
			 }
		}
	    }
	}
	public function academic_achivement_update_done()
	{
		$this->Academic_info_model->academic_achivement_update_done();	
	}
		public function free_profile_academic_achivement_update_done()
	{
		$this->Academic_info_model->free_profile_academic_achivement_update_done();	
	}
	
	
	public function school_submit()
	{
		if(!$this->session->userdata('user_idd'))
		{
			redirect();
		}
		else
		{
	/* 	$val1=0;
		$school=  $this->input->post('school');
		if($school)
		{
			$val1=1;
		}
		
		$percentage=$val1/1*100;
		$data = $this->Academic_info_model->update_acdemic_percentage($percentage); */
		$data = $this->Academic_info_model->Academic_school();
		if($data)
		{
			redirect('Iscoutyou/academic_info/');
		}
		}
	}
		public function free_profile_school_submit()
	{
	    $id4=$this->session->userdata('user_idd');
	    if($id4)
	    {
	        $data = $this->Academic_info_model->free_profile_Academic_school4();
		if($data)
		{
			redirect('Iscoutyou/free_profile_academic_info/');
		}
	    }
	    else
	    {
		$data = $this->Academic_info_model->free_profile_Academic_school();
		if($data)
		{
			redirect('Iscoutyou/free_profile_academic_info/');
		}
	    }
		
	}
	public function awards_submit()
	{
		if(!$this->session->userdata('user_idd'))
		{
			redirect();
		}
		else
		{
		$data = $this->Academic_info_model->Academic_awards();
		if($data)
		{
			redirect('Iscoutyou/academic_info/');
		}
		}
	}
		public function free_profile_awards_submit()
	{
	    $id4=$this->session->userdata('user_idd');
	    if($id4)
	    {
	   $data = $this->Academic_info_model->free_profile_Academic_awards4();
		if($data)
		{
			redirect('Iscoutyou/free_profile_academic_info/');
		}
	    }
	    else
	    {
	  if(!$this->session->userdata('userdata'))
		{
			redirect();
		}
		else
		{
		$data = $this->Academic_info_model->free_profile_Academic_awards();
		if($data)
		{
			redirect('Iscoutyou/free_profile_academic_info/');
		}
		}
	    }
	}
	public function achivement_submit()
	{
		if(!$this->session->userdata('user_idd'))
		{
			redirect();
		}
		else
		{
		$data = $this->Academic_info_model->Academic_achivement();
		if($data)
		{
			redirect('Iscoutyou/academic_info/');
		}
		}
	}	
  
		public function free_profile_achivement_submit()
	{
	  //  echo "gmkjum";die;
	  $id4=$this->session->userdata('user_idd');
	  if($id4)
	  {
	    $data = $this->Academic_info_model->free_profile_Academic_achivement4();
		if($data)
		{
			redirect('Iscoutyou/free_profile_academic_info/');
		}
	      
	  }
	  else
	  {
		if(!$this->session->userdata('userdata'))
		{
			redirect();
		}
		else
		{
		$data = $this->Academic_info_model->free_profile_Academic_achivement();
		if($data)
		{
			redirect('Iscoutyou/free_profile_academic_info/');
		}
		}
	  }
	}
	public function athletic_info()
	{
		if(!$this->session->userdata('user_idd'))
		{
			redirect();
		}
		else
		{
			
		$user_id = $this->session->userdata('user_idd');
		$this->load->view('header');
		$data['meet'] = $this->Academic_info_model->get_athlete_history();	    
		$data['veet'] = $this->Academic_info_model->get_athlete_stats();
		$data['generate_form'] = $this->Academic_info_model->generate_form();
		
		if(empty($data['generate_form']))
		{
		
			$data['generate_form'] = $this->Academic_info_model->free_profile_generate_form();
		}
		//print_r($data['generate_form']);die;
		$data['free_profile']= 'paid';
		$data['generate_form_stats_value'] = $this->Academic_info_model->generate_form_stats_value();
		
		if(empty($data['generate_form_stats_value']))
		{
			$data['generate_form_stats_value'] = $this->Academic_info_model->free_profile_generate_form_stats_value();
			$data['free_profile']= 'free';
		}
		// $data['generate_form_stats_value'] = $this->Academic_info_model->free_profile_generate_form_stats_value();
		$data['athlete_info'] = $this->Academic_info_model->athlete_info();	
		if(empty($data['athlete_info']))
		{
			$data['athlete_info'] = $this->Academic_info_model->athlete_info1();	
			
		}	
		
		$data['get_all_data'] = $this->Academic_info_model->get_all_profile_data(); 
		$data['video_get'] = $this->Academic_info_model->video_get($user_id);
		
		
		$data['get_basic_info'] = $this->Academic_info_model->get_all_basic_info();
		//print_r($data['get_basic_info']);
		$games_per=$data['get_basic_info']['games'];
		$sport_per=$data['get_basic_info']['position_id'];
		 $data['ath_stat_val'] = $this->Academic_info_model->ath_stat_percentage($games_per,$sport_per); 
		//print_r($data['ath_stat_val']);
		$stat_valll=$data['ath_stat_val'][0]['stats'];
		$satat=explode(",",$stat_valll);
		//print_r($satat);die;
		 $val3=0;
		 $stats = $data['generate_form_stats_value']['stats'];		 
		 
		 $athlete_history = $data['meet'][0]['highschool'];		 
		 $video1 = $data['video_get']['video1'];
		 
		if($stats)
		{
			 $val3=$val3+10;
		}
		if($athlete_history)
		{
		  $val3=$val3+5;
		}	
		
		if($video1)
		{
			$val3=$val3+25;
		}
		//echo $val3;die;
		$percentage3=$val3;
		$data['video_update12'] = $this->Academic_info_model->video_update_percentage($percentage3);
		$data['club_season_history'] = $this->Academic_info_model->club_season_history($user_id);
		$data['coach_information'] = $this->Academic_info_model->coach_information($user_id);
	    $this->load->view('athletic_info',$data);
        $this->load->view('footer');		
		}
	}
	public function free_profile_athletic_info()
	{
	     $id4=$this->session->userdata('user_idd');
	     $uid=$this->session->userdata('user_idd');
		 
	   // $id=$this->session->userdata('user_idd');
		$regid=$this->session->userdata('userriddd');
		 $ses_id = $this->session->userdata('user_idd');
		$data['percentage'] = $this->Academic_info_model->free_profile_get_athlete_percentage();
	  
     
            $this->load->view('free_header2');
       
	     if($id4)
	    {
			
		//	$this->load->view('free_header2');
	        $data['meet1'] = $this->Academic_info_model->free_profile_get_athlete_history4();
	       
			$data['club_season_history'] = $this->Academic_info_model->free_profile_club_season_history4($id4);
			$data['coach_information'] = $this->Academic_info_model->free_profile_coach_information4($id4);
				$data['video_get'] = $this->Academic_info_model->free_profile_video_get4();
				
				$data['generate_form'] = $this->Academic_info_model->free_profile_generate_form4();
				
				
				$data['generate_form_stats_value'] = $this->Academic_info_model->free_profile_generate_form_stats_value();
					$data['athlete_info1'] = $this->Academic_info_model->athlete_info1();
					//print_r($data['generate_form_stats_value']);die;
			  $this->load->view('free_profile_athlete_info',$data);
              $this->load->view('footer');
			
	    }
	    else
	    {
		
	    $selectid=$this->Academic_info_model->selectidforfreeprofile();	
	 
	  $idd=$selectid['id'];
	  $selectid=$this->Academic_info_model->selectidforfreeprofile();
	    $this->session->set_userdata('userdata',$idd);
	    	$data['athlete_info1'] = $this->Academic_info_model->athlete_infosign();
	
	    
       $userr_id = $this->session->userdata('userdata');
//$this->load->view('free_header');
    	$data['meet1'] = $this->Academic_info_model->free_profile_get_athlete_history();
	//	$data['veet'] = $this->Academic_info_model->get_athlete_stats();
		$data['generate_form'] = $this->Academic_info_model->free_profile_generate_form();
	//	print_r($data['generate_form']);die;
    	$data['generate_form_stats_value'] = $this->Academic_info_model->free_profile_generate_form_stats_value();
    //	print_r($data['generate_form_stats_value']);die;
    	//print_r($data['generate_form_stats_value']);die;
    //	print_r($data['generate_form_stats_value']);die;
    //	$data['athlete_info1'] = $this->Academic_info_model->athlete_info();	
     	$data['video_get'] = $this->Academic_info_model->free_profile_video_get();
		$data['club_season_history'] = $this->Academic_info_model->free_profile_club_season_history($userr_id);
		$data['coach_information'] = $this->Academic_info_model->free_profile_coach_information($userr_id);
	    $this->load->view('free_profile_athlete_info',$data);
        $this->load->view('footer');		
		
	    }
	}
    
    public function club_season_history()
	{
		$this->load->view('header');
		$data['athlete_info'] = $this->Academic_info_model->athlete_info();	
		$this->load->view('club_season_history',$data);
		$this->load->view('footer');	
	}
	    public function free_profile_club_season_history()
	{
	        $id=$this->session->userdata('user_idd');
	   $regid=$this->session->userdata('userriddd');
	  if($regid){
		   $this->load->view('free_header');
		   $data['athlete_info1'] = $this->Academic_info_model->athlete_infosign();  
       }
       if($id){
            $this->load->view('free_header2');
            $data['athlete_info1'] = $this->Academic_info_model->athlete_info1();  
       }
    //	$data['athlete_info'] = $this->Academic_info_model->free_profile_athlete_info();	
		$this->load->view('free_profile_club_season_history',$data);
		$this->load->view('footer');	
	}
	public function club_history_save()
	{
		 $user_id = $this->session->userdata('user_idd');
		 $data['club_history_save'] = $this->Academic_info_model->club_history_save($user_id);
	}
		public function free_profile_club_history_save()
	{
	     $id4=$this->session->userdata('user_idd');
	    if($id4)
	    {
	      $user_id = $this->session->userdata('user_idd');
		 $data['club_history_save'] = $this->Academic_info_model->free_profile_club_history_save($user_id);  
	    }
	    else
	    {
		 $user_id = $this->session->userdata('userdata');
		 $data['club_history_save'] = $this->Academic_info_model->free_profile_club_history_save($user_id);
	    }
	}
	public function club_season_history_update($id=null)
	{
		$this->load->view('header');
		$data['get_update_record'] = $this->Academic_info_model->get_update_record($id);
		$athlete_id = $data['get_update_record']['user_id'];
		$data['athlete_info2'] = $this->Academic_info_model->athlete_info2($athlete_id);
		$this->load->view('update_club_history',$data);
		$this->load->view('footer');	
	}
		public function free_profile_club_season_history_update($id=null)
	{
	        $id42=$this->session->userdata('user_idd');
	   $regid=$this->session->userdata('userriddd');
	  if($regid){
		   $this->load->view('free_header');
		   	$data['athlete_info1'] = $this->Academic_info_model->athlete_infosign();
       }
       if($id42){
            $this->load->view('free_header2');
            $data['athlete_info1'] = $this->Academic_info_model->athlete_info1();
       }
		$data['get_update_record'] = $this->Academic_info_model->free_profile_get_update_record($id);
		$athlete_id = $data['get_update_record']['user_id'];
	//	$data['athlete_info2'] = $this->Academic_info_model->athlete_info2($athlete_id);
		$this->load->view('free_profile_update_club_history',$data);
		$this->load->view('footer');	
	}
	public function club_season_history_update_done()
	{
		$id = $_POST['id'];
            $data = array(
						'competition_year' => $this->input->post('year'),
						'club_name' => $this->input->post('club_name')
						);
			$this->db->where('id', $id);
            $dooo = $this->db->update('club_season_history',$data);
			if($dooo)
			{
		    redirect('iscoutyou/athletic_info/');
			}
	}
		public function free_profile_club_season_history_update_done()
	{
		$id = $_POST['id'];
            $data = array(
						'competition_year' => $this->input->post('year'),
						'club_name' => $this->input->post('club_name')
						);
			$this->db->where('id', $id);
            $dooo = $this->db->update('free_profile_club_season_history',$data);
			if($dooo)
			{
		    redirect('iscoutyou/free_profile_athletic_info/');
			}
	}
	public function club_season_history_delete($id=null)
	{
		$this->load->view('header');
		$data['club_history_del'] = $this->Academic_info_model->club_history_del($id);
		$athlete_id = $data['club_history_del']['user_id'];
		$data['athlete_info2'] = $this->Academic_info_model->athlete_info2($athlete_id);
		$this->load->view('delete_club_history',$data);
		$this->load->view('footer');
	}
		public function free_profile_club_season_history_delete($id=null)
	{
	 // echo $id;die;
	        $id41=$this->session->userdata('user_idd');
	   $regid=$this->session->userdata('userriddd');
	  if($regid){
		   $this->load->view('free_header');
		   $data['athlete_info1'] = $this->Academic_info_model->athlete_infosign();
       }
       if($id41){
            $this->load->view('free_header2');
            $data['athlete_info1'] = $this->Academic_info_model->athlete_info1();
       }
		$data['club_history_del'] = $this->Academic_info_model->free_profile_club_history_del($id);
    	$athlete_id = $data['club_history_del']['user_id'];
		$data['athlete_info2'] = $this->Academic_info_model->athlete_info2($athlete_id);
		$this->load->view('free_profile_delete_club-history',$data);
		$this->load->view('footer');
	}
	public function club_history_deleted()
	{
		$id = $_POST['id'];
		$data['club_history_deleted'] = $this->Academic_info_model->club_history_deleted($id);
	}
		public function free_profile_club_history_deleted()
	{
		$id = $_POST['id'];
		$data['club_history_deleted'] = $this->Academic_info_model->free_profile_club_history_deleted($id);
	}
	public function coach_info_add_form()
	{
		$this->load->view('header');
		$data['athlete_info'] = $this->Academic_info_model->athlete_info();	
		$this->load->view('coach_info_add_form',$data);
		$this->load->view('footer');
	}
		public function free_profile_coach_info_add_form()
	{
	     $id=$this->session->userdata('user_idd');
	   $regid=$this->session->userdata('userriddd');
	  if($regid){
		   $this->load->view('free_header');
		   	$data['athlete_info1'] = $this->Academic_info_model->athlete_infosign();	
       }
       if($id){
            $this->load->view('free_header2');
        	$data['athlete_info1'] = $this->Academic_info_model->athlete_info1();	
       }
	//	$this->load->view('header');
	
		$this->load->view('free_profile_coach_info_add_form',$data);
		$this->load->view('footer');
	}
	public function coach_form_submit()
	{
		$user_id = $this->session->userdata('user_idd');
		$data['coach_info_save'] = $this->Academic_info_model->coach_info_save($user_id);
	}
		public function free_profile_coach_form_submit()
	{
	     $id4=$this->session->userdata('user_idd');
	    if($id4)
	    {
	    $user_id = $this->session->userdata('user_idd');
		$data['coach_info_save'] = $this->Academic_info_model->free_profile_coach_info_save($user_id);
	    }  
	    
	    else
	    {
		$user_id = $this->session->userdata('userdata');
		$data['coach_info_save'] = $this->Academic_info_model->free_profile_coach_info_save($user_id);
	    }

	}
	public function delete_coach_show($id=null)
	{
		$this->load->view('header');
		$data['coach_inform_del'] = $this->Academic_info_model->coach_inform_del($id);
		$athlete_id = $data['coach_inform_del']['user_id'];
		$data['athlete_info2'] = $this->Academic_info_model->athlete_info2($athlete_id);
		$this->load->view('delete_coach_show',$data);
		$this->load->view('footer');
	}
		public function free_profile_delete_coach_show($id=null)
	{
	  //  echo $id;die;
	    $id43=$this->session->userdata('user_idd');
	   $regid=$this->session->userdata('userriddd');
	  if($regid){
		   $this->load->view('free_header');
		   	$data['athlete_info1'] = $this->Academic_info_model->athlete_infosign();
       }
       if($id43){
            $this->load->view('free_header2');
            $data['athlete_info1'] = $this->Academic_info_model->athlete_info1();
       }
		//$this->load->view('header');
		$data['coach_inform_del'] = $this->Academic_info_model->free_profile_coach_inform_del($id);
		$athlete_id = $data['coach_inform_del']['user_id'];
	//	$data['athlete_info2'] = $this->Academic_info_model->athlete_info2($athlete_id);
		$this->load->view('free_profile_delete_coach_show',$data);
		$this->load->view('footer');
	}
	public function coach_inform_deleted()
	{
		$id = $_POST['id'];
	    $this->Academic_info_model->free_profile_coach_inform_deleted($id);
	}
	public function update_coach_inform($id=null)
	{
		$this->load->view('header');
		$data['coach_inform_get'] = $this->Academic_info_model->coach_infor_get($id);
		$athlete_id = $data['coach_inform_get']['user_id'];
		$data['athlete_info2'] = $this->Academic_info_model->athlete_info2($athlete_id);
		$this->load->view('update_coach_inform',$data);
		$this->load->view('footer');
	}
		public function free_profile_update_coach_inform($id=null)
	{
		 $id44=$this->session->userdata('user_idd');
	   $regid=$this->session->userdata('userriddd');
	  if($regid){
		   $this->load->view('free_header');
		   $data['athlete_info1'] = $this->Academic_info_model->athlete_infosign();
       }
       if($id44){
            $this->load->view('free_header2');
            $data['athlete_info1'] = $this->Academic_info_model->athlete_info1();
       }
		$data['coach_inform_get'] = $this->Academic_info_model->free_profile_coach_infor_get($id);
		$athlete_id = $data['coach_inform_get']['user_id'];
	//	$data['athlete_info2'] = $this->Academic_info_model->athlete_info2($athlete_id);
		$this->load->view('free_profile_update_coach_inform',$data);
		$this->load->view('footer');
	}
	public function coach_inform_update_done()
	{
		$id = $_POST['id'];
		$data = array('name'=>$this->input->post('name'),
		'email'=>$this->input->post('email'),
		'phone'=>$this->input->post('phone'),
		'club_name'=>$this->input->post('club_name'),
		 );
		$this->db->where('id', $id);
		$dooo = $this->db->update('coach_information',$data);
		if($dooo)
		{
		redirect('iscoutyou/athletic_info/');
		}
	}
		public function free_profile_coach_inform_update_done()
	{
		$id = $_POST['id'];
		$data = array('name'=>$this->input->post('name'),
		'email'=>$this->input->post('email'),
		'phone'=>$this->input->post('phone'),
		'club_name'=>$this->input->post('club_name'),
		 );
		$this->db->where('id', $id);
		$dooo = $this->db->update('free_profile_coach_information',$data);
		if($dooo)
		{
		redirect('iscoutyou/free_profile_athletic_info/');
		}
	}
	
	public function video_update()
	{
		$video1=$this->input->post('video1');
		$video2=$this->input->post('video2');
		/* $val3=0;
		if($video1 or $video2)
		{
		   $val3=1;
		}
		//$percentage=$val/20*100;
		$percentage=$val3/1*100;
		$data['video_update12'] = $this->Academic_info_model->video_update_percentage($percentage); */
	    $data['video_update'] = $this->Academic_info_model->video_update();
	}
		public function free_profile_video_update()
	{
	     $id4=$this->session->userdata('user_idd');
	    if($id4)
	    {
	       $data['video_update'] = $this->Academic_info_model->free_profile_video_update4();   
	    }
	    else
	    {
	    $data['video_update'] = $this->Academic_info_model->free_profile_video_update();
	    }
	}
	public function pay()
	{
		if($_GET['tx'])
		{
			
			$this->Signup_model->paypal_response();
		}
		redirect('Iscoutyou/index');
	}
	
	public function positions()
	{
		$data['generate_form_submit'] = $this->Academic_info_model->generate_form_submit();
	}
		public function free_profile_positions()
	{
		
		$data['generate_form_submit'] = $this->Academic_info_model->free_profile_generate_form_submit();
	
	}
	public function paypal_form_submit()
	{
		$deliveryData = array(
					'name1' => $this->input->post('name1'),
					'email1' => $this->input->post('email1'),
					'password1' => $this->input->post('password1'),
					'confirmpassword1' => $this->input->post('confirmpassword1'),
					'games' => $this->input->post('games'),
					'register_amount' => $this->input->post('register_amount')
					);
					
		$this->session->set_userdata('deliverdata', $deliveryData);         #to set the session with the above array

		### for retrieving the session values ###
		$deliveryData1   = $this->session->userdata('deliverdata');          #will return the whole array
		### for retrieving any single element from the session ###
		print_r($deliveryData1);
		//$userid = $this->session->userdata['deliverdata']['name1'];
	}
    public function plan2()
	{
		//$id=$this->session->userdata('user_idd');
	    $regid = $this->session->userdata('userriddd');
	    $login_id = $this->session->userdata('user_idd');
	    if($login_id)
	    {
			
	    $game['athinfo'] = $this->Academic_info_model->free_profile_info_login($login_id);	
	    //print_r($data['athinfo']);die;
	    $gamename=$game['athinfo']['games'];
	    $game['gamee'] = $this->Signup_model->select_get_game($gamename);
	    $game['ind'] = $this->Signup_model->get_game();	
	    $this->load->view('paypal_form_two',$game);
	        
	    }
	    else if($regid)
	    {
			
	    $game['athinfo'] = $this->Academic_info_model->free_profile_info($regid);	
	    //print_r($data['athinfo']);die;
	    $gamename=$game['athinfo']['games'];
	    $game['gamee'] = $this->Signup_model->select_get_game($gamename);
	    $game['ind'] = $this->Signup_model->get_game();	
	    $this->load->view('paypal_form_two',$game);
	    }
	    else
	    {
	    $game['athinfo'] = $this->Academic_info_model->free_profile_info($regid);	
		$game['ind'] = $this->Signup_model->get_game();		
		$this->load->view('paypal_form_two',$game);
	    }
	}	
	public function register()
	{
	    //$id=$this->session->userdata('user_idd');
	    $regid = $this->session->userdata('userriddd');
	    $login_id = $this->session->userdata('user_idd');
	    if($login_id)
	    {
			
	    $game['athinfo'] = $this->Academic_info_model->free_profile_info_login($login_id);	
	    //print_r($data['athinfo']);die;
	    $gamename=$game['athinfo']['games'];
	    $game['gamee'] = $this->Signup_model->select_get_game($gamename);
	    $game['ind'] = $this->Signup_model->get_game();	
	    $this->load->view('paypal_form',$game);
	        
	    }
	    else if($regid)
	    {
			
	    $game['athinfo'] = $this->Academic_info_model->free_profile_info($regid);	
	    //print_r($data['athinfo']);die;
	    $gamename=$game['athinfo']['games'];
	    $game['gamee'] = $this->Signup_model->select_get_game($gamename);
	    $game['ind'] = $this->Signup_model->get_game();	
	    $this->load->view('paypal_form',$game);
	    }
	    else
	    {
	    $game['athinfo'] = $this->Academic_info_model->free_profile_info($regid);	
		$game['ind'] = $this->Signup_model->get_game();		
		$this->load->view('paypal_form',$game);
	    }
	   // $this->session->unset_userdata('user_idd');
	   // $this->session->unset_userdata('userriddd');
	}
	public function register_inational()
	{
	    //$id=$this->session->userdata('user_idd');
	    $regid = $this->session->userdata('userriddd');
	    $login_id = $this->session->userdata('user_idd');
	    if($login_id)
	    {
			
	    $game['athinfo'] = $this->Academic_info_model->free_profile_info_login($login_id);
				
	    print_r($data['athinfo']);die;
	    $gamename=$game['athinfo']['games'];
	    $game['gamee'] = $this->Signup_model->select_get_game($gamename);
	    $game['ind'] = $this->Signup_model->get_game();	
	    $this->load->view('paypal_form_enatioanl',$game);
	        
	    }
	    else if($regid)
	    {
			
	    $game['athinfo'] = $this->Academic_info_model->free_profile_info($regid);	
	    //print_r($data['athinfo']);die;
	    $gamename=$game['athinfo']['games'];
	    $game['gamee'] = $this->Signup_model->select_get_game($gamename);
	    $game['ind'] = $this->Signup_model->get_game();	
	    $this->load->view('paypal_form_enatioanl',$game);
	    }
	    else
	    {
	    $game['athinfo'] = $this->Academic_info_model->free_profile_info($regid);	
		$game['ind'] = $this->Signup_model->get_game();		
		$this->load->view('paypal_form_enatioanl',$game);
	    }
	   // $this->session->unset_userdata('user_idd');
	   // $this->session->unset_userdata('userriddd');
	}
	public function athlete_history()
	{
		if(!$this->session->userdata('user_idd'))
		{
			redirect();
		} 
		else
		{
			$this->load->view('header');
			$data['athlete_info'] = $this->Academic_info_model->athlete_info();	
			$this->load->view('add_atheletic_history',$data);
		}
	}
		public function free_profile_athlete_history()
	{
	     $id4=$this->session->userdata('user_idd');
	     if($id4)
	     {
	         	$this->load->view('free_header2');
			$data['athlete_info1'] = $this->Academic_info_model->athlete_info1();	
			$this->load->view('free_profile_add_athlete_history',$data);
	     }
	     else
	     {
		if(!$this->session->userdata('userdata'))
		{
			redirect();
		}
		else
		{
			$this->load->view('free_header');
		   $data['athlete_info1'] = $this->Academic_info_model->athlete_infosign();	
			$this->load->view('free_profile_add_athlete_history',$data);
		}
	     }
	}
	public function athlete_history_delete($del=null)
	{
		if(!$this->session->userdata('user_idd'))
		{
			redirect();
		}
		else
		{
			if($del)
			 {
		        $data['del'] = $this->Academic_info_model->athlete_history_delete($del);
				if($data)
				{
				$this->load->view('header');
				$data['athlete_info'] = $this->Academic_info_model->athlete_info();	
				$this->load->view('athlete_history_delete',$data);
				}
			 }
		}
	}
		public function free_profile_athlete_history_delete($del=null)
	{
	     $id4=$this->session->userdata('user_idd');
	    if($id4)
	    {
	        	if($del)
			 {
		        $data['del'] = $this->Academic_info_model->free_profile_athlete_history_delete($del);
		      //  print_r($data['del']);die;
				if($data)
				{
				$this->load->view('free_header2');
				$data['athlete_info1'] = $this->Academic_info_model->athlete_info1();	
				$this->load->view('free_profile_athlete_history_delete',$data);
				}
			 }
	        
	    }
	    else
	    {
		if(!$this->session->userdata('userdata'))
		{
			redirect();
		}
		else
		{
			if($del)
			 {
		        $data['del'] = $this->Academic_info_model->free_profile_athlete_history_delete($del);
		      //  print_r($data['del']);die;
				if($data)
				{
				$this->load->view('free_header');
	        	$data['athlete_info1'] = $this->Academic_info_model->athlete_infosign();	
				$this->load->view('free_profile_athlete_history_delete',$data);
				}
			 }
		}
	    }
	}
	public function athlete_history_delete_done()
	{
	    $this->Academic_info_model->athlete_history_delete_done();	
	}
		public function free_profile_athlete_history_delete_done()
	{
	    $this->Academic_info_model->free_profile_athlete_history_delete_done();	
	}
	public function athlete_history_update($del=null)
	{
		if(!$this->session->userdata('user_idd'))
		{
			redirect();
		}
		else
		{
			if($del)
			 {
		        $data['upd'] = $this->Academic_info_model->athlete_history_update($del);
				if($data)
				{
				$this->load->view('header');
				$data['athlete_info'] = $this->Academic_info_model->athlete_info();	
				$this->load->view('athlete_history_update',$data);
				}
			 }
		}
		
	}
		public function free_profile_athlete_history_update($del=null)
	{
	     $id4=$this->session->userdata('user_idd');
	    if($id4)
	    {
	        	if($del)
			 {
		        $data['upd'] = $this->Academic_info_model->free_profile_athlete_history_update($del);
		     //   print_r($data['upd']);die;
				if($data)
				{
				$this->load->view('free_header2');
		    	$data['athlete_info1'] = $this->Academic_info_model->athlete_info1();	
				$this->load->view('free_profile_athlete_history_update',$data);
				}
			 }
	    }
	    else
	    {
		if(!$this->session->userdata('userdata'))
		{
			redirect();
		}
		else
		{
			if($del)
			 {
		        $data['upd'] = $this->Academic_info_model->free_profile_athlete_history_update($del);
		     //   print_r($data['upd']);die;
				if($data)
				{
				$this->load->view('free_header');
		       	$data['athlete_info1'] = $this->Academic_info_model->athlete_infosign();	
				$this->load->view('free_profile_athlete_history_update',$data);
				}
			 }
		}
	    }
		
	}
    public function athletic_history_update_done()
	{
		$this->Academic_info_model->athlete_history_update_done();
	}
	 public function free_profile_athletic_history_update_done()
	{
		$this->Academic_info_model->free_profile_athlete_history_update_done();
	}
	public function athletic_history_submit()
	{
		$this->Academic_info_model->athletic_history_submit();
	}
		public function free_profile_athletic_history_submit()
	{
	     $id4=$this->session->userdata('user_idd');
	    if($id4)
	    {
	       $this->Academic_info_model->free_profile_athletic_history_submit4(); 
	    }
	    else
	    {
		$this->Academic_info_model->free_profile_athletic_history_submit();
	    }
	}
	public function game_stats()
	{
		$this->Academic_info_model->athletic_game_stats();
	}
	public function goals_stats()
	{
		$this->Academic_info_model->athletic_goals_stats();
	}
	public function assists_stats()
	{
		$this->Academic_info_model->athletic_assists_stats();
	}
	public function athlete_stats_add()
	{
		$this->Academic_info_model->athlete_stats_add();
	}
	function logout()
    {
        $this->session->sess_destroy();
        redirect('');
    }
    public function free_profile_register()
    {
        $game['ind'] = $this->Academic_info_model->get_all_game();	
         

        $this->load->view('free_profile_register',$game);
    }
    public function free_profile_register_form()
    {
	    $user_name = $this->input->post('username');
	    $password = $this->input->post('password');
	    $email = $this->input->post('email'); 
		$data['ids'] = $this->Academic_info_model->insert_values();
		$idds = $data['ids'];
		$this->session->set_userdata('userriddd',$idds);
		$this->session->set_userdata('userrrname',$user_name);		 
		redirect('iscoutyou/signin');
    
    }
    	function logout1()
    {
       
        $this->session->sess_destroy();
        redirect('');
    }
    public function signin()
    {    
	
        		if($_POST)
		{
			
			 $data = $this->Login_model->login_query1();
			 
			 if(!empty($data))
			 {
				$this->session->set_userdata('user_idd',$data);
				redirect('iscoutyou/create_profile');	
			 }
			 else
			 {
			 $this->session->set_flashdata('message','Please enter a correct username and password. Note that both fields may be case-sensitive');
			 redirect('Iscoutyou/signin');
	
			 }	
		}
	    else
	    {
			$id = $this->session->userdata('user_idd');
			if($id)
			{
				redirect('iscoutyou/profile');				
			}
			else
			{
				$this->load->view('free_profile_login');
			}
		}
    }
	public function free_profile_sendforgotpasswordemail()
	{
	    $from_email = "contact@isportsrecruiting.com"; 
        $to_email = $this->input->post('email');
       
         $data['email1']=$this->Academic_info_model->allemail_free_profile();
		 
         for($i=0;$i<count($data['email1']);$i++)
         {
         $fg[]=$data['email1'][$i]['email'];		 
         }
		 
         if (in_array($to_email, $fg))
         {
         //Load email library 
         $data['id']=$this->Academic_info_model->getid_free_profile($to_email);
         //print_r($data['id']);die;
         $fg=$data['id'][0]['id'];		 
         $namee=$data['id'][0]['username'];
         $idd=base64_encode($fg);
        
         $this->load->library('email'); 
   
         $this->email->from($from_email, 'Isportsrecruiting Password'); 
         $this->email->to($to_email);
         $this->email->subject('Reset Your Isportsrecruiting Password'); 
        

//$link="<a href='http://iscoutyou.com/iscoutyou/updatepassword'/'.$to_email.">Click Here</a>'"; 
//$link = 'Click on this link -'. base_url().'/iscoutyou/updatepassword?id='.$idd;
//$link = "Click on this link - http://iscoutyou.com/iscoutyou/updatepassword?id=$idd";

//$this->email->message('<a href= "http://iscoutyou2.com/iscoutyou/updatepassword?id="'.$idd.'">Click on this link</a>',true);
$this->email->message('
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Internal_email-29</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<style type="text/css">
			* {
				-ms-text-size-adjust:100%;
				-webkit-text-size-adjust:none;
				-webkit-text-resize:100%;
				text-resize:100%;
			}
			a{
				outline:none;
				color:#40aceb;
				text-decoration:underline;
			}
			a:hover{text-decoration:none !important;}
			.nav a:hover{text-decoration:underline !important;}
			.title a:hover{text-decoration:underline !important;}
			.title-2 a:hover{text-decoration:underline !important;}
			.btn:hover{opacity:0.8;}
			.btn a:hover{text-decoration:none !important;}
			.btn{
				-webkit-transition:all 0.3s ease;
				-moz-transition:all 0.3s ease;
				-ms-transition:all 0.3s ease;
				transition:all 0.3s ease;
			}
			table td {border-collapse: collapse !important;}
			.ExternalClass, .ExternalClass a, .ExternalClass span, .ExternalClass b, .ExternalClass br, .ExternalClass p, .ExternalClass div{line-height:inherit;}
			@media only screen and (max-width:500px) {
				table[class="flexible"]{width:100% !important;}
				table[class="center"]{
					float:none !important;
					margin:0 auto !important;
				}
				*[class="hide"]{
					display:none !important;
					width:0 !important;
					height:0 !important;
					padding:0 !important;
					font-size:0 !important;
					line-height:0 !important;
				}
				td[class="img-flex"] img{
					width:100% !important;
					height:auto !important;
				}
				td[class="aligncenter"]{text-align:center !important;}
				th[class="flex"]{
					display:block !important;
					width:100% !important;
				}
				td[class="wrapper"]{padding:0 !important;}
				td[class="holder"]{padding:30px 15px 20px !important;}
				td[class="nav"]{
					padding:20px 0 0 !important;
					text-align:center !important;
				}
				td[class="h-auto"]{height:auto !important;}
				td[class="description"]{padding:30px 20px !important;}
				td[class="i-120"] img{
					width:120px !important;
					height:auto !important;
				}
				td[class="footer"]{padding:5px 20px 20px !important;}
				td[class="footer"] td[class="aligncenter"]{
					line-height:25px !important;
					padding:20px 0 0 !important;
				}
				tr[class="table-holder"]{
					display:table !important;
					width:100% !important;
				}
				th[class="thead"]{display:table-header-group !important; width:100% !important;}
				th[class="tfoot"]{display:table-footer-group !important; width:100% !important;}
			}
		</style>
	</head>
	<body style="margin:0; padding:0;" bgcolor="#eaeced">
		<table style="min-width:320px;" width="100%" cellspacing="0" cellpadding="0" bgcolor="#eaeced">
			<!-- fix for gmail -->
			<tr>
				<td class="hide">
					<table width="700" cellpadding="0" cellspacing="0" style="width:500px !important;">
						<tr>
							<td style="min-width:500px; font-size:0; line-height:0;">&nbsp;</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td class="wrapper" style="padding:0 10px;">
					<!-- module 1 -->
					<table data-module="module-1" data-thumb="thumbnails/01.png" width="100%" cellpadding="0" cellspacing="0">
						<tr>
							<td data-bgcolor="bg-module" bgcolor="#eaeced">
								
							</td>
						</tr>
					</table>
					<!-- module 2 -->
					<table data-module="module-2" data-thumb="thumbnails/02.png" width="100%" cellpadding="0" cellspacing="0">
						<tr>
							<td data-bgcolor="bg-module" bgcolor="#eaeced">
								<table class="flexible" width="700" align="center" style="margin:0 auto;" cellpadding="0" cellspacing="0">
									
									<tr>
										<td data-bgcolor="bg-block" class="holder" style="padding:58px 60px 0px;" bgcolor="#f9f9f9">
											<table width="100%" cellpadding="0" cellspacing="0">
												<tr>
													<td data-color="title" data-size="size title" data-min="25" data-max="45" data-link-color="link title color" data-link-style="text-decoration:none; color:#292c34;" class="title" align="center" style="font:20px/10px Arial, Helvetica, sans-serif; color:#292c34; padding:0 0 24px;">
														
													</td>
												</tr>
											</table>
										</td>
									</tr>
									<tr style="background: rgb(249, 249, 249);">
										<td class="img-flex" style="text-align: center;"><img src="https://iscoutyou.com/images/logoooo.png" style="vertical-align:top;" width="66%" height="100" alt="" /></td>
									</tr>
									<tr style="background: rgb(249, 249, 249);"><td height="28"></td></tr>
								</table>
							</td>
						</tr>
					</table>
					<!-- module 3 -->
					<table data-module="module-3" data-thumb="thumbnails/03.png" width="100%" cellpadding="0" cellspacing="0">
						<tr>
							<td data-bgcolor="bg-module" bgcolor="#eaeced">
								<table class="flexible" width="700" align="center" style="margin:0 auto;" cellpadding="0" cellspacing="0">
									<tr>
										<td data-bgcolor="bg-block" class="holder" style="padding:30px 60px 50px;" bgcolor="#f9f9f9">
											<table width="100%" cellpadding="0" cellspacing="0">
												<tr>
													<td data-color="title" data-size="size title" data-min="20" data-max="40" data-link-color="link title color" data-link-style="text-decoration:none; color:#292c34;" class="title" align="center" style="font:20px/10px Arial, Helvetica, sans-serif; color:#292c34; padding:0 0 24px; text-align: left;">
														Hi! ' .$namee. '
													</td>
												</tr>
												<tr>
													<td data-color="text" data-size="size text" data-min="10" data-max="26" data-link-color="link text color" data-link-style="font-weight:bold; text-decoration:underline; color:#40aceb;" align="center" style="font:15px/29px Arial, Helvetica, sans-serif; color:#000; padding:0 0 21px;">
														You forgot your password. No worries, it happens to the best of us. Just click bellow <br>
														iScoutYou Sports Recruiting Network
													</td>
												</tr>
												<tr>
													<td style="padding:0 0 20px;">
														<table width="134" align="center" style="margin:0 auto;" cellpadding="0" cellspacing="0">
															<tr>
																<td data-bgcolor="bg-button" data-size="size button" data-min="10" data-max="16" class="btn" align="center" style="font:12px/14px Arial, Helvetica, sans-serif; color:#f8f9fb; text-transform:uppercase; mso-padding-alt:12px 10px 10px; border-radius:2px;" bgcolor="#00e100">
									<a  style="text-decoration:none; color:#f8f9fb; display:block; padding:12px 10px 10px;" href="https://isportsrecruiting.com/iscoutyou/updatepassword_free_profile?id=' .$idd. '">Reset Password</a>
																</td>
															</tr>
															
														</table>
													</td>
												</tr>
												<tr>
													<td data-color="title" data-size="size title" data-min="20" data-max="40" data-link-color="link title color" data-link-style="text-decoration:none; color:#292c34;" class="title" align="center" style="font:20px/10px Arial, Helvetica, sans-serif; color:#292c34; padding:30px 0 24px; text-align: left;"><img src="https://iscoutyou.com/images/roni.png" style="vertical-align:top;" width="20%" height="34%" alt="" />
										<img src="https://iscoutyou.com/images/roni2.png" style="vertical-align:top;     margin-left: 0%;
    margin-top: 4%;" width="47%" height="37%" alt="" />
													</td>
												</tr>
												<tr>
													<td data-color="title" data-size="size title" data-min="20" data-max="40" data-link-color="link title color" data-link-style="text-decoration:none; color:#292c34;" class="title" align="center" style="font:13px/10px Arial, Helvetica, sans-serif; color:#292c34; padding:8px 0 24px; text-align: left;">P.S Perhaps it was by mistake. No big deal, you can safely disregard this email
													</td>
												</tr>
											</table>
										</td>
									</tr>
									<tr><td height="28"></td></tr>
								</table>
							</td>
						</tr>
					</table>
					<!-- module 4 -->
					<!-- module 5 -->
					<!-- module 6 -->
					<!-- module 7 -->
				</td>
			</tr>
			<!-- fix for gmail -->
			<tr>
				<td style="line-height:0;"><div style="display:none; white-space:nowrap; font:15px/1px courier;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div></td>
			</tr>
		</table>
	</body>
</html>',true);
         $this->email->set_mailtype("html");
		 $done = $this->email->send();
   
         //Send mail 
         if($done) 
         {
       // echo "heelo";
       	$this->session->set_flashdata("updatedd","Your Email Is Submitted Successfully So Please Check Your Email"); 
        	redirect('Iscoutyou/forgot_password');
        
         }
         }
         else
         {
            $this->session->set_flashdata("error","Please Use Another Email"); 
        	redirect('Iscoutyou/forgot_password');
         }

	}
		public function updatepassword_free_profile()
	{
	    
	 
	   $this->load->view('updatepassword_free_profile');
	
	}
	public function updateddpassworded_free_profile()
	{
	    $this->Academic_info_model->updateddpassword_free_profile();
	    $this->session->set_flashdata('updated','Your password updated successfully.'); 
	    	redirect('Iscoutyou/signin');

	}
	public function seach_result()
	{
		//echo "hello";
		//echo $arr = $this->input->post('arrayu');die;
		 $data['results_2']=$this->Academic_info_model->search_result_get();
		 echo json_encode($data['results_2']);
		// $this->load->view('find_colleges',$data);
		 
	}
	public function live_seach_result()
	{			
		 $data['results_2'] = $this->Academic_info_model->live_search_result_get();
		 $data['val_count'] = $this->Profile_model->val_count_tick();		 
		 $str = $val_count['university_id'];
		 $alldata = array('search_result'=>$data['results_2'],'tick_count'=>$data['val_count']);
		 
		 echo json_encode($alldata);
		// $this->load->view('find_colleges',$data);
	}
	public function state_wise_universites_live($univ_names)	
	{
	$this->load->view('header');
    $uni_name =  str_replace("%20"," ",$univ_names);	
	//$data['state_wise_universites'] = $this->Admin_info_model->state_wise_universites($uni_name);
     $idd = $this->session->userdata('user_idd'); 
	$datass = $this->Profile_model->find_colleges_counts($uni_name,$idd);
	//echo count($datass);die;
	//print_r($datass);die;
	$id = $this->session->userdata('user_idd');	
	for($i=0;$i<count($datass);$i++)			
	{			
		$all_ids =  $datass[$i]['ID'];	
		$datass[$i]['count'] = $this->Profile_model->fetch_counts($id,$all_ids);			  
		$datass[$i]['email_show'] = $this->Profile_model->fetch_mail_show($id,$all_ids);			  
	}
	/* $data['fatch_count'] =$fetch_counts;
	$alldata = array_merge(); */
	$data['find_colleges'] = $datass;
	
	$data['val_count'] = $this->Profile_model->val_count_tick();
	$this->load->view('state_university_live_users',$data);	
	}
	public function state_wise_universites_free($univ_names)	
	{
		
	$this->load->view('free_header2');
    $uni_name =  str_replace("%20"," ",$univ_names);	
	//$data['state_wise_universites'] = $this->Admin_info_model->state_wise_universites($uni_name);
    $idd = $this->session->userdata('user_idd'); 
	$datass = $this->Profile_model->find_colleges_counts_free($uni_name,$idd);
	//print_r($datass);die;
	$id = $this->session->userdata('user_idd');	
	for($i=0;$i<count($datass);$i++)			
	{			
		$all_ids =  $datass[$i]['ID'];	
		$datass[$i]['count'] = $this->Profile_model->fetch_counts($id,$all_ids);			  
		$datass[$i]['email_show'] = $this->Profile_model->fetch_mail_show($id,$all_ids);			  
	}
	/* $data['fatch_count'] =$fetch_counts;
	$alldata = array_merge(); */
	$data['find_colleges'] = $datass;
	/*  echo "<pre>";
	print_r($datass);die;  */
	$data['val_count'] = $this->Profile_model->val_count_tick();
	$this->load->view('state_university_free_users',$data);	
	}
	
	public function search_result_get_users()
	{
		//echo $arr = $this->input->post('array');die;
		 $data['results_2']=$this->Academic_info_model->search_result_get_users();
		 echo json_encode($data['results_2']);
		// $this->load->view('find_colleges',$data);
		 
	}public function search_result_get_athelete()
	{
		//echo $arr = $this->input->post('array');die;
		 $data['results_2']=$this->Academic_info_model->search_result_get_athelete();
		 echo json_encode($data['results_2']);
		// $this->load->view('find_colleges',$data);
		 
	}
	public function get_university ()
	{
		$data['find_colleges']=$this->Profile_model->find_colleges_count();
		$gh=$data['find_colleges'];
		for($p=0;$p<count($gh);$p++)
		{
		$fggh=$gh[$p]['UNIVERSITY'];
		$give[]=str_replace("'"," ",$fggh);
		}
		echo json_encode($give);
	}
	public function send_mail()
	{
		//echo "cxds";die;
		$data['hell2'] = $this->Academic_info_model->send_mail();
		$ghsk = $data['hell2'];
		//print_r($ghsk);
		for($k=0;$k<=count($data['hell2']);$k++)
		{
			if($data['hell2'][$k]['register_amount']=='p1')
			{
				$email1=$data['hell2'][$k]['email'];
				echo "p1";
		$from_email = "freeathletes@isportsrecruiting.com";
	    $this->load->library('email'); 
       // $to_email = "iscoutyou2@gmail.com";
       $to_email = "freeathletes@isportsrecruiting.com";
         $this->email->from($from_email, 'Create Profile'); 
         $this->email->to($email1);
         $this->email->subject('ISCOUTYOU NEW PROFILE INFORMATION'); 
         $this->email->message("",true);
         $this->email->set_mailtype("html");
         $this->email->set_mailtype("html");
		 $done = $this->email->send();
		 if($done)
		 {
			  $this->Academic_info_model->update_sta_after_mail($email1);
		 }
			}
			if($data['hell2'][$k]['register_amount']=='p2')
			{
				echo "p2";
				$email2=$data['hell2'][$k]['email'];
		$from_email = "freeathletes@isportsrecruiting.com";
	    $this->load->library('email'); 
        $to_email = "freeathletes@isportsrecruiting.com";
       //to_email = "rashmi@codenomad.net";
         $this->email->from($from_email, 'Create Profile'); 
         $this->email->to($email2);
         $this->email->subject('ISPORTSRECRUITIIG NEW PROFILE INFORMATION'); 
         $this->email->message("",true);
         $this->email->set_mailtype("html");
         $this->email->set_mailtype("html");
		 $done = $this->email->send();
		 if($done)
		 {
			   $this->Academic_info_model->update_sta_after_mail($email1);
		 }
			}
		}
	}
	public function freeusermail()
	{
		$data['sendfreemail'] = $this->Academic_info_model->freeusermail();
		$finaldata = $data['sendfreemail'];
		for($i=0;$i<count($finaldata);$i++)
		{
			$email = $finaldata[$i]['email'];
			$date = $finaldata[$i]['date'];
			$next_due_date = date('Y-m-d', strtotime($date. ' +6 days'));
			$next_due_date1 = date('Y-m-d', strtotime($date. ' +8 days'));
			$next_due_date2 = date('Y-m-d', strtotime($date. ' +13 days'));
			$next_due_date3 = date('Y-m-d', strtotime($date. ' +15 days'));
			$next_due_date4 = date('Y-m-d', strtotime($date. ' +20 days'));
			$next_due_date5 = date('Y-m-d', strtotime($date. ' +22 days'));
			$next_due_date6 = date('Y-m-d', strtotime($date. ' +28 days'));
			$next_due_date7 = date('Y-m-d', strtotime($date. ' +30 days'));
			$curerntdata = date('y-m-d');
			if($curerntdata > $next_due_date && $curerntdata<$next_due_date1)
			{
				echo 'yes right1';
			}
			if($curerntdata > $next_due_date2 && $curerntdata<$next_due_date3)
			{
				echo 'yes right2';
			}
			if($curerntdata > $next_due_date4 && $curerntdata<$next_due_date5)
			{
				echo 'yes right3';
			}
			if($curerntdata > $next_due_date6 && $curerntdata<$next_due_date7)
			{
				echo 'yes right4';
			}
			
		}
	}
	/* public function baseball()
	{	
			$this->load->view('header_main');
			$this->load->view('baseball');
			$this->load->view('footer');
	}
	public function basketball()
	{	
			$this->load->view('header_main');
			$this->load->view('basketball');
			$this->load->view('footer');
	}
	
	public function womens_basketball()
	{	
			$this->load->view('header_main');
			$this->load->view('womens-basketball');
			$this->load->view('footer');
	}
		
	public function footballs()
	{	
			$this->load->view('header_main');
			$this->load->view('football');
			$this->load->view('footer');
	}
	public function soccer()
	{	
			$this->load->view('header_main');
			$this->load->view('soccer');
			$this->load->view('footer');
	}
	public function mens_soccer()
	{	
			$this->load->view('header_main');
			$this->load->view('mens-soccer');
			$this->load->view('footer');
	}
	public function womens_soccer()
	{	
			$this->load->view('header_main');
			$this->load->view('womens-soccer');
			$this->load->view('footer');
	}
	public function softball()
	{	
			$this->load->view('header_main');
			$this->load->view('softball');
			$this->load->view('footer');
	}
	public function cross_country_mens()
	{	
			$this->load->view('header_main');
			$this->load->view('cross-country-mens');
			$this->load->view('footer');
	}
	public function cross_country_womens()
	{	
			$this->load->view('header_main');
			$this->load->view('cross-country-womens');
			$this->load->view('footer');
	}
	
	public function mens_bowling()
	{	
			$this->load->view('header_main');
			$this->load->view('mens-bowling');
			$this->load->view('footer');
	}
	public function womens_bowling()
	{	
			$this->load->view('header_main');
			$this->load->view('womens-bowling');
			$this->load->view('footer');
	}
	public function beach_volleyball()
	{	
			$this->load->view('header_main');
			$this->load->view('beach-volleyball');
			$this->load->view('footer');
	}
	public function cheerleading()
	{	
			$this->load->view('header_main');
			$this->load->view('cheerleading');
			$this->load->view('footer');
	}
	public function mens_fencing()
	{	
			$this->load->view('header_main');
			$this->load->view('mens-fencing');
			$this->load->view('footer');
	}
	public function womens_fencing()
	{	
			$this->load->view('header_main');
			$this->load->view('womens-fencing');
			$this->load->view('footer');
	}
	public function field_hockey()
	{	
			$this->load->view('header_main');
			$this->load->view('field-hockey');
			$this->load->view('footer');
	}
		public function mens_golf()
	{	
			$this->load->view('header_main');
			$this->load->view('mens-golf');
			$this->load->view('footer');
	}
		public function womens_golf()
	{	
			$this->load->view('header_main');
			$this->load->view('womens-golf');
			$this->load->view('footer');
	}
		public function mens_gymnastics()
	{	
			$this->load->view('header_main');
			$this->load->view('mens-gymnastics');
			$this->load->view('footer');
	}
		public function womens_gymnastics()
	{	
			$this->load->view('header_main');
			$this->load->view('womens-gymnastics');
			$this->load->view('footer');
	}
		public function mens_ice_hockey()
	{	
			$this->load->view('header_main');
			$this->load->view('mens-ice-hockey');
			$this->load->view('footer');
	}
		public function womens_ice_hockey()
	{	
			$this->load->view('header_main');
			$this->load->view('womens-ice-hockey');
			$this->load->view('footer');
	}
		public function mens_lacrosse()
	{	
			$this->load->view('header_main');
			$this->load->view('mens-lacrosse');
			$this->load->view('footer');
	}
		public function womens_lacrosse()
	{	
			$this->load->view('header_main');
			$this->load->view('womens-lacrosse');
			$this->load->view('footer');
	}
		public function mens_swimming_diving()
	{	
			$this->load->view('header_main');
			$this->load->view('mens-swimming-diving');
			$this->load->view('footer');
	}
		public function womens_swimming_diving()
	{	
			$this->load->view('header_main');
			$this->load->view('womens-swimming-diving');
			$this->load->view('footer');
	}
		public function mens_track_field()
	{	
			$this->load->view('header_main');
			$this->load->view('mens-track-field');
			$this->load->view('footer');
	}
		public function womens_track_field()
	{	
			$this->load->view('header_main');
			$this->load->view('womens-track-field');
			$this->load->view('footer');
	}
		public function rugby()
	{	
			$this->load->view('header_main');
			$this->load->view('rugby');
			$this->load->view('footer');
	}
		public function mens_tennis()
	{	
			$this->load->view('header_main');
			$this->load->view('mens-tennis');
			$this->load->view('footer');
	}
		public function womens_tennis()
	{	
			$this->load->view('header_main');
			$this->load->view('womens-tennis');
			$this->load->view('footer');
	}
		public function mens_rowing()
	{	
			$this->load->view('header_main');
			$this->load->view('mens-rowing');
			$this->load->view('footer');
	}
		public function womens_rowing()
	{	
			$this->load->view('header_main');
			$this->load->view('womens-rowing');
			$this->load->view('footer');
	}
		public function mens_volleyball()
	{	
			$this->load->view('header_main');
			$this->load->view('mens-volleyball');
			$this->load->view('footer');
	}
		public function womens_volleyball()
	{	
			$this->load->view('header_main');
			$this->load->view('womens-volleyball');
			$this->load->view('footer');
	}
		public function wrestling()
	{	
			$this->load->view('header_main');
			$this->load->view('wrestling');
			$this->load->view('footer');
	}
	public function water_polo_mens()
	{	
			$this->load->view('header_main');
			$this->load->view('water-polo-mens');
			$this->load->view('footer');
	}
	public function water_polo_womens()
	{	
			$this->load->view('header_main');
			$this->load->view('water-polo-womens');
			$this->load->view('footer');
	} */
	
	public function recruiting($name=null)
	{	
	
		$idarray =  $this->Academic_info_model->get_sports_id($name);
		//print_r($idarray );die;
		$id= $idarray['id'];//28
		if($id)
	    {	
		        $data['sporty'] = $this->Academic_info_model->sports_detail($id);
				//echo "<pre>";
				//print_r($data['sporty']);die;
		        $data['seo'] = $this->Academic_info_model->sports_seodetail($id);
				$data['name'] = $name;
				$data['get_sports_name'] = $this->Academic_info_model->get_sports_name($id);
				$this->load->view('header_main',$data);
				if($data)
				{
					$this->load->view('about_sports',$data);
				}
				$this->load->view('footer');
			
		}
		else
		{
			// $this->output->set_status_header('404');
			$this->load->view('error404'); 
		}
	
	}
	
	public function financial_aid_options()
	{
		$this->load->view('header_main');
		$this->load->view('financial_aid_options.php');
		$this->load->view('footer');
	}
}
?>