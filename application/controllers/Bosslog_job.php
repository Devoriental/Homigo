<?php
/*
Author: Avijit Sen
*/
class Bosslog_job extends CI_Controller
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
		if($this->session->userdata('ADLOG')=='ADLOG'){
			$data['crr']=$crr=$this->common->get_table_data(0,'company'," where status='active'"," order by company_name asc");
			
			if(isset($_REQUEST['add'])){
			/* $sql="select * from user where user_id=$user_id";
			$query=$this->db->query($sql);
			$data['arr']=$query->row_array(); */
			$ttl=trim(mysql_escape_string($_REQUEST['ttl']));
			$company_id=$_REQUEST['company'];
			$responsibility=mysql_escape_string($_REQUEST['responsibility']);
			$additional=mysql_escape_string($_REQUEST['additional']);
			$education=mysql_escape_string($_REQUEST['education']);
			$employment=mysql_escape_string($_REQUEST['employment']);
			$location=mysql_escape_string($_REQUEST['location']);
			$nature=$_REQUEST['nature'];
			$salary=trim($_REQUEST['salary']);
			$vacancy=$_REQUEST['vacancy'];
			$last_date=$_REQUEST['last_date'];
			$isql="insert into job_list set job_title='$ttl', job_description='$responsibility',additional_info='$additional',
				job_nature='$nature', job_location='$location', education='$education', experience='$employment',
				salary='$salary', vacancy='$vacancy',company_id=$company_id, last_date='$last_date',status='inactive',post_date=NOW() ";	
			$this->db->query($isql); 			
			$job_id=$this->db->insert_id();			
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
				$ttl=trim(mysql_escape_string($_REQUEST['ttl']));
				$company=$_REQUEST['company'];
				$responsibility=mysql_escape_string($_REQUEST['responsibility']);
				$additional=mysql_escape_string($_REQUEST['additional']);
				$education=mysql_escape_string($_REQUEST['education']);
				$employment=mysql_escape_string($_REQUEST['employment']);
				$location=mysql_escape_string($_REQUEST['location']);
				$nature=$_REQUEST['nature'];
				$salary=trim($_REQUEST['salary']);
				$vacancy=$_REQUEST['vacancy'];
				//$last_date=$_REQUEST['last_date'];
				$hot_job=$_REQUEST['hot_job'];
				$status=$_REQUEST['status'];
				//$year=$_REQUEST['year'];
				$year=trim(mysql_escape_string($_REQUEST['year']));
				$month=$_REQUEST['month'];
				$day=$_REQUEST['day'];
				$last_date=$year.'-'.$month.'-'.$day;
				$isql="update  job_list set job_title='$ttl', job_description='$responsibility',additional_info='$additional',
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
	
	function viewjob($curpage=1,$s='jobid_desc')
	{
	
		$data['msg']="";
		if($this->session->userdata('ADLOG')=='ADLOG'){
			
			$qry=$this->db->query("select count(*) as total from job_list");
			$arr=$qry->row_array();
			$totalrow=$arr['total'];
			
			//@$curpage=  ($_GET['curpage']!='') ? "$_GET[curpage]" : '';
			$sort=''; $order='';
			$ss=explode('_', $s);
			
			if($ss[0]=='jobid') $order='job_id';
			if($ss[0]=='lastdate') $order='last_date';
			if($ss[0]=='postdate') $order='post_date';
			
			if($ss[1]=='asc') $sort='asc';
			if($ss[1]=='desc') $sort='desc';
			
			if($sort=='')$sort='desc';
			if($order=='')$order='job_id';
			if($curpage=='')$curpage=1;
			$limit_per_page=30;
			$total_page=ceil($totalrow/$limit_per_page);
			$start=($curpage-1)*$limit_per_page;
			$sql="select * from job_list order by $order $sort limit $start,$limit_per_page";
			$qry=$this->db->query($sql);	
			$data['job_list']=$qry->result_array();

	
			//print_r($data['infolist']);
			$data['total_page']=$total_page;
			$data['currentpage']=$curpage;
			$data['databae_column']=$ss[0];
			$data['sort_order']=$ss[1];
			
		}
		else
			redirect(site_url()."/bosslog.html");
		$data['title']=" View Job";
		$this->load->view('admin/viewjob',$data); 
		
	}

	function details($job_id=1,$curpage=1)
	{
	
		$data['msg']="";
		if($this->session->userdata('ADLOG')=='ADLOG'){

			$qry=$this->db->query("select count(*) as total from job_apply as a,user as b where	a.job_id=$job_id and a.user_id=b.user_id");
			$arr=$qry->row_array();
			$totalrow=$arr['total'];
			
			@$sort=$_GET['sort'];
			@$order=$_GET['order'];
			if($sort=='')$sort='desc';
			if($order=='')$order='apply_date';
			if($curpage=='')$curpage=1;
			$limit_per_page=40;
			$total_page=ceil($totalrow/$limit_per_page);
			$start=($curpage-1)*$limit_per_page;

			$isql="select * from job_apply as a,user as b where	a.job_id=$job_id and a.user_id=b.user_id order by $order $sort limit $start,$limit_per_page";	
			$qry=$this->db->query($isql); 				
			$data['candidate_list']=$qry->result_array();

			$data['total_page']=$total_page;
			$data['currentpage']=$curpage;
			$data['order']=$order;
			$data['sort']=$sort;
									
		}
		else
			redirect(site_url()."/bosslog.html");
		$data['title']=" Insert Job";
		$this->load->view('admin/details',$data); 
		
	}
	
	function searchjob($st='',$curpage=1)
	{
	
		$data['msg']="";
		$data['user_list']='';
		if($this->session->userdata('ADLOG')=='ADLOG'){
			
			//print_r($_REQUEST);
			if($_REQUEST['btnsubmit']=='sbmt'){
				$sr_txt=$_POST['sru'];
				$rd=$_POST['rd'];
				$cpage=$_POST['pgselect'];
				if($cpage!='' && $cpage>0) $curpage=$cpage;
				 $tsql="select count(*) as total from job_list as a where";
				if($rd=='jobid')
					$tsql=$tsql." a.job_id=$sr_txt";
				if($rd=='jobname')
					$tsql=$tsql." a.job_title like '%$sr_txt%'";
				if($rd=='Part Time')
					$tsql=$tsql." a.job_nature='Part Time'";
				if($rd=='Full Time')
					$tsql=$tsql."  a.job_nature='Full Time'";
				if($rd=='location')
					$tsql=$tsql."  a.job_location like '%$sr_txt%'";
				if($rd=='last_date')
					$tsql=$tsql."  a.last_date='$sr_txt'";
				if($rd=='inactive')
					$tsql=$tsql."  a.status='inactive'";
				
				//echo $tsql;
				$query=$this->db->query($tsql);
				$arr=$query->row_array();
				$totalrow=$arr['total'];

				$limit_per_page=30;
				$total_page=ceil($totalrow/$limit_per_page);
				$start=($curpage-1)*$limit_per_page;

				$tsql='';
				$tsql="select * from job_list as a where";
				if($rd=='jobid')
					$tsql=$tsql." a.job_id=$sr_txt";
				if($rd=='jobname')
					$tsql=$tsql." a.job_title like '%$sr_txt%'";
				if($rd=='Part Time')
					$tsql=$tsql." a.job_nature='Part Time'";
				if($rd=='Full Time')
					$tsql=$tsql."  a.job_nature='Full Time'";
				if($rd=='location')
					$tsql=$tsql."  a.job_location like '%$sr_txt%'";
				if($rd=='last_date')
					$tsql=$tsql."  a.last_date='$sr_txt'";
				if($rd=='inactive')
					$tsql=$tsql."  a.status='inactive'";

				$tsql=$tsql." order by a.job_id desc limit $start,$limit_per_page";
				$query='';
				$query=$this->db->query($tsql);
				$data['job_list']=$query->result_array();
				$data['sr_txt']=$sr_txt;				
				$data['rdval']=$rd;
				$data['total_page']=$total_page;
				$data['currentpage']=$curpage;
			}			
		}
		else
			redirect(site_url()."/bosslog.html");
		$data['title']=" Search Job";
		$this->load->view('admin/searchjob',$data); 		
	}	


	
	
} // last braces
?>
