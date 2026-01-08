<?php
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'acf_field_gallery' ) ):

class acf_field_gallery extends acf_field {

	function initialize() {
		$this->name     = 'gallery';
		$this->label    = __( 'Gallery', 'acf' );
		$this->category = 'content';
		$this->defaults = [
			'min'           => 0,
			'max'           => 0,
			'return_format' => 'array', // id|array|url
		];
	}

	function render_field_settings( $field ) {
		acf_render_field_setting( $field, [
			'label' => __( 'Minimum Selection', 'acf' ),
			'type'  => 'number',
			'name'  => 'min',
		]);
		acf_render_field_setting( $field, [
			'label' => __( 'Maximum Selection', 'acf' ),
			'type'  => 'number',
			'name'  => 'max',
		]);
		acf_render_field_setting( $field, [
			'label'   => __( 'Return Format', 'acf' ),
			'type'    => 'select',
			'name'    => 'return_format',
			'choices' => [
				'id'    => __( 'Image ID', 'acf' ),
				'array' => __( 'Image Array', 'acf' ),
				'url'   => __( 'Image URL', 'acf' ),
			],
		]);
	}

	function render_field( $field ) {
		$value = isset( $field['value'] ) ? $field['value'] : [];
		if ( is_string( $value ) && $this->is_json( $value ) ) {
			$value = json_decode( $value, true );
		}
		$ids = array_filter( array_map( 'intval', (array) $value ) );
		?>
		<div class="acf-gallery-field" data-name="<?php echo esc_attr( $field['name'] ); ?>">
			<input type="hidden"
				name="<?php echo esc_attr( $field['name'] ); ?>"
				value="<?php echo esc_attr( json_encode( $ids ) ); ?>"
				class="acf-gallery-input" />

			<div class="gallery-toolbar">
				<button class="button select-images"><?php esc_html_e( 'Add Images', 'acf' ); ?></button>
			</div>

			<div class="gallery-preview">
				<?php foreach ( $ids as $id ) :
					$thumb   = wp_get_attachment_image_src( $id, 'thumbnail' );
					$title   = get_the_title( $id );
					$caption = wp_get_attachment_caption( $id );
					if ( $thumb ) : ?>
						<div class="gallery-item" data-id="<?php echo esc_attr( $id ); ?>">
							<img src="<?php echo esc_url( $thumb[0] ); ?>" alt="">
							<button type="button" class="remove button-link-delete">&times;</button>
							<div class="meta">
								<input type="text" class="title" placeholder="Title" value="<?php echo esc_attr( $title ); ?>">
								<textarea class="caption" placeholder="Caption"><?php echo esc_textarea( $caption ); ?></textarea>
							</div>
						</div>
					<?php endif;
				endforeach; ?>
			</div>
		</div>

		<script>
		jQuery(document).ready(function($){
			$('.acf-gallery-field').each(function(){
				var field   = $(this),
					input   = field.find('.acf-gallery-input'),
					preview = field.find('.gallery-preview');

				// Sortable
				preview.sortable({
					items: '.gallery-item',
					update: updateAll
				});

				function updateAll(){
					var ids = [];
					preview.find('.gallery-item').each(function(){
						ids.push($(this).data('id'));
					});
					input.val(JSON.stringify(ids));
				}

				// Remove image
				field.on('click', '.remove', function(){
					$(this).closest('.gallery-item').remove();
					updateAll();
				});

				// Add images
				field.on('click', '.select-images', function(e){
					e.preventDefault();
					var frame = wp.media({
						title: '<?php echo esc_js(__('Select or Upload Images', 'acf')); ?>',
						button: { text: '<?php echo esc_js(__('Use these images', 'acf')); ?>' },
						multiple: true
					});
					frame.on('select', function(){
						var selection = frame.state().get('selection');
						selection.each(function(att){
							if (preview.find('[data-id="'+att.id+'"]').length === 0){
								var thumb = att.attributes.sizes?.thumbnail?.url || att.attributes.url;
								preview.append(
									'<div class="gallery-item" data-id="'+att.id+'">'+
										'<img src="'+thumb+'" />'+
										'<button type="button" class="remove button-link-delete">&times;</button>'+
										'<div class="meta">'+
											'<input type="text" class="title" placeholder="Title" value="'+att.attributes.title+'" />'+
											'<textarea class="caption" placeholder="Caption">'+(att.attributes.caption || "")+'</textarea>'+
										'</div>'+
									'</div>'
								);
							}
						});
						updateAll();
					});
					frame.open();
				});

				// Save title/caption live via AJAX
				field.on('change', '.title, .caption', function(){
					var item = $(this).closest('.gallery-item');
					var id   = item.data('id');
					var title = item.find('.title').val();
					var caption = item.find('.caption').val();
					wp.ajax.post('acf_gallery_update_meta', {
						id: id,
						title: title,
						caption: caption,
						_ajax_nonce: '<?php echo wp_create_nonce('acf_gallery_meta'); ?>'
					});
				});
			});
		});
		</script>

		<style>
		.acf-gallery-field .gallery-toolbar { margin-bottom:8px; }
		.acf-gallery-field .gallery-preview {
			display:flex; flex-wrap:wrap; gap:10px;
		}
		.acf-gallery-field .gallery-item {
			position:relative;
			cursor:move;
			width:140px;
			border:1px solid #ccc;
			border-radius:6px;
			padding:4px;
			background:#fafafa;
		}
		.acf-gallery-field .gallery-item img {
			width:100%; height:100px; object-fit:cover;
			border-radius:4px;
		}
		.acf-gallery-field .remove {
			position:absolute; top:-8px; right:-8px;
			background:#d63638; color:#fff; border:none;
			border-radius:50%; width:20px; height:20px; line-height:18px;
			font-size:16px; cursor:pointer;
		}
		.acf-gallery-field .meta { margin-top:5px; }
		.acf-gallery-field .meta input.title {
			width:100%; font-size:12px; margin-bottom:3px;
		}
		.acf-gallery-field .meta textarea.caption {
			width:100%; height:40px; font-size:12px; resize:vertical;
		}
		</style>
		<?php
	}

