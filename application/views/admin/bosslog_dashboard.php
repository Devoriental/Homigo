<?php $this->load->view("admin/header");?>
<div class="row">
	<div class="twelve columns">
		<h4>Controlling of Journeymakerjobs</h4>


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
		<span id="msg" style="color:red;"></span>


		<a href="<?php echo site_url()?>bosslog_stats/applieduser.html">List of candidates who applied in job</a><br>
		<a href="<?php echo site_url()?>bosslog_stats/numjobs_percompany.html">Number of jobs per company</a><br>

	</div>	
</div>	

<?php $this->load->view("admin/footer");?>
