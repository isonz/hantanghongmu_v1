<div class="company_l">
	<h2>服务项目</h2>
    <dl id="leftMenu">
    	<?php 
    		$post_id = get_the_ID();
    		$current_cat_id = the_category_ID(false);
			$cates = get_category_children(1);
			$cates = explode('/', $cates);
			$cats = array();
			foreach ($cates as $cate){
				if(!$cate) continue;
				$cat = get_term_by( '', $cate, 'category' );
				$cats[$cat->description] = $cat;
			}
			ksort($cats);
			foreach ($cats as $cat){
				$slug = $cat->slug;
				query_posts('cat=' . $cat->term_id . '&orderby=post_date&order=asc&showposts=10');
				$data = array();
				$k=0;
				$catshow = 0;
				$cathrefflag = 0;
				while (have_posts()) : the_post();
					$data[$k]['pid'] = get_the_ID();
					$data[$k]['permalink'] = esc_url(apply_filters('the_permalink', get_permalink()));
					$data[$k]['title'] = the_title('','',false);
					if(get_post()->post_name == $slug &&  $cat->name == $data[$k]['title']){
						$catshow=1; $cathrefflag =1;
					}else{
						$catshow = 0;
					}
					$data[$k]['catshow'] = $catshow;
					$k++;
				endwhile; 
				wp_reset_query();
				$cathref = "/service/$slug";
				if($cathrefflag) $cathref = "/service/$slug/$slug";
		?>
    	<dt id="cat_<?php echo $cat->term_id; ?>"><a href="<?php echo $cathref ?>" <?php if($current_cat_id == $cat->term_id){ echo 'class="hover"';} ?>><?php echo $cat->name ?></a></dt>
        <dd class="tsdd <?php if($current_cat_id == $cat->term_id){ echo 'show';} ?>" id="cat_dd_<?php echo $cat->term_id; ?>">
        	<?php 
        	foreach ($data as $d){
				if($d['catshow']) continue;
        	?>
            <a href="<?php echo $d['permalink']; ?>" title="<?php echo $d['title'] ?>" <?php if($d['pid']==$post_id){echo 'class="hover"';}?>><?php echo $d['title'] ?></a>
         	<?php } ?>
         </dd>
         <?php 
         }
         ?>
      </dl>
      <?php $reserve_tel = get_page(64); echo $reserve_tel->post_content; ?>
</div>
