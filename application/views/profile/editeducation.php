<?php $this->load->view("header");?>
<section id="my-resume">
	<div class="container">
		<div class="center wow fadeInDown">
			<h2>Edit Education</h2>			
		</div>

		<div class="row">
			<div class="col-sm-6">
				<form action="" method="post">				
						<div class="form-group">
							<label style="font-weight:bold">Level of Degree:&nbsp;</label>
							<select name="degree">
								<?php foreach($degree_list as $dl){?>
								 		<option value="<?php echo $dl['degree_id'];?>" <?php if($dl['degree_id']==$education['degree_id'])echo 'selected';?>><?php echo $dl['degree_name'];?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label>Program/Degree Title/Ongoing Degree:</label>
							<input type="text" class="form-control" name="degree_title"  value="<?php echo $education['degree_title'];?>" required>
						</div>
						<div class="form-group">
							<label>University/College/Instution:</label>
							<input type="text" class="form-control" name="institution"  value="<?php echo $education['institution'];?>" >
						</div>
						<div class="form-group">
							<label>Major/Subject:</label>
							<input type="text" class="form-control" name="major"  value="<?php echo $education['major'];?>" >
						</div>
						<div class="form-group">
							<label>Result:</label>&nbsp;( i.e. 3.55 out of 4 or 1st class/division)
							<input type="text" class="form-control" name="result"  value="<?php echo  $education['result'];?>">
						</div>
						<div class="form-group">
							<label>Academic Year/Session/Passing Year:</label>
							<input type="text" class="form-control" name="pass_year" value="<?php echo $education['pass_year'];?>">
						</div>
						<div class="form-group">
							<label>Semester/Year&nbsp;<b>[for current student]</b>:</label>&nbsp;(i.e. 3rd year 2nd semester/ 1st year)
							<input type="text" class="form-control" name="semester"  value="<?php echo $education['semester'];?>">
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
