<?php get_header(); ?>

<div class="centerdiv home_bg">
	<div class="center_topimg">
    	<p class="top_img_draw"></p>
    </div>
    
    <div class="center_div">
    	<div class="p2">
        	<div class="p2-1 clearfix">
        		<?php get_sidebar('healthcare-sidebar'); ?>
        		
                <div class="company_info">
                	<div class="infotitle">
                    	<div class="tlt">
                        	<div class="tlt1">
                            	<div class="tlt2">服务项目</div>
                            </div>
                        </div>
                    </div>
					<!--  main content -->
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', get_post_format() ); ?>
					<?php endwhile; // end of the loop. ?>
                </div>
            </div>
        </div>
    </div>

</div>

<!--视频弹出层-->
	<div class="uploaddiv">
    	<div class="Topleft">
        	<a href="javascript:;" class="close" title="关闭"></a>
        	<div class="Topright">
            	<div class="Topcenter"></div>
            </div>
        </div>
        <div class="CenterLeft">
        	<div class="CenterRight">
       	    	<div id="centerVideo"></div>
            </div>
        </div>
        <div class="FootLeft">
        	<div class="FootRight">
            	<div class="FootCenter"></div>
            </div>
        </div>
    </div>
<!--视频弹出层 end-->
<script type="text/javascript" src="http://player.youku.com/jsapi"></script>
<?php get_footer(); ?>
<script>
$("#menu-item-30").addClass("current-menu-item");
</script>
