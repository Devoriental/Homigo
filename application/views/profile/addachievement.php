<?php $this->load->view("header");?>
<section id="add-training">
	<div class="container">
		<div class="center wow fadeInDown">
			<h2>Add Achievement</h2>			
		</div>
	

		<div class="row">
			<div class="col-sm-6">
				<form action="" method="post">
						
						
						<div class="form-group">	
							<label>Your Achievement:</label><br>
							<textarea name="achievement" class="form-control" rows="7" cols="" maxlength='500'></textarea> <br><br>
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

	