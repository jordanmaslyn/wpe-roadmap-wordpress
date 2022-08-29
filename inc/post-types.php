<?php

function cptui_register_my_cpts_release()
{

    /**
     * Post Type: Releases.
     */

    $labels = [
        "name" => __("Releases", "wpe-roadmap"),
        "singular_name" => __("Release", "wpe-roadmap"),
        "menu_name" => __("Releases", "wpe-roadmap"),
        "all_items" => __("All Releases", "wpe-roadmap"),
        "add_new" => __("Add new", "wpe-roadmap"),
        "add_new_item" => __("Add new Release", "wpe-roadmap"),
        "edit_item" => __("Edit Release", "wpe-roadmap"),
        "new_item" => __("New Release", "wpe-roadmap"),
        "view_item" => __("View Release", "wpe-roadmap"),
        "view_items" => __("View Releases", "wpe-roadmap"),
        "search_items" => __("Search Releases", "wpe-roadmap"),
        "not_found" => __("No Releases found", "wpe-roadmap"),
        "not_found_in_trash" => __("No Releases found in trash", "wpe-roadmap"),
        "parent" => __("Parent Release:", "wpe-roadmap"),
        "featured_image" => __("Featured image for this Release", "wpe-roadmap"),
        "set_featured_image" => __("Set featured image for this Release", "wpe-roadmap"),
        "remove_featured_image" => __("Remove featured image for this Release", "wpe-roadmap"),
        "use_featured_image" => __("Use as featured image for this Release", "wpe-roadmap"),
        "archives" => __("Release archives", "wpe-roadmap"),
        "insert_into_item" => __("Insert into Release", "wpe-roadmap"),
        "uploaded_to_this_item" => __("Upload to this Release", "wpe-roadmap"),
        "filter_items_list" => __("Filter Releases list", "wpe-roadmap"),
        "items_list_navigation" => __("Releases list navigation", "wpe-roadmap"),
        "items_list" => __("Releases list", "wpe-roadmap"),
        "attributes" => __("Releases attributes", "wpe-roadmap"),
        "name_admin_bar" => __("Release", "wpe-roadmap"),
        "item_published" => __("Release published", "wpe-roadmap"),
        "item_published_privately" => __("Release published privately.", "wpe-roadmap"),
        "item_reverted_to_draft" => __("Release reverted to draft.", "wpe-roadmap"),
        "item_scheduled" => __("Release scheduled", "wpe-roadmap"),
        "item_updated" => __("Release updated.", "wpe-roadmap"),
        "parent_item_colon" => __("Parent Release:", "wpe-roadmap"),
    ];

    $args = [
        "label" => __("Releases", "wpe-roadmap"),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "rest_namespace" => "wp/v2",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "can_export" => true,
        "rewrite" => ["slug" => "release", "with_front" => true],
        "query_var" => true,
        "supports" => ["title", "editor", "thumbnail", "page-attributes"],
        "show_in_graphql" => true,
        "graphql_single_name" => "Release",
        "graphql_plural_name" => "Releases",
        "menu_icon" => "dashicons-calendar-alt"
    ];

    register_post_type("release", $args);
}

add_action('init', 'cptui_register_my_cpts_release');
