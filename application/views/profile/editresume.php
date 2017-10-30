<?php $this->load->view("header");?>

<h5>My Resume</h5>

<?php //$this->load->view("profile/profile_header");?>
	

<span id="msg" style="color:red;"><?php if($msg!=''){echo $msg;}?></span>
<div style="border:0px solid green; width:800px">
	<div style="border:0px solid yellow; width:750px;float:left;">
		<h6>Personal Details</h6>
		<label>Name:</label><label>
		<input type="text" name="" value="<?php echo $arr['user_name'];?>"><br>
		<label>Email:</label>
		<input type="email" name="" value"<?php echo $arr['email'];?>"><br>
		<?php if(count($detail_arr)>0){?>
			<label>Father Name:</label>
			<input type="text" name="" value="<?php echo $detail_arr['father_name'];?>"><br>
			<label>Mother Name:</label>
			<input type="text" name="" value="<?php echo $detail_arr['mother_name'];?>"><br>
			<label>Address:</label><textarea name=""><?php echo $detail_arr['address'];?></textarea><br>
			<label>Birthdate:</label>
			<script>
				$(function() {
					$("#matchdate"+<?php echo $i;?>).datepicker({ minDate: +1 });
				 });
			</script><input type="text" id="matchdate" name="" ><br>

		<?php }?>
		<h6>Education</h6>
		
			<label>Level of Degree:</label>
			<select name="">
				<?php foreach($degree_list as $dl){?>
				 		<option value=""><?php echo $dl['degree_name'];?></option>
				<?php } ?>
			</select><br>
			<label>Program or Degree Title:</label>
			<input type="text" name="" value="<?php //echo $edu_arr['degree_title'];?>"><br>
			<label>Instution:</label>
			<input type="text" name="" value="<?php //echo $edu_arr['degree_title'];?>"><br>
			<label>Major/Subject:</label>
			<input type="text" name="" value="<?php //echo $edu_arr['degree_title'];?>"><br><br>


			<label>Level of Degree:</label>
			<select name="">
				<?php foreach($degree_list as $dl){?>
				 		<option value=""><?php echo $dl['degree_name'];?></option>
				<?php } ?>
			</select><br>
			<label>Program or Degree Title:</label>
			<input type="text" name="" value="<?php //echo $edu_arr['degree_title'];?>"><br>
			<label>Instution:</label>
			<input type="text" name="" value="<?php //echo $edu_arr['degree_title'];?>"><br>
			<label>Major/Subject:</label>
			<input type="text" name="" value="<?php //echo $edu_arr['degree_title'];?>"><br><br>


			<label>Level of Degree:</label>
			<select name="">
				<?php foreach($degree_list as $dl){?>
				 		<option value=""><?php echo $dl['degree_name'];?></option>
				<?php } ?>
			</select><br>
			<label>Program or Degree Title:</label>
			<input type="text" name="" value="<?php //echo $edu_arr['degree_title'];?>"><br>
			<label>Instution:</label>
			<input type="text" name="" value="<?php //echo $edu_arr['degree_title'];?>"><br>
			<label>Major/Subject:</label>
			<input type="text" name="" value="<?php //echo $edu_arr['degree_title'];?>"><br>



		

	</div>
	<!--<div style="border:0px solid cyan; width:398px;float:left;">
			
	</div>	-->
	
	<div style="border:0px solid yellow; width:750px;float:left;">
		
	</div>
	
</div>	

<?php //$this->load->view("footer");?>
 </body>
</html>
