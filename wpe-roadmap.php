<?php

/**
 * Plugin Name: WPE Roadmap
 * Author Name: Jordan Maslyn
 * Description: A suite of customizations for the WordPress install powering the WPE Roadmap application.
 * Text Domain: wpe-roadmap
 */

if (file_exists(__DIR__ . '/inc/post-types.php')) {
    require_once __DIR__ . '/inc/post-types.php';
}


if (file_exists(__DIR__ . '/inc/taxonomies.php')) {
    require_once __DIR__ . '/inc/taxonomies.php';
}

if (file_exists(__DIR__ . '/inc/graphql.php')) {
    require_once __DIR__ . '/inc/graphql.php';
}

if (file_exists(__DIR__ . '/inc/class.taxonomy-single-term.php')) {
    require_once __DIR__ . '/inc/class.taxonomy-single-term.php';
    $custom_tax_mb = new Taxonomy_Single_Term('product');
    $custom_tax_mb = new Taxonomy_Single_Term('release_status');
}

add_action(
    'admin_menu',
    function () {
        remove_menu_page('upload.php');
        remove_menu_page('edit.php');
        remove_menu_page('edit-comments.php');
        remove_menu_page('tools.php');
    }
);


add_filter('use_block_editor_for_post_type', 'wpe_disable_gutenberg', 10, 2);
function wpe_disable_gutenberg($current_status, $post_type)
{
    // Use your post type key instead of 'product'
    if ($post_type === 'release') return false;
    return $current_status;
}

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title'     => 'Site Settings',
        'menu_title'    => 'Site Settings',
        'menu_slug'     => 'site-general-settings',
        'capability'    => 'edit_posts',
        'redirect'        => false,
        'show_in_graphql' => true,
    ));
}
