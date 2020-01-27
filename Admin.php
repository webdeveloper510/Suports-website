<?php
class Admin extends CI_Controller {
	public function __construct() 
	{
	    parent::__construct();
		$this->load->library('session');
		$this->load->library('email');
		$this->load->helper('url');
		$this->load->database();	
		$this->load->library('pagination');
        $this->load->model('Academic_info_model');	
        $this->load->model('Admin_info_model');	
        $this->load->model('Profile_model');	
        		
    }
	public function index() 
	{
		if($this->session->userdata('user_idd')!='57')
		{
			redirect();
		}
		else{
		
			 $this->load->view('dashboard_view');
			 $data['all_university'] = $this->Admin_info_model->all_university();
			 $data['all_users'] = $this->Admin_info_model->all_users();
			 $data['all_sports'] = $this->Admin_info_model->all_sports();
			 $data['all_coach'] = $this->Admin_info_model->all_coach();
			 $data['all_free_user'] = $this->Admin_info_model->all_free_user();
			 $data['all_live_users'] = $this->Admin_info_model->all_live_user();
			 $data['all_blogs'] = $this->Admin_info_model->get_allblogs();
			 $this->load->view('home_view',$data);	
		}
	}
	
	
	
	public function all_live_users()
	{
	   $this->load->view('dashboard_view');
	   $data['all_live_users'] = $this->Admin_info_model->all_live_user();
	   $data['count']=count($data['all_live_users']);
		$config = array();
        $config["base_url"] = base_url() . "admin/all_live_users";
        $config["total_rows"] = $data['count'];
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
       
        $data["all_live_user"] = $this->Admin_info_model->find_users($config["per_page"], $page,'users');
		$data["links"] = $this->pagination->create_links();
	   $this->load->view('all_live_users',$data);	
	}
	public function delete_live_users(){
		
		 $id= $this->input->post('id');
		 $this->Admin_info_model->delete_live_users($id);
		 $this->session->set_flashdata('deleted','User deleted successfully');
		 redirect("admin/all_live_users");
	}
	public function get_cordintr_athelts_expensis_data()
	{
		 
		 $month_val = $_POST['valus'];
		 $data = $this->Academic_info_model->get_cordinator_athlets_expensis($month_val);
		 echo json_decode($data);
	}
	public function all_free_users()
	{
		
		
	    $this->load->view('dashboard_view');
	    //$data['all_free_user'] = $this->Admin_info_model->all_free_user();
	    $data['all_free_users'] = $this->Admin_info_model->all_free_user11();	    
		$data['count']=count($data['all_free_user']);
		$config = array();
        $config["base_url"] = base_url() . "admin/all_free_users";
        $config["total_rows"] = $data['count'];
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
       
        $data["find_users"] = $this->Admin_info_model->find_users($config["per_page"], $page,'free_profile_register');
		//$data['fetch']=$this->Login_model->getdata2();
		//print_r($data);die;
        $data["links"] = $this->pagination->create_links();
	    $this->load->view('all_free_users',$data);
	    
	}
	public function delete_free_users(){
		
		 $id= $this->input->post('id');
		 $this->Admin_info_model->delete_free_users($id);
		 $this->session->set_flashdata('deleted','User deleted successfully');
		 redirect("admin/all_free_users");
	}
	public function blog_detail($blog)
	{
		
	     $data['detail_of_blog'] = $this->Admin_info_model->detail_of_blog1($blog);
	     $this->load->view('header_main');
	     
	     $this->load->view('blog_detail',$data);
	     $this->load->view('footer');
	     
	     
	}
	public function blog($blog)
	{
		 //echo $blog;die;
		 // $blogNames = str_replace('-', ' ', $blog);
		// $blogName =  preg_replace("/[^a-zA-Z]+/", ' ', $blogNames);
		// echo $blogName; 
	     $data['detail_of_blog'] = $this->Admin_info_model->detail_of_blog($blog);
	     $data['get_blogs'] = $this->Admin_info_model->get_blogs();
	    
		// $_SESSION['desc'] = strip_tags($data['detail_of_blog'][0]['description']);
	     $this->load->view('header_main');
	     
	     $this->load->view('blog_detail_user',$data);
	     $this->load->view('footer');
	     
	     
	}
	public function blogs()
	{   
	
		 $this->load->view('dashboard_view');
		 $this->load->view('blogs');	
	 /* $data['get_blogs'] = $this->Admin_info_model->get_blogs();
		 if($data['get_blogs'])
		 {
		 $this->load->view('dashboard_view');
		 $this->load->view('blogs',$data);	 
		 }
		 else{
		 $this->load->view('blogs');
		 } */
	}
	public function allblogs()
	{   
	 $data['get_blogs'] = $this->Admin_info_model->get_allblogs();
		 if($data['get_blogs'])
		 {
		 $this->load->view('dashboard_view');
		 $this->load->view('allblogs',$data);	 
		 }
		 else{
		 $this->load->view('allblogs');
		 }
	}
	
