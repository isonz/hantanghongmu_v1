<div class="company_l">
	<h2>帕斯婷视频</h2>
    <dl id="leftMenu">
    	<?php 
    	$post_id = get_the_ID();
    	$args = array(
    		'meta_key' => '_wp_page_template',
    		'meta_value' => 'video.php',
    		'orderby' => 'menu_order',
    		'order' => 'ASC',
    		'post_type' => 'page',
    	);
    	$pages = get_posts($args);
		foreach ($pages as $page){
		?>
    	<dt>
    		<a href="/<?php echo $page->post_name ?>" <?php if($post_id == $page->ID){ echo 'class="hover"';} ?>>
    			<?php echo $page->post_title ?>
    		</a>
    	</dt>
         <?php 
         }
         ?>
      </dl>
     <?php $reserve_tel = get_page(65); echo $reserve_tel->post_content; ?>
</div>
     