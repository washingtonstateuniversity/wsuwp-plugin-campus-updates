<?php namespace WSUWP\Plugin\Campus_Updates;


class Post_Type_Campus_Update {


	public function __construct() {

		require_once Plugin::get_plugin_dir() . '/classes/class-campus-update.php';

	}


	public function init() {

		add_action( 'init', __CLASS__ . '::register_post_type' );

		add_action( 'edit_form_after_title', __CLASS__ . '::render_editor' );

		add_action( 'save_post_campus_update', __CLASS__ . '::save_post', 10, 3 );

	}


	public static function register_post_type() {

		$labels = array(
			'name'                  => 'Campus Updates',
			'singular_name'         => 'Campus Update',
			'menu_name'             => 'Campus Updates',
			'name_admin_bar'        => 'Campus Update',
			'add_new'               => 'Add New',
			'add_new_item'          => 'Add New Campus Update',
			'new_item'              => 'New Campus Update',
			'edit_item'             => 'Edit Campus Update',
			'view_item'             => 'View Campus Update',
			'all_items'             => 'All Campus Updates',
			'search_items'          => 'Search Campus Updates',
			'parent_item_colon'     => 'Parent Campus Updates:',
			'not_found'             => 'No campus update found.',
			'not_found_in_trash'    => 'No campus update found in Trash.',
			'featured_image'        => 'Campus Update Cover Image',
			'set_featured_image'    => 'Set cover image',
			'remove_featured_image' => 'Remove cover image',
			'use_featured_image'    => 'Use as cover image',
			'archives'              => 'Campus Update archives',
			'insert_into_item'      => 'Insert into expense',
			'uploaded_to_this_item' => 'Uploaded to this expense',
			'filter_items_list'     => 'Filter campus update list',
			'items_list_navigation' => 'Campus Updates list navigation',
			'items_list'            => 'Campus Updates list',
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'wsu-campus-update' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title' ),
		);

		register_post_type( 'campus_update', $args );

	}


	public static function render_editor( $post ) {

		if ( 'campus_update' === $post->post_type ) {

			$update = new Campus_Update( $post );

			include Plugin::get_plugin_dir() . '/templates/editor.php';

		}

	} // End render_editor


	public static function save_post( $post_id, $post, $update ) {

		$setting_keys = array(
			'wsu_update_status',
			'wsu_update_impact',
			'wsu_update_link',
			'wsu_update_caption',
		);

		// Check if doing autosave
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {

			return false;

		} // End if

		// If this is a revision, abort
		if ( wp_is_post_revision( $post_id ) ) {

			return false;

		} // End if

		// Verify the nonce before proceeding.
		if ( ! isset( $_REQUEST['wsuwp_update'] ) || ! wp_verify_nonce( $_REQUEST['wsuwp_update'], 'wsuwp_update_save' ) ) {

			return false;

		} // End if

		// Check if the current user has permission to edit the post.
		if ( ! current_user_can( 'edit_post', $post_id ) ) {

			return false;

		} // End if

		foreach ( $setting_keys as $key ) {

			if ( isset( $_REQUEST[ $key ] ) ) {

				if ( 'wsu_update_caption' === $key ) {
					$value = wp_kses_post( $_REQUEST[ $key ] );
				} elseif ( 'wsu_update_impact' === $key ) {

					$value = array();

					$impacts = ( is_array( $_REQUEST[ $key ] ) ) ? $_REQUEST[ $key ] : array();

					foreach ( $impacts as $impact ) {
						$value[] = sanitize_text_field( $impact );
					}
				} else {
					$value = sanitize_text_field( $_REQUEST[ $key ] );
				}

				update_post_meta( $post_id, $key, $value );
			}
		}

	}


}

(new Post_Type_Campus_Update)->init();
