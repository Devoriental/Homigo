<?php $this->load->view("header");?>
  	<section id="all-job">
        <div class="container" style="border:0px solid red;">
        	<div class="center">  
                <h2>Career Corner</h2>
                <img class="img-responsive" src="<?php echo site_url();?>images/adimage/bachelor.jpg" alt="Bachelor">
			</div>		
		  
			<?php $i=1;foreach ($resource_list as $ct): ?>
				<div class="col-xs-8" style="border:0px dashed black;margin-bottom:25px;">
					<?php 
                       // $query=$this->db->query("select company_name,photo from company where company_id=$ct[company_id]"); 
                       // $crr=$query->row_array();
                       // $cphoto='jobopening.png';
                       // if($crr['photo']!='')$cphoto=$crr['photo'];
                    ?>
                    <div class="col-xs-6" style="border:0px solid red;margin-top:12px;">
                      <?php if($ct['resource_photo']!=''):?>
                      	<img class="img-responsive" src="<?php echo site_url();?>images/resource/<?php echo $ct['resource_photo'];?>">
                      <?php endif; ?>	
                     </div> 
                    <div class="col-xs-10" style="border:0px solid red;margin-top:12px;">   
						<h4 style="padding-top:0px;margin-top:0px;width:100%;">						
							<a href="<?php echo site_url()?>resource/detail/<?php echo $ct['resource_id'];?>.html" target=_blank><?php echo $ct['resource_title'];?></a>
						</h4>
						<h6>By: <?php echo $ct['writer'];?></h6>
						<p style="text-align: justify;"><?php echo strip_tags((substr($ct['resource_text'],0,200)));?>...</p>
						<label class='label label-primary'>Posted on: <?php echo show_date($ct['resource_date']);?></label>
						
					</div>		
				</div>
			<?php $i++; endforeach ?>	

			<div class="col-xs-8" style="border:0px solid red;text-align:center;margin-bottom:0px;">
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
