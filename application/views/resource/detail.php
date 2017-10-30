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
        <h2 style="font-size:30px;margin-bottom:0px;"><?php echo $resource['resource_title'];?></h2>
        <span style="text-align:right;">By: <?php echo $resource['writer'];?></span>
    </div>


 <div class="blog">
            <div class="row">
                <div class="col-md-8">
                    <div class="blog-item">
                        <?php if($resource['resource_photo']!=''):?>
                        <img class="img-responsive img-blog" src="<?php echo site_url();?>images/resource/<?php echo $resource['resource_photo']?>" width="100%" alt="" />
                        <?php endif;?>
                            <div class="row">  
                                <div class="col-xs-12 col-sm-2 text-center">
                                    <div class="entry-meta">
                                        <span id="publish_date"><?php echo show_date($resource['resource_date']);?></span>                                        
                                           <br> 
                                        <div class="fb-share-button" data-href="<?php echo site_url();?>resource/detail/<?php echo $resource['resource_id'];?>.html" data-layout="button"></div>
                                    </div>
                                </div>
                                 <div class="col-xs-12 col-sm-10 blog-content">                                    
                                   <p style="text-align:justify;"><?php echo $resource['resource_text'];?></p>
                                    <div class="post-tags">
                                        <!--<strong>Tag:</strong> <a href="#">Cool</a> / <a href="#">Creative</a> / <a href="#">Dubttstep</a>-->
                                    </div>

                                </div>
                            </div>
                    </div><!--/.blog-item-->
                </div><!--/.col-md-8-->    

                <aside class="col-md-4">
                    <div class="widget categories" style="text-align:center;">
                        <img src="<?php echo site_url();?>images/resource/<?php echo $resource['writer_photo'];?>" width="200"  height="200" class="img-circle" alt="" />    
                        <h3><?php echo $resource['writer'];?></h3> 
                        <p style="text-align:justify;"><?php echo $resource['writer_detail'];?></p>
                    </div>
                   <!-- <div class="widget categories">
                        <h3>Other Articles</h3>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="single_comments">
                                    <img src="<?php echo site_url();?>images/blog/avatar3.png" alt=""  />
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do </p>
                                    <div class="entry-meta small muted">
                                        <span>By <a href="#">Alex</a></span <span>On <a href="#">Creative</a></span>
                                    </div>
                                </div>
                                <div class="single_comments">
                                    <img src="<?php echo site_url();?>images/blog/avatar3.png" alt=""  />
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do </p>
                                    <div class="entry-meta small muted">
                                        <span>By <a href="#">Alex</a></span <span>On <a href="#">Creative</a></span>
                                    </div>
                                </div>
                                <div class="single_comments">
                                    <img src="<?php echo site_url();?>images/blog/avatar3.png" alt=""  />
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do </p>
                                    <div class="entry-meta small muted">
                                        <span>By <a href="#">Alex</a></span <span>On <a href="#">Creative</a></span>
                                    </div>
                                </div>
                                
                            </div>
                        </div>                     
                    </div>--><!--/.recent comments-->
                </aside>    
         </div><!--/.row-->

</div><!--/.blog-->        

</section>    
				
<?php $this->load->view("footer");?>	