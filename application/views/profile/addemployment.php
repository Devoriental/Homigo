<?php $this->load->view("header");?>
<section id="my-resume">
	<div class="container">
		<div class="center wow fadeInDown">
			<h2>Add Employment</h2>			
		</div>
	
		<?php 
				$current_year=date('Y');	
				$company=$designation=$responsibility="";
				
				if(count($a)>0):						
					$company=$a['company'];		$designation=$a['designation'];	$responsibility=$a['responsibility'];
						$start=explode('-', $a['start']);	$end=explode('-', $a['end']);  
				endif;					  
		?>
		<div class="row">
			<div class="col-sm-6">
				<form action="" method="post">
						<div class="form-group">
							<label>Company:</label>
							<input type="text" class="form-control" name="company"   value="<?php echo $company;?>">
						</div>
						<div class="form-group">
							<label>Designation:</label>
							<input type="text" class="form-control" name="designation"   value="<?php echo $designation;?>">
						</div>	
						<div class="form-group">
							<label>Major Responsibility:(maximum 800 characters)</label>
							<textarea name="responsibility" class="form-control" cols="45" rows="5" maxlength='800'> <?php echo $responsibility;?></textarea>
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
								<?php for($i=$current_year-45;$i<=$current_year;$i++){
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
									<?php for($i=$current_year-45;$i<=$current_year;$i++){
										$jselc="";if($i==$end[0])$jselc="selected";
									?>
										<option value="<?php echo $i;?>"  <?php echo $jselc;?>> <?php echo $i;?></option>
									<?php }?>
								</select>
								&nbsp; Or &nbsp;
								<div class="checkbox">
									<label><input type="checkbox" name="" value="Continue"> Continue	</label>	
								</div>	
						</div>
						<div class="form-group">
							<input type="submit" name="update" class="btn btn-primary btn-lg" value="Update" onclick="" />
						</div>	
				</form>
			</div>
		</div>		
	</div>	
</section>		

	
<?php $this->load->view('footer');?>

