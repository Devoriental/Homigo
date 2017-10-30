<?php $this->load->view("admin/header");?>

<div class="row"><div class="twelve columns">	<h4>Edit Resource</h4></div></div>


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
	<div class="twelve columns">
		<span id="msg" style="color:red;"></span>
		<form action="" method="post">
			
			<label>Resource Title:</label><br>
			<input type="text" name="ttl" size="60" value="<?php echo $arr['resource_title'];?>"><br>
			<label>Writer:</label><br>
			<input type="text" name="writer" size="60" value="<?php echo $arr['writer'];?>"><br>
			<label>Writer's Detail:</label><br>
			<textarea name="writer_detail" class="u-full-width"><?php echo $arr['writer_detail'];?></textarea><br>			
			<br>
			<label>Date:</label>
			<input type="text" name="post_date" value="<?php echo $arr['resource_date'];?>">
			&nbsp;&nbsp;&nbsp;
			<label>Resource Status:</label>
			<select name="status">
				<option value="active" <?php if($arr['status']=='active')echo 'selected';?>>Active</option>
				<option value="inactive" <?php if($arr['status']=='inactive')echo 'selected';?>>Inactive</option>
			</select>
			<br><br>

			<label>The resource:</label><br>
			<textarea name="theresource" class="u-full-width"><?php echo $arr['resource_text'];?></textarea><br>
			
			
			
			<br><br>
			<input type="submit" name="update" value="Update" onclick="" />
		</form>		
	</div>	
</div>	

<?php $this->load->view("admin/footer");?>
