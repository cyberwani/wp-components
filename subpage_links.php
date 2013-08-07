<?php
/**
 * A must use widget function.
 * Useful for showing on every page that has child sub pages
 * -------- */
function subpage_links() {
    global $post;

    $li = '';
    $is_page = (
           'page' == get_post_type()
    );

    // bail.
    if(!$is_page)
        return false;

    $parent = get_top_parent($post);

    $children = get_posts(array(
        'post_type' => 'page',
        'posts_per_page' => -1,
        'orderby' => 'menu_order',
        'order' => 'ASC',
        'post_parent' => $parent->ID
    ));

    foreach (array_merge($children) as $child) {
        $class = (
                $post->ID == $child->ID
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
