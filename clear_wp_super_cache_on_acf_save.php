<?php
add_action( 'acf_save_post', 've_clear_cache' );

function ve_clear_cache() {
    global $blog_cache_dir;
    prune_super_cache( $blog_cache_dir, true );
}
