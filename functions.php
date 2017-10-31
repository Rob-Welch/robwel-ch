<?php

# Register ye olde nav menu
function register_my_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );

# Add 'active' class to menu items
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}

# Wordpress should let you add a CSS class to the pagination buttons by default
# Or better yet, have a query for the pagination URL rather than
# Generating an anchor tag for some reason

add_filter('next_posts_link_attributes', 'posts_link_attributes_1');
add_filter('previous_posts_link_attributes', 'posts_link_attributes_2');

function posts_link_attributes_1() {
    return 'class="button button-primary fancy-button pagination-older"';
}
function posts_link_attributes_2() {
    return 'class="button button-primary fancy-button pagination-newer"';
}

# Gripple the body id (theme) for the current page
# This is a meticulous collection of fallbacks for all the strange ways that this ID manifests itself

function gripple_body_id() {

	if( get_field('page_theme') ){
		echo the_field('page_theme');
	}
	else{
	    $tag = get_queried_object();
	    if ($tag->slug == ""){
	      $tag_slug = $wp_query->query_vars['tag'];
	      if ($tag_slug ==""){
	        echo "home";
	      }
	      else{
	        echo $tag_slug;
	      }
	    }
	    else{
	    echo $tag->slug;
	    }

	}
}

function grapple_body_id() {

	$tag_attempt_1 = get_queried_object()->slug;
	$tag_attempt_2 = $wp_query->query_vars['tag'];
	$tag_attempt_3 = the_field('page_theme');
	if ($tag_attempt_1 != ""){
		echo $tag_attempt_1;
	}
	elseif ($tag_attempt_2 != ""){
		echo $tag_attempt_2;
	}
	elseif ($tag_attempt_3 != ""){
		echo $tag_attempt_3;
	}
	else{
		echo "home";
	}
}

// Stop wordpress from messing with image width\height attributes (credit: chris coiyer)

add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}

// Add a class to the image container divs wordpress inserts (note to autoattic: giving each one a unique ID is profoundly unhelpful for styling the page)

function image_tag_class($class) {
    $class .= 'captioned-image';
    return $class;
}
add_filter('get_image_tag_class', 'image_tag_class' );

?>
