<?php $this->load->view("header");?>
<section id="statistics">
	<div class="container">
		<div class="center wow fadeInDown">
			<h2>Edit Job</h2>
		</div>
		<?php 
			$current_year=date('Y');
			$a=explode('-', $arr['last_date']);
			$y=$a[0];	$m=$a[1];	$d=$a[2];			
		?>			
		<div class="row">
			<?php //$this->load->view("companyprofile/company_profile_submenu");?>			
			<?php if($msg!=''){?>
					<div class="alert alert-danger"><?php echo $msg;?></div>
			<?php } ?>
			<div class="col-sm-6">
				<form action="" method="post">
				<div class="form-group">
					<label>Job Title:</label><br>
					<input type="text" class="form-control" name="ttl" size="60" required value="<?php echo $arr['job_title'];?>">
				</div>	
				<div class="form-group">
					<label>Job Description/Responsibility:</label>
					<textarea name="responsibility" class="form-control" rows="12" cols="70" required><?php echo $arr['job_description'];?></textarea>
				</div>	
				<div class="form-group">
					<label>Additional Info:</label><br>
					<textarea name="additional" class="form-control" rows="7" cols="70"><?php echo $arr['additional_info'];?></textarea><br>
				</div>
				<div class="form-group">
					<label>Educational Requirement:</label><br>
					<textarea name="education" class="form-control" rows="5" cols="60"><?php echo $arr['education'];?></textarea>
				</div>				
				<div class="form-group">
					<label>Employment Exprience:</label><br>
					<textarea name="employment" class="form-control" rows="5" cols="60"><?php echo $arr['experience'];?></textarea>
				</div>
				<div class="form-group">
					<label>Job Location:</label>
					<input type="text" class="form-control" name="location" size="60" value="<?php echo $arr['job_location'];?>">					
				</div>
				<div class="form-group">
					<label>Job Nature:</label>
					<select name="nature" class="form-control">
						<option value="Full Time" <?php if($arr['job_nature']=='Full Time'){echo "selected";} ?>>Full Time</option>
						<option value="Part Time" <?php if($arr['job_nature']=='Part Time'){echo "selected";} ?>>Part Time</option>
					</select>
				</div>
				<div class="form-group">
					<label>Salary:</label>
					<input type="text" class="form-control" name="salary" value="<?php echo $arr['salary'];?>">
				</div>
				<div class="form-group">
					<label>No of Vacancies:</label>
					<input type="text" class="form-control" name="vacancy" required value="<?php echo $arr['vacancy'];?>">
				</div>
				<div class="form-group">
					<label>Last Date of Submission:</label>
					<select id="day" name="day" required>
								<option>Day</option>
								<?php for($i=1;$i<=31;$i++){
									$selc="";if($i==$d)$selc="selected"; 
									?>
									<option value="<?php echo $i;?>" <?php echo $selc;?>> <?php echo $i;?></option>
								<?php }?>
							</select>
							<?php $mo=month_array();?>
							<select id="month" name="month">
								<option>Month</option>
								<?php for($i=0;$i<12;$i++){
									  $selc="";if($i+1==$m)$selc="selected"; 	
								?>
									<option value="<?php echo $i+1;?>" <?php echo $selc;?>> <?php echo $mo[$i];?></option>
								<?php }?>
							</select>
							<!--<select id="year" name="year">
								<option>Year</option>
								<?php 
								for($i=$current_year;$i<=$current_year+1;$i++){
									 $selc="";if($i==$y)$selc="selected";	
								?>
									<option value="<?php echo $i;?>" <?php echo $selc;?>> <?php echo $i;?></option>
								<?php }?>
							</select>-->
							<input type="text" name="year" maxlength="4" value="<?php echo $y;?>" size="4" >
				</div>
				<div class="form-group">
					<label>Status:</label>
					<select name="status" class="form-control">
						<option value="active" <?php if($arr['status']=='active')echo 'selected';?>>Active</option>
						<option value="inactive" <?php if($arr['status']=='inactive')echo 'selected';?>>Inactive</option>
					</select>
				</div>	
				<div class="form-group">
					<input type="submit" class="btn btn-primary btn-lg" name="add" value="Edit Job" onclick="" />

				</div>
		</form>
			</div>	


	</div>
</section>		
			
			
<?php $this->load->view("footer");?>