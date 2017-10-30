<?php
/*
Author: Avijit Sen
*/
class Register extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('register_mod');
		$this->load->library('cart');
		$this->load->helper('form');
	}
	/* function Home ()
	{
	     parent::Controller();
		 $this->load->model('home_mod');
		 
	} */
	function index()
	{		
		
	}
	
	function signup()
	{		

		$this->load->helper('date');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');


		$data['msg']="";	$errmsg='';
		$a=array();
		$data['category_list']=$carr=$this->common->get_table_data(0,'job_category',''," order by job_category_id desc");
		if($this->session->userdata('ID')==''){
			if(isset($_POST['signup'])){  
				
				$a['name']=$name=strip_tags(trim($_POST['name']));
				$a['username']=$username=strip_tags($_POST['username']);
				$a['email']=$email=strip_tags(trim($_POST['email']));
				//$a['con_email']=$con_email=$_REQUEST['con_email'];
				$password=$_POST['password'];
				$re_password=$_POST['re_password'];
				
				$a['f_name']=$f_name=strip_tags(trim($_POST['f_name']));
				$a['m_name']=$m_name=strip_tags(trim($_POST['m_name']));
				$a['address']=$address=strip_tags($_POST['address']);
				$a['mobile']=$mobile=strip_tags(trim($_POST['mobile']));
				$a['alt_mobile']=$alt_mobile=trim($_POST['alt_mobile']);
				$a['national_id']=$national_id=trim($_POST['national_id']);
				$a['facebook_id']=$facebook_id=trim($_POST['facebook_id']);
				$a['gender']=$gender=$_POST['gender'];
				$a['marital_status']=$marital_status=$_POST['marital_status'];
				$a['religion']=$religion=addslashes(strip_tags(trim($_POST['religion'])));
				$a['objective']=$objective=addslashes(trim($_POST['objective']));
				$a['reference']=$reference=addslashes(trim($POST['reference']));
				$a['yr']=$year=$_POST['year'];
				$a['mo']=$month=$_POST['month'];
				$a['da']=$day=$_POST['day'];
				$brith_date=$year.'-'.$month.'-'.$day;

				$a['degree_id']=$degree_id=$_POST['degree'];
				$a['degree_title']=$degree_title=strip_tags(trim($_POST['degree_title']));	
				$a['institution']=$institution=addslashes(strip_tags(trim($_POST['institution'])));	
				$a['major']=$major=strip_tags(trim($_POST['major']));	
				$a['result']=$result=strip_tags(trim($_POST['result']));
				$a['pass_year']=$pass_year=strip_tags(trim($_POST['pass_year']));	
				$a['semester']=$semester=strip_tags(trim($_POST['semester']));

				$a['company']=$company=addslashes(strip_tags(trim($_POST['company'])));
				$a['designation']=$designation=addslashes(strip_tags(trim($_POST['designation'])));	
				$a['responsibility']=$responsibility=addslashes(strip_tags(trim($_POST['responsibility'])));	
				$a['start']=$start=$_REQUEST['syear'].'-'.$_REQUEST['smonth'].'-'.$_REQUEST['sday'];
				$a['end']=$end=$_POST['eyear'].'-'.$_POST['emonth'].'-'.$_POST['eday'];
				$a['stillcont']=$stillcont=@$_POST['stillcont'];
				if($stillcont=='Still continuing')$end='0000-00-00';

				$desired_job='';		
				foreach ($_POST as $cat => $val) {   /// collecting desired-job data
					if($val=='on')$desired_job.=str_replace('c_', '', $cat).'-';				 
				}
				$a['desired_job']=$desired_job;
				//$errmsg.=$this->register_mod->check_email();
				$errmsg.=$this->register_mod->check_username($username);
				$errmsg.=$this->register_mod->check_password($password,$re_password);
				$errmsg.=$this->register_mod->check_date($year,$month,$day,'date of birth').'';
				$errmsg.=$this->register_mod->check_phone_number($mobile,'Mobile');
				$errmsg.=$this->register_mod->check_empty_field($name,'Name');
				$errmsg.=$this->register_mod->check_empty_field($address,'Address');
				$errmsg.=$this->register_mod->check_empty_field($mobile,'Mobile');
				$errmsg.=$this->register_mod->check_empty_field($degree_title,'Degree Title');
				if($alt_mobile!='')
				$errmsg.=$this->register_mod->check_phone_number($alt_mobile,'Alternate Mobile');

				if(empty($errmsg))
				{
					$sql="insert into user set user_name='$name',access_id='$username',email='$email', password='$password',
						   reg_date=curdate(),status='active'";	
					$this->db->query($sql);
					$user_id=$this->db->insert_id();
					$isql="insert into user_detail set user_id=$user_id,father_name='$f_name', mother_name='$m_name', 
						   address='$address',birth_date='$brith_date', gender='$gender',marital_status='$marital_status',
						   mobile='$mobile', alt_mobile='$alt_mobile', religion='$religion',national_id='$national_id',
						   objective='$objective',reference='$reference',desired_job='$desired_job',facebook_id='$facebook_id'";	
					$this->db->query($isql);
					$esql="insert into user_education set user_id=$user_id,degree_id=$degree_id, degree_title='$degree_title',
							institution='$institution',major='$major',result='$result', pass_year='$pass_year', semester='$semester' ";	
					$this->db->query($esql);

					if($company!=''){
						$wsql="insert into user_work set user_id=$user_id,company_name='$company', designation='$designation',
								responsibility='$responsibility', job_start='$start',job_end='$end' ";	
						$this->db->query($wsql);
					}

					$re_url=site_url().'register/signupsuccess.html';
					redirect($re_url);
					
				}
				else
				 $data['msg']="Please fill up all the data perfectly.";		
			}
			$data['errmsg']=$errmsg;
			$data['degree_list']=$sarr=$this->common->get_table_data(0,'degree',''," order by degree_id desc");		
							/* ------- Company sign up process ----------*/
			if(isset($_REQUEST['company_signup'])){
				$name=$_REQUEST['name'];
				$email=$_REQUEST['email'];
				$con_email=$_REQUEST['con_email'];
				$password=$_REQUEST['password'];
				$re_password=$_REQUEST['re_password'];
				//$ext="";
				if($name!='' && $email!='' && $con_email!='' && $password!='' && $re_password!='')
				{
					if($email==$con_email)
						if($password==$re_password){
							$sql="insert into company set company_name='$name',email='$email', password='$password',
								   reg_date=curdate(),status='active'";	
							$this->db->query($sql);
							$re_url=site_url().'register/signupsuccess.html';
							redirect($re_url);
						}
						else
							$data['msg']="Password and Re-type Password did not match.";
					else				
						$data['msg']="Email and Confirm Email did not match.";
				}
				else
				 $data['msg']="Please fill up all the data perfectly.";		
			}
			$data['title']=" Jobseeker Signup";
			$data['description']=" Jobseeker Signup";
			$data['a']=$a;
			$this->load->view('register/signup',$data); 
		}
		else	
			redirect(site_url()."profile/dashboard.html");		
	}
	function signupsuccess()
	{	
		$data['msg']="";
		$data['title']=" Signup successful";
		$data['description']=" Singup Success";
		$this->load->view('register/signupsuccess',$data); 	
	}

	function login()
	{	
		$data['msg']="";
		if($this->session->userdata('ID')==''){ 
			if(@$_POST['login']=='Login'){
				$username=strip_tags(trim($_POST['username']));
				$pass=strip_tags($_POST['pass']);
				$qry=$this->db->query("select * from user where access_id='$username' and password='$pass' and status='active'");	
				$arr=$qry->row_array();
				if(count($arr)>0){
					/* $this->Model->query("update admin_user set logged=1 where adminuser='$user'
											and adminpass='$pass'"); */
					//AS SESSION IS NOT WORKING IN SERVER== 
					
					/* $_SESSION['USER_ID']= $arr[0]['id']; */

					$this->session->set_userdata('ID',$arr['user_id']);
					$this->session->set_userdata('access_id',$arr['access_id']);
					$this->session->unset_userdata('company_ID');
					$this->session->unset_userdata('company_email');
					
					$ip = $_SERVER['REMOTE_ADDR'];

					$this->db->query("update user set last_login=curdate(), login_ip='$ip' where  access_id='$arr[access_id]'");	
					//$this->Session->write('ID',$arr[0]['id']); 
					/* $_SESSION['USER_USERNAME']=$arr[0]['adminuser']; */
					//$this->Session->write('user',$arr[0]['adminuser']); 
					//header('Location: '.site_url);
					redirect(site_url()."profile/dashboard.html");
				}
				else
					$data['msg']="Username or Password is not correct.";
			}

			
			$data['title']=" Login(Jobseeker)";
			$data['description']=" Login";
			$this->load->view('register/login',$data); 	
		}
		else
		redirect(site_url()."profile/dashboard.html");	
	}

	
	function forgetpassword()
	{	
		$msg=$sentry="";

		if(@$_POST['submit']=='Submit'){
			$to= strip_tags(trim($_POST['email']));	
			$carr=$this->common->get_table_data(1,'user'," where email='$to'"," ");
			if(count($carr)>0){
				/*$name="";
				$from="";
				$subj="Journeymakerjobs-Password retrive";
				$body=" ".$carr['password'];
				mailing($to,$name,$from,$subj,$body);	*/
				//print_r($carr);
				$this->load->library('email');
				$config['wordwrap'] = TRUE;
				$config['wrapchars'] = 85;
				//$config['mailtype'] = 'html';
				$this->email->initialize($config);		
				
				$name='';
				$mail='no-reply@journeymakerjobs.com';
				$subject="Journeymakerjobs-Password retrive";
				$message="Dear ".$carr['user_name'].",
							You have requested to recover your password. Please find your login information below:
							Username: ".$carr['access_id']."
							Password: ".$carr['password']."
							Regards,
							journeymakerjobs
							www.journeymakerjobs.com";
				//$message=$carr['password'];
				$this->email->from($mail, 'journeymakerjobs');
				$this->email->to($to);
				//$this->email->cc('another@another-example.com');
				//$this->email->bcc('them@their-example.com');

				$this->email->subject($subject);
				$this->email->message($message);

				$this->email->send();
				$msg="Your password is sent to your email.";
				$sentry=1;
			}
			else
				{
					$msg="Sorry, we did not find your email address in our record.";
					$sentry=0;
				}	
		}	
		$data['msg']=$msg;
		$data['sentry']=$sentry;
		$data['title']=" Forget Password (Jobseeker)";
		$data['description']=" Forget Password (Jobseeker)";
		$this->load->view('register/forgetpassword',$data); 	
	}

	function logout(){
			
		//session_destroy();
		$this->session->unset_userdata('ID');
		$this->session->unset_userdata('access_id');
		$this->session->unset_userdata('company_ID');
		$this->session->unset_userdata('company_email');
		redirect("home");
		//header('Location: '.site_url);	
		/* $this->Model->query("update admin_user set logged=0 where id=1");
		header('Location: '.site_url); */
	}
	
	
	
}
?>