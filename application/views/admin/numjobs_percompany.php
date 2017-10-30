<?php $this->load->view("admin/header");?>
<br>

<h3>Number of jobs per company</h3>

<?php //print_r($num_per_jobs);?>

<span id="msg" style="color:red;"></span>
<div style="border:0px solid green; width:810px">
	<div style="border:0px solid yellow; width:750px;float:left;">
			<label>Total <?php echo $totalrow;?> candidates</label>
			<table border="1">
			<tr>
				<td>Company Id</td><td>Company Name</td><td>Number of jobs</td><td>&nbsp;</td>
			</tr>						
			<?php $i=1; foreach($num_per_jobs as $jb){?>
				<tr <?php if($i%2==0){?>style="background:#CBBEAA;"<?php }?>>
					<td><?php echo $jb['company_id'];?></td>
					<td>
						<?php $cid=$jb['company_id'];	
						$q=$this->db->query("select company_name from company where company_id=$cid");
						$mb=$q->row_array();
						echo $mb['company_name']; ?>

					</td>
					<td><?php echo $jb['total_jobs'];?></td>
					
					<td><!--<a href="<?php echo site_url();?>bosslog_user/edituser/<?php echo $jb['user_id'];?>.html">Edit</a>&nbsp;
						<a href="<?php echo site_url();?>bosslog_user/showuser/<?php echo $jb['user_id'];?>.html">Details</a>	-->
					</td>
				</tr>	
			<?php }?>
			</table>
			
	</div>
	<div style="width:20%;margin-top:10px;">
			<span class="textcolor">Go to page: <select name="pgselect"  onchange="gotopage(this.value,'<?php echo $this->uri->segment(3);?>')">
							<?php for($i=1;$i<=$total_page;$i++){?>
								<option value="<?php echo $i;?>" <?php if($currentpage==$i){?>selected<?php }?>>&nbsp;<?php echo $i;?></option>
							<?php }?>
					</select>
	</div>
	
	<!--<div style="border:0px solid cyan; width:398px;float:left;">
			
	</div>	-->
	
</div>	
<script type="text/javascript">
 function gotopage(pageno,urlname){
	
			document.location.href =jurl+"bosslog_stats/numjobs_percompany/"+pageno+".html"; 
		}
</script>
<?php $this->load->view("admin/footer");?>
