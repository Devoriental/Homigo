<?php $this->load->view("header");?>
<script language="javascript">
$(document).ready(function(){
	$('#slider1') .cycle({
		fx: 'fade', //'scrollLeft,scrollDown,scrollRight,scrollUp',blindX, blindY, blindZ, cover, curtainX, curtainY, fade, fadeZoom, growX, growY, none, scrollUp,scrollDown,scrollLeft,scrollRight,scrollHorz,scrollVert,shuffle,slideX,slideY,toss,turnUp,turnDown,turnLeft,turnRight,uncover,ipe ,zoom
		speed:  'slow', 
   		timeout: 3000 
	});	
});	
</script>
<script>
$(function() {
	$('#startDatepicker').datepick({dateFormat: 'yyyy-mm-dd'});
	$('#endDatepicker').datepick({dateFormat: 'yyyy-mm-dd'});
	//$(selector).datepick({dateFormat: 'yyyy-mm-dd'});
	
});
function showDate(date) {
	alert('The date chosen is ' + date);
}
</script>
	<?php 
			$name=$username=$email=$con_email=$f_name=$m_name=$address=$mobile=$alt_mobile=$objective="";
			$gender=$marital_status=$national_id=$facebook_id=$religion=$y=$m=$d="";
			$deg_id=$degree_title=$institution=$major=$result=$pass_year=$semester="";
			$company=$designation=$responsibility=$stillcont="";
			$desired_job=$reference="";
			$current_year=date('Y');

			if(count($a)>0):
				$username=$a['username'];
				$name=$a['name'];				$f_name=$a['f_name'];	$m_name=$a['m_name'];
				$address=$a['address'];			$mobile=$a['mobile'];	$alt_mobile=$a['alt_mobile'];
				$national_id=$a['national_id'];	$religion=$a['religion'];	$objective=$a['objective'];
				$gender=$a['gender'];			$marital_status=$a['marital_status']; $facebook_id=$a['facebook_id'];
				$reference=$a['reference'];
				$y=$a['yr'];	$m=$a['mo'];	$d=$a['da'];

				$email=$a['email'];			/*$con_email=$a['con_email'];*/
				$deg_id=$a['degree_id'];	$degree_title=$a['degree_title'];	$institution=$a['institution'];	
				$major=$a['major'];			$result=$a['result'];	$pass_year=$a['pass_year'];
				$semester=$a['semester'];	

				$company=$a['company'];		$designation=$a['designation'];	$responsibility=$a['responsibility'];
				$start=explode('-', $a['start']);	$end=explode('-', $a['end']);  
				$stillcont=$a['stillcont'];
				if($a['desired_job']!=''):
					$desired_job=explode('-', $a['desired_job']);
					$sp=array_chunk($desired_job, count($desired_job)-1);
					$desired_job=$sp[0];
				endif;						

			  endif;
					  
	?>

