<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! landscape_gardening_has_page_header() ) {
    return;
}

$landscape_gardening_classes = array( 'page-header' );
$landscape_gardening_style = landscape_gardening_page_header_style();

if ( $landscape_gardening_style ) {
    $landscape_gardening_classes[] = $landscape_gardening_style . '-page-header';
}

$landscape_gardening_visibility = get_theme_mod( 'landscape_gardening_page_header_visibility', 'all-devices' );

if ( 'hide-all-devices' === $landscape_gardening_visibility ) {
    // Don't show the header at all
    return;
}

if ( 'hide-tablet' === $landscape_gardening_visibility ) {
    $landscape_gardening_classes[] = 'hide-on-tablet';
} elseif ( 'hide-mobile' === $landscape_gardening_visibility ) {
    $landscape_gardening_classes[] = 'hide-on-mobile';
} elseif ( 'hide-tablet-mobile' === $landscape_gardening_visibility ) {
    $landscape_gardening_classes[] = 'hide-on-tablet-mobile';
}

$landscape_gardening_PAGE_TITLE_background_color = get_theme_mod('landscape_gardening_page_title_background_color_setting', '');

// Get the toggle switch value
$landscape_gardening_background_image_enabled = get_theme_mod('landscape_gardening_page_header_style', true);

// Add background image to the header if enabled
$landscape_gardening_background_image = get_theme_mod( 'landscape_gardening_page_header_background_image', '' );
$landscape_gardening_background_height = get_theme_mod( 'landscape_gardening_page_header_image_height', '200' );
$landscape_gardening_inline_style = '';

if ( $landscape_gardening_background_image_enabled && ! empty( $landscape_gardening_background_image ) ) {
    $landscape_gardening_inline_style .= 'background-image: url(' . esc_url( $landscape_gardening_background_image ) . '); ';
    $landscape_gardening_inline_style .= 'height: ' . esc_attr( $landscape_gardening_background_height ) . 'px; ';
    $landscape_gardening_inline_style .= 'background-size: cover; ';
    $landscape_gardening_inline_style .= 'background-position: center center; ';

    // Add the unique class if the background image is set
    $landscape_gardening_classes[] = 'has-background-image';
}

$landscape_gardening_classes = implode( ' ', $landscape_gardening_classes );
$landscape_gardening_heading = get_theme_mod( 'landscape_gardening_page_header_heading_tag', 'h1' );
$landscape_gardening_heading = apply_filters( 'landscape_gardening_page_header_heading', $landscape_gardening_heading );

?>

<?php do_action( 'landscape_gardening_before_page_header' ); ?>

<header class="<?php echo esc_attr( $landscape_gardening_classes ); ?>" style="<?php echo esc_attr( $landscape_gardening_inline_style ); ?> background-color: <?php echo esc_attr($landscape_gardening_PAGE_TITLE_background_color); ?>;">

    <?php do_action( 'landscape_gardening_before_page_header_inner' ); ?>

    <div class="asterthemes-wrapper page-header-inner">

        <?php if ( landscape_gardening_has_page_header() ) : ?>

            <<?php echo esc_attr( $landscape_gardening_heading ); ?> class="page-header-title">
                <?php echo wp_kses_post( landscape_gardening_get_page_title() ); ?>
            </<?php echo esc_attr( $landscape_gardening_heading ); ?>>

        <?php endif; ?>

        <?php if ( function_exists( 'landscape_gardening_breadcrumb' ) ) : ?>
            <?php landscape_gardening_breadcrumb(); ?>
        <?php endif; ?>

    </div><!-- .page-header-inner -->

    <?php do_action( 'landscape_gardening_after_page_header_inner' ); ?>

</header><!-- .page-header -->

<?php do_action( 'landscape_gardening_after_page_header' ); ?>