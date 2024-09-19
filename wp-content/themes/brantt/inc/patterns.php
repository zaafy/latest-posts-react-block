<?php
function wpdocs_block_pattern_category() {
    register_block_pattern_category('brantt-patterns', array(
        'label' => __('Brantt Patterns', 'brantt')
    ));
}

add_action('init', 'wpdocs_block_pattern_category');

function brantt_register_block_patterns() {
    if (class_exists('WP_Block_Patterns_Registry')) {
        register_block_pattern(
            'brantt/latest-posts',
            array(
                'title'       => __('Brantt Latest Posts', 'brantt'),
                'description' => _x('Show latest posts and order them', 'Block pattern description', 'brantt'),
                'content'     => "<!-- wp:create-block/brantt-latest-posts {\"title\":\"Lorem ipsum dolor sit amit...\",\"overtitle\":\"Latest posts\",\"order\":true,\"urlTitle\":\"View all posts\",\"urlValue\":\"/blog\"} -->\n<section class=\"brantt-latest-posts\"><div class=\"container\"><div class=\"brantt-latest-posts-header\"><p class=\"brantt-latest-posts-overtitle\">Latest posts</p><a class=\"brantt-latest-posts-link\" href=\"/blog\">View all posts</a></div><h2 class=\"brantt-latest-posts-heading\">Lorem ipsum dolor sit amit...</h2><div id=\"post-list-target\" data-order=\"asc\"></div></div></section>\n<!-- /wp:create-block/brantt-latest-posts -->\n\n<!-- wp:paragraph -->\n<p></p>\n<!-- /wp:paragraph -->",
                'categories'  => array('brantt-patterns'),
            )
        );
    }
}

add_action('init', 'brantt_register_block_patterns');
