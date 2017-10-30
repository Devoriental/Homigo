<?php $this->load->view("header");?>


 <div class="holder_content" style="border:0px solid red;">
	
   <section class="group1" >
   		<?php //$this->load->view("profile/profile_header");?>	
	    <article class="holder_gallery" style="border:0px solid red;">	
	    	
	
			<span id="msg" style="color:red;"><?php if($msg!=''){echo $msg;}?></span>
			 <h4 style="margin-right:0px;padding-right:0px;color:#00aeef;">Personal Details</h4>
			<!--<hr style="margin-bottom:0px;">		-->
			<div class="viewresume_div">
				
				<label class="caplabel">Name:</label><label class="datalabel"><?php echo $arr['user_name'];?></label><br>
				<label class="caplabel">Email:</label><label class="datalabel"><?php echo $arr['email'];?></label><br>
				<?php if(count($detail_arr)>0){?>
					<label class="caplabel">Father Name:</label><label class="datalabel"><?php echo $detail_arr['father_name'];?></label><br>
					<label class="caplabel">Mother Name:</label><label class="datalabel"><?php echo $detail_arr['mother_name'];?></label><br>
					<label class="caplabel">Address:</label><label class="datalabel"><?php echo $detail_arr['address'];?></label><br>
					<label class="caplabel">Birthdate:</label><label class="datalabel"><?php echo $detail_arr['birth_date'];?></label><br>
					<label class="caplabel">Mobile:</label><label class="datalabel"><?php echo $detail_arr['mobile'];?></label><br>
					<label class="caplabel">Alternamte Mobile:</label><label class="datalabel"><?php echo $detail_arr['alt_mobile'];?></label><br>
					<label class="caplabel">National ID:</label><label class="datalabel"><?php echo $detail_arr['national_id'];?></label><br>
					<label class="caplabel">Gender:</label><label class="datalabel"><?php echo $detail_arr['gender'];?></label><br>
					<label class="caplabel">Marital Status:</label><label class="datalabel"><?php echo $detail_arr['marital_status'];?></label><br>
					<label class="caplabel">Objective:</label><label class="datalabel"><?php echo $detail_arr['objective'];?></label><br>
				<?php }?>
			</div>


			<h4 style="margin-top:25px;color:#00aeef;">Education</h4>
			<div class="viewresume_div">			
				<?php if(count($edu_arr)>0){
				foreach ($edu_arr as $er) {?>
					<label class="datalabel" style="font-weight:bold;"><?php echo $er['degree_title'];?></label><br>
					<label class="datalabel"><?php echo $er['institution'];?></label><br>
					<label class="datalabel"><?php echo $er['major'];?></label><br>					
			    	<br><br>
				<?php }}?>
			</div>


			<h4 style="color:#00aeef;">Employment Details</h4>
			<div class="viewresume_div">
				<?php if(count($emp_arr)>0){
					foreach ($emp_arr as $wr) {				
				?>
				<label class="datalabel" style="font-weight:bold;"><?php echo $wr['designation'];?></label><br>
				<label class="datalabel"><?php echo $wr['company_name'];?></label><br>
				<label class="datalabel"><?php echo $wr['responsibility'];?></label><br>
				<label class="datalabel"><?php echo $wr['job_start'];?></label><br>
				<label class="datalabel"><?php echo $wr['job_end'];?></label><br>				
				<br><br>
				<?php }}?>
			</div>

			<h4 style="color:#00aeef;">Training</h4>
			<div class="viewresume_div">
				<?php if(count($tra_arr)>0){
					foreach ($tra_arr as $tr) {				
					?>
					<label class="datalabel" style="font-weight:bold;"><?php echo $tr['training_title'];?></label><br>
					<label class="datalabel"><?php echo $tr['institution'];?></label><br>
					<label class="datalabel"><?php echo $tr['topic_details'];?></label><br>
					<label class="datalabel"><?php echo $tr['location'];?></label><br>
					<label class="datalabel"><?php echo $tr['duration'];?></label><br>					
					<br><br>				
				<?php }}?>
			</div>	
		
		</article>
				
					
			<div id="leftcol">
				<div class="fb-share-button" data-href="<?php echo current_url();?>" data-type="button_count"></div>
			</div>	
				
		</section>
				
		<?php $this->load->view('sidebar');?>

	<section class="group3"> 
		  
   </section>

   </div>
   <!--end holder-->

   </div>
   <!--end container-->
    </body>
</html>