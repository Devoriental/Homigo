<?php
/*
Author: Avijit Sen
*/
class Bosslog_company extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_mod');
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
		if($this->session->userdata('ADLOG')!='ADLOG'){
			$data['crr']=$crr=$this->common->get_table_data(0,'company'," where status='active'"," order by company_name asc");
			
			if(isset($_REQUEST['add'])){
			/* $sql="select * from user where user_id=$user_id";
			$query=$this->db->query($sql);
			$data['arr']=$query->row_array(); */
			$ttl=$_REQUEST['ttl'];
			$company_id=$_REQUEST['company'];
			$responsibility=$_REQUEST['responsibility'];
			$education=$_REQUEST['education'];
			$employment=$_REQUEST['employment'];
			$location=$_REQUEST['location'];
			$nature=$_REQUEST['nature'];
			$salary=$_REQUEST['salary'];
			$vacancy=$_REQUEST['vacancy'];
			$last_date=$_REQUEST['last_date'];
			$isql="insert into job_list set job_title='$ttl', job_description='$responsibility',
				job_nature='$nature', job_location='$location', education='$education', experience='$employment',
				salary='$salary', vacancy=$vacancy,company_id=$company_id, last_date='$last_date',status='inactive' ";	
			$this->db->query($isql); 			
			}			
		}
		else
			redirect(site_url()."/bosslog.html");
		$data['title']=" Insert Job";
		$this->load->view('admin/bosslog_insert',$data); 
		
	}
	
	function editjob($job_id=1)
	{
	
		$data['msg']="";
		if($this->session->userdata('ADMINID')!=''){
			if(isset($_REQUEST['update'])){
				/* $sql="select * from user where user_id=$user_id";
				$query=$this->db->query($sql);
				$data['arr']=$query->row_array(); */
				$ttl=$_REQUEST['ttl'];
				$company=$_REQUEST['company'];
				$responsibility=$_REQUEST['responsibility'];
				$education=$_REQUEST['education'];
				$employment=$_REQUEST['employment'];
				$location=$_REQUEST['location'];
				$nature=$_REQUEST['nature'];
				$salary=$_REQUEST['salary'];
				$vacancy=$_REQUEST['vacancy'];
				$last_date=$_REQUEST['last_date'];
				$hot_job=$_REQUEST['hot_job'];
				$status=$_REQUEST['status'];
				$isql="update  job_list set job_title='$ttl', job_description='$responsibility',
					job_nature='$nature', job_location='$location', education='$education', experience='$employment',
					salary='$salary',vacancy=$vacancy,company='$company', last_date='$last_date',hot_job='$hot_job',
					status='$status' where	job_id=$job_id";	
				$this->db->query($isql); 			
			}			
			$jsql="select * from job_list where job_id=$job_id";	
			$query=$this->db->query($jsql); 		
			$data['jobs']=$query->row_array();
			
		}
		else
			redirect(site_url()."/bosslog.html");
		$data['title']=" Edit Job";
		$this->load->view('admin/editjob',$data); 
		
	}
	
	
	function viewcompany($curpage=1)
	{
	
		$data['msg']="";
		if($this->session->userdata('ADLOG')=='ADLOG'){
			
			$qry=$this->db->query("select count(*) as total from company");
			$arr=$qry->row_array();
			$totalrow=$arr['total'];
			
			//@$curpage=  ($_GET['curpage']!='') ? "$_GET[curpage]" : '';
			@$sort=$_GET['sort'];
			@$order=$_GET['order'];
			if($sort=='')$sort='desc';
			if($order=='')$order='company_id';
			if($curpage=='')$curpage=1;
			$limit_per_page=25;
			$total_page=ceil($totalrow/$limit_per_page);
			$start=($curpage-1)*$limit_per_page;
			$sql="select * from company order by $order $sort limit $start,$limit_per_page";
			$qry=$this->db->query($sql);	
			$data['company_list']=$qry->result_array();
			//print_r($data['infolist']);
			$data['total_page']=$total_page;
			$data['currentpage']=$curpage;
			$data['order']=$order;
			$data['sort']=$sort;						
		}
		else
			redirect(site_url()."/bosslog.html");
		$data['title']=" Insert Job";
		$this->load->view('admin/viewcompany',$data); 
		
	}

	function editcompany($company_id=1)
	{
	
		$data['msg']="";
		if($this->session->userdata('ADLOG')=='ADLOG'){
			if(isset($_REQUEST['update'])){	
				$a['company_name']=$name=trim(addslashes(($_REQUEST['company_name'])));
				$a['company_real_name']=$real_name=trim(addslashes($_REQUEST['company_real_name']));
				$a['emp_type']=$emp_type=trim(addslashes($_REQUEST['emp_type']));
				$a['cp_name']=$cp_name=trim(addslashes($_REQUEST['cp_name']));
				$a['cp_desig']=$cp_desig=trim(addslashes($_REQUEST['cp_desig']));
				$a['tel']=$tel=trim($_REQUEST['tel']);
				$a['email']=$email=trim($_REQUEST['email']);			
				$password=$_REQUEST['password'];
				$address=trim(addslashes($_REQUEST['address']));
				$website=trim($_REQUEST['website']);
				$company_info=trim(addslashes($_REQUEST['company_info']));				
				$status=$_REQUEST['status'];

				$sql="update company set company_name='$name',company_real_name='$real_name',company_type='$emp_type',concern_person='$cp_name',concern_designation='$cp_desig',
						company_address='$address',mobile=$tel,email='$email', password='$password',website='$website',company_info='$company_info',
						status='$status' where company_id=$company_id";	
				$this->db->query($sql);
			}	

			$jsql="select * from company where company_id=$company_id";	
			$query=$this->db->query($jsql); 		
			$data['company']=$query->row_array();						
		}
		else
			redirect(site_url()."/bosslog.html");
		$data['title']=" Insert Job";
		$this->load->view('admin/editcompany',$data); 
		
	}
	
function searchcompany($company_id=1)
	{
	
		$data['msg']="";
		$data['user_list']='';
		if($this->session->userdata('ADLOG')=='ADLOG'){
			
			if(isset($_POST['srub'])){
				$sr_txt=addslashes($_POST['sru']);
				$rd=$_POST['rd'];
				
				$tsql="select * from company where ";
				if($rd=='companyid')
					$tsql=$tsql." company_id=$sr_txt";
				if($rd=='companyname')
					$tsql=$tsql." company_name like '%$sr_txt%'";
				if($rd=='companyrealname')
					$tsql=$tsql." company_real_name like '%$sr_txt%'";
				if($rd=='inactive')
					$tsql=$tsql." status='inactive'";
				
				$query=$this->db->query($tsql);
				$data['company_list']=$query->result_array();
				

			}			
		}
		else
			redirect(site_url()."/bosslog.html");
		$data['title']=" Insert Job";
		$this->load->view('admin/searchcompany',$data); 		
	}	
	
}
?>
