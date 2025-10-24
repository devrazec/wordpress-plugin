<?php
/**
 * Right Buttons Panel.
 *
 * @package landscape_gardening
 */
?>
<div class="panel-right">
	<div class="pro-btn bundle-btn">
		<h3><?php esc_html_e( 'WP Theme Bundle', 'landscape-gardening' ); ?></h3>
		<br>
		<div class="bundle-img">
			<img src="<?php echo esc_url(get_template_directory_uri()) .'/resource/img/bundle.png'; ?>" />
		</div>
		<a class="button button-primary" href="<?php echo esc_url( 'https://asterthemes.com/products/wp-theme-bundle' ); ?>" title="<?php esc_attr_e( 'Go Pro', 'landscape-gardening' ); ?>" target="_blank">
            <?php esc_html_e( 'Exclusive Theme Bundle - $79', 'landscape-gardening' ); ?>
        </a>
	</div>

	<div class="pro-btn">
		<h3><?php esc_html_e( 'Upgrade To Pro', 'landscape-gardening' ); ?></h3>
		<p><?php esc_html_e( 'The Pro version gives you access to more templates, advanced add-ons, different layouts for headers, blogs, and single posts, as well as many other advanced features.', 'landscape-gardening' ); ?></p>
		<a class="button button-primary" href="<?php echo esc_url( 'https://asterthemes.com/products/gardening-wordpress-theme' ); ?>" title="<?php esc_attr_e( 'Go Pro', 'landscape-gardening' ); ?>" target="_blank">
            <?php esc_html_e( 'Go Pro', 'landscape-gardening' ); ?>
        </a>
	</div>

	<div class="pro-btn">
		<h3><?php esc_html_e( 'Theme Preview', 'landscape-gardening' ); ?></h3>
		<p><?php esc_html_e( 'You can Checkout Live Demo Of Our Theme Here', 'landscape-gardening' ); ?></p>
		<a class="button button-primary" href="<?php echo esc_url( 'https://demo.asterthemes.com/landscape-gardening/' ); ?>" title="<?php esc_attr_e( 'Live Demo', 'landscape-gardening' ); ?>" target="_blank">
            <?php esc_html_e( 'Live Demo', 'landscape-gardening' ); ?>
        </a>
	</div>

	<div class="pro-btn">
		<h3><?php esc_html_e( 'Pro Documentation', 'landscape-gardening' ); ?></h3>
		<p><?php esc_html_e( 'For Pro Version Documentation, Click the button below to access detailed guides and tutorials that will help you make the most of the premium features and functionalities.', 'landscape-gardening' ); ?></p>
		<a class="button button-primary" href="<?php echo esc_url( 'https://demo.asterthemes.com/docs/landscape-gardening-pro/' ); ?>" title="<?php esc_attr_e( 'Pro Documentation', 'landscape-gardening' ); ?>" target="_blank">
			<?php esc_html_e( 'Pro Documentation', 'landscape-gardening' ); ?>
		</a>
	</div>
</div>