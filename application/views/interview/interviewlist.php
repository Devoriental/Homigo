<?php $this->load->view("header");?>
<section id="feature" class="transparent-bg">
	<div class="container">
		<!--<div class="clients-area center wow fadeInDown" style='border:0px solid red;padding-top:0px;margin-top:0px;padding-bottom:0px;'>
                <h2>Success Stories</h2>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
        </div>-->
<?php //print_r($interviews);?>
        <div class="row">
                <!--<div class="col-md-4 wow fadeInDown">
                    <div class="clients-comments text-center">
                        <img src="images/client_white.png" class="img-circle" alt="">
                        <h3></h3>
                        <h4><span></span></h4>
                    </div>
                </div>-->
                <div class="col-xs-12 wow fadeInDown" style='border:0px solid green;'>
                    <?php foreach ($interviews as $val) {?>                        
                        <div class="col-md-4 clients-comments text-center" style='border:0px solid red;'>
                            <img src="<?php echo site_url();?>images/interview/<?php echo $val['person_photo'];?>" class="img-circle" alt="">
                            <h3><?php ///echo $interviews[0]['interview_title'];?></h3>
                            <h4><span>-<?php echo $val['person'];?> </span> </h4>
                            <span><?php echo $val['designation'];?></span><br>
                            <span><?php echo $val['comp_name'];?></span>   <br> <br> 
                            <a href="<?php echo site_url();?>interview/detail/<?php echo $val['interview_id'];?>.html">Read Stories</a>
                        </div>
                    <?php }?>    
                </div>
               <!-- <div class="col-md-4 wow fadeInDown">
                    <div class="clients-comments text-center">
                        <img src="images/client_white.png" class="img-circle" alt="">
                        <h3></h3>
                        <h4><span></span></h4>
                    </div>
                </div>-->
           </div>
	</div>
</section>        
				
<?php $this->load->view("footer");?>	