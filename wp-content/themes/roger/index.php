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
            	
<?php 
    query_posts('page_id=2');
    while ( have_posts() ) : the_post(); 
    //$pid=get_the_ID();
    //var_dump($pid);
?>

<?php get_template_part( 'content', 'page' ); ?>
<?php endwhile; // end of the loop. ?>


<div class="about">
<div class="title">产品服务</div>
  <div class="product-list clearfix">
  <?php
    $cate_id = 1;
	query_posts("cat=$cate_id&showposts=12");
	$wp_query->is_archive = true; 
	$wp_query->is_home = false;
	while (have_posts()) : the_post();
  ?>                            
	<div class="product-list-box">
		<a href="<?php the_permalink(); ?>" target="_blank"><?php the_first_product_image(); ?></a>
		<p><?php the_title(); ?></p>
	</div>
	<?php endwhile; ?> 
	
  </div>
</div>


<div class="about">
<div class="title">联系我们</div>
<div class="cont">
	地址：广东省江门市新会大泽镇瀚唐古典家具厂<br>
	联系电话：<img class="alignnone size-full wp-image-231" alt="tel" src="http://127.0.0.70/wp-content/uploads/2016/02/tel.png" width="200" height="30"><br>
	微信扫一扫添加联系人
	
</div>
</div>


</div>
<!--center area end-->
<?php get_footer(); ?>