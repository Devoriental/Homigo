<?php $this->load->view("header");?>
  	<section id="all-job">
        <div class="container">
        	<div class="center">  
                <h2>Jobs</h2>
			</div>			
		    
				<?php $i=1;foreach ($job_list as $ct){ ?>
					<div class="col-sm-8" style="border:0px dashed black;margin-bottom:25px;">	
						<?php 
                        $query=$this->db->query("select company_name,photo from company where company_id=$ct[company_id]"); 
                        $crr=$query->row_array();
                        $cphoto='jobopening.png';
                        if($crr['photo']!='')$cphoto=$crr['photo'];
                    	?>	
                    	<div class="col-xs-2" style="border:0px solid red;margin-top:12px;">
                      		<img class="img-responsive" src="<?php echo site_url();?>images/companylogo/<?php echo $cphoto;?>" alt="<?php echo $crr['company_name'];?>">
                    	</div>
                    	<div class="col-xs-10" style="border:0px solid red;margin-top:12px;">   
							<h4 style="padding-top:0px;margin-top:0px;width:100%;">						
								<a href="<?php echo site_url();?>job/detail/<?php echo $ct['job_id'];?>.html"><?php echo $ct['job_title'];?></a>
							</h4>
							<label style="font-weight:bold;">Company:</label>
							<label style="font-weight:bold;"><?php echo $crr['company_name'];?></label><br>
							<label style="font-weight:bold;">Education:</label><?php echo $ct['education'];?>	<br>
							<label style="font-weight:bold;">Experience:</label><?php echo $ct['experience'];?>	
						</div>	
					</div>
						
				<?php $i++; } ?>									
				<div class="col-sm-4" style="border:0px solid green;text-align:center;margin-bottom:0px;">
						<img style="margin-bottom:10px;border:0px solid black;" alt ='Garden Inn' src="<?php echo site_url();?>images/adimage/gardeninn.png" />
					
					</div>	
			
				<div class="col-sm-8" style="border:0px solid green;text-align:center;margin-bottom:0px;">
						<span class="textcolor">Go to page: <select name="pgselect"  onchange="gotopage(this.value,'<?php echo $this->uri->segment(3)?>')">
								<?for($i=1;$i<=$total_page;$i++){?>
									<option value="<?php echo $i;?>" <?php if($currentpage==$i){?>selected<?php } ?>>&nbsp;<?php echo $i;?></option>
								<?}?>
							</select>
							&nbsp;&nbsp;
							<a href="<?php echo site_url();?>job/alljob/1.html"><i class="fa fa-angle-double-left fa-lg"></i></a>
							&nbsp;&nbsp;
							<a href="<?php echo site_url();?>job/alljob/<?php echo $currentpage-1;?>.html"><i class="fa fa-angle-left fa-lg"></i></a>

							&nbsp;&nbsp;Page <?php echo $currentpage;?> of <?php echo $total_page;?>&nbsp;&nbsp;
							<a href="<?php echo site_url();?>job/alljob/<?php echo $currentpage+1;?>.html"><i class="fa fa-angle-right fa-lg"></i></a>
							&nbsp;&nbsp;
							<a href="<?php echo site_url();?>job/alljob/<?php echo $total_page;?>.html"><i class="fa fa-angle-double-right fa-lg"></i></a>
						</span>	
				</div>	
				
			
        </div>
    </section>    	

   
   
	
	

  
			
	
<script type="text/javascript">
 	function gotopage(pageno,urlname){
	
			document.location.href =jurl+"job/alljob/"+pageno+".html"; 
	  }
</script>	
 
<?php $this->load->view("footer");?>		
