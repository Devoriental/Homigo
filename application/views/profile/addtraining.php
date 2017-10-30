<?php $this->load->view("header");?>
<section id="add-training">
	<div class="container">
		<div class="center wow fadeInDown">
			<h2>Add Training</h2>			
		</div>
	

		<div class="row">
			<div class="col-sm-6">
				<form action="" method="post">
						
						<div class="form-group">
							<label>Training Title:</label><br>
							<input type="text" class="form-control" name="ttl" size="60" value="<?php //echo $edu_arr['degree_title'];?>"><br><br>
						</div>
						<div class="form-group">	
							<label>Institution:</label><br>
							<input type="text" class="form-control" name="institution" size="60" value="<?php //echo $edu_arr['degree_title'];?>"><br><br>
						</div>
						<div class="form-group">	
							<label>Topic Details:(maximum 800 characters)</label><br>
							<textarea name="topic" class="form-control" rows="7" cols="45" maxlength='800'></textarea> <br><br>
						</div>
						<div class="form-group">	
							<label>Location:</label><br>
							<input type="text" class="form-control" name="location" size="60" value="<?php //echo $edu_arr['degree_title'];?>"><br><br>
						</div>
						<div class="form-group">	
							<label>Duration:</label><br>
							<input type="text" class="form-control" name="duration" size="60" value="<?php //echo $edu_arr['degree_title'];?>"><br><br>
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

	