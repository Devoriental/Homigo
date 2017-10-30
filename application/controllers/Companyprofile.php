<?php
/*
Author: Avijit Sen
*/
class Companyprofile extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('employer_mod');
		$this->load->library('cart');
		$this->load->helper('form');
	}
	
	function index()
	{		
		$msg="";	

		
		if($this->session->userdata('company_ID')!=''){

			$company_id=$this->session->userdata('company_ID');	
			
			if(isset($_REQUEST['update'])){ 
				$name=trim(addslashes($_REQUEST['name']));
				$emp_type=trim(addslashes($_REQUEST['emp_type']));
				$cp_name=trim(addslashes($_REQUEST['cp_name']));
				$cp_desig=trim(addslashes($_REQUEST['cp_desig']));
				$tel=trim($_REQUEST['tel']);
				$email=trim($_REQUEST['email']);	
				$address=trim(addslashes($_REQUEST['address']));
				$website=trim(addslashes($_REQUEST['website']));
				//$msg.=$this->employer_mod->check_existing_email($email,$company_id);
				
				$msg.=$this->employer_mod->check_phone_number($tel,'Mobile');
				//if($alt_mobile!='')
				//$errmsg.=$this->register_mod->check_phone_number($alt_mobile,'Alternate Mobile');

				if(empty($msg))
				{				
					$isql="update company set company_name='$name',company_type='$emp_type', email='$email', company_address='$address', concern_person='$cp_name',
					concern_designation='$cp_desig',mobile='$tel', website='$website' where company_id=$company_id ";	
					$this->db->query($isql);					
					$msg="Data is updated successfully.";
				}	
			}	

			$sql="select * from company where company_id=$company_id";
			$query=$this->db->query($sql);
			$data['arr']=$query->row_array();
		}
		else
			redirect(site_url());
		
		$data['msg']= $msg;
		$data['title']=" Employer Profile";
		$data['description']=" Employer Profile";
		$this->load->view('companyprofile/companyprofile',$data);
	}

	function dashboard()
	{	
		$data['msg']="";	
		if($this->session->userdata('company_ID')!=''){

		}
		else
			redirect(site_url());
		$data['title']="Employer Dashboard";
		$data['description']="Employer Dashboard";
		$this->load->view('companyprofile/dashboard',$data); 
	}
	
	function viewprofile()
	{
		$msg='';
		if($this->session->userdata('company_ID')!=''){
			$company_id=$this->session->userdata('company_ID');		
			$sql="select * from company where company_id=$company_id";
			$query=$this->db->query($sql);
			$data['arr']=$query->row_array();		

		}
		else
			redirect(site_url());
		$data['title']="Employer Profile";
		$data['description']="Employer Profile";
		$this->load->view('companyprofile/viewprofile',$data); 	
	}

	function logout(){
			
		$this->session->unset_userdata('company_ID');
		$this->session->unset_userdata('company_email');
		redirect("home");		
	}

	
	function changepassword()
	{	
		$data['msg']="";	
		if($this->session->userdata('company_ID')!=''){

			$user_id=$this->session->userdata('company_ID');				
			if(isset($_POST['password'])){
				//$old_pass=$_REQUEST['old_pass'];	
				$pass=$_REQUEST['pass'];	
				$re_pass=$_REQUEST['re_pass'];				
				if($pass==$re_pass){
					$isql="update company set password='$pass'	where company_id=$user_id";	
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
		$this->load->view('companyprofile/changepassword',$data); 
	}

	function mystats($curpage=1)
	{	
		$data['msg']="";	
		if($this->session->userdata('company_ID')!=''){
			$user_id=$this->session->userdata('company_ID');				

			$qry=$this->db->query("select count(*) as total from job_list where company_id=$user_id");
			$arr=$qry->row_array();
			$totalrow=$arr['total'];
			
			//@$curpage=  ($_GET['curpage']!='') ? "$_GET[curpage]" : '';
			@$sort=$_GET['sort'];
			@$order=$_GET['order'];
			if($sort=='')$sort='desc';
			if($order=='')$order='post_date';
			if($curpage=='')$curpage=1;
			$limit_per_page=7;
			$total_page=ceil($totalrow/$limit_per_page);
			$start=($curpage-1)*$limit_per_page;

			$data['applylist']=$sarr=$this->common->get_table_data(0,'job_list'," where company_id=$user_id"," order by $order $sort limit $start,$limit_per_page");
			
			$data['total_page']=$total_page;
			$data['currentpage']=$curpage;
			$data['limit_per_page']=$limit_per_page;
			$data['total_data']=$totalrow;
			$data['start']=$start;
			$data['order']=$order;
		}
		else
			redirect(site_url());
		$data['title']="Employer statistics in journeymakerjobs";
		$data['description']="Employer statistics in journeymakerjobs";
		$this->load->view('companyprofile/mystats',$data); 
	}

	function candidatelist($job_id,$curpage=1)
	{	
		$data['msg']="";	
		if($this->session->userdata('company_ID')!=''){
			$user_id=$this->session->userdata('company_ID');				
			$data['job_info']=$this->common->get_table_data(1,'job_list'," where job_id=$job_id",'');	

			$qry=$this->db->query("select count(*) as total from job_apply where job_id=$job_id");
			$arr=$qry->row_array();
			$totalrow=$arr['total'];
			
			//@$curpage=  ($_GET['curpage']!='') ? "$_GET[curpage]" : '';
			@$sort=$_GET['sort'];
			@$order=$_GET['order'];
			if($sort=='')$sort='desc';
			if($order=='')$order='apply_date';
			if($curpage=='')$curpage=1;
			$limit_per_page=15;
			$total_page=ceil($totalrow/$limit_per_page);
			$start=($curpage-1)*$limit_per_page;

			$data['applylist']=$sarr=$this->common->get_table_data(0,'job_apply'," where job_id=$job_id"," order by $order $sort limit $start,$limit_per_page");
			$data['total_page']=$total_page;
			$data['currentpage']=$curpage;
			$data['limit_per_page']=$limit_per_page;
			$data['total_data']=$totalrow;
			$data['start']=$start;
			$data['order']=$order;
		}
		else
			redirect(site_url());
		$data['title']="Candidate List of ".$data['job_info']['job_title'];
		$data['description']="Candidate List of ".$data['job_info']['job_title'];
		$this->load->view('companyprofile/candidatelist',$data); 
	}
	
	function candidate($job_id=0,$user_id=0)
	{	
		$data['msg']="";
		$data['arr']="";
		$data['detail_arr']="";	
		$candidate='';
		if($this->session->userdata('company_ID')!=''){
			$company_id=$this->session->userdata('company_ID');				
			$data['job_info']=$this->common->get_table_data(1,'job_list'," where job_id=$job_id",'');	
			if(count($data['job_info'])!=0){
				$data['aply']=$sarr=$this->common->get_table_data(1,'job_apply'," where job_id=$job_id and user_id=$user_id",'');
				if(count($data['aply'])!=0){
					$sql="select * from user where user_id=$user_id";
					$query=$this->db->query($sql);
					$data['arr']=$query->row_array();
					
					$dsql="select * from user_detail where user_id=$user_id";
					$query=$this->db->query($dsql);
					$data['detail_arr']=$query->row_array();

					$dsql="select * from user_education where user_id=$user_id";
					$query=$this->db->query($dsql);
					$data['edu_arr']=$query->result_array();

					$wsql="select * from user_work where user_id=$user_id";
					$query=$this->db->query($wsql);
					$data['emp_arr']=$query->result_array();

					$tsql="select * from user_training where user_id=$user_id";
					$query=$this->db->query($tsql);
					$data['tra_arr']=$query->result_array();

					$tsql="select * from user_achievement where user_id=$user_id ";
					$query=$this->db->query($tsql);
					$data['ach_arr']=$query->result_array();		

					$isql="insert into profile_view set company_id=$company_id ,user_id=$user_id,view_date=curdate()";
					$this->db->query($isql);
			 	}		
			 	else{
				   $data['msg']=" This person is not a candidate of that job.";	
				   redirect(site_url().'companyprofile/mystats.html');
			 	}
			}
			else{
				$data['msg']=" You did not post this job.";	
				redirect(site_url().'companyprofile/mystats.html');
			}
		}
		else
			redirect(site_url());
		$data['title']="Candidate's Profile";
		$data['description']="Candidate's Profile";
		$this->load->view('profile/viewresume',$data); 
	}

	function summary($job_id=1,$curpage=1){ 
		$data['msg']="";
		
		if($this->session->userdata('company_ID')!=''){

			$data['job_info']=$this->common->get_table_data(1,'job_list'," where job_id=$job_id",'');
			
			$qry=$this->db->query("select count(*) as total from job_apply as a,user as b where	a.job_id=$job_id and a.user_id=b.user_id");
			$arr=$qry->row_array();
			$totalrow=$arr['total'];
			
			@$sort=$_GET['sort'];
			@$order=$_GET['order'];
			if($sort=='')$sort='desc';
			if($order=='')$order='apply_date';
			if($curpage=='')$curpage=1;
			$limit_per_page=15;
			$total_page=ceil($totalrow/$limit_per_page);
			$start=($curpage-1)*$limit_per_page;

			$isql="select * from job_apply as a,user as b where	a.job_id=$job_id and a.user_id=b.user_id order by $order $sort limit $start,$limit_per_page";	
			$qry=$this->db->query($isql); 				
			$data['candidate_list']=$qry->result_array();

			$data['total_page']=$total_page;
			$data['total_data']=$totalrow;
			$data['currentpage']=$curpage;
			$data['limit_per_page']=$limit_per_page;
			$data['order']=$order;
			$data['sort']=$sort;
					
			
			$this->load->view('companyprofile/summary',$data);									
		}
		else
			redirect(site_url()."companyprofile/mystats.html");
		
		
	}
	function xllist($job_id=1){ 
		$data['msg']="";
		
		if($this->session->userdata('company_ID')!=''){

			$isql="select * from job_apply as a,user as b where	a.job_id=$job_id and a.user_id=b.user_id order by a.apply_date desc";	
			$qry=$this->db->query($isql); 
			$candidate_list=$qry->result_array();
			//print_r($candidate_list);
			//header("Content-Type: application/vnd.ms-excel");
			echo 'Name' . "\t" .'Email'."\t". 'Mobile' . "\t" . 'Address' ."\t". 'Gender'."\t"."Educational Degree"."\t"."Institution". "\n";
			foreach ($candidate_list as $key => $value) {
				$uid=$value['user_id'];	
				$q=$this->db->query("select mobile,address,gender from user_detail where user_id=$uid");
				$mb=$q->row_array();

				$e=$this->db->query("select degree_title,institution from user_education where user_id=$uid order by degree_id desc");
				$eb=$e->result_array();
				$xldata=$value['user_name']."\t";
				$xldata=$xldata.$value['email']."\t";
				if($mb['mobile']!='')
					$xldata=$xldata.$mb['mobile']."\t";				
				$xldata=$xldata.$mb['address']."\t";
				$xldata=$xldata.$mb['gender']."\t";
				echo $xldata."\n";
				
			}			
			
			//header("Content-disposition: attachment; filename=spreadsheet.xls");									
		}
		else
			redirect(site_url()."companyprofile/mystats.html");
		
	}

	

	function photo(){
		$msg="";	
		if($this->session->userdata('company_ID')!=''){
			$company_id=$this->session->userdata('company_ID');	
			$arr=$this->common->get_table_data(1,'company'," where company_id=$company_id","");		
			//$uname=explode(' ', $arr['user_name']);
			define('ROOT', dirname(dirname(dirname(__FILE__))));

			if(isset($_POST['sb'])){
				
					
					//$config['upload_path'] = str_replace("cp","",ROOT)."images/profileimage/";					
					$config['upload_path'] = ROOT."/images/companylogo/";					
					$config['allowed_types'] = 'gif|jpg|png';
					$thefilename  = str_replace('.', "", $arr['company_name']);
					$thefilename  = str_replace(' ', "_", $thefilename);					
					$config['file_name'] = $thefilename;
					//$config['file_name']  = str_replace(' ', "_", $arr['company_name']);

					$config['max_size']	= '350';
					$config['max_width']  = '200';
					$config['max_height']  = '200';

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
						$path=ROOT."/images/companylogo/".$arr['photo'];					
						@unlink($path);
						$this->db->query("update company set photo='$fname' where company_id=$company_id");
						$msg="Upload is successful";	
					}				
			} 
		$data['arr']=$this->common->get_table_data(1,'company'," where company_id=$company_id","");			
		}	
		$data['msg']=$msg;
		$data['title']="Upload Company Logo";
		$data['description']="Upload Company Logo";
		$this->load->view('companyprofile/company_photo',$data); 
	}

	function postjob(){
		
		$msg=""; 		$ind=1;		$a=array();
		if($this->session->userdata('company_ID')!=''){

			$company_id=$this->session->userdata('company_ID');
			if(isset($_POST['add'])){				
				$ttl=trim(mysql_escape_string($_POST['ttl'])) ;
				//$company=$_REQUEST['company'];
				$responsibility=trim(mysql_escape_string($_POST['responsibility']));
				$additional=trim(mysql_escape_string($_POST['additional']));
				$education=trim(mysql_escape_string($_POST['education']));
				$employment=trim(mysql_escape_string($_POST['employment']));
				$location=trim(mysql_escape_string($_POST['location']));
				$a['nature']=$nature=$_POST['nature'];
				$salary=trim(mysql_escape_string($_POST['salary']));
				$vacancy=$_POST['vacancy'];
				$a['yr']=$year=$_POST['year'];
				$a['mo']=$month=$_POST['month'];
				$a['da']=$day=$_POST['day'];
				$last_date=$year.'-'.$month.'-'.$day;

				if($ttl==''){
					$ind=0;	$msg.="Job Title is empty<br>"; 
				}	
				if($responsibility==''){
					$ind=0; $msg.="Please enter Job Responsibility<br>"; 
				}	
				if($education==''){
					$ind=0;$msg.="Please enter Education Requirement<br>";								
				}
				if($employment==''){
					$ind=0; $msg.="Please enter Employment Requirement<br>";				
				}
				if($location==''){
					$ind=0; $msg.="Please enter Job Location<br>";				
				}
				if($salary==''){
					$ind=0; $msg.="Please enter Salary<br>";				
				}
				if($vacancy==''){
					$ind=0; $msg.="Please enter Number of Vacancy<br>";				
				}
				$m=$this->employer_mod->check_date($year,$month,$day,'Last Date of Submission');
				if($m!=''){					
					$ind=0; $msg.=$m."<br>";				
				}	
				if($ind==1){
					$isql="insert into job_list set job_title='$ttl', job_description='$responsibility',company_id=$company_id,
							additional_info='$additional', job_nature='$nature', job_location='$location', education='$education', 
							experience='$employment', salary='$salary',vacancy=$vacancy, last_date='$last_date',
							status='active',post_date=NOW()";	
					$this->db->query($isql);
					$msg=" Job is posted.";
				}	
				//$hot_job=$_REQUEST['hot_job'];
				//$status=$_REQUEST['status'];
				//$isql="update  job_list set job_title='$ttl', job_description='$responsibility',additional_info='$additional',
				//	job_nature='$nature', job_location='$location', education='$education', experience='$employment',
				//	salary='$salary',vacancy=$vacancy,company='$company', last_date='$last_date',hot_job='$hot_job',
				//	status='$status' where	job_id=$job_id";	
				//$this->db->query($isql); 
			}	
			$data['a']=$a;
			$data['msg']=$msg;
			$data['title']="Post your job";
			$data['description']="Posting job";
			$this->load->view('companyprofile/postjob',$data); 
		}	
	}

	function editjob($job_id=1){
		
		$msg=""; 		$ind=1;		$a=array();
		if($this->session->userdata('company_ID')!=''){

			$company_id=$this->session->userdata('company_ID');
			if(isset($_POST['add'])){				
				$ttl=trim(addslashes($_POST['ttl'])) ;
				//$company=$_REQUEST['company'];
				$responsibility=trim(addslashes($_POST['responsibility']));
				$additional=trim(addslashes($_POST['additional']));
				$education=trim(addslashes($_POST['education']));
				$employment=trim(addslashes($_POST['employment']));
				$location=trim(addslashes($_POST['location']));
				$a['nature']=$nature=$_POST['nature'];
				$salary=trim(addslashes($_POST['salary']));
				$vacancy=$_POST['vacancy'];
				$status=$_REQUEST['status'];
				//$a['yr']=$year=$_POST['year'];
				$a['yr']=$year=trim(addslashes($_POST['year']));
				$a['mo']=$month=$_POST['month'];
				$a['da']=$day=$_POST['day'];
				$last_date=$year.'-'.$month.'-'.$day;

				if($ttl==''){
					$ind=0;	$msg.="Job Title is empty<br>"; 
				}	
				if($responsibility==''){
					$ind=0; $msg.="Please enter Job Responsibility<br>"; 
				}	
				if($education==''){
					$ind=0;$msg.="Please enter Education Requirement<br>";								
				}
				if($employment==''){
					$ind=0; $msg.="Please enter Employment Requirement<br>";				
				}
				if($location==''){
					$ind=0; $msg.="Please enter Job Location<br>";				
				}
				if($salary==''){
					$ind=0; $msg.="Please enter Salary<br>";				
				}
				if($vacancy==''){
					$ind=0; $msg.="Please enter Number of Vacancy<br>";				
				}
				$m=$this->employer_mod->check_date($year,$month,$day,'Last Date of Submission');
				if($m!=''){					
					$ind=0; $msg.=$m."<br>";				
				}	
				if($ind==1){
					$isql="update job_list set job_title='$ttl', job_description='$responsibility',additional_info='$additional', 
							job_nature='$nature', job_location='$location', education='$education', 
							experience='$employment', salary='$salary',vacancy=$vacancy, last_date='$last_date',
							status='$status' where job_id=$job_id";	
					$this->db->query($isql);
					$msg=" Updated";
				}				
			}	
			$data['arr']=$this->common->get_table_data(1,'job_list'," where job_id=$job_id and company_id=$company_id","");	
			if(count($data['arr'])==0){ redirect(site_url().'companyprofile/mystats.html');}
			$data['a']=$a;
			$data['msg']=$msg;
			$data['title']="Edit the posted  job";
			$data['description']="Edit Posted job";
			$this->load->view('companyprofile/editjob',$data); 
		}
		else
			redirect();	
	}
}
?>
