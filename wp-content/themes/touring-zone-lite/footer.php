<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Touring Zone Lite
 */
?>

<div class="footer-copyright">
        	<div class="container">
            	<div class="copyright-txt">
					<?php bloginfo('name'); ?>. <?php esc_html_e('All Rights Reserved', 'touring-zone-lite');?>           
                </div>
                <div class="design-by">
				 <?php esc_html_e('Theme by Grace Themes','touring-zone-lite'); ?>               
                </div>
                 <div class="clear"></div>
            </div>           
        </div>        
</div><!--#end site-holder-->

<?php wp_footer(); ?>
</body>
</html>