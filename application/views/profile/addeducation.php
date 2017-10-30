<?php $this->load->view("header");?>
<section id="my-resume">
	<div class="container">
		<div class="center wow fadeInDown">
			<h2>Add Education</h2>			
		</div>


		<div class="row">
			<div class="col-sm-6">
				<?php 					
						$degree_title=$institution=$major=$result=$pass_year=$semester="";
						
						if(count($a)>0):
								
							$deg_id=$a['degree_id'];	$degree_title=$a['degree_title'];	$institution=$a['institution'];	
							$major=$a['major'];			$result=$a['result'];	$pass_year=$a['pass_year'];
							$semester=$a['semester'];					

						endif;					  
				?>
				<form action="" method="post">
				
					<div class="form-group">
						<label style="font-weight:bold">Level of Degree:&nbsp;</label>
						<select name="degree">
							<?php foreach($degree_list as $dl){ 
									$dselc="";if($dl['degree_id']==$deg_id)$dselc="selected";	
							?>
							 		<option value="<?php echo $dl['degree_id'];?>" <?php echo $dselc;?>><?php echo $dl['degree_name'];?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label>Program/Degree Title/Ongoing Degree:</label>
						<input type="text"  class="form-control" name="degree_title"  required value="<?php echo $degree_title;?>" >*
					</div>
					<div class="form-group">
						<label>University/College/Instution Name:</label>
						<input type="text"  class="form-control" name="institution"   value="<?php echo $institution;?>">
					</div>
					<div class="form-group">
						<label>Major/Subject:</label>
						<input type="text"  class="form-control" name="major"  placeholder="" value="<?php echo $major;?>">
					</div>
					<div class="form-group">
						<label>Result:</label>&nbsp;( i.e. 3.55 out of 4 or 1st class/division)
						<input type="text"  class="form-control" name="result"  value="<?php echo $result;?>">
					</div>
					<div class="form-group">
						<label>Academic Year/Session/Passing Year:</label>
						<input type="text"  class="form-control" name="pass_year"  value="<?php echo $pass_year;?>">
					</div>
					<div class="form-group">
						<label>Semester/Year&nbsp;<b>[for current student]</b>:</label>&nbsp;(i.e. 3rd year 2nd semester/ 1st year)
						<input type="text"  class="form-control" name="semester"  value="<?php echo $semester;?>">
					</div>
					<div class="form-group">	
						<input type="submit" name="update" id="signup" class="btn btn-primary btn-lg" value="Submit" onclick="" />					
					</div>	
				
			</form>
			</div>
		</div>	


	</div>
</section>		
 
<?php $this->load->view('footer');?>
