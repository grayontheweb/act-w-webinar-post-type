<?php
/**
 * Plugin Name: ACT-W Webinar Post Type
 * Plugin URI: https://act-w.org
 * Description: Adds the Webinar post type for the ACT-W site.
 * Version: 1.0
 * Author: Gray Sutherland
 * Author URI: https://www.graysutherland.com
 */

function actw_webinar_post_type() {
	$labels = array(
		'name'                  => 'Webinars',
		'singular_name'         => 'Webinar',
		'menu_name'             => 'Webinars',
		'name_admin_bar'        => 'Webinar',
		'archives'              => 'Past Webinars',
		'attributes'            => 'Webinar Attributes',
		'parent_item_colon'     => 'Webinar Parent',
		'all_items'             => 'All Webinars',
		'add_new_item'          => 'Add New Webinar',
		'add_new'               => 'Add Webinar',
		'new_item'              => 'New Webinar',
		'edit_item'             => 'Edit Webinar',
		'update_item'           => 'Update Webinar',
		'view_item'             => 'View Webinar',
		'view_items'            => 'View Webinars',
		'search_items'          => 'Search Webinars',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into webinar',
		'uploaded_to_this_item' => 'Uploaded to this webinar',
		'items_list'            => 'Webinar list',
		'items_list_navigation' => 'Webinar list navigation',
		'filter_items_list'     => 'Filter webinar list',
	);
	
    $rewrite = array(
		'slug'                  => '/webinar',
		'with_front'            => true,
	);

	$args = array(
		'label'                 => 'Webinar',
		'description'           => 'A Webinar.',
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'			=> array('webinar_category', 'webinar_tag'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'webinars',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);

	register_post_type( 'actw_webinar', $args );
	
	flush_rewrite_rules();
}

add_action( 'init', 'actw_webinar_post_type', 0 );
// Register Custom Taxonomy
function actw_webinar_category() {

	$labels = array(
		'name'                       => _x( 'Webinar Categories', 'Taxonomy General Name', 'actw_webinar_category' ),
		'singular_name'              => _x( 'Webinar Category', 'Taxonomy Singular Name', 'actw_webinar_category' ),
		'menu_name'                  => __( 'Categories', 'actw_webinar_category' ),
		'all_items'                  => __( 'All Categories', 'actw_webinar_category' ),
		'parent_item'                => __( 'Parent Category', 'actw_webinar_category' ),
		'parent_item_colon'          => __( 'Parent Category:', 'actw_webinar_category' ),
		'new_item_name'              => __( 'New Category Name', 'actw_webinar_category' ),
		'add_new_item'               => __( 'Add New Category', 'actw_webinar_category' ),
		'edit_item'                  => __( 'Edit Category', 'actw_webinar_category' ),
		'update_item'                => __( 'Update Item', 'actw_webinar_category' ),
		'view_item'                  => __( 'View Item', 'actw_webinar_category' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'actw_webinar_category' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'actw_webinar_category' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'actw_webinar_category' ),
		'popular_items'              => __( 'Popular Items', 'actw_webinar_category' ),
		'search_items'               => __( 'Search Items', 'actw_webinar_category' ),
		'not_found'                  => __( 'Not Found', 'actw_webinar_category' ),
		'no_terms'                   => __( 'No items', 'actw_webinar_category' ),
		'items_list'                 => __( 'Items list', 'actw_webinar_category' ),
		'items_list_navigation'      => __( 'Items list navigation', 'actw_webinar_category' ),
	);

	$rewrite = array(
		'slug'                       => 'webinars',
		'with_front'                 => true,
		'hierarchical'               => false,
	);

	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	
	register_taxonomy( 'webinar_category', array( 'actw_webinar' ), $args );

	flush_rewrite_rules();
}

add_action( 'init', 'actw_webinar_category', 0 );

?>
