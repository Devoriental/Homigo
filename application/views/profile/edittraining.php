<?php $this->load->view("header");?>
<section id="add-training">
	<div class="container">
		<div class="center wow fadeInDown">
			<h2>Edit Training</h2>			
		</div>

		<div class="row">
			<div class="col-sm-6">
				<form action="" method="post">
						<div class="form-group">
							<label>Training Title:</label>
							<input type="text" class="form-control" name="ttl" size="60" value="<?php echo $training['training_title'];?>">
						</div>
						<div class="form-group">
							<label>Institution:</label><br>
							<input type="text" class="form-control" name="institution" size="60" value="<?php echo $training['institution'];?>">
						</div>
						<div class="form-group">
							<label>Topic Details:(maximum 800 characters)</label>
							<textarea name="topic" class="form-control" rows="7" cols="45" maxlength='800'><?php echo $training['topic_details'];?></textarea> 
						</div>
						<div class="form-group">
							<label>Location:</label>
							<input type="text" class="form-control" name="location" size="60" value="<?php echo $training['location'];?>">
						</div>
						<div class="form-group">
							<label>Duration:</label>
							<input type="text" class="form-control" name="duration" size="60" value="<?php echo $training['duration'];?>">
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

