<?php
 /**
  * Title: Main Header
  * Slug: garden-plant-shop/main-header
  */
?>

<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"className":"lower-header "} -->
<div class="wp-block-columns are-vertically-aligned-center lower-header" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--30)"><!-- wp:column {"verticalAlignment":"center","width":"20%","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"className":"header-logo"} -->
<div class="wp-block-column is-vertically-aligned-center header-logo" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:20%"><!-- wp:site-title {"style":{"typography":{"textTransform":"capitalize"}},"textColor":"heading","className":"header-logo"} /--></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"65%","className":"header-nav"} -->
<div class="wp-block-column is-vertically-aligned-center header-nav" style="flex-basis:65%"><!-- wp:navigation {"overlayBackgroundColor":"background","overlayTextColor":"foreground","layout":{"type":"flex","justifyContent":"center"}} -->
<!-- wp:navigation-link {"label":"Home","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"About Us","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Plants","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Pages","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Blogs","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Contact Us","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->
<!-- /wp:navigation --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"15%","className":"header-info"} -->
<div class="wp-block-column is-vertically-aligned-center header-info" style="flex-basis:15%"><!-- wp:buttons {"layout":{"type":"flex","justifyContent":"right"}} -->
<div class="wp-block-buttons"><!-- wp:button {"style":{"border":{"radius":"10px"}}} -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" style="border-radius:10px"><?php esc_html_e('Sign In','garden-plant-shop'); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->