<?php

define( 'MY_THEME_BASE_PATH', get_template_directory() );
define( 'MY_THEME_BASE_URI', get_template_directory_uri() );
define( 'MY_THEME_ASSETS_URI', MY_THEME_BASE_URI.'/assets' );
define( 'MY_THEME_BUILD_URI', MY_THEME_BASE_URI.'/build' );
define( 'MY_THEME_VERSION', '1.0' );

require_once get_template_directory() . '/includes/theme-enqueue.php';

class my_theme {

	protected $theme_enqueue;

	function __construct() {
		$this->theme_enqueue = new my_theme_enqueue();
	}

	function theme_enqueue() {
		$this->theme_enqueue->theme_scripts();
	}
	function theme_setup() {
		add_theme_support( 'title-tag' );
	}

	function setup_cpt() {
		$labels = array(
			'name'               => _x( 'Quests', 'post type general name', 'your-plugin-textdomain' ),
			'singular_name'      => _x( 'Quest', 'post type singular name', 'your-plugin-textdomain' ),
			'menu_name'          => _x( 'Quests', 'admin menu', 'your-plugin-textdomain' ),
			'name_admin_bar'     => _x( 'Quest', 'add new on admin bar', 'your-plugin-textdomain' ),
			'add_new'            => _x( 'Add New', 'quest', 'your-plugin-textdomain' ),
			'add_new_item'       => __( 'Add New Quest', 'your-plugin-textdomain' ),
			'new_item'           => __( 'New Quest', 'your-plugin-textdomain' ),
			'edit_item'          => __( 'Edit Quest', 'your-plugin-textdomain' ),
			'view_item'          => __( 'View Quest', 'your-plugin-textdomain' ),
			'all_items'          => __( 'All Quests', 'your-plugin-textdomain' ),
			'search_items'       => __( 'Search Quests', 'your-plugin-textdomain' ),
			'parent_item_colon'  => __( 'Parent Quests:', 'your-plugin-textdomain' ),
			'not_found'          => __( 'No quests found.', 'your-plugin-textdomain' ),
			'not_found_in_trash' => __( 'No quests found in Trash.', 'your-plugin-textdomain' )
		);

		$args = array(
			'labels'             => $labels,
			'description'        => __( 'Description.', 'your-plugin-textdomain' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'quest-for-positivity' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
			'show_in_rest'       => true
		);

		register_post_type( 'quest', $args );
	}

	function api_endpoint() {
		register_rest_route( 'quest/v1', '/post/', array(
			'methods' => 'POST',
			'callback' => [ $this, 'create_quest' ],
			'args' => array(
				'title' => array(
					'required' => false
				),
				'content' => array(
					'required' => false
				),
			)
		) );
		register_rest_route( 'quest/v1', '/post/(?P<id>\d+)', array(
			'methods' => 'POST',
			'callback' => [ $this, 'create_quest' ],
			'args' => array(
				'title' => array(
					'required' => false
				),
				'content' => array(
					'required' => false
				),
			)
		) );
	}

	function create_quest( WP_REST_Request $request ) {
		$data = $request->get_params();

		if( !isset( $data['ID'] ) ) {
			// Create new quest
			$post = array(
				'post_title'   => $data['title'],
				'post_content' => $data['content'],
				'post_status'  => 'publish',
				'post_type'    => 'quest'
			);

			$quest_post = wp_insert_post( $post );

			if( isset( $data['quest_author'] ) ) {
				update_post_meta( $quest_post, 'quest_author', $data['quest_author'] );
			}
			$response = new WP_REST_Response( get_post( $quest_post ) );
			return $response;

		} elseif( isset( $data['ID'] ) ) {

			$post_id = $data['ID'];
			$post = [
				'ID'            => $post_id,
				'post_status'   => 'draft'
			];
			$update_post = wp_update_post( $post );

			if( !is_wp_error( $update_post ) ) {
				$response = new WP_REST_Response( $update_post );

				$response->set_status( 201 );

				$response->header( 'Location', get_bloginfo( 'url' ) );

				return $response;
			}

		}

	}
}

$my_theme = new my_theme();

add_action( 'wp_enqueue_scripts', array( $my_theme, 'theme_enqueue' ) );
add_action( 'after_setup_theme', array( $my_theme, 'theme_setup' ) );
add_action( 'init', array( $my_theme, 'setup_cpt' ) );
add_action( 'rest_api_init', array( $my_theme, 'api_endpoint' ) );

?>
