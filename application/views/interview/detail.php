<?php $this->load->view("header");?>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<section id="blog" class="container">
    <div class="center">
        <h2 style="font-size:30px;margin-bottom:0px;"><?php echo $interview['interview_title'];?></h2>
        
    </div>

    <div class="blog">
            <div class="row" style="border:0px solid red;">
                <div class="col-md-2">&nbsp;
                </div>
               <div class="col-md-8">
                    <div class="blog-item">
                        <img class="img-responsive img-blog" src="<?php echo site_url();?>images/interview/<?php echo $interview['interview_photo'];?>" width="100%" alt="" />
                            <div class="row">  
                                <div class="col-xs-12 col-sm-2 text-center">
                                    <div class="entry-meta">
                                        <span id="publish_date"><?php echo show_date($interview['interview_date']);?></span>
                                        <br>
                                        <div class="fb-share-button" data-href="<?php echo site_url();?>interview/detail/<?php echo $interview['interview_id'];?>.html" data-layout="button"></div>
                                        <!--<span><i class="fa fa-user"></i> <a href="#"> John Doe</a></span>
                                        <span><i class="fa fa-comment"></i> <a href="blog-item.html#comments">2 Comments</a></span>
                                        <span><i class="fa fa-heart"></i><a href="#">56 Likes</a></span>-->
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-10 blog-content">                                    
                                    <p style="text-align:justify;"><?php echo $interview['interview_text'];?></p>

                                    <!--<div class="post-tags">
                                        <strong>Tag:</strong> <a href="#">Cool</a> / <a href="#">Creative</a> / <a href="#">Dubttstep</a>
                                    </div>-->

                                </div>
                            </div>
                        </div><!--/.blog-item-->
                        
                          
                    </div><!--/.col-md-8-->

                <aside class="col-md-4">
                                    
                    
                </aside>     

            </div><!--/.row-->

         </div><!--/.blog-->

</section>    
				
<?php $this->load->view("footer");?>	