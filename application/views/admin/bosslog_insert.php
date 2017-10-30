<?php $this->load->view("admin/header");?>
<div class="row">
	<div class="twelve columns">
		<h4>Insert Job</h4>
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
	<div class="nine columns">
		<span id="msg" style="color:red;"></span>
			
			<form action="" method="post">
				
				<label>Job Title:</label>
				<input type="text" name="ttl" class="u-full-width" value="">
				<label>Company:</label>
				<select name="company">
					<?php foreach($crr as $c){?>
						<option value="<?php echo $c['company_id'];?>"><?php echo $c['company_name'];?></option>
					<?php }?>
				</select>
				
				<label>Job Description/Responsibility:</label>
				<textarea name="responsibility" rows="7" cols="70"></textarea>
				<label>Additional Info:</label>
				<textarea name="additional" rows="7" cols="70"></textarea>
				<label>Educational Requirement:</label>
				<textarea name="education" class="u-full-width"></textarea> 
				<label>Employment Exprience:</label>
				<textarea name="employment" class="u-full-width"></textarea> 
				<label>Job Location:</label>
				<input type="text" name="location" size="60" class="u-full-width" value="">
				
				<label>Job Nature:</label>
				<select name="nature">
					<option value="Full time">Full Time</option>
					<option value="Part time">Part Time</option>
				</select>
				<label>Salary:</label>
				<input type="text" name="salary" class="u-full-width" value="">
				<label>No of Vacancies:</label>
				<input type="text" name="vacancy" class="u-full-width" value="">
				
				<label>Last Date of Submission:</label>
				<input type="text" name="last_date" class="u-full-width" value="">

				<input type="submit" name="add" value="Add Job" onclick="" />
			</form>
			
	</div>	
</div>	
<?php $this->load->view("admin/footer");?>