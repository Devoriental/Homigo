<?php $this->load->view("admin/header");?>
<br>
<?php $this->load->view("admin/submenu_company");?>
<div class="row">
	<div class="twelve columns"><h4>Edit Company</h4></div>
</div>

<script type="text/javascript">
			window.onload = function(){
				new JsDatePick({
					useMode:2,
					target:"balance_date",
					dateFormat:"%d-%M-%Y",
					imgPath:"<?php echo site_url()?>js/jsdatepick/img/"					
				});
			};

</script>
<?php $current_year=date('Y');
	  $post_date=explode('-', $company['reg_date']);
	  //print_r($last_date);
	  //echo $last_date[2];
?>
<div class="row">
	<div class="twelve columns">
		<span id="msg" style="color:red;"></span>
		<form action="" method="post">
			<label>Regestered on: <?php echo show_date($company['reg_date']);?></label><br>
			<label>Company/Organization Name:</label><br>
			<input type="text" name="company_name" size="60" value="<?php echo $company['company_name'];?>"><br>
			<label>Company's Real Name (Alias):(This will not be shown in the website)</label><br>
			<input type="text" name="company_real_name" size="60" value="<?php echo $company['company_real_name'];?>"><br>
			<label>Email:</label><br>
			<input type="email" name="email" size="60" value="<?php echo $company['email'];?>"><br>
			<label>Password:</label><br>
			<input type="text" name="password" size="60" value="<?php echo $company['password'];?>"><br>
			<label>Company Type:</label><br>
			<input type="text" name="emp_type" size="60" value="<?php echo $company['company_type'];?>"><br>
			<label>Contact No.(Mobile):</label><br>
			<input type="text" name="tel" size="60" value="<?php echo $company['mobile'];?>"><br>
			<label>Concern Person's Name:</label><br>
			<input type="text" name="cp_name" size="60" value="<?php echo $company['concern_person'];?>"><br>
			<label>Concern Person's Designation:</label><br>
			<input type="text" name="cp_desig" size="60" value="<?php echo $company['concern_designation'];?>"><br>
			<label>Company Address:</label><br>
			<textarea name='address' class='u-full-width'> <?php echo $company['company_address'];?></textarea> <br>
			<label>Website:</label><br>
			<input type="text" name="website" size="60" value="<?php echo $company['website'];?>"><br>
			<label>Company Information:(If left blank nothing will show in the website)</label><br>
			<textarea name='company_info' class='u-full-width'> <?php echo $company['company_info'];?></textarea> <br>
			<label>Status:</label>
			<select name="status">
				<option value="active" <?php if($company['status']=='active')echo 'selected';?>>Active</option>
				<option value="inactive" <?php if($company['status']=='inactive')echo 'selected';?>>Inactive</option>
			</select>
			<br><br>
			<input type="submit" name="update" value="Update" onclick="" />
		</form>
			
	</div>
</div>	

<?php $this->load->view("admin/footer");?>
