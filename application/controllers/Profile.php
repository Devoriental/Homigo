<?php
/*
Author: Avijit Sen
*/
class Profile extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_mod');
		$this->load->model('register_mod');
		$this->load->library('cart');
		$this->load->helper(array('form', 'url'));
	}
	
	function index()
	{		
		$data['title']="Profile";
		if($this->session->userdata('ID')!=''){

		}
		else
			redirect(site_url());
		$this->load->view('home',$data); 
	}

	function dashboard()
	{	
		$data['msg']="";	
		if($this->session->userdata('ID')!=''){

		}
		else
			redirect(site_url());
		$data['title']="Profile";
		$data['description']="dashboard";
		$this->load->view('profile/dashboard',$data); 
	}

	function myresume()
	{	
		$data['msg']="";	
		if($this->session->userdata('ID')!=''){

			$user_id=$this->session->userdata('ID');
			$sql="select * from user where user_id=$user_id";
			$query=$this->db->query($sql);
			$data['arr']=$query->row_array();
			
			$dsql="select * from user_detail where user_id=$user_id";
			$query=$this->db->query($dsql);
			$data['detail_arr']=$query->row_array();

			$dsql="select * from user_education where user_id=$user_id order by degree_id desc";
			$query=$this->db->query($dsql);
			$data['edu_arr']=$query->result_array();

			$wsql="select * from user_work where user_id=$user_id order by job_end desc";
			$query=$this->db->query($wsql);
			$data['emp_arr']=$query->result_array();

			$tsql="select * from user_training where user_id=$user_id";
			$query=$this->db->query($tsql);
			$data['tra_arr']=$query->result_array();

			$tsql="select * from user_achievement where user_id=$user_id";
			$query=$this->db->query($tsql);
			$data['ach_arr']=$query->result_array();		

		}
		else
			redirect(site_url());
		$data['title']="My Resume";
		$data['description']="Resume";
		$this->load->view('profile/myresume',$data); 
	}

	function viewresume()
	{	
		$data['msg']="";	
		if($this->session->userdata('ID')!=''){

			$user_id=$this->session->userdata('ID');
			$sql="select * from user where user_id=$user_id";
			$query=$this->db->query($sql);
			$data['arr']=$query->row_array();
			
			$dsql="select * from user_detail where user_id=$user_id";
			$query=$this->db->query($dsql);
			$data['detail_arr']=$query->row_array();

			$dsql="select * from user_education where user_id=$user_id order by degree_id desc limit 0,5";
			$query=$this->db->query($dsql);
			$data['edu_arr']=$query->result_array();

			$wsql="select * from user_work where user_id=$user_id order by job_end desc";
			$query=$this->db->query($wsql);
			$data['emp_arr']=$query->result_array();

			$tsql="select * from user_training where user_id=$user_id";
			$query=$this->db->query($tsql);
			$data['tra_arr']=$query->result_array();

			$tsql="select * from user_achievement where user_id=$user_id ";
			$query=$this->db->query($tsql);
			$data['ach_arr']=$query->result_array();		

		}
		else
			redirect(site_url());
		$data['title']="Profile";
		$data['description']="Resume";
		$this->load->view('profile/viewresume',$data); 
	}

	function deleteit($id,$tag)
	{
		if($this->session->userdata('ID')!=''){
			if($tag=='education')
				$this->db->query("delete from user_education where user_education_id=$id");
			if($tag=='work')
				$this->db->query("delete from user_work where user_work_id=$id");
			if($tag=='training')
				$this->db->query("delete from user_training where user_training_id=$id");
			if($tag=='achievement')
				$this->db->query("delete from user_achievement where user_achievement_id=$id");
					

			redirect(site_url()."profile/myresume.html");
		}
		else
			redirect(site_url());	
	}	
	function editpersonal()
	{

		$msg="";	
		if($this->session->userdata('ID')!=''){
			$user_id=$this->session->userdata('ID');
			if(isset($_REQUEST['update'])){
				$name=strip_tags(trim($_POST['name']));
				$email=strip_tags(trim($_POST['email']));	
				$f_name=strip_tags(trim($_POST['f_name']));
				$m_name=strip_tags(trim($_POST['m_name']));
				$address=strip_tags(trim($_POST['address']));
				$gender=$_REQUEST['gender'];
				$mobile=$_REQUEST['mobile'];
				$alt_mobile=strip_tags(trim($_POST['alt_mobile']));
				$national_id=strip_tags(trim($_POST['national_id']));
				$facebook_id=strip_tags(trim($_POST['facebook_id']));				
				$marital_status=$_REQUEST['marital_status'];
				$religion=strip_tags(trim($_POST['religion']));
				$objective=strip_tags(trim(addslashes($_POST['objective'])));
				$year=$_REQUEST['year'];
				$month=$_REQUEST['month'];
				$day=$_REQUEST['day'];
				$brith_date=$year.'-'.$month.'-'.$day;

				//$msg.=$this->register_mod->check_existing_email($email,$user_id);
				if($national_id!=''):
					$msg.=$this->register_mod->check_national_id($national_id,'National ID');					
				endif;
				$msg.=$this->register_mod->check_date($year,$month,$day,'date of birth').'';
				$msg.=$this->register_mod->check_phone_number($mobile,'Mobile');
				if($alt_mobile!='')
				$msg.=$this->register_mod->check_phone_number($alt_mobile,'Alternate Mobile');
				

				if(empty($msg))
				{
					$sql="update user set user_name='$name',email='$email' where user_id=$user_id";	
					$this->db->query($sql);
						 $isql="update user_detail set father_name='$f_name', mother_name='$m_name', address='$address', 
				       	birth_date='$brith_date', gender='$gender', marital_status='$marital_status',
					   	mobile='$mobile', alt_mobile='$alt_mobile', religion='$religion',national_id='$national_id',
						facebook_id='$facebook_id', objective='$objective' where user_id=$user_id";	
					$this->db->query($isql);
					$msg="Updated successfully.";
					//redirect(site_url()."profile/myresume.html");
				}	
			}
			$sql="select * from user where user_id=$user_id";
			$query=$this->db->query($sql);
			$data['arr']=$query->row_array();
			$dsql="select * from user_detail where user_id=$user_id";
			$query=$this->db->query($dsql);
			$data['detail_arr']=$query->row_array();
			//print_r($data['arr']);
		}
		else
			redirect(site_url());
		$data['title']="Profile";
		$data['description']="Resume";
		$data['msg']=$msg;
		$this->load->view('profile/editpersonal',$data);
	}	

	function addeducation()
	{
		$data['msg']="";
		$a=array();	
		if($this->session->userdata('ID')!=''){
			$user_id=$this->session->userdata('ID');
			$data['degree_list']=$sarr=$this->common->get_table_data(0,'degree',''," order by degree_id desc");	
			//print_r($data['detail_arr']);
			if(isset($_REQUEST['update'])){

				$a['degree_id']=$degree_id=$_POST['degree'];
				$a['degree_title']=$degree_title=mysql_escape_string(strip_tags(trim($_POST['degree_title'])));	
				$a['institution']=$institution=mysql_escape_string(strip_tags(trim($_POST['institution'])));	
				$a['major']=$major=mysql_escape_string(strip_tags(trim($_POST['major'])));	
				$a['result']=$result=mysql_escape_string(strip_tags(trim($_POST['result'])));
				$a['pass_year']=$pass_year=mysql_escape_string(strip_tags(trim($_POST['pass_year'])));	
				$a['semester']=$semester=mysql_escape_string(strip_tags(trim($_POST['semester'])));

				$isql="insert into user_education set user_id=$user_id,degree_id=$degree_id, degree_title='$degree_title',
							institution='$institution',major='$major',result='$result', pass_year='$pass_year', semester='$semester' ";	
				
				$this->db->query($isql);
				$data['msg']="Added successfully.";
				redirect(site_url()."profile/myresume.html");
			}	
		}
		else
			redirect(site_url());
		$data['a']=$a;
		$data['title']="Profile";
		$data['description']="Resume";
		$this->load->view('profile/addeducation',$data);
	}

	function editeducation()
	{
		$id=$this->uri->segment(3);
		$msg="";
		$a=array();		
		if($this->session->userdata('ID')!=''){
			$user_id=$this->session->userdata('ID');
			$data['degree_list']=$sarr=$this->common->get_table_data(0,'degree',''," order by degree_id desc");	
				
			if(isset($_REQUEST['update'])){
				$degree_id=$_REQUEST['degree'];
				$degree_title=mysql_escape_string(strip_tags(trim($_REQUEST['degree_title'])));	
			    $institution=mysql_escape_string(strip_tags(trim($_REQUEST['institution'])));	
				$major=strip_tags(trim($_REQUEST['major']));
				$a['result']=$result=strip_tags(trim($_REQUEST['result']));
				$a['pass_year']=$pass_year=strip_tags(trim($_REQUEST['pass_year']));	
				$a['semester']=$semester=strip_tags(trim($_REQUEST['semester']));
				$isql="update user_education set degree_id=$degree_id, degree_title='$degree_title',
						institution='$institution', major='$major', result='$result',pass_year='$pass_year',
						semester='$semester'	where user_education_id=$id";	
				$this->db->query($isql);
				$msg="Updated successfully.";
				redirect(site_url()."profile/myresume.html");
			}
			$data['education']=$sarr=$this->common->get_table_data(1,'user_education'," where user_education_id=$id"," ");			
		}
		else
			redirect(site_url());
		$data['msg']=$msg;	
		$data['title']="Profile";
		$data['description']="Resume";
		$this->load->view('profile/editeducation',$data);
	}

	function addemployment()
	{

		$data['msg']="";
		$a=array();		
		if($this->session->userdata('ID')!=''){
			$user_id=$this->session->userdata('ID');
			//print_r($data['detail_arr']);
			if(isset($_REQUEST['update'])){
				$a['company']=$company=strip_tags(trim($_POST['company']));
				$a['designation']=$designation=strip_tags(trim($_POST['designation']));	
				$a['responsibility']=$responsibility=mysql_escape_string(strip_tags(trim($_POST['responsibility'])));	
				$a['start']=$start=$_REQUEST['syear'].'-'.$_REQUEST['smonth'].'-'.$_REQUEST['sday'];
				$a['end']=$end=$_REQUEST['eyear'].'-'.$_REQUEST['emonth'].'-'.$_REQUEST['eday'];
				$isql="insert into user_work set user_id=$user_id,company_name='$company', designation='$designation',
							responsibility='$responsibility', job_start='$start',job_end='$end' ";
				$this->db->query($isql);
				$data['msg']="Added successfully.";
				redirect(site_url()."profile/myresume.html");
			}	
		}
		else
			redirect(site_url());
		$data['a']=$a;
		$data['title']="Profile";
		$data['description']="Resume";
		$this->load->view('profile/addemployment',$data);
	}

	function editemployment()
	{ 
		$id=$this->uri->segment(3);
		$msg="";	
		$a=array();
		if($this->session->userdata('ID')!=''){
			$user_id=$this->session->userdata('ID');
			//$data['degree_list']=$sarr=$this->common->get_table_data(0,'degree',''," order by degree_id desc");	
				
			if(isset($_REQUEST['update'])){
				$company=strip_tags(trim($_REQUEST['company']));
				$designation=strip_tags(trim($_REQUEST['designation']));	
				$responsibility=mysql_escape_string(strip_tags(trim($_REQUEST['responsibility'])));	
				$a['start']=$start=$_REQUEST['syear'].'-'.$_REQUEST['smonth'].'-'.$_REQUEST['sday'];
				$a['end']=$end=$_REQUEST['eyear'].'-'.$_REQUEST['emonth'].'-'.$_REQUEST['eday'];
				$isql="update user_work set company_name='$company', designation='$designation',
						responsibility='$responsibility', job_start='$start',job_end='$end' 
						where user_work_id=$id";	
				$this->db->query($isql);
				$msg="Upadated successfully.";
				redirect(site_url()."profile/myresume.html");
			}
			$data['employment']=$sarr=$this->common->get_table_data(1,'user_work'," where user_work_id=$id"," ");			
		}
		else
			redirect(site_url());
		$data['msg']=$msg;
		$data['title']="Profile";
		$data['description']="Resume";
		$this->load->view('profile/editemployment',$data);
	}

	function addtraining()
	{

		$data['msg']="";	
		if($this->session->userdata('ID')!=''){
			$user_id=$this->session->userdata('ID');
			//print_r($data['detail_arr']);
			if(isset($_REQUEST['update'])){
				$ttl=mysql_escape_string(trim($_REQUEST['ttl']));
				$institution=trim($_REQUEST['institution']);	
				$topic=trim($_REQUEST['topic']);	
				$location=trim($_REQUEST['location']);
				$duration=trim($_REQUEST['duration']);
				$isql="insert into user_training set user_id=$user_id,training_title='$ttl', institution='$institution',
						topic_details='$topic', location='$location',duration='$duration' ";	
				$this->db->query($isql);
				$data['msg']="Added successfully.";
				redirect(site_url()."profile/myresume.html");
			}	
		}
		else
			redirect(site_url());
		$data['title']="Profile";
		$data['description']="Resume";
		$this->load->view('profile/addtraining',$data);
	}	

	function edittraining()
	{ 
		$id=$this->uri->segment(3);
		$msg="";	
		if($this->session->userdata('ID')!=''){
			$user_id=$this->session->userdata('ID');
			//$data['degree_list']=$sarr=$this->common->get_table_data(0,'degree',''," order by degree_id desc");	
				
			if(isset($_REQUEST['update'])){
				$ttl=mysql_escape_string(strip_tags(trim($_REQUEST['ttl'])));
				$institution=strip_tags(trim($_REQUEST['institution']));	
				$topic=strip_tags(trim($_REQUEST['topic']));	
				$location=strip_tags(trim($_REQUEST['location']));
				$duration=strip_tags(trim($_REQUEST['duration']));
				$isql="update user_training set training_title='$ttl', institution='$institution',
						topic_details='$topic', location='$location',duration='$duration'
						where user_training_id=$id";	
				$this->db->query($isql);
				$msg="Upadated successfully.";
				redirect(site_url()."profile/myresume.html");
			}
			$data['training']=$sarr=$this->common->get_table_data(1,'user_training'," where user_training_id=$id"," ");			
		}
		else
			redirect(site_url());
		$data['msg']=$msg;
		$data['title']="Profile";
		$data['description']="Profile";
		$this->load->view('profile/edittraining',$data);
	}


	function addachievement()
	{

		$data['msg']="";	
		if($this->session->userdata('ID')!=''){
			$user_id=$this->session->userdata('ID');
			//print_r($data['detail_arr']);
			if(isset($_REQUEST['update'])){
				
				$ach=mysql_escape_string(trim($_REQUEST['achievement']));				
				echo $asql="insert into user_achievement set user_id=$user_id, achievement='$ach'";	
				$this->db->query($asql);
				$data['msg']="Added successfully.";
				redirect(site_url()."profile/myresume.html");
			}	
		}
		else
			redirect(site_url());
		$data['title']="Achievement";
		$data['description']="Resume";
		$this->load->view('profile/addachievement',$data);
	}	

	function editachievement()
	{ 
		$id=$this->uri->segment(3);
		$msg="";	
		if($this->session->userdata('ID')!=''){
			$user_id=$this->session->userdata('ID');
			//$data['degree_list']=$sarr=$this->common->get_table_data(0,'degree',''," order by degree_id desc");	
				
			if(isset($_REQUEST['update'])){
				
				$ach=mysql_escape_string(strip_tags(trim($_REQUEST['achievement'])));	
				
				$isql="update user_achievement set achievement='$ach' where user_achievement_id=$id";	
				$this->db->query($isql);
				$msg="Upadated successfully.";
				redirect(site_url()."profile/myresume.html");
			}
			$data['achievement']=$sarr=$this->common->get_table_data(1,'user_achievement'," where user_achievement_id=$id"," ");			
		}
		else
			redirect(site_url());
		$data['msg']=$msg;
		$data['title']="Profile";
		$data['description']="Profile";
		$this->load->view('profile/editachievement',$data);
	}

	function editdesiredjob()
	{ 
		$msg="";	
		if($this->session->userdata('ID')!=''){
			$user_id=$this->session->userdata('ID');
			$data['category_list']=$sarr=$this->common->get_table_data(0,'job_category',''," order by job_category_id desc");	
				
			if(isset($_REQUEST['update'])){
			
				$desired_job='';		
				foreach ($_POST as $cat => $val) {   /// collecting desired-job data
					if($val=='on')$desired_job.=str_replace('c_', '', $cat).'-';				 
				}
				$isql="update user_detail set desired_job='$desired_job'	where user_id=$user_id";	
				$this->db->query($isql);
				$msg="Added successfully.";
				redirect(site_url()."profile/myresume.html");
			}
			$data['dtl']=$sarr=$this->common->get_table_data(1,'user_detail'," where user_id=$user_id"," ");			

		}
		else
			redirect(site_url());
		$data['msg']=$msg;
		$data['title']="Profile";
		$data['description']="Profile";
		$this->load->view('profile/editdesiredjob',$data);
	}

	function addreference(){
		$msg="";	
		if($this->session->userdata('ID')!=''){
			$user_id=$this->session->userdata('ID');			
				
			if(isset($_REQUEST['update'])){				
				$refe=mysql_escape_string(strip_tags(trim($_REQUEST['refc'])));					
				$isql="update user_detail set reference='$refe' where user_id=$user_id";	
				$this->db->query($isql);
				$msg="Upadated successfully.";
				redirect(site_url()."profile/myresume.html");
			}
			$data['refc']=$sarr=$this->common->get_table_data(1,'user_detail'," where user_id=$user_id"," ");			
		}
		else
			redirect(site_url());
		$data['msg']=$msg;
		$data['title']="Profile";
		$data['description']="Profile";
		$this->load->view('profile/addreference',$data);
	}

	function changepassword()
	{	
		$data['msg']="";	
		if($this->session->userdata('ID')!=''){

			$user_id=$this->session->userdata('ID');				
			if(isset($_POST['password'])){
				//$old_pass=$_REQUEST['old_pass'];	
				$pass=$_POST['pass'];	
				$re_pass=$_POST['re_pass'];				
				if($pass==$re_pass){
					$isql="update user set password='$pass'	where user_id=$user_id";	
					$this->db->query($isql);
					$data['msg']="Your new password is set.";		
				}
				else
					$data['msg']="New Password and Re-type Password did not match";					
			}	
		}
		else
			redirect(site_url());
		$data['title']="Change Password";
		$data['description']="Change Password";
		$this->load->view('profile/changepassword',$data); 
	}

	function mystats($curpage=1)
	{	
		$data['msg']="";	
		if($this->session->userdata('ID')!=''){
			$user_id=$this->session->userdata('ID');				

			$qry=$this->db->query("select count(*) as total from job_apply where user_id=$user_id");
			$arr=$qry->row_array();
			$totalrow=$arr['total'];
			
			//@$curpage=  ($_GET['curpage']!='') ? "$_GET[curpage]" : '';
			@$sort=$_GET['sort'];
			@$order=$_GET['order'];
			if($sort=='')$sort='desc';
			if($order=='')$order='apply_date';
			if($curpage=='')$curpage=1;
			$limit_per_page=5;
			$total_page=ceil($totalrow/$limit_per_page);
			$start=($curpage-1)*$limit_per_page;

			$data['applylist']=$sarr=$this->common->get_table_data(0,'job_apply'," where user_id=$user_id"," order by $order $sort limit $start,$limit_per_page");
			$data['total_page']=$total_page;
			$data['currentpage']=$curpage;
			$data['limit_per_page']=$limit_per_page;
			$data['total_data']=$totalrow;
			$data['start']=$start;
			$data['order']=$order;
		}
		else
			redirect(site_url());
		$data['title']="My statistics in journeymakerjobs";
		$data['description']="Statistics in journeymakerjobs";
		$this->load->view('profile/mystats',$data); 
	}

	function photo(){
		$msg="";	
		if($this->session->userdata('ID')!=''){
			$user_id=$this->session->userdata('ID');	
			$arr=$this->common->get_table_data(1,'user'," where user_id=$user_id","");		
			//$uname=explode(' ', $arr['user_name']);
			define('ROOT', dirname(dirname(dirname(__FILE__))));

			if(isset($_POST['sb'])){
				
					
					//$config['upload_path'] = str_replace("cp","",ROOT)."images/profileimage/";					
					$config['upload_path'] = ROOT."/images/profileimage/";					
					$config['allowed_types'] = 'gif|jpg|png';
					$thefilename  = str_replace('.', "", $arr['user_name']);
					$thefilename  = str_replace(' ', "_", $thefilename);					
					$config['file_name'] = $thefilename;
					$config['max_size']	= '350';
					$config['max_width']  = '250';
					$config['max_height']  = '250';

					$this->load->library('upload', $config);
					$this->upload->initialize($config);

					if ( ! $this->upload->do_upload())
					{	
						$data['msg']=$error = array('error' => $this->upload->display_errors());
						if(count($error)>0){
							foreach ($error as $key => $value) {
								$msg.=$value;
							}
							
						}
					}
					else{ 
						$data = array('upload_data' => $this->upload->data());						
						$fname=$data['upload_data']['file_name'];												
						
						//---delete old photo at first-----------
						$path=ROOT."/images/profileimage/".$arr['photo'];					
						@unlink($path);
						$this->db->query("update user set photo='$fname' where user_id=$user_id");
						$msg="Upload is successful";	
					}				
			} 
		$data['arr']=$this->common->get_table_data(1,'user'," where user_id=$user_id","");			
		}	
		$data['msg']=$msg;
		$data['title']="Upload Photo";
		$data['description']="dashboard";
		$this->load->view('profile/photo',$data); 
	}

		

	
}
?>
