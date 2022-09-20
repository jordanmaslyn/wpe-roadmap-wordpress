<?php

// inspired by https://gist.github.com/jasonbahl/da87dbccb58f1323a324a9b3e8952d6c

add_filter('graphql_PostObjectsConnectionOrderbyEnum_values', function ($values) {
    $values['RELEASE_STATUS'] = [
        'value' => 'release_status_order',
        'description' => __('The order value of the release status taxonomy term applied', 'wp-graphql'),
    ];

    return $values;
});

add_filter('graphql_post_object_connection_query_args', function ($query_args, $source, $input) {

    if (isset($input['where']['orderby']) && is_array($input['where']['orderby'])) {

        foreach ($input['where']['orderby'] as $orderby) {

            if (!isset($orderby['field']) || 'release_status_order' !== $orderby['field']) {
                continue;
            }

            $query_args['meta_type'] = 'NUMERIC';
            $query_args['meta_key']  = 'release_status_order';
            $query_args['orderby'] = ['meta_value_num' => $orderby['order']];
        }
    }

    return $query_args;
}, 10, 3);

add_action('wp_insert_post', 'wpe_roadmap_update_release_status_order', 10, 3);

function wpe_roadmap_update_release_status_order($post_id, $post, $update)
{
    if ("release" !== $post->post_type) {
        return;
    }

    // get release_status for post
    $terms = get_the_terms($post_id, 'release_status');

    if (!$terms || is_wp_error($terms) || count($terms) === 0) {
        return;
    }

    $term = $terms[0];
    // get order meta field from term
    $order = get_field('order', $term);

    // save order meta field value to release_status_order
    update_field('release_status_order', $order, $post);
}

add_action('saved_release_status',  'wpe_roadmap_update_release_status_order_from_term', 10, 3);

function wpe_roadmap_update_release_status_order_from_term($term_id, $tt_id, $update)
{
    $matched_posts = get_posts(
        array(
            'post_type' => 'release',
            'numberposts' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'release_status',
                    'field' => 'term_id',
                    'terms' => $term_id, /// Where term_id of Term 1 is "1".
                    'include_children' => false
                )
            )
        )
    );

    $term = get_term($term_id, "release_status");
    $order = get_field('order', $term);

    foreach ($matched_posts as $matched_post) {
        update_field('release_status_order', $order, $matched_post);
    }
}
