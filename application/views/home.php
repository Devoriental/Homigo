
<?php $this->load->view('header');?>
  <!--start intro-->

<section id="main-slider" class="no-margin">
       <?php  /*
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
		Search box closed------------------------*/ ?>
		
        <!--<a class="prev hidden-xs" href="#main-slider" data-slide="prev">
            <i class="fa fa-chevron-left"></i>
        </a>
        <a class="next hidden-xs" href="#main-slider" data-slide="next">
            <i class="fa fa-chevron-right"></i>
        </a>-->
    </section><!--/#main-slider-->

     <section id="" class="" style="border:0px solid red;padding-top:10px;">
       <div class="container" style="border:0px solid green;">
            <div class="center wow fadeInDown">
                <!--<h2><a href="#thejobs" style="color:white;">Recent Jobs</a></h2>-->
                <!--<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p>-->
            </div>

            <div class="row">
                <?php  //for($i=1;$i<=6;++$i){ 
					foreach ($categorylist as $ct): 
				?>
                <div class="col-sm-4" style="border:0px solid pink;margin-bottom:25px;">
                    <a href='' onmouseover=>
					  <img class="img-responsive" src="<?php echo site_url();?>images/trade_category/<?php echo $ct['photo'];?>">
                      <h1 style=" position: absolute; background: #C75820; color: #fff; padding: 12px 24px; font-size: 18px; font-weight: 300;margin: -62px 10px 0 0;">  
						 <?php echo $ct['category_name'];?>
					  </h1>
					</a>  
                </div>
                <?php  
					//}
					endforeach 
				?>
                <a name="thejobs"></a>
                <div class="col-lg-12" style="text-align:center;border:0px solid red;">

                <!--   <a class="btn btn-info" href="<?php echo site_url();?>job/alljob.html" class="" style="font-size:18px;">Click here to see <b><?php echo $totalrow-$limit_per_page;?></b> more jobs</a>-->
                </div>
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#services-->


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