	public function update_blog($blogid){
		$data['blog_id'] = $blogid;
		$data['get_single_blog'] = $this->Admin_info_model->get_single_blog($blogid);
		$this->load->view('dashboard_view');
		$this->load->view('update_blog',$data);
	}
	public function sports_page(){
		$this->load->view('sports');
	}
	public function file_upload(){
			// Allowed origins to upload images
			$accepted_origins = array("http://localhost", "http://107.161.82.130",'https://isportsrecruiting.com');

			// Images upload path
			$imageFolder = "./uploads/";
			$imageFolderurl = "https://isportsrecruiting.com/uploads/";

			// reset($_FILES);
			$temp = current($_FILES);
			if(is_uploaded_file($temp['tmp_name'])){
			   if(isset($_SERVER['HTTP_ORIGIN'])){
				   // Same-origin requests won't set an origin. If the origin is set, it must be valid.
				   if(in_array($_SERVER['HTTP_ORIGIN'], $accepted_origins)){
					   header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
				   }else{
					   header("HTTP/1.1 403 Origin Denied");
					   return;
				   }
			   }
			 
			   // Sanitize input
			   if(preg_match("/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $temp['name'])){
				   header("HTTP/1.1 400 Invalid file name.");
				   return;
			   }
			 
			   // Verify extension
			   if(!in_array(strtolower(pathinfo($temp['name'], PATHINFO_EXTENSION)), array("gif", "jpg", "png"))){
				   header("HTTP/1.1 400 Invalid extension.");
				   return;
			   }
			 
			   // Accept upload if there was no origin, or if it is an accepted origin
			   // $filetowrite = $imageFolder . $temp['name'];
			   

			$uploads_dir ='./uploads/';
			$name = basename($_FILES["file"]["name"]);
				   $tmp_name = $_FILES["file"]["tmp_name"];
				   $filetowrite = $imageFolder.''.$name;
				   // basename() may prevent filesystem traversal attacks;
				   // further validation/sanitation of the filename may be appropriate
				   
				   $result = move_uploaded_file($tmp_name, $filetowrite);
			if($result)
			{
			echo json_encode(array('location' => $imageFolderurl.''.$name));
			}
			else 
			{
			echo json_encode(array('location' =>'sdfaf'));
			}
	
			}
			else{
				echo "500";
			}
	}
	public function blog_update(){
	 $data =	$this->Admin_info_model->update_blog();
		if($data=="success")
		{
			$this->session->set_flashdata('updated','Your record was updated successfully');
			redirect('admin/allblogs');	 
		}
	}
	public function blog_submit()
	{
		$uid = '57';		
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('user_id',$uid);
		$userdata = $this->db->get();
		$userarr = $userdata->result_array();		
		$uname = $userarr[0]['username'];		
	    	$config['upload_path'] = './images/';
								$config['allowed_types'] = 'gif|jpg|png';
								$config['max_size']	= '2000';
								$this->load->library('upload',$config);
								$this->upload->do_upload('image');
								$data1 = array('upload_data' => $this->upload->data());
								$image = $data1['upload_data']['file_name'];
								
								
		$data = array('blog' => $this->input->post('blog'),
		'description' => $this->input->post('description'),
		'blog_image' => $image,
		'posted_by' => $uname,
		'current_date'=> date('Y-m-d'));			
		$this->db->insert('blogs_homepage',$data);
		if($insert_id = $this->db->insert_id())
		{
		$this->session->set_flashdata('insert','Your record was inserted successfully');
        redirect('admin/allblogs');			
		}
	}
	public function delete_blog()
	{
	  $id = $_POST['id'];
	  $this->db->where('id', $id);
      $done = $this->db->delete('blogs_homepage');
		if($done)
		{
		echo "1";
		}
		else{
			echo "0";
		}
			
	}
	public function athlete()
	{
	$data['all_users_for_admins'] = $this->Admin_info_model->all_users_for_admin();
	$data['all_university'] = $this->Admin_info_model->all_university();
    $data['all_users'] = $this->Admin_info_model->all_users();
	$data['all_sports'] = $this->Admin_info_model->all_sports();
	$data['all_coach'] = $this->Admin_info_model->all_coach();
	$data['count']=count($data['all_users_for_admins']);
		$config = array();
        $config["base_url"] = base_url() . "admin/athlete";
        $config["total_rows"] = $data['count'];
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
       
        $data["all_users_for_admin"] = $this->Admin_info_model->find_athelete($config["per_page"], $page);
		
        $data["links"] = $this->pagination->create_links();
	$this->load->view('dashboard_view');
	$this->load->view('all_users',$data);
	}
	public function ajax_call()
	{
	$data = array('status'=>$this->input->post('status'));
	$this->db->where('user_id',$this->input->post('id'));
	$dooo = $this->db->update('users',$data); 
	if($dooo)
	{
		if($this->input->post('status')==0){
			 $data = array('status'=>$this->input->post('status'));
	         $this->db->where('user_id',$this->input->post('id'));
	         $dooo = $this->db->update('crone_job_table',$data); 	
        echo "You are deactivate the account";
		}
		else{
		     $data = array('status'=>$this->input->post('status'));
	         $this->db->where('user_id',$this->input->post('id'));
	         $dooo = $this->db->update('crone_job_table',$data); 	
		echo "You are activate the account";
		}
	}
	}
	public function sports()
	{
	$data['getall_sports_home'] = $this->Academic_info_model->getall_sports_home();
	$this->load->view('dashboard_view');
	$this->load->view('get_all_sports',$data);
	}
    public function university()
	{
	$this->load->view('dashboard_view');
	$data['find_count'] = $this->Admin_info_model->all_university();
	$data["find_colleges"] = $this->Admin_info_model->all_university();
	$data["find_colleges1"] = $this->Admin_info_model->all_university1();
	
	 /* $data['count']=count($data['find_count']);
	$config = array();
        $config["base_url"] = base_url() . "admin/university";
        $config["total_rows"] = $data['count'];
        $config["per_page"] = 30;
        $config["uri_segment"] = 3;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
       
        $data["find_colleges"] = $this->Admin_info_model->find_university($config["per_page"], $page);
		
        $data["links"] = $this->pagination->create_links(); */
		//echo '<pre>';
		//print_r($data);
		//echo '</pre>';die;
	$this->load->view('university',$data);
	
	}
	
	public function state_wise_universites($uni_names)	
	{		
    $uni_name =  str_replace("%20"," ",$uni_names);
	$this->load->view('dashboard_view');	
	$data['state_wise_universites'] = $this->Admin_info_model->state_wise_universites($uni_name);	
	$this->load->view('state_wise_universites',$data);
	}
	
	
	public function university_info_admin($uni_id=null)
	{
		
		$this->load->view('dashboard_view');
		$data['first_university_table'] = $this->Admin_info_model->first_university_table($uni_id);
		$data['second_university_table'] = $this->Admin_info_model->second_university_table($uni_id);
		$this->load->view('update_university',$data);
	}
	public function add_new_sports()
	{
		
		
		$data['add_new_sports'] = $this->Admin_info_model->add_new_sports();
		
	}
	
	public function update_first_table()
	{
		if($_POST['image_name_logo'])
		{
			$filenames = $_POST['image_name_logo'];
		}
		
		
		$imggg = $_FILES['logo_image']['name'];
		
		$uni_id = $_POST['ID'];
		$data['imgg'] = $this->Admin_info_model->get_imgg($uni_id);
	    //$imggg=$data['imgg'][0]['image'];
		if($_FILES['logo_image']['name']!='')
		{
		
					$config['upload_path'] = './images/logos';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']	= '1000';
					$this->load->library('upload',$config);
					$this->upload->do_upload('logo_image');
					$data1 = array('upload_data' => $this->upload->data());					
					$fileee = $data1['upload_data']['file_name'];
				    $filenames =substr($fileee, 0, -4);
		}
		
		
		$data = array('UNIVERSITY' =>$this->input->post('UNIVERSITY'),
					'ADDRESS'=>$this->input->post('ADDRESS'),
					'WEBSITE'=>$this->input->post('WEBSITE'),
					'DIVISION'=>$this->input->post('DIVISION'),
					'TUISIONIN'=>$this->input->post('TUISIONIN'),
					'TUITIONOUT'=>$this->input->post('TUITIONOUT'),
					'GPA'=>$this->input->post('GPA'),
					'SAT'=>$this->input->post('SAT'),
					'ACT'=>$this->input->post('ACT'),
					'ENROLLEMENT'=>$this->input->post('ENROLLEMENT'),
					'STATE'=>$this->input->post('STATE'),
					'ATHLETICWEBSITE'=>$this->input->post('ATHLETICWEBSITE'),					
					'COST_OF_ATTENDANCE'=>$this->input->post('COST_OF_ATTENDANCE'),				
					'COST_OF_ATTENDANCE_OUT'=>$this->input->post('COST_OF_ATTENDANCE_OUT'),		
					'TYPE'=>$this->input->post('TYPE'),				
					'image'=>$filenames
					
				);
			
	    $this->db->where('ID',$this->input->post('ID'));
		$dooo = $this->db->update('university',$data);	
        if($dooo)
		{
			redirect('admin/university_info_admin/'.$uni_id);	
		}			
	}
	public function update_second_table()
	{
		$spo = str_replace("'","",$_POST['sports']);
		$data = array('SPORTS' =>$spo,
					'COACH'=>$this->input->post('coach'),
					'EMAIL'=>$this->input->post('email'),
					'ASSISANTCOACH'=>$this->input->post('assiscoach'),
					'ASSCOACHEMAIL'=>$this->input->post('assisemail')
				);
		$this->db->where('UNIVERSITY_ID',$this->input->post('uni_id'));
		$this->db->where('id',$this->input->post('id'));
		$dooo = $this->db->update('university_contact',$data);	
		if($dooo)
		{
			echo "hello";
		}
	}
	public function Remove_selected_sports()
	{
		
			$this->db->where('id',$this->input->post('id'));
            $done = $this->db->delete('university_contact');
			if($done)
			{
				echo  "hello";
			}
	}
	public function add_sports_info($id=null)
	{
		if(!$this->session->userdata('user_idd'))
		{
			redirect();
		}
		else
		{
			if($id)
			 {	
		        $data['division'] = $this->Academic_info_model->division($id);
		        
		        $data['get_division'] = $this->Academic_info_model->find_division($id);
				$data['sporty'] = $this->Academic_info_model->sports_detail($id);
				$data['get_sports_name'] = $this->Academic_info_model->get_sports_name($id);
				$data['sports_id'] = $id;
				if($data)
				{
					$this->load->view('dashboard_view');
					$this->load->view('add_sports_info',$data);
				}
			 }
		}

	}
	public function update_sports_block_images()
	{
		
		$this->Academic_info_model->update_sports_block_images();
	}
	public function update_fist_block_Content()
	{
		
		$this->Academic_info_model->update_block_content_images();
		
		
	}
	public function update_to_banner()
	{
		
	
		$this->Academic_info_model->update_banner_image_sports();
		
	}
	public function update_first_block_img()
	{
		
	
		$this->Academic_info_model->update_first_block_img();
		
	}
	public function update_content_images()
	{
		
	   
	   $this->Academic_info_model->update_content_images();
		
	}
	public function update_content_first()
	{
		
	    $this->Academic_info_model->update_content_text();
		
	}
	public function update_content_text_two()
	{
		$this->Academic_info_model->update_content_two();	   
		
	}
	public function update_content_text_three()
	{
		
		$this->Academic_info_model->update_content_text_three();	   
		
	}
	public function calender_default_txt()
	{
		
		$this->Academic_info_model->calender_default_txt();	   
		
	}
	public function contact_period()
	{
		
		$this->Academic_info_model->contact_period();	   
		
	}
	public function evauation_peroid()
	{
		
		$this->Academic_info_model->evauation_peroid();	   
		
	}
	public function dead_period()
	{
		
		$this->Academic_info_model->dead_period();	   
		
	}
	public function quit_period()
	{
		
		$this->Academic_info_model->quit_period();	   
		
	}
	
	
	
	public function recruiting_cordinator()
	{
		
		$this->load->view('dashboard_view');
		$this->load->view('recruiting_cordinator');
	}
	public function update_coordintor_pass()
	{
		  $this->Academic_info_model->change_cordintr_pass();
		 
	}	
	public function stoprecur()
	{
		$this->load->view('dashboard_view');
		$data['all_live_users'] = $this->Admin_info_model->all_live_user();
		$data['count']=count($data['all_live_users']);
		$config = array();
        $config["base_url"] = base_url() . "admin/stoprecur";
        $config["total_rows"] = $data['count'];
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['no'] = $this->uri->segment(3)+1;
        $data["all_live_user"] = $this->Admin_info_model->find_users($config["per_page"], $page,'users');
		$data["links"] = $this->pagination->create_links();
	   $this->load->view('stoprecur',$data);
		
	}
	public function stopedrecurpayment()
	{
		 $id= $this->input->post('id');
		 $data = $this->Admin_info_model->getusername($id);
		 $email= $data['email'];
		 $username= $data['username'];
		 $status= $this->input->post('status');
		 $data['stopedrecurpayment'] = $this->Admin_info_model->stopedrecurpayment($id,$status);
		$date = date('m/d/Y');

		if($status==1)
		{
			$this->email->from('payment@iscoutyou.com', 'iscoutyou');
			 $this->email->to($email);
			
			 $this->email->set_mailtype("html");
			$this->email->subject('Subscription Cancel');
			$this->email->message("<h1>Dear ".$username.",</h1>
			<h3>We are sorry to let you go, this is a confirmation that your iScoutYou subscription will be canceled on '".$date."'. We like to thank you for working with us, we wish you all best in your future.</h3>			
			<h3>Best regards!</h3>
			<img style='width: 426px;' src='https://isportsrecruiting.com/images/email-logo1.png'>");
			
			$this->email->send();
			
			$this->email->from('payment@iscoutyou.com', 'iscoutyou');
			
			$this->email->to('ronnie@iscoutyou.com');
			//$this->email->to('kalpana@codenomad.net');
			
			 $this->email->set_mailtype("html");
			$this->email->subject('Subscription Cancel');
			$this->email->message("<h1>Dear Ronnie,</h1>
			<h3>You have canceled the payment subscription for ".$username.".</h3> 
			<img style='width: 426px;' src='https://isportsrecruiting.com/images/email-logo1.png'>");
			
			$this->email->send();
			
			
		}
		$this->session->set_flashdata('stop','Recurring payment successfully.');
        // redirect('admin/stoprecur');	
	}
	public function sports_info_show()
	{
		
		$data['sports_info_show'] = $this->Academic_info_model->sports_info_show();
	}
	public function update_info_shows($id=null)
	{
		$data['update_info_shows'] = $this->Academic_info_model->update_info_shows($id);
		if($data['update_info_shows'])
		{
			?>
			<script>
			 window.location.href = "<?php echo base_url()?>admin/sports";
		    </script><?php 
		}
	}
	
}