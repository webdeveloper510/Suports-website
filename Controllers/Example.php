<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Example extends CI_Controller
{
	public function __construct() 
	{
	    parent::__construct();
	    $this->load->library('session');
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('Signup_model');
		$this->load->model('Profile_model');
		$this->load->model('Login_model');	
        $this->load->model('Academic_info_model');	
		$this->load->model('Admin_info_model');
		$this->load->library('Authorize_net');
    }

	public function index()
	{ 	  
		 
		 $this->session->unset_userdata('user_idd');
		 $this->session->unset_userdata('userriddd');
		 $name = $this->input->post('name1');
		 $stat = $this->input->post('hiddeninput1');
		 $reffered = $this->input->post('reffered');
		 $additional_fee = $this->input->post('additional_fee');
		 $email = $this->input->post('email1');
		 $password =$this->input->post('password1');
		 $confirmpassword = $this->input->post('confirmpassword1');
		 $games = $this->input->post('games');
		 $register_amount = $this->input->post('register_amount');
		 $country = $this->input->post('country');
		 $state = $this->input->post('state');
		 $curr_date = date('Y-m-d');
		 $amount_simple = $this->input->post('amount');	 
		 $amount = 	$amount_simple + $additional_fee;
		 $card_no1 = $this->input->post('card_no');
		 $card_no = base64_encode($card_no1);
		 $exp_date1 = $this->input->post('exp_date');
		 $exp_date = base64_encode($exp_date1);
		 $cvv1 = $this->input->post('cvv');
		 $cvv = base64_encode($cvv1);
		 $zip = $this->input->post('zip');
		 $this->db->where('email',$email);
		 $query = $this->db->get('users');
		if ($query->num_rows() > 0)
		{
				
				$msg = 0;
				echo $msg;
				
		}
		else
		{ 
	
		  $data = array('username'=>$name,'email'=>$email,'password'=>md5($password),'confirmpassword'=>md5($confirmpassword),'games'=>$games,'register_amount'=>$register_amount , 'status' =>1 , 'register_date'=> $curr_date, 'country'=> $country, 'state'=> $state,'stat'=>$stat,'amount'=>$amount,'card_no'=>$card_no,'exp_date'=>$exp_date,'cvv'=>$cvv,'zip'=>$zip,'reffered_by'=>$reffered,'additional_fee'=>$additional_fee);
		  
		     
			 $in = $this->db->insert('users', $data);			 
			 $get_uid = $this->db->insert_id();
			 $insert_id = $this->db->insert_id();
			 if($in)
				{
					
					$this->db->select('*'); 
					$this->db->from('users_recruiting');
					$this->db->where('username', $reffered);
					$query = $this->db->get();
					$result = $query->result_array();
					$count = count(result);
					// echo $count 

					if (empty($count))
						{
						
						 $save_refferd = array ('username'=>$reffered,'password'=>md5('password@123'));
						 $savedata = $this->db->insert('users_recruiting', $save_refferd);
						
						}				  
				}
			 
			 $message ="<div style='width:97%;float:left;border-radius: 9px;border: 1px solid rgba(110, 195, 51, 0.99);padding:10px;'><div class='main-img'><img src='http://isportsrecruiting.com/images/logo.png'/></div><h3 style='font-size: 22px;text-decoration: underline;color:#00E100;'>Welcome,$name!</h3><p style='font-size: 16px;'>Thanks for joining our team!  Here’s a quick guide and steps to follow.</p><div style='width:100%;float:left;'><h1 style='color:#00E100;'>Profile</h1><p style='font-size: 16px;'>We recommend that you complete your</p><ul><li style='font-size: 16px;line-height:  30px;'>Basic Information</li><li style='font-size: 16px;line-height:  30px;'>Academic Information</li><li style='font-size: 16px;line-height:  30px;'>Athletic Information</li></ul><p style='font-size: 16px;'>At least 90% before you send your email/profile to college coaches.</p></div><div style='width:100%;float:left;'><h1 style='color:#00E100;'>Contact</h1><p style='font-size: 16px;'>How can I recruit you, if I don’t know who you are?  Make sure you contact as many coaches as possible using our tools.</p></div><div style='width:100%;float:left;'><h1 style='color:#00E100;'>Research</h1><p style='font-size: 16px;'>iScoutYou recommends for you to read “About Recruiting” in our main page, there is a valuable information for you to take advantage of. </p><p style='font-size: 16px;'>Best of luck on your recruiting process!</p><p style='font-size: 16px;'>And remember; “ Success doesn’t just come and find you, you have to go out and get it” Kush Andwizdom</p></div><div style='width:100%;float:left;'><h2 style='color:#00E100;'>iSportsRecruiting team,</h2></div>
				<img style='width: 426px;' src='https://isportsrecruiting.com/images/sprt.png'>
			</div>";
			$this->load->library('email');
			$this->email->to($email);
			$this->email->from("Registration@iSportsRecruiting.com");
			$this->email->subject("Welcome to iSportsRecruiting");
			$this->email->message($message);
			$this->email->set_mailtype("html");
			$done = $this->email->send();			 
			 
			 
			 $data1 = array('first_name'=>$name,'email'=>$email,'user_id'=>$insert_id,'games'=>$games,'country'=>$country,'state'=>$state);
				$in1 = $this->db->insert('athletes_profile', $data1);
				$data2 = array('user_id'=>$insert_id,'sports_id'=>$games);
				$in2 = $this->db->insert('athlete_stats_value', $data2);
			
			// error_reporting(E_ERROR | E_PARSE);
			$new_date = date("Y-m-d");
			$data3 = array('user_id'=>$insert_id,'date'=>$new_date,'plan'=>$register_amount,'status'=>1,'register_date'=>$curr_date);
			$in3 = $this->db->insert('crone_job_table',$data3); 
			$this->session->set_flashdata('signup', 'Thankyou For The Registration,Please Login Your Account Right Now');
			$this->email->to('newathlete@isportsrecruiting.com');
		    //$this->email->to('sandeep@codenomad.net'); 
			$this->email->from("registration@isportsrecruiting.com");
			$this->email->subject("Welcome to iSportsRecruiting");
			 $message12="<div style='width:100%;float:left;text-align:center;padding:10px;'><div style='margin:0 auto;width:85%;background:#f5f5f5;border:2px solid #f5f5f5;'><div style='background: #fff;padding: 21px;border-bottom: 4px solid #00E100;'><img src='http://isportsrecruiting.com/images/logo.png'/></div><p style='padding: 20px;font-size: 24px;line-height: 50px;color:#000;'>New Athelete <img style='margin-top: -26px;float: left;' src='https://content.nike.com/content/dam/one-nike/globalAssets/menu_header_images/OneNike_Global_Nav_Icons_Football.png'> <strong> $name </strong> is register to your site   <strong>https://isportsrecruiting.com</strong> with this email <strong> $email </strong> and selected plan  <strong> $amount </strong> </p></div></div>";
			$this->email->message($message12);
			$this->email->set_mailtype("html");
			$done = $this->email->send();
			$msg = 1;
			echo $msg;
			 
			 
			 $auth_net = array(
			'x_card_num'			=> $card_no1,
			'x_exp_date'			=> $exp_date1,
			'x_card_code'			=> $cvv1,			
			'x_amount'				=> $amount,
			'x_first_name'			=> $name,			
			'x_state'				=> $state,
			'x_zip'					=> $zip,
			'x_country'				=> $country,			
			'x_email'				=> $email,
			'x_customer_ip'			=> $this->input->ip_address(),
			);
			
			 $this->authorize_net->setData($auth_net);
			 
             $reslts = $this->authorize_net->authorizeAndCapture();
			 
			 
			 $this->Signup_model->update_stat_after_payment($get_uid,$new_date);
			 $this->load->library('email');
								$this->email->to($email);
								$this->email->to('payments@isportsrecruiting.com');
								$this->email->from("registration@isportsrecruiting.com");
								$this->email->subject("Welcome to iSportsRecruiting");
				if(isset($reslts['transation_id']))
				{
					$transation_id = $reslts['transation_id'];
					$this->email->message(" Amount is deducted from Your Account $name account $amount amount. </br>Transaction Id: $transation_id  Thank you!");
				}				
				else {
					$this->email->message($reslts);
				}
				
				 $this->email->set_mailtype("html");
				 $done = $this->email->send();	
				 
								$this->email->to('payments@isportsrecruiting.com');
								//$this->email->to('ronnie@iscoutyou.com');
								$this->email->from("registration@isportsrecruiting.com");
								$this->email->subject("Welcome to iSportsRecruiting");

				if(isset($reslts['transation_id']))
				{
					$transation_id = $reslts['transation_id'];
					$approval_code = $reslts['approval_code'];
						$message2="Amount is deducted from the Athlete $name account $amount amount. </br>Transaction Id: $transation_id <br/> Approval Code: $approval_code";
								$this->email->message($message2);
				}
				else
				{
					$this->email->message($reslts);
				}
					
								$this->email->set_mailtype("html");
								$done = $this->email->send();
				
			 
						
		}
	}
	//second plan code here start
	public function second_plan()
	{ 	  
		 
		 $this->session->unset_userdata('user_idd');
		 $this->session->unset_userdata('userriddd');
		 $name = $this->input->post('name1');
		 $stat = $this->input->post('hiddeninput1');
		 $reffered = $this->input->post('reffered');
		 $additional_fee = $this->input->post('additional_fee');
		 $email = $this->input->post('email1');
		 $password =$this->input->post('password1');
		 $confirmpassword = $this->input->post('confirmpassword1');
		 $games = $this->input->post('games');
		 $register_amount = $this->input->post('register_amount');
		 $country = $this->input->post('country');
		 $state = $this->input->post('state');
		 $curr_date = date('Y-m-d');
		 $amount_simple = $this->input->post('amount');	 
		 $amount = 	$register_amount + $additional_fee;
		 $card_no1 = $this->input->post('card_no');
		 $card_no = base64_encode($card_no1);
		 $exp_date1 = $this->input->post('exp_date');
		 $exp_date = base64_encode($exp_date1);
		 $cvv1 = $this->input->post('cvv');
		 $cvv = base64_encode($cvv1);
		 $zip = $this->input->post('zip');
		 $this->db->where('email',$email);
		 $query = $this->db->get('users');
		if ($query->num_rows() > 0)
		{
				
				$msg = 0;
				echo $msg;
				
		}
		else
		{ 
	
		  $data = array('username'=>$name,'email'=>$email,'password'=>md5($password),'confirmpassword'=>md5($confirmpassword),'games'=>$games,'register_amount'=>$register_amount , 'status' =>1 , 'register_date'=> $curr_date, 'country'=> $country, 'state'=> $state,'stat'=>$stat,'amount'=>$amount,'card_no'=>$card_no,'exp_date'=>$exp_date,'cvv'=>$cvv,'zip'=>$zip,'reffered_by'=>$reffered,'additional_fee'=>$additional_fee);
		  
		     
			 $in = $this->db->insert('users', $data);			 
			 $get_uid = $this->db->insert_id();
			 $insert_id = $this->db->insert_id();
			 if($in)
				{
					
					$this->db->select('*'); 
					$this->db->from('users_recruiting');
					$this->db->where('username', $reffered);
					$query = $this->db->get();
					$result = $query->result_array();
					$count = count(result);
					// echo $count 

					if (empty($count))
						{
						
						 $save_refferd = array ('username'=>$reffered,'password'=>md5('password@123'));
						 $savedata = $this->db->insert('users_recruiting', $save_refferd);
						
						}				  
				}
			 
			 $message ="<div style='width:97%;float:left;border-radius: 9px;border: 1px solid rgba(110, 195, 51, 0.99);padding:10px;'><div class='main-img'><img src='http://isportsrecruiting.com/images/logo.png'/></div><h3 style='font-size: 22px;text-decoration: underline;color:#00E100;'>Welcome,$name!</h3><p style='font-size: 16px;'>Thanks for joining our team!  Here’s a quick guide and steps to follow.</p><div style='width:100%;float:left;'><h1 style='color:#00E100;'>Profile</h1><p style='font-size: 16px;'>We recommend that you complete your</p><ul><li style='font-size: 16px;line-height:  30px;'>Basic Information</li><li style='font-size: 16px;line-height:  30px;'>Academic Information</li><li style='font-size: 16px;line-height:  30px;'>Athletic Information</li></ul><p style='font-size: 16px;'>At least 90% before you send your email/profile to college coaches.</p></div><div style='width:100%;float:left;'><h1 style='color:#00E100;'>Contact</h1><p style='font-size: 16px;'>How can I recruit you, if I don’t know who you are?  Make sure you contact as many coaches as possible using our tools.</p></div><div style='width:100%;float:left;'><h1 style='color:#00E100;'>Research</h1><p style='font-size: 16px;'>iScoutYou recommends for you to read “About Recruiting” in our main page, there is a valuable information for you to take advantage of. </p><p style='font-size: 16px;'>Best of luck on your recruiting process!</p><p style='font-size: 16px;'>And remember; “ Success doesn’t just come and find you, you have to go out and get it” Kush Andwizdom</p></div><div style='width:100%;float:left;'><h2 style='color:#00E100;'>iSportsRecruiting team,</h2></div>
				<img style='width: 426px;' src='https://isportsrecruiting.com/images/sprt.png'>
			</div>";
			$this->load->library('email');
			$this->email->to($email);
			$this->email->from("Registration@iSportsRecruiting.com");
			$this->email->subject("Welcome to iSportsRecruiting");
			$this->email->message($message);
			$this->email->set_mailtype("html");
			$done = $this->email->send();			 
			 
			 
			 $data1 = array('first_name'=>$name,'email'=>$email,'user_id'=>$insert_id,'games'=>$games,'country'=>$country,'state'=>$state);
				$in1 = $this->db->insert('athletes_profile', $data1);
				$data2 = array('user_id'=>$insert_id,'sports_id'=>$games);
				$in2 = $this->db->insert('athlete_stats_value', $data2);
			
			// error_reporting(E_ERROR | E_PARSE);
			$new_date = date("Y-m-d");
			$data3 = array('user_id'=>$insert_id,'date'=>$new_date,'plan'=>$register_amount,'status'=>1,'register_date'=>$curr_date);
			$in3 = $this->db->insert('crone_job_table',$data3); 
			$this->session->set_flashdata('signup', 'Thankyou For The Registration,Please Login Your Account Right Now');
			$this->email->to('newathlete@isportsrecruiting.com');
		    //$this->email->to('sandeep@codenomad.net'); 
			$this->email->from("registration@isportsrecruiting.com");
			$this->email->subject("Welcome to iSportsRecruiting");
			 $message12="<div style='width:100%;float:left;text-align:center;padding:10px;'><div style='margin:0 auto;width:85%;background:#f5f5f5;border:2px solid #f5f5f5;'><div style='background: #fff;padding: 21px;border-bottom: 4px solid #00E100;'><img src='http://isportsrecruiting.com/images/logo.png'/></div><p style='padding: 20px;font-size: 24px;line-height: 50px;color:#000;'>New Athelete <img style='margin-top: -26px;float: left;' src='https://content.nike.com/content/dam/one-nike/globalAssets/menu_header_images/OneNike_Global_Nav_Icons_Football.png'> <strong> $name </strong> is register to your site   <strong>https://isportsrecruiting.com</strong> with this email <strong> $email </strong> and selected plan  <strong> $amount </strong> </p></div></div>";
			$this->email->message($message12);
			$this->email->set_mailtype("html");
			$done = $this->email->send();
			$msg = 1;
			echo $msg;
			 
			 
			 $auth_net = array(
			'x_card_num'			=> $card_no1,
			'x_exp_date'			=> $exp_date1,
			'x_card_code'			=> $cvv1,			
			'x_amount'				=> $amount,
			'x_first_name'			=> $name,			
			'x_state'				=> $state,
			'x_zip'					=> $zip,
			'x_country'				=> $country,			
			'x_email'				=> $email,
			'x_customer_ip'			=> $this->input->ip_address(),
			);
			
			 $this->authorize_net->setData($auth_net);
			 
             $reslts = $this->authorize_net->authorizeAndCapture();
			 
			 
			 $this->Signup_model->update_stat_after_payment($get_uid,$new_date);
			 $this->load->library('email');
								$this->email->to($email);
								$this->email->to('payments@isportsrecruiting.com');
								$this->email->from("registration@isportsrecruiting.com");
								$this->email->subject("Welcome to iSportsRecruiting");
				if(isset($reslts['transation_id']))
				{
					$transation_id = $reslts['transation_id'];
					$this->email->message(" Amount is deducted from Your Account $name account $amount amount. </br>Transaction Id: $transation_id  Thank you!");
				}				
				else {
					$this->email->message($reslts);
				}
				
				 $this->email->set_mailtype("html");
				 $done = $this->email->send();	
				 
								$this->email->to('payments@isportsrecruiting.com');
								//$this->email->to('ronnie@iscoutyou.com');
								$this->email->from("registration@isportsrecruiting.com");
								$this->email->subject("Welcome to iSportsRecruiting");

				if(isset($reslts['transation_id']))
				{
					$transation_id = $reslts['transation_id'];
					$approval_code = $reslts['approval_code'];
						$message2="Amount is deducted from the Athlete $name account $amount amount. </br>Transaction Id: $transation_id <br/> Approval Code: $approval_code";
								$this->email->message($message2);
				}
				else
				{
					$this->email->message($reslts);
				}
					
								$this->email->set_mailtype("html");
								$done = $this->email->send();
				
			 
						
		}
	}
	//second plan code here end
	public function  camp_users_payment()
	{
		 $curr_date = date('Y-m-d');
		 $amount = '195';
		 $name = $this->input->post('name');	 
		 $email = $this->input->post('email');	 
		 $phone_no = $this->input->post('phone_no');
		 $card_no1 = $this->input->post('card-number');
		 $card_no = base64_encode($card_no1);
		 $exp_date1 = $this->input->post('exp_date');
		 $exp_date = base64_encode($exp_date1);
		 $cvv1 = $this->input->post('cvv');
		 $cvv = base64_encode($cvv1);
		 $this->db->where('email',$email);
		 $query = $this->db->get('camp_payment_data');
		if ($query->num_rows() > 0)
		{
				
				$msg = 0;
				echo $msg;
				
		}
		else
		{
			$data = array('user_name'=>$name,'email'=>$email,'phone_no'=>$phone_no,'card_no'=>$card_no,'exp_date'=>$exp_date,'cvv'=>$cvv,'amount'=>$amount,'payment_status'=>"",'payment_date'=>$curr_date);
			$save = $this->db->insert('camp_payment_data', $data);
			$get_uid = $this->db->insert_id();
			 if($save);
			 {
				 echo "1";
			 }
			$auth_net = array(
			'x_card_num'			=> $card_no1,
			'x_exp_date'			=> $exp_date1,
			'x_card_code'			=> $cvv1,			
			'x_amount'				=> $amount,
			'x_first_name'			=> $name,						
			'x_email'				=> $email,
			'x_customer_ip'			=> $this->input->ip_address(),
			);			
			 $this->authorize_net->setData($auth_net);
			 
             $reslts = $this->authorize_net->authorizeAndCapture();
			 
			 
			 $this->Signup_model->update_stat_after_payment_camp($get_uid,$curr_date);
			 $this->load->library('email');
								$this->email->to($email);
								$this->email->to('Payments@isportsrecruiting.com');
								//$this->email->to('sandeep@codenomad.net');
								$this->email->from("Registration@isportsrecruiting.com");
								$this->email->subject("AZ Soccer Camp");
				if(isset($reslts['transation_id']))
				{
					$transation_id = $reslts['transation_id'];
					$this->email->message(" <img src='https://isportsrecruiting.com/images/black-logo.png' alt='isr_logo' height='63' width='88'><br/><br/>Thank you for your registration, $name , </br></br> iSportsRecruiting Team will keep you updated on any changes, please let us know if you have any questions.  </br>Transaction Id: $transation_id  </br> Amount Paid: $195 </br>See you at the camp! </br></br>Best regards!");
				}				
				else
				{
					$this->email->message($reslts);
				}
				
				 $this->email->set_mailtype("html");
				 $done = $this->email->send();	
								
								$this->email->to('Payments@isportsrecruiting.com');
								//$this->email->to('sandeep@codenomad.net');
								$this->email->from("Registration@isportsrecruiting.com");
								$this->email->subject("AZ Soccer Camp");

				if(isset($reslts['transation_id']))
				{
					$transation_id = $reslts['transation_id'];
					$approval_code = $reslts['approval_code'];
						$message2="New Athlete Registred for Camp and  Amount is deducted from the Athlete $name account $amount amount. </br>Transaction Id: $transation_id <br/> Approval Code: $approval_code";
								$this->email->message($message2);
				}
				else
				{
					$this->email->message($reslts);
				}
					
								$this->email->set_mailtype("html");
								$done = $this->email->send();
				
			 
			 
		}
	}
	public function index1()
	{			

		$data['get_record'] = $this->Signup_model->select_all_users();
		//echo "<pre>";		
		// print_r($data['get_record']);die;
		/* echo "<pre>";
				print_r($data['get_record'][$i]); */
		$lengthh = count($data['get_record']);
		//print_r($lengthh);
		for($i=0;$i<count($data['get_record']);$i++)
			{
				 $data['get_record'][$i]['recurpaymentstop'];
				
				if($data['get_record'][$i]['recurpaymentstop'] == 0)
				{
					
				$datee = $data['get_record'][$i]['register_date'];
				$first_date = $data['get_record'][$i]['payment_date'];
			    $get_uid = $data['get_record'][$i]['user_id'];
				$card_no1 = $data['get_record'][$i]['card_no'];
				$cvv1 = $data['get_record'][$i]['cvv'];
				$exp_date1 = $data['get_record'][$i]['exp_date'];
				$card_no = base64_decode($card_no1);
				$cvv = base64_decode($cvv1);
				$exp_date = base64_decode($exp_date1);
				$user_name = $data['get_record'][$i]['username'];
				$state=$data['get_record'][$i]['state'];
				$country=$data['get_record'][$i]['country'];
				$zip=$data['get_record'][$i]['zip'];
				$email=$data['get_record'][$i]['email'];
				$amount=$data['get_record'][$i]['amount'];				
								
				$next_due_date = date('Y-m-d', strtotime($first_date. ' +30 days'));
				
			    $curr_date = date('Y-m-d');				
						
				if($curr_date>$next_due_date)
				{ 
					 $auth_net = array(
					'x_card_num'			=> $card_no,
					'x_exp_date'			=> $exp_date,
					'x_card_code'			=> $cvv,			
					'x_amount'				=> $amount,
					'x_first_name'			=> $user_name,			
					'x_state'				=> $state,
					'x_zip'					=> $zip,
					'x_country'				=> $country,			
					'x_email'				=> $email,
					'x_customer_ip'			=> $this->input->ip_address(),
					);
			
					 $this->authorize_net->setData($auth_net);
					 
					 $reslts = $this->authorize_net->authorizeAndCapture();
					 
					 
					 $this->Signup_model->update_stat_after_payment($get_uid,$new_date);
					 $this->load->library('email');
								$this->email->to($email);
								$this->email->to('newathlete@isportsrecruiting.com');
								$this->email->from("registration@isportsrecruiting.com");
								$this->email->subject("Welcome to iSportsRecruiting");
					if(isset($reslts['transation_id']))
					{
						$transation_id = $reslts['transation_id'];
						$this->email->message(" Amount is deducted from Your Account $user_name account $amount amount. </br>Transaction Id: $transation_id  Thank you!");
					}				
					else
					{
						$this->email->message($reslts);
					}
					
					 $this->email->set_mailtype("html");
					 $done = $this->email->send();	
				 
								$this->email->to('newathlete@isportsrecruiting.com');
								//$this->email->to('ronnie@iscoutyou.com');
								$this->email->from("registration@isportsrecruiting.com");
								$this->email->subject("Welcome to iSportsRecruiting");

					if(isset($reslts['transation_id']))
					{
						$transation_id = $reslts['transation_id'];
						$approval_code = $reslts['approval_code'];
							$message2="Amount is deducted from the Athlete $user_name account $amount amount. </br>Transaction Id: $transation_id <br/> Approval Code: $approval_code";
									$this->email->message($message2);
					}
					else
					{
						$this->email->message($reslts);
					}
					
								$this->email->set_mailtype("html");
								$done = $this->email->send();
				
					
				}
			}
		}
	}



        public function Inatioanal()
	{
			 // get data from from using ajax
			 $this->session->unset_userdata('user_idd');
			 $this->session->unset_userdata('userriddd');
			 $name = $this->input->post('name1');
			 $add_fee = $this->input->post('add_fee');
		     $reff_by = $this->input->post('reff_by');
			 $stat=$this->input->post('hiddeninput1');
			 $email = $this->input->post('email1');
			 $password =$this->input->post('password1');
			 $confirmpassword = $this->input->post('confirmpassword1');
			 $games = $this->input->post('games');
			 $register_amount = $this->input->post('register_amount');
			 $country = $this->input->post('country');
			 $state = $this->input->post('state');
			 $curr_date = date('Y-m-d');
			 $plan_amount = $this->input->post('amount');	
			 $amount = 	$plan_amount + $add_fee;
		     $card_no1 = $this->input->post('card_no');
			 $card_no = base64_encode($card_no1);
		     $exp_date1 = $this->input->post('exp_date');
			 $exp_date = base64_encode($exp_date1);
		     $cvv1 = $this->input->post('cvv');
			 $cvv = base64_encode($cvv1);
		     $zip = $this->input->post('zip');		     
			 $this->db->where('email',$email);
			 $query = $this->db->get('users');
			if ($query->num_rows() > 0)
			{
				
				$msg = 0;
				echo $msg;
				
			}
			else
			{
				// inset if user not already registerd and send email.
				
				 $data = array('username'=>$name,'email'=>$email,'password'=>md5($password),'confirmpassword'=>md5($confirmpassword),'games'=>$games,'register_amount'=>$register_amount , 'status' =>1 , 'register_date'=> $curr_date, 'country'=> $country, 'state'=> $state,'stat'=>$stat,'amount'=>$amount,'card_no'=>$card_no,'exp_date'=>$exp_date,'cvv'=>$cvv,'zip'=>$zip,'additional_fee'=>$add_fee,'reffered_by'=>$reff_by);		 
			
			 
				 $in = $this->db->insert('users', $data);
				 $insert_id = $this->db->insert_id();
				 $get_uid = $this->db->insert_id();
				 if($in)
				{
				 $save_refferd = array ('username'=>$reff_by,'password'=>md5('password@123'));
				  $savedata = $this->db->insert('users_recruiting', $save_refferd);
				  
				}
				 $message ="<div style='width:97%;float:left;border-radius: 9px;border: 1px solid rgba(110, 195, 51, 0.99);padding:10px;'><div class='main-img'><img src='http://isportsrecruiting.com/images/logo.png'/></div><h3 style='font-size: 22px;text-decoration: underline;color:#00E100;'>Welcome,$name!</h3><p style='font-size: 16px;'>Thanks for joining our team!  Here’s a quick guide and steps to follow.</p><div style='width:100%;float:left;'><h1 style='color:#00E100;'>Profile</h1><p style='font-size: 16px;'>We recommend that you complete your</p><ul><li style='font-size: 16px;line-height:  30px;'>Basic Information</li><li style='font-size: 16px;line-height:  30px;'>Academic Information</li><li style='font-size: 16px;line-height:  30px;'>Athletic Information</li></ul><p style='font-size: 16px;'>At least 90% before you send your email/profile to college coaches.</p></div><div style='width:100%;float:left;'><h1 style='color:#00E100;'>Contact</h1><p style='font-size: 16px;'>How can I recruit you, if I don’t know who you are?  Make sure you contact as many coaches as possible using our tools.</p></div><div style='width:100%;float:left;'><h1 style='color:#00E100;'>Research</h1><p style='font-size: 16px;'>iScoutYou recommends for you to read “About Recruiting” in our main page, there is a valuable information for you to take advantage of. </p><p style='font-size: 16px;'>Best of luck on your recruiting process!</p><p style='font-size: 16px;'>And remember; “ Success doesn’t just come and find you, you have to go out and get it” Kush Andwizdom</p></div><div style='width:100%;float:left;'><h2 style='color:#00E100;'>iScoutYou team,</h2></div>
					<img style='width: 426px;' src='https://isportsrecruiting.com/images/sprt.png'>
				</div>";
				$this->load->library('email');
				//$this->email->to($email);
				$this->email->to('newathlete@isportsrecruiting.com');
				$this->email->from("registration@isportsrecruiting.com");
				$this->email->subject("Welcome to isportsrecruiting");
				$this->email->message($message);
				$this->email->set_mailtype("html");
				$done = $this->email->send();			 
				 
				 
				 $data1 = array('first_name'=>$name,'email'=>$email,'user_id'=>$insert_id,'games'=>$games,'country'=>$country,'state'=>$state);
					$in1 = $this->db->insert('athletes_profile', $data1);
					$data2 = array('user_id'=>$insert_id,'sports_id'=>$games);
					$in2 = $this->db->insert('athlete_stats_value', $data2);
				
				// error_reporting(E_ERROR | E_PARSE);
				$new_date = date("Y-m-d");
				$data3 = array('user_id'=>$insert_id,'date'=>$new_date,'plan'=>$register_amount,'status'=>1,'register_date'=>$curr_date);
				$in3 = $this->db->insert('crone_job_table',$data3); 
				$this->session->set_flashdata('signup', 'Thankyou For The Registration,Please Login Your Account Right Now');
				$this->email->to('newathlete@isportsrecruiting.com');
				//$this->email->to('sandeep@codenomad.net'); 
				$this->email->from("registration@isportsrecruiting.com");
				$this->email->subject("Welcome to isportsrecruiting");
				 $message12="<div style='width:100%;float:left;text-align:center;padding:10px;'><div style='margin:0 auto;width:85%;background:#f5f5f5;border:2px solid #f5f5f5;'><div style='background: #fff;padding: 21px;border-bottom: 4px solid #00E100;'><img src='http://isportsrecruiting.com/images/logo.png'/></div><p style='padding: 20px;font-size: 24px;line-height: 50px;color:#000;'>New Athelete <img style='margin-top: -26px;float: left;' src='https://content.nike.com/content/dam/one-nike/globalAssets/menu_header_images/OneNike_Global_Nav_Icons_Football.png'> <strong> $name </strong> is register to your site   <strong>https://isportsrecruiting.com</strong> with this email <strong> $email </strong> and selected plan  <strong> $amount </strong> </p></div></div>";
				$this->email->message($message12);
				$this->email->set_mailtype("html");
				$done = $this->email->send();
				$msg = 1;
				echo $msg;
				 
				 // after saving data and email, charge user using card details and send email to user and Admin.
				 $auth_net = array(
				'x_card_num'			=> $card_no1,
				'x_exp_date'			=> $exp_date1,
				'x_card_code'			=> $cvv1,			
				'x_amount'				=> $amount,
				'x_first_name'			=> $name,			
				'x_state'				=> $state,
				'x_zip'					=> $zip,
				'x_country'				=> $country,			
				'x_email'				=> $email,
				'x_customer_ip'			=> $this->input->ip_address(),
				);
				
				 $this->authorize_net->setData($auth_net);
				 $reslts = $this->authorize_net->authorizeAndCapture();
				 $this->Signup_model->update_stat_after_payment($get_uid,$new_date);
				 $this->load->library('email');
									$this->email->to($email);
									$this->email->to('newathlete@isportsrecruiting.com');
									$this->email->from("registration@isportsrecruiting.com");
									$this->email->subject("Welcome to isportsrecruiting");
				if(isset($reslts['transation_id']))
				{
					$transation_id = $reslts['transation_id'];
					$this->email->message(" Amount is deducted from Your Account $name account $amount amount. </br>Transaction Id: $transation_id  Thank you!");
				}				
				else {
					$this->email->message($reslts);
				}
				
				 $this->email->set_mailtype("html");
				 $done = $this->email->send();	
				 
								$this->email->to('newathlete@isportsrecruiting.com');
								//$this->email->to('ronnie@iscoutyou.com');
								$this->email->from("registration@isportsrecruiting.com");
								$this->email->subject("Welcome to isportsrecruiting");

				if(isset($reslts['transation_id']))
				{
					$transation_id = $reslts['transation_id'];
					$approval_code = $reslts['approval_code'];
						$message2="Amount is deducted from the Athlete $name account $amount amount. </br>Transaction Id: $transation_id <br/> Approval Code: $approval_code";
								$this->email->message($message2);
				}
				else
				{
					$this->email->message($reslts);
				}
					
								$this->email->set_mailtype("html");
								$done = $this->email->send();
            }
	}
	
		public function lessprofile()
		{
			$getdata = $this->Academic_info_model->less_ninty_profiledata();			
		}
	
	
}
	
	

