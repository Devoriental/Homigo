<?php $this->load->view("admin/header");?>
<div class='row'>
	<div class='twelve columns'>	
		<span id="msg" style="color:red;"></span>
		<div class="myresume_div mrfont"> <br>
			<?php if($arr['photo']!=''){?>
				<img class="img-rounded" src="<?php echo site_url()?>images/profileimage/<?php echo $arr['photo'];?>" width='150' height='155'>
				<br> 
			<?php } else { ?>
				<img class="img-rounded" src="<?php echo site_url()?>images/defaultphoto.jpg" width='150' height='155'><br>						
			<?php }?>
		</div>
		<h4 style="margin-right:0px;padding-right:0px;color:blue">Personal Details</h4>
		<div class="myresume_div mrfont">
				<table border="0" class="u-full-width">
				<tr><td width="20%">Name:</td><td>:&nbsp;<?php echo $arr['user_name'];?></td></tr>
				<tr><td>Email:</td><td>:&nbsp;<?php echo $arr['email'];?></td></tr>
				<?php if(count($detail_arr)>0){?>
					<tr><td>Father Name</td><td>:&nbsp;<?php echo $detail_arr['father_name'];?></td></tr>
					<tr><td>Mother Name</td><td>:&nbsp;<?php echo $detail_arr['mother_name'];?></td></tr>
					<tr><td valign="top">Address</td><td>:&nbsp;<?php echo $detail_arr['address'];?></td></tr>
					<tr><td>Date of Birth </td><td>:&nbsp;<?php echo show_date($detail_arr['birth_date']);?></td></tr>
					<tr><td>Mobile</td><td>:&nbsp;<?php echo $detail_arr['mobile'];?></td></tr>
					<tr><td>Alternamte Mobile</td><td>:&nbsp;<?php echo $detail_arr['alt_mobile'];?></td></tr>
					<tr><td>National ID</td><td>:&nbsp;<?php echo $detail_arr['national_id'];?></td></tr>
					<tr><td>Facebook ID</td><td>:&nbsp;<?php echo $detail_arr['facebook_id'];?></td></tr>
					<tr><td>Gender</td><td>:&nbsp;<?php echo $detail_arr['gender'];?></td></tr>
					<tr><td>Marital Status</td><td>:&nbsp;<?php echo $detail_arr['marital_status'];?></td></tr>
					<tr><td valign="top">Objective</td><td>:&nbsp;<?php echo nl2br(stripslashes($detail_arr['objective']));?></td></tr>

				<?php }?>
				</table>
			</div>

		<h4 style="margin-top:25px;color:blue">Education</h4>
		<div class="myresume_div mrfont">				
				<?php if(count($edu_arr)>0){
				foreach ($edu_arr as $er) {
						$dr=$this->common->get_table_data(1,'degree'," where degree_id=$er[degree_id]"," ");
					?>
					<?php echo $dr['degree_name'];?><br>
					<?php echo $er['degree_title'];?><br>
					Institution:<?php echo $er['institution'];?><br>
					Subject/Major: <?php echo $er['major'];?><br>
					Result: <?php echo $er['result'];?>
					<?php if($er['semester']!=''){echo $er['semester'];	}?>
					<br>
					Year of pass/Academic Year: <?php echo $er['pass_year'];?><br><br>
				<?php }}?>
		</div>				

		<h4 style="color:blue">Employment Details</h4>
		<div class="myresume_div mrfont">		
		
				<?php if(count($emp_arr)>0){
					foreach ($emp_arr as $wr) {				
				?>
				Designation: <?php echo $wr['designation'];?><br>
				Company/Organization: <?php echo $wr['company_name'];?><br>
				Responsibility: <?php echo nl2br($wr['responsibility']);?><br>
				Duration: <?php if($wr['job_start']!='0000-00-00'){?>
					From <?php echo date('d-m-Y',strtotime($wr['job_start'])); if($wr['job_end']!='0000-00-00'){?> to 
					<?php echo date('d-m-Y',strtotime($wr['job_end']));} else echo " - Still Continuing";?><br>
				<?php }else
				 echo 'N/A<br>';?>
			
				<br><br>
				<?php }}?>
		</div>	
			
		<h4 style="color:blue">Training</h4>
		<div class="myresume_div mrfont">
				
				<?php if(count($tra_arr)>0){
					foreach ($tra_arr as $tr) {				
					?>
					 style="font-weight:bold;"><?php echo $tr['training_title'];?><br>
					>Institution: <?php echo $tr['institution'];?><br>
					>Topic Details: <?php echo $tr['topic_details'];?><br>
					>Location: <?php echo $tr['location'];?><br>
					>Duration: <?php echo $tr['duration'];?><br>
					
				<?php }}?>
				<br><br>
		</div>	
		<hr>
		<h4 style="color:blue">Additional Information</h4>
		<div class="myresume_div mrfont">			
				>User Status: <?php echo $arr['status'];?><br>
				>User ID: <?php echo $arr['user_id'];?><br>
				>Access ID: <?php echo $arr['access_id'];?><br>
				>Password: <?php echo $arr['password'];?><br>
				>Registration Date: <?php echo show_date($arr['reg_date']);?><br>
				>Last Login: <?php if($arr['last_login']!='0000-00-00'){echo show_date($arr['last_login']);}?><br>
				<?php $qr=$this->db->query("SELECT count(*) as num_job FROM `job_apply` WHERE user_id =$arr[user_id]");
					  $nr=$qr->row_array();	
				?>
				>Login IP Address: <?php echo $arr['login_ip'];?><br>
				>Number of job the applied:&nbsp;&nbsp;<u><?php echo $nr['num_job'];?></u><br>
		</div>
	</div>
	
</div>	
<script type="text/javascript">
 function gotopage(pageno,urlname){
	
			document.location.href =jurl+"bosslog_user/viewuser/"+pageno+".html"; 
		  }
</script>
<br><br>
<?php $this->load->view("admin/footer");?>