<?php
/*
Author: Avijit Sen
*/
class Employer extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('employer_mod');
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
		$data['msg']=""; $errmsg='';
		$a=array();
		
						/* ------- Company sign up process ----------*/
		if(isset($_REQUEST['company_signup'])){
			$a['name']=$name=trim(addslashes($_REQUEST['name']));
			$a['real_name']=$real_name=trim(addslashes($_REQUEST['real_name']));
			$a['emp_type']=$emp_type=trim(addslashes($_REQUEST['emp_type']));
			$a['cp_name']=$cp_name=trim(addslashes($_REQUEST['cp_name']));
			$a['cp_desig']=$cp_desig=trim(addslashes($_REQUEST['cp_desig']));
			$a['tel']=$tel=trim($_REQUEST['tel']);
			$a['email']=$email=trim($_REQUEST['email']);
			$a['con_email']=$con_email=trim($_REQUEST['con_email']);
			$password=$_REQUEST['password'];
			$re_password=$_REQUEST['re_password'];
			
			$errmsg.=$this->employer_mod->check_email();
			$errmsg.=$this->employer_mod->check_password($password,$re_password);
			//$errmsg.=$this->register_mod->check_date($year,$month,$day,'date of birth').'';
			$errmsg.=$this->employer_mod->check_phone_number($tel,'Mobile');
			//if($alt_mobile!='')
			//$errmsg.=$this->register_mod->check_phone_number($alt_mobile,'Alternate Mobile');

			if(empty($errmsg))
			{
			
				$sql="insert into company set company_name='$name',company_real_name='$real_name',company_type='$emp_type',concern_person='$cp_name',concern_designation='$cp_desig',
						mobile=$tel,email='$email', password='$password',  reg_date=NOW(),status='inactive'";	
				$this->db->query($sql);
				mailing('write@journeymakerjobs.com',$name,'email','New Employer Signup',$name.' has created account on journeymakerjobs.');
				$re_url=site_url().'employer/signupsuccess.html';
				redirect($re_url);

			
			}
			else
			 $data['msg']="Please fill up all the data perfectly.";		
		}
		$data['errmsg']=$errmsg;
		$data['title']=" Signup(Employer)";
		$data['description']=" Signup(Employer)";
		$data['a']=$a;
		$this->load->view('employer/signup',$data); 
	}
	function signupsuccess()
	{	
		$data['msg']="";
		$data['title']=" Signup successful (Employer)";
		$data['description']=" Singup Success (Employer)";
		$this->load->view('employer/signupsuccess',$data); 	
	}

	function login()
	{	
		$msg="";
		if(@$_POST['c_login']=='Login'){
			$email=trim($_POST['email']);
			$pass=$_POST['pass'];
			$qry=$this->db->query("select * from company where email='$email' and password='$pass' and status='active'");	
			$arr=$qry->row_array();
			if(count($arr)>0){
				
				$this->session->set_userdata('company_ID',$arr['company_id']);
				$this->session->set_userdata('company_email',$arr['email']);
				$this->session->unset_userdata('ID');
				$this->session->unset_userdata('access_id');
				//$this->Session->write('ID',$arr[0]['id']); 
				/* $_SESSION['USER_USERNAME']=$arr[0]['adminuser']; */
				//$this->Session->write('user',$arr[0]['adminuser']); 
				//header('Location: '.site_url);
				redirect(site_url()."companyprofile/dashboard.html");
			}
			else
				$msg="Email or Password is not correct or your account is not active yet.";
		}
		$data['msg']=$msg;
		$data['title']=" Login(Employer)";
		$data['description']=" Login(Employer)";
		$this->load->view('employer/login',$data); 	
	}

	function logout(){
			
		//session_destroy();
		$this->session->unset_userdata('company_ID');
		$this->session->unset_userdata('company_email');
		$this->session->unset_userdata('ID');		//user logout
		$this->session->unset_userdata('access_id');	//user logout
		redirect("home");
		//header('Location: '.site_url);	
		/* $this->Model->query("update admin_user set logged=0 where id=1");
		header('Location: '.site_url); */
	}
	
	
	
}
?>
