<?php
/*
Template Name:视频
*/

//header("Location: /video/culture/");

get_header();

$post_id = get_the_ID();
$post = get_post($post_id);
    		
$title = $post->post_title;
$where = "name = '$title'";   //根据栏目标题匹配分类

$videoCat = PtpVideoDB::getCategoryRow($where);
$cat_id = $videoCat['id'];
$where = "category_id = '$cat_id'";
$videos = PtpVideoDB::getVideoRows($where);

?>

<div class="centerdiv home_bg">
	<div class="center_topimg">
    	<p class="top_img_draw"></p>
    </div>
    
    <div class="center_div">
    	<div class="p2">
        	<div class="p2-1 clearfix">
        		<?php get_sidebar('video-sidebar'); ?>
        		
                <div class="company_info">
                	<div class="infotitle">
                    	<div class="tlt">
                        	<div class="tlt1">
                            	<div class="tlt2"><?php echo $title ?></div>
                            </div>
                        </div>
                    </div>
					<!--  main content -->
					<div class="list_2 clearfix">
                    	<ol class="clearfix" id="phone_v">
                    	<?php foreach ($videos as $video ){?>
                        	<li>
                            	<div class="video_bg">
                            		<a href="javascript:;" data="<?php echo $video['href'] ?>">
                            			<img src="<?php echo $video['pic'] ?>" width="290" height="155">
                            		</a>
                            		<a href="javascript:;" class="video_play" data="<?php echo $video['href'] ?>"></a>
                            	</div>
                                <div class="video_font"><a href="javascript:;" data="<?php echo $video['href'] ?>"><?php echo $video['title'] ?></a></div>
                            </li>
                        <?php } ?>
                        </ol>
                    </div>
					<!-- end main content -->
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