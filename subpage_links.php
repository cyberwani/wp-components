<?php
/**
 * A must use widget function.
 * Useful for showing on every page that has child sub pages
 * -------- */
function subpage_links() {
    global $post;

    $li = '';
    $is_news = 'post' == get_post_type();
    $news_page = get_news_page();
    $is_page = (
           'page' == get_post_type()
        || 'flavor' == get_post_type()
        || $is_news
    );
    $soda_page = get_find_soda_page();
    $flavors = array();

    // bail.
    if(!$is_page)
        return false;

    $parent = get_top_parent($post);

    if($is_news) {
        $parent = get_top_parent($news_page);
    }

    /**
     * Add the floavor pages to the sidebar
     * ------- */
    if(
           'flavor' == get_post_type()
        || $parent->ID == $soda_page->ID
        ) {
        $parent = get_top_parent(get_find_soda_page());
        $flavors = get_posts( array( 
            'posts_per_page' => -1,
            'post_type' => 'flavor',
            'orderby' => 'menu_order',
            ));
    }

    $children = get_posts(array(
        'post_type' => 'page',
        'posts_per_page' => -1,
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'post_parent' => $parent->ID
    ));

    foreach (array_merge($flavors, $children) as $child) {
        $class = (
                    (
                    // Highlight the "Blog" item on a single page
                            $is_news
                        && $news_page->ID == $child->ID
                    )
                || $post->ID == $child->ID
                ) ? 'current-menu-item' : '';


        $li .= sprintf('
            <li class="%s"><a href="%s">%s</a></li>
        '
        , $class
        , get_permalink($child->ID)
        , $child->post_title
        );
    }

    printf('
    <li class="widget widget_nav_menu">
        <h2 class="widgettitle">%s</h2>
        <ul class="menu">
            %s
        </ul>
    </li>
    '
    , $parent->post_title
    , $li
    );
}

function get_top_parent($tmp) {
    // $tmp is the post object
    $i = 0;
    do {
        $link = false;

        // If it is not the first page.
        if( $i != 0 )
            $tmp = get_post( $tmp->post_parent );

        $i++;
    } while( $tmp->post_parent );

    return $tmp;
}