	function is_json( $str ) {
		json_decode( $str );
		return json_last_error() === JSON_ERROR_NONE;
	}

	function format_value( $value, $post_id, $field ) {
		if ( empty( $value ) ) return [];
		if ( is_string( $value ) && $this->is_json( $value ) ) {
			$value = json_decode( $value, true );
		}
		$value = array_map( 'intval', (array) $value );
		$return = [];
		foreach ( $value as $id ) {
			switch ( $field['return_format'] ) {
				case 'array':
					$data = wp_get_attachment_metadata( $id );
					$data['url'] = wp_get_attachment_url( $id );
					$data['title'] = get_the_title( $id );
					$data['caption'] = wp_get_attachment_caption( $id );
					$return[] = $data;
					break;
				case 'url':
					$return[] = wp_get_attachment_url( $id );
					break;
				default:
					$return[] = $id;
			}
		}
		return $return;
	}
}

acf_register_field_type( 'acf_field_gallery' );

// Handle AJAX for saving meta
add_action( 'wp_ajax_acf_gallery_update_meta', function() {
	check_ajax_referer( 'acf_gallery_meta' );
	$id = intval( $_POST['id'] ?? 0 );
	if ( $id ) {
		wp_update_post([
			'ID' => $id,
			'post_title' => sanitize_text_field( $_POST['title'] ?? '' ),
		]);
		wp_update_post([
			'ID' => $id,
			'post_excerpt' => sanitize_text_field( $_POST['caption'] ?? '' ),
		]);
		wp_send_json_success();
	}
	wp_send_json_error();
});

endif;