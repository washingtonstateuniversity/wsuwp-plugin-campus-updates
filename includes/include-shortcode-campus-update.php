<?php namespace WSUWP\Plugin\Campus_Updates;


class Shortcode_Campus_update {


	protected static $slug = 'wsu_campus_updates';


	protected static $default_atts = array(

	);


	public function init() {

		require_once Plugin::get_plugin_dir() . '/classes/class-campus-update.php';

		add_action( 'init', __CLASS__ . '::register_shortcode' );

	}


	public static function register_shortcode() {

		add_shortcode( self::$slug, __CLASS__ . '::do_shortcode' );

	}


	public static function do_shortcode( $atts ) {

		$atts = shortcode_atts( self::$default_atts, $atts, self::$slug );

		$updates = self::get_updates( $atts );

		ob_start();

		include Plugin::get_plugin_dir() . '/templates/shortcode-widget.php';

		return ob_get_clean();

	}


	protected static function get_updates( $atts ) {

		$updates = array();

		$args = array(
			'post_type'      => 'campus_update',
			'post_status'    => ( ! isset( $_REQUEST['update_preview'] ) ) ? 'publish' : array( 'publish', 'draft' ),
			'meta_key'       => 'wsu_update_status',
			'meta_value'     => 'on',
			'posts_per_page' => -1,
		);

		// The Query
		$the_query = new \WP_Query( $args );

		// The Loop
		if ( $the_query->have_posts() ) {
			while ( $the_query->have_posts() ) {
				$the_query->the_post();

				$updates[] = new Campus_Update( $the_query->post );
			}
		}

		/* Restore original Post Data */
		wp_reset_postdata();

		return $updates;

	}

}

(new Shortcode_Campus_update)->init();
