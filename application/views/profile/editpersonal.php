<?php $this->load->view("header");?>
<section id="my-resume">
	<div class="container">
		<div class="center wow fadeInDown">
			<h2>Personal Details</h2>			
		</div>

		<div class="row">
			<div class="col-sm-6">
				<a href='http://localhost/jobs/profile/myresume.html' style="text-decoration:underline;">Back</a><br>
				<?php if($msg!=''){?>
						<div class="alert alert-danger"><?php echo $msg;?></div>
			    <?php } ?>	
				<form action="" method="post">
				<div class="form-group">
					<label>Name:</label><br><?php //print_r($arr); echo $arr['email'];?>
					<input type="text" class="form-control" name="name" value="<?php echo $arr['user_name'];?>" required maxlength='35'>
				</div>
				<div class="form-group">
					<label>Email:</label>
					<input type="email" class="form-control" name="email"  value="<?php echo $arr['email'];?>">
				</div>
				
				<?php 
					$current_year=date('Y');
					$f=$m=$a=$mobile=$alt_mobile=$national_id=$facebook_id="";
					if(count($detail_arr)>0){
						$f=$detail_arr['father_name'];
						$m=$detail_arr['mother_name'];
						$a=$detail_arr['address'];
						$mobile=$detail_arr['mobile'];
						$alt_mobile=$detail_arr['alt_mobile'];
						$national_id=$detail_arr['national_id'];
						$facebook_id=$detail_arr['facebook_id'];
						$religion=$detail_arr['religion'];
						$objective=$detail_arr['objective'];
						$birth_date=explode("-",$detail_arr['birth_date']);

				}?>
				<div class="form-group">
					<label>Father Name:</label>
					<input type="text" class="form-control" name="f_name" value="<?php echo $f;?>" maxlength='35'>
				</div>	
				<div class="form-group">
					<label>Mother Name:</label>
					<input type="text" class="form-control" name="m_name" value="<?php echo $m;?>" maxlength='35'>
				</div>
				<div class="form-group">
					<label>Address:</label>
					<textarea name="address" class="form-control" rows="4" cols="30" required maxlength='110'><?php echo $a;?></textarea>
				</div>
				<div class="form-group">
					<label>Mobile Number:</label>
					<input type="text" id="name" class="form-control" name="mobile" value="<?php echo $mobile;?>" required>
				</div>
				<div class="form-group">
					<label>Alternative Mobile Number:</label>
					<input type="text"  class="form-control" id="name" name="alt_mobile" size="60" value="<?php echo $alt_mobile;?>" >
				</div>	
				<div class="form-group">
					<label>Date of Birth:</label>
					<select id="day" name="day">
					<option>Day</option>
					<?php for($i=1;$i<=31;$i++){?>
						<option value="<?php echo $i;?>" <?php if($birth_date['2']==$i) echo 'selected';?>> <?php echo $i;?></option>
					<?php }?>
					</select>
					<?php $m=month_array();?>
					<select id="month" name="month">
						<option>Month</option>
						<?php for($i=0;$i<12;$i++){?>
							<option value="<?php echo $i+1;?>" <?php if($birth_date['1']==$i+1) echo 'selected';?>> <?php echo $m[$i];?></option>
						<?php }?>
					</select>
					<select id="year" name="year">
						<option>Year</option>
						<?php for($i=1955;$i<=$current_year-15;$i++){?>
							<option value="<?php echo $i;?>" <?php if($birth_date['0']==$i) echo 'selected';?>> <?php echo $i;?></option>
						<?php }?>
					</select>
				</div>
				<div class="form-group">
					<label>National ID:</label>
					<input type="text" id="name"  class="form-control" name="national_id"   value="<?php echo $national_id;?>" >
				</div>
				<div class="form-group">
					<label>Gender:</label>	
					<select name="gender">
						<option value="Male" <?php if($detail_arr['gender']=='Male') echo 'selected';?>>Male</option>
						<option value="Female" <?php if($detail_arr['gender']=='Female') echo 'selected';?>>Female</option>
					</select>
				
					<label>Marital Status:</label>	
					<select name="marital_status">
						<option value="Married" <?php if($detail_arr['marital_status']=='Married') echo 'selected';?>>Married</option>
						<option value="Unmarried" <?php if($detail_arr['marital_status']=='Unmarried') echo 'selected';?>>Unmarried</option>
					</select>
				</div>
				<div class="form-group">
					<label>Religion:</label>
					<input type="text" id="name"  class="form-control" name="religion"   value="<?php echo $religion;?>">
				</div>	
				<div class="form-group">
					<label>Facebook ID:</label>
					<input type="text" id="name"  class="form-control" name="facebook_id"  value="<?php echo $facebook_id;?>">
				</div>	
				<div class="form-group">
					<label>Career Objective(maximum 450 characters):</label>
					<textarea name="objective" class="form-control" rows="4" cols="50" maxlength='450'><?php echo $objective;?></textarea>
				</div>	
				<div class="form-group">
					<input type="submit" name="update" class="btn btn-primary btn-lg" value="Update" onclick="" />
				</div>	
			</div>	
		</form>
			</div>
		</div>
	</div>
</section>		


 
   <?php $this->load->view("footer");?>
  