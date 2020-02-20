<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
wp_enqueue_style( 'child-theme-css', get_stylesheet_directory_uri() .'/style.css' , array('parent-style'));
}

add_action( 'pre_get_posts', 'my_home_category' );
function my_home_category( $query ) 
{	
    if ( $query->is_home()  && $query->query_vars['orderby'] == 'menu_order') 
	{
		$query->set( 'cat', '');
	}
	else if ( $query->is_home() ) 
	{
		$category_id = get_cat_ID('Blog');
		$query->set( 'cat', $category_id);
	}
}

?>