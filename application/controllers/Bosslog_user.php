<?php
/*
Author: Avijit Sen
*/
class Bosslog_user extends CI_Controller
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
	
	
	function viewuser($curpage=1)
	{
	
		$data['msg']="";
		if($this->session->userdata('ADLOG')=='ADLOG'){
			
			$qry=$this->db->query("select count(*) as total from user");
			$arr=$qry->row_array();
			$totalrow=$arr['total'];
			
			//@$curpage=  ($_GET['curpage']!='') ? "$_GET[curpage]" : '';
			@$sort=$_GET['sort'];
			@$order=$_GET['order'];
			if($sort=='')$sort='desc';
			if($order=='')$order='user_id';
			if($curpage=='')$curpage=1;
			$limit_per_page=40;
			$total_page=ceil($totalrow/$limit_per_page);
			$start=($curpage-1)*$limit_per_page;
			$sql="select * from user order by $order $sort limit $start,$limit_per_page";
			$qry=$this->db->query($sql);	
			$data['user_list']=$qry->result_array();
			//print_r($data['infolist']);
			$data['total_page']=$total_page;
			$data['currentpage']=$curpage;
			$data['order']=$order;
			$data['sort']=$sort;						
		}
		else
			redirect(site_url()."/bosslog.html");
		$data['title']=" Insert Job";
		$this->load->view('admin/viewuser',$data); 
		
	}

    function summaryuser($curpage=1)
	{
	
		$data['msg']="";
		if($this->session->userdata('ADLOG')=='ADLOG'){
			
			$qry=$this->db->query("select count(*) as total from user where status='active'");
			$arr=$qry->row_array();
			$totalrow=$arr['total'];
			
			//@$curpage=  ($_GET['curpage']!='') ? "$_GET[curpage]" : '';
			@$sort=$_GET['sort'];
			@$order=$_GET['order'];
			if($sort=='')$sort='desc';
			if($order=='')$order='user_id';
			if($curpage=='')$curpage=1;
			$limit_per_page=4000;
			$total_page=ceil($totalrow/$limit_per_page);
			$start=($curpage-1)*$limit_per_page;
			$sql="select * from user  where status='active' order by $order $sort limit $start,$limit_per_page";
			$qry=$this->db->query($sql);	
			$data['user_list']=$qry->result_array();
			//print_r($data['infolist']);
			$data['total_page']=$total_page;
			$data['currentpage']=$curpage;
			$data['order']=$order;
			$data['sort']=$sort;						
		}
		else
			redirect(site_url()."/bosslog.html");
		$data['title']=" Insert Job";
		$this->load->view('admin/summaryuser',$data); 
		
	}


	function showuser($user_id=1)
	{
	
		$data['msg']="";
		if($this->session->userdata('ADLOG')=='ADLOG'){
			
			//$user_id=$this->session->userdata('ID');
			$sql="select * from user where user_id=$user_id";
			$query=$this->db->query($sql);
			$data['arr']=$query->row_array();
			
			$dsql="select * from user_detail where user_id=$user_id";
			$query=$this->db->query($dsql);
			$data['detail_arr']=$query->row_array();

			$dsql="select * from user_education where user_id=$user_id order by degree_id desc";
			$query=$this->db->query($dsql);
			$data['edu_arr']=$query->result_array();

			$wsql="select * from user_work where user_id=$user_id";
			$query=$this->db->query($wsql);
			$data['emp_arr']=$query->result_array();

			$tsql="select * from user_training where user_id=$user_id";
			$query=$this->db->query($tsql);
			$data['tra_arr']=$query->result_array();				
		}
		else
			redirect(site_url()."/bosslog.html");
		$data['title']=" Insert Job";
		$this->load->view('admin/showuser',$data); 		
	}


	function edituser($user_id=1)
	{
	
		$data['msg']="";
		if($this->session->userdata('ADLOG')=='ADLOG'){
			
			if(isset($_REQUEST['save'])){
				$user_name=trim($_POST['user_name']);	
				$access_id=trim($_POST['access_id']);
				$email=trim($_POST['email']);	
				$password=$_POST['password'];	
				$status=$_POST['status'];	
				$isql="update  user set user_name='$user_name', access_id='$access_id', password='$password', email='$email',status='$status' where user_id=$user_id";	
				$this->db->query($isql); 
			}	
			$sql="select * from user where user_id=$user_id";
			$query=$this->db->query($sql);
			$data['arr']=$query->row_array();						
		}
		else
			redirect(site_url()."/bosslog.html");
		$data['title']=" Edit user";
		$this->load->view('admin/edituser',$data); 
		
	}

	function searchuser($user_id=1)
	{
	
		$data['msg']="";
		$data['user_list']='';
		if($this->session->userdata('ADLOG')=='ADLOG'){
			
			if(isset($_POST['srub'])){
				$sr_txt=$_POST['sru'];
				$rd=$_POST['rd'];
				
				$tsql="select * from user as a , user_detail as b where a.user_id=b.user_id";
				if($rd=='userid')
					$tsql=$tsql." and a.user_id=$sr_txt";
				if($rd=='username')
					$tsql=$tsql." and a.access_id='$sr_txt'";
				if($rd=='mobile')
					$tsql=$tsql." and b.mobile='$sr_txt'";
				if($rd=='altmobile')
					$tsql=$tsql." and b.alt_mobile='$sr_txt'";
				if($rd=='email')
					$tsql=$tsql." and a.email='$sr_txt'";
				if($rd=='inactive')
					$tsql=$tsql." and a.status='inactive'";
				
				$query=$this->db->query($tsql);
				$data['user_list']=$query->result_array();
				

			}			
		}
		else
			redirect(site_url()."/bosslog.html");
		$data['title']=" Insert Job";
		$this->load->view('admin/searchuser',$data); 		
	}

	function searchuseradvance()
	{
	
		$data['msg']="";
		$data['user_list']='';
		if($this->session->userdata('ADLOG')=='ADLOG'){
			
			if(isset($_POST['srub'])){
				$address=$_POST['address'];
				$degree=$_POST['degree'];
				$inst=$_POST['inst'];
				$company=$_POST['company'];
				$desig=$_POST['desig'];

				$tsql="select distinct(a.user_id),b.degree_title,b.institution 
						from user_detail as a
						left  join user_education as b ON a.user_id=b.user_id 
						left  join user_work as c ON a.user_id=c.user_id 
						where
						a.address like '%$address%' and 
						(b.degree_title like '%$degree%' or b.major like '%$degree%') and
						b.institution like '%$inst%' and 
						c.company_name like '%$company%' and c.designation like '%$desig%'
                                               group by a.user_id";
				
				
				$this->db->query('SET SQL_BIG_SELECTS =1');
				$query=$this->db->query($tsql);
				$data['user_list']=$query->result_array();
				//print_r($data['user_list']);

			}			
		}
		else
			redirect(site_url()."/bosslog.html");
		$data['title']=" Advance Search";
		$this->load->view('admin/searchuseradvance',$data); 		
	}
	
	
	
}
?>
