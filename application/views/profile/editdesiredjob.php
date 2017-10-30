<?php $this->load->view("header");?>
<section id="add-training">
	<div class="container">
		<div class="center wow fadeInDown">
			<h2>Update Desired Job</h2>			
		</div>


		<div class="row">
			<div class="col-sm-8">
				<form action="" method="post">
					
					<?php foreach ($category_list as $key => $value) {
							$jchk="";
							if($dtl['desired_job']!=''):
								$desired_job=explode('-', $dtl['desired_job']);
								$sp=array_chunk($desired_job, count($desired_job)-1);
								$desired_job=$sp[0];
								for($i=0;$i<count($desired_job);$i++){
									//echo $value['job_category_id']; echo '=='.$desired_job[$i];
									if($value['job_category_id']==$desired_job[$i]){ 
										$jchk="checked"; break;	
									}									
								}
							endif	
					?> 		
					<div class="checkbox">						
					<label><input type="checkbox" name="c_<?php echo $value['job_category_id'];?>" <?php echo $jchk; ?> ><?php echo $value['category_name'];?>								
							</label>
					</div>		
					<?php }?>	<br><br>

					<input type="submit" name="update" class="btn btn-primary btn-lg" value="Update" onclick="" />
				</form>
			</div>
		</div>	
	</div>
</section>		




		
	<?php $this->load->view('footer');?>

