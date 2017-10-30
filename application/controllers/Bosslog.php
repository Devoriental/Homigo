<?php
/*
Author: Avijit Sen
*/
class Bosslog extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_mod');
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
	
		$data['msg']="";
		//echo current_date();
		if(@$_POST['login']=='Login'){
			$authority=$_POST['authority'];
			$user=$_POST['username'];
			$pass=$_POST['pass'];
			$qry=$this->db->query("select * from admin_user where authority='$authority' and adminuser='$user' and adminpass='$pass'");	
			$arr=$qry->row_array();
			if(count($arr)>0){
				//echo "update admin_user set login_time=now() where authority='$authority' and adminuser='$user'
				//						and adminpass='$pass'";
				$this->db->query("update admin_user set login_time=now() where authority='$authority' and adminuser='$user'
										and adminpass='$pass'"); 
				//AS SESSION IS NOT WORKING IN SERVER== 
				
				/* $_SESSION['USER_ID']= $arr[0]['id']; */

				$this->session->set_userdata('AUTHORITY',$arr['authority']);
				$this->session->set_userdata('ADMINID',$arr['adminuser']);
				$this->session->set_userdata('ADLOG','ADLOG');
				//$this->session->set_userdata('email',$arr['email']);
				//$this->Session->write('ID',$arr[0]['id']); 
				/* $_SESSION['USER_USERNAME']=$arr[0]['adminuser']; */
				//$this->Session->write('user',$arr[0]['adminuser']); 
				//header('Location: '.site_url);
				redirect(site_url()."bosslog/bosslog_dashboard.html");
			}
		}

		$data['title']=" Login";
		$this->load->view('admin/login',$data); 
		
	}
	function bosslog_dashboard()
	{	
		if($this->session->userdata('ADLOG')=='ADLOG'){
			$data['msg']="";
			$data['title']=" Signup successful";
			$this->load->view('admin/bosslog_dashboard',$data); 	
		}
		else
			redirect(site_url()."/bosslog.html");	
	}
	
	function signup()
	{		
		$data['msg']="";
		
		if(isset($_REQUEST['signup'])){
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
						$sql="insert into user set user_name='$name',email='$email', password='$password',
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
		$data['title']=" Signup";
		$this->load->view('register/signup',$data); 
	}
	

	function login()
	{	
		$data['msg']="";
		if(@$_POST['login']=='Login'){
			$email=$_POST['email'];
			$pass=$_POST['pass'];
			$qry=$this->db->query("select * from user where email='$email' and password='$pass'");	
			$arr=$qry->row_array();
			if(count($arr)>0){
				/* $this->Model->query("update admin_user set logged=1 where adminuser='$user'
										and adminpass='$pass'"); */
				//AS SESSION IS NOT WORKING IN SERVER== 
				
				/* $_SESSION['USER_ID']= $arr[0]['id']; */

				$this->session->set_userdata('ID',$arr['user_id']);
				$this->session->set_userdata('email',$arr['email']);
				//$this->Session->write('ID',$arr[0]['id']); 
				/* $_SESSION['USER_USERNAME']=$arr[0]['adminuser']; */
				//$this->Session->write('user',$arr[0]['adminuser']); 
				//header('Location: '.site_url);
				redirect(site_url()."profile/dashboard.html");
			}
		}
		$data['title']=" Login";
		$this->load->view('register/login',$data); 	
	}

	function logout(){
			
		//session_destroy();
		if($this->session->userdata('ADLOG')=='ADLOG'){
			$authority=$this->session->userdata('AUTHORITY');
			$user=$this->session->userdata('ADMINID');
			$this->db->query("update admin_user set logout_time=now() where authority='$authority' and adminuser='$user'");
			$this->session->unset_userdata('AUTHORITY');
			$this->session->unset_userdata('ADMINID');
			$this->session->unset_userdata('ADLOG');
			redirect("bosslog");	
			//header('Location: '.site_url);	
			/* $this->Model->query("update admin_user set logged=0 where id=1");
			header('Location: '.site_url); */
		}
		else
			redirect(site_url()."/bosslog.html");
		
	}
	function add_exp()
	{		
		$item_id=$_REQUEST['item'];
		$price=$_REQUEST['price'];
		$desc=$_REQUEST['desc'];
		$dt=$_REQUEST['dt'];
		$split_date=explode("-",$dt);
		$mon_ind=get_month_index($split_date[1]);
		$thedate=$split_date[2].'-'.$mon_ind.'-'.$split_date[0];
		$sarr=$this->common->get_table_data(0,'balance'," where balance_day='$thedate'","");
		if(count($sarr)>0){		//checks whether today's balance is add or not.
			$this->db->query("insert into expenditure set item_id=$item_id,
			  price=$price,description='$desc',exp_date=unix_timestamp('$thedate')");
			$this->db->query("update balance set 
							 closing_balance=closing_balance-$price where
							 balance_day='$thedate'");
			//$data['saintlist']=$sarr=$this->home_mod->get_saint_list();
			//$data['anolist']=$sarr=$this->common->get_table_data(0,'annotation',''," order by title");
			echo "Data is inserted.";
		}
		else 
			echo "<span style='color:red'>Please enter  starting balance.<br /></span>"; 
		
		/* $data['keyword']="";
		$data['description']="";
		$data['tg']="home";
		$this->load->view('balance/balance',$data);  */
	}
	
	function add_sale()
	{		
		$item_id=$_REQUEST['item'];
		$price=$_REQUEST['price'];
		$desc=$_REQUEST['desc'];
		$dt=$_REQUEST['dt'];
		$split_date=explode("-",$dt);
		$mon_ind=get_month_index($split_date[1]);
		$thedate=$split_date[2].'-'.$mon_ind.'-'.$split_date[0];
		$sarr=$this->common->get_table_data(0,'balance'," where balance_day='$thedate'","");
		if(count($sarr)>0){		//checks whether  balance of that date is added or not.
			
			$this->db->query("insert into sale set item_id=$item_id,
			  price=$price,description='$desc',sale_date=unix_timestamp('$thedate')");
			$this->db->query("update balance set 
							 closing_balance=closing_balance+$price where
							 balance_day='$thedate'");  
			echo "Data is inserted.";
		 }
		else 
			echo "<span style='color:red'>Please enter starting balance.<br /></span>"; 
	}
}
?>
