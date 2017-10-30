<?php
/*
Author: Avijit Sen
*/
class Job extends CI_Controller
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
		$data['categorylist']=$sarr=$this->common->get_table_data(0,'job_category',''," order by job_category_id asc");
		$data['hot_jobs']=$sarr=$this->common->get_table_data(0,'job_list'," where status='active' and hot_job='yes'"," order by rand()");
		//print_r($data['hot_jobs']);
		$data['msg']="";

			$qry=$this->db->query("select count(*) as total from job_list where status='active'");
			$arr=$qry->row_array();
			$totalrow=$arr['total'];

			@$curpage=  ($_GET['curpage']!='') ? "$_GET[curpage]" : '';
			@$sort=$_GET['sort'];
			@$order=$_GET['order'];
			if($sort=='')$sort='desc';
			if($order=='')$order='job_id';
			if($curpage=='')$curpage=1;
			$limit_per_page=5;
			$total_page=ceil($totalrow/$limit_per_page);
			$start=($curpage-1)*$limit_per_page;
			$sql="select * from job_list where status='active' order by $order $sort limit $start,$limit_per_page ";
			$qry=$this->db->query($sql);
			$data['job_list']=$qry->result_array();
			//print_r($data['infolist']);
			$data['title']="Home";
			$data['description']="Home";
			$data['total_page']=$total_page;
			$data['currentpage']=$curpage;
			$data['order']=$order;
			$data['sort']=$sort;

		$this->load->view('home',$data);
	}

	function detail($job_id)
	{
		if(!is_numeric($job_id)) redirect(site_url());	// checking whether job id is numeric or not
		if($job_id<0) redirect(site_url());				// checking whether job id is negative or not

		$data['categorylist']=$sarr=$this->common->get_table_data(0,'job_category',''," order by job_category_id asc");
		$data['job_detail']=$sarr=$this->common->get_table_data(1,'job_list'," where status='active' and job_id=$job_id"," ");
		//print_r($sarr);
		if(count($sarr)<1) redirect(site_url());		// checking whether correspoing job found with this job_id

		$company_id=$data['job_detail']['company_id'];
		$data['company']=$sarr=$this->common->get_table_data(1,'company'," where status='active' and company_id=$company_id"," ");
		$data['msg']="";
		$data['title']=$data['job_detail']['job_title'];
		$data['description']=$data['company']['company_name'];
		if($data['company']['photo']!='')
			//$imgs="http://www.journeymakerjobs.com/images/companylogo/".$data['company']['photo'];
			$imgs="";
		else
			$imgs=$imgs="http://www.journeymakerjobs.com/images/jobopenings.jpg";
		$imgs='';
		$data['fimage']=$imgs;

		$this->load->view('job/detail',$data);
	}

	function applyjob($job_id=0)
	{

		if(!is_numeric($job_id)) redirect(site_url());	// checking whether job id is numeric or not
		if($job_id<0) redirect(site_url());				// checking whether job id is negative or not


		$msg='';
		$data['datainsert']="No";
		if($this->session->userdata('ID')!=''){
			$data['login']='Yes';
			if(isset($_REQUEST['confirm_apply'])){
				$job_id=$_POST['job_id'];
				$expected_salary=trim($_POST['expected_salary']);
				if($expected_salary!='')$msg=check_numeric($expected_salary);
				$user_id=$this->session->userdata('ID');

				if(empty($msg)){
					$jrr=$this->common->get_table_data(1,'job_apply'," where job_id=$job_id and user_id=$user_id"," ");
					if(count($jrr)>0)
						$datainsert='Yes';
					else {
						$sql="insert into job_apply set job_id=$job_id, user_id=$user_id, expected_salary='$expected_salary',apply_date=now()";
						$this->db->query($sql);
						$data['datainsert']="Yes";
					}
				}
			}
		}
		else
		{
			if(isset($_REQUEST['confirm_apply'])){
				$job_id=$_POST['job_id'];
				$email=$_POST['username'];
				$pass=$_POST['pass'];
				$expected_salary=$_POST['expected_salary'];
				$qry=$this->db->query("select * from user where access_id='$email' and password='$pass'");
				$arr=$qry->row_array();
				if(count($arr)>0){
						$this->session->set_userdata('ID',$arr['user_id']);
						$this->session->set_userdata('access_id',$arr['access_id']);
						$uid=$arr['user_id'];
						$jrr=$this->common->get_table_data(1,'job_apply'," where job_id=$job_id and user_id=$uid"," ");
						if(count($jrr)>0)
							$datainsert='Yes';
						else {
							$sql="insert into job_apply set job_id=$job_id, user_id=$uid, expected_salary='$expected_salary',apply_date=now()";	
							$this->db->query($sql);
							$data['datainsert']="Yes";
						}
						$ip = $_SERVER['REMOTE_ADDR'];
						$this->db->query("update user set last_login=curdate(), login_ip='$ip' where  access_id='$arr[access_id]'");
					}
					else
						$msg="Incorrect login information.";
			}
			$data['login']='No';
		}
		$data['categorylist']=$sarr=$this->common->get_table_data(0,'job_category',''," order by job_category_id asc");
		$data['job_detail']=$sarr=$this->common->get_table_data(1,'job_list'," where status='active' and job_id=$job_id and last_date>=curdate()"," ");
		if(count($sarr)<1) redirect(site_url());		// checking whether correspoing job found with this job_id

		/*if(isset($_REQUEST['confirm_apply'])){

				$data['login']='Yes';
				$expected_salary=$_POST['expected_salary'];
				$user_id=$this->session->userdata('ID');
				$sql="insert into job_apply set job_id=$job_id, user_id=$user_id, expected_salary=$expected_salary,apply_date=curdate()";
				$this->db->query($sql);
				$data['datainsert']="Yes";
			}
			else{
				$data['login']='No';
				$email=$_POST['email'];
				$pass=$_POST['pass'];
				$expected_salary=$_POST['expected_salary'];
				$qry=$this->db->query("select * from user where email='$email' and password='$pass'");
				$arr=$qry->row_array();
				if(count($arr)>0){
					$this->session->set_userdata('ID',$arr['user_id']);
					$this->session->set_userdata('email',$arr['email']);
					$uid=$arr['user_id'];
					$sql="insert into job_apply set job_id=$job_id, user_id=$uid, expected_salary=$expected_salary,apply_date=curdate()";
					$this->db->query($sql);
					$data['datainsert']="Yes";
				}

			}
			*/
		$data['msg']=$msg;
		$data['title']="Apply for ".$data['job_detail']['job_title'];
		$data['description']="Apply";
		$this->load->view('job/applyjob',$data);
	}



	function alljob($curpage=1){

		$data['categorylist']=$sarr=$this->common->get_table_data(0,'job_category',''," order by job_category_id asc");
		//$data['hot_jobs']=$sarr=$this->common->get_table_data(0,'job_list'," where status='active' and hot_job='yes'"," order by rand()");
		//print_r($data['hot_jobs']);
		$data['msg']="";
			$configarr=$this->common->get_table_data(1,'site_config'," where config_data='number_of_job_home'");
			$number_of_job_home=$configarr['config_value'];
			$qry=$this->db->query("select count(*) as total from job_list where status='active' and curdate()<=last_date");
			$arr=$qry->row_array();
			$totalrow=$arr['total']-$number_of_job_home;

			//@$curpage=  ($_GET['curpage']!='') ? "$_GET[curpage]" : '';
			@$sort=$_GET['sort'];
			@$order=$_GET['order'];
			if($sort=='')$sort='desc';
			if($order=='')$order='job_id';
			if($curpage=='')$curpage=1;
			$limit_per_page=15;
			$total_page=ceil($totalrow/$limit_per_page);
			$start=(($curpage-1)*$limit_per_page)+$number_of_job_home;
			$sql="select * from job_list where status='active' and curdate()<=last_date order by $order $sort limit $start,$limit_per_page ";
			$qry=$this->db->query($sql);
			$data['job_list']=$qry->result_array();

			//print_r($data['infolist']);
			$data['title']="Job List";
			$data['description']="All job list";
			$data['total_page']=$total_page;
			$data['currentpage']=$curpage;
			$data['order']=$order;
			$data['sort']=$sort;

		$this->load->view('job/alljob2',$data);

	}

	function search($curpage=1){

		$keyrd=@str_replace("'", "", $_POST['keyrd']);

		if($keyrd!='')
			$this->session->set_userdata('krd',$keyrd);
		else
			$keyrd=$this->session->userdata('krd');
		//$sl="select count(*) as total from job_list where (job_title like '%$keyrd%' || job_nature like '%$keyrd%' || job_location like '%$keyrd%') and status='active' and curdate()<=last_date";
		$sl="SELECT count(*) as total FROM job_list AS a, company AS b WHERE (a.job_title LIKE '%$keyrd%' || a.job_nature LIKE '%$keyrd%' || a.job_location LIKE '%$keyrd%'
								||  b.company_name like '%$keyrd%')
			 AND a.status = 'active' AND curdate( ) <= a.last_date AND (a.company_id = b.company_id)";
		$qry=$this->db->query($sl);
		$arr=$qry->row_array();
		$totalrow=$arr['total'];

		//@$curpage=  ($_GET['curpage']!='') ? "$_GET[curpage]" : '';
		@$sort=$_GET['sort'];
		@$order=$_GET['order'];
		if($sort=='')$sort='desc';
		if($order=='')$order='job_id';
		if($curpage=='')$curpage=1;
		$limit_per_page=10;
		$total_page=ceil($totalrow/$limit_per_page);
		$start=($curpage-1)*$limit_per_page;
		$sql="SELECT * FROM job_list AS a, company AS b WHERE (a.job_title LIKE '%$keyrd%' || a.job_nature LIKE '%$keyrd%' || a.job_location LIKE '%$keyrd%'
				||  b.company_name like '%$keyrd%'	)
			 AND a.status = 'active' AND curdate( ) <= a.last_date AND (a.company_id = b.company_id) order by $order $sort limit $start,$limit_per_page ";
		$qry=$this->db->query($sql);
		$data['job_list']=$qry->result_array();

		$data['keyrd']=$keyrd;
		$data['title']="Search Result of Job";
		$data['description']="Search your job";
		$data['total_page']=$total_page;
		$data['currentpage']=$curpage;
		$data['order']=$order;
		$data['sort']=$sort;

		$this->load->view('job/searchjob',$data);
	}
}
?>
