<?php $this->load->view("admin/header");?>

<?php 
	$job_id=$this->uri->segment(3);	
	$q=$this->db->query("select * from job_list where job_id=$job_id");
	$job_table=$q->row_array();
?>	
<h3>Candidate List <span style='color:green;'><?php echo $job_table['job_title']?></span></h3>


<?php
$list = array
(
"Peter,Griffin,Oslo,Norway",
"Glenn,Quagmire,Oslo,Norway",
);

$file = fopen("contacts.csv","w");

foreach ($list as $line)
  {
  fputcsv($file,explode(',',$line));
  }

fclose($file); ?> 
<span id="msg" style="color:red;"></span>
<div style="border:0px solid green; width:800px">
	<div style="border:0px solid yellow; width:750px;float:left;">
			<table border="1">
			<tr><td>Name & Contact</td><td>Address</td><td>Gender</td><td>Degree</td><td>Institution</td>
			<td>Job Title-1</td><td>Company</td><td>Duration</td><td>Job Title-2</td><td>Company</td><td>Duration</td>
			<td>Job Title-3</td><td>Company</td><td>Duration</td>
			</tr>
			<?php $i=1; foreach($candidate_list as $jb){
				//	$comp=$this->common->get_table_data(1,'company'," where company_id=$jb[company_id]"," ");
				?>
				<tr <?php if($i%2==0){?>style="background:#E8E8F8;"<?php }?>>
					<td valign="top"><?php echo $jb['user_name'];?><br>
					Email: <?php echo $jb['email'];?><br>
					<?php 
						$uid=$jb['user_id'];	
						$q=$this->db->query("select mobile,address,gender from user_detail where user_id=$uid");
						$mb=$q->row_array();
					?>	
					Mobile: <?php echo $mb['mobile'];?>
					</td>					
					<!--<?php echo $jb['job_description'];?><br>
					<?php echo $jb['job_nature'];?><br>
					<?php echo $jb['job_location'];?><br>
					<?php echo $jb['education'];?><br>
					<?php echo $jb['salary'];?><br>-->
					<td valign="top"><?php echo $mb['address'];?></td>
					<td valign="top"><?php echo $mb['gender'];?></td>
					<?php 
						$uid=$jb['user_id'];	
						$e=$this->db->query("select degree_title,institution from user_education where user_id=$uid order by degree_id desc");
						$eb=$e->result_array();
					?>
					<td valign="top"><?php if(count($eb)>0){?><?php echo $eb[0]['degree_title'];?><?php } ?></td>
					<td valign="top"><?php if(count($eb)>0){?><?php echo $eb[0]['institution'];?><?php } ?></td>
					<?php 
						$uid=$jb['user_id'];	
						$w=$this->db->query("select company_name,designation,job_start,job_end from user_work where user_id=$uid order by job_end desc");
						//$wb=$w->row_array();						
						$wb=$w->result_array();						
						/*	<td><?php if(count($wb)>0)echo $wb['designation'];?></td>
					 	//<td><?php if(count($wb)>0)echo $wb['company_name'];?></td>*/
					?>
					<?php if(count($w)>0){foreach($wb as $w){?>
						<td valign="top"> <?php echo $w['designation'];?></td>
						<td valign="top"><?php echo $w['company_name'];?></td>						
						<td valign="top"><?php if($w['job_start']!='0000-00-00')echo show_date($w['job_start']); if($w['job_end']!='0000-00-00') {echo ' to '.show_date($w['job_end']);}else echo " - still continuing"?>
					<?php }} else {?>
					NA<br>
					NA</td>
					<?php } ?>
				</tr>
			<?php $i++;}?>
			</table>
			<div style="width:20%">
			<span class="textcolor">Go to page: <select name="pgselect"  onchange="gotopage(this.value,'<?php echo $jb['job_id'];?>','<?php echo $this->uri->segment(3)?>')">
							<?php for($i=1;$i<=$total_page;$i++){?>
								<option value="<?php echo $i;?>" <?php if($currentpage==$i){?>selected<?php }?>>&nbsp;<?php echo $i;?></option>
							<?php } ?>
					</select>
			</div>
	</div>
	<!--<div style="border:0px solid cyan; width:398px;float:left;">
			
	</div>	-->
	
</div>	
<script type="text/javascript">
 function gotopage(pageno,jobid,urlname){
	
			document.location.href =jurl+"bosslog_job/details/"+jobid+"/"+pageno+".html"; 
		  }
</script>
<?php $this->load->view("admin/footer");?>
