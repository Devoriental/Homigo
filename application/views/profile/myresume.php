<?php $this->load->view("header");?>
<section id="my-resume">
	<div class="container">
		
		<div class="row" >
			<?php //$this->load->view("profile/profile_submenu");?>
			<div class="col-sm-2" style="border:0px solid #A2A1A0;min-height:100px;">
            		&nbsp;
            </div>
			<div class="col-sm-8" style="border:0px solid #A2A1A0;">
				<div class="center wow fadeInDown">
					<h2 style="margin-bottom:0px;padding-bottom:0px">Edit Resume</h2>			
				</div>
			</div>
			
			<div class="col-sm-8" style="border:1px solid #f0ecec;background:#;border-radius:.5em">

				<div style="text-align:center;margin-top:15px;">
					<?php if($arr['photo']!=''){?>
						<img class="img-rounded" src="<?php echo site_url()?>images/profileimage/<?php echo $arr['photo'];?>" width='150' height='155'>
						<br> 
					<?php }else {?>
						<img class="img-rounded" src="<?php echo site_url()?>images/defaultphoto.jpg" width='150' height='155'><br>
						<!--<div style="text-align:center;width:150px;height:155px;border:3px solid white;background:#b3b3ac;border-radius:.3em">
							<p style="text-align:center;margin-top:50px;font-size:20px;">Your Photo</p>
						</div>-->
					<?php }?>
					
					<a href="<?php echo site_url()?>profile/photo.html" class="myresume_aclass">Upload/Update your profile picture.</a>
				</div>	
			
				<br><br>
				<h4 style="margin-right:0px;padding-right:0px;">Personal Details</h4>
				<div class="myresume_div mrfont">
					(<a href="<?php echo site_url();?>profile/editpersonal.html" class="myresume_aclass">Edit your presonal details</a>)
					<br><br>
					<table border="0">
					<tr width="80%"><td>Name:</td><td>:&nbsp;<?php echo $arr['user_name'];?></td></tr>
					<tr><td>Email:</td><td>:&nbsp;<?php echo $arr['email'];?></td></tr>
					<?php if(count($detail_arr)>0){?>
						<tr><td>Father's Name</td><td>:&nbsp;<?php echo $detail_arr['father_name'];?></td></tr>
						<tr><td>Mother's Name</td><td>:&nbsp;<?php echo $detail_arr['mother_name'];?></td></tr>
						<tr><td valign="top">Address</td><td>:&nbsp;<?php echo $detail_arr['address'];?></td></tr>
						<tr><td>Date of Birth </td><td>:&nbsp;<?php echo show_date($detail_arr['birth_date']);?></td></tr>
						<tr><td>Mobile</td><td>:&nbsp;<?php echo $detail_arr['mobile'];?></td></tr>
						<tr><td>Alternate Mobile</td><td>:&nbsp;<?php echo $detail_arr['alt_mobile'];?></td></tr>
						<tr><td>National ID</td><td>:&nbsp;<?php echo $detail_arr['national_id'];?></td></tr>
						<tr><td>Facebook ID</td><td>:&nbsp;<?php echo $detail_arr['facebook_id'];?></td></tr>
						<tr><td>Gender</td><td>:&nbsp;<?php echo $detail_arr['gender'];?></td></tr>
						<tr><td>Marital Status</td><td>:&nbsp;<?php echo $detail_arr['marital_status'];?></td></tr>
						<tr><td valign="top">Objective</td><td>:&nbsp;<?php echo nl2br($detail_arr['objective']);?></td></tr>

					<?php }?>
					</table>
				</div><br>
			

				<h4 style="margin-top:25px;">Education</h4>
				<div class="myresume_div mrfont">
				(<a href="<?php echo site_url();?>profile/addeducation.html" class="myresume_aclass">Add your educational qualification</a>)
				<br><br>					
				<?php if(count($edu_arr)>0){
				foreach ($edu_arr as $er) {
						$dr=$this->common->get_table_data(1,'degree'," where degree_id=$er[degree_id]"," ");
					?>
					<h5 class="" style=""><?php echo $dr['degree_name'];?></h5>
					<?php echo $er['degree_title'];?><br>
					Institution: <?php echo $er['institution'];?><br>
					Subject/Major: <?php echo $er['major'];?><br>
					Result: <?php echo $er['result'];?>
					<?php if($er['semester']!=''){?><?php echo $er['semester'];?><?php }?>
					<br>
					Year of pass/Academic Year: <?php echo $er['pass_year'];?><br>
					(<a href="<?php echo site_url();?>profile/editeducation/<?php echo $er['user_education_id'];?>.html" class="myresume_aclass">Click here to edit</a>)		
					&nbsp;&nbsp;&nbsp;
					(<a href="#" class="myresume_aclass" onclick="deleteit('<?php echo $er['user_education_id'];?>','education')">Delete</a>)		
			    	<br><br>
				<?php }}?>
				</div>	
			

				<h4 style="">Employment Details</h4>
				<div class="myresume_div mrfont">
				(<a href="<?php echo site_url();?>profile/addemployment.html" class="myresume_aclass" <?php if($this->uri->segment(1)=='article'){?>class="linkhover"<?php }?>>Add your employent details</a>)				
				<br><br>
				<?php if(count($emp_arr)>0){
					foreach ($emp_arr as $wr) {				
				?>
				<label style="">Designation: </label> &nbsp;<?php echo $wr['designation'];?><br>
				Company/Organization: <?php echo $wr['company_name'];?><br>
				Responsibility: <?php echo nl2br($wr['responsibility']);?><br>
				Duration: <?php if($wr['job_start']!='0000-00-00'){?>
					From <?php echo date('d-m-Y',strtotime($wr['job_start'])); if($wr['job_end']!='0000-00-00'){?> to 
					<?php echo date('d-m-Y',strtotime($wr['job_end']));} else echo " - Still Continuing";?><br>
				<?php }else
				 echo 'N/A<br>';?>
				(<a href="<?php echo site_url();?>profile/editemployment/<?php echo $wr['user_work_id'];?>.html" <?php if($this->uri->segment(1)=='article'){?>class="linkhover"<?php }?>>Edit</a>)
				&nbsp;&nbsp;&nbsp;
				(<a href="#" class="myresume_aclass" onclick="deleteit('<?php echo $wr['user_work_id'];?>','work')">Delete</a>)
				<br><br>
				<?php }}?>
				</div>	
			

				<h4 style="">Training</h4>
				<div class="myresume_div mrfont">
				(<a href="<?php echo site_url();?>profile/addtraining.html" class="myresume_aclass">Add your training/cerficate details</a>)				
				<br>
				<?php if(count($tra_arr)>0){
					foreach ($tra_arr as $tr) {				
					?>
					<label class="" style=""><?php echo $tr['training_title'];?></label><br>
					Institution: <?php echo $tr['institution'];?><br>
					Topic Details: <?php echo $tr['topic_details'];?><br>
					Location: <?php echo $tr['location'];?><br>
					Duration: <?php echo $tr['duration'];?><br>
					(<a href="<?php echo site_url();?>profile/edittraining/<?php echo $tr['user_training_id'];?>.html" class="myresume_aclass" >Edit</a>)
					&nbsp;&nbsp;&nbsp;
					(<a href="#" class="myresume_aclass" onclick="deleteit('<?php echo $tr['user_training_id'];?>','training')">Delete</a>)
					<br><br>				
				<?php }}?>
				<br>
				</div>

				<h4 style="">Achievement</h4>
				<div class="myresume_div mrfont">
				(<a href="<?php echo site_url();?>profile/addachievement.html" class="myresume_aclass">Add your achievement details</a>)				
				<br>
				<?php if(count($ach_arr)>0){ 
					foreach ($ach_arr as $ar) {
					?>
					<p><?php echo $ar['achievement'];?></p>
					(<a href="<?php echo site_url();?>profile/editachievement/<?php echo $ar['user_achievement_id'];?>.html" class="myresume_aclass" >Edit</a>)
					&nbsp;&nbsp;&nbsp;
					(<a href="#" class="myresume_aclass" onclick="deleteit('<?php echo $ar['user_achievement_id'];?>','achievement')">Delete</a>)					
					<br><br>				
				<?php }}?><br>
				</div>	
			


				<h4 style="">Your desired job</h4>
				<div class="myresume_div mrfont">
				(<a href="<?php echo site_url();?>profile/editdesiredjob.html" class="myresume_aclass">Add/Update your desired job</a>)<br>
				<br>
				<?php 
				if(count($detail_arr)>0):
					$desired_job=explode('-', $detail_arr['desired_job']);

					for($i=0;$i<count($desired_job)-1;$i++){
						$jid=$desired_job[$i];	
						$dsql="select * from job_category where job_category_id=$jid";
						$query=$this->db->query($dsql);
						$cat_name=$query->row_array();
						echo "<i class='fa fa-circle'></i>&nbsp;";
						echo $cat_name['category_name'].'&nbsp;&nbsp;&nbsp;&nbsp;';
					}
				endif			
				?>
				<br><br>
			
				</div>

				<h4 style="">Reference</h4>
				<div class="myresume_div mrfont">
				(<a href="<?php echo site_url();?>profile/addreference.html" class="myresume_aclass">Add/Edit your reference</a>)				
				<br>
				<?php if($detail_arr['reference']!=''){ ?>					
					<p><?php echo nl2br($detail_arr['reference']);?></p>
					
					<br><br>				
				<?php }?>
				</div>
			</div>

			<div class="col-sm-2" style="border:0px solid #A2A1A0;min-height:400px;">
            		&nbsp;
            </div>


		</div><!--End of row-->


	</div>
</section>		

<script type="text/javascript">
 	function deleteit(id,tag){
 		theurl=jurl+'profile/deleteit/'+id+'/'+tag+'.html';	
 		var r =confirm("Are you sure to delete?");
 		if(r==true){ 
 			document.location.href=theurl;
 		}

  
    }
</script>


<?php $this->load->view('footer');?>