<section id="post-resume">
        <div class="container" style="border:0px solid red;">
           <div class="center wow fadeInDown">
                <h2>Job Seeker Registration</h2>
                <p class="lead">Fill in the information below to create your account. Please
					 <a href="<?php echo site_url()?>register/login.html" class="acolor" style="font-weight:bold;">login</a>
					 &nbsp;if you are already registered.<br>					 
					 * - Mandatory field.</p>
            </div>
            <?php if($errmsg!=''){?>
						<div class="alert alert-danger"><?php echo $errmsg;?></div>
			<?php } ?>	

            <div class="row" style="border:0px solid red;margin-bottom:0px;padding-top:0px">

            	<form role="form" method="post" action="" >
            		<div class="col-sm-8" style="border:0px solid green;">
            			<h4 style="color:#C52D2F">Personal Details</h4>
						<div class="form-group">
							<label>Name:</label>*
							<input type="text" name="name" class="form-control" value="<?php echo $name;?>" maxlength='35' required="required">
						</div>
						<div class="form-group">
							<label>Father Name:</label>
							<input type="text" id="f_name" name="f_name" class="form-control" value="<?php echo $f_name;?>" maxlength='35'>
						</div>
						<div class="form-group">
							<label>Mother Name:</label>
							<input type="text" name="m_name" class="form-control" value="<?php echo $m_name;?>" maxlength='35'>
						</div>
						<div class="form-group">
							<label>Address:</label>*
							<input type="text" name="address" class="form-control" value="<?php echo $address;?>" maxlength='110' required="required">							
						</div>
						<div class="form-group">
							<label>Email:</label>
							<input type="email" name="email" class="form-control" value="<?php echo $email;?>" maxlength='35'>							
						</div>
						<div class="form-group">
							<label>Mobile:</label>*
							<input type="text" name="mobile" class="form-control" value="<?php echo $mobile;?>" maxlength='11' required="required">							
						</div>
						<div class="form-group">
							<label>Alternative Mobile Number:</label>
							<input type="text" name="alt_mobile" class="form-control" value="<?php echo $alt_mobile;?>" maxlength='11'>							
						</div>
						<div class="form-group">
							<label>Date of Birth:</label>*<br>
							<select id="day" name="day" required>
								<option>Day</option>
								<?php for($i=1;$i<=31;$i++){
									$selc="";if($i==$d)$selc="selected"; 
									?>
									<option value="<?php echo $i;?>" <?php echo $selc;?>> <?php echo $i;?></option>
								<?php }?>
							</select>
							<?php $mo=month_array();?>
							<select id="month" name="month">
								<option>Month</option>
								<?php for($i=0;$i<12;$i++){
									  $selc="";if($i+1==$m)$selc="selected"; 	
								?>
									<option value="<?php echo $i+1;?>" <?php echo $selc;?>> <?php echo $mo[$i];?></option>
								<?php }?>
							</select>
							<select id="year" name="year">
								<option>Year</option>
								<?php for($i=$current_year-60;$i<=$current_year-15;$i++){
									 $selc="";if($i==$y)$selc="selected";	
								?>
									<option value="<?php echo $i;?>" <?php echo $selc;?>> <?php echo $i;?></option>
								<?php }?>
							</select>
						</div>
						<!--<div class="form-group">
							<label>National ID:</label>	
							<input type="text" class="form-control" name="national_id" value="<?php echo $national_id;?>"  maxlength="20">							
						</div>
						<div class="form-group">
							<label>Facebook ID:</label>	
							<input type="text" class="form-control" name="facebook_id" value="<?php echo $facebook_id;?>"  maxlength="25">							
						</div> -->
						<div class="form-group">
							<label>Gender:</label><br>	
							<select name="gender">
								<option value="Male" <?php if($gender=='Male') echo "selected";?> >Male</option>>
								<option value="Female" <?php if($gender=='Female') echo "selected";?> >Female</option>
							</select>
							<label>Marital Status:</label>	
							<select name="marital_status">
								<option value="Married" <?php if($marital_status=='Married') echo "selected";?> >Married</option>>
								<option value="Unmarried" <?php if($marital_status=='Unmarried') echo "selected";?> >Unmarried</option>
							</select>
						</div>
						<div class="form-group">
							<label>Religion:</label>
							<input type="text" class="form-control" name="religion" value="<?php echo $religion;?>"  maxlength="20">							
						</div>
						
					</div><!--end of div cold-8 -->		

					<div class="col-sm-8" style="margin-top:60px;border:0px solid red;">
						<div class="form-group">
							<label style="color:#C52D2F">Career Objective:(maximum 450 characters) </label>
							<textarea name="objective" class="form-control" rows="8" maxlength='450' wrap="hard"><?php echo $objective;?></textarea>
						</div> 
					</div>	
					
					<div class="col-sm-8" style="margin-top:60px;border:0px solid red;">
						<h4 style="color:#C52D2F">Your Last Education</h4><br>
						<div class="form-group">
							<label>Level of Degree:</label>
							<select name="degree">
								<?php foreach($degree_list as $dl){ 
										$dselc="";if($dl['degree_id']==$deg_id)$dselc="selected";	
									?>
								 		<option value="<?php echo $dl['degree_id'];?>" <?php echo $dselc;?>><?php echo $dl['degree_name'];?></option>
								<?php } ?>
							</select>
						</div>	
						<div class="form-group">
							<label>Program/Degree Title/Ongoing Degree:*</label>
							<input type="text" class="form-control" name="degree_title" value="<?php echo $degree_title;?>" maxlength="70" required="required">
						</div>	
						<div class="form-group">
							<label>University/College/Instution Name:</label>
							<input type="text" class="form-control" name="institution" value="<?php echo $institution;?>" maxlength="70">
						</div>
						<div class="form-group">
							<label>Major/Subject:</label>
							<input type="text" class="form-control" name="major" placeholder="" value="<?php echo $major;?>" maxlength="50">
						</div>
						<div class="form-group">
							<label>Result:</label>&nbsp;( i.e. 3.55 out of 4 or 1st class/division)
							<input type="text" class="form-control" name="result" value="<?php echo $result;?>" maxlength="60">						
						</div>	
						<div class="form-group">
							<label>Academic Year/Session/Passing Year:</label>
							<input type="text" class="form-control" name="pass_year" value="<?php echo $pass_year;?>" maxlength="60">
						</div>	
						<div class="form-group">
							<label>Semester/Year[for current student]:</label>&nbsp;(i.e. 3rd year 2nd semester/ 1st year)
							<input type="text" class="form-control" name="semester" value="<?php echo $semester;?>" maxlength="60">
						</div>	
					</div>
					<div class="col-sm-8" style="margin-top:60px;border:0px solid red;">
						<h4 style="color:#C52D2F;">Your Current/Last Job</h4>
						<div class="form-group">
							<label>Company:</label>
							<input type="text" class="form-control" name="company" value="<?php echo $company;?>" maxlength="100">
						</div>	
						<div class="form-group">
							<label>Designation:</label>
							<input type="text" class="form-control" name="designation" value="<?php echo $designation;?>" maxlength="70">
						</div>	
						<div class="form-group">
							<label>Major Responsibilities:(maximum 800 characters)</label>
							<textarea name="responsibility" class="form-control" cols="45" rows="4" maxlength="800"> <?php echo $responsibility;?></textarea>
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
								<?php for($i=1971;$i<=$current_year;$i++){
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
								<?php for($i=1971;$i<=$current_year;$i++){
									$jselc="";if($i==$end[0])$jselc="selected";
								?>
									<option value="<?php echo $i;?>"  <?php echo $jselc;?>> <?php echo $i;?></option>
								<?php }?>
							</select>
										
							<?php $scheck=""; 
								  if($stillcont=='Still continuing')
										$scheck="checked";	
							?>
							&nbsp; Or &nbsp;<input type="checkbox" name="stillcont" <?php echo $scheck;?> value="Still continuing"> Continue
						</div>
					</div>
					<div class="col-sm-8" style="margin-top:60px;border:0px solid red;">
						<div class="form-group">	
							<h4 style="color:#C52D2F;">Your desired job</h4>
							<table border="0" cellspacing="10">
							<tr>
							<?php 
							$j=1;
							foreach ($category_list as $key => $value) {
								$jchk=""; 
								if($desired_job!=''):
									for($i=0;$i<count($desired_job);$i++){
									//echo $value['job_category_id']; echo '=='.$desired_job[$i];
									if($value['job_category_id']==$desired_job[$i]){ 
										$jchk="checked"; break;	
									}									
								}
								endif;
								?>
								<td valign="top">
									<div class="checkbox">
									<label><input type="checkbox" name="c_<?php echo $value['job_category_id'];?>" <?php echo $jchk; ?>><?php echo $value['category_name'];?></label>
									</div>

								</td>
							<?php if($j%3==0) echo "</tr><tr>";

							 $j++;}?>
							</tr>
							</table>
						</div>
						<div class="form-group">
							<label style="color:#C52D2F">Reference </label>
							<textarea name="reference" class="form-control" rows="5" wrap="hard"><?php echo $reference;?></textarea>
						</div> 
					</div>
					<div class="col-sm-8" style="margin-top:60px;border:0px solid red;">
						<h4 style="color:#C52D2F">Your Login Details</h4><br>
						&nbsp;*Spaces are not allowed.
						<div class="form-group">
							<label>Username:*</label>
							<input type="text" class="form-control" id="username" name="username" value="<?php echo $username;?>" maxlength="15" required="required">
							*
							(maximum 15 characters)
						</div>
						<div class="form-group">
							<label>Password:</label>*
							<input type="password" class="form-control" id="password" name="password" maxlength="12" required="required">
							*
							(Minimum 6 characters and maximum 12 characters)
						</div>
						<div class="form-group">
							<label>Retype Password:</label>	*						
							<input type="password" class="form-control" id="re_password" name="re_password" maxlength="12" required="required">
														
						</div>
					</div>

					<div class="col-sm-8">
						<div class="form-group">	
							<input type="checkbox"  name="tos" id="tos"  value="tos" onclick="checkit();"> You agree with our 
							<a href="<?php echo site_url();?>pages/tos.html">terms and conditions</a>.<br><br>

							<input type="submit" name="signup" id="signup" class="btn btn-primary btn-lg" disabled value="Submit" onclick="" />
							<span id="msg2" style="color:red;"></span>
						</div>
					</div>			
            	</form>
            		
            </div>
        </div>   
</section>         




				
<script type="text/javascript">
	function checkit(){
		var x=document.getElementById("tos");
		if(x.checked==false)
			document.getElementById("signup").disabled = true;
		if(x.checked==true)
			document.getElementById("signup").disabled = false;
	}

</script>				
<?php $this->load->view("footer");?>		