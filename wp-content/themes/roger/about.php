<?php
/*
Template Name: 关于生活模式
*/

get_header(); ?>
<!--center area-->

<div class="centerdiv home_bg">
	<div class="center_topimg">
    	<p class="top_img_draw"></p>
    </div>
    
    <div class="center_div">
    	<div class="p1">
        	<div class="p1-1">
            	<div class="style-top"></div>
                <?php  while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
				<?php endwhile; // end of the loop. ?>
            </div>
        </div>
    </div>

</div>
<!--center area end-->
<?php get_footer(); ?>