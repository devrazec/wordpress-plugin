<?php
 /**
  * Title: Blog Section
  * Slug: garden-plant-shop/blog-section
  */
?>

<!-- wp:group {"align":"full","className":"wp-block-section blog-sec","style":{"spacing":{"padding":{"top":"0"}}},"layout":{"inherit":true,"type":"constrained","contentSize":"80%"}} -->
<div class="wp-block-group alignfull wp-block-section blog-sec" style="padding-top:0"><!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"letterSpacing":"0px","fontSize":"22px"}},"textColor":"primary"} -->
<h3 class="wp-block-heading has-text-align-center has-primary-color has-text-color" style="font-size:22px;letter-spacing:0px"><strong><?php esc_html_e('Our Blog','garden-plant-shop'); ?></strong></h3>
<!-- /wp:heading -->

<!-- wp:heading {"textAlign":"center","level":3,"textColor":"heading","fontSize":"post-title"} -->
<h3 class="wp-block-heading has-text-align-center has-heading-color has-text-color has-post-title-font-size"><strong><?php esc_html_e('Stay Updated With Our Latest Blog','garden-plant-shop'); ?></strong></h3>
<!-- /wp:heading -->

<!-- wp:query {"queryId":2,"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true,"taxQuery":null,"parents":[],"format":[]}} -->
<div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
<!-- wp:group {"className":"homeblog-upper","layout":{"type":"default"}} -->
<div class="wp-block-group homeblog-upper"><!-- wp:cover {"useFeaturedImage":true,"dimRatio":10,"overlayColor":"heading","isUserOverlayColor":true,"minHeight":350,"isDark":false,"style":{"border":{"radius":"20px"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"default"}} -->
<div class="wp-block-cover is-light" style="border-radius:20px;margin-top:0;margin-bottom:0;min-height:350px"><span aria-hidden="true" class="wp-block-cover__background has-heading-background-color has-background-dim-10 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
<p class="has-text-align-center has-large-font-size"></p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"className":"homeblog-box","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"blockGap":"0","margin":{"top":"0","bottom":"0"}},"border":{"radius":"20px"}},"backgroundColor":"background","layout":{"type":"default"}} -->
<div class="wp-block-group homeblog-box has-background-background-color has-background" style="border-radius:20px;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:post-title {"style":{"typography":{"fontSize":"22px","fontStyle":"normal","fontWeight":"600"}}} /-->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"0"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--20);margin-bottom:0"><!-- wp:post-author-name {"style":{"typography":{"fontSize":"16px","textTransform":"capitalize","fontStyle":"normal","fontWeight":"600"}}} /-->

<!-- wp:post-date {"style":{"typography":{"fontSize":"16px","textTransform":"capitalize","fontStyle":"normal","fontWeight":"600"}}} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:post-template --></div>
<!-- /wp:query --></div>
<!-- /wp:group -->