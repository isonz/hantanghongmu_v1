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
<div class="title">关于瀚唐</div>
<div class="cont">
瀚唐红木家具有限公司，坐落于“中国红木之乡”的广东江门大泽镇，是一家集“设计”、“生产”、“研发”为一体的大型专业红木家具生产企业（红木家具厂）。公司实力雄厚，产房面积达1万多平米，拥有能工巧匠200余名。<br>
生产设备全部采用国内一线品牌，并花巨资引进先进的木材烘干设备及国内领先的整套油漆房。硬件设施已处国内领先水平。<br>
公司结合了中国丰厚的人文底蕴和精湛的红木制造工艺以及现代化的管理制度，产品严格按照国家行业标准质量生产，精益求精，并郑重承诺公司产品木料全部采用进口的高档纯正红木。公司产品远销全球各地，以优良的品质，新颖的款式，合理的价格深得广大新老客户的喜爱。<br>
瀚唐本着“以品质说话　以诚信经营”的企业宗旨，传承中国文化元素，并融合了现代家具风格，不断创新进取，立志打造成国内红木家具行业的一流的品牌。
</div>
</div>



</div>
<!--center area end-->
<?php get_footer(); ?>