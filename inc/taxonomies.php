<?php

function cptui_register_my_taxes()
{

    /**
     * Taxonomy: Products.
     */

    $labels = [
        "name" => __("Products", "wpe-roadmap"),
        "singular_name" => __("Product", "wpe-roadmap"),
        "menu_name" => __("Products", "wpe-roadmap"),
        "all_items" => __("All Products", "wpe-roadmap"),
        "edit_item" => __("Edit Product", "wpe-roadmap"),
        "view_item" => __("View Product", "wpe-roadmap"),
        "update_item" => __("Update Product name", "wpe-roadmap"),
        "add_new_item" => __("Add new Product", "wpe-roadmap"),
        "new_item_name" => __("New Product name", "wpe-roadmap"),
        "parent_item" => __("Parent Product", "wpe-roadmap"),
        "parent_item_colon" => __("Parent Product:", "wpe-roadmap"),
        "search_items" => __("Search Products", "wpe-roadmap"),
        "popular_items" => __("Popular Products", "wpe-roadmap"),
        "separate_items_with_commas" => __("Separate Products with commas", "wpe-roadmap"),
        "add_or_remove_items" => __("Add or remove Products", "wpe-roadmap"),
        "choose_from_most_used" => __("Choose from the most used Products", "wpe-roadmap"),
        "not_found" => __("No Products found", "wpe-roadmap"),
        "no_terms" => __("No Products", "wpe-roadmap"),
        "items_list_navigation" => __("Products list navigation", "wpe-roadmap"),
        "items_list" => __("Products list", "wpe-roadmap"),
        "back_to_items" => __("Back to Products", "wpe-roadmap"),
        "name_field_description" => __("The name is how it appears on your site.", "wpe-roadmap"),
        "parent_field_description" => __("Assign a parent term to create a hierarchy. The term Jazz, for example, would be the parent of Bebop and Big Band.", "wpe-roadmap"),
        "slug_field_description" => __("The slug is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.", "wpe-roadmap"),
        "desc_field_description" => __("The description is not prominent by default; however, some themes may show it.", "wpe-roadmap"),
    ];


    $args = [
        "label" => __("Products", "wpe-roadmap"),
        "labels" => $labels,
        "public" => true,
        "publicly_queryable" => true,
        "hierarchical" => false,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => ['slug' => 'product', 'with_front' => true,],
        "show_admin_column" => false,
        "show_in_rest" => true,
        "show_tagcloud" => false,
        "rest_base" => "product",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "rest_namespace" => "wp/v2",
        "show_in_quick_edit" => false,
        "sort" => false,
        "show_in_graphql" => true,
        "graphql_single_name" => "Product",
        "graphql_plural_name" => "Products",
    ];
    register_taxonomy("product", ["release"], $args);

    /**
     * Taxonomy: Statuses.
     */

    $labels = [
        "name" => __("Statuses", "wpe-roadmap"),
        "singular_name" => __("Status", "wpe-roadmap"),
        "menu_name" => __("Statuses", "wpe-roadmap"),
        "all_items" => __("All Statuses", "wpe-roadmap"),
        "edit_item" => __("Edit Status", "wpe-roadmap"),
        "view_item" => __("View Status", "wpe-roadmap"),
        "update_item" => __("Update Status name", "wpe-roadmap"),
        "add_new_item" => __("Add new Status", "wpe-roadmap"),
        "new_item_name" => __("New Status name", "wpe-roadmap"),
        "parent_item" => __("Parent Status", "wpe-roadmap"),
        "parent_item_colon" => __("Parent Status:", "wpe-roadmap"),
        "search_items" => __("Search Statuses", "wpe-roadmap"),
        "popular_items" => __("Popular Statuses", "wpe-roadmap"),
        "separate_items_with_commas" => __("Separate Statuses with commas", "wpe-roadmap"),
        "add_or_remove_items" => __("Add or remove Statuses", "wpe-roadmap"),
        "choose_from_most_used" => __("Choose from the most used Statuses", "wpe-roadmap"),
        "not_found" => __("No Statuses found", "wpe-roadmap"),
        "no_terms" => __("No Statuses", "wpe-roadmap"),
        "items_list_navigation" => __("Statuses list navigation", "wpe-roadmap"),
        "items_list" => __("Statuses list", "wpe-roadmap"),
        "back_to_items" => __("Back to Statuses", "wpe-roadmap"),
        "name_field_description" => __("The name is how it appears on your site.", "wpe-roadmap"),
        "parent_field_description" => __("Assign a parent term to create a hierarchy. The term Jazz, for example, would be the parent of Bebop and Big Band.", "wpe-roadmap"),
        "slug_field_description" => __("The slug is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.", "wpe-roadmap"),
        "desc_field_description" => __("The description is not prominent by default; however, some themes may show it.", "wpe-roadmap"),
    ];


    $args = [
        "label" => __("Statuses", "wpe-roadmap"),
        "labels" => $labels,
        "public" => true,
        "publicly_queryable" => true,
        "hierarchical" => false,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => ['slug' => 'release_status', 'with_front' => true,],
        "show_admin_column" => false,
        "show_in_rest" => true,
        "show_tagcloud" => false,
        "rest_base" => "release_status",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "rest_namespace" => "wp/v2",
        "show_in_quick_edit" => false,
        "sort" => false,
        "show_in_graphql" => true,
        "graphql_single_name" => "Status",
        "graphql_plural_name" => "Statuses",
    ];
    register_taxonomy("release_status", ["release"], $args);
}
add_action('init', 'cptui_register_my_taxes');
