<?php $this->load->view("header");?>
<section id="feature" class="transparent-bg">
	<div class="container">
		<!--<div class="clients-area center wow fadeInDown">
                <h2>What our client says</h2>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
        </div>-->
<?php //print_r($interviews);?>
        <div class="row">
                <div class="col-md-4 wow fadeInDown">
                <!--    <div class="clients-comments text-center">
                        <img src="images/client_white.png" class="img-circle" alt="">
                        <h3></h3>
                        <h4><span></span></h4>
                    </div>-->
                </div>
                <div class="col-md-4 wow fadeInDown">
                    <div class="clients-comments text-center">
                        <img src="<?php echo site_url();?>images/interview/<?php echo $interviews[0]['person_photo'];?>" class="img-circle" alt="">
                        <h3><?php ///echo $interviews[0]['interview_title'];?></h3>
                        <h4><span>-<?php echo $interviews[0]['person'];?> </span> </h4>
                        <span><?php echo $interviews[0]['designation'];?></span><br>
                        <span><?php echo $interviews[0]['comp_name'];?></span>   <br> <br> 
                        <a href="<?php echo site_url();?>interview/detail/<?php echo $interviews[0]['interview_id'];?>.html">Read Interview</a>
                    </div>
                </div>
                <div class="col-md-4 wow fadeInDown">
                 <!--   <div class="clients-comments text-center">
                        <img src="images/client_white.png" class="img-circle" alt="">
                        <h3></h3>
                        <h4><span></span></h4>
                    </div>-->
                </div>
           </div>
	</div>
</section>        
				
<?php $this->load->view("footer");?>	