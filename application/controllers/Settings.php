<?php
/*
Author: Avijit Sen
*/
class Settings extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//$this->load->model('expenditure_mod');
		//$this->load->model('sale_mod');
		//$this->load->model('loan_mod');
	}
	
	function index()
	{		
		
		//$data['itemdata']=$sarr=$this->common->get_table_data(0,'expenditure_item',''," order by item_id asc");
		//$data['anolist']=$sarr=$this->common->get_table_data(0,'annotation',''," order by title");
		//print_r($_REQUEST);
		/* if(@$_POST['add_item']=='Add Item'){
			$item=$_REQUEST['itemtxt'];	
			$this->db->query("insert into expenditure_item set item_name='$item'");
		} */
		$data['title']="";
		$data['keyword']="";
		$data['description']="";
		$data['tg']="home";
		$this->load->view('settings/settings',$data); 
	}
	
	function subjectlist()
	{		
		
		//$data['itemdata']=$sarr=$this->common->get_table_data(0,'expenditure_item',''," order by item_id asc");
		//$data['anolist']=$sarr=$this->common->get_table_data(0,'annotation',''," order by title");
		//print_r($_REQUEST);
		/* if(@$_POST['add_item']=='Add Item'){
			$item=$_REQUEST['itemtxt'];	
			$this->db->query("insert into expenditure_item set item_name='$item'");
		} */
		$data['title']="";
		$data['keyword']="";
		$data['description']="";
		$data['tg']="home";
		$this->load->view('settings/subjectlist',$data); 
	}
	
	function subjectadd()
	{		
		$data['classlist']=$sarr=$this->common->get_table_data(0,'class',''," order by class_name asc");
		$data['title']="";
		$data['keyword']="";
		$data['description']="";
		$data['tg']="home";
		$this->load->view('settings/subjectadd',$data); 
	}
	function add_subject()
	{		
		$name=$_REQUEST['name'];
		$class_id=$_REQUEST['class_id'];
		$group_id=$_REQUEST['group_id'];
		if($group_id=='')$group_id=0;
		if($name!=''){
			
			$this->db->query("insert into subject set subject_name='$name',class_id=$class_id,group_id=$group_id");
		}
	}	

	function examlist()
	{		
		$data['title']="";
		$data['keyword']="";
		$data['description']="";
		$data['tg']="home";
		$this->load->view('settings/examlist',$data); 
	}
	
	function examadd()
	{		
		//$data['classlist']=$sarr=$this->common->get_table_data(0,'class',''," order by class_name asc");
		$data['title']="";
		$data['keyword']="";
		$data['description']="";
		$data['tg']="home";
		$this->load->view('settings/examadd',$data); 
	}

	function add_exam()
	{		
		$name=$_REQUEST['name'];
		//$class_id=$_REQUEST['class_id'];
		//$group_id=$_REQUEST['group_id'];
		//if($group_id=='')$group_id=0;
		if($name!=''){
			
			$this->db->query("insert into exam set exam_name='$name'");
		}
	}	
	
	function st()
	{	
		//--------------Expenditure Part---------------/
		$sel_search=$_REQUEST['select_search'];
		if($_REQUEST['one_date']=='')redirect('statement');
		if($sel_search=='bydate'){
			$one_date=$_REQUEST['one_date'];
			$split_date=explode("-",$one_date);
			$mon_ind=get_month_index($split_date[1]);
			$thedate=$split_date[2].'-'.$mon_ind.'-'.$split_date[0];
			$data['saleexp']=$this->expenditure_mod->get_search_bydate($thedate);
			$data['ttl']= "&nbsp;".$one_date;
			$data['bar']=date("l", mktime(0, 0, 0, $mon_ind, $split_date[0], $split_date[2]));

		}
		
	 	elseif($sel_search=='fromdate'){	
			$from_date=$_REQUEST['from_date'];
			$to_date=$_REQUEST['to_date'];
			$split_datef=explode("-",$from_date);
			$split_datet=explode("-",$to_date);
			$mon_indf=get_month_index($split_datef[1]);
			$mon_indt=get_month_index($split_datet[1]);
			$fromdate=$split_datef[2].'-'.$mon_indf.'-'.$split_datef[0];
			$todate=$split_datet[2].'-'.$mon_indt.'-'.$split_datet[0];
			$data['saleexp']=$this->expenditure_mod->get_search_byfromdate($fromdate,$todate);
		}
		elseif($sel_search=='bymonth')
		{
			$smonth=$_REQUEST['smonth'];
			$syear=$_REQUEST['syear'];
			$data['saleexp']=$this->expenditure_mod->get_search_bymonth($smonth,$syear);
		} 
		//--------------End Expenditure Part---------------/
		//--------------SAlE Part---------------/
		if($sel_search=='bydate'){
			$one_date=$_REQUEST['one_date'];
			$split_date=explode("-",$one_date);
			$mon_ind=get_month_index($split_date[1]);
			$thedate=$split_date[2].'-'.$mon_ind.'-'.$split_date[0];
			$data['sales']=$this->sale_mod->get_search_bydate($thedate);
			
		}
	 	elseif($sel_search=='fromdate'){	
			$from_date=$_REQUEST['from_date'];
			$to_date=$_REQUEST['to_date'];
			$split_datef=explode("-",$from_date);
			$split_datet=explode("-",$to_date);
			$mon_indf=get_month_index($split_datef[1]);
			$mon_indt=get_month_index($split_datet[1]);
			$fromdate=$split_datef[2].'-'.$mon_indf.'-'.$split_datef[0];
			$todate=$split_datet[2].'-'.$mon_indt.'-'.$split_datet[0];
			$data['sales']=$this->sale_mod->get_search_byfromdate($fromdate,$todate);
		}
		elseif($sel_search=='bymonth')
		{
			$smonth=$_REQUEST['smonth'];
			$syear=$_REQUEST['syear'];
			$data['sales']=$this->sale_mod->get_search_bymonth($smonth,$syear);
		}
		//--------------END SAlE Part---------------/
		//----------------Loan Part---------------/
		$data['loan_take_list']=$this->loan_mod->get_loan_data_day($thedate);
		$data['loan_pay_list']=$this->loan_mod->get_loanpay_data_day($thedate);
		//--------------END Loan Part---------------/
		$data['balanceinfo']=$barr=$this->common->get_table_data(1,'balance'," where balance_day='$thedate'","");
		$this->load->view('statement/st',$data); 
	}
	function st_month(){
	
		$this->load->view('statement/st_month',$data); 
	}
}
?>
