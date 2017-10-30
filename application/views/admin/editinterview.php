<?php $this->load->view("admin/header");?>

<div class="row">
	<div class="twelve columns">
		<h4>Edit Interview</h4>
	</div>	
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
<div class="row">
	<div class="eight columns">
		<span id="msg" style="color:red;"></span>
		<form action="" method="post">			
			<label>Interview Title:</label><br>
			<input type="text" name="ttl" size="60" value="<?php echo $arr['interview_title'];?>"><br>
			<label>Person:</label><br>
			<input type="text" name="person" size="60" value="<?php echo $arr['person'];?>"><br>
			<label>Designation:</label><br>
			<input type="text" name="designation" size="60" value="<?php echo $arr['designation'];?>"><br>
			<label>Institution/Company/Organization:</label><br>
			<input type="text" name="company" size="60" value="<?php echo $arr['comp_name'];?>"><br>
			<label>Person's Info Summary:</label><br>
			<textarea name="summary" class="u-full-width"><?php echo $arr['person_info'];?></textarea><br>
			<label>Date:</label>
			<input type="text" name="post_date" value="<?php echo $arr['interview_date'];?>">
			&nbsp;&nbsp;&nbsp;
			<label>Job Status:</label>
			<select name="status">
				<option value="active" <?php if($arr['status']=='active')echo 'selected';?>>Active</option>
				<option value="inactive" <?php if($arr['status']=='inactive')echo 'selected';?>>Inactive</option>
			</select>
			<br><br>

			<label>The Interview:</label><br>
			<textarea name="theinterview" class="u-full-width"><?php echo $arr['interview_text'];?></textarea><br>
			
			
			
			<br><br>
			<input type="submit" name="update" value="Update" onclick="" />
		</form>			
	</div>			
</div>
	


<?php $this->load->view("admin/footer");?>
