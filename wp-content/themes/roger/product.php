<?php
/*
Template Name: 产品服务
*/

get_header(); 
?>

<div class="about">
<div class="title">产品服务</div>
  <div class="product-list clearfix">
  <?php
    $cate_id = 1;
	$paged = (get_query_var("paged")) ? get_query_var("paged") : 1;
	$pagesize = 20;
	$limit = get_option("posts_per_page");
	if(1==$paged) $pagesize++;
							
	query_posts("cat=$cate_id&showposts=$limit=$pagesize&paged=$paged");
	$wp_query->is_archive = true; 
	$wp_query->is_home = false;
	$i=0;
	while (have_posts()) : the_post();
  ?>                            
	<div class="product-list-box">
		<a href="<?php the_permalink(); ?>" target="_blank"><?php the_first_product_image(); ?></a>
		<p><?php the_title(); ?></p>
	</div>
	<?php endwhile; ?>
  </div>
</div>
    
<!--分页-->
<div class="pagediv"><?php wp_pagenavi(); ?></div>
<!--分页 end-->

<?php get_footer(); ?>

