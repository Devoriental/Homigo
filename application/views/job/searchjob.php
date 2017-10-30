<?php $this->load->view("header");?>
<section id="search-job">
    <div class="container" style="border:0px solid red;">
        	<div class="center">  
                <h2>Search Result of '<?php echo $keyrd;?>'</h2>
		</div>
		<div class="col-xs-8" style="border:0px solid red;margin-bottom:0px;">
           	<ul style="border:0px solid red;float:left;">
				<?php $i=1;foreach ($job_list as $ct): ?>
					<li style="padding:5px 0px 5px 5px;width:100%;border:0px solid black;margin-bottom:7px;<?php if($i%1==0){?>border-bottom:2px dashed black;background:#;<?php }?>">
						<h4 style="padding-top:0px;margin-top:0px;width:100%;"><a href="<?php echo site_url()?>job/detail/<?php echo $ct['job_id'];?>.html" style=""><?php echo $ct['job_title'];?></a></h4>
						<label style="font-weight:bold;">Company:</label>
						<?php 
							$query=$this->db->query("select company_name from company where company_id=$ct[company_id]");	
							$crr=$query->row_array();
							echo $crr['company_name'];
						?><br>
						<label style="font-weight:bold;">Education:</label>
						<?php echo $ct['education'];?>	<br>
						<label style="font-weight:bold;">Experience:</label>
						<?php echo $ct['experience'];?>	
					</li>
				<?php $i++; endforeach ?>				
			</ul>
		</div>	
	
		

		<div class="col-xs-8" style="border:0px solid red; text-align:center;margin-bottom:0px;">
					<span class="textcolor">Go to page: <select name="pgselect"  onchange="gotopage(this.value,'<?php echo $this->uri->segment(3)?>')">
							<?for($i=1;$i<=$total_page;$i++){?>
								<option value="<?php echo $i;?>" <?php if($currentpage==$i){?>selected<?php } ?>>&nbsp;<?php echo $i;?></option>
							<?}?>
						</select>
						&nbsp;&nbsp;
						<a href="<?php echo site_url();?>job/search/1.html"><i class="fa fa-angle-double-left fa-lg"></i></a>
						&nbsp;&nbsp;
						<a href="<?php echo site_url();?>job/search/<?php echo $currentpage-1;?>.html"><i class="fa fa-angle-left fa-lg"></i></a>

						&nbsp;&nbsp;Page <?php echo $currentpage;?> of <?php echo $total_page;?>&nbsp;&nbsp;
						<a href="<?php echo site_url();?>job/search/<?php echo $currentpage+1;?>.html"><i class="fa fa-angle-right fa-lg"></i></a>
						&nbsp;&nbsp;
						<a href="<?php echo site_url();?>job/search/<?php echo $total_page;?>.html"><i class="fa fa-angle-double-right fa-lg"></i></a>
					</span>	
		</div>	
	</div>	
</section>	

		
	
<script type="text/javascript">
 	function gotopage(pageno,urlname){
	
			document.location.href =url+"job/search/"+pageno+".html"; 
	  }
</script>			
<?php $this->load->view("footer");?>		
