<?php

/**
 * Class WP_EXT_News_Post_Field
 */
class WP_EXT_News_Post_Field extends WP_EXT_News {

	/**
	 * Constructor.
	 */
	public function __construct() {
		parent::__construct();

		$this->run();
	}

	/**
	 * Plugin: `initialize`.
	 */
	public function run() {
		add_action( 'acf/init', [ $this, 'post_fields' ] );
	}

	/**
	 * Post fields.
	 */
	public function post_fields() {
		if ( function_exists( 'acf_add_local_field_group' ) ) {
			acf_add_local_field_group( [
				'key'                   => 'group_' . $this->pt_ID,
				'title'                 => esc_html__( 'Информация о новости', 'wp-ext-' . $this->domain_ID ),
				'fields'                => [
					[
						'key'               => 'tab_' . $this->pt_ID . '_general',
						'label'             => esc_html__( 'Общие сведения', 'wp-ext-' . $this->domain_ID ),
						'name'              => '',
						'type'              => 'tab',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'placement'         => 'left',
						'endpoint'          => 0,
					],
					[
						'key'               => 'tab_' . $this->pt_ID . '_cover',
						'label'             => esc_html__( 'Обложка', 'wp-ext-' . $this->domain_ID ),
						'name'              => '',
						'type'              => 'tab',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'placement'         => 'left',
						'endpoint'          => 0,
					],
					[
						'key'               => 'field_' . $this->pt_ID . '_cover',
						'label'             => esc_html__( 'Обложка', 'wp-ext-' . $this->domain_ID ),
						'name'              => $this->pt_ID . '_cover',
						'type'              => 'image',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'return_format'     => 'array',
						'preview_size'      => 'thumbnail',
						'library'           => 'all',
						'min_width'         => '',
						'min_height'        => '',
						'min_size'          => '',
						'max_width'         => '',
						'max_height'        => '',
						'max_size'          => '',
						'mime_types'        => 'jpg,png',
					],
					[
						'key'               => 'tab_' . $this->pt_ID . '_gallery',
						'label'             => esc_html__( 'Галерея', 'wp-ext-' . $this->domain_ID ),
						'name'              => '',
						'type'              => 'tab',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'placement'         => 'left',
						'endpoint'          => 0,
					],
					[
						'key'               => 'field_' . $this->pt_ID . '_gallery',
						'label'             => esc_html__( 'Галерея', 'wp-ext-' . $this->domain_ID ),
						'name'              => $this->pt_ID . '_gallery',
						'type'              => 'gallery',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'min'               => '',
						'max'               => '',
						'insert'            => 'append',
						'library'           => 'all',
						'min_width'         => '',
						'min_height'        => '',
						'min_size'          => '',
						'max_width'         => '',
						'max_height'        => '',
						'max_size'          => '',
						'mime_types'        => 'jpg,png',
					],
					[
						'key'               => 'tab_' . $this->pt_ID . '_sources',
						'label'             => esc_html__( 'Источники', 'wp-ext-' . $this->domain_ID ),
						'name'              => '',
						'type'              => 'tab',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'placement'         => 'left',
						'endpoint'          => 0,
					],
					[
						'key'               => 'field_' . $this->pt_ID . '_source',
						'label'             => esc_html__( 'Источник', 'wp-ext-' . $this->domain_ID ),
						'name'              => $this->pt_ID . '_source',
						'type'              => 'repeater',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'collapsed'         => '',
						'min'               => 0,
						'max'               => 0,
						'layout'            => 'table',
						'button_label'      => '',
						'sub_fields'        => [
							[
								'key'               => 'field_' . $this->pt_ID . '_source_url',
								'label'             => esc_html__( 'Адрес ссылки', 'wp-ext-' . $this->domain_ID ),
								'name'              => 'url',
								'type'              => 'url',
								'instructions'      => '',
								'required'          => 0,
								'conditional_logic' => 0,
								'wrapper'           => [
									'width' => '',
									'class' => '',
									'id'    => '',
								],
								'default_value'     => '',
								'placeholder'       => '',
							],
							[
								'key'               => 'field_' . $this->pt_ID . '_source_text',
								'label'             => esc_html__( 'Текст ссылки', 'wp-ext-' . $this->domain_ID ),
								'name'              => 'text',
								'type'              => 'text',
								'instructions'      => '',
								'required'          => 0,
								'conditional_logic' => 0,
								'wrapper'           => [
									'width' => '',
									'class' => '',
									'id'    => '',
								],
								'default_value'     => '',
								'placeholder'       => '',
								'prepend'           => '',
								'append'            => '',
								'maxlength'         => '',
							],
						],
					],
					[
						'key'               => 'tab_' . $this->pt_ID . '_meta',
						'label'             => esc_html__( 'META-информация', 'wp-ext-' . $this->domain_ID ),
						'name'              => '',
						'type'              => 'tab',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'placement'         => 'left',
						'endpoint'          => 0,
					],
					[
						'key'               => 'field_' . $this->pt_ID . '_meta',
						'label'             => esc_html__( 'META-теги', 'wp-ext-' . $this->domain_ID ),
						'name'              => $this->pt_ID . '_meta',
						'type'              => 'taxonomy',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => 0,
						'wrapper'           => [
							'width' => '',
							'class' => '',
							'id'    => '',
						],
						'taxonomy'          => $this->pt_ID . '_meta',
						'field_type'        => 'multi_select',
						'allow_null'        => 0,
						'add_term'          => 0,
						'save_terms'        => 1,
						'load_terms'        => 0,
						'return_format'     => 'id',
						'multiple'          => 0,
					],
				],
				'location'              => [
					[
						[
							'param'    => 'post_type',
							'operator' => '==',
							'value'    => $this->pt_ID,
						],
					],
				],
				'menu_order'            => 0,
				'position'              => 'normal',
				'style'                 => 'default',
				'label_placement'       => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen'        => '',
				'active'                => 1,
				'description'           => '',
			] );
		}
	}
}

/**
 * Helper function to retrieve the static object without using globals.
 *
 * @return WP_EXT_News_Post_Field
 */
function WP_EXT_News_Post_Field() {
	static $object;

	if ( null == $object ) {
		$object = new WP_EXT_News_Post_Field;
	}

	return $object;
}

/**
 * Initialize the object on `plugins_loaded`.
 */
add_action( 'plugins_loaded', [ WP_EXT_News_Post_Field(), 'run' ] );
