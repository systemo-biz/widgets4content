<?php
/*
Plugin Name: Widgets area (sidebars) for content (after and before)
Plugin URI: https://github.com/systemo-biz/widgets4content
Description: Widgets area for content
Version: 20150526
License: GPL
Author: Systemo
Author URI: http://systemo.biz
GitHub Plugin URI: https://github.com/systemo-biz/widgets4content
GitHub Branch: master
*/

register_sidebar(array(
	'name' => __('After content'),
	'id' => 'content-after-widgets-s',
	'description' => __('После содержания'),
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '<h3><a href="#">',
	'after_title' => '</a></h3>',
));
register_sidebar(array(
	'name' => __('Before content'),
	'id' => 'content-before-widgets-s',
	'description' => __('Перед содержимым'),
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '<h3><a href="#">',
	'after_title' => '</a></h3>',
));


function wrapper_post_for_widges($content){
	ob_start();
	
		?>
		<div class="entry_wrapper_widgets_s">
		<div class="widgets_content_before">
		    <?php  
		        dynamic_sidebar( 'content-before-widgets-s' );
		    ?>
		</div>
		<div class="content_wrapper_for_widgets">
		    <?php echo $content; ?>
		</div>
		<div class="widgets_content_after">
		    <?php dynamic_sidebar( 'content-after-widgets-s' ); ?>
		</div>
		</div>
		<?php
	
	$html = ob_get_contents();
	ob_get_clean();
	
	return $html;
}
add_filter('the_excerpt', 'wrapper_post_for_widges');
add_filter('the_content', 'wrapper_post_for_widges');
