<?php $this->load->view("admin/header");?>
<div class="row">
	<div class="twelve columns">
		<h4>Change Settings</h4>
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
<?php $current_year=date('Y');
	  $last_date=explode('-', $jobs['last_date']);
	  //print_r($last_date);
	  //echo $last_date[2];
?>
<div class="row">
	<div class="nine columns">
		<span id="msg" style="color:red;"></span>
		
		<form action="" method="post">
			<!--<label>Posted on: <?php echo show_date($jobs['post_date']);?></label>-->
			<label>No. of Job at Home Page:</label>
			<input type="text" name="no_job_home" size="60" value="<?php echo $no_job_at_home['config_value'];?>">
			
			<br>
			<input type="submit" name="update" value="Update" onclick="" />
		</form>
			
	</div>
</div>	

<?php $this->load->view("admin/footer");?>
