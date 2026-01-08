<?php

if ( ! defined( 'ABSPATH' ) ) exit;

// Load field type
add_action( 'acf/include_field_types', 'custom_acf_include_field_gallery', 20 );
function custom_acf_include_field_gallery( $version = false ) {
    include_once __DIR__ . '/fields/class-acf-field-gallery.php';
}

add_filter('acf/get_field_types', function ($field_types) {
    // Ensure the 'content' category exists
    if (!isset($field_types['Custom'])) {
        $field_types['Custom'] = [];
    }

    // Add Gallery field inside the 'content' category
    $field_types['Custom']['gallery'] = 'Gallery';

    return $field_types;
});


// AJAX handler for uploads (desktop drag-drop)
add_action( 'wp_ajax_custom_acf_gallery_upload', 'custom_acf_gallery_ajax_upload' );
function custom_acf_gallery_ajax_upload() {

    // Check capability
    if ( ! current_user_can( 'upload_files' ) ) {
        wp_send_json_error( array( 'message' => __( 'Permission denied', 'custom-acf-gallery' ) ), 403 );
    }

    // Check nonce
    $nonce = isset( $_POST['nonce'] ) ? sanitize_text_field( wp_unslash( $_POST['nonce'] ) ) : '';
    if ( ! wp_verify_nonce( $nonce, 'custom_acf_gallery_nonce' ) ) {
        wp_send_json_error( array( 'message' => __( 'Invalid nonce', 'custom-acf-gallery' ) ), 403 );
    }

    if ( empty( $_FILES['file'] ) ) {
        wp_send_json_error( array( 'message' => __( 'No file uploaded', 'custom-acf-gallery' ) ), 400 );
    }

    require_once ABSPATH . 'wp-admin/includes/file.php';
    require_once ABSPATH . 'wp-admin/includes/image.php';
    require_once ABSPATH . 'wp-admin/includes/media.php';

    $file = $_FILES['file'];

    // sanitize file name
    $file['name'] = sanitize_file_name( $file['name'] );

    // handle upload
    $overrides = array( 'test_form' => false );
    $movefile = wp_handle_upload( $file, $overrides );

    if ( isset( $movefile['error'] ) ) {
        wp_send_json_error( array( 'message' => $movefile['error'] ), 500 );
    }

    // prepare attachment
    $filetype = wp_check_filetype( $movefile['file'], null );
    $attachment = array(
        'post_mime_type' => $filetype['type'],
        'post_title'     => sanitize_text_field( pathinfo( $movefile['file'], PATHINFO_FILENAME ) ),
        'post_content'   => '',
        'post_status'    => 'inherit'
    );

    $attach_id = wp_insert_attachment( $attachment, $movefile['file'] );

    if ( is_wp_error( $attach_id ) ) {
        wp_send_json_error( array( 'message' => $attach_id->get_error_message() ), 500 );
    }

    // generate metadata
    $attach_data = wp_generate_attachment_metadata( $attach_id, $movefile['file'] );
    wp_update_attachment_metadata( $attach_id, $attach_data );

    // return ID and url (thumbnail)
    $thumb = wp_get_attachment_image_src( $attach_id, 'thumbnail' );
    $url   = $thumb ? $thumb[0] : wp_get_attachment_url( $attach_id );

    wp_send_json_success( array(
        'id'  => (int) $attach_id,
        'url' => $url,
    ) );
}