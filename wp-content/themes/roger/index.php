<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
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
                <?php 
                query_posts('page_id=2');
                while ( have_posts() ) : the_post(); 
                //$pid=get_the_ID();
                //var_dump($pid);
                ?>
				<?php get_template_part( 'content', 'page' ); ?>
				<?php endwhile; // end of the loop. ?>
            </div>
        </div>
    </div>

</div>
<!--center area end-->
<?php get_footer(); ?>