<?php $this->load->view("header");?>
<section id="edit-employment">
	<div class="container">
		<div class="center wow fadeInDown">
			<h2>Edit Employment</h2>			
		</div>
		<?php
			$current_year=date('Y');
			$start=explode('-', $employment['job_start']);	$end=explode('-', $employment['job_end']);

		?>
		
		<div class="row">
			<div class="col-sm-6">
				<form action="" method="post">
					<div class="form-group">
						<label>Company:</label><br>
						<input type="text" class="form-control" name="company" value="<?php echo $employment['company_name'];?>">
					</div>
					<div class="form-group">
						<label>Designation:</label>
						<input type="text" class="form-control" name="designation" value="<?php echo $employment['designation'];?>">
					</div>
					<div class="form-group">
						<label>Responsibility:(maximum 800 characters)</label>
						<textarea name="responsibility" class="form-control" class="form-control" rows="4" cols="45" maxlength='800'><?php echo $employment['responsibility'];?></textarea>
					</div>	
					<div class="form-group">
						<label>Job Start Date:</label>
						<select id="day" name="sday">
							<option>Day</option>
							<?php for($i=1;$i<=31;$i++){
								$jselc="";if($i==$start[2])$jselc="selected";
							?>
								<option value="<?php echo $i;?>" <?php echo $jselc;?>> <?php echo $i;?></option>
							<?php }?>
						</select>
						<?php $m=month_array();?>
						<select id="month" name="smonth">
							<option>Month</option>
							<?php for($i=0;$i<12;$i++){
								$jselc="";if($i+1==$start[1])$jselc="selected";	
							?>
								<option value="<?php echo $i+1;?>" <?php echo $jselc;?>> <?php echo $m[$i];?></option>
							<?php }?>
						</select>
						<select id="year" name="syear">
							<option>Year</option>
							<?php for($i=1971;$i<=$current_year;$i++){
								$jselc="";if($i==$start[0])$jselc="selected";	
							?>
								<option value="<?php echo $i;?>" <?php echo $jselc;?>> <?php echo $i;?></option>
							<?php }?>
						</select>
					</div>
					<div class="form-group">
						<label>Job End Date:</label> 
						<select id="day" name="eday">
							<option>Day</option>
							<?php for($i=1;$i<=31;$i++){
								$jselc="";if($i==$end[2])$jselc="selected";	
							?>
								<option value="<?php echo $i;?>"  <?php echo $jselc;?>> <?php echo $i;?></option>
							<?php }?>
						</select>
						<?php $m=month_array();?>
						<select id="month" name="emonth">
							<option>Month</option>
							<?php for($i=0;$i<12;$i++){
									$jselc="";if($i+1==$end[1])$jselc="selected";	
							?>
								<option value="<?php echo $i+1;?>" <?php echo $jselc;?>> <?php echo $m[$i];?></option>
							<?php }?>
						</select>
						<select id="year" name="eyear">
							<option>Year</option>
							<?php for($i=1971;$i<=$current_year;$i++){
								$jselc="";if($i==$end[0])$jselc="selected";
							?>
								<option value="<?php echo $i;?>"  <?php echo $jselc;?>> <?php echo $i;?></option>
							<?php }?>
						</select>
						&nbsp; Or &nbsp;<label><input type="checkbox" name="" value="Continue"> Continue</label>
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary btn-lg" name="update" value="Update" onclick="" />
					</div>	
			</form>	
			</div>		
		</div>

	</div>
</section>



<?php $this->load->view('footer');?>

	