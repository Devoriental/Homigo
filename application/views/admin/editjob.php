<?php $this->load->view("admin/header");?>
<div class="row">
	<div class="twelve columns">
		<h4>Edit Job</h4>
	</div>	
</div>

<script type="text/javascript">
			window.onload = function(){
				new JsDatePick({
					useMode:2,
					target:"balance_date",
					dateFormat:"%d-%M-%Y",
					imgPath:"<?php echo site_url()?>js/jsdatepick/img/"					
				});
			};

</script>
<?php $current_year=date('Y');
	  $last_date=explode('-', $jobs['last_date']);
	  //print_r($last_date);
	  //echo $last_date[2];
?>
<div class="row">
	<div class="nine columns">
		<span id="msg" style="color:red;"></span>
		
		<form action="" method="post">
			<label>Posted on: <?php echo show_date($jobs['post_date']);?></label>
			<label>Job Title:</label>
			<input type="text" name="ttl" size="60" value="<?php echo $jobs['job_title'];?>">
			<label>Company:</label>
			<input type="text" name="company" size="60" value="<?php echo $jobs['company'];?>">
			<label>Job Description/Responsibility:</label>
			<textarea name="responsibility" id="responsibility" rows="7" cols="70"><?php echo $jobs['job_description'];?></textarea>
			<label>Additional Info:</label>
			<textarea name="additional" class="u-full-width"><?php echo $jobs['additional_info'];?></textarea>
			<label>Educational Requirement:</label>
			<textarea name="education" class="u-full-width"><?php echo $jobs['education'];?></textarea> 
			<label>Employment Exprience:</label>
			<textarea name="employment" class="u-full-width"><?php echo $jobs['experience'];?></textarea> 
			<label>Job Location:</label>
			<input type="text" name="location" size="60" value="<?php echo $jobs['job_location'];?>">
			
			<label>Job Nature:</label>
			<select name="nature">
				<option value="Full time" <?php if($jobs['job_nature']=='Full Time')echo 'selected';?>>Full Time</option>
				<option value="Part time" <?php if($jobs['job_nature']=='Part Time')echo 'selected';?>>Part Time</option>
			</select>
			<label>Salary:</label>
			<input type="text" name="salary" value="<?php echo $jobs['salary'];?>">
			
			<label>No of Vacancies:</label>
			<input type="text" name="vacancy" value="<?php echo $jobs['vacancy'];?>">
			
			<label>Last Date of Submission:</label>
			<select id="day" name="day" required>
				<option>Day</option>
				<?php for($i=1;$i<=31;$i++){
					$selc="";if($i==$last_date[2])$selc="selected"; 
					?>
					<option value="<?php echo $i;?>" <?php echo $selc;?>> <?php echo $i;?></option>
				<?php }?>
			</select>
			<?php $mo=month_array();?>
			<select id="month" name="month">
				<option>Month</option>
				<?php for($i=0;$i<12;$i++){
					  $selc="";if($i+1==$last_date[1])$selc="selected"; 	
				?>
					<option value="<?php echo $i+1;?>" <?php echo $selc;?>> <?php echo $mo[$i];?></option>
				<?php }?>
			</select>
			<!--<select id="year" name="year">
				<option>Year</option>
				<?php 
				for($i=$current_year;$i<=$current_year+1;$i++){
					 $selc="";if($i==$last_date[0])$selc="selected";	
				?>
					<option value="<?php echo $i;?>" <?php echo $selc;?>> <?php echo $i;?></option>
				<?php }?>
			</select>-->
			<input type="text" name="year" maxlength="4" value="<?php echo $last_date[0];?>" size="4" >
			<!--<input type="text" name="last_date" value="<?php echo $jobs['last_date'];?>">-->
			<label>Hot Job:</label>
			<select name="hot_job">
				<option value="yes" <?php if($jobs['hot_job']=='yes')echo 'selected';?>>Yes</option>
				<option value="no" <?php if($jobs['hot_job']=='no')echo 'selected';?>>No</option>
			</select>	
			<label>Job Status:</label>
			<select name="status">
				<option value="active" <?php if($jobs['status']=='active')echo 'selected';?>>Active</option>
				<option value="inactive" <?php if($jobs['status']=='inactive')echo 'selected';?>>Inactive</option>
			</select>
			<label></label>
			<input type="submit" name="update" value="Update" onclick="" />
		</form>
			
	</div>
</div>	

<?php $this->load->view("admin/footer");?>
