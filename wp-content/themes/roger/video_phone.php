
<div class="center_alldiv">
<div class="center_divpotion"></div>

<?php  while ( have_posts() ) : the_post(); ?>
	<?php  get_template_part( 'content', 'page' ); ?>
<?php endwhile; // end of the loop. ?>
</div>
