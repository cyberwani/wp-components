<?php

/**
 * Check to see if a parent page is empty.
 * If it is empty, then check to see if it has
 * a child page that is not empty.
 * If it does, then redirect to the child page.
 * ----------- */

function breadcrumb() {
    global $post;
    $is_post = 'post' == get_post_type();
    $is_flavor = 'flavor' == get_post_type();
    $crumbs = array();
    $trail = '';
    $divider = '<span class="divider">&raquo;</span>';
    $custom = false;

    /**
     * Handle all special cases.
     * Includes all custom post types, 
     * archive, search pages, ect. 
     * ----- */
    if($is_flavor) {
        $custom = get_find_soda_page();
    }

    // all blog pages
    if($is_post) 
        $custom = get_news_page('object'); // custom function that fetchs the news template page

    if(is_archive() || is_category() ) {
        //$custom = get_news_page('object'); // custom function that fetchs the news template page
        $tmp = get_news_page('object'); 
        array_push($crumbs, array($tmp->post_title, get_permalink($tmp->ID)));
        array_push($crumbs, array(is_category() ? "Categories" : "Archives", false));
    }
 
    
    if($custom) {
        array_push($crumbs, array($custom->post_title, get_permalink($custom->ID)));
        array_push($crumbs, array($post->post_title, false));
    }

    // search page
    if(is_search())
        array_push($crumbs, array('Search results', false));

    /**
     * Handles all pages.
     * Follow all the child pages and append them
     * to the breadcrumb
     * --------- */
    if(is_page()) {
        // Loop through all the pages.
        $tmp = $post ;

        $i = 0;
        do {
            $link = false;

            // If it is not the first page.
            if( $i != 0 )
                $tmp = get_post( $tmp->post_parent );

            // All the other pages.
            if($i !== 0)
                $link = get_permalink($tmp->ID);

            array_unshift($crumbs, array($tmp->post_title, $link));
            $i++;
        } while( $tmp->post_parent );
    }

    // Prepend the home page to all the bread crumbs
    array_unshift($crumbs, array('Home', get_bloginfo('url')));

    foreach ($crumbs as $crumb) {
        if($crumb[1]) {
            $trails .= sprintf('
                <a href="%s">%s</a> %s
            '
            , $crumb[1]
            , $crumb[0]
            , $divider
            );
        } else {
            $trails .= sprintf('
                <span>%s</span>
            '
            , $crumb[0]
            );
        }
    }

    printf(' <div class="breadcrumb"> %s </div> ' , $trails);

}
