<?php
/*
Template Name: 服务项目
*/

header("Location: /service/physical/physical/");
get_header(); 
?>

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
					<?php  //while ( have_posts() ) : the_post(); ?>
					<?php //get_template_part( 'content', 'page' ); ?>
					<?php //endwhile;  ?>
                </div>
            </div>
        </div>
    </div>

</div>
    
<?php get_footer(); ?>

