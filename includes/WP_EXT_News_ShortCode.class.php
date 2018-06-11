<?php

/**
 * Class WP_EXT_News_ShortCode
 * ------------------------------------------------------------------------------------------------------------------ */

class WP_EXT_News_ShortCode extends WP_EXT_News {

	/**
	 * Constructor.
	 * -------------------------------------------------------------------------------------------------------------- */

	public function __construct() {
		parent::__construct();

		$this->run();
	}

	/**
	 * Plugin: `initialize`.
	 * -------------------------------------------------------------------------------------------------------------- */

	public function run() {
		add_shortcode( $this->archive_ID, [ $this, 'shortcode' ] );
	}

	/**
	 * ShortCode.
	 * -------------------------------------------------------------------------------------------------------------- */

	public function shortcode( $atts, $content = null ) {

		/**
		 * Global variables.
		 * ---------------------------------------------------------------------------------------------------------- */

		global $wp_query;

		/**
		 * Options.
		 * ---------------------------------------------------------------------------------------------------------- */

		$defaults = [
			'type' => '',
		];

		$atts = shortcode_atts( $defaults, $atts, $this->archive_ID );

		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

		$args = [
			'post_type'      => $this->pt_ID,
			'post_status'    => 'publish',
			'posts_per_page' => 4,
			'paged'          => $paged,
			'tax_query'      => [
				[
					'taxonomy' => $this->pt_ID . '_meta',
					'field'    => 'slug',
					'terms'    => 'archive',
					'operator' => 'NOT IN',
				]
			],
		];

		/**
		 * Rendering data.
		 * ---------------------------------------------------------------------------------------------------------- */

		$wp_query = new WP_Query( $args );

		if ( $wp_query->have_posts() ) {
			echo '<section class="wp-ext-' . $this->domain_ID . '">';
			echo '<h2><a href="/news">' . esc_html__( 'Новости', 'wp-ext-' . $this->domain_ID ) . '</a></h2>';
			echo '<div class="news-grid">';

			while ( $wp_query->have_posts() ) {
				$wp_query->the_post();

				echo self::shortcode_render();
			}

			echo '</div>';
			echo '</section>';

			do_action( 'genesis_after_endwhile' );
		}

		/**
		 * Reset query.
		 * ---------------------------------------------------------------------------------------------------------- */

		wp_reset_query();
	}

	/**
	 * Render: `shortcode`.
	 *
	 * @return string
	 * -------------------------------------------------------------------------------------------------------------- */

	public function shortcode_render() {
		$image = get_field( $this->pt_ID . '_cover' );

		if ( $image ) {
			$cover = '';
			$style = 'background-image: url(' . esc_url( $image['sizes']['medium_large'] ) . ')';
		} else {
			$cover = '<i class="far fa-image"></i>';
			$style = '';
		}

		$out = '<section class="news">';
		$out .= '<div class="news-cover"><a style="' . $style . '" title="' . esc_attr( get_the_title() ) . '" href="' . esc_url( get_permalink() ) . '">' . $cover . '</a></div>';
		$out .= '<div class="news-body"><div class="news-title"><a href="' . esc_url( get_permalink() ) . '">' . get_the_title() . '</a></div><div class="news-content"></div></div>';
		$out .= '</section>';

		return $out;
	}
}

/**
 * Helper function to retrieve the static object without using globals.
 *
 * @return WP_EXT_News_ShortCode
 * ------------------------------------------------------------------------------------------------------------------ */

function WP_EXT_News_ShortCode() {
	static $object;

	if ( null == $object ) {
		$object = new WP_EXT_News_ShortCode;
	}

	return $object;
}

/**
 * Initialize the object on `plugins_loaded`.
 * ------------------------------------------------------------------------------------------------------------------ */

add_action( 'plugins_loaded', [ WP_EXT_News_ShortCode(), 'run' ] );
