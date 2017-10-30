<?php $this->load->view("header");?>

<section id="contact-info">
        <div class="center">                
            <h2>How to Reach Us?</h2>
            <!--<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>-->
        </div>
        <div class="gmap-area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5 text-center" style="border:0px solid red;">
                        <div class="gmap">
                           <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script><div style="overflow:hidden;height:330px;width:280px;"><div id="gmap_canvas" style="height:330px;width:280px;"></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style><a class="google-map-code" href="http://www.themecircle.net" id="get-map-data">themecircle.net</a></div><script type="text/javascript"> function init_map(){var myOptions = {zoom:17,center:new google.maps.LatLng(24.89652630488752,91.87328431006472),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(24.89652630488752, 91.87328431006472)});infowindow = new google.maps.InfoWindow({content:"<b>Journeymakerjobs</b><br/>8 Nayasarak<br/>3100 Sylhet" });google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
                        </div>
                    </div>

                    <div class="col-sm-7 map-content" style="margin-top:15px;border:0px solid red;">
                        <ul class="row">
                            <li class="col-sm-7">
                                <address style="font-size:20px;">
                                    <h2>Head Office</h2>
                                    <p><b>Address</b>: 8 Nayasarak &nbsp;Sylhet<br>
                                    <b>Phone</b>:+88 01979 560 560<br>
                                    <b>Email</b>: write@journeymakerjobs.com<br>
                                    <b>Web</b>: www.journeymakerjobs.com</p>
                                </address>                               
                            </li>                         
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>  <!--/gmap_area -->

 <section id="contact-page">
        <div class="container">
            <div class="center">        
                <h2>Drop Your Message</h2>
                <p class="lead"><!-- Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. --></p>
            </div> 
            <div class="row contact-wrap"> 
                
                <?php echo validation_errors(); ?>
				<?php if($msg!=''){?><div class="status alert alert-success"> <?php echo $msg;?></div><?php }?>

                <!--<form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="<?php echo site_url()?>pages/contact.html">-->
                <form action="<?php echo site_url()?>pages/contact.html"  accept-charset="UTF-8" method="post" id="contact-mail-page">
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group">
                            <label>Name *</label>
                            <input type="text" maxlength="255" name="name"  class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Email *</label>
                            <input type="email" name="email" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Company Name</label>
                            <input type="text" class="form-control">
                        </div>                        
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label>Subject *</label>
                            <input type="text" maxlength="255" name="subject" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Message *</label>
                            <textarea name="message" id="message" required="required" class="form-control" rows="8"></textarea>
                        </div>                        
                        <div class="form-group">
                            <!--<input type="submit" name="op" class="btn btn-primary btn-lg" value="Send">-->
                            <input type="submit" name="op" class="btn btn-primary btn-lg" id="submit" value="Send"  />
                        </div>
                    </div>
                </form> 
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#contact-page-->









 
   <?php $this->load->view('footer');?>