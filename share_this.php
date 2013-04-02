<?php
add_action("wp_head", "share_this_scripts");
function share_this_scripts() {
  if(is_single()) {
    global $post;
    echo '
    <script type="text/javascript">var switchTo5x=true;</script>
    <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
    <script type="text/javascript">stLight.options({publisher: "f7c487f2-93af-4aed-b1e5-a3bdd9d3b65a", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
    ';
  }
}
function share_this() {
  echo "
  <p class='share-bar'>
    <span class='st_facebook_hcount' displayText='Facebook'></span>
    <!-- <span class='st_linkedin_hcount' displayText='LinkedIn'></span> -->
    <span class='st_pinterest_hcount' displayText='Pinterest'></span>
    <span class='st_sharethis_hcount' displayText='ShareThis'></span>
    <span class='st_twitter_hcount' displayText='Tweet'></span>
  </p>
  ";
}
