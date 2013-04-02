<?php 
    
add_action("wp_head", "facebook_og_tags");

function facebook_og_tags() {
    global $post;
    printf('
      <meta property="og:title" content="%s?"/>
      <meta property="og:type" content="article"/>
      <meta property="og:url" content="%s"/>
      <meta property="og:image" content="%s"/>
      <meta property="og:site_name" content="%s"/>
      <meta property="og:description" content="%s"/>

    '
    , $post->post_title
    , get_permalink($post->ID)
    , ve_image_src($post->ID)
    , get_bloginfo("name")
    , ve_limit_words($post->post_content, 50, ' ...')
    );

}
