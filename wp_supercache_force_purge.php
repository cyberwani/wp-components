<?php
add_action( 'acf_save_post', 've_clear_cache' );
add_action( 'save_post', 've_clear_cache' );
add_action( 'delete_post', 've_clear_cache' );
add_action( 'create_category', 've_clear_cache' );
add_action( 'edit_category', 've_clear_cache' );
add_action( 'delete_category', 've_clear_cache' );
add_filter( 'widget_update_callback', 've_clear_cache' );

function ve_clear_cache($arg) {
    global $blog_cache_dir;
    if( function_exists( "prune_super_cache" ) ) {
        prune_super_cache( $blog_cache_dir, true );
    }
    return $arg;
}
