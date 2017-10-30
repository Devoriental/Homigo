
<?php $this->load->view('header');?>
  <!--start intro-->

<section id="main-slider" class="no-margin">
        <div class="carousel slide">
           <!-- <ol class="carousel-indicators">
                <li data-target="#main-slider" data-slide-to="0" class="active"></li>
                <li data-target="#main-slider" data-slide-to="1"></li>
                <li data-target="#main-slider" data-slide-to="2"></li>
            </ol>-->
            <div class="carousel-inner" style="">

                <div class="item active" style="background-image: url(images/slider/48991.jpg);">
                  <div class="container" style="border:0px solid yellow;">
                    <div class="row slide-margin" style="border:0px solid red;margin-top:1%;">
                           <div class="col-sm-12" style="border:0px solid green;text-align:center;">&nbsp;&nbsp;</div>
            				      <div class="col-sm-12" style="border:0px solid green;text-align:center;">
            							<?php /* <label style="font-size:25px; color:white;">&nbsp;</label>
                                             <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                                                <!-- jmjobs_1 -->
                                                <ins class="adsbygoogle"
                                                     style="display:inline-block;width:728px;height:90px"
                                                     data-ad-client="ca-pub-0863978493711935"
                                                     data-ad-slot="1525991523"></ins>
                                                <script>
                                                (adsbygoogle = window.adsbygoogle || []).push({});
                                                </script>-->
                              */?>
                              &nbsp;&nbsp;
            							</div>
							<div class="col-sm-3" style="border:0px solid green;">
								&nbsp;&nbsp;
							</div>
							<div class="col-sm-6" style="background-color:#4E4E4E;padding-top:8px;padding-bottom:10px;border-radius:.2em;">
								<form class="form-inline" role="form" style="text-align:center;" action="<?php site_url();?>job/search.html" method="post">
									<div class="form-group">
											<input type="text" name="keyrd" class="form-control" id="email" size="50" placeholder="Job title, Position, Company" style="border:1px solid #A0A0A0;">
									</div>
									&nbsp;&nbsp;
									<button type="submit" name='search' class="btn btn-default">Search</button>
								  </form>
              </div>
							<div class="col-sm-3" style="border:0px solid green;">
								&nbsp;&nbsp;
							</div>
							<div class="carousel-content" style="border:0px solid green;">
                                   <!-- <h1 class="animation animated-item-1">Journeymakerjobs.com</h1>
                                    <h2 class="animation animated-item-2">Serving the job market of Sylhet</h2>-->
                                    <!--a class="btn-slide animation animated-item-3" href="#">Read More</a>-->
							</div>
                            <!--<div class="col-sm-6 hidden-xs animation animated-item-4" style="border:1px solid pink;">
                                <div class="slider-img">
                                   <img src="images/slider/img3.png" class="img-responsive">
                                </div>
                            </div>-->
                        </div>
                    </div>
                </div><!--/.item-->
            </div><!--/.carousel-inner-->
        </div><!--/.carousel-->
        <!--<a class="prev hidden-xs" href="#main-slider" data-slide="prev">
            <i class="fa fa-chevron-left"></i>
        </a>
        <a class="next hidden-xs" href="#main-slider" data-slide="next">
            <i class="fa fa-chevron-right"></i>
        </a>-->
    </section><!--/#main-slider-->

     <section id="services" class="service-item" style="border:0px solid red;padding-top:10px;">
       <div class="container" style="border:0px solid green;">
            <div class="center wow fadeInDown">
                <h2><a href="#thejobs" style="color:white;">Recent Jobs</a></h2>
                <!--<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>-->
            </div>

            <div class="row">
                <?php foreach ($job_list as $ct): ?>
                <div class="col-sm-6 col-md-6">
                    <div class="media services-wrap wow fadeInDown" style="height:150px;padding-top:10px;">
                        <div class="pull-left" style="border:0px solid red;">
                            <?php
                                $query=$this->db->query("select company_name,photo from company where company_id=$ct[company_id]");
                                $crr=$query->row_array();
                                $cphoto='jobopening.png';
                                if($crr['photo']!='')$cphoto=$crr['photo'];
                            ?>
                            <img class="img-responsive" src="<?php echo site_url();?>images/companylogo/<?php echo $cphoto;?>">
                        </div>
                        <div class="media-body" style="border:0px solid red;">
                            <h4 style="margin-top:0px"><a href="<?php echo site_url()?>job/detail/<?php echo $ct['job_id'];?>.html"><?php echo $ct['job_title'];?></a></h4>
                            <p><span style="font-weight:bold;"><?php echo $crr['company_name'];?></span><br>Last Date:&nbsp;<?php echo show_date($ct['last_date']);?><br>
                                 Job Nature:&nbsp;<?php echo $ct['job_nature'];?></p>
                        </div>
                    </div>
                </div>
                <?php  endforeach ?>
                <a name="thejobs"></a>
                <div class="col-lg-12" style="text-align:center;border:0px solid red;">

                    <a class="btn btn-info" href="<?php echo site_url();?>job/alljob.html" class="" style="font-size:18px;">Click here to see <b><?php echo $totalrow-$limit_per_page;?></b> more jobs</a>
                </div>
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#services-->


    <!--<section id=""  style="border:0px solid yellow;padding-bottom:0px;">
        <div class="container">
            <div class="row" >
                <div class="center wow fadeInDown">
                    <h2 style="margin-bottom:0px;"><span style="background:#295599;color:white;border-radius:5px;">&nbsp;Training&nbsp;</span></h2>
                </div>
                <div class="col-sm-6" >
                       <img src="<?php echo site_url();?>images/training_on_cv_writing.jpg" alt='CV Writing' class="img-responsive">
                </div>
                <div class="col-sm-6" >
                        <h1 style="margin-top:0px;color:#000;">Training</h1>

                        <h1 style='color:#C52D2F'>CV writing & Interview Techniques For Beginner </h1>
                        <label>Date: 19/11/2016 (11.00 AM)</label>
                        <p><h5>Resource Person: Anup Kanti Das </h5>
                        Sr. Assistant Vice President (SAVP) and Cluster Manager at BRAC Bank Ltd. <br>
                        * Registration Fee- 500/= (Per Person) <br>
                        * Registration Deadline- 17/11/2016 <br>
                        * Address- 8, Nayasarak, Sylhet.<br>
                        * Contact- 01979- 560560, 01979-560561
                        </p>
                </div>
            </div>
        </div>
    </section>-->

	<section id="recent-works">
        <div class="container">
           <!-- <div class="center wow fadeInDown">
                <h2>Recent Works</h2>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>
            </div>-->

            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="recent-work-wrap">
                        <img class="img-responsive" src="<?php echo site_url()?>images/adimage/sylhetview.jpg" alt="Sylhet View24" style="border:0px solid black;">
                        <div class="overlay">
                            <div class="recent-work-inner">
                                <h3><a href="#">Sylhet View24.com</a> </h3>
                                <p></p>
                                <a class="preview" href="http://sylhetview24.com"><i class="fa fa-eye"></i> View</a>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="recent-work-wrap">
                        <!--<img class="img-responsive" src="<?php echo site_url();?>images/adimage/pedalhouse.jpg" alt="PedalHouse">
                        <div class="overlay">
                            <div class="recent-work-inner">
                                <h3><a href="#">Pedal House </a></h3>
                                <p></p>
                                <a class="preview" href="https://www.facebook.com/PedalHouseBD"><i class="fa fa-eye"></i> View</a>
                            </div>
                        </div>-->
						<img class="img-responsive" src="<?php echo site_url();?>images/adimage/lexis_event.jpg" alt="Lexis">
                        <div class="overlay">
                            <div class="recent-work-inner">
                                <h3><a href="#">Pedal House </a></h3>
                                <p></p>
                                <a class="preview" href="#"><i class="fa fa-eye"></i> View</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="recent-work-wrap">
                        <img class="img-responsive" src="<?php echo site_url();?>images/adimage/snp.png" alt="snp">
                        <div class="overlay">
                            <div class="recent-work-inner">
                                <h3><a href="https://www.facebook.com/SNP-Sports-1524208947832015">SNP Sports</a></h3>
                                <p></p>
                                <a class="preview" href="https://www.facebook.com/SNP-Sports-1524208947832015"><i class="fa fa-eye"></i> View</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <div class="recent-work-wrap">
                        <img class="img-responsive" src="<?php echo site_url();?>images/adimage/lt.jpg" alt="Latif Travels" style="">
                        <div class="overlay">
                            <div class="recent-work-inner">
                                <h3><a href="#">Latif Travels</a></h3>
                                <p></p>
                                <!--<a class="preview" href="http://www.hotelgardeninn.net/"><i class="fa fa-eye"></i> View</a>-->
                                <a class="preview" href="http://www.latiftravels.com"><i class="fa fa-eye"></i> View</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#recent-works-->


       <section id="content" style="border:0px solid red;padding-top:0px;">
        <div class="container" style="border:0px solid green;">
            <div class="row">
                <div class="col-xs-12 col-sm-6 wow fadeInDown" style="border:0px solid red;margin-bottom:15px;">
                    <div class="testimonial">
                        <h2 style="color:black;">Success Story</h2>
                         <div class="media testimonial-inner">
                            <div class="pull-left">
                                <img class=" img-circle" src="<?php echo site_url();?>images/interview/<?php echo $interviews['person_photo'];?>">
                            </div>
                            <div class="media-body">
                                <span><strong>-<?php echo $interviews['person'];?></strong></span><br>
                                <span><?php echo $interviews['designation'];?></span><br>
                                <span><?php echo $interviews['comp_name'];?></span>
                                <p style="margin-top:10px;text-align:justify;">
                                    <?php echo $interviews['person_info'];?><br><br>
                                    <a href="<?php echo site_url();?>interview/detail/<?php echo $interviews['interview_id'];?>.html">Read the story</a>
                                </p>
                                <br><br>
                                <a href='<?php echo site_url();?>interview/interviewlist.html'>More Success Stories</a>
                            </div>
                         </div>

                    </div>
                </div><!--/.col-sm-6-->

              <!--  <div class="col-xs-12 col-sm-3 wow fadeInDown" style="border:0px solid red;">
                    <h2 style="color:black;margin-top:0px;">Tips</h2>
                    <?php if(count($tips)>0): $t=1;
                         foreach ($tips as $kr => $vr) : ?>
                       <h3 style="margin-bottom:0px;"><a href="<?php echo site_url();?>tips/detail/<?php echo $vr['tips_id'];?>.html" class="resource"><?php echo $vr['tips_title'];?></a></h3>
                       <hr style="margin-top:6px;">
                   <?php $t++; endforeach; endif;?>
                   <a href="<?php echo site_url();?>tips/listoftips.html">Click here to see more tips</a><br><br>
                </div>-->

                <div class="col-xs-12 col-sm-6 wow fadeInDown" style="border:0px solid red;">
                   <!--- <a href="https://play.google.com/" target="_blank"> <img class="img-responsive" src="<?php echo site_url();?>images/apps_bg_small.jpg"></a>-->
                    <div class="accordion">
                        <a name="careercorner"></a>
                        <h2 style="margin-top:0px;margin-bottom:0px;color:#000;">Career Corner</h2>
                        <div class="panel-group" id="accordion1">
                          <div class="panel panel-default" style="background:#FFF;">
                            <?php if(count($resource)>0): $p=1;
                            foreach ($resource as $kr => $vr) :?>
                          <!--  <div id="collapseOne1" class="panel-collapse collapse in" >-->
                              <div class="panel-body" >
                                  <div class="media accordion-inner">
                                        <div class="pull-left">
                                            <img class="" width="40" height="50" src="<?php echo site_url();?>images/resource/<?php echo $vr['writer_photo'];?>">
                                        </div>
                                        <div class="media-body">
                                             <h4><a href="<?php echo site_url();?>resource/detail/<?php echo $vr['resource_id'];?>.html" class=""><?php echo $vr['resource_title'];?></a></h4>
                                              <h6 style="margin-top:0px;color:#790E21;">By: <?php echo $vr['writer'];?></h6>
                                             <!--<p><?php //echo substr ($vr['resource_text'],0,60);?>....</p>-->
                                        </div>
                                  </div>
                              </div>
                           <!-- </div>-->
                            <?php $p++; endforeach; endif;?>
                          </div>
                        </div>
                        <span style="text-align:center;"><a href="<?php echo site_url();?>resource/listofresource.html" style="text-align:center;">Click here to see more resources</a></span>
                    </div>

                </div>

            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#content-->




    <section id="bottom">
        <div class="container wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
            <div class="row">
                <div class="col-md-12 col-sm-6">
                    <div class="widget">

                    <!--<form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="">-->
                    <div class="col-sm-5 col-sm-offset-1">
                        <div id="msgspan"></div>
                        <div class="form-group">
                            <label>Name *</label>
                            <input type="text" id="pname" name="name" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Email *</label>
                            <input type="email" id="pemail" name="email" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" id="pphone" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Company Name</label>
                            <input type="text" id="pcompany" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label>Subject *</label>
                            <input type="text" id="psubject" name="subject" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Message *</label>
                            <textarea name="message" id="message" required="required" class="form-control" rows="8"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="sb" class="btn btn-primary btn-lg" required="required" onclick="sentemail('<?php echo site_url();?>')">Submit Message</button>
                        </div>
                    </div>
                <!--</form> -->
                    </div>
                </div><!--/.col-md-3-->
            </div>
        </div>
    </section><!--/#bottom-->

<script type="text/javascript">
 function sentemail(theurl){
        //alert(url);
	pname=$("#pname").val();
	pemail=$("#pemail").val();
	pphone=$("#pphone").val();
	pcompany=$("#pcompany").val();
	psubject=$("#psubject").val();
	pmessage=$("#message").val();
	        //alert(theurl+"home/ajax_email.html");
    $.ajax(
        {
            type: "POST",
            url: jurl+"home/ajax_email.html",
            //url: '<?php echo site_url();?>'+"home/ajax_email.html",
            data: "n="+pname+"&e="+pemail+"&p="+pphone+"&c="+pcompany+"&s="+psubject+"&m="+pmessage,
            //data: "receiver_id=" +users_id[index] + "&sender_id="+'' +"&username=" +"" ,
            dataType : "html",
            success: function(html){
                    document.getElementById('msgspan').innerHTML=html;
                    //alert(html);

                },
            error: function(msg,error,status){
                 alert(msg+" "+error);
                }
        }
    );

            //document.getElementById('match_link').href = link;
          }
</script>

<?php $this->load->view('footer');?>
