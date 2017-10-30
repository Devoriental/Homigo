<?php $this->load->view("header");?>
<section id="add-training">
	<div class="container">
		<div class="center wow fadeInDown">
			<h2>Add Reference</h2>			
		</div>

		<div class="row">
			<div class="col-sm-6">
				<form action="" method="post">
						
						<div class="form-group">
							<label>Your Reference:</label>
							<textarea name="refc" class="form-control" rows="7" cols="45" maxlength='1000'><?php echo $refc['reference'];?></textarea> 
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

