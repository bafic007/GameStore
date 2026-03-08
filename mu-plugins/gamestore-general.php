<?php
/**
* Plugin Name: Gamestore General
* Description: Core Code for Gamestore
* Version: 1.0
* Author: bafic007
* Author URI: http://lahoyda.pp.ua
* License: GPL2
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

function gamestore_remove_dashboard_widgets(){
    global $wp_meta_boxes;

    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
    unset($wp_meta_boxes['dashboard']['normal']['high']['rank_math_dashboard_widget']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_site_health']);
}
add_action('wp_dashboard_setup', 'gamestore_remove_dashboard_widgets');

// Allow SVG uploads
function gamestore_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'gamestore_mime_types');

// Fix SVG display in media library
function gamestore_fix_svg() {
  echo '<style>
      .attachment-266x266, .thumbnail img {
          width: 100% !important;
          height: auto !important;
      }
  </style>';
}
add_action('admin_head', 'gamestore_fix_svg');

// Register Custom Post Type "News"
function gamestore_register_news_post_type() {
    $labels = array(
        'name'                  => _x('News', 'Post Type General Name', 'text_domain'),
        'singular_name'         => _x('News', 'Post Type Singular Name', 'text_domain'),
        'menu_name'             => __('News', 'text_domain'),
        'name_admin_bar'        => __('News', 'text_domain'),
        'archives'              => __('News Archives', 'text_domain'),
        'attributes'            => __('News Attributes', 'text_domain'),
        'parent_item_colon'     => __('Parent News:', 'text_domain'),
        'all_items'             => __('All News', 'text_domain'),
        'add_new_item'          => __('Add New News', 'text_domain'),
        'add_new'               => __('Add New', 'text_domain'),
        'new_item'              => __('New News', 'text_domain'),
        'edit_item'             => __('Edit News', 'text_domain'),
        'update_item'           => __('Update News', 'text_domain'),
        'view_item'             => __('View News', 'text_domain'),
        'view_items'            => __('View News', 'text_domain'),
        'search_items'          => __('Search News', 'text_domain'),
        'not_found'             => __('Not found', 'text_domain'),
        'not_found_in_trash'    => __('Not found in Trash', 'text_domain'),
        'featured_image'        => __('Featured Image', 'text_domain'),
        'set_featured_image'    => __('Set featured image', 'text_domain'),
        'remove_featured_image' => __('Remove featured image', 'text_domain'),
        'use_featured_image'    => __('Use as featured image', 'text_domain'),
        'insert_into_item'      => __('Insert into news', 'text_domain'),
        'uploaded_to_this_item' => __('Uploaded to this news', 'text_domain'),
        'items_list'            => __('News list', 'text_domain'),
        'items_list_navigation' => __('News list navigation', 'text_domain'),
        'filter_items_list'     => __('Filter news list', 'text_domain'),
    );
    $args = array(
        'label'                 => __('News', 'text_domain'),
        'description'           => __('News Description', 'text_domain'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields'),
        'taxonomies'            => array('news_category'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_rest'          => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );
    register_post_type('news', $args);
}
add_action('init', 'gamestore_register_news_post_type', 0);