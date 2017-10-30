<?php
/*
Author: Avijit Sen
*/
class Bosslog_interview extends CI_Controller
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
	
	
	function viewinterview($curpage=1)
	{
	
		$data['msg']="";
		if($this->session->userdata('ADLOG')=='ADLOG'){
			
			$qry=$this->db->query("select count(*) as total from interview");
			$arr=$qry->row_array();
			$totalrow=$arr['total'];
			
			//@$curpage=  ($_GET['curpage']!='') ? "$_GET[curpage]" : '';
			@$sort=$_GET['sort'];
			@$order=$_GET['order'];
			if($sort=='')$sort='desc';
			if($order=='')$order='interview_id';
			if($curpage=='')$curpage=1;
			$limit_per_page=40;
			$total_page=ceil($totalrow/$limit_per_page);
			$start=($curpage-1)*$limit_per_page;
			$sql="select * from interview order by $order $sort limit $start,$limit_per_page";
			$qry=$this->db->query($sql);	
			$data['interview_list']=$qry->result_array();
			//print_r($data['infolist']);
			$data['total_page']=$total_page;
			$data['currentpage']=$curpage;
			$data['order']=$order;
			$data['sort']=$sort;						
		}
		else
			redirect(site_url()."/bosslog.html");
		$data['title']=" Insert Job";
		$this->load->view('admin/viewinterview',$data); 
		
	}

	function editinterview($interview_id=1)
	{
	
		$data['msg']="";
		if($this->session->userdata('ADLOG')=='ADLOG'){
			
			if(isset($_REQUEST['update'])){
				$ttl=$_REQUEST['ttl'];
				$person=$_REQUEST['person'];
				$designation=$_REQUEST['designation'];
				$company=$_REQUEST['company'];
				$summary=$_REQUEST['summary'];
				$theinterview=$_REQUEST['theinterview'];
				$post_date=$_REQUEST['post_date'];								
				$status=$_REQUEST['status'];	

				$isql="update  interview set interview_title='$ttl',person='$person', person_info='$summary',
						designation='$designation',comp_name='$company',interview_text='$theinterview', interview_date='$post_date',
						status='$status' where	interview_id=$interview_id";	
				$this->db->query($isql); 
			}	
			$sql="select * from interview where interview_id=$interview_id";
			$query=$this->db->query($sql);
			$data['arr']=$query->row_array();
			
			
									
		}
		else
			redirect(site_url()."/bosslog.html");
		$data['title']=" Edit user";
		$this->load->view('admin/editinterview',$data); 
		
	}
	
	
	
}
?>
