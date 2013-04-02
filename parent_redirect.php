<?php 
/**
 * Check to see if a parent page is empty.
 * If it is empty, then check to see if it has
 * a child page that is not empty.
 * If it does, then redirect to the child page.
 * ----------- */

add_action("wp", "component_redirect_parent");

function component_redirect_parent() {
    global $post;

    // bail
    if(( is_home()                   
      || $post->post_type != "page"
      || trim($post->post_content)
      || get_post_meta($post->ID, '_wp_page_template', true ) == "pages/soda-sightings.php"
      )) {
        return true;
    }

    $args = array(
        "post_type" => "page",
        "posts_per_page" => 1,
        "orderby" => "menu_order",
        "order" => "ASC",
        "post_parent" => $post->ID
    );


    $children = get_posts($args);

    // The find soda page shows soda flavors on the page
    if(get_post_meta($post->ID, '_wp_page_template', true ) == "pages/find-your-soda.php") {
        $args["post_type"] = "flavor";
        $args["post_parent"] = null;
        $children = get_posts($args);
    }

    if($children[0]) {
        wp_redirect(get_permalink($children[0]->ID), 301);
        exit();
    }
}
